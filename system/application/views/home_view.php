<?php
  $this->load->view('header_view');
?>
<h2>Системата е в процес на разработка!</h2>

<div class="span-9 colborder">
  <h5>Описание</h5>
  <p><strong>ADSMS</strong> е платформа за <strong>микрореклама</strong>. Целта на системата е да предостави възможности
за текстова реклама на малки и средни по големина сайтове чрез <strong>SMS</strong> разплащане.</p>
  <p>Платформата е с отворен код и е базирана на технологии с отворен код:
<a href="http://codeigniter.com">Codeigniter</a> и <a href="http://www.blueprintcss.org/">Blueprint CSS</a>.</p>
<p>Кодът е достъпен на адрес: <a href="http://code.google.com/p/adsms/">http://code.google.com/p/adsms/</a></p>
  <h5>За кого е подходяща</h5>
    <p>Системата е подходяща за собственици на <strong>блогове</strong>, <strong>сайтове с малка и средна посещаемост</strong>
    и <strong>форуми</strong>, които желаят да управляват сами рекламата на своите сайтове.</p>
</div>
<div class="span-9 last">
  <h5>Как работи</h5>
  <ul>
    <li>Рекламодателят се <?php echo anchor('user/register', lang('register'))?> в системата;</li>
    <li>Избира сайтовете, в които желае да рекламира и цената на импресия за всяка страница;</li>
    <li>Всеки рекламодател получава уникален код чрез който може да захрани своята сметка;</li>
    <li>Сметката се захранва чрез SMS на кратък номер предоставен от доставчикът на
  услуги за SMS разплащания;</li>
  </ul>
</div>
<?php
  $this->load->view('footer_view');
?>
