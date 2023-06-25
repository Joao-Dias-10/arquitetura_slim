<?php

use App\Controllers\{
    LojaController
};

use function src\{
    slimConfiguration
};


$app = new \Slim\App(slimConfiguration());

$app->get('/loja', LojaController::class . ':getLojas');
$app->post('/loja', LojaController::class . ':insertLoja');
$app->put('/loja', LojaController::class . ':updateLoja');;
$app->delete('/loja', LojaController::class . ':deleteLoja');

$app->run();