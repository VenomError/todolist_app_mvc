<?php

function param($key)
{
    return isset($_GET[$key]) ? $_GET[$key] : null;
}

function enc($value)
{
    return base64_encode($value);
}

function dec($value)
{
    return base64_decode($value);
}