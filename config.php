<?php
session_start();
// Pega o DNS do servidor

define('URL', 'http://' . $_SERVER["SERVER_NAME"] . '/UDEMA/udema');
define("CSS_STYLE", URL . '/css/style.css');
define("CSS_CUSTOM", URL . '/css/custom.css');
define("CSS_VENDOR", URL . '/css/vendors.css');
define("CSS_ICON", URL . '/css/icon_fonts/css/all_icons.min.css');
define("CSS_BOOTSTRAP", URL . '/css/bootstrap.min.css');

define("JQUERY", URL . '/js/jquery-3.7.1.min.js');
define("COMMOM", URL . '/js/common_scripts.js');
define("MAIN", URL . '/js/main.js');
define("PARALLAX", URL . '/js/jarallax.js');

define('IMAGES', URL . '/img/');
