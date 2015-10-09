<?php 

mysql_connect("localhost","root") or die ("No connection");
mysql_select_db("sampleDB") or die ("No Database");
?>
////////Registrtion Form
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
include("db.php");
if(isset($_POST['submit'])){ 
 
     
	
    $username = mysql_real_escape_string($_POST['username']); 
    $password = md5(mysql_real_escape_string($_POST['password'])); 

    $sql = mysql_query("SELECT * FROM register_tbl WHERE username='$username' AND password='$password'
        LIMIT 1");
		
    if(mysql_num_rows($sql) == 1){ 
        $row = mysql_fetch_array($sql); 
       
 echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Login Succesful.')
        window.location.href='registration.php'
        </SCRIPT>");
        exit; 
    }else{ 
         echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Wrong email/password combination.Please re-enter.')
        window.location.href='login.php'
        </SCRIPT>");
        exit; 
    } 
}
}
?>
////////
<script>
var key = "SXGWLZPDOKFIVUHJYTQBNMACERxswgzldpkoifuvjhtybqmncare";
// matches ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ


function encodeStr(password) {
  password = password.toUpperCase().replace(/^\s+|\s+$/g,"");
  var coded = "";
  var chr;
  for (var i = password.length - 1; i >= 0; i--) {
    chr = password.charCodeAt(i);
    coded += (chr >= 65 && chr <= 90) ? 
      key.charAt(chr - 65 + 26*Math.floor(Math.random()*2)) :
      String.fromCharCode(chr); 
    }
  return encodeURIComponent(coded);  
  }
function decodeStr($coded) {
  $key = "SXGWLZPDOKFIVUHJYTQBNMACERxswgzldpkoifuvjhtybqmncare"; 
  $password = "";
  $chr;
  for ($i = strlen($coded) - 1; $i >= 0; $i--) {
    $chr = $coded{$i};
    $password .= ($chr >= "a" and $chr <= "z" or $chr >= "A" and $chr <= "Z") ?
      chr(65 + strpos($key, $chr) % 26) :
      $chr; 
    }
  return $password;   
  }
  </script>

                        <?php
if(isset($_GET['save'])){


$username=$_GET['username']; 
$password=$_GET['password'];
$password=md5($password); // Encrypted Password

include("db.php");
$check1="select * from register_tbl where username='$username'";
$res=mysql_query($check1);
$bilang=mysql_num_rows($res);
if($bilang==0){
$insert="INSERT INTO register_tbl values('$username','$password')";
mysql_query($insert);
print "<script language=javascript>
  alert('Thank You . You have successfully created your account.')
  window.location='registration.php';
  </script>";
}
else
print "<script language=javascript>
  alert('$a already exists')
  window.location='register.php';
  </script>";
}
?>
<form action="registration.php" method="GET">
<label>UserName :</label>
<input type="text" name="username"/><br />


<label>Password :</label>
<input type="password" name="password"/><br/>
<input type="submit" name="save" value=" Registration "/><br />
</form>
