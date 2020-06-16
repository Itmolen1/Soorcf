<div class="banner-bootom-w3-agileits">
        <div class="container" style="min-height:500px;">
            <h3 class="tittle-w3l"><?=$product['item_master_name'];?>
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>

            <div class="col-md-5 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider" style="background: none;">
                        <ul style="list-style: none;">
                            <li data-thumb="<?$product['item_master_logo'];?>">
                                <div class="thumb-image">
                                    <a data-fancybox="gallery" href="<? echo $product['item_master_logo']; ?>"><img src="<? echo $product['item_master_logo']; ?>" data-imagezoom="true" class="img-responsive" alt=""></a></div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 single-right-left simpleCart_shelfItem">
                <h3><?=$product['item_master_name'];?></h3>
                
                <p><?=$product['item_master_desc'];?></p>
                
                <p><?=$product['item_master_desc_long'];?></p>

            </div>
            <div class="clearfix"> </div>

            <div class="row">
         <div class="col-md-6">
            <h2>Want Details for this product ? contact us by filling below form.</h2>
              <form action="<?php echo base_url().'Contact/add'; ?>" method="post" id="contactform" name="contactform">
               <h3>Contact US</h3>
               <div class="control-group myform">
                  <div class="controls" style="margin-bottom:-10px;">
                     <input type="text" class="form-control" 
                        placeholder="Full Name" id="name" name="name" required
                        data-validation-required-message="Please enter your name" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" />
                     <p class="help-block"></p>
                  </div>
               </div>
               <input type="hidden" name="item_master_name" value="<?=$product['item_master_name'];?>" id="item_master_name">
               <div class="control-group myform">
                  <div class="controls">
                     <input name="email" type="email" class="form-control" placeholder="Email" 
                        id="email" required
                        data-validation-required-message="Please enter your email" />
                  </div>
               </div>

               <div class="control-group myform">
                  <div class="controls">
                     <input name="mobile_number" type="text" class="form-control" placeholder="Mobile" 
                        id="mobile_number" required
                        data-validation-required-message="Please enter your email" maxlength="13" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" />
                  </div>
               </div>

               <div class="control-group myform">
                  <div class="controls">
                     <textarea rows="10" cols="100" class="form-control" 
                        placeholder="Message" id="comments" name="comments" required
                        data-validation-required-message="Please enter your message" minlength="5" 
                        data-validation-minlength-message="Min 5 characters" 
                        maxlength="500" style="resize:none"></textarea>
                  </div>
               </div>
               <div id="success"> </div>
               <button type="submit" class="btn btn-primary pull-right" style="margin-top: 15px;">Send</button><br />
            </form>
         </div>
         
      </div>
        </div>
    </div>
   