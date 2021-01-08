<?php

function dd( $dump, bool $die = true ) 
{
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";

    if( $die ) die;
}