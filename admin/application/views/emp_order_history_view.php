<div class="content-wrapper">
    <section class="content-header">
    <h1>
        <i class="fa fa-binoculars"></i> Employee Order History
    </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <table border="1">
                        <thead>
                            <td>Sr.No.</td>
                            <td>Order No#</td>
                            <td>Status</td>
                        </thead>
                       <tbody>
                            <?php 
                                for($i=0;$i<count($history);$i++) { 
                            ?>
                            <tr>
                                <td><?=$i+1?></td>
                                <td><?=$history[$i]['service_request_ref']?></td>
                                <td><?=$history[$i]['status']?></td>
                            </tr>
                            <?php } ?>
                       </tbody> 
                    </table>
                </div>
                <div class="box-footer">
                    <a href="<?php echo base_url().'employee_listing'; ?>"><input type="Button" class="btn btn-default" value="Back" /></a>
                </div>                    
            </div>
        </div>
    </section>
</div>