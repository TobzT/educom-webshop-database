<?php

##############################################################
#MAIN APP                                                    #
##############################################################
require_once("./1 Presentation/show.php");
require_once("./2 Business/business.php");
require_once("./3 Data/data.php");

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
            $data = validateForm($data, "./users/users.txt");
            if($data['valid'] == true){
                $page = 'thanks';
            }
            break;
        case 'login':
            $data = getData('login');
            // var_dump($data);
            
            if($data['valid'] == true) {
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
            if($data['valid']) {
                $conn = openDb();
                registerUser($conn, $data);
                closeDb($conn);
                $page = 'login';
            }
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