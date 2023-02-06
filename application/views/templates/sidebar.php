<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->
    <?php

    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `tb_menu`.`id`, `menu` FROM `tb_menu` JOIN `tb_access_menu` ON `tb_menu`.`id` = `tb_access_menu`.`menu_id` WHERE `tb_access_menu`.`role_id` = $role_id ORDER BY `tb_access_menu`.`menu_id` ASC";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) :
    ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            <?php echo $m['menu'];
            ?>
        </div>

        <!-- SIAPKAN SUBMENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * FROM `tb_sub_menu` JOIN `tb_menu` ON `tb_sub_menu`.`menu_id` = `tb_menu`.`id` WHERE `tb_sub_menu`.`menu_id` = $menuId AND `tb_sub_menu`.`is_active` = 1";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) :
        ?>
            <!-- Nav Item - Dashboard -->
            <?php if ($title == $sm['title']) :
            ?>
                <li class="nav-item active">
                <?php else :
                ?>
                <li class="nav-item">
                <?php endif;
                ?>
                <a class="nav-link" href="<?php echo base_url($sm['url']);
                                            ?>">
                    <i class="<?php echo $sm['icon'];
                                ?>"></i>
                    <span><?php echo $sm['title'];
                            ?></span></a>
                </li>
            <?php endforeach
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

        <?php endforeach
        ?>


        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->