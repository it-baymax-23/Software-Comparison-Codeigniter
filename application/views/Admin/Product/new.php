<style>
	.category .fa-times-circle:hover
	{
		color:red;
	}	
</style>
<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
	        <div class="row">
		        <div class="col-lg-12" style="padding:10px;">
		        	<div class="card">
			        	<div class="card-header">
			        		<span class="title-3 m-l-30"><i class="fab fa-product-hunt"></i> Add New Product</span>
			        		<span class="btn btn-success pull-right saveproduct" style="margin-right:15px;">Save<i class="fas fa-save" style="margin-left:10px;"></i></span>
			        		<a href="<?php echo base_url();?>admin/product" class="btn btn-danger pull-right" style="margin-right:15px;">Cancel</a>
			        	</div>
		        		<div class="card-body card-block" style="padding: 20px 100px;">
			            	<form action="<?php echo base_url();?>admin/user" method ='post' class="form-horizontal" id="productform" attr_id='<?php if(isset($id)){echo $id;}else{echo '';}?>'>
			            		<div class="form-body">
			            			
			            			<div class="row m-t-30">
			                			<h4  class="title-3" style="font-weight: bold;" >Product main info</h4>
			                        </div>
			            			<div class="form-group row m-t-30">
			            				<label class="form-control-label" style="font-weight: bold;">Product logo</label>
			            				<div class="col-md-12" style="padding: 0px;">
			                                <div class="fileinput fileinput-new" data-provides="fileinput">
			                                    <div class="fileinput-new thumbnail" style="width: 210px; height: 150px;border:solid 1px lightgray;">
			                                        <img src="http://www.placehold.it/210x150/EFEFEF/AAAAAA&amp;text=Not+selected" alt="" /> </div>
			                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 210px; max-height: 150px;"> </div>
			                                    <div>
			                                        <span class="btn default btn-file">
			                                            <span class="fileinput-new btn btn-success" style="margin-left: 35px;"> Select image </span>
			                                            <span class="fileinput-exists btn btn-primary"> Change </span>
			                                            <input type="file" name="file" id="logo"/>
			                                        </span>
			                                        <span href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </span>
			                                    </div>
			                                </div>
			                             </div>
			            			</div>
			                		<div class="form-group row" >
			                			<label class="form-control-label" style="font-weight: bold;">Product name</label>
			                            <input type="text" class="form-control maininfo input-circle-right" placeholder="Product name" name="name" required/>
			                		</div>
			                		<div class="form-group row">			                			
			                			<label class="form-control-label" style="font-weight: bold;">Categories</label>
			                			<div class="col-md-12 categories" style="border-style:solid;border-color:lightgray;border-width:1px;min-height:70px;padding:0px;"></div>
			                			<a class="btn btn-primary selectcategory" data-toggle="modal" href="#basic" style="max-height: 30px; font-size: 12px; margin-top:10px;border-radius: 20px;">Select Categories<i class="fa fa-plus-circle" style="margin-left:12px;"></i></a>			                			
			                		</div>
			                		<div class="form-group row">
			                			<label class="form-control-label" style="font-weight: bold;">Product description</label>
			                            <textarea class="form-control maininfo" placeholder="Product description" name="description"  rows="7" required> </textarea>
			                		</div>
			                		<div class="form-group row">
			                			<label class="form-control-label" style="font-weight: bold;">Company</label>
		                                <select class="bs-select maininfo form-control" data-live-search="true" data-size="8" name="user_id">
		                                	<?php foreach($vendor as $vendors){?>
		                                	<option value="<?php echo $vendors['id'];?>"><?php echo $vendors['company'];?></option>
		                                	<?php }?>
		                                </select>
			                		</div>
			                		<div class="form-group row">
			                			<label class="form-control-label" style="font-weight: bold;">About product</label>
			                            <textarea class="form-control maininfo" placeholder="Description" name="aboutproduct" rows="7" required> </textarea>
			                		</div>
			                		<button type="submit" style="display:none" id="productbutton"></button>
			                		</form>
			                		<hr/>

			                		<div class="row m-t-30">
			                			<h4  class="title-3" style="font-weight: bold;">Media</h4>
			                        </div>
			                        <div class="row m-t-10"> 			
			                			<label class="form-control-label" style="font-weight: bold;">Screenshot</label>
				        				<form action="<?php echo base_url();?>admin/product/upload" class="dropzone dropzone-file-area" id="my-dropzone" style=" width: 100%;">
			                                <h3 class="sbold" style="color: lightgray;">Drop files here or click to upload screenshot</h3>
			                                <p style="color: lightgray;"> You have to upload the screenshot for your software to satisfy the customers </p>
			                            </form>
			                        </div>
			                        <div class="form-group row" style="margin-top: 20px;">
				        				<label class="form-control-label" style="font-weight: bold;">Video url</label>
			                            <input type="url" class="form-control" name="video" placeholder="Video url" />
				        			</div>
				        			<hr/>

				        			<div class="row m-t-30">
			                			<h4  class="title-3" style="font-weight: bold;">Product details</h4>
			                        </div>
				        			<div class="m-t-10">
			        					<div class="form-group m-t-30 row">
			        						<label class="form-control-label" style="font-weight: bold;">Website url</label>
				                            <input type="url" class="form-control" placeholder="Website url" name="websiteurl">
			        					</div>
			        					<div class="form-group row">
			        						<label class="form-control-label" style="font-weight: bold;">Free trial url</label>
				                            <input type="url" class="form-control" placeholder="Free trial url" name="freetrial">
			        					</div>
			        					<div class="form-group row">
			        						<label class="form-control-label" style="font-weight: bold;">Free demo url</label>
				                            <input type="url" class="form-control" placeholder="Free Trial url" name="freetrial">
			        					</div>
			        					<div class="form-group row">
			        						<label class="form-control-label" style="font-weight: bold;">Price plan url</label>
				                            <input type="url" class="form-control" placeholder="Price plan url" name="priceplan">
			        					</div>
			        					<div class="form-group row">
			        						<label class="form-control-label" style="font-weight: bold;">Who use it</label>
				                            <input class="form-control" placeholder="Input users with comma. ex: user1,user2, ..." name="who_use">
			        					</div>
			        					<div class="form-group row">
			        						<label class="form-control-label" style="font-weight: bold;">Deploy</label>
				                			<div class="col-md-12" style="border-style:solid;border-width:1px;border-color:lightgray;">
				                				<div class="row" style="margin:10px; margin-top: 20px;" id="deploy">
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="webbase" class="styled" type="checkbox" value="webbase"/>
					                                	<label for="webbase">Web Based</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="windows" class="styled" type="checkbox" value="windows"/>
					                                	<label for="windows">Windows/Installed</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="android" class="styled" type="checkbox" value="android"/>
					                                	<label for="android">Android</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="ios" class="styled" type="checkbox" value="ios"/>
					                                	<label for="ios">IOS</label>	
					                                </div>
					                            </div>
				                			</div>
			        					</div>
			        					<div class="form-group row" class="start_price">
			        						<label class="form-control-label" style="font-weight: bold;">Starting price / month</label>
				                			<div class="col-md-12" style="padding: 0px;">
				                				<div class="input-group">
					                				<span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px;">
				                                        <i class="fa fa-usd"></i>
				                                    </span>
					                                <input class="form-control input-circle-right" placeholder="Input product starting price..." name="start_price" style="border-radius: 0px;">
					                            </div>
				                			</div>
			        					</div>
			        					<div class="form-group row">
			        						<label class="form-control-label" style="font-weight: bold;">Price Detail</label>
				                            <textarea class="form-control" placeholder="Input product real price" name="price_detail" rows="7"></textarea>
			        					</div>
			        					<div class="form-group row">
			        						<label class="form-control-label" style="font-weight: bold;">Price Model</label>
				                			<div class="col-md-12" style="border-style:solid;border-width:1px;border-color:lightgray;">
				                				<div class="row" style="margin:10px; margin-top:20px;" id="pricemodel">
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="free" class="styled" type="checkbox" value="free"/>
					                                	<label for="free">Free</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="freetrial" class="styled" type="checkbox" value="freetrial"/>
					                                	<label for="freetrial">Free Trial</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="onetime" class="styled" type="checkbox" value="onetime"/>
					                                	<label for="onetime">One Time</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="opensource" class="styled" type="checkbox" value="opensource"/>
					                                	<label for="opensource">Open Source</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="subscription" class="styled" type="checkbox" value="subscription"/>
					                                	<label for="subscription">Subscription</label>	
					                                </div>
					                            </div>
				                			</div>
			        					</div>
			        					<div class="form-group row">
			        						<label class="form-control-label" style="font-weight: bold;">Training</label>
				                			<div class="col-md-12" style="border-style:solid;border-width:1px;border-color:lightgray;">
				                				<div class="row" style="margin:10px; margin-top: 20px;" id="training">
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="inperson" class="styled" type="checkbox" value="inperson"/>
					                                	<label for="inperson">In person</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="liveonline" class="styled" type="checkbox" value="liveonline"/>
					                                	<label for="liveonline">Live online</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="webinars" class="styled" type="checkbox" value="Webinars"/>
					                                	<label for="webinars">Webinars</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="documentation" class="styled" type="checkbox" value="Documentation"/>
					                                	<label for="documentation">Documentation</label>	
					                                </div>
					                            </div>
				                			</div>
			        					</div>
			        					<div class="form-group row">
			        						<label class="form-control-label" style="font-weight: bold;">Support</label>
				                			<div class="col-md-12" style="border-style:solid;border-width:1px;border-color:lightgray;">
				                				<div class="row" style="margin:10px; margin-top: 20px;" id="support">
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="liverep" class="styled" type="checkbox" value="liverep"/>
					                                	<label for="liverep">24/7 (Live rep)</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="businesshour" class="styled" type="checkbox" value="businesshour"/>
					                                	<label for="businesshour">Business hour</label>	
					                                </div>
					                                <div class="checkbox checkbox-success col-lg-12">
					                                	<input id="online" class="styled" type="checkbox" value="onLine"/>
					                                	<label for="online">Online</label>	
					                                </div>
					                            </div>
				                			</div>
			        					</div>
				        			</div>

				        			<hr/>


				        			<div class="row m-t-30">
			                			<h4  class="title-3" style="font-weight: bold;">Product features</h4>
			                        </div>
			                        <div class="m-t-10">
					        			<div class="row form-group">			                			
				                			<a class="btn btn-primary" data-toggle="modal" href="#feature" style="max-height: 30px; font-size: 12px; margin-bottom:10px; margin-top: 10px; border-radius: 20px;">Select features<i class="fa fa-plus-circle" style="margin-left:12px;"></i></a>
				                			<div class="col-md-12 featureEdit" style="border-style:solid;border-color:lightgray;border-width:1px;min-height:70px;padding-top:30px;"></div>
				                		</div>
				                	</div>
			                		
			                	</div>
			                </form>
			            </div>
			         </div>
	        	</div>
	        	<!-- <div class="col-lg-12">
	        		<div class="card">
	        			<div class="card-header">
	        				<span class="title-3 m-l-30"><i class="fa fa-gift"></i> Features</span>
	        				<a href="#feature" data-toggle="modal" class="btn btn-primary" style="float:right">Feature Select</a>
	        			</div>
	        			<div class="card-body form">
	        				<form class="form-horizontal">
	        					<div class="form-body  featureEdit">
	        					</div>
	        				</form>
	        			</div>
	        		</div>
	        	</div> -->
	        </div>
    	</div>
 	</div>
