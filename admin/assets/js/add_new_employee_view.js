$(document).ready(function(){
	
	var add_new_employee = $("#add_new_employee");
	
	var validator = add_new_employee.validate({
		
		rules:{
			tbl_employee_name :{ required : true },
			tbl_employee_email : { required : true, email : true, remote : { url : baseURL + "employee_email_exists", type :"post"} },
			tbl_employee_password : { required : true },
			ctbl_employee_password : {required : true, equalTo: "#ctbl_employee_password"},
			tbl_employee_mobile : { required : true, digits : true },
			tbl_employee_skills : { required : true, selected : true},
			tbl_employee_name :{ required : true },
			//tbl_employee_id_card :{ required : true  },
			//tbl_employee_image :{ required : true },
			//tbl_employee_id_card :{ required : true , acceptImgExtension : true },
			//tbl_employee_image :{ required : true ,acceptImgExtension : true },
			tbl_employee_basic_salary :{ required : true },
			tbl_employee_doj :{ required : true },
			tbl_employee_emegency_contact :{ required : true },
			tbl_employee_notes :{ required : true },
			tbl_employee_nationality :{ required : true },
			tbl_employee_status :{ required : true },
		},
		messages:{
			tbl_employee_name :{ required : "This field is required" },
			tbl_employee_email : { required : "This field is required", email : "Please enter valid email address", remote : "Email already taken" },
			tbl_employee_password : { required : "This field is required" },
			ctbl_employee_password : {required : "This field is required", equalTo: "Please enter same password" },
			tbl_employee_mobile : { required : "This field is required", digits : "Please enter numbers only" },
			tbl_employee_skills : { required : "This field is required", selected : "Please select atleast one option" },
			tbl_employee_name :{ required : "This field is required" },	
			//tbl_employee_id_card :{ required : "This field is required" },	
			//tbl_employee_image :{ required : "This field is required" },			
			tbl_employee_basic_salary :{ required : "This field is required" },	
			tbl_employee_doj :{ required : "This field is required" },	
			tbl_employee_emegency_contact :{ required : "This field is required" },	
			tbl_employee_notes :{ required : "This field is required" },	
			tbl_employee_nationality :{ required : "This field is required" },
			tbl_employee_status :{ required : "This field is required" },	
		}
	});
});
