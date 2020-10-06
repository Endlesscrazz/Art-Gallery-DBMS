<?php include("account.php");
session_start(); ?>
<!DOCTYPE html>
 <html>
 <head>
</head>
 <body>
<style>

.headt1 {
         font-size: 30px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: absolute;
          left: 70px;
          top: 100px;
          z-index: 19;

          }
        .headt2{
           font-size: 30px;
         font-family: "Yu Gothic UI Light";
          color: rgb( 00, 00, 00 );
          position: absolute;
           left:125px;
          top: 100px;
          z-index: 19;
    }

     .hr{
            position:absolute;
            border: 1px solid #2d70d5;
            top:150px;
            width: 1090px;
            left:71px;
        }

       .fsize-title{
              margin: 200px 50px 10px 100px;
             font-size: 15px;
        }
   .fsize-img{
            margin: -10px 50px 10px 120px;
            height:250px;
            width:200px;
        }

    .browse{
            position: relative;
            top: -60px;
            left: 450px;

        }
     .fsize-text{
            position: relative;
            top: -90px;
            left: 90px;
            font-size: 15px;
        }

          .textbox{
             border-radius: 8px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 2px solid steelblue;
          background-color: white;
          position: relative;
          left: 95px;
          top: 0px;
          width: 170px;
          height: 30px;
        }
          .textbox2{
             border-radius: 8px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 2px solid steelblue;
          background-color: white;
          position: relative;
          left: 25px;
          top: 0px;
          width: 170px;
          height: 30px;
        }
      .textbox3{
             border-radius: 8px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 2px solid steelblue;
          background-color: white;
          position: relative;
          left: 60px;
          top: 0px;
          width: 170px;
          height: 30px;
        }
        .inputbar{
           font-family: "Yu Gothic UI Light";
           font-weight: bold;
           color: white;
           font-size: 25px;
           margin-bottom: 30px;
           background-color: #43b353;
           position: absolute;
           right: 180px;
           width: 200px;
           height: 50px;
        }

    .body{
        margin: 0 0 10px 150px;
    }
              input[type=text],

textarea,
fieldset {
/* required to properly style form
   elements on WebKit based browsers */
  -webkit-appearance: none;



  font-family: inherit;
  font-size: 90%;

  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

input:invalid {
  box-shadow: 0 0 5px 1px red;
}

input:focus:invalid {
  outline: none;
}


</style>


<p>
            <h1 class="headt1"> Edit</h1>
            <h1 class="headt2">Artwork </h1> <hr class="hr">
         </p>

        <div class="body">
<?php
$art_id = $_GET['id'];

$sql = "SELECT art_title,art_imagepath,art_width,art_height,art_thickness,art_date,art_description,art_price,art_stock FROM art_work WHERE art_id = '$art_id'";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
    $art_title = $row['art_title'];
    $art_imagepath = $row['art_imagepath'];
    $art_width = $row['art_width'];
    $art_height = $row['art_height'];
    $art_thickness = $row['art_thickness'];
    $art_description = $row['art_description'];
    $art_price = $row['art_price'];
    $art_stock = $row['art_stock'];
}
?>


<p class="fsize-title">Artwork Image:<br>
<?php if(!empty($message)) { echo "<p>{$message}</p>"; }
echo '<img class="fsize-img" src = "pictures/arts/'.$art_imagepath.'" height = 100 width = 100>';
echo ' <form action="edit_artwork(action).php?id='.$art_id.'" enctype="multipart/form-data" method="post">'; ?>
<br><br>

<br><br>
   <p class="fsize-text">
Title: &nbsp;<input class="textbox" type="text" id="Fname" required name="title" value="<?php echo $art_title; ?>">
<br><br>
Width:<input class="textbox" type="text" id="Mname" required name="width" value="<?php echo $art_width; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; in.
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Height:<input class="textbox2" type="text" id="Lname" required name="height" value="<?php echo $art_height; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; in.
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
thickness:<input class="textbox2" type="text" id="gender" required name="thickness" value="<?php echo $art_thickness; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; in.<br><br>

