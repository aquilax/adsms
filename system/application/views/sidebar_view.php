<?php
  if (isset($menu) && count($menu) > 0){
    foreach($menu as $menul){
      if (count($menul) > 0){
        echo "<ul>";
        foreach ($menul as $menui){
          echo "<li>".anchor($menui['url'], $menui['name'])."</li>";
        }
        echo "</ul>";
      }
    }
  }
?>
