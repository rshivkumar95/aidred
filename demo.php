<?php 
if($_REQUEST['submit']){
    $i = "yes";
    if($i == "yes"){
    echo "<script>alert('hiii');</script>";
    }
}
?>
<form action="" method="post">
<input type="submit" name="submit" value="submit">
</form>