<style>
	[data-toggle="collapse"]:after {
	display: inline-block;
	    display: inline-block;
	    font: normal normal normal 14px/1 FontAwesome;
	    font-size: inherit;
	    text-rendering: auto;
	    -webkit-font-smoothing: antialiased;
	    -moz-osx-font-smoothing: grayscale;
	  content: "\f0dd";
	  transform: rotate(180deg) ;
	  transition: all linear 0.25s;
	  float: right;
	  }   
	[data-toggle="collapse"].collapsed:after {
	  transform: rotate(0deg) ;
	  float:right;
	}

	input[type="checkbox"]
	{
		margin-right:10px;
	}
</style>
<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid p-b-30">
        	<div class="row user-data p-b-40">
        		<h1 class="title-3">
        			<i class="fa fa-cogs"></i>Menus
        		</h1>
        		<div class="col-lg-12 m-t-20" style="padding-left: 50px; padding-right: 50px;">
        			<div class="row">
        				<label class="col-lg-2" style="margin-top: 5px;">User type</label>
        				<div class="col-lg-3">
        					<select class="form-control" id="usertype">
        						<option value="">Select user type</option>
        						<option value="buyer">Buyer</option>
        						<option value="vendor">Vendor</option>
        					</select>
        				</div>
        			</div>
        		</div>
        	</div>

        	<div class="row m-t-30">
        		<div class="col-lg-4 au-card au-card--no-shadow au-card--no-pad p-b-40" style="display: table;">
        			<div class="au-card-title" style="padding:20px 30px">
        				<div class="bg-overlay bg-overlay--blue"></div>
        				<h3><i class="fas fa-columns"></i>Menu Pages</h3>
        			</div>
        			<div class="au-task js-list-load p-t-20">
						<div class="card col-lg-11" style="padding:0px;margin-left:4%;margin-bottom:0px;">
						    <div class="card-header" role="tab" id="headingTwo">
						      <h5 class="mb-0">
						        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="width:100%;">
						          Pages
						        </a>
						      </h5>
							</div>
							<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
							      <div class="card-body" attr_type="page">
							         <div class="row" style="border:solid 1px rgb(230,230,230);max-height:300px;overflow-y: scroll;">
							         	<div class="col-lg-12" style="margin:10px 10px;">
				         					<input type="checkbox" attr_href="categories" attr_title="Software Categories"/> Categories
				         				</div>
				         				<div class="col-lg-12" style="margin:10px 10px;">
				         					<input type="checkbox" attr_href="vendors" attr_title="For Vendors"/> For Vendors
				         				</div>
				         				<div class="col-lg-12" style="margin:10px 10px;">
				         					<input type="checkbox" attr_href="reviews" attr_title="Write a Review"/> Write a Review
				         				</div>	
				         				<div class="col-lg-12" style="margin:10px 10px;">
				         					<input type="checkbox" attr_href="resource" attr_title="Resources"/> Resources
				         				</div>	
				         				<div class="col-lg-12" style="margin:10px 10px;">
				         					<input type="checkbox" attr_href="signin" attr_title="Sign in"/> Signin
				         				</div>	
				         				<div class="col-lg-12" style="margin:10px 10px;">
				         					<input type="checkbox" attr_href="register" attr_title="Register"/> Register
				         				</div>	
				         				<div class="col-lg-12" style="margin:10px 10px;">
				         					<input type="checkbox" attr_href="vendors/upload" attr_title="Advertise With Us"/>Advertise With Us
				         				</div>
				         				<div class="col-lg-12" style="margin:10px 10px;">
				         					<input type="checkbox" attr_href="vendors/account" attr_title="Vendors Account"/>Vendor Account
				         				</div>	
				         				<div class="col-lg-12" style="margin:10px 10px;">
				         					<input type="checkbox" attr_href="logout" attr_title="Logout"/>Log Out
				         				</div>	
							         </div>
							         <div class="row m-t-10">
							         	<button type="button" class="btn btn-outline-primary pull-right add_menu" style="float:right;">Add To Menu</button>
							         </div>
							      </div>
							</div>
						</div>
						<div class="card col-lg-11" style="padding:0px;margin-left:4%;margin-bottom: 0px;">
							<div class="card-header" role="tab" id="headingTwo">
						      <h5 class="mb-0">
						        <a class="collapsed" data-toggle="collapse" href="#collapseCustom" aria-expanded="false" aria-controls="collapseCustom" style="width:100%;">
						          Custom Link
						        </a>
						      </h5>
							</div>
							<div id="collapseCustom" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
							    <div class="card-body" attr_type="custom">
							    	<div class="row">
							    		<div class="col-lg-12">
							    			<div class="row">
									    		<label class="col-lg-4" style="vertical-align: middle;color:black;font-size:16px;margin-top: 10px;">URL</label>
									    		<div class="col-lg-8">
									    			<input class="form-control" name="url" value="http://"/>
									    		</div>
									    	</div>
									    	<div class="row m-t-20">
									    		<label class="col-lg-4" style="vertical-align: middle;color:black;font-size:16px;margin-top: 10px;">Line text</label>
									    		<div class="col-lg-8">
									    			<input class="form-control" name="title"/>
									    		</div>
									    	</div>
									    	<div class="row m-t-20">
									    		<span class="btn btn-outline-primary add_menu">Add To Menu</span>
									    	</div>
								    	</div>
							    	</div>
							    </div>
							</div>
						</div>
	        		</div>
        		</div>
        		<div class="col-lg-1"></div>
        		<div class="col-lg-7 au-card au-card--no-shadow au-card--no-pad p-b-40">
        			<div class="row" style="margin:20px 10px;">
        				<div class="col-md-12">
		    				<span class="title-3 m-l-15">Menu Structure</span>
		    				<span class="btn btn-success pull-right" id="save_menu"><i class="fas fa-save" style="margin-right:10px;"></i> Save Menu</span>
		    				<p class="col-lg-12" style="color: gray; font-size:15px; padding-top: 10px;">Drag each item into the order you prefer. Click the arrow on the right of the item to reveal additional configuration options.</p>
		    			</div>
	    				<div class="col-lg-12 m-t-30">
	        				<ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">
		   					</ol>
		   				</div>

	   				</div>
        		</div>
        	</div>
        </div>
    </div>
</div>