<?php 
include_once("./3 Data/session_manager.php");
include_once("./3 Data/mysqldb.php");
// FIND
function findByEmail($conn, $email) {
    return findByEmailInDb($conn, $email);
}

function findByEmailB($conn, $email) {
    return findByEmailInDbB($conn, $email);
}

function getAllItemsFromDb($conn) {
    return getAllItems($conn);
}

function getItemsFromDb($conn, $idArray) {
    return getItems($conn, $idArray);
}

function getItemFromDb($conn, $id) {
    return getItem($conn, $id);
}

// WRITE
function saveInDb($conn, $useremail, $username, $userpw){
    return insert_users($conn, $useremail, $username, $userpw);
}




// I/O
function openDb() {
    return openConn();
}

function closeDb($conn) {
    return closeConn($conn);
}



?>