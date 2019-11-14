<style type="text/css">
    #sample_1_wrapper
    {
        width: 100%;
    }
</style>
<?php $usertype = get_role();?>
<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="user-data col-lg-12">
                	<div class="portlet-title">
                		<h3 class="title-3 m-b-20" style="padding-left: 5px; padding-right: 5px; font-size: 20px; font-weight: bold;"><i class="fab fa-product-hunt"></i>All Products <?php if(isset($user)){ echo 'In ' . ucfirst($user['company']) . ' Company';} ?></h3>
                	</div>
                	<div class="portlet-body">
                		<div class="table-toolbar">
                			<div class="row">
                				<div class="col col-sm-6 col-md-6 col-lg-6 col-xs-6">
                					<?php if($usertype !='vendor' && $usertype != 'user'){?>
                                    <a href="<?php echo base_url();?>admin/product/newproduct" id="add_new_user" class="btn btn-primary" style="border-radius: 20px; ">
                						Add New<i class="fa fa-plus-circle" style="margin-left:10px;"></i>
                					</a>
                                    <?php }?>
                				</div>
                				<div class="col col-sm-6 col-md-6 col-lg-6 col-xs-6">
                					<button id="delete_product" class="btn btn-danger pull-right" style="margin-right:5px; border-radius: 20px;">
                						Delete<i class="fa fa-trash" style="margin-left:10px;"></i>
                					</button>
                				</div>
                			</div>
                			<div class="row">
                                <div class="col-lg-12" style="padding:30px 20px">
                    				<table class="table table-striped table-bordered table-hover table-checkable order-column table-scrollable text-center productlist" id="sample_1" style="font-size: 14px;">
                    					<thead>
                                            <tr>
                                                <th>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th>Logo</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Followers</th>
                                                <th>Popular</th>
                                                <th>Activate</th>
                                                <th>Actions</th>
                                            </tr>
                    					</thead>
                    					<tbody>
                    						<?php foreach($product as $products){?>
                    							<tr class="odd gradeX">
                    								<td style="vertical-align: middle;text-align: center;">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
                                                            <input type="checkbox" class="checkboxes" value="<?php echo $products['id'];?>" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td style="vertical-align: middle;text-align: center;"><img src="<?php echo base_url() . $products['logo'];?>" style="width: auto; height: 50px;"/></td>
                                                    <td style="vertical-align: middle;text-align: center;"><?php echo $products['name'];?></td>
                                                    <td style="vertical-align: middle;text-align: center;"><?php echo $products['category'];?></td>
                                                    <td  style="vertical-align: middle;text-align: center;" attr_id="<?php echo $products['id'];?>">0</td>
                                                    <td style="vertical-align: middle;text-align: center;">
                                                        <label class="switch">
                                                          <input class="popular" type="checkbox" attr_id="<?php echo $products['id'];?>" <?php if($products['popular']){echo 'checked';}?>>
                                                          <span class="slider_checkbox round"></span>
                                                        </label>
                                                    </td>
                                                    <td style="vertical-align: middle;text-align: center;">
                                                        <label class="switch">
                                                          <input class="activate" type="checkbox" attr_id="<?php echo $products['id'];?>" <?php if($products['activated']){echo 'checked';}?>>
                                                          <span class="slider_checkbox round"></span>
                                                        </label>
                                                    </td>
                                                    <td style="vertical-align: middle;text-align: center;">
                                                		<button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                                        </button>
                                                        <ul class="dropdown-menu pull-right" role="menu" style="min-width:13rem;">
                                                            <div class="account-dropdown__body">
                                                                <div class="account-dropdown__item">
                                                                    <a href="<?php echo base_url();?>admin/product/newproduct/<?php echo $products['id'];?>" style="font-size: 12px;">
                                                                        <i class="fa fa-edit"></i> Edit</a>
                                                                </div>
                                                                <div class="account-dropdown__item">
                                                                    <a href="javascript:;" class="delete" attr-id="<?php echo $products['id'];?>" style="font-size: 12px;">
                                                                        <i class="fa fa-trash"></i> Delete</a>
                                                                </div>
                                                                <?php if($usertype !='vendor' && $usertype != 'user'){?>
                                                                <div class="account-dropdown__item">
                                                                    <a href="<?php echo base_url();?>admin/review/newreview/<?php echo $products['id'];?>" class="writereview" style="font-size: 12px;"><i class="fas fa-pencil-alt"></i>Write Review</a>
                                                                </div>
                                                                <?php }?>
                                                                <div class="account-dropdown__item">
                                                                    <a href="<?php echo base_url();?>admin/review/getreview/<?php echo $products['id'];?>" class="getreview" style="font-size: 12px;"><i class="fas fa-search"></i>Get Review</a>
                                                                </div>
                                                                <div class="account-dropdown__item">
                                                                    <a class="moreinfo" attr-id="<?php echo $products['id'];?>" style="font-size: 12px;"><i class="fas fa-info-circle"></i>More Info</a>
                                                                </div>
                                                                <?php if($usertype !='vendor' && $usertype != 'user'){?>
                                                                <div class="account-dropdown__item">
                                                                    <a class="reviewsetting" href="<?php echo base_url();?>admin/reviewsetting/<?php echo $products['id'];?>" style="font-size: 12px;"><i class="fas fa-cogs"></i>Review Settings</a>
                                                                </div>
                                                                <?php }?>
                                                            </div>
                                                        </ul>
                                                    </td>
                    							</tr>
                    						<?php }?>
                    					</tbody>
                    				</table>
                                </div>
                			</div>
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Product Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                
            </div>
            <div class="modal-body">
                <div class="row" style="padding: 15px;">
                    <div class="col-md-3 logo" style="vertical-align: middle;">
                      
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="row">
                                <h3 class="name"></h3>
                            </div>                            
                        </div><br>
                        <p class="description"></p>                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
 </div>