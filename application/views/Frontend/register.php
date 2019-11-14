
<!-- BEGIN CONTENT BODY -->
<div class="container shadow border_default m-t-100 m-b-60">
    <div class="row">
        <div class="col-lg-11 m-t-20 m-b-30" style="margin-left:auto;margin-right:auto;">
            <span class="title-3 m-l-30"><i class="fa fa-user"></i>Please Register Your Account</span>
            <div class="card-body card-block m-t-20">
                <form class="form-horizontal" id="userform">
                    <div class="form-group row" style="width:100%;">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 m-b-20" style="margin-left:auto;">
                                <div class="row">
                                    <h1 class="col-12" style="font-size:18px;">Basic Info</h1>
                                </div>
                                <div class="row m-t-20">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;background-color: grey;"></div>
                                            
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="width: 200px; height: 150px;border:solid 1px grey;"> 
                                        </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new btn btn-success"> Select image </span>
                                                <span class="fileinput-exists btn btn-primary"> Change </span>
                                                <input type="file" name="profile" id="profile"> 
                                            </span>
                                            <span class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-5 control-label m-t-5">First Name</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-7 m-t-5">
                                        <div class="row">
                                            <input type="text" class="form-control input-circle-right" placeholder="First Name" name="firstname"  value="" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-5 control-label m-t-5">Last Name</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-7 col-xs-12 m-t-5">
                                        <div class="row">
                                            <input type="text" class="form-control input-circle-right" placeholder="Last Name" name="lastname"  value="" required> 
                                        </div>
                                    </div>            
                                </div>
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-5 control-label m-t-5">Email Address</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-7 m-t-5">
                                        <div class="row">
                                            <input type="email" class="form-control input-circle-right" placeholder="Email Address" name="email" value="" required> 
                                        </div>
                                    </div>            
                                </div>
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-5 control-label m-t-5">Phone Number</label>
                                    <div class="col col-sm-6 col-md-7 col-lg-7 m-t-5">
                                        <div class="row">
                                            <input type="number" class="form-control input-circle-right" placeholder="Phone Number" name="phone" value="" required> 
                                        </div>
                                    </div>            
                                </div>
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-5 control-label m-t-5">Website</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-7 m-t-5">
                                        <div class="row">
                                            <input type="url" class="form-control input-circle-right" placeholder="Website Url" name="website"  value="" required> 
                                        </div>
                                    </div>            
                                </div>
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-5 control-label m-t-5">Company</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-7 m-t-5">
                                        <div class="row">
                                            <input type="text" class="form-control input-circle-right" placeholder="Company" name="company" value="" required> 
                                        </div>
                                    </div>            
                                </div>
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-5 control-label m-t-5">Your Company Size</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-7 m-t-5">
                                        <div class="row">
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
                                    </div>            
                                </div>
                             </div>
                             <div class="col-12 col-sm-12 col-md-12 col-lg-1"></div>
                             <div class="col-12 col-sm-12 col-md-12 col-lg-5 m-b-20">
                                <div class="row">
                                    <h1 class="col-12 text-center" style="font-size:18px;width:100%;">Authentication Info</h1>
                                </div>
                                <div class="row m-t-35">
                                    <label class="col-12 col-sm-12 col-md-12 col-lg-5 control-label m-t-5">User Name</label>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 m-t-5">
                                        <div class="row">
                                            <input type="text" class="form-control input-circle-right" placeholder="User Name" name="username" value="" required> 
                                        </div>
                                    </div>            
                                </div>  
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-5 control-label m-t-5">Password</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-7 m-t-5">
                                        <div class="row">
                                            <input type="password" class="form-control input-circle-right" placeholder="Password" name="password" id="password"> 
                                        </div>
                                    </div>            
                                </div>
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-5 col-xs-12 control-label m-t-5">Confirm Password</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-7 m-t-5">
                                        <div class="row">
                                            <input type="password" class="form-control input-circle-right" placeholder="Confirm Password" name="confirmpassword" equalto='#password'> 
                                        </div>
                                    </div>            
                                </div>
                                <hr style="padding-top:20px;padding-bottom:0px;border-width:2px;margin-top:20px;margin-bottom:0px;"/>
                                <div class="row m-t-45">
                                    <h1 class="col-12 text-center" style="font-size:18px;">Social NetWork Urls</h1>           
                                </div>
                                <div class="row m-t-35">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Facebook</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-8 col-xs-12 m-t-5">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fab fa-facebook-f" style="font-size:20px;"></i>
                                            </span>
                                            <input type="text" class="extra form-control input-circle-right" placeholder="Facebook" name="facebook"  value=""> 
                                        </div>
                                    </div>        
                                </div>  
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Google</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fab fa-google-plus-g" style="font-size:20px;"></i>
                                            </span>
                                            <input type="text" class="extra form-control input-circle-right" placeholder="Google" name="google" value=""> 
                                        </div>
                                    </div>        
                                </div> 
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Linked In</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fab fa-linkedin-in" style="font-size:20px;"></i>
                                            </span>
                                            <input type="url" class="extra form-control input-circle-right" placeholder="Linked In Url" name="linkedin" value="<?php echo isset($user['socialnetwork']['linkedin'])?$user['socialnetwork']['linkedin']:'';?>"> 
                                        </div>
                                    </div>        
                                </div>
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Twitter</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fab fa-twitter" style="font-size:20px;"></i>
                                            </span>
                                            <input type="url" class="extra form-control input-circle-right" placeholder="Twitter Url" name="twitter" value=""> 
                                        </div>
                                    </div>        
                                </div>
                                <div class="row m-t-10">
                                    <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Youtube</label>
                                    <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fab fa-youtube" style="font-size:20px;"></i>
                                            </span>
                                            <input type="text" class="extra form-control input-circle-right" placeholder="Youtube" name="youtube" value=""> 
                                        </div>
                                    </div>        
                                </div>        
                             </div>
                    </div>
                    <button type="submit" style="display:none" id="userbutton"></button>
                    <div class="row">
                        <div class="col-12">
                            <a class="btn btn-primary pull-right" style="width:180px;margin-right:15%;margin-bottom:30px;float:right;color:white;padding:10px 30px;" id="saveuser">Register<i class="fas fa-save" style="margin-left:10px;"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
           