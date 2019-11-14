<div class="main-content p-b-50">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row user-data">
                    <div class="col-md-12">
                    	<div class="portlet box green">
                    		<div class="portlet-title">
                    			<div class="caption">
                    				<h3 class="title-3" style="padding-left: 20px; padding-right: 20px; font-size: 20px; font-weight: bold;"><i class="fa fa-archive"></i>All Features</h3>
                    			</div>
                                <div class="filters m-b-0"  style="padding:30px 20px">
                                    <a href="<?php echo base_url()?>admin/feature/newfeature" id="add_new_feature" class="btn btn-primary" style="border-radius: 20px; ">
                                        Add New<i class="fa fa-plus-circle" style="margin-left:10px;"></i>
                                    </a>
                                    <button id="delete_feature" class="btn btn-danger pull-right" style="border-radius: 20px; ">
                                        Delete <i class="fa fa-trash" style="margin-left:10px;"></i>
                                    </button>
                                </div>
                    		</div>
            				<div class="col-md-12" style="padding-bottom: 30px;">
    	        				<table class="table table-striped table-bordered table-hover table-checkable order-column text-center" id="sample_1" style="font-size: 14px;">
    	        					<thead>
    	                                <tr>
    	                                    <th>
    	                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
    	                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
    	                                            <span></span>
    	                                        </label>
    	                                    </th>
    	                                    <th>Name</th>
    	                                    <th>Type</th>
    	                                    <th>Actions</th>
    	                                </tr>
    	        					</thead>
    	        					<tbody>
    	        						<?php foreach($feature as $features){?>
    	        							<tr class="odd gradeX">
    	        								<td style="vertical-align: middle;text-align: center;">
    	                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
    	                                                <input type="checkbox" class="checkboxes" value="<?php echo $features['id'];?>" />
    	                                                <span></span>
    	                                            </label>
    	                                        </td>
                                                <td style="vertical-align: middle;text-align: center;"><?php echo $features['name'];?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?php echo $features['type'];?></td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                	<a class="btn btn-primary edit" href="<?php echo base_url();?>admin/feature/newfeature/<?php echo $features['id'];?>">
                                                		 <i class="fa fa-edit"></i>
                                                	</a>
                                                	<span class="btn btn-danger delete">
                                                		<i class="fa fa-trash"></i>
                                                	</span>
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