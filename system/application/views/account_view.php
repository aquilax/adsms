<?php
  $this->load->view('header_view');
  echo "Sum:" . sprintf('%01.3f', $sum);
  print_r($payments);
  print_r($transactions);
  $this->load->view('footer_view');
?>