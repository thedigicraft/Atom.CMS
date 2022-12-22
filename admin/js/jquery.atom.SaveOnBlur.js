$(document).ready(function() {
	
	// Auto Save Field:
	$('.blur-save').on('focus', function(){
	  $(this).addClass('input-focus');
	});
	
	$('.blur-save').on('blur', function(){
	
		var token = $('meta[name="csrf-token"]').attr('content');		
	  var id = $(this).attr("data-id"); // Unique identifier for the record we wish to UPDATE
	  var label = $(this).attr("data-label"); // Label used for the notification.
	  var db = $(this).attr("data-db"); // Database table-field string.
	  var value = $(this).val(); // New value for the field.
		
		
	  $(this).removeClass('input-focus');
	
		$.ajaxSetup({
			headers : {
				CsrfToken: token
			}
		});

			$.ajax({
				url: 'ajax/blur-save.php',
				type: 'POST',
				data: {
					id: id,
					label: label,
					db: db,
					value: value
				}
			});
			        
	}); // END .auto-save
	
});

