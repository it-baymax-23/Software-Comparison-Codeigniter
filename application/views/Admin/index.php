 

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <a class="col-sm-6 col-lg-4" href="<?php echo base_url()?>admin/user">
                                <div class="overview-item overview-item--c1" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo isset($user['vendor'])?$user['vendor']:0;?></h2>
                                                <span>The Count Of Vendors</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a> 
                            <a class="col-sm-6 col-lg-4" href="<?php echo base_url()?>admin/user">
                                <div class="overview-item overview-item--c1" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo isset($user_recently['vendor'])?$user_recently['vendor']:0;?></h2>
                                                <span>The Count Of Vendors Recently Registered</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                             <a class="col-sm-6 col-lg-4" href="<?php echo base_url()?>admin/user">
                                <div class="overview-item overview-item--c1" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo isset($userwait['vendor'])?$userwait['vendor']:0;?></h2>
                                                <span>The Count Of Vendors For Waiting Verified</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="col-sm-6 col-lg-4" href="<?php echo base_url()?>admin/user">
                                <div class="overview-item overview-item--c2" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo isset($user['buyer'])?$user['buyer']:0;?></h2>
                                                <span>The Count Of Users</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo base_url()?>admin/user" class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c2" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo isset($user_recent['buyer'])?$user_recent['buyer']:0;?></h2>
                                                <span>The Count Of Users Recently Registered</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="<?php echo base_url()?>admin/user" class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c2" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo isset($userwait['buyer'])?$userwait['buyer']:0;?></h2>
                                                <span>The Count Of Users For Waiting Verified</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo base_url()?>admin/product" class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo $product;?></h2>
                                                <span>The Count of Products</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo base_url()?>admin/product" class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo $product_recent;?></h2>
                                                <span>The Count of Products Recently Added</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo base_url()?>admin/product" class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo $product_review;?></h2>
                                                <span>The Count of Products Reviewed</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo base_url()?>admin/blog" class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c4" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="fas fa-comments"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo $resource;?></h2>
                                                <span>The Count of Resources Posted</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo base_url()?>admin/blog" class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c4" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="fas fa-comments"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo $resource_recent;?></h2>
                                                <span>The Count of Resources Recently Posted</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo base_url()?>admin/blog" class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c4" style="height:150px;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon" style="width:20%;">
                                                <i class="fas fa-comments"></i>
                                            </div>
                                            <div class="text" style="width:70%;">
                                                <h2><?php echo $resource_recent;?></h2>
                                                <span>The Count of Resources Posted Reommended</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
