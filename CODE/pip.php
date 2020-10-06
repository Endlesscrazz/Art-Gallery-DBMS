
<!DOCTYPE html>
 <html>
  <style>
   /* Full-width input fields */
   input[type=text], input[type=password] {
    width: 100%;
     padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
       border: 1px solid #ccc;
        box-sizing: border-box;
         }
          /* Set a style for all buttons */
           button {
            background-color: #48d1cc;
            color: white;
             padding: 14px 20px;
              margin: 8px 0;
               border: none;
                cursor: pointer;
                 width: 100%;
                  }
                  .cancelbtn {
                   width: auto;
                    padding: 10px 18px;
                     background-color: #4682b4;
                      } /* Center the image and position the close button */
                       .container { padding: 16px; }
 span.psw { float: right; padding-top: 16px; }
 /* The Modal (background) */ .modal
 { display: none;
    position: fixed;
     z-index: 0;
      left: 0;
      top: 0;
       width: 100%;
        height: 100%;
         overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);

         padding-top: 60px;
          }
           .modal-content { background-color: #fefefe; margin: 5% auto 15% auto; border: 1px solid #888; width: 80%; }

            /* The Close Button (x) */
            .close { position: absolute; right: 150px; top: 200; color: #000; font-size: 35px; font-weight: bold; }
            .close:hover, .close:focus { color: red; cursor: pointer; } /* Add Zoom Animation */
            .animate { -webkit-animation: animatezoom 0.6s; animation: animatezoom 0.6s } @-webkit-keyframes animatezoom { from {-webkit-transform: scale(0)} to {-webkit-transform: scale(1)} } @keyframes animatezoom { from {transform: scale(0)} to {transform: scale(1)} } /* Change styles for span and cancel button on extra small screens */ @media screen and(max-width: 300px){ span.psw { display: block; float: none; } .cancelbtn { width: 100%; } }
            .whiteborder{
            border-radius: 8px;
            background-color: #f2f2f2;
            box-shadow: 1px 1px 5px 0px #fff;
            padding: 50px;
            position: relative;
            top:50px;
            right: -100px;
            width: 900px;
            height: 300px;
        }
</style>
<body>

  <button onclick="document. getElementById('id01') .style.display='block'" style="width:auto;">see more</button>
   <div id="id01" class="modal">
        <div class="imgcontainer">
     <span onclick="document .getElementById('id01') .style.display='none'" class="close" title="Close Modal"> &times;</span>

     </div> <div class="container">
     <a href = "orders(planb).php"> Go Back </a>
      <div class="whiteborder">
        <h3> Dear '.$courier_name.',</h3>

         <p>
            Your Order # '.$id.' has been placed on '.$ordered_date.' via Cash on Delivery.
            <br><br>

            Note:<br><br>
            In the event that the information you provided is incomplete, a validation may be sent through phone call or SMS as part of Albay Artworks\'s order verification requirement.<br> Please be kind enough to respond if you receive either a call from (02)795 8900 or an SMS from sender Albay Artworks. If you do not receive any communication from us <br>your order will automatically be processed.<br><br>
            Order validations will be conducted between 8am and 9pm, from Monday to Sunday. Failure to respond to either the call or the SMS will result in order cancellation/s.<br><br>
            After your order is validated, we will send you another email confirming the shipping of your order.
        </p>
        </div>
           <script> // Get the modal var modal = document.getElementById ('id01'); // When the user clicks anywhere outside of the modal, close it window.onclick = function(event) { if (event.target == modal) { modal.style.display = "none"; } } </script>
            </body>
             </html>
