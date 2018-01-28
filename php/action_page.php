<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.01.2018
 * Time: 10:00
 */
$to = "marcin.wladymiruk@gmail.com";
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    /*$subject = test_input($_POST["email"]);*/
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $subject = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($subject, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    $txt = test_input($_POST["message"]);

    /*$headers = test_input($_POST["telephone"]);*/
    if (empty($_POST["telephone"])) {
        $telErr = "Telephone number is required";
    } else {
        $headers = test_input($_POST["telephone"]);
        // check if e-mail address is well-formed
        if (!filter_var($headers, FILTER_VALIDATE_INT, array("options" => array("min_range"=>100000000, "max_range" => 999999999)))) {
            $telErr = "Invalid email format";
        }
    }

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