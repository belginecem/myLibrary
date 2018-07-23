<?php

function encrypt_url($param) {
    $ci = &get_instance();
    $encode = $ci->encrypt->encode($param);
    $encode = urlencode($encode);
    return str_replace(['%2B', '%3D','%2F'], ['@2B', '@3D','@2F'], $encode);
}

function decrypt_url($param) {
    $ci = &get_instance();
    $decode = str_replace(['@2B', '@3D','@2F'], ['%2B', '%3D','%2F'], $param);
    $decode = urldecode($decode);
    return $ci->encrypt->decode($decode);
}