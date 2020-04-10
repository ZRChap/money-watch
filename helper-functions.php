<?php

// readable print_r 
function pnrd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

// readable var_dump 
function dnd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}
