<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.01.2018
 * Time: 10:00
 */
$to = "marcin.wladymiruk@gmail.com";
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    /*$headers = test_input($_POST["telephone"]);*/
    if (empty($_POST["telephone"])) {
        $telErr = "Telephone number is required";
        die($telErr);
    } else {
        $headers = test_input($_POST["telephone"]);
        // check if e-mail address is well-formed
        if (!filter_var($headers, FILTER_VALIDATE_INT, array("options" => array("min_range"=>100000000, "max_range" => 999999999)))) {
            $telErr = "Invalid phone number format";
            die($telErr);
        }
    }


    /*$subject = test_input($_POST["email"]);*/
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        die($emailErr);
    } else {
        $subject = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($subject, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            die($emailErr);
        }
    }

    $txt = test_input($_POST["message"]);

    $f_name = test_input($_POST["f_name"]);
    $l_name = test_input($_POST["l_name"]);

    $city = test_input($_POST["city"]);
    $street = test_input($_POST["street"]);
//    $fireworks = test_input($_POST["fireworks"]);
//    $music = test_input($_POST["music"]);
//    $sylwester = test_input($_POST["sylwester"]);
}


//mail($to,$subject,$txt,$headers);

echo "<h2>Przesłane do mnie informacje:</h2>";

echo "E-mail: ".$subject;
echo "<br>";
echo "Numer telefonu: ".$headers;
echo "<br>";
echo "Twoja wiadomość: ".$txt;
echo "<br>";

/*if ($fireworks == "yes"){
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
echo "Gdzie spędzałeś/aś Sylwestra?: ".$sylwester;*/

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Database connection

$link = mysqli_connect("portfolio.test", "root", "12345", "new_test");

if ($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    echo "<br>";
}

echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);
echo "<br>";

//INSERTING DATA TO DATABASE

//----customers table----
$sql = "INSERT INTO customers (first_name, last_name) VALUES ('$f_name', '$l_name')";

if(mysqli_query($link, $sql)){
    echo "Records inserted successfully to 'customers' table.";
    echo "<br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "<br>";
}
die;
//----address table----
$sql = "INSERT INTO address (city, street) VALUES ('$city', '$street')";

if(mysqli_query($link, $sql)){
    echo "Records inserted successfully to 'address' table.";
    echo "<br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "<br>";
}

?>