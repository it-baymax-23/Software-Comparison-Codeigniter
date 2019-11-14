<style>
	.rating:hover
	{
		cursor:pointer;
	}
	.delete_description:hover
	{
		color:red;
		cursor:pointer;
	}
	.delete_rating:hover
	{
		color:red;
		cursor: pointer;
	}
</style>
<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
	        <div class="row">
	        	<div class="col-md-12 user-data p-b-30 m-b-30">
	        		<div class="row" style="padding: 15px;">
	        			<div class="col-md-3" style=" vertical-align: middle;">
	        				<img src="<?php echo base_url() . $product[0]['logo']?>" style="width: 100%; height: auto;"/>
	        			</div>
	        			<div class="col-md-9">
	        				<div class="col-md-12">
		        				<div class="row">
		        					<h3><?php echo $product[0]['name'];?></h3>
		        				</div>
		        				<div class="row">
		        					<span>
		        						<?php 
		        						$score = 0;
		        						if($product[0]['score'] != 0){$score = $product[0]['score']/$product[0]['review'];}
		        							$value_score = floor($score); 
		                    				$half_score = $score - $value_score;
		        						?>
	        							<?php for($index_score = 0;$index_score < $value_score;$index_score ++){?>
					                    <i class="fas fa-star highlighted" style="color:yellow"></i>
					                    <?php }?>
					                    <?php if(round($half_score,1) > 0){?>
					                      <i class="fas fa-star-half-alt highlighted" style="color:yellow"></i>
					                    <?php } else if($value_score < 5){?>
					                    <i class="far fa-star"></i>
					                    <?php }?>
					                    <?php for($index_score = $value_score + 1;$index_score <5;$index_score ++){?>
					                      <i class="far fa-star"></i>
					                    <?php }?>
					                    <?php echo round($half_score,1) + $value_score;?>/5(<?php echo $product[0]['review'];?>)
					                </span>
		        				</div>
		        			</div><br>
	        				<p><?php echo $product[0]['description'];?></p>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-6">
	        		<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
	        			<div class="au-card-title" style="padding:20px 30px;">
	        				<div class="bg-overlay bg-overlay--blue"></div>
	        				<h3><i class="fas fa-star"></i>Ratings<i class="fas fa-star" style="margin-left:10px;"></i></h3>
	        				<button class="au-btn-plus" data-toggle="modal" href="#rating">
	        					<i class="zmdi zmdi-plus"></i>
	        				</button>
	        			</div>
	        			<div class="au-task js-list-load">
	        				<div class="col-md-12 m-t-30 m-b-30 ratingcontainer" style="padding-left: 30px; padding-right: 30px;">
	        					<div class="row ratingelement" attr_label="over_all">
		        					<div class="col-md-7">
		        						<h4 class="rating_label">Over All</h4>
		        					</div>
		        					<div class="col-md-4">
		        						<h4><i class="far fa-star rating" value="1"></i><i class="far fa-star rating" value="2"></i><i class="far fa-star rating" value="3"></i><i class="far fa-star rating" value="4"></i><i class="far fa-star rating" value="5"></i></h4>
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
	        				<h3><i class="fas fa-comment"></i>Description</h3>
	        				<button class="au-btn-plus" data-toggle="modal" href="#description">
	        					<i class="zmdi zmdi-plus"></i>
	        				</button>
	        			</div>
	        			<div class="au-task js-list-load">
	        				<div class="col-md-12 m-t-30 m-b-30">
	        					<form class="description_add">
	        						<div class="row">
	        							<label class="col-md-3 description_label">
			        						Resource
			        					</label>
			        					<div class="col-md-9">
			        						<select class="form-control" name="resource">
			        							<?php foreach($resources as $resource){?>
			        							<option value="<?php echo $resource['webid'];?>"><?php echo $resource['website'];?></option>
			        							<?php }?>
			        						</select>
			        					</div>
	        						</div>
	        						<div class="row">
	        							<label class="col-md-3 description_label">
			        						User
			        					</label>
			        					<div class="col-md-9">
			        						<select class="form-control" name="resource">
			        							<option value="">Select User To Write Review</option>
			        							<?php foreach($resources as $resource){?>
			        							<option value="<?php echo $resource['webid'];?>"><?php echo $resource['website'];?></option>
			        							<?php }?>
			        						</select>
			        					</div>
	        						</div>
		        					<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Title
			        					</label>
			        					<div class="col-md-9">
			        						<input class="form-control" name="title">
			        					</div>
			        				</div>
			        				<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Description
			        					</label>
			        					<div class="col-md-9">
			        						<textarea class="form-control" name="description"></textarea>
			        					</div>
			        				</div>
			        				<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Props
			        					</label>
			        					<div class="col-md-9">
			        						<textarea class="form-control" name="props"></textarea>
			        					</div>
			        				</div>
			        				<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Cons
			        					</label>
			        					<div class="col-md-9">
			        						<textarea class="form-control" name="cons"></textarea>
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
	        				<h3><i class="fas fa-comment"></i>Profile</h3>
	        				<button class="au-btn-plus" data-toggle="modal" href="#description">
	        					<i class="zmdi zmdi-plus"></i>
	        				</button>
	        			</div>
	        			<div class="au-task js-list-load">
	        				<div class="col-md-12 m-t-30 m-b-30">
	        					<form class="description_add">
	        						<div class="row">
	        							<label class="col-md-3 description_label">
			        						User
			        					</label>
			        					<div class="col-md-9">
			        						<select class="form-control" name="user_id">
			        							<option value="">Select User To Write Review</option>
			        							<?php foreach($users as $user){?>
			        							<option value="<?php echo $user['id'];?>"><?php echo $user['username'];?></option>
			        							<?php }?>
			        						</select>
			        					</div>
	        						</div>
	        						<div class="row">
	        							<label class="col-md-3 description_label">
			        						Username
			        					</label>
			        					<div class="col-md-9">
			        						<input class="form-control" name="profile.username">
			        					</div>
	        						</div>
		        					<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Title
			        					</label>
			        					<div class="col-md-9">
			        						<input class="form-control" name="title">
			        					</div>
			        				</div>
			        				<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Description
			        					</label>
			        					<div class="col-md-9">
			        						<textarea class="form-control" name="description"></textarea>
			        					</div>
			        				</div>
			        				<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Props
			        					</label>
			        					<div class="col-md-9">
			        						<textarea class="form-control" name="props"></textarea>
			        					</div>
			        				</div>
			        				<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Cons
			        					</label>
			        					<div class="col-md-9">
			        						<textarea class="form-control" name="cons"></textarea>
			        					</div>
			        				</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	        <div class="row m-t-30">
        		<div class="col-md-12">
        			<span class="btn btn-success pull-right savereview" style="padding:10px 20px;" product_id="<?php echo $product[0]['id'];?>">Save Review<i class="fas fa-save m-l-10"></i></span>
        		</div>
        	</div>
	    </div>
	</div>
</div>

<div class="modal fade bs-modal-lg" id="rating" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please Add Your Rating</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                
            </div>
            <div class="modal-body">
              <form action="" method="post" class="form-horizontal"  id="maincategoryform">
               <div class="form-group row">
                   <label class="col col-md-4 form-control-label">Rating Label</label>
                   <div class="col col-md-8">
                       <input class="form-control" name="rating" required>
                   </div>
               </div>
             </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="addrating">Save</button>
            </div>
        </div>
    </div>
 </div>

 <div class="modal fade bs-modal-lg" id="description" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please Add Your Description about this Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                
            </div>
            <div class="modal-body">
              <form action="" method="post" class="form-horizontal"  id="maincategoryform">
               <div class="form-group row">
                   <label class="col col-md-4 form-control-label">Description Title</label>
                   <div class="col col-md-8">
                       <input class="form-control" name="adddescription" required>
                   </div>
               </div>
             </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="adddescription">Save</button>
            </div>
        </div>
    </div>
 </div>