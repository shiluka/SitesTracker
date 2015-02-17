<?php

/*
 * create a new site row
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['gid']) && isset($_POST['name']) && isset($_POST['vicinity']) && isset($_POST['offer_1']) && isset($_POST['offer_2']) && isset($_POST['offer_3'])) {
    
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

    // insert a new row
    $result = mysql_query("INSERT INTO sites(gid, name, vicinity, offer_1, offer_2, offer_3) VALUES('$gid', '$name', '$vicinity','$offer_1', '$offer_2', '$offer_3' )");

    // test if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "successfully created.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "error occurred !.";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    //field is missing
    $response["success"] = 0;
    $response["message"] = "field is missing !.";

    // echoing JSON response
    echo json_encode($response);
}
?>
