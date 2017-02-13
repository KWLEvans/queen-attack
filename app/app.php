<?php
date_default_timezone_set('America/Los_Angeles');
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Queen.php";

$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), ["twig.path" => __DIR__."/../views"]);

$app->get('/', function() use ($app) {
    return $app['twig']->render("root.html.twig");
});

$app->post('/', function() use ($app) {
    $currentQueen = new Queen($_POST['queenXCoordinate'], $_POST['queenYCoordinate']);
    $result = $currentQueen->canAttack($_POST['targetXCoordinate'], $_POST['targetYCoordinate']);
    return $app['twig']->render("result.html.twig", ['result' => $result]);
});

return $app;




?>
