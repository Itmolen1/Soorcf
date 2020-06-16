$(document).ready(function(){
	
	var add_new_vendor = $("#add_new_vendor");
	
	var validator = add_new_vendor.validate({
		
		rules:{
			vendor_salutation :{ required : true ,selected : true },
			vendor_name :{ required : true },
			vendor_company_name :{ required : true },
			vendor_trn :{ required : true },
			vendor_payment_term :{ required : true },
			//vendor_email : { required : true, email : true, remote : { url : baseURL + "vendor_email_exists", type :"post"} },
			vendor_email : { required : true, email : true },
			vendor_mobile : { required : true },
			vendor_tel : {required : true },
			vendor_billing_attention : { required : true },
			vendor_shipping_attention : { required : true },
			vendor_billing_address : { required : true },
			vendor_shipping_address : { required : true },
			vendor_shipping_city : { required : true },
			vendor_billing_city : { required : true },
			vendor_shipping_country : { required : true },
			vendor_billing_country : { required : true },
			vendor_shipping_phone : { required : true },
			vendor_billing_phone : { required : true },
			vendor_shipping_fax : { required : true },
			vendor_billing_fax : { required : true },
		},
		messages:{
			vendor_salutation :{ required : "This field is required", selected : "Please select atleast one option"},
			vendor_name :{ required : "This field is required" },
			vendor_company_name :{ required : "This field is required" },
			vendor_trn :{ required : "This field is required" },
			vendor_payment_term :{ required : "This field is required" },
			//vendor_email : { required : "This field is required", email : "Please enter valid email address", remote : "Email already taken" },
			vendor_email : { required : "This field is required", email : "Please enter valid email address" },
			vendor_mobile : { required : "This field is required" },
			vendor_tel : {required : "This field is required"},
			vendor_billing_attention : { required : "This field is required" },
			vendor_shipping_attention : { required : "This field is required" },
			vendor_billing_address : { required : "This field is required" },
			vendor_shipping_address : { required : "This field is required" },
			vendor_shipping_city : { required : "This field is required" },
			vendor_billing_city : { required : "This field is required" },
			vendor_shipping_country : { required : "This field is required" },
			vendor_billing_country : { required : true },
			vendor_shipping_phone : { required : "This field is required" },
			vendor_billing_phone : { required : "This field is required" },
			vendor_shipping_fax : { required : "This field is required" },
			vendor_billing_fax : { required : "This field is required" },
		}
	});
});