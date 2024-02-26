<!DOCTYPE html>
<head>
        <title>Admin Table</title>
        <link rel="stylesheet" href ="header.css">
</head>
<body>
<?php
session_start();
if($_SESSION['superadmin']==1){
    include('dbconnect.php');
    include('header.php');

    $queryad = 'SELECT * FROM admin WHERE superadmin="0"';
    $result = mysqli_query($conn, $queryad);
    if(mysqli_num_rows($result) == 0){
        echo"<p>No admins found</p>";
    }
    else{
        echo'<table class = "admin">
            <tr>
                <td>AID</td><td>Name</td><td>Email</td><td>Phone</td><td>Remove</td></tr>';
        while ($row = mysqli_fetch_assoc($result)){
            $aid = $row['aid'];
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            echo'<tr><td>'.$aid.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$phone.'</td><td>
            <form method = "POST" action = "">
                <button type="submit" name ="delete" value="'.$aid.'">DELETE</button>
            </form>
            </td></tr>';
        }
        if(isset($_POST['delete'])){
            $rowid = $_POST['delete'];
            echo"$rowid";
            $querydel = "DELETE FROM admin WHERE aid= $rowid";
            $result = mysqli_query($conn,$querydel);
        
        }
    }

}
else{
    header('Location: profile.php');
}

?>
</body>
</html>