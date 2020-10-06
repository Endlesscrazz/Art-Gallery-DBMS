<?php
include("includes/connection.php"); 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>

<!DOCTYPE html>
 <html>
 <head>
  <title>Home</title>

  <style>
         body {
                margin:0 auto;
                height: 100%;
                width: 100%;
                background: url(pictures/ForBackground.jpg) no-repeat fixed;
                background-size: cover;
                overflow-x: hidden;
         }

        .ART {
          text-indent: -99px;
          margin-top: 15px;
          font-size: 35px;
          font-family: "Yu Gothic UI";
          color: rgb( 45, 112, 213 );
          text-align: center;
          position: absolute;
          left: 0px;
          top: -15px;
          width: 215px;
          height: 35px;
          z-index: 19;
        }

        ._BAY {
          text-indent: 120px;
          margin-top: 15px;
          font-size: 35px;
          font-family: "Yu Gothic UI";
          color: rgb( 20, 20, 20);
          text-align: center;
          position: absolute;
          left: -25px;
          top: -15px;
          width: 215px;
          height: 35px;
          z-index: 19;
        }

        .Albay_ {

          margin-top: 97px;
          font-size: 13px;
          font-family: "MingLiU_HKSCS-ExtB";
          color: #f5f5f5;
          text-align: left;
          position: absolute;
          left: 78px;
          top: -55px;
          width: 215px;
          height: 35px;
           z-index: 3;
        }

        .Original_ {

          margin-top: 97px;
          font-size: 13px;
         font-family: "MingLiU_HKSCS-ExtB";
          color: #f5f5f5;
          text-align: left;
          position: absolute;
          left: 120px;
          top: -55px;
          width: 215px;
          height: 35px;
           z-index: 3;
        }

        .Artworks_ {

          margin-top: 97px;
          font-size: 13px;
          font-family: "MingLiU_HKSCS-ExtB";
          color: #f5f5f5;
          text-align: left;
          position: absolute;
          left: 180px;
          top: -55px;
          width: 215px;
          height: 35px;
          z-index: 3;
        }

        #ul {

          background-color: #333d46;
          box-shadow: 1px 1.732px 2px 0px rgb( 55, 52, 52 );
          position: absolute;
          left: -10px;
          top: -15px;
          width: 100%;
          height: 70px;
          z-index: 2;
        }

        #li {
          float: left;
          overflow: auto;
          padding: 5px ;
        }

        #li #a2 {
          display: block;
          color: white;
          font-size: 14px;
          font-family: "Yu Gothic UI Light";
          margin:18px 15px 0px 5px;
          text-decoration: none;
         }

        #li #a2:hover:not(.logo) {
          border-bottom: 1.5px solid #2d70d5;
        }

        .img{
          cursor: pointer;
           position: absolute;
           top:1.5px;
          left: 3px;
          width:70px;
          height: 60px;
          z-index: 1;
        }

         /*Style the Dropwdown Button*/
         .Welcome{
            font-family: "Yu Gothic UI";
            color:white;
            position: absolute;
            top: -10px;
            right: -820px;
        }
        .Don{
            font-family: "Yu Gothic UI";
            color:white;
            position: absolute;
            top: -10px;
            left:1000px;
            z-index: 30;
        }
         /*Username Clickable Dropdown*/
        .dropbtn {
          border-radius: 10px;
          background-color: #2d70d5;
          color: white;
          padding: 8px;
          font-size: 16px;
          border: none;
          cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
          background-color: grey;
        }
        .dropdown {
          position: absolute;
          top: 16px;
          left: 1030px;
          display: inline-block;
          z-index: 30;
        }

         .dropdown-content {
           display: none;
           position: absolute;
           background-color: #f9f9f9;
           font-size: 13px;
           min-width: 160px;
          overflow: auto;
           box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
         }
        .dropdown-content a {
           color: black;
           padding: 10px 10px;
           text-decoration: none;
           display: block;
        }
         .dropdown a:hover {
          background-color: #f1f1f1;

        }
         .show {
          display:block;
        }

      /*Explore Hover Dropdown-Art Guide*/


.dpdown {
    position: inherit;

      left: 200px;
      font-family: "Yu Gothic UI Light";
      color: #f2f2f2;
      font-size: 14.5px;
    display: inline-block;
    z-index: 100;
}

