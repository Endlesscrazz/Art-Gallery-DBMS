<?php session_start();
include("includes/connection.php");
include("account.php");
?>

<!DOCTYPE html>
<html>
<head>
    <style>

      body{
          overflow-x: hidden;
      }



        .head-sold {
         font-size: 30px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: absolute;
          left: 80px;
          top: 110px;
          z-index: 1;
          }
         .head-artworks2{
         font-size: 30px;
         font-family: "Yu Gothic UI Light";
          color: rgb( 00, 00, 00 );
          position: absolute;
           left:150px;
          top: 110px;
          z-index: 1;
        }

         .hr2{
            position:absolute;
            border: 1px solid #2d70d5;
            top:25px;
            width: 1090px;
            left:-70px;
            margin-bottom: 50px;
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
            position: relative;
            top: 0px;
            z-index: 80;
        }

         .desc-content3{
            position: relative;
            font-size: 16px;
            font-family:  "Yu Gothic UI Light";
            top: -40px;
        }

        .pic-table2{
            border: 8px solid white;
            box-shadow: 0px 6px 20px 0px rgba(0, 0, 0, 0.2);
            background-color: #fafafa;
            border-collapse: collapse;
            float: left;
            margin: 0px 50px 50px 0px;
        }

        .space2{
          position: relative;
          left:100px;
          top: 150px;
          margin-right: 100px;
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


    <div style="margin-left: 100px">

        <?php
$id = $_SESSION['USER_ID'];

echo '<p><h1 class="head-sold">Sold </h1>
            <h1 class="head-artworks2">Artworks<hr class="hr2"></h1>';
 $query_category1="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_status,buy_transaction.courier_name,buy_transaction.courier_contact,buy_transaction.shipping_province,buy_transaction.shipping_municipal,buy_transaction.shipping_street,buy_transaction.shipping_brgy,buy_transaction.shipping_house_num,art_work.art_category
                         FROM art_work,user,buy_transaction
                        where art_work.user_id = user.user_id AND buy_transaction.art_id = art_work.art_id  AND user.user_id = '$id' AND art_work.art_status = 'sold' ORDER BY art_work.art_title ASC";
            $result_category1 = mysqli_query($conn,$query_category1);
 if(mysqli_num_rows($result_category1) <=0)
        {
            echo '<br><br><br><br><br><br><br><br><h1 align="Center">No Sold Artworks </h1>';
        }
        else{
            while($row1 = mysqli_fetch_array($result_category1)){

                echo '

                <div class="space2" >
                            <table  class="pic-table2">
                                <tr>
                                    <td>
                                        <a><img class="photo" src="pictures/arts/'.$row1['art_imagepath'].'" ></a><br>'.

                                        '<a  href=info_art.php?id='.$row1['art_id'].' class="desc-title"> '.$row1['art_title'].' </a>

                                         <p class="desc-content">'.$row1['art_category'].'</p>


                                         <p class="desc-content" style="float: right;">Rs.'.$row1['art_price'].'.00</p> <br>

                                          <p class="desc-content3"><br> Sold to: '.$row1['courier_name'].' </p>

                                          <p class="desc-content3" >Contact no: 0'.$row1['courier_contact'].'<br>'.$row1['shipping_house_num'].' '.$row1['shipping_street'].' '.$row1['shipping_brgy'].','.$row1['shipping_province'].'
                                          </p>

                                    </td>
                                </tr>
                            </table>
                        </div>';
        }
    }
        ?>


    </div>

</body>
</html>
