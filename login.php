<?php
$servername="localhost";
$username="root";
$password="";
$dbname="rohit";

$check=mysqli_connect($servername,$username,$password,$dbname);
if($check){

    echo"Please Try Again";
}
else{
    echo "Coonection failed";
}
$email=$_POST['email'];
$pass=$_POST['pass'];
$data="SELECT * FROM niwangune WHERE email='$email' && pass='$pass'";
$execute=mysqli_query($check,$data);
$count=mysqli_num_rows($execute);

if($count>=1){
    header('location:m.html');
    //echo "you can go";
}
else{
    header('location:loginfailed.html');
}
?>