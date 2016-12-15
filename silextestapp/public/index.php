<?php

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/test', function () use ($blogPosts) {
    return "this is the test page";
});

$app->get('/', function () use ($blogPosts) {
    return "this is the index page";
});

$app->run();
