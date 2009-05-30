<?php
  $this->load->view('header_view');

if (isset($services['fortumo']) && count($services['fortumo']) > 0){
  echo "<h2>Fortumo</h2>";
  echo "<div>";
  foreach($services['fortumo'] as $row){
    echo "<p>Кратък номер: ".$row['number']."</p>";
    echo "<p>Цена: ".$row['price']." BGN</p>";
  }
  echo "</div>";
}
  $this->load->view('footer_view');
?>
