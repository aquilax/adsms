<?php
  $this->load->view('header_view');

  foreach ($sites as $site){
    echo '<div class="site">';
    echo '<h2><a href="'.$site['url'].'">'.$site['name'].'</a></h2>';
    echo '<img src="'.$site['image'].'" alt="'.$site['name'].'"/>';
    echo '<p>'.$site['descr'].'</p>';
    echo '</div>';
  }
  $this->load->view('footer_view');
?>