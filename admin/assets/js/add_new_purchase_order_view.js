$('#btn').on('click', function(){
	var btn = $("#btn");
	
	var btn = btn.valid({
		rules:{			
			item_master_id : { required : true, selected : true},
			item_unit_id : { required : true, selected : true},
			po_boi_qty :{ required : true },
			po_boi_rate :{ required : true },
		},
		messages:{			
			item_master_id : { required : "This field is required", selected : "Please select atleast one option" },
			item_unit_id : { required : "This field is required", selected : "Please select atleast one option" },
			po_boi_qty :{ required : "This field is required" },
			po_boi_rate :{ required : "This field is required" },
		}
	});
});
