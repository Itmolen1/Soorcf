<?php 
$last = $this->uri->total_segments();
$record_num = $this->uri->segment($last);
$this->session->set_userdata('referred_from', current_url());
?>
<?php 
if(isset($record_num) && is_numeric($record_num))
{
?>
<script type="text/javascript">
 $(window).bind("load", function() {
    
        var session_id = $('#session_id').val();
        var hitURL = baseURL + "edit_amc_boi_session";
       
            $.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { session_id : session_id } 
            }).done(function(data){
                $('#boi_table > tbody').html('');
                $('#boi_table > tbody').html(data.finalresult);
                $('#amc_grand_total').val('');
                $('#amc_grand_total').val(data.grandtotal);
                $('#amc_total_acs').val('');
                $('#amc_total_acs').val(data.toal_ac);  
            });   
});
</script>
<?php 
}
?>
<script type="text/javascript">
function DoTrim(strComp) {
            ltrim = /^\s+/
            rtrim = /\s+$/
            strComp = strComp.replace(ltrim, '');
            strComp = strComp.replace(rtrim, '');
            return strComp;
}


 jQuery(document).ready(function(){
    
    jQuery(document).on("click", "#add_amc_boi_session", function(){


        /*validation*/

        var fields;
        fields = "";
        if (document.add_new_amc.amc_pt_id_session.selectedIndex=="")
        {
            if(fields != 1)
            {
                document.getElementById("amc_pt_id_session").focus();
            }
            fields = '1';
            $("#amc_pt_id_session").addClass("error");
        }
        if (DoTrim(document.getElementById('amc_boi_detail_session').value).length == 0)
        {
            if(fields != 1)
            {
                document.getElementById("amc_boi_detail_session").focus();
            }
            fields = '1';
            $("#amc_boi_detail_session").addClass("error");
            //document.getElementById('po_boi_detail_session').className = 'error';
        }
        if (DoTrim(document.getElementById('amc_boi_qty_session').value).length == 0)
        {
            if(fields != 1)
            {
                document.getElementById("amc_boi_qty_session").focus();
            }
            fields = '1';
            $("#amc_boi_qty_session").addClass("error");
            //document.getElementById('po_boi_qty_session').className = 'error';
        }
        if (DoTrim(document.getElementById('amc_boi_ac_qty_session').value).length == 0)
        {
            if(fields != 1)
            {
                document.getElementById("amc_boi_ac_qty_session").focus();
            }
            fields = '1';
            $("#amc_boi_ac_qty_session").addClass("error");
            //document.getElementById('po_boi_qty_session').className = 'error';
        }
        
        if (fields != "") 
        {
            fields = "Please fill in the following details:" + fields;
            return false;
        }
        /*validation*/

        var amc_pt_id_session = $('#amc_pt_id_session').val();
        var amc_boi_detail_session = $("#amc_boi_detail_session").val();
        var amc_boi_qty_session = $("#amc_boi_qty_session").val();
        var amc_boi_ac_qty_session = $("#amc_boi_ac_qty_session").val();
        var hitURL = baseURL + "add_amc_boi_session";
        //alert(item_master_id);
        
            $.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { amc_pt_id_session : amc_pt_id_session,amc_boi_detail_session:amc_boi_detail_session,amc_boi_qty_session:amc_boi_qty_session,amc_boi_ac_qty_session:amc_boi_ac_qty_session} 
            }).done(function(data){
                $('#amc_pt_id_session').val("0");
                $('#amc_boi_detail_session').val('');
                $('#amc_boi_qty_session').val('');
                $('#amc_boi_ac_qty_session').val('');
                $('#boi_table > tbody').html('');
                $('#boi_table > tbody').html(data.finalresult);
                $('#amc_grand_total').val('');
                $('#amc_grand_total').val(data.grandtotal);
                $('#amc_total_acs').val('');
                $('#amc_total_acs').val(data.toal_ac);  
                //if(data.status = true) { alert("Record successfully deleted"); }
                //else if(data.status = false) { alert("Record deletion failed"); }
                //else { alert("Access denied..!"); }
            });
    });

   
});
</script>
<script type="text/javascript">
	function delete_amc_boi_session(val)
	{
		//alert(val);
		var data = val;
        var hitURL = baseURL + "delete_amc_boi_session";
        $.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { data : data } 
            }).done(function(data){
                $('#boi_table > tbody').html('');
                $('#boi_table > tbody').html(data.finalresult);
                $('#amc_grand_total').val('');
                $('#amc_grand_total').val(data.grandtotal);  
            });
	}
