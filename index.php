<?php

require(__DIR__."/vendor/autoload.php");

$router = new CoffeeCode\Router\Router(BASE_URL);

$router->namespace("Source\\App");

$router->get("/", "Web:home", "site.home");
$router->get("/error", "Web:error", "site.error");

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("site.error");
}