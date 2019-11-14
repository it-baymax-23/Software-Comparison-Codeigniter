<div class="banner" style="padding-top:0px;padding-bottom:0px;">
    <div class="banner_background" style="background-color:#32b4c3;"></div>
    <div class="container fill_height">
        <div class="row fill_height">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 fill_height">
                <div class="banner_content" style="height:100%;text-align: center;background-color:#32b4c3">
                    <h2 class="banner_text">
                            The Right Software Will<br> Help Your Business<br> Take Off<br>
                    </h2>
                    <div class="banner_container m-t-20">
                        <div class="banner_button" style="cursor: pointer;">
                            <a class="popularcategory btn btn-danger btn-circle" href="#popularcategory" style=""><span>Explore Software by Category</span> <span><i class="fas fa-angle-double-down m-l-10 p-t-5"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner_image col-12 col-sm-12 col-md-4 col-lg-4 fill_height">
                <img src="<?php echo base_url();?>images/home/rocket.png"/>
            </div>
        </div>
    </div>
</div>

<!-- Characteristics -->

<div class="characteristics">    
    <div class="row">
        <h3 class="character_text col-lg-12" style="">We Make Choosing the Right Software Easy</h3>
    </div>
    <div class="row service" style="">
        <!-- Char. Item -->
        <div class="col-lg-3 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12" style="text-align: center;">
                    <img src="<?php echo base_url();?>images/home/send.png"/>
                </div>
                <div class="col-lg-12 col-md-12 service_text" style="text-align: center;">  
                    <p style="color:rgb(69,135,177);margin-bottom: 0px;">Discover</p>
                    <p>Easily browse software that will<br> help grow your business.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12" style="text-align: center;">
                    <img src="<?php echo base_url();?>images/home/search.png"/>
                </div>
                <div class="col-lg-12 col-md-12 service_text" style="text-align: center;">
                    <p style="color:rgb(69,135,177);margin-bottom: 0px;">Compare</p>
                    <p>In-depth side-by-side comparisions<br> and market expert advice.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12" style="text-align: center;">
                    <img src="<?php echo base_url();?>images/home/review.png"/>
                </div>
                <div class="col-lg-12 col-md-12 service_text" style="text-align: center;">
                    <p style="color:rgb(69,135,177);margin-bottom: 0px;">Review</p>
                    <p>Read verified customer reviews<br> and industry specific experiences.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12" style="text-align: center;">
                    <img src="<?php echo base_url();?>images/home/best.png"/>
                </div>
                <div class="col-lg-12 col-md-12 service_text" style="text-align: center;">
                    <p style="color:rgb(69,135,177);margin-bottom: 0px;">Select</p>
                    <p>Confidently select the software that works <br> best for your company’s needs.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="banner_2">
    <div class="banner_background" style="background-image:url(<?php echo base_url();?>images/home/background.png)"></div>
    <div class="banner_2_container">
        <div class="banner_2_dots"></div>
        <h2 class="banner_text" style="padding-top:2vw;">Over 2 Million Verified Customer Reviews</h2><!-- Banner 2 Slider -->
        <div class="banner_description">
            <p style="color:white;font-size:17px;text-align: center;">Our aggregated review technology means more customer reviews than any other website, 45,000+ new reviews monthly </p>
        </div>
    </div>
</div>

<div id="popularcategory" class="row m-b-100" style="margin-top: 3vw;">
    <div class="container">
        <div class="row">
            <h3 class="character_text col-lg-12" style="text-align: center;">Popular Categories</h3>
        </div>
        <div class="row popular_catcontainer m-t-30">
            <?php foreach($popular_category as $popular){?>
            <div class="col-12 m-t-20">
                <div class="row">
                    <a href="<?php echo base_url()?>compare-<?php echo str_replace(' ','-',$popular['main']);?>-review-<?php echo str_replace(' ','-',$popular['name']);?>" class="col-11 shadow popular-category" style="margin:auto;height:250px;">
                        <div class="category_image row" style="background-image:url(<?php echo base_url().$popular['categoryicon'];?>)">
                            
                        </div>
                        <div class="category_text row m-b-20">
                            <p class="col-12 text_center" style="color:rgb(69,135,177);text-align: center;font-size:15px;font-weight: 500;"><?php echo $popular['name'];?></p>
                        </div>     
                    </a>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>