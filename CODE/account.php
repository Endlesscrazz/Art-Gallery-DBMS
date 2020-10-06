<?php
  session_start();
 include("includes/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>

    <style type="text/css">
        body {
                margin:0 auto;
                height: 100%;
                width: 100%;
                background: url(pictures/ForBackground.jpg) no-repeat fixed;
                background-size: cover;
         }

        .ART {
          text-indent: -99px;
          margin-top: 15px;
          font-size: 40px;
          font-family: "Yu Gothic UI";
          color: rgb( 45, 112, 213 );
          text-align: center;
          position: absolute;
          top: -20px;
          left:-5px;
          width: 215px;
          height: 35px;
          z-index: 19;
        }

        ._BAY {
          text-indent: 120px;
          margin-top: 15px;
          font-size: 40px;
          font-family: "Yu Gothic UI";
          color: rgb( 00, 00, 00 );
          text-align: center;
          position: absolute;
          left: -25px;
          top: -20px;
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
           z-index: 5;
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
           z-index: 5;
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
          z-index: 5;
        }
        .image{
            position: absolute;
            top: -1px;
            right: 5px;
            width: 80px;
            height: 80px;
        }

        .ul {

          background-color: #333d46;
          box-shadow: 1px 1.732px 2px 0px rgb( 55, 52, 52 );
          position: absolute;
          left: -10px;
          top: -15px;
          width: 100%;
          height: 65px;
          z-index: 5;
        }

        .li {
          float: left;
          overflow: auto;
          padding: 5px ;
          text-align: center;
        }

        .li .a2 {
          display: block;
          color: white;
          font-size: 14px;
          font-family: "Yu Gothic UI Light";
          margin:18px 80px 20px 15px;
          text-decoration: none;
         }

        .li .a2:hover:not(.logo) {
          border-bottom: 1.5px solid #2d70d5;
        }

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

      /*Explore Hover Dropdown*/
        .dpbtn {
   border-radius: 10px;
          background-color: #2d70d5;
    color: white;
    padding: 8px;
    font-size: 13px;
    border: none;
    cursor: pointer;
    margin-left: 30;
}

.dpdown {
    position: absolute;
      top: 16px;
      left: 300px;
    display: inline-block;
    z-index: 30;
}

.dpdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: #f9f9f9;
    font-size: 13px;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
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

.dpdown:hover .dpbtn {
    background-color: grey;
}

/*Explore Hover Dropdown-My Artworks*/

.dpdown3 {
    position: inherit;

      left: 675px;
      font-family: "Yu Gothic UI Light";
      color: #f2f2f2;
      font-size: 14.5px;
    display: inline-block;
    z-index: 100;
}

.dpdown-content3 {
    display: none;
    position: absolute;
    right: 980px;
    background-color: #f9f9f9;
    font-size: 13px;
    min-width: 160px;
    z-index: 100;
}

.dpdown-content3 a {
    color: black;
    padding: 10px 10px;
    text-decoration: none;
    display: block;
}

.dpdown-content3 a:hover {background-color: #f1f1f1}

.dpdown3:hover .dpdown-content3 {
    display: block;
}

.dpdown3:hover{
   border-bottom: 1.5px solid #2d70d5;
}
    </style>
</head>
<body>

    <div class="dpdown">
  <button class="dpbtn">Explore </button>
  <div class="dpdown-content" style="left:0;">
                   <a href="artworks.php">Artworks</a>
                    <a href="artist.php">Artists</a>
                     <a href="artists_guide.php">Art Guide</a>
                    
  </div>
</div>

    <?php
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
} ?>

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
  <ul class="ul" >

                <li class="li">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <li class="li"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <div class="dpdown3">
                <span> MY ARTWORKS</span>
                      <div class="dpdown-content3">
                          <a href="myartworks_available.php">My Available Artworks</a>
                          <a href="myartworks_sold.php">My Sold Artworks</a>
                      </div>

              </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li></li>


              <li class="li"><a class="a2" href="orders.php">MY ORDERS</a></li>

              <li class="li"> <a class="a2" href="my_collection.php"></a></li>


         </ul>





            <h1 class="ART">ART </h1>
            <h1 class="_BAY">GALLERY</h1>

      






</body>
</html>