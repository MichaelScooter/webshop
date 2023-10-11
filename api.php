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
    Eksempel: "SELECT * FROM bog WHERE bogPris> 100 AND bogPris <= 200 AND bogSider< 300 ORDER BY bogPris ASC "
*/
    $sql = "SELECT * FROM bog WHERE 1=1 ";
    $bind = [];

    /* Her er valgt $data, da det er det vi har kaldt i linje 5 + nameSearch, da vi har valgt vi ville have det med linje 11
    - Denne kode: $sql = $sql . ""; er skrevet kortere med denne = $sql .= "";
    */
    if(isset($data["nameSearch"]) && !empty($data["nameSearch"])){

        /* LIKE CONCAT('%', :bogTitel, '%') gør, at vi leder efter det der bliver tastet ind i bogTitel (Søgefelt på shop siden), men der må gerne være noget før og efter, som vi ikke ved hvad er. Det er % tegnene der står som jokere på pladsen */
        $sql .= " AND bogTitel LIKE CONCAT('%', :bogTitel, '%') ";
        $bind[":bogTitel"] = $data["nameSearch"];
    }

    $sql .= " ORDER BY bogTitel ASC";

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

