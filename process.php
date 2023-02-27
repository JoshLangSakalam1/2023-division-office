<?php
if (isset($_POST['lrn']) && isset($_POST['password'])){
    include 'connect.php'; // the command for connecting this to the given database 

    $lrn = $_POST['lrn']; // will get the lrn input from login
    $password = $_POST['password']; // will get the password input from login


    if($lrn != 000000000000 && $password != "galing gentri"){
        $queryP = "SELECT password FROM `registered_students` where lrn =$lrn";
        $P = mysqli_query($conn, $queryP);
        $thePassword = mysqli_fetch_array($P);

        if( $password == "$thePassword[0]"){

            $queryLN = "SELECT last_name FROM `registered_students` where lrn =$lrn"; // the command for getting the last name of the student with the given lrn;
            $queryFN = "SELECT first_Name FROM `registered_students` where lrn =$lrn"; // the command for getting the first name of the student with the given lrn;

        // converts the command into a query
        $LN = mysqli_query($conn, $queryLN);
        $FN = mysqli_query($conn, $queryFN);

        // converts the query into an array
        $LastName = mysqli_fetch_array($LN);
        $FirstName = mysqli_fetch_array($FN);

        // will check whether the data already exist
        $queryLRN = "SELECT lrn FROM `attendance` where lrn =$lrn"; // the command for getting the lrn of the student with the given lrn;
        $queryLNA = "SELECT last_name FROM `attendance` where lrn =$lrn"; // the command for getting the last name of the student with the given lrn;
        $queryFNA = "SELECT first_Name FROM `attendance` where lrn =$lrn"; // the command for getting the first name of the student with the given lrn;
        $queryLRND = "SELECT lrn FROM `attendance` where lrn =$lrn and date=current_date"; // the command for getting the lrn of the student with the given lrn and date;
 
        // converts the command into a query
        $lrnA = mysqli_query($conn, $queryLRN);
        $LNA = mysqli_query($conn, $queryLNA);
        $FNA = mysqli_query($conn, $queryFNA);
        $LRNAD = mysqli_query($conn, $queryLRND);
 
        // converts the query into an array
        $LearnerNum = mysqli_fetch_array($lrnA);
        $LastNameA = mysqli_fetch_array($LNA);
        $FirstNameA = mysqli_fetch_array($FNA);
        $LRND = mysqli_fetch_array($LRNAD);

        if(empty($lrn)){
            header("Location: Register.html");
        }else{
            if(!empty($LearnerNum[0]) && !empty($LastNameA[0]) && !empty($FirstNameA[0])){
                $sql = "update attendance set departure_time=current_time where lrn=$lrn";
            }else{
                $sql = "insert into attendance (lrn, last_name, first_name, date, arrival_time, departure_time) values($lrn, '$LastName[0]',  '$FirstName[0]', current_date, current_time, null)";
            }
        
            $res = mysqli_query($conn, $sql);
        
            if($res){
                if(($LRND[0]) == null){
                    header("Location: Time_in.html");
                }else header("Location: Time_out.html");;

                
            }else{
                echo "data was not sent";
            }
        }
        }else{
            header("Location: incorrectpassword.html");
        }
    }else{
        header("Location: showTable.php");
    }
}
?> 