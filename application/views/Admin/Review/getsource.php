    <!-- BEGIN CONTENT BODY -->
    <div class="main-content  p-b-50">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row user-data">
            		    <h3 class="title-3 m-b-30"><i class="fas fa-star"></i>All Resoure</h3>             		
                    <div class="filter col-md-12">
                        <span class="btn btn-primary addsource"><i class="fa fa-plus"></i> Add Resource</span>
                    </div>
    				        <div class="col-md-12"  style="padding:30px 20px">
        				<table class="table table-striped table-bordered table-hover order-column" id="sample_1">
        					<thead>
                      <tr>
                          <th style="width:300px;">Website Source</th>
                          <th>website id</th>
                          <th>Activate</th>
                          <th>scrape State</th>
                          <th>Action</th>
                      </tr>
        					</thead>
        					<tbody>
        						<?php foreach($source as $sources){?>
        							<tr class="odd gradeX">
                          <td><?php echo $sources['website'];?></td>
                          <td><?php echo $sources['webid'];?></td>
                          <td>
                              <label class="switch">
                                <input class="resourceactivate" type="checkbox" attr_id="<?php echo $sources['id'];?>" <?php if($sources['status']){echo 'checked';}?>>
                                <span class="slider_checkbox round"></span>
                              </label>
                          </td>
                          <td style="text-align: center;">
                            <span class="btn btn-primary state_change" attr_id="<?php echo $sources['webid'];?>"><i class="fas fa-play"></i></span>
                          </td>
                          <td>
                          	<span class="btn btn-primary editsource" style="margin-top: 5px;" attr_id="<?php echo $sources['id'];?>">
                          		<i class="fa fa-edit"></i>
                          	</span>
                          	<span class="btn btn-danger deletesource" attr_id="<?php echo $sources['id']; ?>" style="margin-top:5px;">
                          		<i class="fa fa-trash"></i>
                          	</span>
                            <a class="btn btn-success" href="<?php echo base_url();?>admin/resource/<?php echo $sources['id'];?>"><i class="fa fa-cogs"></i></a>
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

<div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Resource Website for importing the review</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                
            </div>
            <div class="modal-body">
              <form action="" method="post" class="form-horizontal"  id="websitesource">
               <div class="form-group row">
                   <label class="col col-md-4 form-control-label">Website Url</label>
                   <div class="col col-md-8">
                       <input type="url" class="form-control" name="website" required>
                   </div>
               </div>
               <div class="form-group row">
                   <label class="col col-md-4 form-control-label">WebsiteId</label>
                   <div class="col col-md-8">
                       <input type="text" class="form-control" name="webid" required></textarea>
                   </div>
               </div>
               <button id = "websiteresourcesubmit" type="submit" style="display:none;"></button>
             </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="savewebresource">Save</button>
            </div>
        </div>
    </div>
 </div>