
<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SPORTS ACADEMY</title>
  <link rel="stylesheet" type="text/css" href="/sportacademy/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  

</head>
<body style= "background-color:white; margin:0px; padding:0px">
  <div id="color">
  <header>
    <span class="glyphicon glyphicon-envelope"></span>
    <a href="mailto:vijaymishravm99@gmail.com" style="text-align:right color:white ;text-decoration: none; color:white" >vijaymishravm99@gmail.com</a>&nbsp;&nbsp;
    &#9743;<a href="Mobile:555-555-1212" style="text-align:right; text-decoration: none;color:white">8009031061</a>
  
  </header>
    
    <div id="b">
    <nav id="nav">
      <ul id="navigation">
              <li><a href="index.html" class="first">Home</a></li>
              <li><a href="who.html">Who We Are</a></li>
              <li><a href="#">Sports</a>
                <ul>
                    <li><a href="cricket.html" target="_self">Cricket</a></li>
                    <li><a href="football.html" >Football</a></li>
                    <li><a href="badminton.html">Badminton</a></li>
                    <li><a href="hockey.html">Hockey</a></li>
                </ul>
              </li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="tournament.html">Tourment</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              
        
            </ul></li>
    </nav>
    </div>
    <br><br><br>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cricket</title>
	<style>
		table,td{
			padding:10px;
			margin-top: 10px;
			
		}
		table{
			border-spacing:10px;
			border:solid black;
			float:center;


		}
	</style>
	
</head>
<body>
<?php
 $x="";
 //session_start();
  //if(!$_SESSION['user1'])
  //header("location:admin.php");
   $conn=new mysqli("localhost","root","atul5314","project");
   if(!$conn){
   	die("connection failed");
   }
   else{
   	$S_Id=$_REQUEST['sid'];
   	$_SESSION['user'] = $S_Id;
  }
  

  if($_SERVER["REQUEST_METHOD"]=="POST"){

     $S_Id=$_POST['S_Id'];


        $sql2 = "select * from Cricket where S_Id = '$S_Id'";
      
          $result1 = mysqli_query($conn, $sql2);
          if(mysqli_num_rows($result1))
          {
            while($row = mysqli_fetch_assoc($result1))
            {   
              $hundred = $row['Hundreds'];
              $fifty = $row['Fiftys'];
              $wicket = $row['Wickets'];
              $catch = $row['Catches'];
              $score = $row['Best_score'];
            }
          
          }

   	 $G_Id=$_POST['gid'];
   	 $Hundred=$_POST['hundred'];
   	 $Fifty=$_POST['fifty'];
   	 $Wicket=$_POST['wicket'];
   	 $Catch=$_POST['catch'];
   	 $Maxscore=$_POST['maxscore'];

     if($score > $Maxscore)
      $Maxscore = $score;

   	 $query = "UPDATE Cricket SET Hundreds = $Hundred + $hundred,Fiftys = $Fifty + $fifty,Wickets = $wicket + $Wicket,Catches = $catch + $Catch,Best_score = $Maxscore where S_Id = '$S_Id'";
     //echo $query;
   	 $res=$conn->query($query);
   	 if(!$res){
   	 	$x="Not inserted";
   	 }
   	 else
   	 	$x="inserted";
   }

?>



    <center>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" encrypt="multipart/form-data">
	<table><h3>Cricket Data</h3>
	    <tr><td>Student Id:</td><td><input type="text" name="S_Id" value="<?php echo $_REQUEST['sid']; ?>" readonly></td></tr>
		<tr>
                    <td>gid:</td>  
                        <td><select name="gid" >
                            <option value="1">Cricket</option>
                            

                        </select> 
      </td></tr>
		<tr><td>wicket:</td><td><input type="text" name="wicket" placeholder ="wicket"></td></tr>
		<tr><td>fifty:</td><td><input type="text" name="fifty" placeholder ="fifty"></td></tr>
		<tr><td>hundred:</td><td><input type="text" name="hundred" placeholder ="hundred"></td></tr>
		<tr><td>Catch:</td><td><input type="text" name="catch" placeholder ="Total catches"></td></tr>
		<tr><td>maxscore:</td><td><input type="text" name="maxscore" placeholder ="maxscore"></td></tr>
		<tr><td></td><td><input type="submit" name="submit" value="submit"></td></tr>

		<br><br><center><?php echo $x; ?></center>
	</table>
    </form>
	</center>

</body>
</html>