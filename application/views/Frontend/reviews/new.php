<style>
	.highlighted
	{
		color:rgb(249,191,59);
	}
	.fa-star
	{
		cursor:pointer;
	}
</style>
<div class="home">
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center"  style="background-color: rgb(11,152,183);">
        <h2 class="searchtitle" style="width:80%;text-align: center;">New Review For <?php echo $product['name'];?></h2>
    </div>
</div>
<div class="row m-t-100 m-b-100">
	<div class="container">
        <div class="row">
            <div class="col-12 col-lg-1 col-md-1 col-sm-1"></div>
    		<div class="col-12 col-lg-10 col-md-10 col-sm-10 shadow border_default" style="padding:50px 50px;">
    			<div class="row">
        			<div class="product_logo" style="border: 1px solid #d9e6ed;padding: 0.25em;margin-left:15px;" attr_id="<?php echo $product['id'];?>">
        				<a class="productlink" href="<?php echo base_url();?>productdetail/<?php echo $product['id'];?>"><img src="<?php echo base_url() . $product['logo']?>"/></a>
        			</div>
        			<div class="col-lg-7">
        				<p style="font-size: 24px;color:black;">Write a Review For</p>
        				<h3 style="color:rgb(77, 161, 169);font-size:24px;"><?php echo $product['name'];?></h3>
        			</div>
        		</div>
        		<div class="row m-t-10">
        			<div class="col-lg-12">
            			<p style="color:black;font-size:14px;">Software buyers need your help! Product reviews help the rest of us make great decisions. Not sure where to start?</p>
            		</div>
        		</div>
        		<hr style="border-width:3px;"/>
        		<div class="row screen_1">
        			<div class="col-12 col-sm-6 col-md-4 col-lg-4 m-t-30">
        				<p  style="font-size:16px;color:black;">Overall Quality</p>
        				<p style="font-size:18px;" attr_name="over_all"><i class="fas fa-star" attr_value="1"></i><i class="fas fa-star" attr_value="2"></i><i class="fas fa-star" attr_value="3"></i><i class="fas fa-star" attr_value="4"></i><i class="fas fa-star" attr_value="5"></i></p>
        			</div>
        			<div class="col-12 col-sm-6 col-md-4 col-lg-4 m-t-30">
        				<p  style="font-size:16px;color:black;">Ease Of Use</p>
        				<p style="font-size:18px;" attr_name="Ease Of Use"><i class="fas fa-star" attr_value="1"></i><i class="fas fa-star" attr_value="2"></i><i class="fas fa-star" attr_value="3"></i><i class="fas fa-star" attr_value="4"></i><i class="fas fa-star" attr_value="5"></i></p>
        			</div>
        			<div class="col-12 col-sm-6 col-md-4 col-lg-4 m-t-30">
        				<p  style="font-size:16px;color:black;">Features & Functionality</p>
        				<p style="font-size:18px;" attr_name="Features & Functionality"><i class="fas fa-star" attr_value="1"></i><i class="fas fa-star" attr_value="2"></i><i class="fas fa-star" attr_value="3"></i><i class="fas fa-star" attr_value="4"></i><i class="fas fa-star" attr_value="5"></i></p>
        			</div>
        			<div class="col-12 col-sm-6 col-md-4 col-lg-4 m-t-30">
        				<p  style="font-size:16px;color:black;">Customer Support</p>
        				<p style="font-size:18px;" attr_name="Customer Support"><i class="fas fa-star" attr_value="1"></i><i class="fas fa-star" attr_value="2"></i><i class="fas fa-star" attr_value="3"></i><i class="fas fa-star" attr_value="4"></i><i class="fas fa-star" attr_value="5"></i></p>
        			</div>
        			<div class="col-12 col-sm-6 col-md-4 col-lg-4 m-t-30">
        				<p  style="font-size:16px;color:black;">Value for money</p>
        				<p style="font-size:18px;" attr_name="Value for money"><i class="fas fa-star" attr_value="1"></i><i class="fas fa-star" attr_value="2"></i><i class="fas fa-star" attr_value="3"></i><i class="fas fa-star" attr_value="4"></i><i class="fas fa-star" attr_value="5"></i></p>
        			</div>
        		</div>

        		<div class="row screen_2" style="display: none;">
        			<form id="reviewdetail" class="col-lg-12">
        				<div class="row">
        					<label class="col-12">Title Your Review</label>
        					<div class="col-12">
        						<input class="form-control" name="title" required/>
        					</div>
        				</div>
        				<div class="row m-t-20">
        					<label class="col-lg-12">Props: What did you like most about this software</label>
        					<div class="col-lg-12">
        						<textarea class="form-control" name="props" required></textarea>
        					</div>
        				</div>
        				<div class="row m-t-20">
        					<label class="col-lg-12">Cons:What did you like least about this software</label>
        					<div class="col-lg-12">
        						<textarea class="form-control" name="cons" required></textarea>
        					</div>
        				</div>
        				<div class="row m-t-20">
        					<label class="col-lg-12">Describe your overall experiences with <?php echo $product['name'];?></label>
        					<div class="col-lg-12">
        						<textarea class="form-control" name="description" required></textarea>
        					</div>
        				</div>
        				<button type="submit" id="submitreview" style="display: none"></button>
        			</form>
        		</div>
        		<div class="row m-t-20">
        			<div class="col-lg-12">
        				<span class="btn btn-primary" id="prev" style="float:left;padding:10px 20px;display: none;">Prev</span>
            			<span id="next" class="btn btn-success" style="float:right;padding:10px 20px;">Next</span>
            		</div>
        		</div>
    		</div>
        </div>
	</div>
</div>