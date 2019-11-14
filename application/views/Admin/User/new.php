
<!-- BEGIN CONTENT BODY -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-lg-12" style="padding:0px;">
                    <div class="card-header">
                        <span class="title-3 m-l-30"><i class="fa fa-user"></i>Add New User</span>
                        <span class="btn btn-success pull-right" style="margin-right:15px;" id="saveuser">Save<i class="fas fa-save" style="margin-left:10px;"></i></span>
                        <a href="<?php echo base_url();?>admin/user/all/buyer" class="btn btn-danger pull-right" style="margin-right:15px;">Cancel</a>
                    </div>
                    <div class="card-body card-block">
                        <form class="form-horizontal" id="userform" attr_type="buyer">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col col-sm-6 col-md-2 col-lg-2 col-xs-12 form-control-label">Profile Image</label>
                                    <div class="col col-sm-6 col-md-10 col-lg-10 col-xs-12">
                                        <div class="fileinput fileinput-new row" data-provides="fileinput" style="width:100%;">
                                            <div class="col-lg-12 fileinput-new" style="width: 226px; height: 150px;">
                                                <div style="width: 226px; height: 150px; border:solid 1px lightgrey; float: left; "></div>
                                            </div>
                                                
                                            <div class="col-lg-12 fileinput-preview fileinput-exists thumbnail" style="max-width: 255px; max-height: 150px;float:left;"> </div>
                                            <div class="col-lg-12" style="float:left; margin-left: 10px;">
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new btn btn-success" style="margin-left: 30px; border-radius: 20px;"> Select image </span>
                                                    <span class="fileinput-exists btn btn-primary" style="border-radius: 20px;"> Change </span>
                                                    <input type="file" name="profile" id="profile"> </span>
                                                <span class="btn btn-danger fileinput-exists" data-dismiss="fileinput" style=" border-radius: 20px;"> Remove </span>
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
                                 <h1 class="title-3"><i class="fa fa-lock"></i> Social Network URLS</h1>
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
