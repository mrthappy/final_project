<?php
include("connection.php");
include("function.php");
session_start();
$error=null;
$firstname=" ";
$password="";
$lastname="";
if(isset($_POST["submit"])){
	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$password=$_POST["password"];
	$firstname=data_checker($firstname);
	$lastname=data_checker($lastname);

	if(!check_length($firstname) || !check_length($lastname)){
		$error = "firstname is too long";
	}elseif(!check_alphabetic($firstname) || !check_alphabetic($lastname)){
	       $error = "you should write letters" ;
	}else{
		$query=mysqli_query($connection,"SELECT * FROM client_login WHERE firstname='$firstname' AND lastname='$lastname'");
		if(!$query || mysqli_num_rows($query) < 1){
			$error="the names are not found in the database ";
		}else{
			$info = mysqli_fetch_assoc($query);
			if(password_verify($password, $info['password'])){
				$_SESSION["userid"]=$info['id'];
				header("location:login.php");
			}else{
				$error = "wrong password";
			}

		}

	}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>the site</title>
  	<link rel="stylesheet" href="stylesheet.css">
	  <link rel="stylesheet" href="css/font-awesome.css">
	  <link rel="stylesheet" href="query.css">

		<script src="jfunction.js"></script>
		<script src="jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
</head>

<body>

<header id="page_header">
	<div class="logo"></div>
	<nav class="navigation">
		<ul>
			<li><a  id= "home" href="#d">Home</a></li>
			<li><a href="#" id="r">About Rheinwickl</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#form">Login</a></li>
			<li><a href="FLOWER.php"target="_blank">Admin</a></li>
		</ul>
	</nav>



	<div class="icon-bar">
	<nav class="f">
	<ul>
			<li><a  id= "home" href="#d">Home</a></li>
			<li><a href="#" id="r">About Rheinwickl</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#form">Login</a></li>
			<li><a href="FLOWER.php"target="_blank">Admin</a></li>
		</ul>
		</nav>
		<span class="icon"></span>


	</div>

</header>
		<div id="welcome_address">
				<h2>Online ordering built just for your restaurant.</h2>
				<p>Your brand. Your customers. Your online ordering system. </p>
				http://thenewcode.com/925/Web-Developer-Reading-List-Responsive-Design


			</div>

	<div class="text_content">
		<h1>Gozo-Hills Breakfast</h1>
		<hr>
		<div  id="c"   class="text_container">


			<p>We welcome you to Gozo Hills Bed and Breakfast in Xaghra. Gozo Hills is a new, nicely finished and cosy, typical Gozitan House of Character with a lovely outdoor pool and a sunny terrace in a tranquil part of Xaghra, which is one of the largest villages on Gozo. With just a 10 minutes walk from Gozo Hills you can find many recommendable Restaurants, Cafés and Bars at the main square of the village. Xaghra is thought to be the first inhabited village on the island due to the 5800 years old Ggantija Temples.Gozo, as well known as the ‘Island of Calypso’, is one of the five Maltese islands next to Malta -the main island-, Comino, Cominotto and Filfla, whereby the two latter islands are uninhabited.</p>

			<p>In Comino you can find the famous Blue Lagoon.Situated just off center of the island, from Gozo Hills you can start wonderful tours such as a visit at the Citadel in Victoria, the Azure Window in Dwejra or a visit to Ramla Bay which is the longest sandy beach in Gozo and is just a 5 minutes drive from Gozo Hills.</p>

		</div>
	</div>
<section class="section_3col">

      <h2> Your Experience  just began </h2>
      	<div class ="grid">
		<div class="image_holder col">
			<div class ="image_divider">
			<a href="#" class="link"><i class="fa fa-home" aria-hidden="true"></i></a>
			</div>
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren</p>
		</div>


		<div class="image_holder col">
			<div class ="image_divider">
			<a href="#"class="link"><i class="fa fa-home" aria-hidden="true"></i></a>
			</div>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren</p>
		</div>


		<div class="image_holder col">
			<div class ="image_divider">
			<a href="#"class="link"><i class="fa fa-home" aria-hidden="true"></i></a>
			</div>
      			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren</p>
		</div>
	</div>
<!-- https://gun.io/developers/jquery/bowie/-->
	</section>

	<div id="form" class="form_details">
		<h2 class="intro_text">LETS GET STARTED WITH </h2>
		<?php if(!empty($error)){ ?>
		<div class="error"><?php echo $error; ?></div>
		<?php } ?>
		<form  action="index.php#form" method="post" class="login_form">
			<input type ="text" name="firstname"placeholder="Firstname" autocomplete="off">
			<input type="text" name="lastname" placeholder="Lastname"autocomplete="off">
			<input type="password" name ="password" placeholder=
			"Password">
			<input type="submit" name="submit" value="Get Started">
		</form>

	</div>
		<div id="gallery" class="pics">
     	<h1>THE tranquility in the environment around </h1>
		</div>
			<div id="gallery" class="pics">
			</div>
				<div id="gallery"></div>
				<footer>
				</footer>


<script>



$(document).ready(function(){
  $(".navigation a[href='#form']").click(function(e){console.log(213);
  e.preventDefault();

    var t= $("#form").offset().top;
    $("html,body").animate({scrollTop:t},1500
      );
  });
  $(".icon-bar").click(function(){
	  $(".f").toggleClass("d");
	  
  });
  
});









</script>


</body>
</html>
