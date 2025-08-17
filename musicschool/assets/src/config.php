<?php

// charset
header('Content-Type: text/html; charset=UTF-8');

// timezone
date_default_timezone_set('Asia/Tokyo');

// domain
const DOMAIN = '';

// site name
const SITE_NAME = 'きたむらミュージックスクール';

// description
const DESCRIPTION = '「音楽で生きる」を叶える ミュージックスクール「きたむらミュージックスクール」の公式ホームページです。';

// keywords
const KEYWORDS = '';

// assets path
define('ASSETS', get_template_directory() . '/assets');
define('ASSETS_URI', get_template_directory_uri() . '/assets');

// server name
define('SERVER_NAME', 'https://' . $_SERVER['SERVER_NAME']);

// no image
define('NO_IMAGE_URI', ASSETS_URI . '/img/no-image.png');

// nav menu
global $navMenu;
$navMenu = [
  'top' => 'ホーム',
  'plan' => '料金',
  'blog' => 'ブログ',
  'result' => '卒業実績'
];
