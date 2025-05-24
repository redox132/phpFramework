<?php


function basePath(string $path = '')
{
    return __DIR__ . '/../' . $path;
}


function redirect(?string $path = '/')
{
    header("Location: $path" );
    exit();
}
