<div class="home">
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column"  style="background-color: rgb(11,152,183);position:relative;">
      <div class="compare_container m-t-10" style="height:100%;">
        <span class="searchtitle" style="width:80%;"><a class="searchtitle" href="<?php echo base_url();?>">HOME</a> <img src="<?php echo base_url()?>images/icon/icon-right.png" style="width:auto;height:auto;margin:0px 5px;"><a class="searchtitle" href="<?php echo base_url().'compare-' . str_replace(' ','-',$main) . '-review-' . str_replace(' ', '-', $category);?>"><?php echo strtoupper($category);?></a><img src="<?php echo base_url()?>images/icon/icon-right.png" style="width:auto;height:auto;margin:0px 5px;"><?php echo strtoupper($page);?></span>
        <h3 class="searchheader" style="margin-top:30px;"><?php echo $products[0]['name'];?> <?php echo ucfirst($page);?></h3>
      </div>
      <div class="row" style="margin:0px;position: absolute; bottom:0;width:100%;">
        <div id="productdetail_tabs" class="col-12 p-t-15 sticky" style="background-color: rgb(11,152,183);z-index:100;">
          <div class="compare_container">
            <div class="tabs row" style="">
              <ul class="col-12" style="padding-right:5px;">
                <li class="<?php if($page == 'appinfo'){echo 'active';}?>"><a href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$category);?>/<?php echo $products[0]['id'];?>/appinfo">OVERVIEW</a></li>  
                <li class="<?php if($page == 'pricing'){echo 'active';}?>"><a href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$category);?>/<?php echo $products[0]['id'];?>/pricing">PRICING</a></li>
                <li class="<?php if($page == 'features'){echo 'active';}?>"><a href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$category);?>/<?php echo $products[0]['id'];?>/features">FEATURES</a></li>
                <li class="<?php if($page == 'reviews'){echo 'active';}?>"><a href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$category);?>/<?php echo $products[0]['id'];?>/reviews">REVIEWS</a></li>
                <li class="<?php if($page == 'alternatives'){echo 'active';}?>"><a href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$category);?>/<?php echo $products[0]['id'];?>/alternatives">ALTERNATIVES</a></li>
                <li class="<?php if($page == 'comparision'){echo 'active';}?>"><a href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$category);?>/<?php echo $products[0]['id'];?>/comparision">COMPARISIONS</a></li>
                <li class="<?php if($page == 'integrations'){echo 'active';}?>"><a href="<?php echo base_url();?>productdetail/<?php echo str_replace(' ','-',$category);?>/<?php echo $products[0]['id'];?>/integrations">INTEGRATIONS</a></li>
                <li style="float:right;"><a href="<?php echo isset($products[0]['product_detail']['websiteurl'])?$products[0]['product_detail']['websiteurl']:'';?>" class="btn btn-danger" style="font-size:13.5px !important;" id="visitwebsite">VISIT WEBSITE</a></li>
              </ul>
            </div>      
          </div>
        </div>
      </div>
      
    </div>
  </div>

  