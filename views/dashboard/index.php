<div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xxl-3 col-md-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Total Tasks</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="<?= $tasks_count ?>">0</span></h2>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-info rounded-circle fs-4">
                                    <i class="ri-ticket-2-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div>

        <div class="col-xxl-3 col-md-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Completed Tasks </p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="<?= $tasks_new ?>">0</span></h2>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-success rounded-circle fs-4">
                                    <i class="ri-checkbox-circle-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <!--end col-->
        <!--end col-->
        <div class="col-xxl-3 col-md-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Pending Tasks</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                    data-target="<?= $tasks_pending ?>">0</span></h2>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-danger rounded-circle fs-4">
                                    <i class="mdi mdi-timer-sand"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">New Task</p>
                            <h2 class="mt-4 ff-success fw-semibold"><span class="counter-value"
                                    data-target="<?= $tasks_new ?>">0</span></h2>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-success rounded-circle fs-4">
                                    <i class="mdi mdi-new-box"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">InProgress Tasks</p>
                            <h2 class="mt-4 ff-warning fw-semibold"><span class="counter-value"
                                    data-target="<?= $tasks_inprogress ?>">0</span></h2>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-warning rounded-circle fs-4">
                                    <i class="mdi mdi-progress-wrench"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <?php component('table/taskList') ?>


    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                    <div class="mt-4 text-center">
                        <h4>You are about to delete a task ?</h4>
                        <p class="text-muted fs-14 mb-4">Deleting your task will remove all of
                            your information from our database.</p>
                        <div class="hstack gap-2 justify-content-center remove">
                            <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none"
                                id="deleteRecord-close" data-bs-dismiss="modal"><i
                                    class="ri-close-line me-1 align-middle"></i> Close</button>
                            <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end delete modal -->

    <?php component('modal/createTask') ?>
    <!--end modal-->
</div>