<?php

use App\Models\Tasks;

$model = (new Tasks())->byAuth();
if (isset($_GET[ 'filter' ]) && $_GET[ 'filter' ] != 'all' && !empty($_GET[ 'filter' ])) {
    $tasks = $model
        ->where('status', '=', $_GET[ 'filter' ])
        ->orderBy('created_at', 'DESC')
        ->orderBy('priority', 'ASC')
        ->orderBy('status', 'ASC')
        ->orderBy('task_category_id', 'DESC')
        ->toArray();
} else {
    $tasks = $model->orderBy('created_at', 'DESC')
        ->orderBy('priority', 'ASC')
        ->orderBy('status', 'ASC')
        ->orderBy('task_category_id', 'DESC')
        ->toArray();
}

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="tasksList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">All Tasks</h5>
                    <div class="flex-shrink-0">
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-success add-btn" data-bs-toggle="modal"
                                data-bs-target="#createTask"><i class="ri-add-line align-bottom me-1"></i> Create
                                Task</button>
                            <button class="btn btn-danger" id="remove-actions"><i
                                    class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <form>
                    <div class="row g-3">
                        <div class="col-xxl-6 col-sm-6">
                            <div class="search-box">
                                <input type="text" class="form-control search bg-light border-light"
                                    placeholder="Search for tasks or something...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->

                        <form action="" method="get">
                            <div class="col-xxl-4 col-sm-4">
                                <div class="input-light">
                                    <select class="form-control" data-choices data-choices-search-false name="filter"
                                        id="idStatus">
                                        <option value="">Status</option>
                                        <option value="all" selected>All</option>
                                        <option value="new">New</option>
                                        <option value="pending">Pending</option>
                                        <option value="onprogress">Inprogress</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-sm-2">
                                <button type="submit" class="btn btn-primary w-100" onclick="SearchData();"> <i
                                        class="ri-equalizer-fill me-1 align-bottom"></i>
                                    Filters
                                </button>
                            </div>
                            <!--end col-->
                        </form>
                    </div>
                    <!--end row-->
                </form>
            </div>
            <!--end card-body-->
            <div class="card-body">
                <div class="table-responsive table-card mb-4">
                    <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col" style="width: 40px;">
                                </th>
                                <th class="sort" data-sort="tasks_name">Task</th>
                                <th class="sort" data-sort="category">Category</th>
                                <th class="sort" data-sort="description">Description</th>
                                <th class="sort" data-sort="due_date">Due Date</th>
                                <th class="sort" data-sort="created_at">Created At</th>
                                <th class="sort" data-sort="status">Status</th>
                                <th class="sort" data-sort="priority">Priority</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            <?php foreach ($tasks as $index => $task) { ?>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="id"
                                                value="<?= $task[ 'id' ] ?>">
                                        </div>
                                    </th>
                                    <td>
                                        <div class="d-flex">
                                            <div class="flex-grow-1 tasks_name">
                                                <?= ucwords($task[ 'name' ]) ?>
                                            </div>
                                            <div class="flex-shrink-0 ms-4">
                                                <ul class="list-inline tasks-list-menu mb-0">
                                                    <li class="list-inline-item"><a href="apps-tasks-details.html"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="edit-item-btn" href="#showModal"
                                                            data-bs-toggle="modal"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="remove-item-btn" data-bs-toggle="modal"
                                                            href="#deleteOrder">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="category">
                                        <?= ucwords((new Tasks())->category($task[ 'id' ])->name) ?>
                                    </td>
                                    <td class="description">
                                        <?= $task[ 'description' ] ?>
                                    </td>
                                    <td class="due_date"><?= formatDate($task[ 'due_date' ]) ?></td>
                                    <td class="created_at"><?= formatDate($task[ 'created_at' ], 'd M, Y H:ia') ?></td>
                                    <td class="status"><span
                                            class="badge bg-<?= statusColor($task[ 'status' ]) ?>-subtle text-<?= statusColor($task[ 'status' ]) ?> text-uppercase"><?= ucfirst($task[ 'status' ]) ?></span>
                                    </td>
                                    <td class="priority"><span
                                            class="badge bg-<?= priorityColor($task[ 'priority' ]) ?> text-uppercase"><?= strtoupper($task[ 'priority' ]) ?></span>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!--end table-->
                    <div class="noresult" style="display: none">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                            <h5 class="mt-2">Sorry! No Result Found</h5>
                            <p class="text-muted mb-0">We've searched more than 200k+ tasks We did
                                not find any tasks for you search.</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <div class="pagination-wrap hstack gap-2">
                        <a class="page-item pagination-prev disabled" href="#">
                            Previous
                        </a>
                        <ul class="pagination listjs-pagination mb-0"></ul>
                        <a class="page-item pagination-next" href="#">
                            Next
                        </a>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->