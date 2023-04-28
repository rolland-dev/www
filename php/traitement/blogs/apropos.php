<?php


?>


<!DOCTYPE html>
<html lang="en">

    <?php
        $titre = 'A Propos';
        require_once './my_includes/html_head.php';

    ?>
<body>

    <?php include_once ('./my_includes/myheader.inc.php'); ?>

    <div class="container">
    <div class="jumbotron">
          <h1 class="display-3"><?= $titre. ' -' ?></h1>
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
    </div>



    <?php include_once ('./my_includes/myfooter.inc.php');  ?>

    <?php include_once ('./my_includes/html_script.php'); ?>

</body>
</html>