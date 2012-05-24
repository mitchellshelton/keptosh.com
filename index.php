<?php

if ($_SERVER['SERVER_NAME'] != 'keptosh.com') {
  error_reporting(E_NOTICE);
  ini_set("display_errors", 1);
}

// Global Variables
$site_title = 'Keptosh Media';
$analytics_code = "''";

if (!isset($_GET['id'])) {
  $_GET['id'] = 'welcome';
}
if (!isset($_GET['page'])) {
  $_GET['page'] = 'null';
}

switch ($_GET['id']) {
  case 'welcome':
    $page_title = 'Welcome';
    $canonical_name = '/welcome';
    $shortlink_name = '?id=welcome';
    $page_name = 'content/welcome.php';
    $uses_js = FALSE;
  break;
  case 'projects':
    $page_title = 'Projects';
    $canonical_name = '/projects';
    $shortlink_name = '?id=projects';
    $page_name = 'content/projects.php';
    $uses_js = FALSE;
  break;
  case 'about':
    $page_title = 'About';
    $canonical_name = '/about';
    $shortlink_name = '?id=about';
    $page_name = 'content/about.php';
    $uses_js = FALSE;
  break;
  case 'contact':
    $page_title = 'Contact';
    $canonical_name = '/contact';
    $shortlink_name = '?id=contact';
    $page_name = 'content/contact.php';
    $uses_js = FALSE;
  break;
  case 'privacy':
    $page_title = 'Privacy Policy';
    $canonical_name = '/privacy';
    $shortlink_name = '?id=privacy';
    $page_name = 'content/privacy.php';
    $uses_js = FALSE;
  break;
  default:
    $page_title = 'Welcome';
    $canonical_name = '/welcome';
    $shortlink_name = '?id=welcome';
    $page_name = 'content/welcome.php';
    $uses_js = FALSE;
}

include('html.php');

?>