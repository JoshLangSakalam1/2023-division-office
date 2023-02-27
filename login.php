<?php
include 'connect.php';
$query = "SELECT lrn FROM `registered_students` order by lrn asc";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in page</title>
    <style>
        body{
            background-image: url("Raw background.jpg");
		    background-position: center; 
		    background-size: 100% 100%; 
		    background-repeat: no-repeat;
		    font-family: arial;
			border-radius: 10px;
        }

        .header-container{
            background: #2B7A0B;
		    width: 100%;
			height: auto;
			padding-top: 10px;
			padding-bottom: 10px;
			border-radius: 20px;
            text-align: center;
		}

        .form-container{
            background: #F5F5F5;
		    margin: 130px auto; 
            width:500px;
			height: auto;
			color: black;
            padding-top: 50px;
            padding-bottom: 50px;
			text-align: center;
            border-radius: 75px;
			font-size:200%;
        }
        
        input{
            font-size: 25px;
        }

        select{
            height: 35px;
            width: 200px;
            text-align: center;
        }

        h1{
            color: white;
        }

        .footer-container{
            background: #2B7A0B;
		    width: 100%;
			height: auto;
            padding-top: 35px;
            padding-bottom: 35px;
			border-radius: 20px;
            text-align: center;
		}

        a:link{
			color: blue;
  			background-color: transparent;
			text-decoration: none;
		}
		a:visited{
			color: blue;
			background-color: transparent;
			text-decoration: none;
		}
		a:hover{
			color: white;
			background-color: transparent;
			text-decoration: underline;
		}
    </style>
</head>
<body>
<div class="header-container">
    <header>
        <h1><img src ="DepEd Gentri Logo.png" width="10%" height="20%"></h1>
			<h1 style="color: white">Record of Attendance</h1>
    </header>
    </div>
    
    <div class="form-container">
    <form action="process.php" method="post">
    <label for = "lrn">LRN: </label>
        <select id = "lrn" name="lrn">
        <?php while($row = mysqli_fetch_array($result)):; ?>
            <option><?php echo $row[0];?></option>
        <?php endwhile;?>
        </select><br>
    
        <label for="password">Password: </label>
        <input  type="password" id="password" name="password" minlength="1" maxlength="100" style="text-align: center"/><br><br>

    <input type="submit" value="Time In / Time Out" style="background-color: #E8E2E2; border-radius:10px; color: black">
    </form>
    </div>

    <div class="footer-container">
        <footer>
            <h1>Not registered? <a href="Register.html" title="Directs you to the registration page">Register</a></h1>
        </footer>
    </div>
</body>
</html>