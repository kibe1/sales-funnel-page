<!DOCTYPE html>
<html lang="">

<head>
    <title>Insert Page page</title>
</head>

<body>
<center>

<?php

// servername => localhost
// username => root
// password => empty
// database name => stacey
$conn = mysqli_connect("localhost", "root", "", "stacey");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

// Taking all values from the form data(input)
$name =  $_REQUEST['name'];
$email = $_REQUEST['email'];

// Performing insert query execution
// here our table name is subscribers
$sql = "INSERT INTO subscribers  VALUES ('NULL', '$name','$email')";

if(mysqli_query($conn, $sql)){
    echo "Data Stored";
}

else

{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
</center>
</body>

</html