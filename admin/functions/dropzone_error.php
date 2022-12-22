<?php

  function dropzone_error($err) {
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-type: text/plain');
    exit($err);
  }

?>