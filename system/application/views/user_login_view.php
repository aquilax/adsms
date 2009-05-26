<?php
  $this->load->view('header_view');
?>
<?php echo validation_errors(); ?>
<?
  echo form_open('user/login');
  pe(
    lang('E-mail', 'email'),
    form_input(array('name' => 'email','value' => set_value('email'),
      'id' => 'email', 'class' => 'text' ))
  );

  pe(
    lang('Password', 'password'),
    form_password(array('name' => 'password',
      'id' => 'password', 'class' => 'text' ))
  );

  echo '<p>'.form_submit('submit', lang('Login')).'</p>';
  echo form_close();

  $this->load->view('footer_view');
?>
