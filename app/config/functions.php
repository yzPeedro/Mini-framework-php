<?php

function dd( $dump, bool $die = true ) 
{
    echo "<pre>";
    print_r($dump);
    echo "</pre>";

    if( $die ) die;
}