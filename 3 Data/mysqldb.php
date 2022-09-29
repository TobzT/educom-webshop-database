<?php 


function openConn() {
    $servername = "127.0.0.1";
    $username = "tobias_webshop";
    $password = "EducomCheeta";
    $dbname = "tobias_webshop";
    return new mysqli($servername, $username, $password, $dbname);
}

function closeConn() {
    $conn->close();
}

function insert($conn, $useremail, $username, $userpw) {
    $sql = "INSERT INTO users (email, name, pw) VALUES (".$useremail.", ".$username.", ".$userpw.")";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}

$conn = openConn();

insert($conn, 'test@test.nl', 'test', 'testtesttest');

closeConn();
?>