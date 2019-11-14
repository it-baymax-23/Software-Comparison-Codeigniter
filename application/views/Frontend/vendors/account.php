
                <div class="tab-content row" style="margin:0px;">
                    <div class="user-data col-lg-12">
                        <div class="card-body card-block">
                            <form class="form-horizontal" id="userform">
                                <div class="form-group">
                                    <div class="row m-b-30">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 m-b-20" style="margin-left:auto;">
                                            <div class="row">
                                                <h1 class="col-12" style="font-size:18px;">Basic Information</h1>
                                            </div>
                                            <div class="row m-t-20">
                                                <div class="fileinput <?php if(!$user['profile']){ echo 'fileinput-new';} else{echo 'fileinput-exists';}?>" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;background-color: grey;"></div>
                                                        
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="width: 200px; height: 150px;border:solid 1px grey;"> 
                                                        <?php if($user['profile']){?>
                                                        <img src="<?php echo base_url() . $user['profile'];?>" style="width:100%; height:100%;"/>
                                                        <?php }?>
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
                                                <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">First Name</label>
                                                <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                                    <div class="row">
                                                        <input type="text" class="form-control input-circle-right" placeholder="First Name" name="firstname"  value="<?php echo isset($user['firstname'])?$user['firstname']:'';?>" required> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-t-10">
                                                <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Last Name</label>
                                                <div class="col-12 col-sm-6 col-md-7 col-lg-8 col-xs-12 m-t-5">
                                                    <div class="row">
                                                        <input type="text" class="form-control input-circle-right" placeholder="Last Name" name="lastname"  value="<?php echo isset($user['lastname'])?$user['lastname']:'';?>" required> 
                                                    </div>
                                                </div>            
                                            </div>
                                            <div class="row m-t-10">
                                                <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Email Address</label>
                                                <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                                    <div class="row">
                                                        <input type="email" class="form-control input-circle-right" placeholder="Email Address" name="email" value="<?php echo isset($user['email'])?$user['email']:'';?>" required> 
                                                    </div>
                                                </div>            
                                            </div>
                                            <div class="row m-t-10">
                                                <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Phone Number</label>
                                                <div class="col col-sm-6 col-md-7 col-lg-8 m-t-5">
                                                    <div class="row">
                                                        <input type="number" class="form-control input-circle-right" placeholder="Phone Number" name="phone" value="<?php echo isset($user['phone'])?$user['phone']:'';?>" required> 
                                                    </div>
                                                </div>            
                                            </div>
                                            <div class="row m-t-10">
                                                <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Website</label>
                                                <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                                    <div class="row">
                                                        <input type="url" class="form-control input-circle-right" placeholder="Website Url" name="website"  value="<?php echo isset($user['website'])?$user['website']:'';?>" required> 
                                                    </div>
                                                </div>            
                                            </div>
                                            <div class="row m-t-10">
                                                <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Company</label>
                                                <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                                    <div class="row">
                                                        <input type="text" class="form-control input-circle-right" placeholder="Company" name="company" value="<?php echo isset($user['company'])?$user['company']:'';?>" required> 
                                                    </div>
                                                </div>            
                                            </div>
                                            <div class="row m-t-10">
                                                <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Your Company Size</label>
                                                <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                                    <div class="row">
                                                        <select name="company_size" class="form-control">
                                                            <option value="2~10" <?php if($user['company_size'] == '2~10'){echo 'selected';}?>>2~10</option>
                                                            <option value="10~30" <?php if($user['company_size'] == '10~30'){echo 'selected';}?>>10~30</option>
                                                            <option value="30~50" <?php if($user['company_size'] == '2~10'){echo 'selected';}?>>30~50</option>
                                                            <option value="50~100" <?php if($user['company_size'] == '2~10'){echo 'selected';}?>>50~100</option>
                                                            <option value="100~200" <?php if($user['company_size'] == '100~200'){echo 'selected';}?>>100~200</option>
                                                            <option value="200~500" <?php if($user['company_size'] == '100~200'){echo 'selected';}?>>200~500</option>
                                                            <option value="500~1000" <?php if($user['company_size'] == '500~1000'){echo 'selected';}?>>500~1000</option>
                                                            <option value="1000+" <?php if($user['company_size'] == '1000+'){echo 'selected';}?>>1000+</option>
                                                        </select>
                                                    </div>
                                                </div>            
                                            </div>
                                         </div>
                                         <div class="col-12 col-sm-12 col-md-12 col-lg-1"></div>
                                         <div class="col-12 col-sm-12 col-md-12 col-lg-5 m-b-20">
                                            <div class="row">
                                                <h1 class="col-12 text-center" style="font-size:18px;width:100%;">Authentication Information</h1>
                                            </div>
                                            <div class="row m-t-35">
                                                <label class="col-12 col-sm-12 col-md-12 col-lg-4 control-label m-t-5">User Name</label>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 m-t-5">
                                                    <div class="row">
                                                        <input type="text" class="form-control input-circle-right" placeholder="User Name" name="username" value="<?php echo isset($user['username'])?$user['username']:'';?>" required> 
                                                    </div>
                                                </div>            
                                            </div>  
                                            <div class="row m-t-10">
                                                <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Password</label>
                                                <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                                    <div class="row">
                                                        <input type="password" class="form-control input-circle-right" placeholder="Password" name="password" id="password"> 
                                                    </div>
                                                </div>            
                                            </div>
                                            <div class="row m-t-10">
                                                <label class="col-12 col-sm-6 col-md-5 col-lg-4 col-xs-12 control-label m-t-5">Confirm Password</label>
                                                <div class="col-12 col-sm-6 col-md-7 col-lg-8 m-t-5">
                                                    <div class="row">
                                                        <input type="password" class="form-control input-circle-right" placeholder="Confirm Password" name="confirmpassword" equalto='#password'> 
                                                    </div>
                                                </div>            
                                            </div>
                                            <hr style="padding-top:20px;padding-bottom:0px;border-width:2px;margin-top:20px;margin-bottom:0px;"/>
                                            <div class="row m-t-45">
                                                <h1 class="col-12" style="font-size:18px;">Social NetWork Url</h1>           
                                            </div>
                                            <div class="row m-t-35">
                                                <label class="col-12 col-sm-6 col-md-5 col-lg-4 control-label m-t-5">Facebook</label>
                                                <div class="col-12 col-sm-6 col-md-7 col-lg-8 col-xs-12 m-t-5">
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fab fa-facebook-f" style="font-size:20px;"></i>
                                                        </span>
                                                        <input type="text" class="extra form-control input-circle-right" placeholder="Facebook" name="facebook"  value="<?php echo isset($user['socialnetwork']['facebook'])?$user['socialnetwork']['facebook']:'';?>"> 
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
                                                        <input type="text" class="extra form-control input-circle-right" placeholder="Google" name="google" value="<?php echo isset($user['socialnetwork']['google'])?$user['socialnetwork']['google']:'';?>"> 
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
                                                        <input type="url" class="extra form-control input-circle-right" placeholder="Twitter Url" name="twitter" value="<?php echo isset($user['socialnetwork']['twitter'])?$user['socialnetwork']['twitter']:'';?>"> 
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
                                                        <input type="text" class="extra form-control input-circle-right" placeholder="Youtube" name="youtube" value="<?php echo isset($user['socialnetwork']['youtube'])?$user['socialnetwork']['youtube']:'';?>"> 
                                                    </div>
                                                </div>        
                                            </div>        
                                         </div>
                                    </div>
                                </div>
                                <button type="submit" style="display:none" id="userbutton"></button>
                                <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-primary pull-right" style="margin-right:5%;margin-bottom:30px;float:right;color:white;padding:10px 30px;" id="updateaccount">Update Account</i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>