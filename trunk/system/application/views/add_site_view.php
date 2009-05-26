<?php
  $this->load->view('header_view');

  echo validation_errors();
  
  echo form_open_multipart('site/add');
  echo form_label('Name', 'name');
  echo form_input('name', set_value('name'));
  echo form_label('URL', 'url');
  echo form_input('url', set_value('url'));
  echo form_label('Description', 'descr');
  echo form_textarea('descr', set_value('descr'));
  echo form_label('Image', 'image');
  echo form_upload('image');
  echo form_label('Status', 'status');
  echo form_dropdown('status', $statusa, set_value('status'));
  echo form_submit('submit', 'Add');
  echo form_close();
  
  $this->load->view('footer_view');
?>
