<?php 

// I/O
function openConn() {
    $servername = "127.0.0.1";
    $username = "tobias_webshop";
    $password = "EducomCheeta";
    $dbname = "tobias_webshop";
    return mysqli_connect($servername, $username, $password, $dbname);
}

function checkConn($conn) {
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
}

function closeConn($conn) {
  mysqli_close($conn);
}

// USERS
// INSERT
function insert_users($conn, $useremail, $username, $userpw) {
    $sql = "INSERT INTO users (email, name, pw) VALUES ('$useremail', '$username', '$userpw')";
    
    try{
      mysqli_query($conn, $sql);
    } 
    catch(error $e){
        echo "Error: " . mysqli_error($conn) . "<br>" . $e;
      }
}

// FIND
function findByEmailInDb($conn, $email) {
  $sql = "SELECT * FROM users WHERE email = '$email'";

  try{
    $result = mysqli_query($conn, $sql);
    
    $result = mysqli_fetch_all($result);
    if (count($result) > 0) {
      return $result;
    } else {
      return array();
    }
    
  } 
  catch(error $e){
    echo "Error: " . mysqli_error($conn) . "<br>" . $e;
      return;
    }
}

function findByEmailInDbB($conn, $email) {
  $result = findByEmailInDb($conn, $email);
  if (count($result) > 0) {
    return true;
  }
  return false;
}

// $conn = openConn();
// $result = findByEmailInDb($conn, "admin@test.nl");
// closeConn($conn);

// WEBSHOP
function insert_items($conn, $itemname, $itemprice, $itemdesc, $imagepath) {
  $sql = "INSERT INTO items (name, price, description, path) VALUES ('$itemname', '$itemprice', '$itemdesc', '$imagepath')";
    
    try{
      mysqli_query($conn, $sql);
    } 
    catch(error $e){
        echo "Error: " . mysqli_error($conn) . "<br>" . $e;
      }
}


function getItems($conn) {
  $sql = "SELECT * FROM items";

  try{
    $result = mysqli_query($conn, $sql);
    
    $result = mysqli_fetch_all($result);
    if (count($result) > 0) {
      return $result;
    } else {
      return array();
    }
    
  } 
  catch(error $e){
    echo "Error: " . mysqli_error($conn) . "<br>" . $e;
      return;
    }
}

function getItem($conn, $id) {
  $sql = "SELECT * FROM items where id = $id";

  try{
    $result = mysqli_query($conn, $sql);
    
    $result = mysqli_fetch_all($result);
    if (count($result) > 0) {
      return $result;
    } else {
      return array();
    }
    
  } 
  catch(error $e){
    echo "Error: " . mysqli_error($conn) . "<br>" . $e;
      return;
    }
}
// $conn = openConn();
// insert_items($conn, "Koffiebonen", 3.49, "Koffiebonen in pak.", "./Images/koffie.jpg");
// closeConn($conn);

?>