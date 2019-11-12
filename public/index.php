<?php

date_default_timezone_set('Europe/Moscow');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->post('/', function (Request $request, Response $response) use ($app) {
    $body = $request->getParsedBody();
    $calc = new \LoanCalc\Controllers\CalcController();
    $responseData = $calc->action($body);
    return $response->withJson($responseData);
});
$app->run();