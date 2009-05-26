<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ADSMS &raquo; <?php echo $title;?></title>
  <link rel="stylesheet" href="/css/blueprint/screen.css" type="text/css" media="screen, projection">
  <link rel="stylesheet" href="/css/blueprint/src/forms.css" type="text/css" media="screen, projection">
  <!--[if IE]><link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
  <link rel="stylesheet" href="/css/blueprint/print.css" type="text/css" media="print">
	<link rel="stylesheet" href="/css/blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection" />
  <link rel="stylesheet" href="/css/adsms.css" type="text/css" media="screen" />
</head>
<body>
  <div class="container prepend-top">
    <div id="header" class="span-24 last">
      <h1 id="adsms"><a href="/"><img src="/img/logo.png" alt="logo" /></a> <em>.beta</em></h1>
    </div>
    <hr />
    <div id="subheader" class="span-24 last">
      <h3 class="alt">Лесна и бърза микрореклама!</h3>
    </div>
    <hr />
    <div id="sidebar" class="span-4">
<?php $this->load->view('sidebar_view'); ?>
    </div>
    <div class="span-20 last">
      <h2><?php echo $title; ?></h2>