<?php
  $this->load->view('header_view');
?>
<h2><?php echo $title?></h2>
<?php echo validation_errors('<div class="error">', '</div>'); ?>
<?
  echo form_open_multipart('ad/add');

  pe(
    lang('Title', 'name'),
    form_input(array('name' => 'name','value' => set_value('name'),
      'id' => 'name', 'class' => 'text' ))
  );

  pe(
    lang('URL', 'url'),
    form_input(array('name' => 'url','value' => set_value('url'),
      'id' => 'url', 'class' => 'text' ))
  );

  pe(
    lang('Description', 'descr'),
    form_input(array('name' => 'descr','value' => set_value('descr'),
      'id' => 'descr', 'class' => 'text' ))
  );

  pe(
    lang('Cost per view', 'cpv'),
    form_input(array('name' => 'cpv','value' => set_value('cpv'),
      'id' => 'cpv', 'class' => 'text' ))
  );

  pe(
    lang('Status', 'status'),
    form_dropdown('status', $statusa, set_value('status'), array(
      'id' => 'status', 'class' => 'select' ))
  );

  echo '<p>'.form_submit('submit', lang('Add')).'</p>';
  echo form_close();
  $this->load->view('footer_view');
?>

