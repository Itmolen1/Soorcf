<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SOOR COLOR FRESH CHEMICALS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="title" content="SOOR COLOR FRESH CHEMICALS" />
<meta name="robots" content="index,follow" />
<meta name="googlebot" content="index,follow" />
<meta name="keywords" content="SOORCF,Sulfate,Zinc,Manganese,Zinc Sulfate,Manganese Sulfate,Monohydrate,Manganese Sulphate,Solution">
<meta name="description" content="SOORCF,Sulfate,Zinc,Manganese,Zinc Sulfate,Manganese Sulfate,Monohydrate,Manganese Sulphate,Solution Best Quality chemicals provider in surat,Gujrat,India,UAE.">
<meta name="author" content="Soor Color Fresh">
<meta property="og:type" content="website" />
<meta property="og:title" content="SOOR COLOR FRESH CHEMICALS | BEST CHEMICALS Manufacturer in Surat, Gujrat" />
<meta property="og:description" content="SOORCF,Sulfate,Zinc,Manganese,Zinc Sulfate,Manganese Sulfate,Monohydrate,Manganese Sulphate,Solution Best Quality chemicals provider in surat,Gujrat,India,UAE." />
<meta property="og:url" content="http://soorcf.com/" />
<meta property="og:site_name" content="SOOR COLOR FRESH CHEMICALS | BEST CHEMICALS Manufacturer in Surat, Gujrat" />
<meta property="og:image" content="https://s0.wp.com/i/blank.jpg" />
<meta property="og:locale" content="en_IN" />
<meta name="twitter:site" content="@soorcf" />



<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
<link href="<?php echo base_url();?>assets/css/flexslider.css" rel="stylesheet" /> 
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:400,600,700" rel="stylesheet" />
<style>
  .myform{
    border: 1px solid #DD1466;
    margin-top: 15px;
  }
</style>
<style>
        .fixed_button{
            display: block;
            left: 1%;
            top: 99%;
            position: fixed;
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            transform-origin: left top 0;
            margin: 0;
            border-radius: 3px;
            z-index: 999;
            transition: all .3s ease-in-out 0s;
        }
        .fixed_button img{
            height: 40px;
            width: 40px;
            transform: rotate(90deg);
        }
</style>

<script>
    onselectstart = (e) => {
  e.preventDefault()
  }
</script>
</head>
<body >
<div id="wrapper" class="home-page">
<?php /*<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="pull-left hidden-xs">Mon - Fri 9am - 5pm</p>
        <p class="pull-right"><i class="fa fa-phone"></i>Tel No. (+001) 123-456-789</p>
      </div>
    </div>
  </div>
</div> */ ?>
    <header >
        <div class="navbar navbar-default navbar-static-top" id="myHeader">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="cozllapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>" style="margin-top: -15px;"><img src="<?php echo base_url();?>assets/img/logo-01.png"  alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?=base_url(); ?>">Home</a></li> 
                         <li class="dropdown">
                    </li> 
                        <li><a href="<?php echo base_url().'About'; ?>">About Us</a></li>
                        <li><a href="<?php echo base_url().'Contact'; ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <?php if($this->session->userdata('contact_message')) { ?>
<script type="text/javascript">
    $(window).load(function()
    {
        $('#myModal').modal('show');
    });
    setTimeout(function() {$('#myModal').modal('hide');}, 2000);
</script>
<?php } ?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Success !</h4>
        </div>
        <div class="modal-body">
          <p><?php 
            if($this->session->userdata('contact_message'))
            { 
                echo  $this->session->userdata('contact_message');
                $this->session->unset_userdata('contact_message');
            }
            ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>

    </header>