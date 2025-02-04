<div class="content-wrapper">
    <?php //echo "<pre>";print_r($list);die; ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-external-link-square"></i> Guest User Management
        <small><?php 
                    $last = $this->uri->total_segments();
                    $record_num = $this->uri->segment($last);
                    if(is_numeric($record_num))
                        {    echo "Edit";   }
                    else
                    {
                        echo "Add"; } ?>  User </small>
                    
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Guest User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="add_new_guest_user" action="<?php echo base_url().$action?>" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tbl_guest_user_name">Guest User Name</label>
                                        <input type="text" class="form-control required" value="<?php echo isset($list['tbl_guest_user_name']) ? $list['tbl_guest_user_name'] : ""; ?>" id="tbl_guest_user_name" name="tbl_guest_user_name" maxlength="200">
                                    </div>
                                    <?php 
                                        if(isset($record_num))
                                        {
                                            ?><input type="hidden" name="tbl_guest_user_id" id="tbl_guest_user_id" value="<?php echo $record_num; ?>"><?php
                                        }
                                    ?>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tbl_guest_user_mobile">Guest User Mobile</label>
                                        <input type="text" class="form-control required" value="<?php echo isset($list['tbl_guest_user_mobile']) ? $list['tbl_guest_user_mobile'] : ""; ?>" id="tbl_guest_user_mobile" name="tbl_guest_user_mobile" maxlength="200">
                                    </div>
                                </div>   
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tbl_guest_user_email">Guest User Email</label>
                                        <input type="email" class="form-control required" value="<?php echo isset($list['tbl_guest_user_email']) ? $list['tbl_guest_user_email'] : ""; ?>" id="tbl_guest_user_email" name="tbl_guest_user_email" maxlength="200">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" tabindex="3" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/add_new_item_unit.js" type="text/javascript"></script>