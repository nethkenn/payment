
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>NEUPay</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
body {
	margin: 0;
	padding: 0;
	font-family: "Roboto", sans-serif;
}
header {
	position: fixed;
	background: #22242A;
	padding: 20px;
	width: 100%;
	height: 30px;
}

.left_area h3 {
	color: #fff;
	margin:0;
	text-transform: uppercase;
	font-size: 22px;
	font-weight: 900;
}
.left_area span {
	color: #1DC4E7;
}
.logout_btn {
	padding: 5px;
	background: #19B3D3;
	text-decoration: none;
	float: right;
	margin-top: -30px;
	margin-right: 40px;
	border-radius: 2px;
	font-size: 15px;
	font-weight: 600;
	color: #fff;
	transition: 0.5s;
	transition-property: background;
}
.logout_btn:hover {
		background: #0D9DBB;
		
}
.sidebar {
	background: #2F323A;
	margin-top: 70px;
	padding-top: 30px;
	position: fixed;
	left: 0;
	width: 250px;
	height: 100%;
	transition: 0.5s;
	transition-property: left;
	overflow: auto;
	
}
.sidebar .profile_image {
	width: 100px;
	height: 100px;
	border-radius: 100px;

	
}
.sidebar h4{
	color: #ccc;
	margin-top: 0;
	margin-bottom: 20px;
}
.sidebar a{
	color: #fff;
	display: block;
	width: 100%;
	line-height: 60px;
	text-decoration: none;
	box-sizing: border-box;
	transition: 0.5s;
	transition-property: background;
}
.sidebar a:hover {
	background: #19B3D3;
}
.sidebar i {
	
	padding-right: 10px;
	
}
label #sidebar_btn {
	z-index: 1;
	color: #fff;
	position: fixed;
	cursor: pointer;
	left: 300px;
	font-size: 20px;
	margin: 5px 0;
	transition: 0.5s;
	transition-property: color;
}

label #sidebar_btn:hover{
	color:  #19B3D3;
	
}

#check:checked ~.sidebar {
	left: -190px;
	
}
#check:checked ~.sidebar a span{
	display:none;
	
}
#check:checked ~.sidebar a{
	font-size: 20px;
	margin-left: 170px;
	width: 80px;
}
.content {
	margin-left: 300px;
	padding-top: 100px;
	
	
}
#check {
	display: none;
}
#subjects {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  table-layout: auto;
  width: 75%;  
  margin-left: 300px;
}

#subjects td, #subjects th {
  border: 1px solid #ddd;
  padding: 8px;
}

#subjects tr:nth-child(even){background-color: #f2f2f2;}

#subjects tr:hover {background-color: #ddd;}

#subjects th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.sidebar ul{
  background: #2F323A;
  height: 100%;

  list-style: none;
}


.sidebar ul li.active a{
  color: cyan;
  background: #2F323A;
  border-left-color: cyan;
}

.sidebar ul ul{
  position: static;
  display: none;
}
.sidebar ul .payment-show.show{
  display: block;

}
.sidebar ul .status-show.show{
  display: block;

}
.sidebar ul .transaction-show.show{
  display: block;

}
.sidebar ul ul li{
  line-height: 42px;
  border-top: none;
}
.sidebar ul ul li a{
  font-size: 15px;
  color: #e6e6e6;
  padding-left: 10px;
}

 input[type="submit"] {

 	width: 344px;
	height: 45px;
	border: none;
	background: steelblue;
	color: white;
	float: right;
	margin-right: 15px;
	
}
button {

 	width: 344px;
	height: 45px;
	border: none;
	background: steelblue;
	color: white;
	float: right;
	margin-right: 15px;
	
}
a {
	text-decoration: none;
	color: white;
}
input[type=number], select {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>

<body>

<header>
	<label for="check">
		<i class="fas fa-bars" id="sidebar_btn"></i>
	</label>

	<div class="left_area">
		<h3>NEU<span>pay</span></h3>
	</div>
	
	<div class="right_area">
		<a href="session_s.php" class="logout_btn">Logout</a>
	</div>
</header>
