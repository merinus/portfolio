<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.01.2018
 * Time: 10:00
 */
$to = "marcin.wladymiruk@gmail.com";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $subject = test_input($_POST["full_name"]);
    $txt = test_input($_POST["message"]);
    $headers = test_input($_POST["email"]);
    $fireworks = test_input($_POST["fireworks"]);
    $music = test_input($_POST["music"]);
    $sylwester = test_input($_POST["sylwester"]);
}


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
echo "Ulubiony rodzaj muzyki: </br>";

if(isset($_POST['submit'])){//to run PHP script on submit
    if(!empty($_POST['music'])){
// Loop to store and display values of individual checked checkbox.
        foreach($_POST['music'] as $selected){
            echo $selected."</br>";
        }
    }
}

echo "<br>";
echo "Gdzie spędzałeś/aś Sylwestra?: ".$sylwester;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>