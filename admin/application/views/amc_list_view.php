<style type="text/css">
    .dis
    {
        cursor: not-allowed;
    }
    .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo base_url().'wait.gif' ?>') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>
<script type="text/javascript">

    function amc_get_pdf(val)
    {
        var data = val;
        var hitURL = baseURL + "amc_get_pdf";
        $.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { data : data },
            beforeSend: function() {
                $("#wait").addClass("loader");

            } 
            }).done(function(data){
                window.open(data,'_blank');
                $("#wait").removeClass("loader");                               
            });
    }


    function amc_get_qr_pdf(val)
    {
        var data = val;
        var hitURL = baseURL + "amc_get_qr_pdf";
        $.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { data : data },
            beforeSend: function() {
                $("#wait").addClass("loader");

            } 
            }).done(function(data){
                window.open(data,'_blank');
                $("#wait").removeClass("loader");                               
            });
    }

    function amc_get_qr(val)
    {
        var data = val;
        var hitURL = baseURL + "amc_get_qr";
        $.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { data : data },
            beforeSend: function() {
                $("#wait").addClass("loader");
            }
            }).done(function(data){                
                location.reload(true);       
            });
    }
</script>

<script type="text/javascript">
    function send_mail(val)
    {
        //alert(val);
        var data = val;
        var baseURL = '<?php echo base_url(); ?>';
        var hitURL = baseURL + "amc_email";
        $.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { data : data } 
            }).done(function(data){
                //alert(data);
                //window.open(data,'_blank');
                //var data = JSON.parse(JSON.parse(json).data);
                //console.log(data);                 
            });
    }
</script>

<script type="text/javascript">
    $(function() {
  $("#payment_record_form").validate({
    rules: {
      po_payment_record_due_amt: {
        required: true,
        minlength: 2
      },
      po_payment_record_date: {
        required: true
      },
      po_payment_record_payment_no: {
        required: true
      },
      po_payment_record_type : { required : true, selected : true},
      action: "required"
    },
    messages: {
      po_payment_record_due_amt: {
        required: "Please enter some data",
        minlength: "Your data must be at least 2 characters"
      },
      po_payment_record_date: {
        required: "Please enter date"
      },
      po_payment_record_payment_no: {
        required: "Please enter some value"
      },
      po_payment_record_type : { required : "This field is required", selected : "Please select atleast one option" },
      action: "Please provide some data"
    }
  });
});    
</script>

<!--MODAL DIALOG BOX FOR PAYMENT RECORD-->
<script type="text/javascript">
    jQuery(document).on("click", ".payment_record", function(){
    //$(document).ready(function(){
    //alert(this.id);
    var jss =this.id.split('payment_record');
    //alert(jss[1]);
    //var id = val;
        var data = jss[1];
        var baseURL = '<?php echo base_url(); ?>';
        var hitURL = baseURL + "amc_get_payment_record_details";
        $.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { data : data } 
            }).done(function(data){
                //alert(data);
                //window.open(data,'_blank');
                $('#vendor_name').val(data.vendor_name);
                $('#po_payment_record_po_id').val(data.amc_id);
                $('#amc_due_amt').val(data.amc_due_amt);
                $('#amc_bill_no').val(data.amc_bill_no);
                $('#po_payment_record_total_amt').val(data.amc_grand_total);
                $('#po_payment_record_paid_amt').val(data.amc_paid_amt);
                $('#po_payment_record_due_amt').val(data.amc_due_amt);
                //var data = JSON.parse(JSON.parse(json).data);
                //console.log(data);                 
            });
    $("#payment_record_form").submit(function(event){
        //alert('coming');
        submitForm();
        //alert('coming 222');
        //return false;
    });
});
</script>

<div id="contact-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3>Payment Record</h3>
            </div>
            <form id="payment_record_form" name="contact" role="form" method="post" action="<?php echo base_url().'amc_add_payment_record'; ?>">
                <div class="modal-body">
                    <div class="row">               
                        <div class="col-md-12">
                            <label for="vendor_name">Vendor Name</label>
                            <input type="text" name="vendor_name" id="vendor_name" class="form-control" readonly>
                            <input type="hidden" name="po_payment_record_po_id" id="po_payment_record_po_id">
                            <input type="hidden" name="amc_due_amt" id="amc_due_amt">
                        </div>
                    </div> 
                    <div class="row">               
                        <div class="col-md-4">
                            <label for="po_payment_record_date">Date</label>
                            <input type="date" class="form-control required" id="po_payment_record_date" name="po_payment_record_date">
                        </div>
                        <div class="col-md-4">
                            <label for="amc_bill_no">Invoice #</label>
                            <input type="text" name="amc_bill_no" id="amc_bill_no" readonly class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="po_payment_record_payment_no">Payment No#</label>
                            <input type="text" name="po_payment_record_payment_no" id="po_payment_record_payment_no" class="form-control">
                        </div>
                    </div>
                    <div class="row">               
                        <div class="col-md-4">
                            <label for="po_payment_record_type">Payment Type</label>
                            <select class="form-control required" id="po_payment_record_type" name="po_payment_record_type">
                            <option value="0">Select Type</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Cash">Cash</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="po_payment_record_cheque_no">Cheque #</label>
                            <input type="text" name="po_payment_record_cheque_no" id="po_payment_record_cheque_no" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="po_payment_record_bank">Bank</label>
                            <input type="text" name="po_payment_record_bank" id="po_payment_record_bank" class="form-control">
                        </div>
                    </div>
                    <div class="row">               
                       <div class="col-md-4">
                            <label for="po_payment_record_total_amt">Total Amount</label>
                            <input type="text" name="po_payment_record_total_amt" id="po_payment_record_total_amt" class="form-control" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="po_payment_record_paid_amt">Paid Amount</label>
                            <input type="text" name="po_payment_record_paid_amt" id="po_payment_record_paid_amt" class="form-control" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="po_payment_record_due_amt">Payment Amount</label>
                            <input type="text" name="po_payment_record_due_amt" id="po_payment_record_due_amt" class="form-control">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <label for="po_payment_record_note">Notes</label>               
                            <textarea class="form-control" rows="3" id="po_payment_record_note" name="po_payment_record_note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">                  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" value="save" class="btn btn-success" id="submit" >
                </div>
            </form>
        </div>
    </div>
