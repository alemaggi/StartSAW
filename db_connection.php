<?php
//Per localhost
/*function OpenCon() {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "StartSawDB";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn) {
 $conn -> close();
} 
*/
//Per la connesione al server webdev
function OpenCon() {
    $dbhost = '127.0.0.1';
    $dbuser = "S4236366";
    $dbpass = "[polistirolo]";
    $db = "S4236366";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn) {
 $conn -> close();
} 
?>