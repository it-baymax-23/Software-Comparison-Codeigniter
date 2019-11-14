<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>App Store Admin</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="App Store Admin Page" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link href="<?php echo base_url()?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="<?php echo base_url()?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/ui/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/image-picker/image-picker.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/sortable.css"/>
        <style>
            .pagination > li > a, .pagination > li > span {
                    position: relative;
                    float: left;
                    padding: 6px 12px;
                    line-height: 1.42857;
                    text-decoration: none;
                    color: #337ab7;
                    background-color: #fff;
                    border: 1px solid #ddd;
                        border-top-color: rgb(221, 221, 221);
                        border-right-color: rgb(221, 221, 221);
                        border-bottom-color: rgb(221, 221, 221);
                        border-left-color: rgb(221, 221, 221);
                    margin-left: -1px;
                }

            .pagination > .disabled > a, .pagination > .disabled > a:focus, .pagination > .disabled > a:hover, .pagination > .disabled > span, .pagination > .disabled > span:focus, .pagination > .disabled > span:hover {
                    color: #777;
                    background-color: #fff;
                    border-color: #ddd;
                    cursor: not-allowed;
                }

                .switch {
                  position: relative;
                  display: inline-block;
                  width: 60px;
                  height: 34px;
                }

                .switch input { 
                  opacity: 0;
                  width: 0;
                  height: 0;
                }

                .slider_checkbox {
                  position: absolute;
                  cursor: pointer;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background-color: #ccc;
                  -webkit-transition: .4s;
                  transition: .4s;
                }

                .slider_checkbox:before {
                  position: absolute;
                  content: "";
                  height: 26px;
                  width: 26px;
                  left: 4px;
                  bottom: 4px;
                  background-color: white;
                  -webkit-transition: .4s;
                  transition: .4s;
                }

                input:checked + .slider_checkbox {
                  background-color: #2196F3;
                }

                input:focus + .slider_checkbox {
                  box-shadow: 0 0 1px #2196F3;
                }

                input:checked + .slider_checkbox:before {
                  -webkit-transform: translateX(26px);
                  -ms-transform: translateX(26px);
                  transform: translateX(26px);
                }

                /* Rounded sliders */
                .slider_checkbox.round {
                  border-radius: 34px;
                }

                .slider_checkbox.round:before {
                  border-radius: 50%;
                }
        </style>
        <!-- Bootstrap CSS-->
        <link href="<?php echo base_url()?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/build.css"/>
        <link href = "<?php echo base_url();?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- Vendor CSS-->
        <link href="<?php echo base_url()?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url()?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url()?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
         <?php if($parent == 'product'){?>
         <link href="<?php echo base_url();?>assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
         <?php }?>
         <?php if($parent == 'blog'){?>
         <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
         <?php }?>
         <?php if($parent == 'comparetable'){?>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/table/css/style.css"/>
         <?php }?>
         <?php if($parent == 'review'){?>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css"/>
         <?php }?>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/jstree/dist/themes/default/style.min.css"/>
         <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
         <!-- <link href="<?php echo base_url();?>assets/global/css/components-rounded.min.css" rel="stylesheet" type="text/css" /> -->
         <link href="<?php echo base_url()?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
         <link href="<?php echo base_url()?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
         <link href="<?php echo base_url()?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
         <link href="<?php echo base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
         <link href="<?php echo base_url()?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
         <link href="<?php echo base_url()?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
         <link href="<?php echo base_url()?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
        
        <!-- Main CSS-->
        <link href="<?php echo base_url()?>assets/css/theme.css" rel="stylesheet" media="all">
        <!-- END HEAD -->

        <body class="animsition">
            <div class="page-wrapper">
            <!-- HEADER MOBILE-->
                <header class="header-mobile d-block d-lg-none">
                    <div class="header-mobile__bar">
                        <div class="container-fluid">
                            <div class="header-mobile-inner">
                                <a class="logo_social" href="<?php echo base_url()?>admin">
                                    <!-- <img src="<?php echo base_url();?>images/icon/logo-mini.png" alt="Social Software"/>
                                    <span style="font-weight: bold; font-size: 16px;"> &nbsp;Software Compare</span> -->
                                    <img src="<?php echo base_url();?>images/home/logo.png" style="height: 70px; width: auto;"/>
                                </a>
                                <button class="hamburger hamburger--slider" type="button">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar-mobile">
                        <div class="container-fluid">
                            <ul class="navbar-mobile__list list-unstyled">
                                <li class="<?php if($parent == 'home'){echo 'active';}?>">
                                    <a class="js-arrow" href="<?php echo base_url();?>admin">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                </li>
                                <li class="has-sub <?php if($parent == 'category'){echo 'active';}?>">
                                    <a class="js-arrow open" href="#">
                                        <i class="fa fa-archive"></i>Category</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="<?php echo base_url();?>admin/category">All Category</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>admin/category/newcategory">New Category</a>
                                        </li>
                                    </ul>
                                </li>
                                 <li class="has-sub <?php if($parent == 'feature'){echo 'active';}?>">
                                    <a class="js-arrow open" href="#">
                                        <i class="fa fa-tasks"></i>Feature</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="<?php echo base_url();?>admin/feature">All Feature</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>admin/feature/newfeature">New Feature</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub <?php if($parent == 'user'){echo 'active';}?>">
                                    <a class="js-arrow open" href="#">
                                        <i class="fas fa-users"></i>Users</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="<?php echo base_url();?>admin/user">All Users</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>admin/user/newuser">New User</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub <?php if($parent == 'product'){echo 'active';}?>">
                                    <a class="js-arrow open" href="#">
                                        <i class="fab fa-product-hunt"></i>Products</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="<?php echo base_url();?>admin/product">All Products</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>admin/product/newproduct">New Product</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- END HEADER MOBILE-->
                 