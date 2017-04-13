<?php
session_start();
if(isset($_SESSION['is_login'])) {	

	include "functions.php";
	include "db.php";

	$query = mysql_query("SELECT * FROM contact");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Manage</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- main-container start -->
      <!-- ================ -->
      <section class="main-container">

        <div class="container">
          <div class="row">
          	<h1>Contact us Management</h1>
          	<table class="table table-bordered">
          		<tr><th>Name</th><th>Email</th><th>Subject</th><th>Edit</th></tr>
          	<?php
          	if(mysql_num_rows($query) > 0) {
          		while($row = mysql_fetch_array($query)) {
          			?>
          		<tr>
          			<td><?=$row['name']?></td>
          			<td><?=$row['email']?></td>
          			<td><?=$row['subject']?></td>    
          			<td><?=$row['message']?></td>          			
          		</tr>
          			<?php
          		}	
          	}
          	?>            
          	</table>
          </div>

          <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
      </section>
      <!-- main-container end -->




    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


<?php
} else {
	header("Location: login.php");
}
?>