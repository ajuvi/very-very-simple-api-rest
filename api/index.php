<?php

/**
 * Very very simple api rest
 */

define("ROUTE_BASE", "/very-very-simple-api-rest/api");

$metode = strtoupper($_SERVER['REQUEST_METHOD']);
$route = str_replace(ROUTE_BASE,"",$_SERVER['REQUEST_URI']);

$dataset = json_decode(file_get_contents("tintin.data"));

if($metode=="GET")
{

    //ruta => "/"
    if((preg_match("#^/?$#",$route,$params) === 1))
    {
        echo "Very very simple api v0.1";
    } 

    //ruta => "/hola"
    else if((preg_match("#^/hola/?$#",$route,$params) === 1))
    {
        echo "Hola a tothom";
        exit(0);
    } 

    //ruta => /hola/{nom}
    else if((preg_match("#^/hola/(.*)?$#",$route,$params) === 1))
    {
        $nom = $params[1];
        echo "Hola $nom";
        exit(0);
    } 

    //ruta => /tintin
    if((preg_match("#^/tintin/?$#",$route,$params) === 1))
    {
        echo json_encode($dataset, JSON_UNESCAPED_UNICODE);
        exit(0);
    }

    //ruta => /tintin/{id}
    if((preg_match("#^/tintin/([0-9]+)?$#",$route,$params) === 1))
    {
        $id = $params[1];
        foreach($dataset as $item){
            if($item->id==$id){
                echo json_encode($item, JSON_UNESCAPED_UNICODE);
                exit(0);
            }
        }
        echo "null";
        exit(0);
    }
}

if($metode=="POST")
{
    //not implemented yed.
}

if($metode=="PUT")
{
    //not implemented yed.
}

if($metode=="DELETE")
{
    //not implemented yed.
}
