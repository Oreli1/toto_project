<?php
// Données de configutation
$config = array(
  'DB_HOST'=>'',
  'DB_USER'=>'',
  'DB_PASSWORD'=>'',
  'DB_DATABASE'=>''
);
// Inclusions de fichiers
require_once __DIR__.'/db.php';
require_once __DIR__.'/functions.php';

//Inclusion de composer
require_once __DIR__.'/../vendor/autoload.php';

//Social Network
$socialLinksPage = new SocialLinks\Page([
    'url' => 'http://toto-project.dev',
    'title' => 'toto project',
    'text' => 'Extended page description',
    'image' => 'http://mypage.com/image.png',
    'icon' => 'http://mypage.com/favicon.png',
    'twitterUser' => '@twitterUser'
]);
//print_r($socialLinksPage);
