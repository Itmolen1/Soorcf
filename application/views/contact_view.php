<section id="inner-headline">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <h2 class="pageTitle">Contact Us</h2>
         </div>
      </div>
   </div>
</section>
<section id="content">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="about-logo">
               <h3>Soor Color Fresh Pvt. Ltd.</h3>
               <p>We are here to help you with all of your queries related to SOORCF products. Get support by Call, Email or submit your feedback/complaints regarding our products and services to our experts for instant support.</p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <p>Submit your inquiries about Soor Color Fresh products by filling form below.</p>
              <form action="<?php echo base_url().'Contact/add'; ?>" method="post" id="contactform" name="contactform">
               <h3>Contact US</h3>

               <div class="control-group myform">
                  <div class="controls" style="margin-bottom: -10px;">
                     <input type="text" class="form-control" 
                        placeholder="Full Name" id="name" name="name" required
                        data-validation-required-message="Please enter your name" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" />
                     <p class="help-block"></p>
                  </div>
               </div>               

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
                        data-validation-required-message="Please enter your mobile" maxlength="13" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" />
                  </div>
               </div>

               <div class="control-group myform">
                  <div class="controls">
                     <input name="subject" type="subject" class="form-control" placeholder="Subject" 
                        id="subject" required
                        data-validation-required-message="Please enter Subject" />
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
         <div class="col-md-6 col-sm-6">
            <script  src="http://maps.google.com/maps/api/js?key=AIzaSyDL9mqjFLadYl97hoDGTGRdobQ-JAPzTR8"></script>
            <div style="overflow:hidden;height:500px;width:600px;" class="map-responsive">
               <div id="gmap_canvas" style="height:500px;width:600px;"></div>
               <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
               <a class="google-map-code" href="<?php echo base_url(); ?>" id="get-map-data">SoorCF</a>
            </div>
            <script> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(21.5370878,72.9858619),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(21.5370878,72.9858619)});infowindow = new google.maps.InfoWindow({content:"<b>Soor Color Fresh</b><br/>3401-B Panoli Ind. Est.<br/> Panoli." });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
         </div>
      </div>
   </div>
</section>