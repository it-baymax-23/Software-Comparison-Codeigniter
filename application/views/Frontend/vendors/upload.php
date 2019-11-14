		<div class="tab-content row" style="margin:0px;background-color: white;padding-bottom:20px;">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="board row  m-t-30">
            <div class="col-1 col-sm-2 col-md-2 col-lg-2"></div>
            <div class="board-inner col-10 col-sm-8 col-md-8 col-lg-8">
              <div class="container">
                <ul class="nav nav-tabs" id="myTab" style="padding-left:12%;">
                  <div class="liner"></div>
                  <li class="active">
                    <a href="#home" data-toggle="tab" title="Main Info">
                      <span class="round-tabs one">
                          <i class="fas fa-home"></i>
                      </span> 
                    </a>
                  </li>
                  <li>
                    <a href="#screenshot" data-toggle="tab" title="SoftWare ScreenShot">
                      <span class="round-tabs two">
                        <i class="fas fa-image"></i>
                      </span> 
                    </a>
                  </li>
                  <li>
                    <a href="#messages" data-toggle="tab" title="Software Detail">
                      <span class="round-tabs three">
                        <i class="fas fa-info-circle"></i>
                      </span> 
                    </a>
                  </li>
                  <li>
                    <a href="#settings" data-toggle="tab" title="Software Features">
                      <span class="round-tabs four">
                        <i class="fas fa-feather"></i>
                      </span> 
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-1 col-lg-2 col-sm-2 col-md-2"></div>
            <div class="tab-content col-10 col-sm-10 col-md-10 col-lg-10" style="margin-left:auto;margin-right:auto;">
                <div class="tab-pane fade active show" id="home">
                  <form id="main_info" class="container m-t-20 submit_result">
                    <div class="row" style="">
                      <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new" style="width: 200px; height: 200px;border:solid 1px grey;"></div>
                                  
                              <div class="fileinput-preview fileinput-exists" style="width: 200px;height:200px;border:solid 1px grey;"> </div>
                              <div>
                                  <span class="btn default btn-file">
                                      <span class="fileinput-new btn btn-primary"> Select image</span>
                                      <span class="fileinput-exists btn btn-primary"> Change </span>
                                      <input type="file" name="file" id="logo"> </span>
                                  <span class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </span>
                              </div>
                          </div>
                       </div>
                       <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="row">
                            <label class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12 control-label m-t-10" for="name">Name</label>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="input-group">
                                <input id="name" type="text" class="form-control maininfo input-circle-right" placeholder="Name" name="name" required> 
                              </div>
                            </div>    
                          </div> 

                          <div class="row m-t-20">
                            <label class="col-6 col-sm-6 col-md-6 col-lg-6">Categories</label>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                              <a class="btn btn-primary selectcategory" data-toggle="modal" href="#basic" style="max-height: 40px;float:right;">Select Category</a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 categories" style="max-width:calc(100% - 30px);border-style:solid;border-color:grey;border-width:1px;min-height:77px;padding:0px;margin:5px 15px 0px 15px;"></div>
                          </div>
                       </div>
                    </div>
                    <div class="row m-t-20">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                          <label class="col-12 col-sm-5 col-md-4 col-lg-3 control-label m-t-10" style="">Product Description</label>
                          <div class="col-12 col-sm-7 col-md-4 col-lg-9">
                              <textarea class="form-control maininfo" placeholder="Description" name="description" rows="5" required> </textarea>
                          </div>  
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-20">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                          <label class="col-12 col-sm-5 col-md-4 col-lg-3 control-label">About Product</label>
                          <div class="col-12 col-sm-7 col-md-8 col-lg-9">
                              <textarea class="form-control aboutproduct" placeholder="About Product" name="aboutproduct" rows="5" required> </textarea>
                          </div> 
                        </div> 
                      </div>
                    </div>
                    <button type="submit" id="maininfo_submit" style="display: none;"></button>
                  </form>
                </div>
                <div class="tab-pane fade" id="screenshot">
                  <div class="row" style="text-align: center;">
                    <div class="col-2 col-lg-2 col-sm-2 col-md-2"></div>
                    <form action="<?php echo base_url();?>vendors/do_upload" class="dropzone dropzone-file-area col-10 col-lg-8 col-sm-8 col-md-8" id="my-dropzone" style="margin-top: 50px;">
                        <h3 class="sbold">Drop files here or click to upload The ScreenShot</h3>
                        <p> You have to upload the screen shot for your software to satisfy the customers </p>
                    </form>
                  </div>
                  <form class="submit_result row" style="margin-top: 20px;">
                      <div class="col-lg-2"></div>
                      <label class="col-12 col-sm-6 col-md-3 col-lg-2 col-xs-12 control-label">Video Url</label>
                      <div class="col-12 col-sm-6 col-md-9 col-lg-6 col-xs-12">
                        <input type="url" class="form-control" name="video">
                      </div>
                      <button type="submit" style="display: none;"></button>
                  </form>
                </div>
                <div class="tab-pane fade" id="messages">
                  <form class="submit_result">
                    <div class="form-group m-t-30 row">
                      <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="row">
                          <label class="col-12 col-sm-12 col-md-3 col-lg-12 control-label">Website Url</label>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="url" class="form-control" name="websiteurl">
                          </div> 
                        </div> 
                      </div>
                      <div class="col-12 col-sm-12 col-md-2 col-lg-2"></div>
                      <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="row">
                          <label class="col-12 col-sm-12 col-md-12 col-lg-12 control-label">FreeTrial Url</label>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="url" class="form-control" name="freetrial">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="row">
                          <label class="col-12 col-sm-12 col-md-12 col-lg-12 m-t-10 control-label">FreeDemo Url</label>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="url" class="form-control" name="freetrial">
                          </div>    
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-md-2 col-lg-2"></div>
                      <div class="col-12 col-sm-12 col-md-5 col-lg-5 m-t-10">
                        <div class="row">
                          <label class="col-12 col-sm-12 col-md-12 col-lg-12 m-t-10 control-label">Who Use It</label>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input class="form-control" type="text" name="who_use">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                        <div class="row">
                          <label class="col-12 col-sm-12 col-md-12 col-lg-12 m-t-10 control-label">Deploy</label>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input class="form-control" type="text" name="deploy">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-2 col-md-2 col-lg-2"></div>
                      <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                        <div class="row">
                          <label class="col-12 col-sm-12 col-md-12 col-lg-12 control-label m-t-10">Starting Price</label>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                           <div class="row">
                              <div class="col col-sm-4 col-md-4 col-lg-4 col-xs-8">
                                <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                      <i class="fas fa-dollar-sign"></i>
                                  </span>
                                  <input class="form-control input-circle-right" type="number" name="start_price">
                                </div>
                              </div>
                              <div class="col col-sm-4 col-md-4 col-lg-4">
                                <select class="form-control" placeholder="Please Type your product Starting Price" name="start_price">
                                  <option value=""></option>
                                  <option value="daily">Daily</option>
                                  <option value="monthly">Month</option>
                                  <option value="year">Year</option>
                                </select>
                              </div>
                              <div class="col col-sm-4 col-md-4 col-lg-4">
                                <select class="form-control" placeholder="Please Type your product Starting Price" name="start_price">
                                  <option value=""></option>
                                  <option value="user">User</option>
                                  <option value="company">Company</option>
                                </select>
                              </div>   
                           </div> 
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-12 col-sm-12 col-md-12 col-lg-12 m-t-10 control-label">Price Detail</label>
                      <div class="col-12 col-sm-12 col-md-9 col-lg-9  m-t-10">
                        <textarea class="form-control" type="text" name="price_detail"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="row">
                          <label class="col-12 col-sm-12 col-md-12 col-lg-12 m-t-10 control-label">Training</label>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12 m-t-10" style="margin-left:20px;border-style:solid;border-width:1px;border-color:grey;">
                            <div class="row" style="margin:10px;" id="training">
                              <div class="checkbox checkbox-success col-lg-12">
                                <input id="inperson" class="styled" type="checkbox" value="inperson"/>
                                <label for="inperson">In Person</label> 
                              </div>
                              <div class="checkbox checkbox-success col-lg-12">
                                <input id="liveonline" class="styled" type="checkbox" value="liveonline"/>
                                <label for="liveonline">Live Online</label> 
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
                      </div>
                      <div class="col-12 col-sm-12 col-md-2 col-lg-2"></div>
                      <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="row">
                          <label class="col-12 col-sm-12 col-md-12 col-lg-12 m-t-10 control-label">Support</label>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12 m-t-10" style="margin-left:20px;border-style:solid;border-width:1px;border-color:grey;">
                            <div class="row" style="margin:10px;" id="support">
                              <div class="checkbox checkbox-success col-lg-12">
                                <input id="liverep" class="styled" type="checkbox" value="liverep"/>
                                <label for="liverep">24/7 (Live Rep)</label>  
                              </div>
                              <div class="checkbox checkbox-success col-lg-12">
                                <input id="businesshour" class="styled" type="checkbox" value="businesshour"/>
                                <label for="businesshour">Business Hour</label> 
                              </div>
                              <div class="checkbox checkbox-success col-lg-12">
                                <input id="online" class="styled" type="checkbox" value="onLine"/>
                                <label for="online">OnLine</label>  
                              </div>
                            </div>
                          </div>    
                        </div>
                      </div>
                    </div>
                    <button type="submit" style="display: none;"></button>
                  </form>
                </div>
                <div class="tab-pane fade" id="settings">
                  <div class="row featureEdit">
                    
                  </div>
                </div>
			      </div>
		    </div>
  		</div>
      <div class="col-1 col-lg-2 col-sm-2 col-md-2"></div>
      <hr/>
      <div class="col-lg-12 m-t-30">
        <div class="row">
          <div class="col-12 col-sm-9 col-md-9 col-lg-9"></div>
          <div class="col-12 col-sm-3 col-md-3 col-lg-3">
            <span class="btn btn-primary" id="prev">PREV<i class="fas fa-angle-left" style="margin-left:10px;"></i></span>
            <span class="btn btn-primary" id="next">NEXT<i class="fas fa-angle-right" style="margin-left:10px;"></i></span>
            <span class="btn btn-primary savesoftware">Save Software</span>
          </div>
        </div>
      </div>
		</div>

    <div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Please Select The Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>       
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
              <thead>
                <tr>
                    <th>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                            <span></span>
                        </label>
                    </th>
                    <th> Name </th>
                    <th>Features</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($category as $categories){?>
                  <tr class="odd gradeX">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes category_select" value="<?php echo $categories['id'];?>" />
                            <span></span>
                        </label>
                    </td>
                    <td><?php echo $categories['name'];?></td>
                    <td>
                      <?php foreach($categories['feature'] as $features){?>
                        <span class="badge badge-dark dark feature" style="margin-top:2px;" attr_id="<?php echo $features['id'];?>"><?php echo $features['name']?></span>
                      <?php }?>
                    </td>
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
  </div>
</div>
</div>