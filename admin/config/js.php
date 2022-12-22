<?php
// Javascript:
?>

<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>

<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<!-- Dropzone.js -->
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<!-- Atom.SaveOnBlur.js -->
<script src="js/jquery.atom.SaveOnBlur.js"></script>

<script>
	
	$(document).ready(function() {
		
		$("#console-debug").hide();
		
		$("#btn-debug").click(function(){
			
			$("#console-debug").toggle();
			
		});
		
		
		$(".btn-delete").on("click", function() {
			
			var selected = $(this).attr("id");
			var pageid = selected.split("del_").join("");
			
			var confirmed = confirm("Are you sure you want to delete this page?");
			
			if(confirmed == true) {
				
				$.ajaxSetup({
    			headers : {
        		CsrfToken: "<?php echo $_SESSION['token']; ?>"
    			}
				});
				
				$.ajax({
					type: 'POST',
					url: 'ajax/pages.php',
					data: {id: pageid}
				});

				$("#page_"+pageid).remove();				
			}	
		});
		
		
		$("#sort-nav").sortable({
			cursor: "move",
			update: function() {
				var order = $(this).sortable("serialize");

				$.ajaxSetup({
    			headers : {
        		CsrfToken: "<?php echo $_SESSION['token']; ?>"
    			}
				});

				$.ajax({
					type: 'POST',
					url: 'ajax/list-sort.php',
					data: {list: order}
				})
			}
		});


		$('.nav-form').submit(function(event){
			
			var navData = $(this).serializeArray();
			var navLabel = $(this).find('input[name=label]').val();
			var navID = $(this).find('input[name=id]').val();
		
			$.ajaxSetup({
    			headers : {
        		CsrfToken: "<?php echo $_SESSION['token']; ?>"
    			}
				});

			$.ajax({
				type: "POST",
				url: "ajax/navigation.php",
				data: navData
				
			}).done(function(){
				$("#label_"+navID).text(navLabel);
			});
			
			event.preventDefault();
			
		});
				
	}); // END document.ready();
	
</script>