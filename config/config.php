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

function bug( bool $bug )
{
    if ( $bug ) {
        echo "Deu bom";
    } else {
        echo "Deu b.o aí man";
    }
}