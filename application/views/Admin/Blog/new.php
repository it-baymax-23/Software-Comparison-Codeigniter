<style>
	.modal-backdrop
	{
		z-index: 1039;
	}

	.modal
	{
		z-index:1040;
	}
</style>

<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row user-data p-b-30" style="margin-top:20px;">
            	<div class="col-md-12">
                	<h3 class="title-3 m-b-50 pull-left"><i class="fas fa-comment" style="margin-right:10px;"></i>Edit Blog Information</h3>
                    <span class="btn btn-success pull-right save-blog" <?php if(isset($id)){echo 'attr_id="' . $id . '"';}?>>Save My Resource<i class="fas fa-save" style="margin-left:10px;"></i></span>
                	<span class="btn btn-primary pull-right" data-toggle="modal" data-target="#basic" style="margin-right: 10px;">Add New Section <i class="fa fa-plus-circle" style="margin-left:10px;">
                	</i></span>
                </div>
            	<div class="col-md-12" id="maininfo" style="padding: 100px; padding-top: 10px; padding-bottom: 0px;">
            		<div class="m-b-30">
            			<label class="form-control-label" style="font-weight: bold;">Main Logo</label>
            			<div class="col-md-12">

                            <div class="fileinput <?php if(isset($id) && $maininfo[0]['logo']){echo 'fileinput-exists';} else{echo 'fileinput-new';}?>" data-provides="fileinput" style="width:100%;">
                                <div class="col-lg-12 fileinput-new" style="width: 226px; height: 150px;">
                                    <div style="width: 226px; height: 150px; border:solid 1px lightgrey; float: left; "></div>
                                </div>
                                    
                                <div class="col-lg-12 fileinput-preview fileinput-exists thumbnail" style="max-width: 255px; max-height: 150px;float:left;">
                                    <?php if(isset($id) && $maininfo[0]['logo']){?>
                                    <img src="<?php echo base_url() . $maininfo[0]['logo'];?>" style="width:200px;height:150px;">
                                    <?php }?>
                                </div>
                                <div class="col-lg-12" style="float:left; margin-left: 10px;">
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new btn btn-success" style="margin-left: 30px; border-radius: 20px;"> Select image </span>
                                        <span class="fileinput-exists btn btn-primary" style="border-radius: 20px;"> Change </span>
                                        <input type="file" name="logo" id="logo"> </span>
                                    <span class="btn btn-danger fileinput-exists" data-dismiss="fileinput" style=" border-radius: 20px;"> Remove </span>
                                </div>
                            </div>
                        </div>
            		</div>
            		<div class="m-b-30">
            			<label class="form-control-label" style="font-weight: bold;">Title</label>
            			<input type="text" class="bloginfo form-control" name="title" value="<?php if(isset($id) && isset($maininfo[0]['title'])){echo $maininfo[0]['title'];}?>"/>
            		</div>

                    <div class="m-b-30">
                        <label class="form-control-label"  style="font-weight: bold;">Category</label>
                        <select  class="bloginfo form-control" name="category">
                            <?php foreach($maincategory as $main){?>
                            <option value="<?php echo $main['id'];?>" <?php if(isset($id) && isset($maininfo[0]['category']) && $maininfo[0]['category'] == $main['id']){echo 'selected';}?>><?php echo $main['name'];?></option>
                            <?php }?>
                        </select>
                    </div>
            		<div class="m-b-30">
            			<label class="form-control-label"  style="font-weight: bold;">Description</label>
            			<div id="summernote_1" name="description"><?php if(isset($id) && isset($maininfo[0]['description'])){echo $maininfo[0]['description'];}?></div>
            		</div>
            	</div>
            </div>
            <div class="row m-t-30 section">

                <?php 
                if(isset($section)){
                foreach($section as $sections){?>
                <div class="col-lg-6 section-description" style="margin-top:10px;">
                    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                        <div class="au-card-title" style="padding:20px 10px;">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3 class="title"><?php echo $sections['title'];?></h3>
                            <span class="btn btn-danger delete_section" style="z-index:2;position:relative;float:right;bottom:30px;">
                                <i class="fas fa-trash" style="margin-right:10px;"></i>Delete this section
                            </span>
                        </div>
                        <div class="au-task">
                            <div class="description" name="description"><?php echo $sections['description'];?></div>
                        </div>
                    </div>
                </div>
                <?php }}?>
            </div>
        </div>
    </div>
</div>

 <div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Please Add Your Section</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	                
	            </div>
	            <div class="modal-body">
	              <form action="" method="post" class="form-horizontal"  id="maincategoryform">
	               <div class="form-group row">
	                   <label class="col col-md-4 form-control-label">Section Title</label>
	                   <div class="col col-md-8">
	                       <input class="form-control" name="sectiontitle" required>
	                   </div>
	               </div>
	               <button id = "maincategory_formsubmit" type="submit" style="display:none;"></button>
	             </form>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-success" id="savesection">Save</button>
	            </div>
	        </div>
	    </div>
 </div>