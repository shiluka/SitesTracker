<?php

/*
 * list all the sites
 */

// array for JSON response
$response = array();


// include db connect class
require_once __DIR__ . './configs/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all sites from sites table
$result = mysql_query("SELECT *FROM sites") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // sites node
    $response["sites"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $site = array();
        $site["lid"] = $row["lid"];
		$site["gid"] = $row["gid"];
        $site["name"] = $row["name"];
		$site["vicinity"] = $row["vicinity"];
        $site["offer_1"] = $row["offer_1"];
        $site["offer_2"] = $row["offer_2"];
		$site["offer_3"] = $row["offer_3"];
        $site["created_at"] = $row["created_at"];
        $site["updated_at"] = $row["updated_at"];
		$site["latitude"] = $row["latitude"];
		$site["longitude"] = $row["longitude"];
		
		$site["tele"] = $row["tele"];
		$site["website"] = $row["website"];
		
		$site["type"] = $row["type"];

        // push single site into final response array
        array_push($response["sites"], $site);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no sites found
    $response["success"] = 0;
    $response["message"] = "No sites found";

    // echo no users JSON
    echo json_encode($response);
}
?>
