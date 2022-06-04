<?php
use SpfPhp\SpfPhp;

// Register a direct render callback.
SpfPhp::registerDirectRenderCallback("test", function ($params) {
    return @$params["test-string"] ?? "Hello world";
});

$slowTest = function ($params = null) {
    // This absurdly huge file would take forever for SpfPhp to parse,
    // however we do just well here!
    return file_get_contents("views/special/direct_render_test.html");
};

SpfPhp::registerDirectRenderCallback("direct_render_test", $slowTest);
$twig->addFunction(new Twig\TwigFunction("slowTest", $slowTest));

// Start SpfPhp manual mode
ob_start();

// Render the view
$page = $twig->render("xtag_test.html.twig", [
    // "demonstrate slow performance"
    "demonslow" => isset($_GET["slow"]) && $_GET["slow"] != "false"
]);

if (SpfPhp::isSpfRequested())
{
    SpfPhp::display($page, ["content"]);
}
else
{
    echo $page;
}