<?php

if(isset($_COOKIE['user'])) {
    setcookie('user', '', time() - 64 * 64 * 24 * 365, '/');
}

header('Location: /pages/');