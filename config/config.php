<?php

#CONST
define("PATH", "/");

function dd( $dump, bool $die = true )
{
    echo "<pre>";
    print_r($dump);
    echo "</pre>";

    if( $die ) die;
}

function responseJson($toJson, bool $die = true)
{
    echo "<pre>";
    print_r(json_encode($toJson));
    echo "</pre>";

    if( $die ) die;
}

function returnJson($toJson)
{
    return json_encode($toJson);
}

function bug( bool $bug )
{
    if ( $bug ) {
        echo "Working!!";
    } else {
        echo "Fail.";
    }
}