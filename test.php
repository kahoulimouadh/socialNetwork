<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 08/02/2016
 * Time: 21:56
 */

session_start();

session_destroy();

$_SESSION = [];