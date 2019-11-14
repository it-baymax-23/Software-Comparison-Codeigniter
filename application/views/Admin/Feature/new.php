<div class="main-content p-b-50">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row user-data p-b-40">
                    <h1 class="title-3"><i class="fa fa-tasks"></i> New Feature</h1>
                    <div class="col-md-12" style="margin-top:20px; padding: 50px;">
                        <form action="<?php echo base_url();?>admin/feature/addfeature" class="form-horizontal" id="newfeature">
                            <div class="form-body">
                                <div class="form-group row" >
                                    <label class="col-sm-6 col-md-3 col-lg-3 col-xs-3 control-label">Name</label>
                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xs-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-circle-right" placeholder="Name" name="name" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-md-3 col-lg-3 col-xs-3 control-label">Feature Type</label>
                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xs-3">
                                        <select class="form-control" placeholder="Description" name="type" required> 
                                            <option value="text">Text</option>
                                            <option value="checkbox">Checkbox</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>