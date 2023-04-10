<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/vendor/autoload.php';

require "router_redirects.php";


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    echo "<script>console.log(\"Out here in the open\")</script>";
    // $r->addRoute('GET', '/lait_form/applicant_form/{id:\d+}', "applicant_validate");
    $r->addRoute('GET', '/lait_form/applicant_form/{id:[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}}', "applicant_validate");
    //$r->addRoute('GET', '/lait_form/applicant_form.php', "invalid_address");
    $r->addRoute('GET', '/lait_form/initial_applicant', "initial_applicant");


    //$r->addRoute('GET', '/{any:.*}', "invalid_address");
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // handle 404 Not found here
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // handle 405 Method Not Allowed here
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}
?>
