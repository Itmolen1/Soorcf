$(document).ready(function(){
	
	var addNewservice = $("#addNewservice");
	
	var validator = addNewservice.validate({
		
		rules:{
			service_name :{ required : true },
			service_logo :{ required : true , acceptImgExtension : true },
			detail_page :{ required : true },
			service_desc :{ required : true },
		},
		messages:{
			service_name :{ required : "This field is required" },
			service_logo :{ required : "This field is required" },		
			detail_page :{ required : "This field is required" },
			service_desc :{ required : "This field is required" },	
		}
	});
});
