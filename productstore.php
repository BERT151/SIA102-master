<?php

require 'cart/check_if_added.php';
require 'include/connection.php';  
require 'include/function.php';  
require 'include/header.php'; 
?>
<!DOCTYPE html>
<html>
  <head>

     <link rel="stylesheet" href="css/productstore.css">

  </head>
  <body>
  <section class="product" id="product">
    <div class="sbox-container">
</div>
  <input type="text" name="search_box" id="search_box" class="searchp" placeholder="Search Product...." />
    <div class="gallery">
      <div  id="dynamic_content"></div>
    </div>

  </section>
  
  <script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"searchresult.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
  </script>
  <?php include 'include/footer.php'; ?>
  </body>
</html>

