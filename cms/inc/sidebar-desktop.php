        <!-- MENU SIDEBAR DESKTOP VIEW -->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?php echo CMS_URL.'/dashbord.php';?>">
                    <img src="<?php echo ADMIN_IMG . '/icon/bt.png'; ?> " />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <?php require  $_SERVER['DOCUMENT_ROOT'] . '/cms/' . lcfirst($_SESSION['Role']) . '/' . lcfirst($_SESSION['Role']) . '-sidebar-list.php'; ?>
                        <!-- Requires all the sidebar list -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR DESKTOP VIEW -->