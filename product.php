

<?php include_once('header.php'); 
include('hms/include/config.php');
?>
<script>
  $(document).ready(function(){
 $(document).on('click','#addItem',function(e){
e.preventDefault();
var form=$(this).closest(".form-submit");
var pcode=form.find('.pcode').val();
var pname=form.find('.pname').val();
var pimage=form.find('.pimage').val();

var pprice=form.find('.pprice').val();
// var prprice=form.find('.prprice').val();
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
                <a href="http://localhost/rental_cloth_shop/product.php"><p class="cat">Lehenga</p></a>
                <a href="http://localhost/rental_cloth_shop/saree.php"><p class="cat">saree</p></a>
                <a href="http://localhost/rental_cloth_shop/partywear.php"><p class="cat">Party Wear</p></a>
                <a href="http://localhost/rental_cloth_shop/trad.php"><p class="cat">Traditional Costumes</p></a>
                </div>
            </div>
          </section>

         
            <section class="section7">
                <div class="container">
                  <div class="row">

                  <?php
             $procat='women';
             $lehenga='lehenga';
$sql=mysqli_query($con,"select * from product where procat='$procat' && subprocat='$lehenga'");


while($row=mysqli_fetch_array($sql))
{ 
  ?>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    
                    <a class="imgpro"><center><img src="hms/images/<?php echo $row['proimg'];?>" height="400" width="100%"></center></a>
                    <div class="price"><p><?php echo $row['proname'];?></p></div><center><div id="colour"><p>₹.<?php echo $row['proprice'];?> Rent</p></div></center>
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