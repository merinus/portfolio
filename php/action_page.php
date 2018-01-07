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
$fireworks = $_POST["fireworks"];
$music = $_POST["music"];
$sylwester = $_POST["sylwester"];

mail($to,$subject,$txt,$headers);

echo "<h2>Przesłane do mnie informacje:</h2>";
echo "Twoje imię i nazwisko: ".$subject;
echo "<br>";
echo "Twój e-mail: ".$headers;
echo "<br>";
echo "Twoja wiadomość: ".$txt;
echo "<br>";
if ($fireworks == "yes"){
    $fireworks = "Tak";
} else{
    $fireworks = "Nie";
}
echo "Czy odpalałeś ognie sztuczne: ".$fireworks;
echo "<br>";
echo "Ulubiony rodzaj muzyki: ";
$music = implode(', ', $_POST['music']);
echo $music;
echo "<br>";
echo "Gdzie spędzałeś/aś Sylwestra?: ".$sylwester;
?>