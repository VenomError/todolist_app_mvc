<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= asset() ?>assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= asset() ?>assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?= asset() ?>assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= asset() ?>assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <?php
                foreach (config('sidebar') as $role => $items) { ?>
                    <?php if (auth()->user()->role == $role) { ?>
                        <?php foreach ($items as $index => $side) { ?>

                            <?php if (empty($side[ 'sub' ])) { ?>
                                <li class="nav-item ">
                                    <a class="nav-link menu-link <?php getUri() == $side[ 'route' ] ? 'active' : '' ?> "
                                        href="<?= url($side[ 'route' ]) ?>">
                                        <i class="<?= $side[ 'icon' ] ?>"></i> <span
                                            data-key="t-widgets"><?= ucfirst($side[ 'title' ]) ?></span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item  ">
                                    <a href="#<?= $side[ 'route' ] ?>" class="nav-link" data-bs-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="<?= $side[ 'route' ] ?>" data-key="t-tasks">
                                        <i class="<?= $side[ 'icon' ] ?>"></i>
                                        <?= ucwords($side[ 'title' ]) ?>
                                    </a>
                                    <div class="collapse menu-dropdown active" id="<?= $side[ 'route' ] ?>">
                                        <ul class="nav nav-sm flex-column ">

                                            <?php foreach ($side[ 'sub' ] as $index => $sub) { ?>
                                                <li class="nav-item ">
                                                    <a href="<?= url($sub[ 'route' ]) ?>" class="nav-link" data-key="t-kanbanboard">
                                                        <?= ucwords($sub[ 'title' ]) ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php }
                        }
                    }
                } ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>