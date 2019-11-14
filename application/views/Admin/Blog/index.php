<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="user-data col-lg-12 m-b-20">
                    <div class="portlet box green">
                        <div class="row m-t-20">
                            <a href="<?php echo base_url();?>admin/blog/newblog" class="btn btn-success m-l-10" style="border-radius: 20px;">Add New Blog Post<i class="fa fa-plus-circle" style="margin-left:10px;"></i></a>
                        </div>
                        <div class="row m-b-30" id="category">
                            <span class="category btn btn-primary col-lg-2 m-l-10 m-t-10" attr_id="">All</span>
                            <?php foreach($maincategory as $maincategories){?>
                                <span class="category btn btn-outline-primary col-lg-2 m-l-10 m-t-10" attr_id = "<?php echo $maincategories['id']?>"><?php echo $maincategories['name'];?></span>
                            <?php }?>
                        </div>
                    	<div class="row" id="blogs">
                            <?php foreach($blog as $blogs){?>
                            	<div class="col-md-4 page-card">
                            		<div class="card">
                            			<img class="card-img-top" src="<?php echo base_url() . $blogs['logo'];?>" alt="Card image cap" style="height:200px;">
                                        <div class="date" style="position:absolute;background-color: #ffffff;color:black; border-radius: 20px;"> &nbsp;<?php echo $blogs['created_date'];?> &nbsp;</div>
                                        <div class="card-body">
                                            <h4 class="card-title mb-3" style="max-width:90%;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?php echo $blogs['title'];?></h4>
                                            <div class="card-text" style="height:200px;overflow-y: hidden;">
                                            	<?php echo $blogs['description'];?>
                                            </div>
                                        </div>
                                        <div class="cart-action row" style="padding:0px;margin:0px;">
                                            <span class="btn btn-danger col-md-6 deleteblog" attr_id="<?php echo $blogs['id'];?>"><i class="fas fa-trash" style="margin-right:10px;"></i> Delete</span>
                                            <a href="<?php echo base_url() .'admin/blog/newblog/' .  $blogs['id'];?>" class="btn btn-primary col-md-6"><i class="fas fa-edit" style="margin-right:10px;"></i> Edit</a>
                                        </div>	
                            		</div>
                            	</div>
                            <?php }?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <nav class="aria-pagination" aria-label="Page navigation" style="margin-bottom:30px; float: right;">
                                    <ul class="pagination" id="pagination" style="margin-left: 0px;"></ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>