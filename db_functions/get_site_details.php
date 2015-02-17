<?php

/*
 * get site details
 */

// array for JSON response
$response = array();


// include db connect class
require_once __DIR__ . './configs/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// check for post data
if (isset($_GET["lid"])) {
    $lid = $_GET['lid'];

    // get a site from sites table
    $result = mysql_query("SELECT *FROM sites WHERE lid = $lid");

    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

            $site = array();
            $site["lid"] = $result["lid"];
            $site["gid"] = $result["gid"];
            $site["name"] = $result["name"];
            $site["vicinity"] = $result["vicinity"];
			$site["offer_1"] = $result["offer_1"];
			$site["offer_2"] = $result["offer_2"];
			$site["offer_3"] = $result["offer_3"];
            $site["created_at"] = $result["created_at"];
            $site["updated_at"] = $result["updated_at"];
			$site["latitude"] = $result["latitude"];
			$site["longitude"] = $result["longitude"];
			
			$site["tele"] = $result["tele"];
			$site["website"] = $result["website"];
			
			
			$site["type"] = $result["type"];
			
            // success
            $response["success"] = 1;

            // user node
            $response["site"] = array();

            array_push($response["site"], $site);

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no site found
            $response["success"] = 0;
            $response["message"] = "No site found !.";

            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no site found
        $response["success"] = 0;
        $response["message"] = "No site found !.";

        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "field is missing !.";

    // echoing JSON response
    echo json_encode($response);
}
?>
