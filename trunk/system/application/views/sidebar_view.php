<?php
  if (isset($links) && count($links) > 0){
		echo "<ul>";
    foreach($links as $link => $title){
      echo "<li>".anchor($link, $title)."</li>";
		}
		echo "</ul>";
  }
?>
