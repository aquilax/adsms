<?php
  $this->load->view('header_view');
  $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
  echo anchor('ad/add', lang('New ad'));
  foreach ($ads as $ad){
    echo '<div class="ad">';
    echo '<b><a href="'.$ad['url'].'">'.$ad['name'].'</a></b>';
    echo '<p>'.$ad['descr'].'</p>';
    echo '</div>';
    echo '<em>Created: '.mdate($datestring, mysql_to_unix($ad['created'])).'</em>';
  }
  $this->load->view('footer_view');
?>
