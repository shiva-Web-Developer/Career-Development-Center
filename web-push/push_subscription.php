<?php
include "conn.php";
include "errorlog.php";
// logerror("inside");
$subscription = json_decode(file_get_contents('php://input'), true);

if (!isset($subscription['endpoint'])) {
    echo 'Error: not a subscription';
    return;
}

$time = date('Y-m-d G:i:s');
$endpoint = $subscription['endpoint'];
$method = $_SERVER['REQUEST_METHOD'];
$key = $subscription['key'];
$guid = $subscription['user_id'];
$token = $subscription['token'];
switch ($method) {
    case 'POST':
        $sql = "INSERT INTO `pushsubs`(`user_id`, `ENDPOINT`, `KEYID`, `TOKEN`, `TIME`) VALUES (\"$guid\",\"$endpoint\",\"$key\",\"$token\",\"$time\")";
		if(mysqli_query($conn, $sql)){
			// logerror("Success : $endpoint");
		}else{
			logerror($method." -- Failed : ".mysqli_error($conn));
		}
        break;
    case 'PUT':
        // update the key and token of subscription corresponding to the endpoint
        break;
    case 'DELETE':
        // delete the subscription corresponding to the endpoint
        echo $sql = "DELETE FROM `pushsubs` WHERE ENDPOINT=\"$endpoint\"";
		if(mysqli_query($conn, $sql)){
			logerror("Success : $endpoint");
		}else{
			logerror($method." -- Failed : ".mysqli_error($conn));
		}
        break;
    default:
        echo "Error: method not handled";
        return;
}

?>