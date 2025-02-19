<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#00cff4">
</head>
<body>
<?php 
    include "conn.php";
    $sql = "SELECT COUNT(ENDPOINT) as nofpush FROM pushsubs";
	$row = mysqli_fetch_array(mysqli_query($conn, $sql));
	$nofpush = $row["nofpush"];
?>
<div class="container-fluid" style="text-align:-webkit-center;">
    <form method="post" action="../web-push/send_push_notification.php" class="row" target="_blank">
        <div class="form-group col-md-12">
            <div class="col-md-4 col-md-offset-4">
                <label></label>
                <input type="text" name="title" placeholder="Title" value="Career Development Center" class="form-control" required>
            </div>
            <div class="col-sm-4 col-sm-offset-4">
                <label></label>
                <textarea name="msg" placeholder="Message" class="form-control" rows="10" required></textarea>
            </div>
            <div class="col-sm-4 col-sm-offset-4">
                <label></label>
                <input type="text" name="img" placeholder="Image" class="form-control" required>
            </div>
            <div class="col-sm-4 col-sm-offset-4">
                <br>
                <button type="submit" class="btn btn-primary form-control">Send</button>
            </div><br>
            <h4>Number of Web-push Notification subscriber(s) <?php echo $nofpush; ?></h4>
        </div>
    </form>
</div>
</body>
</html>