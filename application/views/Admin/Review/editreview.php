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
<?php $usertype = get_role();?>
<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
	        <div class="row">
	        	<div class="col-md-12 user-data p-b-30 m-b-30">
	        		<div class="row" style="padding: 15px;">
	        			<div class="col-md-3" style=" vertical-align: middle;">
	        				<img src="<?php echo base_url() . $review['logo']?>" style="width: 100%; height: auto;"/>
	        			</div>
	        			<div class="col-md-9">
	        				<div class="col-md-12">
	        					<div class="row">
	        						<h3><?php echo $review['name'];?></h3>
	        					</div>
		        				<div class="row">
		        					<span><i class="fas fa-star" style="color:yellow;"></i><i class="fas fa-star" style="color:yellow;"></i><i class="fas fa-star" style="color:yellow;"></i><i class="fas fa-star" style="color:yellow;"></i><i class="fas fa-star" style="color:yellow;margin-right:10px;"></i>5/5(16reviews)</span>
		        				</div>
		        			</div><br>
		        			<p><?php echo $review['productdescription'];?></p>
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
	        				<?php if($usertype != 'vendor' && $usertype != 'buyer'){?>
	        				<button class="au-btn-plus" data-toggle="modal" href="#rating">
	        					<i class="zmdi zmdi-plus"></i>
	        				</button>
	        				<?php }?>
	        			</div>
	        			<div class="au-task js-list-load">
	        				<div class="col-md-12 m-t-30 m-b-30 ratingcontainer" style="padding-left: 30px; padding-right: 30px;">
	        					<div class="row ratingelement" attr_label="over_all">
		        					<div class="col-md-7">
		        						<h4 class="rating_label">Over All</h4>
		        					</div>
		        					<div class="col-md-4">
		        						<h4>
		        						<?php for($index = 0;$index<$review['over_all'];$index++){
		        							$class = '';
		        							if($index == 0)
		        							{
		        								$class = 'ratinged';
		        							}
		        							?>
		        							<i class="fas fa-star rating <?php echo $class;?>" value="<?php echo $index + 1;?>" style="color:yellow;"></i>
		        						<?php }?>
		        						<?php for($index = $review['over_all'];$index<5;$index ++){?>
		        							<i class="far fa-star rating" value="<?php echo $index + 1;?>"></i>
		        						<?php }?>
		        						</h4>
		        					</div>
		        				</div>
	        				</div>
	        				<?php foreach($review['extrarating'] as $extras){?>
	        				<div class="col-md-12 m-t-30 m-b-30 ratingcontainer" style="padding-left: 30px; padding-right: 30px;">
	        					<div class="row ratingelement" attr_label="<?php echo $extras['meta_key'];?>">
		        					<div class="col-md-7">
		        						<h4 class="rating_label"><?php echo $extras['meta_key'];?></h4>
		        					</div>
		        					<div class="col-md-4">
		        						<h4>
		        						<?php for($index = 0;$index<$extras['meta_value'];$index++){
		        							$class = '';
		        							if($index == 0)
		        							{
		        								$class = 'ratinged';
		        							}
		        							?>
		        							
		        							<i class="fas fa-star rating <?php echo $class;?>" value="<?php echo $index + 1;?>" style="color:yellow;"></i>
		        						<?php }?>
		        						<?php for($index = $extras['meta_value'];$index<5;$index ++){?>
		        							<i class="far fa-star rating" value="<?php echo $index + 1;?>"></i>
		        						<?php }?>
		        						</h4>
		        					</div>
		        					<div class="col-md-1">
		        						<i class="fa fa-times delete_rating"></i>
		        					</div>
		        				</div>
	        				</div>
	        				<?php }?>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
	        			<div class="au-card-title" style="padding:20px 30px;">
	        				<div class="bg-overlay bg-overlay--blue"></div>
	        				<h3><i class="fas fa-comment"></i>Description</h3>
	        				<?php if($usertype != 'vendor' && $usertype != 'buyer'){?>
	        				<button class="au-btn-plus" data-toggle="modal" href="#description">
	        					<i class="zmdi zmdi-plus"></i>
	        				</button>
	        				<?php }?>
	        			</div>
	        			<div class="au-task js-list-load">
	        				<div class="col-md-12 m-t-30 m-b-30">
	        					
	        					<form class="description_add">
	        						<?php if($usertype != 'vendor' && $usertype != 'buyer'){?>
	        						<div class="row">
	        							
	        							<label class="col-md-3 description_label">
			        						Resource
			        					</label>
			        					<div class="col-md-9">
			        						<select class="form-control" name="resource">
			        							<?php foreach($resources as $resource){?>
			        							<option value="<?php echo $resource['webid'];?>" <?php if($resource['webid'] == $review['resource']){echo 'selected';}?>><?php echo $resource['website'];?></option>
			        							<?php }?>
			        						</select>
			        					</div>
	        						</div>
	        						<?php }?>
		        					<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Title
			        					</label>
			        					<div class="col-md-9">
			        						<input class="form-control" name="title" value="<?php echo $review['title'];?>">
			        					</div>
			        				</div>
			        				<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Date
			        					</label>
			        					<div class="col-md-9 input-group">
			        						<input class="form-control" name="created_date" value="<?php echo $review['created_date'];?>" style="border-radius: 0px;">
			        						<span class="btn btn-primary calendar" style="border-radius: 0px;"><i class="fas fa-calendar"></i></span>
			        					</div>
			        				</div>
			        				<div class="row m-t-30">
			        					<label class="col-md-3 description_label">
			        						Description
			        					</label>
			        					<div class="col-md-9">
			        						<textarea class="form-control" name="description"><?php echo $review['description'];?>
			        						</textarea>
			        					</div>
			        				</div>
			        				<?php foreach($review['extradescription'] as $extras){?>
			        					<div class="row m-t-30">
				        					<label class="col-md-3 description_label">
				        						<?php echo $extras['meta_key'];?>
				        					</label>
				        					<div class="col-md-8">
				        						<textarea class="form-control" name="<?php echo $extras['meta_key'];?>"><?php echo $extras['meta_value'];?></textarea>
				        					</div>
				        					<div class="col-md-1">
				        						<i class="fa fa-times delete_description"></i>
				        					</div>
				        				</div>
			        				<?php }?>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	        <div class="row m-t-30">
        		<div class="col-md-12">
        			<span class="btn btn-success pull-right savereview" style="padding:10px 20px;" review_id="<?php echo $review['id'];?>">Update Review<i class="fas fa-save m-l-10"></i></span>
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