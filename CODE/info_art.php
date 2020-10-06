<?php include("includes/connection.php");

include("includes/head.php");



  ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style>

     .border{
          position: absolute;
          top: 130px;
          left: 50px;
          width:1180px;
          height: 650px;

          border-radius: 12px;
        float: left;
        border: 1px solid none;
        background-color: white;

    }

        .img{
            position: absolute;
            left: 80px;
            top: 50px;
            width:450px;
            height: 450px;
            box-shadow: 1px 1px 10px 0px rgb( 55, 52, 52 );
        }

        .head-title{
          font-family: "Yu Gothic UI Light";
          font-size: 45px;
          color: #2d70d5;
          position: absolute;
          font-variant: small-caps;
          left: 700px;
          top: 10px;
        }

        .artist{
          font-size: 20px;
          font-family: "Yu Gothic UI Light";
          color: #333333;
          position: absolute;
          left: 700px;
          top: 130px;
          z-index: 3;
        }

        .buybutton{
          cursor: pointer;
          border-radius: 8px;
           font-family: "Yu Gothic UI Light";
           color: white;
           font-size: 15px;
           font-weight: bold;
           text-align: center;
           border: none;
           box-shadow: 1px 1px 5px 0px rgb(0, 0, 1);
           margin-right: 30px;
           background-color: #29a32f;
           position: absolute;
           top: 247px;
           right: 300px;
           width: 150px;
           height: 70px;
           z-index: 50;
        }
        .soldbutton{
          border-radius: 8px;
           font-family: "Yu Gothic UI Light";
           color: white;
           font-size: 15px;
           font-weight: bold;
           text-align: center;
           border: none;
           box-shadow: 1px 1px 5px 0px rgb(0, 0, 1);
           background-color: #aaa;
           padding: 15px;
           position: absolute;
           top: 233px;
           right: 340px;
           width: 110px;
           height: 40px;
           z-index: 50;
        }
        .contact{
           border-radius: 8px;
           border: none;
           box-shadow: 1px 1px 5px 0px rgb(0, 0, 1);
           background-color: #aa1313;
           font-family: "Yu Gothic UI Light";
           color: white;
           text-align: center;
           font-size: 15px;
           font-weight: bold;
           padding: 12px 10px 8px 10px;
           position: absolute;
           top: 233px;
           right: 195px;
           width: 100px;
           height: 50px;
           z-index: 30;
        }

        .hr{
            position: absolute;
            top: 325px;
            left: 700px;
            width: 440px;
            z-index: 40;
        }

        .about{
          font-size: 17px;
          font-family: "Yu Gothic UI Light";
          color: #333333;
          position: absolute;
          left: 700px;
          top: 325px;
          height: 35px;
          z-index: 3;
          font-weight: bold;
        }

        .desc{
          font-size: 14px;
          font-family: "Yu Gothic UI Light";
          text-align: justify;
          text-indent: 50px;
          color: #333333;
          position: absolute;
          left: 700px;
          top: 360px;
          width:450px;
          height: 240px;
          z-index: 1;
          overflow: scroll;
        }
        .rate1{
          font-size: 60px;
          font-family: "Yu Gothic UI Light";
          color: #333333;
          position: absolute;
          left: 225px;
          top: 450px;
          z-index: 3;
        }

         .rate{
          font-size: 25px;
          font-family: "Yu Gothic UI Light";
          color: #333333;
          position: absolute;
          left: 115px;
          top: 500px;
          z-index: 3;
        }

        #rate {
           border-radius: 10px;
           box-shadow: 1px 1px 5px 0px rgb( 55, 52, 52 );
          border: 3px solid steelblue;
          background-color: white;
          text-align: right;
          font-family: "Yu Gothic UI Light";
          font-size: 15px;
          position: absolute;
          left: 215px;
          top: 65px;
          width: 40px;
          height: 40px;
        }
        #ratebtn{
            cursor: pointer;
            border-radius: 8px;
            box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          background-color:#2d70d5;
          font-family: "Yu Gothic UI Light";
          border:1px;
          font-size: 15px;
          font-weight: bold;
          position: absolute;
          left: 310px;
          top: 65px;
          width: 80px;
          height: 35px;
        }
        #comment{
          font-size: 14px;
          font-family: "Yu Gothic UI Light";
          color: black;
          position: relative;
          left: 50px;
          top: 850px;
          margin-bottom: -100px;

        }
        #post-comment{
          font-size: 14px;
          font-family: "Yu Gothic UI Light";
          font-size: 100%;
          color: black;
          position: relative;
          left: 35px;
          top: 800px;
          margin-bottom: -100px;
          z-index: 10;
        }
        #commentbtn{
            cursor: pointer;
            border-radius: 8px;
            box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          background-color:#2d70d5;
          font-family: "Yu Gothic UI Light";
          border:1px;
          font-size: 15px;
          font-weight: bold;
          position: relative;
          left: 1060px;
          top: 0px;
          width: 80px;
          height: 35px;
          margin-bottom: 50px

        }
        .deletecomment{
          cursor: pointer;
          border-radius: 8px;
          border: 1px solid none;
         background-color: #ee1127;
          font-family: "Yu Gothic UI Light";
          font-size: 15px;
          color: white;
          position:relative;
          top: 0px;
          left: 680px;
          padding: 7px;
          z-index:100;
        }



        </style>
        <?php  $user_id = $_SESSION['USER_ID'];
        $art_id = $_GET['id'];
        $_SESSION['art_id'] = $art_id;
        ?>
