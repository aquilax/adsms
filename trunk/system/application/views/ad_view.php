<?php
  $this->load->view('header_view');

  $datestring = "%d %M %Y ".lang('at'). " %H:%i";
  echo '<h3>'.anchor('ad/add', lang('New ad')).'</h3>';
  foreach ($ads as $ad){
    echo '<div class="ad">';
    echo '<b><a href="'.$ad['url'].'">'.$ad['name'].'</a></b>';
    echo '<p>'.$ad['descr'].'</p>';    
    printf('<em>%s: %s</em>', lang('Created'), mdate($datestring, mysql_to_unix($ad['created'])));
    echo '</div>';
    echo '<hr/>';
  }
  $this->load->view('footer_view');
?>
