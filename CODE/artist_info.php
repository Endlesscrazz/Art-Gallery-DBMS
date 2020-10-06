<?php include("includes/connection.php");
 include("includes/head.php");
  include("role.php");
        include("privileged_user.php"); ?>
<!DOCTYPE html>
<html>
 <head>
  <style>
       .photo1 {
        position: relative;
        left: 80px;
        top: 45px;
        width: 207px;
        height : 270px;
        box-shadow: 1px 1px 5px 0px rgb(0, 0, 1);
     }

      .backgd{
       border-radius: 8px;
        border: 1px solid none;
        background-color: white;
        padding: 0px 10px 10px 0px;
        margin-left: 120px;
        position: relative;
        top: 175px;
        width:1010px;
        height: 350px;
    }

   .info-title{
        color:#2d70d5;
        font-variant: small-caps;
        font-family: "Yu Gothic UI Light";
        font-size: 25px;
        position: relative;
        top: -205px;
        left: 420px;
        text-decoration: none;

    }
    .info-content{
        position: relative;
        font-size: 25px;
        font-family:  "Yu Gothic UI Light";
        top: -115px;
        left: 785px;
    }

        .headspace{
        position: absolute;
        font-variant: small-caps;
        color: rgb(0, 0, 3);
        font-family: "Yu Gothic UI Light";
        font-size: 30px;
        left: 80px;
        top: 110px;

    }
    .headspace2{
        position: absolute;
        font-variant: small-caps;
        color: rgb(0, 0, 3);
        font-family: "Yu Gothic UI Light";
        font-size: 30px;
        margin-left: 80px;
        margin-top: 100px;

    }
    .hr{
        position: relative;
        border: 1px solid #2d70d5;
        top: -15px;
        width: 1100px;
        left: 0px;
    }
     .photo {
        position: relative ;
        width: 270px;
       height : 260px;
       margin: 0  0px 0 0px;

        }

       .desc-title{
        color:#2d70d5;
        font-variant: small-caps;
        font-family: "Yu Gothic UI Light";
        font-size: 29px;
        position: inherit;
        top: 0px;
        left: 5px;
        text-decoration: none;
    }

    .desc-content{
        position: relative;
        font-size: 18px;
        font-family:  "Yu Gothic UI Light";
        top: 0px;

    }
    .desc-content2{
        position: relative;
        font-size: 18px;
        font-family:  "Yu Gothic UI Light";

        top: -20px;
    }

     .pic-table{
            border: 3px solid white;
            box-shadow: 0px 6px 20px 0px rgba(0, 0, 0, 0.2);
            background-color: #fafafa;
            border-collapse: collapse;
            float: left;
            margin: 0px 50px 50px 0px;
        }
        .space{
          margin-top: 200px;
          position: relative;
          left:130px;
        }

  </style>
 </head>
<body>


    <?php
    $user_id = $_GET['id'];

        $query_category="SELECT user_imagepath,user_fname, user_lname,user_mname, user_gender, user_house_number, user_street, user_brgy, user_province, user_contact FROM user WHERE user_id = '$user_id'";
        $result_category = mysqli_query($conn,$query_category);

        while($row=mysqli_fetch_array($result_category)){

            echo ' <h2 class="headspace"> '.$row['user_fname'].'\'s Info <hr class="hr" style="border-bottom: 2px solid #2d70d5;"></h2>

                  <p></p>

                  <div class="backgd"><a  href= "pictures/profile/'.$row['user_imagepath'].'"> <img class="photo1" src="pictures/profile/'.$row['user_imagepath'].'"></a>

                  <p class = "info-title">Full Name: <br>Gender: <br>City: <br>Country: <br>Contact Info: </p></div>

                  <p class = "info-content">'.$row['user_fname'].' '.$row['user_mname'].'. '.$row['user_lname'].'<br>'.$row['user_gender']. '<br> '.$row['user_province'].'<br>India<br>0'.$row['user_contact'].'</p></div> ';

        }
        $query_category2="SELECT user_fname FROM user WHERE user_id = '$user_id'";
        $result_category2 = mysqli_query($conn, $query_category2);

        while ($row2=mysqli_fetch_array($result_category2)) {
                    echo '<h2 class="headspace2"> '.$row2['user_fname'].'\'s Artworks <hr class="hr" style="border-bottom: 2px solid #2d70d5;"></h2>';
        }

$query_category1="SELECT art_work.art_imagepath,art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_status, art_work.art_category FROM art_work,user WHERE
 art_work.user_id = user.user_id AND
art_work.user_id = '$user_id' ORDER BY art_work.art_title ASC";
        $result_category1 = mysqli_query($conn,$query_category1);
if(mysqli_num_rows($result_category1) <=0)
        {
            echo '<br><br><br><br><br><br><br><h1 align="Center">No Artworks Available </h1>';
        }
        else{
        while($row1=mysqli_fetch_array($result_category1)){

           
            echo ' <div class="space" >
                            <table  class="pic-table">
                                <tr>
                                    <td>
                                        <img class="photo" src="pictures/arts/'.$row1['art_imagepath'].'" > <br>'.

                                        '<a  href=info_art.php?id='.$row1['art_id'].' class="desc-title"> '.$row1['art_title'].' </a>

                                         <p class="desc-content">'.$row1['art_category'].'</p>

                                         <p class="desc-content" style="float: right;">Rs '.$row1['art_price'].'.00</p> <br>

                                         <p class="desc-content2">'.$row1['user_fname'].' '.$row1['user_mname'].' '.$row1['user_lname'].'</p>
                                    </td>
                                </tr>
                            </table>
                        </div>';
        }

}

      ?>
     </div>
     <br><br><br><br><br><br>
  </body>
 </html>
