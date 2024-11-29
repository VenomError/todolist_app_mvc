<div class="dropdown ms-sm-3 header-item topbar-user">
    <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="d-flex align-items-center">
            <img class="rounded-circle header-profile-user" src="<?= asset() ?>assets/images/users/avatar-1.jpg"
                alt="Header Avatar">
            <span class="text-start ms-xl-2">
                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                    <?= auth()->user()->name ?>
                </span>
                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><?= auth()->user()->role ?></span>
            </span>
        </span>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <h6 class="dropdown-header">Welcome <?= auth()->user()->name ?></h6>
        <a class="dropdown-item" href="pages-profile.html"><i
                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                class="align-middle">Profile</span></a>
        <a class="dropdown-item" href="apps-chat.html"><i
                class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle">Messages</span></a>
        <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle">Taskboard</span></a>

        <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                class="align-middle" data-key="t-logout">Logout</span></a>
    </div>
</div>