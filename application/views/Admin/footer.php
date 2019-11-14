        <?php echo '<script>base_url = "' . base_url() . '";</script>';?>
        <!-- Jquery JS-->
        <!-- <script src="<?php //echo base_url();?>assets/vendor/jquery.min.js"></script> -->
         <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url();?>js/ui/jquery-ui.js"></script>
        <!-- Bootstrap JS-->
        <script src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>

        <!-- My adding -->
        <script src="<?php echo base_url();?>assets/vendor/slick/slick.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/wow/wow.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/animsition/animsition.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/counter-up/jquery.counterup.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/circle-progress/circle-progress.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/select2/select2.min.js"></script>
        <!-- end -->
        
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
        <script src="<?php echo base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/socket.io-client/dist/socket.io.js"></script>
         <script src="<?php echo base_url();?>assets/global/plugins/jquery.twbsPagination.js"></script>
        <!--  Sortable -->
        <?php if($parent == 'menu'){?>
        <script src="<?php echo base_url();?>assets/global/plugins/sortable/jquery.mjs.nestedSortable.js"></script>
        <script src="<?php echo base_url();?>assets/js/admin/sortable.js"></script>
        <script src="<?php echo base_url();?>assets/js/admin/menusetting.js"></script>
        <?php }?>
        <!-- Vendor JS       -->
        <script src="<?php echo base_url();?>assets/pages/scripts/table-datatables-managed.js" type="text/javascript"></script>
        <?php if($parent == 'product'){?>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
        <?php }?>
        <script src="<?php echo base_url();?>assets/js/ajaxfileupload.js" type="text/javascript"></script>
         <?php if($parent == 'product'){?>
        <script src="<?php echo base_url();?>assets/pages/scripts/form-dropzone.js" type="text/javascript"></script>
        <?php }?>
        <?php if($parent == 'blog'){?>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <?php }?>
        <script src="<?php echo base_url();?>assets/vendor/animsition/animsition.min.js"></script>
        <!-- Main JS-->
        <script src="<?php echo base_url();?>assets/js/main.js"></script>
        <?php if($parent == 'feature'){?><script src='<?php echo base_url();?>assets/js/admin/newfeature.js?>'></script><?php }?>
         <script src='<?php echo base_url();?>assets/global/plugins/jstree/dist/jstree.min.js'></script>
         <script src='<?php echo base_url();?>assets/js/admin/tree_init.js?>'></script>
        <?php if($parent == 'category'){?>
       
        <script src='<?php echo base_url();?>assets/js/admin/addcategory.js?>'></script><?php }?>
        <?php if($parent == 'vendor' || $parent == 'buyer' || $parent == 'admins' || $parent == 'admin'){?>
        <script src="<?php echo base_url();?>assets/global/plugins/image-picker/image-picker.js"></script>
        <script src='<?php echo base_url();?>assets/js/admin/user.js'></script>
        <?php }?>
        <?php if($parent == 'product'){?><script src='<?php echo base_url();?>assets/js/admin/product.js'></script>
        <?php } if($parent == 'review'){?>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url();?>assets/js/admin/review.js"></script>
        <?php }if($parent == 'blog'){?>
       
        <script src="<?php echo base_url();?>assets/js/admin/blog.js"></script>
        <?php } if($parent == 'comparetable'){?>
        <script src="<?php echo base_url();?>assets/js/admin/comparetable.js"></script>
        <?php }?>
        <?php if($parent == 'resource_setting'){?>
        <script src="<?php echo base_url();?>assets/js/admin/reviewsetting.js"></script>
        <?php }?>

    </body>
</html>