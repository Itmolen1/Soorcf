$(document).ready(function(){
	
	var add_new_subservice = $("#add_new_subservice");
	
	var validator = add_new_subservice.validate({
		
		rules:{
			sub_service_name :{ required : true },
			service_id : { required : true, selected : true},
		},
		messages:{
			sub_service_name :{ required : "This field is required" },
			service_id : { required : "This field is required", selected : "Please select atleast one option" },
		}
	});
});
