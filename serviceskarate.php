<?php
require 'cart/check_if_added.php';
require 'include/connection.php';  
require 'include/function.php';  
include 'include/header.php';
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/main.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/servicekarate.css">
</head>
<body>
<div class="content">
<h1>Services</h1>
<table class="table">
<tr>
<td>
<div class="slideshow-container">
  <h2>Dance Studio</h2>
  <div class="mySlides1">
    <div class="numbertext">1 / 3</div>
    <div class="container2">
      <div class="container3">
    <div class="container1">
    </div>
  </div>
</div>
</div>

<div class="mySlides1">
  <div class="numbertext">2 / 3</div>
    <img src="https://scontent.fcrk1-4.fna.fbcdn.net/v/t1.15752-9/335924580_566975892070442_8266320852129467682_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeEqszvXsprbL4J8863nI1-8QC3IFRKgurFALcgVEqC6sfKRlX0z-qhbflVW261dyS2U9YBkd6kYe0OZJXVpYmVL&_nc_ohc=PV451Z81xAYAX8j9BCZ&_nc_ht=scontent.fcrk1-4.fna&oh=03_AdSks3wx2WmoB-LDUW5afV93JNkOI2U0oj0cbNFIIouv9w&oe=64375FA9">
  </div>

<div class="mySlides1">
  <div class="numbertext">3 / 3</div>
    <img src="https://scontent.fcrk1-5.fna.fbcdn.net/v/t1.15752-9/335748642_1576684129464218_1518319555770845663_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeGzeb6QvkxPXui3zzINiM_PM3hHfkzTfjYzeEd-TNN-NkheXhe9MjcVXuKl_zCi_iCnq49Jvjuj1whyoW-wMhoT&_nc_ohc=iZTZXpPnsLAAX-lc6wP&_nc_ht=scontent.fcrk1-5.fna&oh=03_AdSlbeXQ18TGyIevjF2SXqIUUG9bUHYVKaA0jl-NX84ZXw&oe=6437401E">
  </div>

  <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
  <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
</div>
</td>
<td>
<div class="container7">
    <h1>Dance Studio</h1>
    <h4>Looking to rent a dance studio for a day?
        <br>You don't have to be a dancer yourself to appreciate a dance studio hardwood floors. In fact, studios can use other kind of activities, including yoga class, zumba, dance class, and more.</h4>
        <h4>•Air conditioning
        <br>•Hot and Cold shower
        <br>•Gym</h4>
        <h4>Open time(7am - 10pm)
        <br>Rent (100 per head for 2 hours)
        <br>Location (32 Dr. Alejos St. Cor. A Bonifacio Brgy. Paang Bundok Quezon City)</h4>
</div>
</td>
</tr>
</table>

<hr class="hr2">

<table class="table2">
<tr>
  <td>
    <div class="container7">
        <h1>Gym</h1>
        <h4>Monday-Sunday
        <br>Time: 7am-10pm
        <br>session: 150
        <br>monthly: 1500
        <br>Address: 32 Dr. Alejos St. Cor. A Bonifacio Brgy. Paang Bundok Quezon City</h4>
    </div>
    </td>

<td>
<div class="slideshow-container">
  <h2>Gym</h2>
  <div class="mySlides2">
    <div class="numbertext">1 / 3</div>
    <div class="container2">
    <div class="container3">
    <div class="container1">
    </div>
  </div>
</div>
</div>

  <div class="mySlides2">
    <div class="numbertext">2 / 3</div>
    <img src="/Ecommerce/Picture/gym1.jpg">
  </div>

  <div class="mySlides2">
    <div class="numbertext">3 / 3</div>
    <img src="/Ecommerce/Picture/gym2.jpg">
  </div>

  <a class="prev" onclick="plusSlides(-1, 1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1, 1)">&#10095;</a>
</div>
</td>
</tr>
</table>

<hr class="hr2">

<table class="table3">
<tr>
<td>
<div class="slideshow-container">
  <h2>Karate</h2>

  <div class="mySlides3">
    <div class="numbertext">1 / 3</div>
    <div class="container2">
      <div class="container3">
    <div class="container1">
    </div>
  </div>
</div>
</div>

  <div class="mySlides3">
    <div class="numbertext">2 / 3</div>
    <img src="/Ecommerce/Picture/karate1.jpg">
  </div>

  <div class="mySlides3">
    <div class="numbertext">3 / 3</div>
    <img src="/Ecommerce/Picture/karate2.jpg">
  </div>

  <a class="prev" onclick="plusSlides(-1, 2)">&#10094;</a>
  <a class="next" onclick="plusSlides(1, 2)">&#10095;</a>
</div>
</td>

<td>
<div class="container7">
    <h1>Karate</h1>
    <h4>KYOKUSHIN KARATE CLASS ‼️
    <br>RESERVE YOUR SLOT NOW ‼️
    <br>Sensie Bryan Dizon
    <br>(09167882745)
    <br>300 / Session
    <br>Operating Hours
    <br>Every Sunday (⏱Time: 10am - 12pm)
    <br>You may visit us (📍32 Dr. Alejos St. Cor. A Bonifacio Ave Brgy. Paang Bundok Quezon City) 
    <br>🗾Waze : Dr Alejos & A Bonifavio Ave</h4>
</div>
</td>
</tr>
</table>
</div>
<?php
include 'include/footer.php';
?>
<script>
let slideIndex = [1,1,1,];
let slideId = ["mySlides1", "mySlides2", "mySlides3",];
showSlides(1, 0);
showSlides(1, 1);
showSlides(1, 2);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  let i;
  let x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }


  x[slideIndex[no]-1].style.display = "block";  
}
</script>
</body>
</html> 
