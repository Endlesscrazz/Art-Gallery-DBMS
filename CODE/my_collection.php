<?php session_start();
include("includes/connection.php");
$user_type = $_SESSION['user_type'];
if($user_type == 'Artist'){
    include("account.php");
}
else{
    include("customer-account.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>

      body{
        overflow-x: hidden;
      }

     .head-my {
         font-size: 30px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: absolute;
          left: 70px;
          top: 110;
          z-index: 19;
          }

        .head-collections{
         font-size: 30px;
         font-family: "Yu Gothic UI Light";
          color: rgb( 00, 00, 00 );
          position: absolute;
           left:120px;
          top: 110px;
          z-index: 19;
        }

        .hr{
            position:absolute;
            border: 1px solid #2d70d5;
            top:165px;
            width: 1090px;
            left: 70px;
            z-index: 3
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
            border: 8px solid white;
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
          top: 140px;
          left: 140px;

          margin-right: 200px;

     }

         .body{
        margin: 0 0 100px -50px;
    }
    </style>

</head>
<body style="margin-bottom: 70px;">
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
echo '<p><h1 class="head-my">My</h1>
         <h1 class="head-collections"> Collections</h1><hr class="hr">
      </p>';
            $query_category="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_width,art_work.art_height,art_work.art_media,art_work.art_category,user.user_contact,art_work.art_thickness,buy_transaction.shipping_status
                         FROM art_work,user,buy_transaction
                        where buy_transaction.art_id = art_work.art_id AND buy_transaction.user_id = user.user_id AND
                            buy_transaction.user_id = '$id'";
            $result_category = mysqli_query($conn,$query_category);
            if(mysqli_num_rows($result_category) <=0)
        {
           echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align="Center">No Available Artworks </h1>';
         }
        else{

            while($row = mysqli_fetch_array($result_category)){

if($row['shipping_status'] == 'Delivered'){

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

                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>';
                      }
                      else{

                      }

        }

}
?>

    </div>

</body>
</html>
