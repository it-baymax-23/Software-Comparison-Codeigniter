 <!-- BEGIN CONTENT BODY -->
    <div class="main-content p-b-50">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row user-data">
            		<h3 class="title-3 m-b-30"><i class="fa fa-archive"></i>All Compare Tables</h3>
                    <div class="filters m-b-0 col-lg-12">
                        <a href="<?php echo base_url()?>admin/comparetable/newtable" class="btn btn-success active" style="border-radius: 20px;">
                            Add New<i class="fa fa-plus-circle" style="margin-left:10px;"></i>
                        </a>
                    </div>
                    <div class="col-lg-12"  style="padding:30px 20px">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column table-responsible text-center" id="sample_1" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th>Name</th>
                                    <th>Slug</th>                                    
                                    <th>Create date</th>
                                    <th>Activate</th>
                                    <th style="width:100px;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($compare as $compares){?>
                                    <tr class="odd gradeX">
                                        <td style="vertical-align: middle;">
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-bottom: 0px;">
                                                <input type="checkbox" class="checkboxes" value="<?php echo $compares['id'];?>" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td style="vertical-align: middle;"><?php echo $compares['name'];?></td>
                                        <td style="vertical-align: middle;"><?php echo base_url() . 'basecompare/' . $compares['slug'];?></td>
                                        <td style="vertical-align: middle;"><?php echo $compares['created_date'];?></td>
                                        <td style="vertical-align: middle;">
                                           <label class="switch">
                                              <input class="activate" type="checkbox" attr_id="<?php echo $compares['id'];?>" <?php if($compares['activated']){echo 'checked';}?>>
                                              <span class="slider_checkbox round"></span>
                                            </label>
                                        </td>                                        
                                        <td style="vertical-align: middle;">
                                            <a class="btn btn-primary edit" href="<?php echo base_url();?>admin/comparetable/newtable/<?php echo $compares['id'];?>" alt="Edit">
                                                 <i class="fa fa-edit"></i>
                                            </a>
                                            <span class="btn btn-danger deletecompare" attr_id="<?php echo $compares['id'];?>">
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