</script>

<script type="text/javascript">
    $(function () {
    $('.selectpicker').selectpicker();
});
</script>
<style type="text/css">
    table, thead,tbody ,td, th {
  border: 1px solid black;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-shopping-cart"></i> AMC Management
        <small><?php 
                    if(is_numeric($record_num))
                        {    echo "Edit";   }
                    else
                    {
                        echo "Add"; } ?> AMC</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> AMC</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" name="add_new_amc" id="add_new_amc" action="<?php echo base_url().$action; ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <?php
                                if(isset($record_num))
                                {
                                    ?><input type="hidden" id="amc_id" name="amc_id" value="<?php echo $record_num; ?>">
                                    <?php
                                }
                                if (isset($session_id)) 
                                {
                                    ?>
                                    <input type="hidden" id="session_id" name="session_id" value="<?php echo $session_id; ?>">
                                    <?php
                                }
                            ?>
                            <div class="row">                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amc_no">AMC No#</label>
                                        <input type="text" class="form-control required" id="amc_no" value="<?php if(isset($amc)){ echo $amc['amc_no']; } else echo $amc_no; ?>" name="amc_no" maxlength="128" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amc_start_date">AMC Start Date *</label>
                                        <input type="date" class="form-control required" value="<?php if(isset($amc)){ echo $amc['amc_start_date']; } else echo date('Y-m-d', strtotime('now')); ?>" id="amc_start_date" name="amc_start_date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amc_end_date">AMC End Date *</label>
                                        <input type="date" class="form-control required" value="<?php if(isset($amc)){ echo $amc['amc_end_date']; } else echo date('Y-m-d',strtotime('+1 year',strtotime('now'))); ?>" id="amc_end_date" name="amc_end_date">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <label for="amc_party_name"> Party Name *</label>
                                        <input type="text" class="form-control required" id="amc_party_name" value="<?php if(isset($amc)){ echo $amc['amc_party_name']; } ?>" name="amc_party_name" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <label for="amc_party_mobile"> Mobile No. *</label>
                                        <input type="text" class="form-control required" id="amc_party_mobile" value="<?php if(isset($amc)){ echo $amc['amc_party_mobile']; } ?>" name="amc_party_mobile" maxlength="15" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <label for="amc_party_email"> Party Email *</label>
                                        <input type="email" class="form-control required" id="amc_party_email" value="<?php if(isset($amc)){ echo $amc['amc_party_email']; } ?>" name="amc_party_email" maxlength="50">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <label for="amc_party_trn"> Party TRN# </label>
                                        <input type="text" class="form-control required" id="amc_party_trn" value="<?php if(isset($amc)){ echo $amc['amc_party_trn']; } ?>" name="amc_party_trn" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amc_property_no"> Property No# </label>
                                        <input type="text" class="form-control required" id="amc_property_no" value="<?php if(isset($amc)){ echo $amc['amc_property_no']; } ?>" name="amc_property_no" maxlength="50">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="amc_property_address"> Property Address </label>
                                    <input type="text" class="form-control required" id="amc_property_address" value="<?php if(isset($amc)){ echo $amc['amc_property_address']; } ?>" name="amc_property_address" maxlength="50">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="amc_amount"> AMC Amount </label>
                                    <input type="text" class="form-control required" id="amc_amount" value="<?php if(isset($amc)){ echo $amc['amc_amount']; } ?>" name="amc_amount" maxlength="50" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                                </div>

                                <div class="col-md-4">
                                    <label for="amc_discount"> Discount% </label>
                                    <input type="text" class="form-control required" id="amc_discount" value="<?php if(isset($amc)){ echo $amc['amc_discount']; } ?>" name="amc_discount" maxlength="50" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                                </div>
                            </div>

                             <div class="box-header">
                                <h3 class="box-title"> Enter Property Detail for AMC</h3>
                            </div>

                                                    
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pt_id">Property Type</label>
                                        <select class="form-control required" id="amc_pt_id_session" name="amc_pt_id_session">
                                            <option value="0">Select Type</option>
                                            <?php for($i=0;$i<count($property_type);$i++){ ?>
                                                <option value="<?php echo $property_type[$i]['pt_id']; ?>">
                                                    <?php echo $property_type[$i]['pt_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="po_boi_detail">Desc.</label>
                                        <input class="form-control required" id="amc_boi_detail_session" name="amc_boi_detail_session" maxlength="10">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="po_boi_qty">Qty/NOs</label>
                                        <input class="form-control required" id="amc_boi_qty_session" name="amc_boi_qty_session" maxlength="10" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="po_boi_qty">No. OF ACs</label>
                                        <input class="form-control required" id="amc_boi_ac_qty_session" name="amc_boi_ac_qty_session" maxlength="10" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                                    </div>
                                </div>

                                
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="+">+</label>
                                        <input type="button" class="form-control btn btn-primary" id="add_amc_boi_session" name="btn" value="Add">
                                    </div>
                                </div>
                            </div>
                          

                            <div class="row">
                                <div class="col-xs-10 table-responsive">
                                      <table class="table table-striped" id="boi_table">
                                        <thead>
                                        <tr>
                                          <th>Sr. No</th>
                                          <th>Property Type</th>
                                          <th>Description</th>
                                          <th>Total</th>
                                          <th>Total ACs</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        </tbody>
                                      </table>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-5">
                                    
                                </div>
                                <div class="col-xs-5">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <tbody>                                     
                                      <tr>
                                        <th>Total:</th>
                                        <td><input type="text" class="form-control required" id="amc_grand_total" name="amc_grand_total"readonly></td>
                                        <th>Total ACs:</th>
                                        <td><input type="text" class="form-control required" id="amc_total_acs" name="amc_total_acs" readonly></td>
                                      </tr>
                                    </tbody></table>
                                  </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <label for="amc_image">Choose File</label>
                                         <input type="file" class="form-control <?php if(!isset($amc)){ echo 'required'; } ?>" value="<?php echo isset($amc->amc_image) ? $amc->amc_image : ""; ?>" id="amc_image" name="amc_image">
                                    </div>
                                </div>                                
                            </div>
                            <?php if(isset($amc['amc_image']) && $amc['amc_image']!='N.A.'){ ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                        <label for="amc_image">Current Image</label>
                                        <img src="<?php echo $amc['amc_image']; ?>" height="200" width="250">
                                        <input type="hidden" name="amc_image_old" value="<?php echo $amc['amc_image']; ?>" id="tbl_employee_id_card_old">
                                        </div>
                                    </div>
                                <?php }  ?>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="<?php if(isset($record_num)) echo "Save"; else echo "Submit"; ?>" />
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
<!--<script src="<?php //echo base_url(); ?>assets/js/add_new_amc_view.js" type="text/javascript"></script>-->
<script type="text/javascript">
$(window).on("beforeunload", function() {
            return "Are you sure? You didn't finish the form!";
        });
        
        $(document).ready(function() {
            $("#add_new_amc").on("submit", function(e) {
                //check form to make sure it is kosher
                //remove the ev
                $(window).off("beforeunload");
                return true;
            });
        });
</script>