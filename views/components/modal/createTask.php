<div class="modal fade zoomIn" id="createTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form class="tablelist-form" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" id="tasksId" />
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <label for="projectName-field" class="form-label">Project Name</label>
                            <input type="text" id="projectName-field" class="form-control" placeholder="Project name"
                                required />
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="tasksTitle-field" class="form-label">Title</label>
                                <input type="text" id="tasksTitle-field" class="form-control" placeholder="Title"
                                    required />
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="clientName-field" class="form-label">Client Name</label>
                            <input type="text" id="clientName-field" class="form-control" placeholder="Client name"
                                required />
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label class="form-label">Assigned To</label>
                            <div data-simplebar style="height: 95px;">
                                <ul class="list-unstyled vstack gap-2 mb-0">
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" name="assignedTo[]"
                                                value="avatar-2.jpg" id="james-forbes">
                                            <label class="form-check-label d-flex align-items-center"
                                                for="james-forbes">
                                                <span class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-2.jpg" alt=""
                                                        class="avatar-xxs rounded-circle">
                                                </span>
                                                <span class="flex-grow-1 ms-2">James Forbes</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" name="assignedTo[]"
                                                value="avatar-3.jpg" id="john-robles">
                                            <label class="form-check-label d-flex align-items-center" for="john-robles">
                                                <span class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-3.jpg" alt=""
                                                        class="avatar-xxs rounded-circle">
                                                </span>
                                                <span class="flex-grow-1 ms-2">John Robles</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" name="assignedTo[]"
                                                value="avatar-4.jpg" id="mary-gant">
                                            <label class="form-check-label d-flex align-items-center" for="mary-gant">
                                                <span class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-4.jpg" alt=""
                                                        class="avatar-xxs rounded-circle">
                                                </span>
                                                <span class="flex-grow-1 ms-2">Mary Gant</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" name="assignedTo[]"
                                                value="avatar-1.jpg" id="curtis-saenz">
                                            <label class="form-check-label d-flex align-items-center"
                                                for="curtis-saenz">
                                                <span class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-1.jpg" alt=""
                                                        class="avatar-xxs rounded-circle">
                                                </span>
                                                <span class="flex-grow-1 ms-2">Curtis Saenz</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" name="assignedTo[]"
                                                value="avatar-5.jpg" id="virgie-price">
                                            <label class="form-check-label d-flex align-items-center"
                                                for="virgie-price">
                                                <span class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-5.jpg" alt=""
                                                        class="avatar-xxs rounded-circle">
                                                </span>
                                                <span class="flex-grow-1 ms-2">Virgie Price</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" name="assignedTo[]"
                                                value="avatar-10.jpg" id="anthony-mills">
                                            <label class="form-check-label d-flex align-items-center"
                                                for="anthony-mills">
                                                <span class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-10.jpg" alt=""
                                                        class="avatar-xxs rounded-circle">
                                                </span>
                                                <span class="flex-grow-1 ms-2">Anthony Mills</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" name="assignedTo[]"
                                                value="avatar-6.jpg" id="marian-angel">
                                            <label class="form-check-label d-flex align-items-center"
                                                for="marian-angel">
                                                <span class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-6.jpg" alt=""
                                                        class="avatar-xxs rounded-circle">
                                                </span>
                                                <span class="flex-grow-1 ms-2">Marian Angel</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" name="assignedTo[]"
                                                value="avatar-10.jpg" id="johnnie-walton">
                                            <label class="form-check-label d-flex align-items-center"
                                                for="johnnie-walton">
                                                <span class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-7.jpg" alt=""
                                                        class="avatar-xxs rounded-circle">
                                                </span>
                                                <span class="flex-grow-1 ms-2">Johnnie Walton</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" name="assignedTo[]"
                                                value="avatar-8.jpg" id="donna-weston">
                                            <label class="form-check-label d-flex align-items-center"
                                                for="donna-weston">
                                                <span class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-8.jpg" alt=""
                                                        class="avatar-xxs rounded-circle">
                                                </span>
                                                <span class="flex-grow-1 ms-2">Donna Weston</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-3" type="checkbox" name="assignedTo[]"
                                                value="avatar-9.jpg" id="diego-norris">
                                            <label class="form-check-label d-flex align-items-center"
                                                for="diego-norris">
                                                <span class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-9.jpg" alt=""
                                                        class="avatar-xxs rounded-circle">
                                                </span>
                                                <span class="flex-grow-1 ms-2">Diego Norris</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="duedate-field" class="form-label">Due Date</label>
                            <input type="text" id="duedate-field" class="form-control" data-provider="flatpickr"
                                placeholder="Due date" required />
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="ticket-status" class="form-label">Status</label>
                            <select class="form-control" id="ticket-status">
                                <option value="">Status</option>
                                <option value="New">New</option>
                                <option value="Inprogress">Inprogress</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="priority-field" class="form-label">Priority</label>
                            <select class="form-control" id="priority-field">
                                <option value="">Priority</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" id="close-modal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add Task</button>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update Task</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>