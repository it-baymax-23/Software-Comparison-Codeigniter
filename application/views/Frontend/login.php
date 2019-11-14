<div class="page-container m-t-30" style="padding-left:0px;padding-bottom:30px;">
    <div class="main-content" style="padding-top:0px;">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
             <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        
                    </div>
                    <div class="login-form  m-b-30">
                        <form action="<?php echo base_url()?>loginuser" method="post">
                            <div class="form-group">
                                <label>Email Address Or UserName</label>
                                <input class="au-input au-input--full form-control" type="text" name="username" placeholder="Email Address Or Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="remember">Remember Me
                                </label>
                                <label>
                                    <a href="<?php echo base_url()?>forget">Forgotten Password?</a>
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            <div class="social-login-content">
                                <div class="social-button">
                                    <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                </div>
                            </div>
                        </form>
                        <div class="register-link">
                            <p>
                                Don't you have account?
                                <a href="<?php echo base_url()?>register">Sign Up Here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>