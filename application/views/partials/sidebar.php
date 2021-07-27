<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-laptop"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $this->config->item('site_name'); ?></div>
    </a>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Halaman
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('absen'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Absen</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('form'); ?>">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Form</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('guru'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Guru</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>