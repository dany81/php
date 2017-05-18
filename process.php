<?php
// isset fuggveny megnezi, letezik-e a valtozo
if(isset($_POST["fname"])) {
    // inc konyvtarban levo database.php
    require './inc/database.php';
    // szures emailcimre
    $fname = filter_var($_POST["fname"],FILTER_VALIDATE_EMAIL);
    
    // hibauzenetek
    $errormessage = array("response"=>"-1", "message"=>"Ismeretlen hiba!");
    $okmessage = array("response"=>"1", "message"=>"Rendben");
    $notokmessage = array("response"=>"-1", "message"=>"Ez a felhasználónév nem létezik");
    
    $mysqli = new mysqli($database_settings["url"], 
            $database_settings["username"], 
            $database_settings["password"], 
            $database_settings["database"]);
    if ($mysqli->connect_errno) {
        print(json_encode($errormessage));
        exit();
    }
    $mysqli->query("SET NAMES 'utf8'");

    // az input mezobol atadasra kerult aktualis ertek lekerdezese az adatbazisbol
    if ($result = $mysqli->query("SELECT id FROM systemuser WHERE email = '".$fname."'")) {
        if($result->num_rows > 0){
            // ha van talalat, uzenet kiirasa
            print(json_encode($okmessage));
        }else{
            // ha nincs talalat, hibauzenet kiirasa
            print(json_encode($notokmessage));
        }
        $result->close();
    }
    $mysqli->close();
}

?>