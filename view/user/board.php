<?php include '../inc/head.php'; ?>
<header class="container">
  <div class="space-wrap">
    <div class="call-12">
 <?php include '../inc/menu.php'; ?>
	</div>
	<div class="call-12">
<?php
if(!$_SESSION['username'])
	header('Location: /');
	$author = $_SESSION['username'];
	$select = "SELECT * FROM `short` WHERE author = '$author'";
	$query = mysqli_query($connect, $select);
	$number = 0;
	echo '<table style="width: 100%">';
	echo '<tr>';
	echo '<th style="width: 3%">STT</th>';
	echo '<th style="width: 30%">Liên kết gốc</th>';
	echo '<th style="width: 15%">Liên kết đã rút gọn</th>';
	echo '<th style="width: 20%">Mô tả</th>';
	echo '<th style="width: 10%">Mật khẩu</th>';
	echo '<th style="width: 15%">Ngày thực hiện</th>';
	echo '<th style="width: 7%">Lượt truy cập</th>';
	echo '</tr>';
	while (	$data = mysqli_fetch_array($query)){
		$number++;
		echo '<tr>';
		echo '<td>'.$number.'</td>';
		echo '<td>'.$data['link'].'</td>';
		echo '<td>'.$_SERVER['SERVER_NAME'].'/'.$data['query'].'</td>';
		echo '<td>'.$data['descript'].'</td>';
		echo '<td>'.$data['password'].'</td>';
		echo '<td>'.$data['dateEnd'].'</td>';
		echo '<td>'.$data['count'].'</td>';
		echo '</tr>';
	}
		echo '</tr>';
			echo '</table>';
?>
</div>
</div>
</header>