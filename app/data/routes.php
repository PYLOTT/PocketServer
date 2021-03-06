<?php

    $routes = new routes($this->server);

    $routes->newRoute("/",function () {
        $ress = new stdClass;
        $ress->msg = "";
        $ress->contentType = "text/html";
        $ress->code = 301;
        $ress->headers = "Location: /home";
        return $ress;
    });

    $routes->newRoute("/home",function ($params){
        global $views;
        // global $params;
        $ress = new stdClass;
        $ress->msg = $views->parse("userCapable.home", $params);
        $ress->code = 200;
        $ress->contentType = "text/html";
        $ress->headers = "";
        return $ress;
    });

    $routes->newRoute("HTTPCOMMONERR404",function ($params){
        global $views;
        // global $params;
        $ress = new stdClass;
        $ress->msg = $views->parse("userError.404", $params);
        $ress->code = 404;
        $ress->contentType = "text/html";
        $ress->headers = "";
        return $ress;
    });

    // ressources/public/imgs/Bienvenue.jpg
    $routes->newRoute("/ressources/public/imgs/Bienvenue.jpg",function (){
        $ress = new stdClass;
        $ress->msg = file_get_contents(__DIR__."/ressources/public/imgs/Bienvenue.jpg");
        $ress->code = 200;
        $ress->contentType = "image/jpg";
        $ress->headers = "";
        return $ress;
    });
    // ressources/public/imgs/Bienvenue.jpg
    $routes->newRoute("/ressources/public/videos/mapping_02.mp4",function (){
        $ress = new stdClass;
        $ress->msg = file_get_contents(__DIR__."/ressources/public/videos/mapping_02.mp4");
        $ress->code = 200;
        $ress->contentType = "video/mp4";
        $ress->headers = "";
        return $ress;
    });

    // ressources/public/imgs/Bienvenue.jpg
    $routes->newRoute("__METHODERROR__",function (){
        $ress = new stdClass;
        $ress->msg = "Unsuported Method\r\n[<a href=\"/\">root</a>]";
        $ress->code = 405;
        $ress->contentType = "text/html";
        $ress->headers = "";
        return $ress;
    });

    return $routes;