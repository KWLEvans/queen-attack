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
    $currentType = $_POST['subject'];
    $currentPiece;
    if ($currentType == 'queen') {
        $currentPiece = new Queen($_POST["pieceLoc"][0], $_POST['pieceLoc'][1]);
    } elseif ($currentType == 'knight') {
        $currentPiece = new Knight($_POST["pieceLoc"][0], $_POST['pieceLoc'][1]);
    } elseif ($currentType == 'rook') {
        $currentPiece = new Rook($_POST["pieceLoc"][0], $_POST['pieceLoc'][1]);
    } elseif ($currentType == 'bishop') {
        $currentPiece = new Bishop($_POST["pieceLoc"][0], $_POST['pieceLoc'][1]);
    } elseif ($currentType == 'king') {
        $currentPiece = new King($_POST["pieceLoc"][0], $_POST['pieceLoc'][1]);
    }
    $result = $currentPiece->canAttack($_POST['targetLoc'][0], $_POST['targetLoc'][1]);
    return $result;
});

return $app;
?>
