<?php
$sql = "select * from books where isarchived = true";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Database pas accessible");
}
$allArchived = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

if(count($allArchived)==0){
    header('Location: index.php');
}
?>
<form method="post">
    <div class="form-group">
        <label class="col-md-12 control-label" for="idlivre">Choisissez un livre :</label>
        <div class="col-md-12">
            <select id="idlivre" name="idlivre" class="form-control">
            <?php
            foreach ($allArchived as $key => $value) {
                echo '<option value="' . $value['id']. '" >' . $value['titre'] . '</option>';
            }
            ?>
            </select>
            <br>
            <button type="submit" name="validedesarchive" value="validedesarchive" class="col-md-4 form-control btn-primary">Désarchiver</button>
        </div>
        
    </div>
</form>