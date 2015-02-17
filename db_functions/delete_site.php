<?php

/*
 * delete a product from table
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['lid'])) {
    $lid = $_POST['lid'];

    // include db connect class
    require_once __DIR__ . './configs/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql update row with matched pid
    $result = mysql_query("DELETE FROM sites WHERE lid = $lid");
    
    // check if row deleted or not
    if (mysql_affected_rows() > 0) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "successfully deleted.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No site found !.";

        // echo no users JSON
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
