<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo" style="padding:10px 10px;">
                <a href="#">
                    <!--<img src="<?php echo base_url();?>images/icon/logo-mini.png" alt="Software Compare" />
                    <span style="font-weight: bold; font-size: 16px;"> &nbsp;Software Compare</span>-->
                    <img src="<?php echo base_url();?>images/home/logo.png" style="height: 70px; width: auto;" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                       <?php admin_role_menu();?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop" style="height: 75px;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap"  style="float:right;">
                            <div class="header-button" style="margin-top: 0px;">
                                <div class="noti-wrap">
                                    <div class="noti__item">
                                        <a href="<?php echo base_url() . 'admin/logout';?>"><i class="zmdi zmdi-power" style="margin-right:10px;"></i>Logout</a>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->