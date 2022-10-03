<?php 
// require_once("./3 Data/textfile.php");
require_once("./3 Data/mysqldb.php");
// FIND
function findByEmail($conn, $email) {
    return findByEmailInDb($conn, $email);
}

function findByEmailB($conn, $email) {
    return findByEmailInDbB($conn, $email);
}

// WRITE
function saveInDb($conn, $useremail, $username, $userpw){
    return insert($conn, $useremail, $username, $userpw);
}




// I/O
function openDb() {
    return openConn();
}

function closeDb($conn) {
    return closeConn($conn);
}



?>