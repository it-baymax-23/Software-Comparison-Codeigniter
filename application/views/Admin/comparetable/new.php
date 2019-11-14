<style>
	 .delete-feature
  {
    position:absolute;
    right:0px;
    top:3px;
    color:black;
  }	

  .delete-feature:hover
  {
    color:red;
  }

  .delete-product
  {
  	position:absolute;
    right:0px;
    top:3px;
    color:black;
  }

  .delete-product:hover
  {
  	color:red;
  }

  td
  {
  	position: relative;
  }

  th
  {
  	position: relative;
  }
</style>

<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
        	<div class="row user-data m-t-30" style="padding: 30px;">
        		<div class= "col-md-12">
        			<span class="title-3" style="padding-left: 5px; font-weight: bold;"><i class="fa fa-archive"></i> Add Your Comparision Table </span>
        			<?php if(!isset($compare)){?>
        			<span class="btn btn-success savecompare pull-right"> Save Compare Table <i class="fas fa-save" style="margin-left:10px;"></i></span>
        			<?php } else{?>
        			<span class="btn btn-success editcompare pull-right" attr_id="<?php echo $compare['id'];?>"> Edit Compare Table <i class="fas fa-edit" style="margin-left:10px;"></i></span>
        			<?php }?>
        		</div>
        		

        		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 m-t-30 m-b-30">
        			<div class="row" style="padding-bottom: 10px;">
        				<label class="col col-xs-6 col-sm-6 col-md-3 col-lg-3">Compare Table Name</label>
        				<div class="col col-xs-6 col-sm-6 col-md-3 col-lg-3">
        					<input type="text" class="form-control" name="name" value="<?php if(isset($compare)){echo $compare['name'];}?>">
        				</div>
        			</div>
        			<div class="row">
        				<label class="col col-xs-6 col-sm-6 col-md-3 col-lg-3">Compare Table Slug</label>
        				<div class="col col-xs-6 col-sm-6 col-md-3 col-lg-3">
        					<input type="text" class="form-control" name="slug" value="<?php if(isset($compare)){echo $compare['slug'];}?>">
        				</div>
        				<div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6">
		        			<div class="pull-right">
			        			<span class="btn btn-primary add_feature_to_table"  style="border-radius: 20px;" data-toggle="modal" data-target="#basic">Add Feature <i class="fa fa-plus-circle" style="margin-left:10px;"></i></span>
			        		</div>
		        		</div>
        			</div>
        			<hr/>
        			<div class="row m-t-30">
        				<div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6">
        					<h3>The Table Content</h3>
        				</div>
        				<div class="col col-xs-6 col-md-6 col-sm-6 col-lg-6">
        					<select class="form-control" name="type" id="comparetype" style="float: right; width: 50%;">
        						<option value="table1">Table 1</option>
        						<option value="table2">Table 2</option>
        						<option value="table3">Table 3</option>
        					</select>
        				</div>
        			</div>

        			<div class="row" style="margin:30px 0px;min-height:300px;border-style:solid;border-width:1px;border-color:grey;overflow-x: scroll;">
        				<?php if(!isset($compare)){?>
        				<table id="comparetable" class="table1 text-center" style="width:100%;">
			                <thead>
			                    <tr>
			                        <th>Logo</th>
			                        <th>Product Name</th>
			                    </tr>
			                </thead>
			                <tbody>
			                    
			                </tbody>
			            </table>
			            <?php }else{
			            	echo $compare['content'];
			            }?>
        			</div>
        		</div>
        	</div>

        	<div class="row user-data m-t-30" id="compareproduct">
        		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="padding:10px 30px;">
        			<table class="table table-striped table-bordered table-hover table-checkable order-column table-scrollable text-center" id="sample_1" style="font-size: 14px;">
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
			                    <th>Add to table</th>
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
		                        <td style="vertical-align: middle;text-align: center;"><img src="<?php echo base_url() . $products['logo'];?>" style="height: 50px; width: auto;"/></td>
		                        <td style="vertical-align: middle;text-align: center;"><?php echo $products['name'];?></td>
		                        <td style="vertical-align: middle;text-align: center;"><?php echo $products['category'];?></td>	
		                        <td style="vertical-align: middle;text-align: center;"><span class="btn btn-primary add_to_compare" attr_id="<?php echo $products['id'];?>"> Add to table <i class="fas fa-plus-circle" style="margin-left:10px;"></i></span></td>	                        
		                    </tr>
		                 <?php }?>
		                </tbody>
		            </table>
        		</div>
        	</div>
        </div>
    </div>
</div>

<div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Please Add Feature To Compare</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	                
	            </div>
	            <div class="modal-body">
	             	<div class="row">
	             		<div class="col col-lg-12 col-sm-12 col-xs-12 col-md-12">
	             			<table class="table table-striped table-bordered table-hover table-checkable order-column text-center" id="sample_2" style="font-size: 14px;">
              					<thead>
		                            <tr>
		                                <th> Name </th>
		                                <th> Type </th>
		                                <th> Actions </th>
		                            </tr>
              					</thead>
              					<tbody>
	      						<?php foreach($feature as $features){?>
	      							<tr class="odd gradeX">
		                              <td style="vertical-align: middle;text-align: center; min-width:100px;"><?php echo $features['name'];?></td>
		                              <td style="vertical-align: middle;text-align: center;"><?php echo $features['type'];?></td>
		                              <td style="vertical-align: middle;text-align: center;">
		                              	<span class="btn btn-primary addfeature" attr_id="<?php echo $features['id'];?>">
		                              		Add to table<i class="fa fa-plus-circle" style="margin-left: 10px;"></i>
		                              	</span>
		                              </td>
	              					</tr>
	          						<?php }?>
	          					</tbody>
	          				</table>
	             		</div>
	             	</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
	            </div>
	        </div>
	    </div>
 </div>