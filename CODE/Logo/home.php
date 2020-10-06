<<!DOCTYPE html>
<html>
<head>
<style>
/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
 .prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor:pointer;
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

 .active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}


</style>
  <title></title>
</head>
<body>

</body>
</html>
<div style="color:red" class="color:mediumblue"="slideshow-container"="color:mediumblue">
  <div style="color:red" class="color:mediumblue"="mySlides fade"="color:mediumblue">
    <div style="color:red" class="color:mediumblue"="numbertext"="color:mediumblue">1 / 3</div style="color:mediumblue">
    <img style="color:red" src="color:mediumblue"="img1.jpg" style="color:mediumblue"="width:100%"="color:mediumblue">
    <div style="color:red" class="color:mediumblue"="text"="color:mediumblue">Caption Text</div style="color:mediumblue">
  </div style="color:mediumblue">

  <div style="color:red" class="color:mediumblue"="mySlides fade"="color:mediumblue">
    <div style="color:red" class="color:mediumblue"="numbertext"="color:mediumblue">2 / 3</div style="color:mediumblue">
    <img style="color:red" src="color:mediumblue"="img2.jpg" style="color:mediumblue"="width:100%"="color:mediumblue">
    <div style="color:red" class="color:mediumblue"="text"="color:mediumblue">Caption Two</div style="color:mediumblue">
  </div style="color:mediumblue">

  <div style="color:red" class="color:mediumblue"="mySlides fade"="color:mediumblue">
    <div style="color:red" class="color:mediumblue"="numbertext"="color:mediumblue">3 / 3</div style="color:mediumblue">
    <img style="color:red" src="color:mediumblue"="img3.jpg" style="color:mediumblue"="width:100%"="color:mediumblue">
    <div style="color:red"class="color:mediumblue">="text"="color:mediumblue">>Caption Three</div style="color:mediumblue">>
  </div style="color:mediumblue">>

  <a style="color:red"> class="color:mediumblue">="prev" onclick="color:mediumblue">="plusSlides(-1)"="color:mediumblue">>&#10094;</a style="color:mediumblue">>
  <a style="color:red"> class="color:mediumblue">="next" onclick="color:mediumblue">="plusSlides(1)"="color:mediumblue">>&#10095;</a style="color:mediumblue">>
</div style="color:mediumblue">>
<br style="color:mediumblue">>

<div style="color:red"> style="color:mediumblue">="text-align:center"="color:mediumblue">>
  <span style="color:red"> class="color:mediumblue">="dot" onclick="color:mediumblue">="currentSlide(1)"="color:mediumblue">></span style="color:mediumblue">>
  <span style="color:red"> class="color:mediumblue">="dot" onclick="color:mediumblue">="currentSlide(2)"="color:mediumblue">></span style="color:mediumblue">>
  <span style="color:red"> class="color:mediumblue">="dot" onclick="color:mediumblue">="currentSlide(3)"="color:mediumblue">></span style="color:mediumblue">>
</div style="color:mediumblue">>