</div>
<!--MODAL DIALOG BOX FOR PAYMENT RECORD-->

<div id="wait" class="" /><br>Please Wait..</div>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-shopping-cart"></i>  AMC Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <?php if(isset($this->session->userdata['myfinal']['amc_listing']['p_add']) && $this->session->userdata['myfinal']['amc_listing']['p_add']==1 || $this->session->userdata['role']==1) { ?>
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>add_new_amc"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
            <?php } ?>
        </div>        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">AMC List</h3>
                    <div class="box-tools">
                        <form id="modalform" style="display:none">
                             <input type="text" name="something">
                             <input type="text" name="somethingelse">
                        </form> 
                        <form action="<?php echo base_url() ?>amc_listing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>Party Name</th>
                        <th>Mobile</th>
                        <th>TRN</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($amc))
                    {
                        foreach($amc as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->amc_party_name; ?></td>
                        <td><?php echo $record->amc_party_mobile; ?></td>
                        <td><?php echo $record->amc_party_trn; ?></td>
                        <td><?php echo $record->amc_start_date; ?></td>
                        <td><?php echo $record->amc_end_date; ?></td>
                        <td class="text-center">

                            <?php if(isset($this->session->userdata['myfinal']['amc_listing']['p_update']) && $this->session->userdata['myfinal']['amc_listing']['p_update']==1 || $this->session->userdata['role']==1) { ?>
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'edit_amc/'.$record->amc_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                            <?php } ?>

                            <?php /*<a class="btn btn-sm btn-info bg-blue" href="javascript:void(0)" title="QR"><i class="fa fa-qrcode" id="<?php echo $record->amc_id; ?>" onclick="return amc_get_qr('<?php echo $record->amc_id; ?>')"></i></a>*/?>

                            <a  <?php if($record->qr_status==0) {  echo 'class="btn btn-sm btn-info bg-blue"';?>onclick="return amc_get_qr('<?php echo $record->amc_id; ?>')"<?php } else echo 'class="btn btn-sm btn-info dis bg-orange"'; ?> title="QR"><i class="fa fa-qrcode" ></i></a>

                            <a  <?php if($record->qr_status==1) {  echo 'class="btn btn-sm btn-info bg-blue"';?>onclick="return amc_get_qr_pdf('<?php echo $record->amc_id; ?>')"<?php } else echo 'class="btn btn-sm btn-info dis bg-orange"'; ?> title="PrintQR"><i class="fa fa-print" ></i></a>

                            <?php /*
                            <a class="btn btn-sm btn-info bg-blue" href="javascript:void(0)" title="PDF"><i class="fa fa-file-pdf-o" id="<?php echo $record->amc_id; ?>" onclick="return get_pdf('<?php echo $record->amc_id; ?>')"></i></a>

                            <a class="btn btn-sm btn-info bg-orange" href="javascript:void(0)" title="E-Mail"><i class="fa fa-envelope-o" id="<?php echo $record->amc_id; ?>" onclick="return send_mail('<?php echo $record->amc_id; ?>')"></i></a>
                            */?>

                            <?php if(isset($this->session->userdata['myfinal']['amc_listing']['p_delete']) && $this->session->userdata['myfinal']['amc_listing']['p_delete']==1 || $this->session->userdata['role']==1) { ?>
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url().'delete_amc/'.$record->amc_id; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash"></i></a>
                            <?php } ?>

                            <a  <?php if($record->qr_status==1) {  echo 'class="btn btn-sm btn-info bg-blue"';?>onclick="return amc_get_pdf('<?php echo $record->amc_id; ?>')"<?php } else echo 'class="btn btn-sm btn-info dis bg-orange"'; ?> title="Print AMC"><i class="fa fa-print" ></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "amc_listing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
