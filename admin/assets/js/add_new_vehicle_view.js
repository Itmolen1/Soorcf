$(document).ready(function(){	
	var add_new_vehicle = $("#add_new_vehicle");	
	var validator = add_new_vehicle.validate({
		
		rules:{
			vehicle_no :{ required : true ,remote : { url : baseURL + "vehicle_no_exists", type :"post"} },
			vehicle_tc_no : { required : true, },
			vehicle_insurance_exp_date : { required : true },
			vehicle_mulkia_exp_date : { required : true},
			vehicle_status : { required : true, selected : true},
		},
		messages:{
			vehicle_no :{ required : "This field is required" , remote : "Email already taken"  },
			vehicle_tc_no : { required : "This field is required",},
			vehicle_insurance_exp_date : { required : "This field is required" },
			vehicle_mulkia_exp_date :{ required : "This field is required" },	
			vehicle_status : { required : "This field is required", selected : "Please select atleast one option" },
		}
	});
});
