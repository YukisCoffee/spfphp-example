<?php
(@include "vendor/autoload.php") or die("Run <code>composer install</code> in command line");

// lazy url system
$url = explode("/", $_SERVER["REQUEST_URI"]);
$url[count($url) - 1] = explode("?", $url[count($url) - 1])[0];

// init twig
$twig = new \Twig\Environment(
    new \Twig\Loader\FilesystemLoader(
        "views"
    )
);

switch ($url[1])
{
    case "":
    case "index":
        include "controllers/index.php";
        break;
    case "xtag_test":
        include "controllers/xtag_test.php";
        break;
    case "autorender_test":
        include "controllers/autorender_test.php";
        break;
    case "navigation_test":
        include "controllers/navigation_test.php";
        break;

    case "static":
        switch ($url[2])
        {
            case "main.css":
                header("Content-Type: text/css");
                echo file_get_contents("static/main.css");
                exit();
        }
    default:
        http_response_code(404);
        include "views/404.html.php";
}