<?php
require_once("../config.php");

if (isset($_GET["id"])) {
	//Lây id được gửi qua từ bên quan-ly-thanh-vien.php
	$id = $_GET["id"];
	//Thực thi câu lệnh sql delete để xóa user
	$sql = "delete from users where id = $id";
	$query = mysqli_query($db, $sql);
	//Chuyển hướng trang web về lại trang quan-ly-thanh-vien.php
	header('Location: user-management.php');
}


?>