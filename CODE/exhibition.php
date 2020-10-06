<?php include("includes/head.php"); ?>

<!DOCTYPE html>
 <html>
 <head>
 <title>Artworks</title>
 <style>
select {
           border-radius: 5px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
          border: 1px solid steelblue;
          background-color: white;
          font-family: "Yu Gothic UI Light";
          position: relative;
          left: 200px;
          top: 80px;
          width: 250px;
          height: 40px;
        }

       input{
           border-radius: 5px;
           box-shadow: 1px 1.732px 5px 0px rgb( 55, 52, 52 );
           border: 1px solid rgb(33,33,33);
          font-weight: bold;
          background-color: #234;
          font-family: "Yu Gothic UI Light";
          color: white;
          position: relative;
          left: 200px;
          top: 80px;
          width: 150px;
          height: 40px;
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
            border: 8px solid white;
            box-shadow: 0px 6px 20px 0px rgba(0, 0, 0, 0.2);
            background-color: #fafafa;
            border-collapse: collapse;
            float: left;
            overflow: auto;
            margin: 0px 50px 100px 0px;
        }
        .space{
          margin-top: 120px;
          position: relative;
          left:130px;

        }



</style>
              </head>
              <body>



                <form action="search_exhibition.php" method="POST">
                <select id="Category" name="Category">

                 <option value="">CATEGORY</option>
                 <option value="Painting">Paintings</option>
                 <option value="Sculpture">Sculpture</option>
                 <option value="Photography">Photography</option>
                 <option value="Drawing">Drawings</option>

                  </select>

                  <select id="medium"  name="Medium">
                  <option value="">FOR PAINTIN MEDIUM  </option>
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

  <option value="">FOR SCULPTURE MEDIUM </option>
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

                <option> FOR DRAWING MEDIUM</option>
                 <option value="Ballpoint Pen">Ballpoint Pen</option>
                 <option value="Chalk">Chalk</option>
                 <option value="Charcoal">Charcoal</option>
                 <option value="Digital">Digital</option>
                 <option value="Graphite">Graphite</option>
                 <option value="Ink">Ink</option>
                 <option value="Marker">Marker</option>
                 <option value="Pastel">Pastel</option>
                 <option value="Pencil">Pencil</option>

      <option value="">FOR PHOTOGRAPHY MEDIUM</option>
                 <option value="Polaroid">Polaroid</option>
                 <option value="Color">Color</option>
                 <option value="Digital">Digital</option>
                 <option value="C-type">C-type</option>
                 <option value="Black & White">Black & White</option>
                 <option value="Photogram">Photogram</option>
                 <option value="Platinum">Platinum</option>
                 <option value="Gelatin">Gelatin</option>
                 <option value="Manipulated">Manipulated</option>


                  </select>
                  <select id="Price" name="Price">

                  <option value="">PRICE</option>
                 <option value="5001">less than 5,000 pesos</option>
                 <option value="10001">less than 10,000 pesos</option>
                 <option value="50001">less than 50,000 pesos</option>
                 <option value="500001">less than 500,000 pesos</option>
                  <option value="1000001">less than 1,000,000 pesos</option>

                  </select>

                 <input type="submit" name="submit" value="SEARCH">

                  </form>

      <div style="margin-left:20px;margin-right:20px;">

        <?php

            $delete_query = "DELETE FROM exhibition WHERE exhibition.ART_ID in ( select buy_transaction.ART_ID from buy_transaction where exhibition.ART_ID=buy_transaction.ART_ID)";

            mysqli_query($conn,$delete_query);

            $query_category1="SELECT exhibition.art_imagepath,exhibition.art_id, exhibition.art_title,exhibition.art_price, user.user_fname, user.user_mname,user.user_lname,exhibition.art_description,exhibition.art_imagepath,exhibition.art_status,exhibition.art_category
                         FROM exhibition, user
                        where exhibition.user_id = user.user_id ORDER BY exhibition.art_title ASC";
            $result_category1 = mysqli_query($conn,$query_category1);
 if(mysqli_num_rows($result_category1) <=0)
        {
            echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align="Center">No Artworks Available </h1>';
        }
        else{
            while($row1 = mysqli_fetch_array($result_category1))
{

                  echo ' <div class="space" >
                            <table  class="pic-table">
                                <tr>
                                    <td>
                                        <img class="photo" src="pictures/arts/'.$row1['art_imagepath'].'" > <br>'.

                                        '<a  href=info_art.php?id='.$row1['art_id'].' class="desc-title"> '.$row1['art_title'].' </a>

                                         <p class="desc-content">'.$row1['art_category'].'</p>

                                         <p class="desc-content" style="float: right;">P'.$row1['art_price'].'.00</p> <br>

                                         <p class="desc-content2">'.$row1['user_fname'].' '.$row1['user_mname'].' '.$row1['user_lname'].'</p>
                                    </td>
                                </tr>
                            </table>
                        </div>';
            }
}
        echo "<br><br>";

  
        ?>
    </div>
<p class="title"></p>
<?php

include("includes/footer.php");
?>
</div>
</body>
