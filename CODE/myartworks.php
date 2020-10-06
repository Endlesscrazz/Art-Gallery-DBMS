<?php session_start();
include("includes/connection.php");
include("account.php");
?>

<!DOCTYPE html>
<html>
<head>
    <style>

     .head-available {
         font-size: 30px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: relative;
          left: 70px;
          top: 100;
          z-index: 19;
          }

        .head-artworks{
         font-size: 30px;
         font-family: "Yu Gothic UI Light";
          color: rgb( 00, 00, 00 );
          position: relative;
           left:200px;
          top: 40px;
          z-index: 19;
        }

        .hr{
            position:relative;
            border: 1px solid #2d70d5;
            top:-17px;
            width: 1090px;
            left: -218px;
        }

        .head-sold {
         font-size: 30px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: relative;
          left: -290px;
          top: 550;
          z-index: 50;
          }
         .head-artworks2{
         font-size: 30px;
         font-family: "Yu Gothic UI Light";
          color: rgb( 00, 00, 00 );
          position: relative;
           left:-220px;
          top: 490px;
          z-index: 19;
        }

         .hr2{
            position:relative;
            border: 1px solid #2d70d5;
            top:-385px;
            width: 1090px;
            left: 200px;
        }

 .photo {
            position: relative ;
            width: 300px;
           height : 250px;
        }

    .desc-title{
        color:#2d70d5;
        font-variant: small-caps;
        font-family: "Yu Gothic UI Light";
        font-size: 29px;
        position: relative;
        top: 0px;
        left: 5px;
        text-decoration: none;
    }
    .desc-content{
        position: relative;
        font-size: 17px;
        font-family:  "Yu Gothic UI Light";
        top: -7px;

    }
    .desc-content2{
        position: relative;
        font-size: 18px;
        font-family:  "Yu Gothic UI Light";
        top: -30px;
    }

     .pic-table{
            border: 3px solid white;
            box-shadow: 0px 6px 20px 0px rgba(0, 0, 0, 0.2);
            background-color: #fafafa;
            border-collapse: collapse;
            float: left;
            overflow: auto;
            margin: 0px 50px 50px 0px;
        }

        .space{
          position: relative;
          left:-100px;
          top: -20px;
          margin-right: 100px;

        }

         .desc-content3{
            position: relative;
            font-size: 16px;
            font-family:  "Yu Gothic UI Light";
            top: -40px;
        }

        .pic-table2{
            border: 3px solid white;
            box-shadow: 0px 6px 20px 0px rgba(0, 0, 0, 0.2);
            background-color: #fafafa;
            border-collapse: collapse;
            float: left;
            margin: 0px 50px 50px 0px;
        }

        .space2{
          position: relative;
          left:100px;
          top: 120px;
          margin-right: 100px;
        }

        .addbtn{
            cursor: pointer;
            text-decoration:none;
            color:white;
            padding: 10px;
            border-radius: 12px;
           font-family: "Yu Gothic UI Light";
           font-weight: bold;
           border: 1px solid;
           color: white;
           font-size: 22px;
           background-color: #43b353;
           position: absolute;
           top: -15px;
           left: 770px;
           width: 170px;
           height: 30px;
        }

         .modifybtn{
            cursor: pointer;
            text-decoration:none;
            color:white;
            padding: 10px;
            border-radius: 12px;
           font-family: "Yu Gothic UI Light";
           font-weight: bold;
           border: 1px solid;
           color: white;
           font-size: 22px;
           background-color: #234;
           position: relative;
           top: -20px;
           left: 0px;
           width: 170px;
           height: 30px;
        }

        .deletebtn{
          border-radius: 8px;
           font-family: "Yu Gothic UI Light";
           font-weight: bold;
           color: white;
           font-size: 25px;
           background-color: #FF0017;

           position: relative;
           top: -20px;
           padding: 10px;
           left: 10px;
           width: 100px;
           height: 35px;
           text-decoration: none;
        }
         .body{
        margin: 0 0 100px -50px;
    }
    </style>

</head>
<body>
<script>
function YNconfirm() {
    if (window.confirm('Are you sure you want to delete this artwork?'))
    {
        return true;
    }
    else
        return false;
};
</script>


    <div class="img">

        <?php
$id = $_SESSION['USER_ID'];
echo '<p><h1 class="head-available"> Available </h1>
                <h1 class="head-artworks">Artworks<hr class="hr"></p>';
            $query_category="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_category
                         FROM art_work,user
                        where art_work.user_id = user.user_id AND user.user_id = '$id' AND art_work.art_status = 'Available'";
            $result_category = mysqli_query($conn,$query_category);
 if(mysqli_num_rows($result_category) <=0)
        {
            echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align="Center">No Available Artworks </h1>';
        }
        else{
            while($row = mysqli_fetch_array($result_category)){



                echo '

                    <div class="space" >
                            <table  class="pic-table">
                                <tr>
                                    <td>
                                        <a><img class="photo" src="pictures/arts/'.$row['art_imagepath'].'" ></a><br>'.

                                        '<a  href=info_art.php?id='.$row['art_id'].' class="desc-title"> '.$row['art_title'].' </a>

                                         <p class="desc-content">'.$row['art_category'].'</p>

                                         <p class="desc-content" style="float: right;">P'.$row['art_price'].'.00</p> <br>

                                         <p class="desc-content2">'.$row['user_fname'].' '.$row['user_mname'].' '.$row['user_lname'].'</p>

                                         <p>
                                                <a class="modifybtn" href="edit_artwork.php?category='.$row['art_category'].'&id='.$row['art_id'].'"> &#128393; Modify </a>



                                                <a class="deletebtn" href =delete_artwork_action.php?delete='.$row['art_id'].'&pic='.$row['art_imagepath'].' onclick="return(YNconfirm());"> &#10006; Delete</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>';

        }
    }

        ?>
           <a class="addbtn" href="select_art.php" style=""> &#10133;  Add an Image</a>

    </div>

</body>
</html>
