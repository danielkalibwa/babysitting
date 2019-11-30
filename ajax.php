<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if (!isset($_GET['action'])) {
    die();
}

$action = htmlentities($_GET['action'], ENT_QUOTES);
include_once 'class/User.php';
switch ($action) {
    case "signup":
        $user = new User();
        if ($user->signupUser($_POST)) {
            $message = array("status" => 1);
        } else {
            $message = array("status" => 0);
            $message[] = $user->errors;
        }
        header('Content-Type: application/json');
        echo json_encode($message);
        break;
    case "signin":
        $user = new User();
        if ($user->signinUser($_POST)) {
            $message = array("status" => 1);
        } else {
            $message = array("status" => 0);
            $message[] = $user->errors;
        }
        header('Content-Type: application/json');
        echo json_encode($message);
        break;
    default:
        break;
}