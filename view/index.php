<?php
	
	$descript = $password = $query = '';
	
	if(isset($_SESSION['username']) && isset($_POST['submit'])){
	
		 $url = $_POST['link'];
		 $correct = 0;
		 $number = strlen($url);
		 $author = $_SESSION['username'];
		 $vip = $_SESSION['level'];
		 $exist = 0;
	
		
		$index->checkLink($correct, $number, $url);
		
		if($correct == $number)
			{
			 
		 	$query = $index->createQuery();
	
		 		if(isset($_POST['descript']) && !empty($_POST['descript']))
					$descript = $_POST['descript'];
	
		
				if(isset($_POST['password']) && !empty($_POST['password']))
					$password = $_POST['password'];
	
	
				if(isset($_POST['query']) && !empty($_POST['query']))
				{
					$query = $_POST['query'];
					if(strpos($query, " ") > 0)
						$query = $index->createQuery();
				}

				
			

				do{
					$old = "SELECT * FROM `short` WHERE query = '$query'";
					$findOld = mysqli_query($connect, $old);
					$exist = mysqli_num_rows($findOld);
				   
					if($exist == 0)
						 break;
				   else
					if(isset($_POST['query']) && !empty($_POST['query']))
						{
						echo '<div class="call-12"><div class="color-red mar-tb-5 pad-15 panel-round-l size-text-20">
						<span class="color-text-blue">#</span> Xin lỗi, tên liên kết tùy chỉnh của bạn đã được sử dụng. Bạn vui lòng đặt tên liên kết khác.</div></div>';
						break;
						}
					else	 
						$query = $index->createQuery();
						
				}while(true);

			if($exist == 0){
				$insert = "INSERT INTO short(link, author, dateEnd, descript, password, query, count)
				 VALUES ('$url', '$author', '$date', '$descript', '$password', '$query', 0)";
				  mysqli_query($connect,$insert);
				  
				header('Location: share.php?return='.$query);
				exit();
		   }
		 }
		}
	

	if(isset($_SESSION['username']))
		include 'home/user.php';
	else
		include 'home/guest.php';


	
	?>
		</div>
	</header>
	