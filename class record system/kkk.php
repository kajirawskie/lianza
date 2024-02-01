<?php
$query = "SELECT * FROM auth  inner JOIN
user  on auth.id=user.user_id where auth.`user`='".$_SESSION['user']."'";

$res="SELECT `file` FROM auth  inner JOIN
    images  on auth.id=images.img_id where auth.`user`='".$_SESSION['user']."'";


?>