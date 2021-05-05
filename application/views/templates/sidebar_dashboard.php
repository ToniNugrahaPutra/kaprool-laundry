<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-white">
      <div class="sidebar-brand-text">Kaprool-Laundry</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->
    <?php

    # JOIN => USER_MENU & USER_ACCESS_MENU
    # USER_MENU(ID) DENGAN USER_ACCESS_MENU(MENU_ID)

    # ATRIBUT : ID & MENU
    # 2 ATRIBUT USER_MENU DI JOIN DENGAN TABEL USER_ACCESS_MENU
    # PENCOCOKAN USER_MENU(ID) DENGAN USER_ACCESS_MENU(MENU_ID)
    # CONDITION : USER_ACCESS_MENU(ROLE_ID) SESUAI DENGAN USER YANG LAGI LOGIN (SESSION SAAT LOGIN)

    $userActiveLogin = $this->session->userdata('role_id');

    $queryMenu = "SELECT user_menu.id, menu FROM user_menu JOIN user_access_menu
                                  ON user_menu.id = user_access_menu.menu_id
                                  WHERE user_access_menu.role_id = $userActiveLogin
                                  ORDER BY user_access_menu.menu_id ASC
                                  ";

    $menu = $this->db->query($queryMenu)->result_array(); // konversi ke array

    ?>


    <?php foreach ($menu as $m) : ?>
      <!-- MENU -->
      <!-- JOIN USER_MENU & USER_ACCESS_MENU -->
      <div class="sidebar-heading">
        <?= $m["menu"] ?>
      </div>

      <!-- SUB MENU -->
      <!-- JOIN TABEL MENU DAN SUBMENU -->
      <?php
      $menu_id = $m["id"];
      $querySubMenu = "SELECT * FROM user_sub_menu JOIN user_menu
                                  ON user_sub_menu.menu_id = user_menu.id
                                  WHERE user_sub_menu.menu_id = $menu_id
                                  AND user_sub_menu.is_active = 1
                                  ";
      $subMenu = $this->db->query($querySubMenu)->result_array(); // konversi ke array
      ?>

      <?php foreach ($subMenu as $sm) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url($sm["url"]) ?>">
            <i class="<?= $sm["icon"] ?>"></i>
            <span><?= $sm["title"] ?></span></a>
        </li>
      <?php endforeach ?>

    <?php endforeach ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-fw fa-sign-out-alt fa-sm mr-2"></i>
        <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->