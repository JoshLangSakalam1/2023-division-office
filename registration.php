<?php
    if (isset($_POST['lrn']) && isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['password'])){
    include 'connect.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $lrn = validate($_POST['lrn']);
    $lastName = validate($_POST['lastName']);
    $firstName = validate($_POST['firstName']);
    $password = validate($_POST['password']);
    
    // will check whether the data already exist
    $queryLRN = "SELECT lrn FROM `registered_students` where lrn =$lrn"; // the command for getting the lrn of the student with the given lrn;

     // converts the command into a query
    $lrnA = mysqli_query($conn, $queryLRN); 

    // converts the query into an array
    $LearnerNum = mysqli_fetch_array($lrnA);


    if(empty($lrn) || empty($lastName) || empty($firstName) || empty($password)){
        header("Location: fillout.html");
    }else{
        if($lrn == $LearnerNum[0]){
            header("Location: dataexist.html");
        }else{
            $sql = "insert into registered_students (lrn, last_name, first_name, password) values($lrn, '$lastName', '$firstName', '$password')";
            $res = mysqli_query($conn, $sql);

            if($res){
                header("Location: RegisterComplete.html");
            }else{
                echo "data was not sent";
            }
        }
    }
}else{
    header("Location: fillout.html");
 }