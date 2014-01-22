<?php 
$dbhost='localhost';
$dbname='wp';
$dbuser='root';
$dbpasswd='123456';
$url = $_SERVER['HTTP_REFERER'];

		$name=$_POST['page'];
		$phone=$_POST['tel'];
		$city=$_POST['city'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$birthday=$_POST['time1'];
		$order=$_POST['tianmao'];
		$wangwang=$_POST['wangwang'];
		$shop=$_POST['shopName'];
		$product=$_POST['productName'];
		$date=$_POST['time2'];
		$serial=$_POST['serialNo'];
		
		$db = mysql_connect($dbhost, $dbuser, $dbpasswd) or die("Could not connect");
		mysql_select_db($dbname,$db) or die("Could not select database");
		mysql_query("set names utf8");
		$selectSql = "SELECT * FROM serial where serialno='".$serial."'";
		$query = @mysql_query($selectSql);
		$flag=false;
		while($row = mysql_fetch_array($query))
		{
			$flag=true;
		}
		if($flag==true)
		{
		$insertSql= "INSERT INTO `yanzheng`
					(`name`,
					`phone`,
					`city`,
					`adddress`,
					`email`,
					`birthday`,
					`order`,
					`wangwang`,
					`shop`,
					`product`,
					`date`,
					`serial`)
					VALUES
					('$name',
					'$phone',
					'$city',
					'$adddress',
					'$email',
					'$birthday',
					'$order',
					'$wangwang',
					'$shop',
					'$product',
					'$date',
					'$serial');";
		$result = mysql_query($insertSql,$db) or die(mysql_error());
		if (mysql_affected_rows())
			echo "<script>alert('您所购买的是正品。感谢您选购乐象产品，祝您使用愉快！');window.location.href='http://www.elephantle.com';</script>";
		}
		else echo "<script>alert('验证码不存在!');history.go(-1);</script>";
?>