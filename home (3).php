
<?php
		include 'config/database.php';
		 ?>



<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>SCP FOUNDATION</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">


		<!-- Header -->
			<header id="header">
				<a class="logo" href="home.php">SCP</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
				
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="home.php">Home</a></li>
					<?php
                         foreach($record as $menu):

                    ?>
                 <li>
                 	<a class="nav-link" href="home.php?item='<?php echo $menu['item'];?>'"><?php echo $menu['item'];?></a>
                       </li>
              <?php endforeach;?>
					
					<li><a href="create.php">Enter a New SCP data</a></li>
				</ul>
		</nav>
					<?php
					if(isset($_GET['item']))
					{
					  $scp=trim($_GET['item'],"'");
					$item="select * from scp where item='$scp'";
					$subject=$conn->prepare($item);
					$subject->execute();
					$display=$subject->fetch(PDO::FETCH_ASSOC);

					$id=$display['id'];
					echo "
					
		<!-- Heading -->
			<div id='heading' >
				<h1>Scp foundation</h1>
				
				

			</div>
			
			
		<!-- Main -->
			<section id='main' class='wrapper'>
				<div class='inner'>
					<div class='content'>
						<header>
							<h2><b>Item:</b>{$display['item']}<br> <b>Object class:</b>{$display['class']}</h2>
						</header>
						<h3><b>Procedure</b></h3>
						<p>{$display['containment']}. </p>
						<p><img class='img-fluid' src='{$display["images"]}' style='width:75%;height:auto;box-shadow:3px,3px,3px;margin-left:auto;margin-right:auto; display:block;'></p><hr>

                       <h3><b>Description</b></h3>
						<p>{$display['description']}</p>
						<hr />

						
	                    
						<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
				<a href='update.php?id={$id}' class='button'>Update scp record</a>
				<a href='#' onclick='delete_record({$id})' class='button'>Delete</a>
									</div>
				</div>
			</section>
			";
		}
		else
		{
           echo "
           	<section>
							
							<h1 style='text-align:center;font-weight:bold;'>Scp-Foundation</h1>
							

						</section>
						";
		}
					?>
			<?php
			        
			        $delete=isset($_GET['action']) ? $_GET['action'] :"";

			        //if directed from delete.php
			        if($delete =='deleted')
			        {
			            echo "<div clas='alert alert-success'>Record deleted successfully</div>";
			        }
			 
			 
			 ?>
			 <script>
			function delete_record(id)
			{
			    var answer=confirm('Click ok to delete this record');
			    if(answer)
			    {
			      window.location='delete.php?id=' + id;
			    }
			}

			 </script>
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
<img src="images/emb.jpg" alt="Scp" class="w3-image" width="500" height="500">

							
						</section>
						
						<section>
							<h4>co-Active memebers</h4>
							<ul class="plain">
								
								<li><a href="#"><i class="icon fa-c-panel">&nbsp;</i>c-panel</a></li>
								<li><a href="#"><i class="icon fa-GitHub">&nbsp;</i>GitHub</a></li>
								<li><a href="#"><i class="icon fa-Visual studio">&nbsp;</i>Visual Studio</a></li>
							</ul>
						</section>
					</div>
					<div class="Copyright © 2020 | Fintu Raju@30017369, All Rights Reserved">
						&copy;Copyright © 2020 | Fintu Raju@30017369,  <a href="All Rights Reserved">">All Rights Reserved</a>, 
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>