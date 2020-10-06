<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  font-weight: 300;
}
.css-slideshow{
  position: absolute;
  top:-67px;
  max-width: 1280px;
  margin: 130px 1000px 0px 0px;
}

.css-slideshow figure{
  margin: 0;
  max-width: 1280px;
  height: 700px;
  background: #000;
  position: absolute;
}
.css-slideshow img{
  box-shadow: 0 0 2px #666;
}
.css-slideshow figcaption{
  position: absolute;
  top: 0;
  color: #fff;
  background: rgba(0,0,0, .3);
  font-size: .8em;
  padding: 8px 12px;
  opacity: 0;
  transition: opacity .5s;
}
.css-slideshow:hover figure figcaption{
  transition: opacity .5s;
  opacity: 1;
}
.css-slideshow-attr{
  max-width: 1280px;
  text-align: right;
  font-size: .7em;
  font-style: italic;
  margin:0 auto;
}
.css-slideshow-attr a{
  color: #666;
}
.css-slideshow figure{
  opacity:0;
}

</style>
</head>
<body>
<div class="">

  <figure style="margin-left: 0px;margin-right: 0px;">
    <img src="pictures/front-image.jpeg" width="100%" height="680" />
  </figure>
</div>
</body>
</html>
