<?php require_once('Connections/architecture.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_architecture, $architecture);
$query_Recordset1 = "SELECT * FROM projects";
$Recordset1 = mysql_query($query_Recordset1, $architecture) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ORIGINS</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="background-lightyellow">

	</div>
	<div class="page">
		<div class="project-page">
			<div class="sidebar">
				<a href="index.php" id="logo"><img src="images/logo3.png" width="87" alt="logo"></a>
				<ul>
					<li class="home">
						<a href="index.php">Home</a>
					</li>
					<li class="about">
						<a href="about.php">About</a>
					</li>
					<li class="selected projects">
						<a href="projects.php">Projects</a>
					</li>
					<li class="blog">
						<a href="blog.php">Blog</a>
					</li>
					<li class="contact">
						<a href="contact.php">Contact</a>
					</li>
				</ul>
				<div class="connect">
					<a href="http://www.facebook.com/" id="fb">facebook</a> <a href="http://www.twitter.com/" id="twitter">twitter</a> <a href="http://plus.google.com/" id="googleplus">google+</a> <a href="http://www.youtube.com/" id="youtube">youtube</a>
				</div>
			</div>
			<div class="body">
				<div class="content-project">
					<div>
						<h3>Projects</h3>
					</div>
					<div class="navigation">
						<span>View:</span>
						<ul>
							<li>
								<a href="#">Houses</a>
							</li>
							<li>
								<a href="#">Educational & Sports</a>
							</li>
							<li>
								<a href="#">Apartments</a>
							</li>
							<li>
								<a href="#">Restaurants & Bars</a>
							</li>
							<li>
								<a href="#">Hotels</a>
							</li>
							<li>
								<a href="#">Office Buildings</a>
							</li>
						</ul>
					</div>
					<div>
						<ul>
							<li>
								<a href="houses.php"><img src="images/A.B. House1.jpg" width="368" height="244" alt=""></a> <span><a href="houses.php">A.B. House/Andreescu & Gaivoronschi Architects</a></span>
							</li>
							<li>
								<a href="#"><img src="images/School of Music and Arts1.jpg" width="368" height="244" alt=""></a> <span><a href="#">School of Music and Arts/LTFB Studio </a></span>
							</li>
							<li>
								<a href="#"><img src="images/Hotel Atra Doftana1.jpg" width="368" height="244" alt=""></a> <span><a href="#">Hotel Atra Doftana/TECON Architects</a></span>
							</li>
							<li>
								<a href="#"><img src="images/Renovation of Rahova Commodities Exchange1.jpg" width="368" height="244" alt=""></a> <span><a href="#">Renovation of Rahova Commodities Exchange</a></span>
							</li>
							<li>
								<a href="#"><img src="images/MORA Residential Building1.jpg" width="368" height="244" alt=""></a> <span><a href="#">MORA Residential Building/ADN Architecture Office</a></span>
							</li>
							<li>
								<a href="#"><img src="images/Studio Hermes1.jpg" width="368" height="244" alt=""></a> <span><a href="#">Studio Hermes/Corvin Cristian</a></span>
							</li>
						</ul>
						<div class="paging">
							<ul>
								<li class="selected">
									<a href="#">1</a>
								</li>
								<li>
									<a href="#">2</a>
								</li>
								<li>
									<a href="#">></a>
								</li>
							</ul>
							<span>Page 1 of 2</span>
						</div>
					</div>
				</div>
				<div class="footer">
					<p>
						<b>&#169; 2016 Alexandra Gavrila</b>
					</p>
					<b><ul>
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="about.php">About</a>
						</li>
						<li>
							<a href="projects.php">Projects</a>
						</li>
						<li>
							<a href="blog.php">Blog</a>
						</li>
						<li>
							<a href="contact.php">Contact</a>
						</li>
					</ul></b>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
