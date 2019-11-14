
    <!-- BEGIN CONTENT BODY -->
    <div class="main-content p-b-50">
        <div class="section__content section__content--p30 p-b-100">
            <div class="container-fluid">
                <div class="row user-data col-lg-12">
            		<h3 class="title-3 m-b-20" style="padding-left: 20px; padding-right: 20px; font-size: 20px; font-weight: bold;"><i class="fa fa-archive"></i>All Categories</h3>
                    <div class="filters m-b-0 col col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-right: 15px; padding-left: 15px;">
                        <div class="row">
                            
                            <div class="col col-sm-6 col-md-6 col-lg-6 col-xs-6">
                                <a href="<?php echo base_url()?>admin/category/newcategory" class="btn btn-primary active m-b-10" style="border-radius: 20px; ">Add New<i class="fa fa-plus-circle" style="margin-left:10px;"></i>    
                                </a>
                            </div>
                            <div class="col col-sm-6 col-md-6 col-lg-6 col-xs-6">
                                <button id="delete_category" class="btn btn-danger pull-right" style="margin-right:5px; border-radius: 20px;"> Delete<i class="fa fa-trash" style="margin-left:10px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12"  style="padding:30px 20px">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column table-responsible text-center" id="sample_1"  style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Popular</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($category as $categories){?>
                                    <tr class="odd gradeX">
                                        <td style="vertical-align: middle;text-align: center;">
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
                                                <input type="checkbox" class="checkboxes" value="<?php echo $categories['id'];?>" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td style="vertical-align: middle;text-align: center;"><?php echo $categories['name'];?></td>
                                        <td style="vertical-align: middle;text-align: center;"><?php echo $categories['description'];?></td>
                                        <td style="vertical-align: middle;text-align: center;">
                                            <label class="switch">
                                              <input class="popular" type="checkbox" attr_id="<?php echo $categories['id'];?>" <?php if($categories['popular']){echo 'checked';}?>>
                                              <span class="slider_checkbox round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary edit" href="<?php echo base_url();?>admin/category/newcategory/<?php echo $categories['id'];?>" alt="Edit">
                                                 <i class="fa fa-edit"></i>
                                            </a>
                                            <span class="btn btn-danger deletecategory">
                                                <i class="fa fa-trash"></i>
                                            </span>
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
