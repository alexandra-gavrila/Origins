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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO customers (Subject, Name, Email, Country, Company, Website, Message) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Subject'], "text"),
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Country'], "text"),
                       GetSQLValueString($_POST['Company'], "text"),
                       GetSQLValueString($_POST['Website'], "text"),
                       GetSQLValueString($_POST['Message'], "text"));

  mysql_select_db($database_architecture, $architecture);
  $Result1 = mysql_query($insertSQL, $architecture) or die(mysql_error());
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ORIGINS</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="background-green2">

	</div>
	<div class="page">
		<div class="contact-page">
			<div class="sidebar">
				<a href="index.php" id="logo"><img src="images/logo3.png" width="87" alt="logo"></a>
				<ul>
					<li class="home">
						<a href="index.php">Home</a>
					</li>
					<li class="about">
						<a href="about.php">About</a>
					</li>
					<li class="projects">
						<a href="projects.php">Projects</a>
					</li>
					<li class="blog">
						<a href="blog.php">Blog</a>
					</li>
					<li class="selected contact">
						<a href="contact.php">Contact</a>
					</li>
				</ul>
				<div class="connect">
					<a href="http://www.facebook.com/" id="fb">facebook</a> <a href="http://www.twitter.com/" id="twitter">twitter</a> <a href="http://plus.google.com/" id="googleplus">google+</a> <a href="http://www.youtube.com/" id="youtube">youtube</a>
				</div>
			</div>
			<div class="body">
				<div class="content-contact">
					<div>
						<div>
							<h3>Contact</h3>
							<p>
							We reach more than 7 million readers every month. With channels in English, Spanish and Portuguese, and more than 60 new projects published daily, no other architecture network has the global scope we have. Our editorial team works with thousands of practices in the five continents to deliver the best architecture around the world, as soon as possible.<br><br>
							So, feedback is critical for us. If you want to submit that great project you just completed, share a great story with our readers, report an error, give us a tip, please contact using this form.<br><br>
							* When submitting your project we recommend including a Dropbox or Google Drive link with at least 6 images (interior + exterior). This makes the review process much more efficient and allows us to get back to you as soon as possible.
							</p>
							<p>
								*Text by www.archdaily.com 
							</p>
			
			<table width="90%">
			<form id="form" name="form" method="POST" action="<?php echo $editFormAction; ?>">
	<tr>
		<td >Do you want to</td>
		<td ><select name="Subject" id="Subject">
							<option value="Choose one ..." selected="selected">Choose one ...</option>
			<option value="Submit a project (built)">Submit a project (built)</option>
			<option value="Submit a project (unbuilt)">Submit a project (unbuilt)</option>
			<option value="Submit an event">Submit an event</option>
			<option value="Submit a competition, call for submission or award opportunity">Submit a competition, call for submission or award opportunity</option>
			<option value="Submit news, articles, etc">Submit news, articles, etc</option>
			<option value="Send corrections">Send corrections</option>
			<option value="Send compliments or feedback">Send compliments or feedback</option>
			<option value="Other inquiries">Other inquiries</option>
		</select></td>
	</tr>
	<tr>
			<td>*Name</td>
			<td><span id="sprytextfield1">
								<input name="Name" type="text" id="Name"/>
			<span class="textfieldRequiredMsg"></span></span></td>
	</tr>
	<tr>
			<td>*Email</td>
			<td><span id="sprytextfield2">
								<input name="Email" type="text" id="Email" />
								<span class="textfieldRequiredMsg"></span></span></td>
	</tr>
	<tr>
	<td>*Country</td>
	<td><select name="Country" id="Country">
			<option value="Choose one ..." selected="selected">Choose one ...</option>
			<option value="Italy">Italy</option>
			<option value="France">France</option>
			<option value="Romania">Romania</option>
			<option value="United Kingdom">United Kingdom</option>
			<option value="United States">United States</option>
	</select></td>
	</tr>
	<tr>
			<td>Company</td>
			<td><input name="Company" type="text" id="Company"/></td>
	</tr>
	<tr>
			<td>Website</td>
			<td><input name="Website" type="text" id="Website" /></td>
	</tr>
	<tr>
			<td>*Message </td>
			<td><span id="sprytextfield3">
				<textarea name="Message" cols="51" rows="5" id="Message"></textarea>
				<span class="textfieldRequiredMsg"></span></span></td>
	</tr>
    <tr>
		  <td><input class="submit" type="submit" name="Submit" id="Submit" value="Send Message"/></td>
    </tr>
    <input type="hidden" name="MM_insert" value="form">
			</form>
			</table>
			

			
						</div>
						<div class="sidebar">
							<h3>Contact Info</h3>
							
							<p><strong>Opening Times</strong><br />Mon | Wed | Fri<br />9.00 a.m. - 5.00 p.m.</p>
							<p>Tue | Thu<br />9.00 a.m. - 9.00 p.m.</p>
							<p><strong>Contact Details</strong><br />
							<p>Phone: 0800 0420 184 <br> Email: <a href="mailto:hello@elatt.org.uk">hello@elatt.org.uk</a></p>
							<p><strong>Drop in</strong><br />260-264 Kingsland Road,<br /> London, E8 4DG</p>
							<p><strong>Rail</strong><br />Haggerston Overground</p>
							<p><strong>Tube</strong><br />Liverpool Street | Old Street</p>
							<p><strong>Buses Routes</strong><br />67 | 149 | 242 (from Dalston)<br />149 | 242 (from Liverpool Street)<br />243 (from Old Street)</p>
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4963.358568902384!2d-0.076567!3d51.537442!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761c95d85b4e69%3A0xcbd2340fe374a3a2!2s260-264+Kingsland+Rd%2C+London+E8+4DG%2C+UK!5e0!3m2!1sen!2sro!4v1480086036091" width="250" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
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