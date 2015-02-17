<?php

/*
 * update a site information
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['lid']) && isset($_POST['gid']) && isset($_POST['name']) && isset($_POST['vicinity']) && isset($_POST['offer_1']) && isset($_POST['offer_2']) && isset($_POST['offer_3'])) {
    
    $lid = $_POST['lid'];
	$gid = $_POST['gid'];
    $name = $_POST['name'];
	$vicinity = $_POST['vicinity'];
    $offer_1 = $_POST['offer_1'];
	$offer_2 = $_POST['offer_2'];
	$offer_3 = $_POST['offer_3'];


    // include db connect class
    require_once __DIR__ . './configs/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql update row with matched lid
    $result = mysql_query("UPDATE sites SET name = '$name', vicinity = '$vicinity', offer_1 = '$offer_1', offer_2 = '$offer_2', offer_3 = '$offer_3' WHERE lid = $lid");

    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "site successfully updated.";
        
        // echoing JSON response
        echo json_encode($response);
    } else {
        
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "field is missing !.";

    // echoing JSON response
    echo json_encode($response);
}
?>
