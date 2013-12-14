<?php

function hasSession($key) {
    return isset($_SESSION[$key]); 
};

function setSession($key, $value) {
    $_SESSION[$key] = $value;
}

function getSession($key, $default = '') {
    return hasSession($key) ? $_SESSION[$key] : $default;
}

