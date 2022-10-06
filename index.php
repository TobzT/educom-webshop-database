<?php

##############################################################
#MAIN APP                                                    #
##############################################################
include_once('includeDir.php');
includeOnceDir("./1 Presentation/");
includeOnceDir("./2 Business/");
includeOnceDir("./3 Data/");

session_start();
date_default_timezone_set('CET');
session_check();
// var_dump($_SESSION);
$page = getRequestedPage();
$data = processRequest($page);
showResponsePage($data);

function getRequestedPage() {
    $request_type = $_SERVER["REQUEST_METHOD"];
    if ($request_type == "GET") {
        return getVarFromArray($_GET, 'page', 'home');
    } else {
        return getVarFromArray($_POST, 'page', 'home');
    }
}

function processRequest($page){
    session_check();
    switch($page) {
        case 'contact':
            $data = getData('contact');
            $data = validateForm($data);
            if($data['valid']){
                $page = 'thanks';
            }
            break;
        case 'login':
            $data = getData('login');
            // var_dump($data);
            $data = validateForm($data);
            if($data['valid']) {
                doLogin($data);
                $page = 'home';
            }
            break;

        case 'logout':
            doLogout();
            $page = 'home';
            break;
        case 'register':
            $data = getData('register');
            $data = validateForm($data);
            if($data['valid']) {
                $conn = openDb();
                registerUser($conn, $data);
                closeDb($conn);
                $page = 'login';
            }
            break;
        case 'details':
            $id = getVarFromArray($_GET, 'id', NULL);
            $data['id'] = $id;
            break;
        
        
    }
    $data['page'] = $page;
    return $data;
}

function showResponsePage($data) {
    beginDocument();
    showHead();
    showBody($data);
    endDocument();
}