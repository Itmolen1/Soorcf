<div id="banner">
  <div id="main-slider" class="flexslider">
    <ul class="slides">
      <?php for($i=0;$i<count($slider);$i++){ ?>
        <li>
          <img src="<?php echo $slider[$i]['slider_image']; ?>" alt="<?php echo $slider[$i]['slider_image_alt']; ?>" />
          <div class="flex-caption">
            <?php /*<h3>R&D Centers</h3> 
            <p>We create the opportunities</p>*/?>
          </div>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>
<section id="call-to-action-2">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-sm-9">
        <h3>Soor Color Fresh </h3>
        <p>A knowledge driven chemical company, caters to the diverse needs of a wide spectrum of industry verticals across the globe. Over the past five years, we have built, nurtured and continuously improved our customer's products through innovative chemical solutions, customized manufacturing.</p>
      </div>
      <div class="col-md-2 col-sm-3"> <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
</section>

<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aligncenter">
          <h2 class="aligncenter">Products</h2><p>We have following products with customization options with your requirements.</p></div>
        <br/>
      </div>
    </div>

    
    <div class="row">
    <?php for($i=0;$i<count($products);$i++) { ?>
      <div class="col-sm-6 col-md-4 info-blocks">
      	<a href="<?=base_url().'Pd/'.$products[$i]['item_master_id'].'/'.$products[$i]['item_master_url_slug'];?>" class="link-product-add-cart"><img style="vertical-align:middle;height:120px;width:108px;float:left;border-radius:30px;" src="<?php echo $products[$i]['item_master_logo']; ?>" alt="soor color fresh"></a>
        <div class="info-blocks-in">
          <h3><?php echo $products[$i]['item_master_name']; ?></h3>
          <p style="float:right;"> <?php echo $products[$i]['item_master_desc']; ?> 
        </div>
      </div>
    <?php  } ?>
    </div>

  </div>
</section>

<section class="section-padding gray-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title text-center">
          <h2>Our Organization</h2>
          <p>The story of the Organization is about harnessing the fruits of science for goals that go beyond business.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="about-text">
          <p>SOORCF's pioneering spirit encourages its people to think like entrepreneurs, and to think beyond convention. This mind-set, opportunity to work with unique brands across many industry segments, draws the best talent from the industry. Individuals go beyond the duty to bring to life ideas that they are proud to hone and own. The focus is to build a robust talent pipeline at the company offers multiple opportunities, within India and internationally.</p>
          <ul class="withArrow">
            <li><span class="fa fa-angle-right"></span> Lorem ipsum dolor sit amet</li>
            <li><span class="fa fa-angle-right"></span> consectetur adipiscing elit</li>
            <li><span class="fa fa-angle-right"></span> Curabitur aliquet quam id dui</li>
            <li><span class="fa fa-angle-right"></span> Donec sollicitudin molestie malesuada.</li>
          </ul> <a href="#" class="btn btn-primary">Learn More</a>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="about-image">
          <img src="<?php echo base_url();?>assets/img/about.jpg" alt="About Images">
        </div>
      </div>
    </div>
  </div>
</section>
<?php /*<div class="about home-about">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        
        <div class="block-heading-two">
          <h3><span>Programes</span></h3>
        </div>
        <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur.
          <br>
          <br>Sed ut perspiciaatis iste natus error sit voluptatem probably haven't heard of them accusamus.</p>
      </div>
      <div class="col-md-4">
        <div class="block-heading-two">
          <h3><span>Latest News</span></h3>
        </div>

        <div class="panel-group" id="accordion-alt3">
          
          <div class="panel">
            
            <div class="panel-heading">
              <h4 class="panel-title">
                                          <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseOne-alt3">
                                            <i class="fa fa-angle-right"></i> Accordion Heading Text Item # 1
                                          </a>
                                        </h4>
            </div>
            <div id="collapseOne-alt3" class="panel-collapse collapse">
              
              <div class="panel-body">Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <h4 class="panel-title">
                                          <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseTwo-alt3">
                                            <i class="fa fa-angle-right"></i> Accordion Heading Text Item # 2
                                          </a>
                                        </h4>
            </div>
            <div id="collapseTwo-alt3" class="panel-collapse collapse">
              <div class="panel-body">Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <h4 class="panel-title">
                                          <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseThree-alt3">
                                            <i class="fa fa-angle-right"></i> Accordion Heading Text Item # 3
                                          </a>
                                        </h4>
            </div>
            <div id="collapseThree-alt3" class="panel-collapse collapse">
              <div class="panel-body">Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <h4 class="panel-title">
                                          <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseFour-alt3">
                                            <i class="fa fa-angle-right"></i> Accordion Heading Text Item # 4
                                          </a>
                                        </h4>
            </div>
            <div id="collapseFour-alt3" class="panel-collapse collapse">
              <div class="panel-body">Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-md-4">
        <div class="block-heading-two">
          <h3><span>Testimonials</span></h3>
        </div>
        <div class="testimonials">
          <div class="active item">
            <blockquote>
              <p>Lorem ipsum dolor met consectetur adipisicing. Aorem psum dolor met consectetur adipisicing sit amet, consectetur adipisicing elit, of them jean shorts sed magna aliqua. Lorem ipsum dolor met.</p>
            </blockquote>
            <div class="carousel-info">
              <img alt="" src="<?php echo base_url();?>assets/img/team4.jpg" class="pull-left">
              <div class="pull-left"> <span class="testimonials-name">Marc Cooper</span>
                <span class="testimonials-post">Technical Director</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>
</div> */ ?>