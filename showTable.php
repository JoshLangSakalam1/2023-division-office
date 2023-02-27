<?php
    include 'connect.php';
    $query = "SELECT * FROM `attendance`";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="black">
        <tr><th colspan="12">Attendance</th></tr>
        <tr>
        <?php while($col = mysqli_fetch_array($result)):; ?>
            <td><?php echo $col[0];?><td>
            <td><?php echo $col[1];?><td>
            <td><?php echo $col[2];?><td>
            <td><?php echo $col[3];?><td>
            <td><?php echo $col[4];?><td>
            <td><?php echo $col[5];?><td>
        </tr>
        <?php endwhile;?>
    </table>
    
</body>
</html>