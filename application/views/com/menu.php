<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a href="index-2.html" class="logo">
                <img src="<?php echo base_url('assets/img/logo.png') ?>"width="35" height="35" alt=""> <span></span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <i class="fa fa-user"></i><span>&nbsp;<?php echo strtoupper($this->session->userdata("util_login")) ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo site_url(array("Service", "logout")) ?>">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="login.html">Logout</a>
            </div>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Gestion de quittance</li>
                    <li <?php if (isset($module) && $module == 0) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('Tbd') ?>"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-money"></i> <span> Docteurs </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li <?php if (isset($module) && $module == 1) echo "class='active'"; ?>>
                                <a href="<?php echo site_url('Docteur') ?>"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                            </li>
                            <li <?php if (isset($module) && $module == 12) echo "class='active'"; ?>>
                                <a href="<?php echo site_url('DocteurRecap') ?>"><i class="fa fa-money"></i> <span>Recapitulatif de payement</span></a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if (isset($module) && $module == 2) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('Patient') ?>"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                    </li>
                    <li <?php if (isset($module) && $module == 3) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('Consultation') ?>"><i class="fa fa-cube"></i> <span>Consultation</span></a>
                    </li>
                    <li <?php if (isset($module) && $module == 4) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('Certificatmedical') ?>"><i class="fa fa-calendar"></i> <span>Certificat Medical</span></a>
                    </li>
                    <li <?php if (isset($module) && $module == 5) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('Hebergement') ?>"><i class="fa fa-hospital-o"></i> <span>Herbergement</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-money"></i> <span> Soins Externes </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li <?php if (isset($module) && $module == 6) echo "class='active'"; ?>><a href="<?php echo site_url('Analyse') ?>">Analyse</a></li>
                            <li <?php if (isset($module) && $module == 7) echo "class='active'"; ?>><a href="<?php echo site_url('Banquedesang') ?>">Banque de sang</a></li>
                            <li <?php if (isset($module) && $module == 8) echo "class='active'"; ?>><a href="<?php echo site_url('Echographie') ?>">Echographie</a></li>
                            <li <?php if (isset($module) && $module == 10) echo "class='active'"; ?>><a href="<?php echo site_url('Radio') ?>">Radio</a></li>
                        </ul>
                    </li>
                    <li <?php if (isset($module) && $module == 11) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('Utilisateur') ?>"><i class="fa fa-user"></i> <span>Utilisateur</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>