.dpdown-content {
    display: none;
    position: absolute;
    right: 680px;
    background-color: #f9f9f9;
    font-size: 13px;
    min-width: 160px;
    z-index: 100;
}

.dpdown-content a {
    color: black;
    padding: 10px 10px;
    text-decoration: none;
    display: block;
}

.dpdown-content a:hover {background-color: #f1f1f1}

.dpdown:hover .dpdown-content {
    display: block;
}

.dpdown:hover{
   border-bottom: 1.5px solid #2d70d5;
}
.success{
  position: absolute;
  top:100px
  left:100px;
  font-family: "Yu Gothic UI Light";
  font-size: 20px;
  z-index: 50;
}

/*Explore Hover Dropdown-Artworks*/


.dpdown2 {
    position: inherit;

      left: 675px;
      font-family: "Yu Gothic UI Light";
      color: #f2f2f2;
      font-size: 14.5px;
    display: inline-block;
    z-index: 100;
}

.dpdown-content2 {
    display: none;
    position: absolute;
    right: 910px;
    background-color: #f9f9f9;
    font-size: 13px;
    min-width: 160px;
    z-index: 100;
}

.dpdown-content2 a {
    color: black;
    padding: 10px 10px;
    text-decoration: none;
    display: block;
}

.dpdown-content2 a:hover {background-color: #f1f1f1}

.dpdown2:hover .dpdown-content2 {
    display: block;
}

.dpdown2:hover{
   border-bottom: 1.5px solid #2d70d5;
}

  </style>
</head>
    <script>
        function myFunction() {
           document.getElementById("myDropdown") .classList.toggle("show");
        }
         window.onclick = function(event) {

           if(!event.target.matches('.dropbtn')){

             var dropdowns = document .getElementsByClassName ("dropdown-content");
             var i; for(i=0; i < dropdowns.length; i++) {

               var openDropdown = dropdowns[i];
                 if (openDropdown.classList.contains ('show')) {

                  openDropdown.classList.remove('show');
                 }
             }
           }
         }

      </script>

<body >

  <h1 class="ART">ART </h1>
  <h1 class="_BAY">GALLERY </h1>

  <ul id="ul">
      <li id="li">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <li id="li"><a id="a2" href="home.php">HOME</a></li></li>

      <li id="li">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <li id="li" > <br>
            <div class="dpdown2">
                <span>ARTWORKS</span>
                      <div class="dpdown-content2">
                          <a href="artworks.php">Available Artworks</a>
                          <a href="artworks(sold).php">Sold Artworks</a>
                      </div>
            </div>
      </li></li>

      <li id="li">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li id="li"><a id="a2" href="artist.php">ARTISTS </a></li></li>

      <li id="li"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li id="li"><br>
            <div class="dpdown">
                <span>ART GUIDE</span>
                      <div class="dpdown-content">
                          <a href="artists_guide.php">Artists' Guide</a>
                          <a href="customers_guide.php">Customers' Guide</a>
                      </div>
            </div>
      </li></li>

      <li id="li">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li id="li"><a id="a2" href="exhibition.php">Exhibhition</a></li></li>


<?php 
if(isset($_SESSION['USER_ID'])){
    $id = $_SESSION['USER_ID'];
            $query_category="SELECT user_fname,user_mname,user_lname FROM user WHERE user_id = '$id'";
            $result_category = mysqli_query($conn,$query_category);


            while($row=mysqli_fetch_array($result_category)){
              //<a href= "pictures/arts/'.$row[0].'">
              echo
                 '<div class="dropdown">'.
                    '<button onclick="myFunction()" class="dropbtn">' .$row['user_fname'].' '.$row['user_mname'].' '.$row['user_lname']. ''.''. '&#9660;'. '</button>'.'
                       <div id="myDropdown" class="dropdown-content">
                        <a href="account_home.php">My ART GALLERY</a>
                         <a href="profile.php">Account Profile</a>
                            <a href="logout.php">Log Out</a>

                       </div>
                  </div>';
            }


}
else{
 include("portal.php");

}
?>



</ul>

<?php

include("includes/footer.php");
?>
