<style>
	.feature .fa-times-circle:hover
	{
		color:red;
	}

 
</style>
<!-- BEGIN CONTENT BODY -->
<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row card" style="margin-top:30px;">
              <div class="card-header">
                <span class="title-3 m-l-30"><i class="fa fa-gift"></i> New Category</span>
                <span class="btn btn-success pull-right savecategory">
                      <i class="fa fa-save" style="margin-right:10px;"></i> Save Category 
                </span>
                <span class="btn btn-primary maincategory" style="float:right; margin-right: 12px;" data-toggle="modal" href="#basic"><i class="fa fa-plus-circle" style="margin-right:10px;"></i>Add Main Category</span>
              </div>
            	<div class="card-body" style="padding: 20px 100px;">
                	<form action="<?php echo base_url();?>admin/category" method ='post' class="form-horizontal" id="categoryform"  attr_id = '<?php echo isset($id)?$id:''; ?>'>
                		<div class="form-body">
                      <div class="form-group row m-t-30">
                        <label class="form-control-label" style="font-weight: bold;">Category icon</label>
                        <div class="col-md-12" style="padding: 0px;">
                          <div class="fileinput <?php if(isset($category['categoryicon']) && $category['categoryicon']){echo 'fileinput-exists';}else{echo 'fileinput-new';}?>" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 210px; height: 150px;border:solid 1px lightgray;">
                                  <img src="http://www.placehold.it/210x150/EFEFEF/AAAAAA&amp;text=Not+selected" alt="" />
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px; height: 150px;">
                                <?php if(isset($category['categoryicon']) && $category['categoryicon']){?>
                                <img src="<?php echo base_url() . $category['categoryicon'];?>"/>
                                <?php }?>
                              </div>
                              <div>
                                  <span class="btn default btn-file">
                                      <span class="fileinput-new btn btn-success" style="margin-left: 35px;"> Select image </span>
                                      <span class="fileinput-exists btn btn-primary"> Change </span>
                                      <input type="file" name="category_icon" id="category_icon"/>
                                  </span>
                                  <span href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </span>
                              </div>
                          </div>
                        </div>
                      </div>
	                		<div class="form-group row">
	                			<label class="form-control-label" style="font-weight: bold;">Name</label>
                        <input type="text" class="form-control input-circle-right" placeholder="Name" name="name" value="<?php echo isset($category['name'])?$category['name']:'';?>" required />
	                		</div>

                      <div class="form-group row">
                        <label class="form-control-label" style="font-weight: bold;">Main Category</label>
                        <select class="form-control" placeholder="Description" name="rootcategoryid" required> 
                            <?php foreach($maincategory as $maincategories){?>
                            <option value="<?php echo $maincategories['id'];?>" <?php if(isset($category['rootcategoryid']) && $category['rootcategoryid'] == $maincategories['id']){echo 'selected';}?>><?php echo $maincategories['name'];?></option>
                            <?php }?>
                        </select>
                      </div>

                      <div class="form-group row">
                        <label class="form-control-label" style="font-weight: bold;">Related Category</label>
                          <div id="tree_2" style="max-height: 300px;overflow-y: scroll; width: 100%;">
                           <ul class="tree-demo">
                             <?php foreach($all as $alls){?>
                             <li data-jstree='{"opened":true}'><?php echo $alls['name'];?>
                             <?php if(count($alls['sub']) > 0){?>
                             <ul>
                               <?php foreach($alls['sub'] as $subs){?>
                               <li data-jstree='{"opened":true<?php if(isset($subs['selected'])){echo ',"selected":true';}?>}' attr_id = "<?php echo $subs['id'];?>"><?php echo $subs['name']?></li>
                               <?php }?>
                             </ul>
                             <?php }?>
                             </li>
                             <?php }?>
                           </ul>
                         </div>
                      </div>
	                		<button type="submit" style="display:none" id="categorybutton"></button>
	                	</div>
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>

