$(document).ready(function(){
	
	var addNewslider = $("#addNewslider");
	
	var validator = addNewslider.validate({
		
		rules:{
			slider_image :{ required : true , acceptImgExtension : true },
			slider_image_alt :{ required : true },
		},
		messages:{
			slider_image :{ required : "This field is required" },	
			slider_image_alt :{ required : "This field is required" },			
		}
	});
});
