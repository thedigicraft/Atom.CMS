<?php
// Javascript:





?>

<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- jQuery UI -->
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<script src="js/tinymce/tinymce.min.js"></script>

<script>
	
	$(document).ready(function() {
		
		$("#console-debug").hide();
		
		$("#btn-debug").click(function(){
			
			$("#console-debug").toggle();
			
		});
		
		
	});

	tinymce.init({
	    selector: ".editor",
	    theme: "modern",	    
	    plugins: [
	         "code advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	         "save table contextmenu directionality emoticons template paste textcolor"
	   ],
	   content_css: "css/content.css",
	   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
	   style_formats: [
	        {title: 'Bold text', inline: 'b'},
	        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
	        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
	        {title: 'Example 1', inline: 'span', classes: 'example1'},
	        {title: 'Example 2', inline: 'span', classes: 'example2'},
	        {title: 'Table styles'},
	        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
	    ]
	 }); 
	
</script>