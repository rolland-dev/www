<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
    $titre = 'A propos'; 
    require_once ('myincludes/html_head.php');
?>

<body onload="checkCookie();">

<div class="container">
        <?php  include_once('myincludes/myheader.inc.php');?>
  
        <div class="jumbotron">
          <h1 class="display-4">A Propos de mon blog</h1>
          <p class="lead">
            <p>
             Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore quia alias nihil laborum quos dolor dolores dolore dolorem repellendus! Nam, magni. Nulla tenetur fugiat exercitationem eaque minus. Officia, similique quisquam.
            <br>
            Quaerat illum iste nobis atque illo, necessitatibus quos, voluptatum sequi ipsam culpa eos, suscipit rerum eum ullam assumenda vitae cupiditate obcaecati excepturi odit dolorem laboriosam impedit labore eveniet. Dolores, quis.
            <br>
            Adipisci mollitia omnis dignissimos at praesentium ex aperiam debitis nesciunt architecto repellat. Suscipit laboriosam exercitationem, assumenda dolorem similique et fuga, ex eos, maiores fugit voluptatum sunt pariatur adipisci reprehenderit quos?
            <br>
            Unde eligendi dolores maxime officiis cum harum ut? Saepe magnam nemo, hic non, nobis reiciendis quos impedit officiis voluptatum deserunt ad adipisci? Molestias minima tenetur ab, explicabo officia iusto assumenda.
            <br>
            </p>

              Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
        </div>   
        <?php  include_once('myincludes/myfooter.inc.php')?>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/blog.js"></script>
</body>

</html>