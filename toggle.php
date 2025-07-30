<?php
// toggle.php
include 'checkConnect.php'; // file connect to DB 

if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // query to reflect current status
    $sql = "UPDATE user SET status = NOT status WHERE id = $id";
    
    if($conn->query($sql)){
        header("Location: ".$_SERVER['HTTP_REFERER']); // go back to main page 
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>