<?php 
	$db = mysqli_connect('localhost', 'root', '', 'sb');
	if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully";
$status = $statusMsg = ''; 
$result = $db->query("SELECT * FROM img"); 
?>
<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		img{
			height: 100px;
		}
	</style>
</head>
<body>

</body>
</html>