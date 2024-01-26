<?php
include "connect.php";

$type = $_GET['type'];
$nameP = $_GET['name'];
$password = $_GET['password'];
$content = $_GET['content'];



if ($type == 'write') {
    $sql2 = "SELECT * FROM chatmessage WHERE user = '" . $nameP . "'";
    $result = $con->query($sql2);
    if ($result->num_rows > 0) {
        $sql = "UPDATE chatmessage SET message = '". $content ."' WHERE user='" . $nameP . "' AND password ='" . $password . "'";
        if($con->query($sql)) {
            $result4 = 'Success';
        } else {
            $result4 = 'Error: ' . $sql . ' ' . $con->error;
        }
    } else {
        $sql = "INSERT INTO chatmessage (user, password, message) VALUES ('".$nameP."','".$password."','".$content."')";
        if($con->query($sql)) {
            $result4 = 'Success';
        } else {
            $result4 = 'Error: ' . $sql . ' ' . $con->error;
        }
    }
} else if ($type == 'read'){
    $result = $con->prepare("SELECT message FROM chatmessage WHERE user = ?");
    $result->bind_param("s", $nameP);
    $result->execute();
    $result->store_result();
    $result->bind_result($cont);
    $result->fetch();
    $result->close();
    $result4 = $cont;
}else if ($type == 'name') {
    $result = $con->query("SELECT user FROM chatmessage");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $result4 .= (" " . $row['name']);
        }
    }
}

echo $result4;