</div>

<div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">
	 		<div class="modal-header">
	 			<h4 class="modal-title">Please select categories</h4>
	 			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				
	 		</div>
	 		<div class="modal-body" style="padding: 40px;">
	 			<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
					<thead>
	                    <tr>
	                        <th style="width: 10px;">
	                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
	                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
	                                <span></span>
	                            </label>
	                        </th>
	                        <th> Name </th>
	                    </tr>
					</thead>
					<tbody>

						<?php foreach($category as $categories){?>
							<tr class="odd gradeX">
								<td style="vertical-align: middle;text-align: center;">
	                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
	                                    <input type="checkbox" class="checkboxes category_select" value="<?php echo $categories['id'];?>" />
	                                    <span></span>
	                                </label>
	                            </td>
	                            <td style="vertical-align: middle;"><?php echo $categories['name'];?></td>
							</tr>
						<?php }?>
					</tbody>
				</table>
	 		</div>
	 		<div class="modal-footer">
	            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
	        </div>
	    </div>
 	</div>
</div>
 
<div class="modal fade bs-modal-lg" id="feature" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please select features</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                
            </div>
            <div class="modal-body" style="padding: 40px;">
                <table class="table table-striped table-bordered table-hover table-checkable order-column feature_select_each" id="sample_2">
                    <thead>
                        <tr>
                            <th style="width: 10px;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
                                    <input type="checkbox" class="group-checkable feature_all" data-set="#sample_2 .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th> Name </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($feature as $features){?>
                            <tr class="odd gradeX">
                                <td style="vertical-align: middle;">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
                                        <input type="checkbox" class="checkboxes feature_select" value="<?php echo $features['id'];?>"  attr_name="<?php echo $features['name'];?>" attr_type="<?php echo $features['type'];?>"/>
                                        <span></span>
                                    </label>
                                </td>
                                <td style="vertical-align: middle;"><?php echo $features['name'];?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>