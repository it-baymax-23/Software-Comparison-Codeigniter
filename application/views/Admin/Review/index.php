
    <!-- BEGIN CONTENT BODY -->
    <div class="main-content p-b-50">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row user-data">
            		<h3 class="title-3 m-b-20" style="padding-left: 20px; padding-right: 5px; font-size: 20px; font-weight: bold;"><i class="fas fa-star"></i>All Reviews</h3>             		
    				<div class="col-md-12 col-lg-12" style="padding:30px 20px">
        				<table class="table table-striped table-bordered table-hover order-column text-center" id="sample_1" style="font-size: 14px;">
        					<thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Product Name</th>
                                    <th>Title</th>
                                    <th> Over all </th>
                                    <th>Date</th>
                                    <th>Author</th>
                                    <th>Activate</th>
                                    <th>Action</th>
                                </tr>
        					</thead>
        					<tbody>
        						<?php foreach($review as $reviews){?>
        							<tr class="odd gradeX">
                                        <td style="vertical-align: middle;text-align: center;"><img src="<?php echo base_url() . $reviews['logo'];?>" style="width:auto;height:50px;"/></td>
                                        <td style="vertical-align: middle;text-align: center;"><?php echo $reviews['name'];?></td>
                                        <td style="vertical-align: middle;text-align: center;">
                                        	<?php echo $reviews['title'];?>
                                        </td>
                                        <td style="vertical-align: middle;text-align: center; width: 100px;">
                                            <span>
                                                <?php for($index = 0;$index<$reviews['over_all'];$index++){?>
                                                <i class="fas fa-star" style="color:yellow"></i>
                                                <?php }?>
                                                <?php for($index = $reviews['over_all'];$index<5;$index++){?>
                                                <i class="far fa-star"></i>
                                                <?php }?>
                                            </span>
                                        </td>
                                        <td style="vertical-align: middle;text-align: center;">
                                            <?php echo date_format(date_create($reviews['created_date']),'Y-m-d');?>
                                        </td>
                                        <td style="vertical-align: middle;text-align: center;">
                                            <?php echo isset($reviews['author'])?$reviews['author']:'';?>
                                        </td>
                                        <td style="vertical-align: middle;text-align: center;">
                                            <label class="switch">
                                              <input class="activate" type="checkbox" attr_id="<?php echo $reviews['id'];?>" <?php if($reviews['activate']){echo 'checked';}?>>
                                              <span class="slider_checkbox round"></span>
                                            </label>
                                        </td>
                                        <td style="vertical-align: middle;text-align: center; width: 100px;">
                                        	<a class="btn btn-primary editreview" href="<?php echo base_url();?>admin/review/editreview/<?php echo $reviews['id'];?>" style="margin-top: 5px;">
                                        		<i class="fa fa-edit"></i>
                                        	</a>
                                        	<span class="btn btn-danger deletereview" attr_id="<?php echo $reviews['id']; ?>" style="margin-top:5px;">
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
