	
<?php
		header('Access-Control-Allow-Origin: https://app.cdc-azamgarh.com/');
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, Authorization');
		header('Access-Control-Allow-Credentials: true');
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Handle the uploaded file (image) if needed and move it to a desired location
			$imageFileName = '';
			
			if (!empty($_FILES['image']['name'])) {
			    
    			$fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
    			$width = $fileinfo[0];
    			$height = $fileinfo[1];
			    if ($width != "480" || $height != "320") {
    				$response = array(
    					"type" => "error",
    					"message" => "Image dimension should be 480 X 320"
    				);
    				echo json_encode($response);
    				exit();
    			}
				$imageFileName = time() . '_' . $_FILES['image']['name'];
				$targetPath = '../images/' . $imageFileName;
				move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
				
			}

			// Retrieve other form data
			$users_id = $_REQUEST['id'];
		}
		
		
		include "errorlog.php";
		require __DIR__ . '/vendor/autoload.php';
		use Minishlink\WebPush\WebPush;
		
	    $image = "";
		$title = $_REQUEST["subject"];
		$msg = $_REQUEST["msg"];
		$send_id = $_REQUEST["send_id"];
	
		
		if($imageFileName != ""){
		    $image = "images/".$imageFileName;
		}
		
		$notifications = array(
			array(
				'endpoint' => 'https://fcm.googleapis.com/fcm/send/fYQuccGNocY:APA91bHGwCvM4qvz6vLCnLgW9wkKROqLMW1eRv0fgFAmoBrs8ZWYG2-w2Hno7VNQo9eqX-OZPLYptYr78O6e-TloconNNWkALSbzJydMmAMUNE_hDQExWRx7osLLJkb0RuPCa9OWoPPG', // Firefox 43+
				'payload' => $title.'|'.$msg.'|'.$image,
				'userPublicKey' => 'BGWKQCOkmU_uVo6vNiTNVlizzNiSpn02_Mr6hPB6FKi8arVgQIUUn4tI46JUaUHa3gQP8zuk1J78ei6azq-r5Dg', // base 64 encoded, should be 88 chars
				'userAuthToken' => 'ExUKrU6kHVdqpj5bYxVdhA==', // base 64 encoded, should be 24 chars
			)
		);
		
		$auth = array(
			'GCM' => 'MY_GCM_API_KEY', // deprecated and optional, it's here only for compatibility reasons
			'VAPID' => array(
				'subject' => 'mailto:ankit.av2611@gmail.com', // can be a mailto: or your website address
				'publicKey' => 'BGWKQCOkmU_uVo6vNiTNVlizzNiSpn02_Mr6hPB6FKi8arVgQIUUn4tI46JUaUHa3gQP8zuk1J78ei6azq-r5Dg', // (recommended) uncompressed public key P-256 encoded in Base64-URL
				'privateKey' => 'oHWZZRBlL0wj0-dN2eDLFxvokOjltyI8W9tC89NU6_I', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
			),
		);
		$webPush = new WebPush($auth);

		// send multiple notifications with payload	
		$i=0;
		include "conn.php";
		$sql = "SELECT a.*, b.NAME, b.id AS uid FROM `pushsubs` a, `users` b WHERE a.user_id = b.id AND a.user_id IN (".$users_id.")";
		$result = mysqli_query($conn, $sql);
		while($row=mysqli_fetch_array($result)){
			$msg = str_replace("{name}", $row['NAME'], $msg);
			$payload = $title.'|'.$msg.'|'.$image;
			$i++;
			echo $i;
			$webPush->sendNotification(
				$row['ENDPOINT'],
				$payload, // optional (defaults null)
				$row['KEYID'], // optional (defaults null)
				$row['TOKEN'] // optional (defaults null)
			);
			//break;
		
			logerror("Push Send - Success : ['ID':".$row['user_id']."]");
			$sql2 = "INSERT INTO `push_logs` (`user_id`, `push_id`, `send_by`, `msg`, `date`, `img_src`) VALUES ('".$row['uid']."', '".$row['S_No']."', '".$send_id."', '".$msg."','".date('Y-m-d H:i:s')."', '".$image."')";
			mysqli_query($conn, $sql2);
		}
		if($i > 0){
		    echo "success";
    		$webPush->flush();
		}else{
		    echo "{'error':'true','msg':'NO-SUBS'}";
		}

		// send one notification and flush directly
		/*$webPush->sendNotification(
			$notifications[0]['endpoint'],
			$notifications[0]['payload'], // optional (defaults null)
			$notifications[0]['userPublicKey'], // optional (defaults null)
			$notifications[0]['userAuthToken'], // optional (defaults null)
			true // optional (defaults false)
		);*/
?>
	
