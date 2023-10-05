<?php
require "settings/init.php";


$data = json_decode(file_get_contents('php://input'), true);

/*
Det her er hvad vi ønsker der skal sendes med i vores service. (KickPHP er det password der er valgt, men det kan være hvad som helst)
    - Password skal udfyldes og være KickPHP
    - nameSearch = Valgfri
*/

header('content-type: application/json; chartset=utf-8');

$data["password"] = "KickPHP";

if($data["password"] == "KickPHP") {

/*
    Kode eksempel fra video undervisning:
    $sql = "SELECT * FROM bog WHERE 1=1 ";
    $bind = [];
*/
    $sql = "SELECT * FROM bog WHERE bogPris> 100 AND bogPris <= 200 AND bogSider< 300 ORDER BY bogPris ASC ";
    $bind = [];

    /* Her er valgt $data, da det er det vi har kaldt i linje 5 + nameSearch, da vi har valgt vi ville have det med linje 11
    - Denne kode: $sql = $sql . ""; er skrevet kortere med denne = $sql .= "";
    */
    if(isset($data["nameSearch"]) && !empty($data["nameSearch"])){
        $sql .= " AND bogTitel = :bogTitel ";
        $bind[":bogTitel"] = $data["nameSearch"];
    }

    $bog = $db->sql($sql, $bind);
    header("HTTP/1.1 200 OK");

    /* Grunden til json_encode er, at så kommer det som et json format og ikke et array*/
    echo json_encode($bog);

} else{
    header("HTTP/1.1 401 Unauthorized");
    $error["errorMessage"] = "Dit kodeord var forkert";

    echo json_encode($error);
}


?>