Description:<input class="textbox3" type="text" id="bday" required name="description" value="<?php echo $art_description; ?>"><br><br>
Category: <?php $art_category = $_GET['category'];
$_SESSION['art_category'] = $art_category;
       echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $art_category;
?>
<br><br>
<?php

 if($art_category == "Painting"){
echo 'Media:<select class="textbox" id="media" name="media">

                 <option value="Airbrush">Airbrush</option>
                 <option value="Enamel">Enamel</option>
                 <option value="Gouache">Gouache</option>
                 <option value="Acrylic">Acrylic</option>
                 <option value="Oil">Oil</option>
                 <option value="Spray Paint">Spray Paint</option>
                 <option value="Tempera">Tempera</option>
                 <option value="Watercolor">Watercolor</option>
                 <option value="Ink">Ink</option>
                 <option value="Gesso">Gesso</option>
                 </select><br><br>';
}
else if($art_category == "Sculpture"){
echo 'Media:<select class="textbox" id="media" name="media">
                 <option value="Ceramic">Ceramic</option>
                 <option value="Clay">Clay</option>
                 <option value="Digital">Digital</option>
                 <option value="Fiberglass">Fiberglass</option>
                 <option value="Pottery">Pottery</option>
                 <option value="Fabric">Fabric</option>
                 <option value="Neon">Neon</option>
                 <option value="Glass">Glass</option>
                 <option value="Interactive">Interactive</option>
                 <option value="Latex">Latex</option>
                 <option value="Leather">Leather</option>
                  <option value="LED">LED</option>
                  <option value="Metal">Metal</option>
                  <option value="Mosaic">Mosaic</option>
                  <option value="Paint">Paint</option>
                  <option value="Paper">Paper</option>
                  <option value="Paper Mache">Paper Mache</option>
                  <option value="Plastic">Plastic</option>
                  <option value="Rubber">Rubber</option>
                  <option value="Stone">Stone</option>
                  <option value="Wax">Wax</option>
                  <option value="Wood">Wood</option>
                  <option value="Steel">Steel</option>
                  <option value="Bronze">Bronze</option>
                  <option value="Granite">Granite</option>
                  <option value="Marble">Marble</option>
                 </select><br><br>';
}
if($art_category == "Drawing"){
echo 'Media:<select class="textbox" id="media" name="media">

                 <option value="Ballpoint Pen">Ballpoint Pen</option>
                 <option value="Chalk">Chalk</option>
                 <option value="Charcoal">Charcoal</option>
                 <option value="Digital">Digital</option>
                 <option value="Graphite">Graphite</option>
                 <option value="Ink">Ink</option>
                 <option value="Marker">Marker</option>
                 <option value="Pastel">Pastel</option>
                 <option value="Pencil">Pencil</option>


                 </select><br><br>';
}
if($art_category == "Photography"){
echo 'Media:<select class="textbox" id="media" name="media">

                 <option value="Polaroid">Polaroid</option>
                 <option value="Color">Color</option>
                 <option value="Digital">Digital</option>
                 <option value="C-type">C-type</option>
                 <option value="Black & White">Black & White</option>
                 <option value="Photogram">Photogram</option>
                 <option value="Platinum">Platinum</option>
                 <option value="Gelatin">Gelatin</option>
                 <option value="Manipulated">Manipulated</option>
                 </select><br><br>';
}
$today = getdate();
            $day = $today['weekday'];
            $month = $today['month'];
            $day1 = $today['mday'];
            $year =$today['year'];
             $aa = $month.' '.$day1.' '.$year;
            $_SESSION['current_date'] = $aa;
            ?>

Price:&nbsp;&nbsp;<input class="textbox" type="text" required name="price" value="<?php echo $art_price; ?>"><br><br>
<?php
if($art_category == 'Sculpture'){
  echo '
Stock:&nbsp;&nbsp;<input class="textbox" type="text" required name="stock" value="'.$art_stock.' "><br><br>';
}
?>


    <input class="inputbar" type="submit" name="submit" value="&#10004; Save">
                </form>
        </form>
    </p>
</body>
</html>
<?php include("includes/footer.php"); ?>



