<?php
use SpfPhp\SpfPhp;

// Start SpfPhp manual mode
ob_start();

// Render the view
$page = $twig->render("index.html.twig", [
    "page_class" => "index"
]);

if (SpfPhp::isSpfRequested())
{
    SpfPhp::display($page, ["content"]);
}
else
{
    echo $page;
}