<?php include("includes/head.php"); ?>
<!DOCTYPE HTML>
<HTML>
<title> Art Guide</title>
<style type="text/css">

   .head-artists {
          font-size: 30px;
          font-family: "Yu Gothic UI Light";
          color: rgb( 45, 112, 213 );
          position: absolute;
          left: 50px;
          top: 80px;
          z-index: 19;
          }

        .head-guide{
          font-size: 30px;
         font-family: "Yu Gothic UI Light";
          position: absolute;
           left:210px;
          top: 80px;
          z-index: 19;
        }

        .hr{
            position:absolute;
            border: 1px solid #2d70d5;
            top: 135px;
            width: 1140px;
            left: 49px;

        }
          .guide-background{

          background: url(pictures/guidelines_background.jpg) no-repeat fixed;
          background-size: cover;
          box-shadow: 1px 1.732px 2px 0px rgb( 55, 52, 52 );
          position: inherit;
          width: 100%;
          height: 100%;
          z-index: 1;

        }
        .word2{
            position: relative;
            top: 115px;
            left:80px;
            font-family:"Yu Gothic UI Light";
             font-size:18px;
            color: #f2f2f2;
            margin-right: 200px;
            text-align: justify;
        }
        .word1{
            position: relative;
            top:130px;
            left: 50px;
            color: white;
            font-weight: bold;
            font-family:"Yu Gothic UI Light";
             font-size:22px;
        }

</style>
<body class="guide-background">

            <p >
              <h2 class="head-artists">Customers' </h2>
              <h2 class="head-guide">Guide</h2><br> <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
           </p>

            <h3 class="word1">Buying art has never been so easy!</h3>
           <p class="word2">
                      1. Browse <a style="color:#f2f2f2;" href="home.php">Artworks</a> tab and find art you love. Place an order by clicking the it on the artwork page. Payment is in Cash on Delivery mode only.<br>
                      2. The artist will ship the artwork to your address by courier within 7 days. Shipping is free.<br>
                      3. The artwork is delivered to your home or office.
            </p>


            <h3 class="word1">How much does shipping cost?</h3>
                <p class="word2">We proudly offer free shipping to any location. Free shipping is automatically applied – no minimum purchase, coupons or promotion codes are required.</p>

            <h3 class="word1">Do you ship internationally?</h3>
                <p class="word2">No. Our destination is only open inside the India only.</p>

            <h3 class="word1">How do you ship artwork?</h3>
                 <p class="word2">All artwork is packaged in custom built art boxes to insure safe delivery. Artists send art via FedEx or any other. All artwork is shipped fully insured. Please note, a signature is required for delivery.</p>

            <h3 class="word1">What should I do if I receive a damaged piece of art?</h3>
                 <p class="word2">All artwork are shipped by artists in custom built art boxes to insure safe delivery, so receiving damaged art is a rare occurrence. If you receive a damaged piece of art, contact us within 24 hours at 1800-1234-1234</p>

            <h3 class="word1">What is the return policy?</h3>
                <p class="word2">We offer a seven-day money-back guarantee so you can try out the artwork in your home.</p>

            <h3 class="word1">What type of artwork do you exhibit?</h3>
                <p class="word2">ART GALLERY exhibits original artworks created by new and established artists.</p>

            <h3 class="word1">Does Abstract Art Gallery have a physical gallery location?</h3>
                <p class="word2">We do not operate a physical gallery.</p>


            <h3 class="word1">Who covers the costs of packaging and shipping the artwork to the Buyer’s address?</h3>
                <p class="word2">You (the artist) cover the cost of packaging and shipping the artwork to the Buyer.</p>

            <h3 class="word1" >Where is ART GALLERY based?</h3>
                <p class="word2">Our main office is located in NITK, Mangalore, India although we are primarily a virtual gallery.</p>

              <h3 class="word1">How does you price artwork?</h3>
                <p class="word2">Artwork is priced using artist input . When artists submit images of their work, they are asked to enter desired prices for each piece.</p>

            <br><br><br><br><br><br><br><br><br>

        <!--<?php
        $file = fopen("guidelines.txt","r");
        while(! feof($file))
          {
          echo fgets($file);
          }
          fclose($file);
          ?>-->

 </body>
</HTML>
<?php include("includes/footer.php"); ?>