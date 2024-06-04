
<html>
   <head>
    <title> Home Page</title>
 
  <link rel = "stylesheet" type = "text/css" href = "style.css">
        <link rel = "stylesheet" type = "text/css"
        href ="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" > 

        <h3> <?php
        session_start();


$con = mysqli_connect('localhost','root','sdfproject@pss');
 
mysqli_select_db($con, 'signup');

$name = $_POST['name'];

$pass = $_POST['password'];

$s = " select * from usertable where name = '$name'" ;

$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);



if($num==1){
  // $text = 'UserName Already Taken';
   echo  'UserName Already Taken';
 //  echo '<h2 >' . $text . '</h2>';

 //      header('location:successsignup.php');
} else{
    $reg = "insert into usertable(name , password) values ('$name','$pass')";
    mysqli_query($con, $reg);
    echo "Registration Successful";
 //   header('location:successsignup.php');
} ?> </h3>

   </head>
   <body>

   <div class ="container">
    <a class="float-left"  href ="back.php"> BACK </a>
</div>
   </body>
</html>