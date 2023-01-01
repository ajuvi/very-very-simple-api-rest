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
    if(rtrim($route,"/")=="")
    {
        echo "Very very simple api v0.1";
        exit(0);
    } 

    if(rtrim($route,"/")=="/hola")
    {
        echo "Hola a tothom";
        exit(0);
    } 

    if((preg_match("#^/hola/(.*)?$#",$route,$params) === 1))
    {
        $nom = $params[1];
        echo "Hola $nom";
        exit(0);
    } 

    if(rtrim($route,"/")=="/tintin") 
    {
        echo json_encode($dataset, JSON_UNESCAPED_UNICODE);
        exit(0);
    }

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
    //not implemented yet
}

if($metode=="PUT")
{
    //not implemented yet
}

if($metode=="DELETE")
{
    //not implemented yet
}
