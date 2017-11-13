<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>

<span class="img primary fit">
  
  <img class="mySlides w3-animate-fading" src="images1\brown rice.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images1\salat.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images1\ragijava.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images1\salatroll.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images1\Ragi-dosa.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images1\mixture.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="images1\diet plan_monthly.jpg" style="width:100%">
  </span>


<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 9000);    
}
</script>

<div class="container">
  <div class="jumbotron">
    <h2>TODAYS MENU</h2> 
   
  </div>
  </div>
  <br><br>
<img src="images/05.jpg" height="500px"; width="1344px";><br><br><br>

<div class="container">
<?php
$ser="localhost";
$user="root";
$pass="";
$db="food";
$conn=mysqli_connect($ser,$user,$pass,$db);
if(isset($_POST['submit'])){
$item=$_POST['item'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$address=$_POST['address'];	
$query="INSERT INTO orders(item,name,phone,address) VALUES('$item','$name','$phone','$address')";
mysqli_query($conn,$query);

}
mysqli_close($conn);
?>
<form method="POST" action="thankyou.html">
  <div class="form-group row">
  <div class="col-xs-3">
    <label for="ex1">ITEM</label>
    <input class="form-control" name="item" id="ex1" type="text" required>
  </div>
  <div class="col-xs-3">
    <label for="ex2">NAME</label>
    <input class="form-control" name="name" id="ex2" type="text" required>
  </div>
  <div class="col-xs-3">
    <label for="ex3">PHONE</label>
    <input class="form-control" name="phone" id="ex3" type="text" pattern="^\d{4}\d{3}\d{3}$">
  </div>
  
  <div class="col-xs-6"><br>
    <div class="form-group">
  <label for="comment">Address:</label>
  <textarea class="form-control" name="address" rows="5" id="comment" required></textarea>
</div>
 <button type="submit" name="submit" class="btn btn-primary btn-sm" >Submit</button>
  </div>
 
</div>
</form>
</div>
<br><br><br><br>
</body>
</html>