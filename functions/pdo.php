<?php
  function pdo($pdo, $sql, $args = NULL)
  {
    if (!$args)
      {
        return $pdo->query($sql);
      }
    $stmt = $pdo->prepare($sql);
    $stmt->execute($args);
    return $stmt;
  }
?>