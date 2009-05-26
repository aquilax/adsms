<?php
  $this->load->view('header_view');

  echo validation_errors('<div class="error">', '</div>');

  echo form_open('user/register');

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

  pe(
    lang('Password again', 'password_again'),
    form_password(array('name' => 'password_again',
      'id' => 'password_again', 'class' => 'text' ))
  );

  echo "<p>".form_submit('submit', lang('Register'))."</p>";
  echo form_close();

  $this->load->view('footer_view');
?>