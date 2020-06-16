$(document).ready(function(){
	
	var add_new_item_unit = $("#add_new_item_unit");
	
	var validator = add_new_item_unit.validate({
		
		rules:{
			item_unit_name :{ required : true }
		},
		messages:{
			item_unit_name :{ required : "This field is required" }
		}
	});
});
