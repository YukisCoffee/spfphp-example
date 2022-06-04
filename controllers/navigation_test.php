<?php
use SpfPhp\SpfPhp;

// Simulate server delay
sleep(3);

// Start SpfPhp manual mode
ob_start();

// Render the view
$page = $twig->render("navigation_test.html.twig", [
    "page_class" => "navigation_test"
]);

if (SpfPhp::isSpfRequested())
{
    SpfPhp::display($page, ["content"]);
}
else
{
    echo $page;
}