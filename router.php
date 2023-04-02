<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    echo "<script>console.log(\"Out here in the open\")</script>";
    $r->addRoute('GET', '/applicant_form/{id:\d+}', function ($vars) {
        echo "<script>console.log(\"here I am\")</script>";
        session_start();
        $_SESSION['CandidateID'] = $vars['id'];
        //echo "<h1>". $_SESSION['CandidateID'] . "</h1>";
        $CandidateID = $_SESSION['CandidateID'];
        $con = mysqli_connect("localhost", "root", "", "lait_hr");
        if($con) {
            echo "<script>console.log(\"here I am\")</script>";
            $query = "SELECT COUNT(*) AS count FROM Applicant WHERE CandidateID = $CandidateID";
            $result = mysqli_query($con, $query);
            $row =  $result->fetch_assoc();
            //echo "<h1>" . $row["count"] . "</h1>";
            if($row["count"] > 0) {
                echo "<h1 style=\"text-align: center; font-size: 5em;\">You have already applied!!!</h1>";
                exit();
            }
        } else {
            echo "Connection error!";
        }
        include('applicant_form.php');
    });
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
