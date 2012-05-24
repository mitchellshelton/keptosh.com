<!DOCTYPE html>
<html lang="en">
<head>
  
  <title><?php print $site_title; ?> | <?php print $page_title; ?></title>
  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--[if IE]>
  	<script src="js/html5.js"></script>
  <![endif]-->

  <!--[if IE 7]>
  	<link rel="stylesheet" href="css/ie7.css" type="text/css" media="screen" />
  <![endif]-->
  
  <!-- stylesheets -->
  <?php if($page_title == "Contact") { // Only load formalize on the contact page ?>
    <link rel="stylesheet" href="/css/formalize.css" type="text/css" media="screen">
  <?php } ?>
  <link rel="stylesheet" href="/css/reset.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/css/styles.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/css/mobile.css" type="text/css" media="screen">
      
  <?php if($uses_js == TRUE) { // Only load custom javascript on pages that use it ?>
  <!-- javascript -->
  <script type="text/javascript" charset="utf-8" src="/js/jquery-1.6.2.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="/js/script.js"></script>
  <?php } ?>
  <?php if($page_title == "Contact") { // Only load formalize on the contact page ?>
    <script type="text/javascript" charset="utf-8" src="/js/jquery.formalize.min.js"></script>
  <?php } ?>
  
  <!-- Google Analytics -->
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', <?php print $analytics_code; ?>]);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
  
</head>

  <body id="<?php echo $_GET['id']; ?>-page">
    <?php include('theme.php'); ?>
  </body>
 
</html>