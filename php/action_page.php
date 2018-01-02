<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.01.2018
 * Time: 10:00
 */
$to = "marcin.wladymiruk@gmail.com";
$subject = $_POST["full_name"];
$txt = $_POST["message"];
$headers = $_POST["email"];

mail($to,$subject,$txt,$headers);
?>