<?php

session_start();

include "Settings/Settings.php";
include "Settings/Routes.php";

// Including Classes
$classes = scandir("App/Classes");
foreach ($classes as $class)
{
    if ($class != "." and $class != "..")
        include "App/Classes/".$class;
}

// Including Models
$models = scandir("App/Models");
foreach ($models as $model)
{
    if ($model != "." and $model != "..")
        include "App/Models/".$model;
}

// Including Controllers
$controllers = scandir("App/Controllers");
foreach ($controllers as $controller)
{
    if ($controller != "." and $controller != "..")
        include "App/Controllers/".$controller;
}

App::SetPage(Routes::Page());

// === Render ===

if (empty(Routes::Route(App::Page())))
{
    //http_response_code(404);
    Render::Template("404",["var"=>"test"]);
    exit();
}
else
{
    $route = Routes::Route(App::Page());

    $controller = "App\Controllers\\".$route["Controller"];
    $method = $route["Method"];

    (new $controller())->$method();
}






