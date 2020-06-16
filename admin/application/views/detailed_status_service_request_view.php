<style type="text/css">
    body{
  line-height:1.3em;
  min-width:920px;
}
.history-tl-container{
    font-family: "Roboto",sans-serif;
  width:50%;
  margin:auto;
  display:block;
  position:relative;
}
.history-tl-container ul.tl{
    margin:20px 0;
    padding:0;
    display:inline-block;

}
.history-tl-container ul.tl li{
    list-style: none;
    margin:auto;
    margin-left:200px;
    min-height:50px;
    /*background: rgba(255,255,0,0.1);*/
    border-left:2px dashed #fd6802;
    padding:0 0 50px 30px;
    position:relative;
}
.history-tl-container ul.tl li:last-child{ border-left:0;}
.history-tl-container ul.tl li::before{
    position: absolute;
    left: -18px;
    top: -5px;
    content: " ";
    border: 8px solid rgba(255, 255, 255, 0.74);
    border-radius: 500%;
    background: #fd6802;
    height: 20px;
    width: 20px;
    transition: all 500ms ease-in-out;

}
.history-tl-container ul.tl li:hover::before{
    border-color:  #fd6802;
    transition: all 1000ms ease-in-out;
}
ul.tl li .item-title{
}
ul.tl li .item-detail{
    color:rgba(0,0,0,0.5);
    font-size:12px;
}
ul.tl li .timestamp{
    
    position: absolute;
    
    left: -124% !important;
    text-align: right;
    font-size: 12px;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        <i class="fa fa-binoculars"></i> Service Request Detailed Status
    </h1>
    </section>
    <section class="content">

        <link href='//fonts.googleapis.com/css?family=Roboto:200,400,600' rel='stylesheet' type='text/css'>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    
                       <div class="history-tl-container">
                          <ul class="tl">

                            <?php 
                                $res=json_decode($sr_details['status_history'],true);
                                $status_name=array_column($res,'status_name');
                                $status_time=array_column($res,'status_time');
                                for($i=0;$i<count($status_name);$i++) { 
                            ?>

                            <li class="tl-item" ng-repeat="item in retailer_history">
                              <div class="timestamp" <?php if(count($status_name)>=5){ echo 'style="left: -60% !important;"'; } ?>>
                                <?php echo date('d-M-Y', strtotime($status_time[$i])); ?> <?php echo date('h:i:s', strtotime($status_time[$i])); ?>
                              </div>
                              <div class="item-title"><?php echo $status_name[$i]; ?></div>
                              <div class="item-detail"></div>
                            </li>
                            <?php } ?>

                          </ul>
                        </div>

                </div>
                <div class="box-footer">
                    <a href="<?php echo base_url().'service_request_listing'; ?>"><input type="Button" class="btn btn-default" value="Back" /></a>
                </div>                    
            </div>
        </div>
    </section>
</div>