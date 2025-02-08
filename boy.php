<?php include_once('header.php');
include('hms/include/config.php'); ?>
<script>
  $(document).ready(function(){
 $(document).on('click','#addItem',function(e){
e.preventDefault();
var form=$(this).closest(".form-submit");
var pcode=form.find('.pcode').val();
var pname=form.find('.pname').val();
var pimage=form.find('.pimage').val();

var pprice=form.find('.pprice').val();
//var $this = $(this);
var alertmsg=form.find('.alert-message');
$.ajax({
url:'action.php',
method:'post',
data:{pcode:pcode,pname:pname,pimage:pimage,pprice:pprice},
success:function(response){
  console.log(response);
  alertmsg.html(response);

  // $this.closest('.alert-message').html(response)
  //$(this).closest('.alert-message').html(response);
 //alertmsg.html(response);
  //window.scrollto(0,0);
  load_cart_item_number();
}
});

 });

  load_cart_item_number();
function load_cart_item_number(){
  $.ajax({
url:'action.php',
method:'get',
data:{cartItem:"cart_item"},
success:function(response){

  $("#cart-item").html(response);
  
}
});
}

  });
 
</script>
          <section class="heade">
            <div class="container">
                <div class="row">
                    <a href="http://localhost/rental_cloth_shop/boy.php"><p class="cat">Blazer</p></a>
                    <a href="http://localhost/rental_cloth_shop/formal.php"><p class="cat">Kurta Pyjama</p></a>
                    <a href="http://localhost/rental_cloth_shop/traditional.php"><p class="cat">Traditional Costumes </p></a>
                </div>
            </div>
          </section>
          <section class="section7">
                <div class="container">
                  <div class="row">

                  <?php
             $procat='boy';
             $blazers='blazers';
$sql=mysqli_query($con,"select * from product where procat='$procat' && subprocat='$blazers'");


while($row=mysqli_fetch_array($sql))
{ 
  ?>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    
                    <a class="imgpro"><center><img src="hms/images/<?php echo $row['proimg'];?>" height="400" width="100%"></center></a>
                    <div class="price"><p><?php echo $row['proname'];?></p><p><b>₹.<?php echo $row['proprice'];?> Rent</b></p></div>
                    <center>
                      <form class="form-submit">
                                       <input type="hidden" class="pname" value="<?php echo $row['proname'];?>">
                                        <input type="hidden" class="pprice" value="<?php echo $row['proprice'];?>">
                                        <input type="hidden" class="pimage" value="<?php echo $row['proimg'];?>">
                                        <input type="hidden" class="pcode" value="<?php echo $row['id'];?>">

                                        <button id="addItem" class="btn-success btn button btn1">Add to cart</button>
                                        <div class="alert-message"></div>

                                      </form></center>
                                    
                                    <!-- </div> -->
                                     
                      <!-- <center><div><a class="btn1" href="#">Rent Now</a></div></center> -->
                      
                    </div>
                    <?php } ?>
                    
                    
</div>

                </div>
            </section>
        
            <?php include_once('footer.php'); ?>