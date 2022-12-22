<?php


function selected($value1, $value2, $return) {
	
	if($value1 == $value2) {
		echo $return;
	}
	
}

function sanitize_array($dirty_array) {
  $array = [];
  foreach($dirty_array as $key => $value) {
    $key = escape_html($key);
    $value = escape_html($value);
    $array[$key] = $value;
  }
  return $array;
}

?>