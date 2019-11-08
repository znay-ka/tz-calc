<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->post('/', function (Request $request, Response $response) use ($app) {
    $body = $request->getParsedBody();
//    $response->getBody()->write(json_encode($body['loan']));
//    var_dump($body);
    $calc = new \LoanCalc\Controllers\CalcController();
    $calc->loadLoan($body['loan']);
    $calc->loadPayments($body['payments']);
    $calc->calculate($body['atDate']);
    return $response;
});
$app->run();