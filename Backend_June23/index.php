<?php 
$user = "Akash Soni";

//single line comment

/* multiple
line comment */

//variables and datatypes
$var_34234 = "Hello";
$_var = "world";
//$4545var = "";

$msg = $var_34234." ".$_var;
$x;
$x=45;        //int
$x="324234";  
$x="String";  //string
$x=34.34;     //float...real...double
$x=true;      //boolean
$x=array();   //ds

$x!=$X;


//input and output

//$_GET; $_POST; $_COOKIE; $_SESSION;


echo "output","this","variable";
$a = print("output"." this"." variable");   // if successful, $a=1


//data structures
$a = array("Akash","Soni",24,"Bengaluru",true,23.44);
$a = ["Akash","Soni",24,"Bengaluru",true,23.44];  //index value array
echo $a[4];

$b = ["FirstName"=>"Akash","LastName"=>"Soni","Age"=>24];   //key value pair array
echo $b['FirstName'];

//operations
$sum=$a+$b;             //arithmetic operators (+,-,*,/,%,++,--)
$a=10;                  //comparison operators (>,<,>=,<=,==,===,!=)
$b="10";
if($a==$b) {
    echo "True";
}
if($a===$b) { echo "false"; }

$age = $_GET[''];       //logical operators(&&,||,!)
$ll = true;
if(!isset($_SESSION['age'])) {
    echo "Age not received";
}
else if($age>=18 && $ll==true) {
    echo "Eligible for license";
}
else {
    echo "Not eligible";
}


$a = 10;                 //assignment operators(=,+=,-=,*=,/=,%=)
$a = $a+10;   $a+=10;   $a++;
$a = $a-10;   $a-=10;

echo ($a>$b) ? "a is greater" : "b is greater";      //ternary operator...conditional operator
echo ($a>$b) ?? "a is greater";



//control statements 

        //branching statements (if,if...else,if..elseif...else,switch()...case)
$age = 18;
if($age>=18) {
    echo "eligible to drive";
}
else if($age<=65) {
    echo "Still eligible to drive";
}
else if($age>16 && $age<18) {
    echo "eligible for learners' license";
}
else {
    echo "not eligible";
}


$grade = 'b';
switch($grade) {
    case 'a+':
        echo "Marks in the range of 95-100";
        break;
    case 'a':
        echo "Marks in the range of 85 to 95";
        break;
    case 'b+':
        echo "Marks in the range of 75 to 85";
        break;
    case 'b':
        echo "Marks in the range of 65 to 75";
        break;
    case 'c':
        echo "Marks in the range of 55 to 65";
        break;
    case 'd':
        echo "Marks in the range of 40 to 55";
        break;
    case 'f':
        echo "Marks under 40";
        break;
    default:
        echo "Invalid grade input";
}

        //iteration/looping statements (for() loop, while() loop, do...while() loop,foreach() loop)
$i=0;
while($i<=50) {
    echo ($i%2==0) ?? $i;
    $i++;
}

for($i=0;$i<=50;$i++) {
    echo ($i%2==0) ?? $i;
}

$i=10000;
do {
    echo ($i%2==0) ?? $i;
}
while($i<=50);

$array = ["Akash Soni",2323,true];
foreach($array as $value) {
    echo $value."<br>";
}


        //loop control (break,continue)
$i=0;
while($i<=5) {
    if($i==3) {
        break;
    }
    echo $i++;
}
//output - 012

$i=0;
while($i<=5) {
    if($i==3) {
        echo $i++;
        continue;
    }
    echo $i++;
}
//output - 01245

//functions
function calc($a,$b) {
    $sum = $a+$b;
    return $sum;
}

$sum = calc(20,30);
$sum = calc(2,3);


// superglobals
$GLOBALS;

$_SERVER;

$_REQUEST;

echo $_GET['search-key'];                      //$_GET;

echo $_POST['email'];                          //$_POST;
echo $_POST['pwd'];

setcookie("username","akash",time()+86400);    //$_COOKIE;


session_start();                               //$_SESSION;
$SESSION['username'] = "Akash Soni";

//form handling
if(isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

//database management
    $conn = mysqli_connect('localhost','db_user','db_pwd','sampledb');

    $sql_query = "SELECT count(*) AS usercount FROM users WHERE uname='$uname' AND passwd='$pwd';";
    $result = mysqli_query($conn,$sql_query);
    $rows = mysqli_fetch_array($result);
    if($row['usercount']==1) {
        echo "USer exists";
    }
    else {
        echo "Username and password did not match";
    }

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Development</title>
</head>
<body>
    <h1>Hello <?php echo $user ?></h1>

    <form action="" method="post">
        <div class="imgcontainer">
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pwd" required>

            <button type="submit" name='submit'>Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
     </form>
</body>
</html>