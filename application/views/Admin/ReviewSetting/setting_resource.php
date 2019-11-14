<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
        	<div class="row m-b-30">
        		<div class="col-md-12">
        			<span class="btn btn-success pull-right savereviewsetting" style="padding:10px 20px;" attr_id="<?php echo $resource['webid'];?>"><i class="fas fa-save m-r-30"></i>Save Setting</span>
        		</div>
        	</div>
	        <div class="row">
	        	<div class="col-md-12 user-data p-b-30 m-b-30">
	        		<h3 class="title_3 m-l-30"><?php echo $resource['webid'];?></h3>
	        		<span class="m-l-30">Resouce Url: <?php echo $resource['website'];?></span>
	        		<div class="row m-l-30">
	        			<label class="col-2" style="padding:0px;">Sample Product:</label>
	        			<div class="col-7">
	        				<input class="form-control" name="sample" id="sample" attr_url="<?php echo $resource['website'];?>">
	        			</div>
	        		</div>
	        	</div>
	        </div>
	        <div class="row" id="setting_content">
	        	<div class="col-md-6">
	        		<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
	        			<div class="au-card-title" style="padding:20px 30px;">
	        				<div class="bg-overlay bg-overlay--blue"></div>
	        				<h3 class="title_3"><i class="fas fa-star"></i>Ratings<i class="fas fa-star" style="margin-left:10px;"></i></h3>
	        			</div>
	        			<div class="au-task js-list-load">
	        				<div class="col-md-12 m-t-30 m-b-30 ratingcontainer">
	        					<div class="row">
	        						<div class="col-12 m-t-20">
	        							<h3>Rating</h3>
	        							<div class="row m-t-20">
	        								<label class="col-3">Positive</label>
	        								<div class="col-9">
		        								<div class="input-group">
		        									<input class="form-control" name="positive" attr_type="rating" value="<?php if(isset($setting)){echo $setting['positive'];}?>">
		        									<span class="btn btn-primary iframe_view">
		        										<i class="fas fa-star"></i>
		        									</span>
		        								</div>
		        							</div>
	        							</div>
	        							<div class="row m-t-10">
	        								<label class="col-3">Negative</label>
	        								<div class="col-9">
		        								<div class="input-group">
		        									<input class="form-control" name="negative" attr_type="rating" value="<?php if(isset($setting)){echo $setting['negative'];}?>">
		        									<span class="btn btn-primary iframe_view">
		        										<i class="fas fa-star"></i>
		        									</span>
		        								</div>
		        							</div>
	        							</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-20 ratingelement" attr_id="over_all">
	        						<div class="col-12">
	        							<h3>Over All</h3>
	        						</div>
	        						<div class="col-12 m-t-20">
	        							<div class="row">
	        								<label class="col-3">Content</label>
	        								<div class="col-9">
		        								<div class="input-group">
		        									<input class="form-control" name="over_all" value="<?php if(isset($setting)){echo $setting['over_all'];}?>">
		        									<span class="btn btn-primary iframe_view">
		        										<i class="fas fa-star"></i>
		        									</span>
		        								</div>
		        							</div>
	        							</div>
	        						</div>
	        					</div>
	        					<div class="row ratingelement m-t-30" attr_id="over_all">
	        						<div class="col-12">
	        							<h3>Extra Rating</h3>
	        						</div>
	        						<div class="col-12 m-t-20">
	        							<div class="row">
	        								<label class="col-3">Rating Unit</label>
	        								<div class="col-9">
		        								<div class="input-group">
		        									<input class="form-control" name="rating_unit" value="<?php if(isset($setting)){echo $setting['rating_unit'];}?>">
		        									<span class="btn btn-primary iframe_view">
		        										<i class="fas fa-star"></i>
		        									</span>
		        								</div>
		        							</div>
	        							</div>
	        							<div class="row m-t-10">
	        								<label class="col-3">Rating Label</label>
	        								<div class="col-9">
		        								<div class="input-group">
		        									<input class="form-control" name="extra_rating_label" value="<?php if(isset($setting)){echo $setting['extra_rating_label'];}?>">
		        									<span class="btn btn-primary iframe_view">
		        										<i class="fas fa-star"></i>
		        									</span>
		        								</div>
		        							</div>
	        							</div>
	        							<div class="row m-t-10">
	        								<label class="col-3">Rating Content</label>
	        								<div class="col-9">
		        								<div class="input-group">
		        									<input class="form-control" name="extra_rating_content" value="<?php if(isset($setting)){echo $setting['extra_rating_content'];}?>">
		        									<span class="btn btn-primary iframe_view">
		        										<i class="fas fa-star"></i>
		        									</span>
		        								</div>
		        							</div>
	        							</div>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
	        			<div class="au-card-title" style="padding:20px 30px;">
	        				<div class="bg-overlay bg-overlay--blue"></div>
	        				<h3 class="title_3"><i class="fas fa-comments"></i>Descriptions</h3>
	        			</div>
	        			<div class="au-task js-list-load">
	        				<div class="col-12 m-t-30 m-b-20">
	        					<div class="row m-t-30">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Description Unit</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="description_unit" value="<?php if(isset($setting)){echo $setting['description_unit'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-30">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Title</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="title" value="<?php if(isset($setting)){echo $setting['title'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-10">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Description</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="description" value="<?php if(isset($setting)){echo $setting['description'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-10">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Date</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="datedata" value="<?php if(isset($setting)){echo $setting['datedata'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-10">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Props</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="props" value="<?php if(isset($setting)){echo $setting['props'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-10">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Cons</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="cons" value="<?php if(isset($setting)){echo $setting['cons'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-30">
	        						<div class="col-12">
	        							<h3>Extra Description</h3>
	        							<div class="row m-t-30">
			        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Label</label>
			        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
			        							<div class="input-group">
		        									<input class="form-control" name="extra_description_label" value="<?php if(isset($setting)){echo $setting['extra_description_label'];}?>">
		        									<span class="btn btn-primary iframe_view">
		        										<i class="fas fa-star"></i>
		        									</span>
		        								</div>
			        						</div>
			        					</div>
			        					<div class="row m-t-10">
			        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Content</label>
			        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
			        							<div class="input-group">
		        									<input class="form-control" name="extra_description_content" value="<?php if(isset($setting)){echo $setting['extra_description_content'];}?>">
		        									<span class="btn btn-primary iframe_view">
		        										<i class="fas fa-star"></i>
		        									</span>
		        								</div>
			        						</div>
			        					</div>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
	        			<div class="au-card-title" style="padding:20px 30px;">
	        				<div class="bg-overlay bg-overlay--blue"></div>
	        				<h3 class="title_3"><i class="fas fa-user"></i>Profile</h3>
	        			</div>
	        			<div class="au-task js-list-load">
	        				<div class="col-12 m-t-30 m-b-20">
	        					<div class="row m-t-30">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Name</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="name" value="<?php if(isset($setting)){echo $setting['description_unit'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-30">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Address</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="position" value="<?php if(isset($setting)){echo $setting['position'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-10">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Industry Type</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="industrytype" value="<?php if(isset($setting)){echo $setting['industrytype'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-10">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Number Of Employees</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="employeenum" value="<?php if(isset($setting)){echo $setting['employeenum'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-10">
	        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">How Long Used</label>
	        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
	        							<div class="input-group">
        									<input class="form-control" name="user_period" value="<?php if(isset($setting)){echo $setting['user_period'];}?>">
        									<span class="btn btn-primary iframe_view">
        										<i class="fas fa-star"></i>
        									</span>
        								</div>
	        						</div>
	        					</div>
	        					<div class="row m-t-30">
	        						<div class="col-12">
	        							<h3>Extra Profile</h3>
	        							<div class="row m-t-30">
			        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Label</label>
			        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
			        							<div class="input-group">
		        									<input class="form-control" name="extra_profile_label" value="<?php if(isset($setting)){echo $setting['extra_profile_label'];}?>">
		        									<span class="btn btn-primary iframe_view">
		        										<i class="fas fa-star"></i>
		        									</span>
		        								</div>
			        						</div>
			        					</div>
			        					<div class="row m-t-10">
			        						<label class="col-4 col-sm-4 col-md-3 col-lg-3">Content</label>
			        						<div class="col-8 col-sm-8 col-md-9 col-lg-9">
			        							<div class="input-group">
		        									<input class="form-control" name="extra_profile_content" value="<?php if(isset($setting)){echo $setting['extra_profile_content'];}?>">
		        									<span class="btn btn-primary iframe_view">
		        										<i class="fas fa-star"></i>
		        									</span>
		        								</div>
			        						</div>
			        					</div>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	</div>
</div>
      
<div id="basic" class="modal fade bs-modal-lg" id="rating" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width:80vw;">
        <div class="modal-content" style="width:80vw;">
            <div class="modal-header">
                <h4 class="modal-title">Please Add Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                
            </div>
            <div class="modal-body">
              <div class="row">
                   <div class="col-lg-12">
                   		<iframe src="" style="width:100%;height:700px;"></iframe>
                   </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="addrating">Save</button>
            </div>
        </div>
    </div>
 </div>