<?php
require "settings/init.php";

if(!empty($_GET["type"])) {
    if($_GET["type"] == "slet"){
        $id = $_GET["id"];

        $db->sql("DELETE FROM bog WHERE bogId = :bogId", [":bogId"=>$id], false);
    }


}

$bog = $db->sql("SELECT * FROM bog ORDER BY bogTitel ASC");

?>


<!-- Instruktion til webbrowser om at vi kører HTML5 -->
<!DOCTYPE html>

<!-- html starter og slutter hele dokumentet / lang=da: Fortæller siden er på dansk -->
<html lang="da">

<!-- I <head> har man opsætning - det ser brugeren ikke, men det fortæller noget om siden -->
<head>
    <!-- Sætter tegnsætning til utf-8 som bl.a. tillader danske bogstaver -->
    <meta charset="utf-8">

    <!-- Titel som ses oppe i browserens tab mv. -->
    <title>Opdatere Produkter</title>
    <meta name="description" content="Ret og slet bøger">


    <!-- Metatags der fortæller at søgemaskiner er velkomne, hvem der udgiver siden og copyright information -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <?php include "include/head.php"; ?>

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse - bliver brugt til responsive websider -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- i <body> har man alt indhold på siden som brugeren kan se -->
<body>

<?php include "include/navigation.php"; ?>

<!-- Her skal sidens indhold ligge -->


<div class="container py-3 p-lg-5">
    <h1 class="pt-5 mt-5 px-lg-5">Opdatering af produkter</h1>
    <p class="lead px-lg-5">Bogtitel:</p>
    <?php
    foreach ($bog as $blog){
        ?>
        <div class="pt-3 px-lg-5">

            <div class="row border border-dark p-3">
                <div class="col-12 col-md-6">
                    <?php
                    echo $blog->bogTitel;
                    ?>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <button class="btn bg-success">  <a href="insert.php?type=rediger&id=<?php echo $blog->bogId; ?>" class="text-white">Rediger</a></button>
                    <button class="btn bg-danger"><a href="index.php?type=slet&id=<?php echo $blog->bogId; ?>" class="text-white">Slet</a></button>
                </div>
            </div>
        </div>
        <?php

    }
    ?>
</div>


<?php include "include/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>


