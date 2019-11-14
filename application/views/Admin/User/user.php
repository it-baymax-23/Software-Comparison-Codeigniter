
    <!-- BEGIN CONTENT BODY -->
    <div class="main-content p-b-50">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="user-data col-lg-12 m-b-20">
                    	<div class="portlet box green">
                    		<h3 class="title-3 m-b-20" style="padding-left: 5px; padding-right: 5px; font-size: 20px; font-weight: bold;"><i class="fa fa-user"></i>All Users</h3>
                            <div class="filters m-b-0" style="padding-left: 5px; padding-right: 5px;">
                                <a href="<?php echo base_url();?>admin/user/newuser/buyer" id="add_new_user" class="btn btn-success" style="border-radius: 20px; ">
                                    Add New<i class="fa fa-plus-circle" style="margin-left:10px;"></i>
                                </a>
                                <button id="delete_user" class="btn btn-danger pull-right" style="border-radius: 20px; background-color: #EF4836 ">
                                    Delete<i class="fa fa-trash" style="margin-left:10px;"></i>
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-lg-12"  style="padding:30px 20px">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column table-scrollable text-center" id="sample_1" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
                                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                    <span></span>
                                                </label>
                                            </th>
                                            <th>Profile</th>
                                            <th>User Name</th>
                                            <th>Email Address</th>
                                            <th>Industry</th>
                                            <th>Activated</th>
                                            <th>Popular</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($user as $users){?>
                                            <tr class="odd gradeX">
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
                                                        <input type="checkbox" class="checkboxes" value="<?php echo $users['id'];?>" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td style="vertical-align: middle;text-align: center;"><img src="<?php echo base_url() . $users['profile'];?>" style="width:50px;height:50px;"></td>
                                                <td style="vertical-align: middle;text-align: center;"><?php echo $users['username'];?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?php echo $users['email'];?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?php echo $users['industry'];?></td>
                                                <td style="vertical-align: middle;text-align: center;"><?php echo $users['activated']?'<i class="fas fa-check-circle" style="color:#57c757;font-size:24px;"></i>':'<i class="fas fa-check-circle" style="font-size:24px;"></i>';?></td>
                                                <td  style="vertical-align: middle;text-align: center;">
                                                    <?php if($users['usertype'] == 'vendor'){?>
                                                    <label class="switch">
                                                      <input class="popular" type="checkbox" attr_id="<?php echo $users['id'];?>" <?php if($users['popular'] && $users['usertype'] == 'vendor'){echo 'checked';}?>>
                                                      <span class="slider_checkbox round"></span>
                                                    </label>
                                                    <?php }?>
                                                </td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                                    </button>
                                                    <ul class="dropdown-menu pull-right account-dropdown__body" role="menu">
                                                        <div class="account-dropdown__body">
                                                            <div class="account-dropdown__item">
                                                                <a href="<?php echo base_url();?>admin/user/edituser/buyer/<?php echo $users['id'];?>" style="font-size: 12px;">
                                                                    <i class="fa fa-edit"></i> Edit</a>
                                                            </div>
                                                            <div class="account-dropdown__item">
                                                                <a href="javascript:;" class="<?php echo $users['activated']?'deactivate':'activate';?>" attr_id = '<?php echo $users['id'];?>' style="font-size:12px;">
                                                                    <i class="fas fa-shield-alt"></i> <?php echo $users['activated']?'Deactivate':'Activate';?></a>
                                                            </div>
                                                            <div class="account-dropdown__item">
                                                                <a href="javascript:;" class="delete" attr-id="<?php echo $users['id'];?>" style="font-size: 12px;">
                                                                    <i class="fa fa-trash"></i> Delete</a>
                                                            </div>
                                                            <div class="account-dropdown__item">
                                                                <a class="moreinfo" attr-id="<?php echo $users['id'];?>" style="font-size: 12px; cursor:pointer;">
                                                                    <i class="fa fa-info-circle"></i> More Info</a>
                                                            </div>
                                                            
                                                        </div>
                                                    </ul>
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
            </div>
        </div>
    </div>

    <div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                
            </div>
            <div class="modal-body" style="padding:10px 30px;">
              <div class="row m-t-20">
                    <label class="col-lg-3">Profile Image: </label>
                    <div class="col-lg-9 profile"></div>
              </div>
              <div class="row m-t-15">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="row">
                    <label class="col-5">First Name: </label>
                    <span class="col-6 firstname" style="font-weight: bold;"></span>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="row">
                    <label class="col-lg-5">Last Name: </label>
                    <span class="col-lg-6 lastname" style="font-weight: bold;"></span>
                  </div>
                </div>
              </div>
              <div class="row m-t-15">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="row">
                    <label class="col-lg-5">User Name: </label>
                    <span class="col-lg-6 username" style="font-weight: bold;"></span>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="row">
                    <label class="col-lg-5">User Type: </label>
                    <span class="col-lg-6 usertype" style="font-weight: bold;"></span>
                  </div>
                </div>
              </div>
              <div class="row m-t-15">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="row">
                    <label class="col-lg-5">Email Address: </label>
                    <span class="col-lg-6 email" style="font-weight: bold;"></span>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="row">
                    <label class="col-lg-5">Phone Number: </label>
                    <span class="col-lg-6 phone" style="font-weight: bold;"></span>
                  </div>
                </div>
              </div>
              <div class="row m-t-15">                    
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="row">
                    <label class="col-lg-5">Company: </label>
                    <span class="col-lg-6 company" style="font-weight: bold;"></span>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="row">
                    <label class="col-lg-5">Company Size: </label>
                    <span class="col-lg-6 company_size" style="font-weight: bold;"></span>
                  </div>
                </div>
              </div>
              <div class="row m-t-15">                    
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="row">
                    <label class="col-lg-5">Website: </label>
                    <span class="col-lg-7 website"  style="font-weight: bold;"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>                
            </div>
        </div>
    </div>
 </div>