<body style="margin-bottom: 20px;">
<script>
function YNconfirm() {
    if (window.confirm('Are you sure you want to delete this comment?'))
    {
        return true;
    }
    else
        return false;
};
</script>
    <div class="border">
<form action="shipping.php" method="POST">
<?php

$query_category1="SELECT ART_IMAGEPATH,art_category FROM art_work WHERE art_id = '$art_id'";
        $result_category1 = mysqli_query($conn,$query_category1);

        while($row=mysqli_fetch_array($result_category1)){

            echo '<a href= "pictures/arts/'.$row['ART_IMAGEPATH'].'"> <img class="img" src="pictures/arts/'.$row['ART_IMAGEPATH'].'" ></a><br />';
        }





$query_category="SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_width,art_work.art_height,art_work.art_media,art_work.art_category,user.user_contact,art_work.art_thickness,art_work.art_status,art_work.art_stock
                         FROM art_work,user
                        where art_work.user_id = user.user_id AND
                            art_id = '$art_id'";
        $result_category = mysqli_query($conn,$query_category);

        while($row=mysqli_fetch_array($result_category)){
          $_SESSION['art_stock'] = $row['art_stock'];
          $_SESSION['cat'] = $row['art_category'];
            echo '<p class="head-title" >'. $row['art_title'].'</p>

                  <p class="artist">'.$row['user_fname'].' '.$row['user_mname'].' '.$row['user_lname'].'<br>'.$row['art_category'].' ~ '.$row['art_width'].' x '.$row['art_height'].' x '.$row['art_thickness'].'<br>Stock: '.$row['art_stock'].'</p><br><br><br>';
if($row['art_status'] == 'SOLD'){
    echo '<p class="soldbutton">'.$row['art_status'].' for<br> Php. '.$row['art_price'].'.00</form>';
}
else if($row['art_status'] == 'AVAILABLE' && $row['art_stock'] == 0){
       echo '<p class="soldbutton"> SOLD OUT <br> Php. '.$row['art_price'].'</form>';
     }
else{
       echo '<input  class="buybutton" type="submit" name="buy" value="BUY for Rs. '.$row['art_price'].'"></form>';
     }

echo '
           <br><br><p class="contact"> Contact Seller 0'.$row['user_contact'].

                 '<hr class="hr"><p class="about">About this Artwork</p>  <br><br> <p class="desc">'.$row['art_description'];
           //rating

if(isset($_SESSION['USER_ID'])){
  $query = mysqli_query($conn, "SELECT user_id FROM rating WHERE user_id= '$user_id' AND art_id = '$art_id' ") or die("Failed to query database ".mysqli_error($conn));

$count = mysqli_fetch_row($query);

if ($count>0){

}

  else{
          echo' <p class="rate"><form action="rate_art.php" class="rate" method = "POST"><br><br>Rate This Artwork:&nbsp;&nbsp;&nbsp;&nbsp;
                <select id = "rate" name="rate">
                          <option value="5" selected>5</option>
                          <option value="4">4</option>
                           <option value="3">3</option>
                            <option value="2">2</option>
                             <option value="1">1</option>
                          </select>
                <input id="ratebtn" type="submit" name="submit" value ="Submit">
                  </p></form>


'; }
}
$sql11 = "SELECT AVG(rating_value) FROM rating WHERE art_id = '$art_id'";
    $result_category21 = mysqli_query($conn,$sql11);
while($row21 = mysqli_fetch_array($result_category21)){
           echo '<h1 class="rate1">'.$row21['AVG(rating_value)'].'</h1></div>';

}
}






//comment




        $sql = "SELECT user.user_fname, user.user_mname,user.user_lname,user.user_imagepath,comment.comment_date,comment.comment_content,user.user_imagepath,comment.user_id,comment.comment_id FROM comment,user,art_work
        WHERE comment.art_id = art_work.art_id AND comment.user_id = user.user_id AND comment.art_id = $art_id ORDER BY comment.comment_date ASC";
$result_category2 = mysqli_query($conn,$sql);
while($row2 = mysqli_fetch_array($result_category2)){

   echo '<div id ="comment">
                      <table  style="border:5px solid none;border-collapse: collapse;" cellspacing="3" cellpadding="">
                          <tr>
                              <td>
                                  <a href= "pictures/profile/'.$row2['user_imagepath'].' account.php"> <img src="pictures/profile/'.$row2['user_imagepath'].'" style= "border-radius: 80px;height: 130px; width: 130px;" ></a>
                              </td>
                          </tr>
                      </table>

                      <table  style="border:5px solid none;border-collapse: collapse; position:relative; top:-130px;left:140px; margin-bottom: 10px;" cellspacing="3" cellpadding="">
                          <tr>
                              <td style="font-size: 18px; font-family:"Yu Gothic UI"; font-weight:bold; color:#f2f2f2;">
                                  '.$row2['user_fname'].' '.$row2['user_mname'].' '.$row2['user_lname'].'&nbsp;
                              </td>
                               <td style="font-size: 18px; font-family:"Yu Gothic UI"; font-weight:bold;color:#f2f2f2; ">~
                                  '.$row2['comment_date'].'<br>
                              </td>
                              ';

                              if($_SESSION['USER_ID'] == $row2['user_id']){
                                $comment_id = $row2['comment_id'];
                              echo '
                              <td>
           <!--Delete Comment-->     <a class="deletecomment" href="delete_comment.php?comment_id='.$comment_id.'&art_id='.$art_id.'" onclick="return(YNconfirm());"> &#10006; Delete</a>
                              </td>

                              ';
                            }
                              echo '
                          </tr>
                      </table>

                       </table>
                       <table  cellspacing="3" cellpadding="" style="border-collapse: collapse; position:relative; top:-130px;left:140px; margin-bottom: 10px;border: 1px solid #fff" >

                          <tr>
                              <td style="border-radius:10px; background-color: #f2f2f2;" width="1030" height="90">
                                  '.$row2['comment_content'].'<br>
                              </td>
                          </tr>
                      </table>

                  </div>';
   }
     echo '<div id = "post-comment">
                        <form name="comment" method="post" action="comment_action.php?art_id='.$art_id.'" onSubmit="">
                           <table width="500" border="0" cellspacing="3" cellpadding="3" style="">';

                      if(isset($_SESSION['USER_ID'])){
                           echo'<tr>
                                    <td align="right" id="one">
                                    </td>
                                    <td>
                                       Comment:<br><textarea name="message" id="tmessageid" style="width:1150px;height:100px; border-radius:8px;border:1px solid none;"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" id="one">
                                    </td>
                                    <td>
                                        <input id="commentbtn"  type="submit" name="submit" id="commentbtn" value="Post">
                                    </td>
                                </tr>
                        </table>
                    </form>';
}

            ?>

            <br>


</body>
</html>
