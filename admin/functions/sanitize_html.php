<?php

  function escape_html($content) {
    return htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
  }

?>