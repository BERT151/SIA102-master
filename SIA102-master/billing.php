<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/billing.css">
    </head>
    <div class="container">
        <div class="left-container">
		<form action="" method="post">
            <p style="color: #18A6E3;"><?php echo $_SESSION['user']['Username']; ?></p>
            <p>Molave St. Brgy Malabon,</p>
            <p>Valenzuela City, 2133</p>
            <p><?php echo $_SESSION['user']['Email']; ?></p>
            <p>049</p>
        
            <table>
                <tr>
                  <th>Date</th>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>
                <tr>
                  <td>March 17, 2023</td>
                  <td>Gold Standard Red</td>
                  <td>1</td>
                  <td>750</td>
                </tr>
                <tr>              
              </table>

              <div style="text-align: right; margin-right: 10%;">
              <p><b style="color: #18A6E3;">Sub Total:</b>750</p>
              <p><b style="color: #18A6E3;">Shipping fee:</b>50</p>
              <p><b style="color: #18A6E3;">Total:</b>800</p>
                </div>
              <div class="form">
                <form action="/action_page.php">
                    <h4 style="color: #18A6E3;">Methods of Payment</h4>
                    <input type="radio" id="gcash" name="gcash" value="gcash">
                    <img src="https://ww1.freelogovectors.net/wp-content/uploads/2023/01/gcash-logo-freelogovectors.net_.png?lossy=1&ssl=1"><br>
                    <input type="radio" id="paymaya" name="paymaya" value="paymaya">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/PayMaya_Logo.png/1200px-PayMaya_Logo.png"><br>
                    <input type="radio" id="cod" name="cod" value="cod">
                    <img src="https://www.getnow.pk/wp-content/uploads/2020/06/cash-on-delivery-logo-01.png"><br> 
                </form>
              </div>   
             
                    <h4 style="color: #18A6E3;">Billing Address</h4>
                    <input type="radio" id="bilad" name="bilad" value="bilad">
                    <label for="bilad">Use a different billing Address</label><br>
                    <input type="radio" id="shipad" name="shipad" value="shipad">
                    <label for="shipad">Same as shipping address</label><br>  
                         
        </div>
        
        <div class="right-container">
          <hr>
            <h3 style="text-align: center; color: #18A6E3;">Cash on Delivery</h3>
            <p><b>Shipping address:</b>Molave St. Brgy. Malabon, Valenzuela City, 2133</p>
            <p><b>Contact Number:</b>09849848949</p>
            <p><b>Product:</b>Gold Standard Red</p>
            <p><b>Quantity:</b>1</p>
            <p><b>Sub Total:</b>750</p>
            <p><b>Shipping fee:</b>50</p>
            <p><b>Total:</b>800</p>
            <hr>
            <div class="button">
                <button style=background-color:red; type="button" onclick="alert('Oh no! whyy???')">Cancel</button>
                <button style=background-color:#18A6E3; type="button" onclick="alert('Successfully purchased.')">Confirm</button>
             </div>
             <hr>

        </div>
      </div>
      
      
    </body>
</html>