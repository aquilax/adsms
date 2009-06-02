<?php
  $this->load->view('header_view');
  echo "<p>Достъпът е отказан. Моля ".anchor('user/login', 'влезте')." в системата или се ".anchor('user/register', 'регистрирайте')."</p>";
  $this->load->view('footer_view');
?>