<?php

return [
    'name' => "StoneWorld",
    'title' => "Blog后台",
    'subtitle' => 'A clean blog written in Laravel 5.1',
    'description' => 'This is my meta description',
    'author' => 'StoneWorld',
    'page_image' => 'home-bg.jpg',
    'avatar' => 'icon.jpeg',
    'posts_per_page' => 10,
    'rss_size' => 25,
    'contact_email' => env('MAIL_FROM'),
    'uploads' => [
        'storage' => 'local',
        'webpath' => '/uploads/',
    ],
];