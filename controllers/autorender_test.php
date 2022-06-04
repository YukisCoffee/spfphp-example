<?php
use SpfPhp\SpfPhp;

SpfPhp::beginCapture();

echo $twig->render("autorender_test.html.twig");

SpfPhp::autoRender();