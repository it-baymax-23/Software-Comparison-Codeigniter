<style>
    .image_picker_selector
    {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        max-height: 500px;
        overflow-y: scroll;
    }

    .image_picker_selector li
    {
        width:100%;
        height:150px;
        overflow-y: hidden;
    }
</style>
<!-- BEGIN CONTENT BODY -->
<div class="main-content p-b-50">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-lg-12">
                    <span class="btn btn-success pull-right" style="margin-right:15px;margin-bottom:30px;" id="saveuser">Save Admin User<i class="fas fa-save" style="margin-left:10px;"></i></span>
                </div> -->
                <div class="card col-lg-12" style="padding:0px;">
                    <div class="card-header">
                        <span class="title-3 m-l-30"><i class="fa fa-user"></i> Add New Admin</span>
                        <span class="btn btn-success pull-right" style="margin-right:15px;" id="saveuser">Save<i class="fas fa-save" style="margin-left:10px;"></i></span>
                        <a href="<?php echo base_url();?>admin/user/all/admins" class="btn btn-danger pull-right" style="margin-right:15px;">Cancel</a>
                    </div>
                    <div class="card-body card-block">
                        <form class="form-horizontal" id="userform" attr_type="admins">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 form-control-label">Profile Image</label>
                                    <div class="col col-sm-6 col-md-10 col-lg-10 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-12 image_view" style="max-width: 255px; max-height: 150px;min-height:150px;float:left;border:solid 1px lightgrey;"> </div>
                                            <div class="col-lg-12 m-t-10" style="float:left; margin-left: 10px;">
                                                    <a class="btn btn-success" style="margin-left: 30px; border-radius: 20px;" data-toggle="modal" href="#basic"> Select image </a>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                            <div class="row form-group" >
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">First Name</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px;">
                                            <i class="fa fa-font"></i>
                                        </span>
                                        <input type="text" class="form-control input-circle-right" placeholder="First Name" name="firstname" required style="border-radius: 0px;"/> 
                                    </div>
                                </div>
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Last Name</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px;">
                                            <i class="fa fa-font"></i>
                                        </span>
                                        <input type="text" class="form-control input-circle-right" placeholder="Last Name" name="lastname" required  style="border-radius: 0px;"/> 
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Email Address</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px;">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control input-circle-right" placeholder="Email Address" name="email" required  style="border-radius: 0px;"/> 
                                    </div>
                                </div>
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Phone Number</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px;">
                                            <i class="fa fa-phone-square"></i>
                                        </span>
                                        <input type="number" class="form-control input-circle-right" placeholder="Phone Number" name="phone" required  style="border-radius: 0px;"/> 
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Website</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px;">
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <input type="url" class="form-control input-circle-right" placeholder="Website Url" name="website" required  style="border-radius: 0px;"/> 
                                    </div>
                                </div>
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Company</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px;">
                                            <i class="fa fa-building"></i>
                                        </span>
                                        <input type="text" class="form-control input-circle-right" placeholder="Company" name="company" required  style="border-radius: 0px;"/> 
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Your Company Size</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <select name="company_size" class="form-control">
                                        <option value="2~10">2~10</option>
                                        <option value="10~30">10~30</option>
                                        <option value="30~50">30~50</option>
                                        <option value="50~100">50~100</option>
                                        <option value="100~200">100~200</option>
                                        <option value="200~500">200~500</option>
                                        <option value="500~1000">500~1000</option>
                                        <option value="1000+">1000+</option>
                                    </select>
                                </div>
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Industry</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <select name="industry" class="form-control">
                                        <option value="Computer Software">Computer Software</option>
                                        <option value="IT/Serivices">IT/Services</option>
                                        <option value="Management Consulting">Management Consulting</option>
                                        <option value="Marketing/Advertising">Marketing/Advertising</option>
                                        <option value="Primary/Secondary Education">Primary/Secondary Education</option>
                                        <option value="Education Management">Education Management</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Civic/Social Organization">Civic/Social Organization</option>
                                        <option value="Construction">Civic/Social Organization</option>
                                        <option value="Hospital/Health Care">Hospital/Health Care</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                 <label class="col-12 col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Role Manage</label>
                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xs-12"  style="max-height: 300px;overflow-y: scroll;">
                                    <div id="tree_2">
                                        <ul class="tree-demo">
                                            <?php role_set_tree();?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="col-md-12 text-center">
                                <h1 class="title-3"><i class="fa fa-lock"></i> Authentication </h1>
                            </div>
                            <div class="form-group row" style="margin-top:30px;">
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">User Name</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px;">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control input-circle-right" placeholder="User Name" name="username" required  style="border-radius: 0px;"/> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:30px;">
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Password</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px;">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control input-circle-right" placeholder="Password" name="password" required id="password"  style="border-radius: 0px;"/> 
                                    </div>
                                </div>
                                <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Confirm Password</label>
                                <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px;">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control input-circle-right" placeholder="Confirm Password" name="confirmpassword" required equalto='#password'  style="border-radius: 0px;"/> 
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="col-md-12 text-center">
                                 <h1 class="title-3"><i class="fa fa-lock"></i> Social Network </h1>
                            </div>

                            <div class="form-body m-t-30" id="socialnetwork">
                                <div class="row form-group">
                                    <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Facebook</label>
                                    <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px; width: 50px;">
                                                <i class="fab fa-facebook-f" style="color:blue;font-size:20px;"></i>
                                            </span>
                                            <input type="text" class="extra form-control input-circle-right" placeholder="Facebook url" name="facebook"  style="border-radius: 0px;"/> 
                                        </div>
                                    </div>
                                    <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Google</label>
                                    <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px; width: 50px;">
                                                <i class="fab fa-google-plus-g" style="color:blue;font-size:20px;"></i>
                                            </span>
                                            <input type="text" class="extra form-control input-circle-right" placeholder="Google url" name="google"  style="border-radius: 0px;"/> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">LinkedIn</label>
                                    <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px; width: 50px;">
                                                <i class="fab fa-linkedin-in" style="color:blue;font-size:20px;"></i>
                                            </span>
                                            <input type="utl" class="extra form-control input-circle-right" placeholder="LinkedIn url" name="linkedin"  style="border-radius: 0px;"/> 
                                        </div>
                                    </div>
                                    <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Twitter</label>
                                    <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px; width: 50px;">
                                                <i class="fab fa-twitter" style="color:blue;font-size:20px;"></i>
                                            </span>
                                            <input type="url" class="extra form-control input-circle-right" placeholder="Twitter url" name="twitter"  style="border-radius: 0px;"/> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-md-2 col-lg-2 col-xs-12 control-label">Youtube</label>
                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left" style="border-radius: 0px; border-right: 0px; width: 50px;">
                                                <i class="fab fa-youtube" style="color:blue;font-size:20px;"></i>
                                            </span>
                                            <input type="text" class="extra form-control input-circle-right" placeholder="Youtube url" name="youtube"  style="border-radius: 0px;"/> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="display:none" id="userbutton"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-modal-lg" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:80vw;">
            <div class="modal-content" style="width:80vw;">
                <div class="modal-header">
                    <h4 class="modal-title">Please Select Image</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    
                </div>
                <div class="modal-body">
                    <div class="row m-t-10 m-b-10">
                        <div class="col-3">Upload Image</div>
                        <div class="col-9"><input type="file" name="profile" id="profile"><span class="m-l-10 btn btn-primary uploadimage">Upload Image</span></div>
                    </div>
                  <select class="image-picker show-html">
                    <?php foreach($images as $key => $image){
                        $data_img_class = '';
                        if($key == 0)
                        {
                            $data_img_class = 'data-img-class="first"';
                        }
                        else if($key == count($images) - 1)
                        {
                            $data_img_class = 'data-img-class = "last"';
                        }
                        ?>

                    <option <?php echo $data_img_class;?> data-img-width="100px" data-img-height="100px" data-img-src="<?php echo base_url() . $image;?>" value="<?php echo $image;?>"></option>
                    <?php }?>
                      
                    </select>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="selectimage">Select</button>
                </div>
            </div>
        </div>
 </div>