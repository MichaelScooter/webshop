<?php
require "settings/init.php";

if(!empty($_GET["type"])) {
    if($_GET["type"] == "slet"){
        $id = $_GET["id"];

        $db->sql("DELETE FROM bog WHERE bogId = :bogId", [":bogId"=>$id], false);
    }


}

$bog = $db->sql("SELECT * FROM bog WHERE bogId = :bogId", [":bogId" => $_GET["bogId"]]);

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
    <title>Bog</title>
    <meta name="description" content="Køb din bog i Bogcaféen - Nemt & Hurtigt!">


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
<!-- Header Sektion --------------------------------------------------------------------------------------------------->
<div class="hero text-white pt-5 pt-lg-0">
    <div class="container-fluid pt-3 heroBaggrundsBillede" >
        <?php
             foreach ($bog as $blog){
            ?>

                <div class="row align-items-center flex-md-row-reverse pt-2 pb-5 pb-lg-0 px-lg-5 pt-lg-0 ">

                    <div class="col-lg-6 d-flex justify-content-center pb-5 pb-lg-0">
                        <img src="uploads/<?php echo $blog->bogBillede; ?>" alt="Bog Cover" class="img-fluid pt-5 p-lg-5 bookCover">
                    </div>

                    <div class="col-lg-6 ps-md-5 text-center align-self-start align-self-md-center text-md-start pb-5 pt-4 pt-md-0">
                        <h5 class="ps-md-4 mb-0 text-primary fw-light">Titel:</h5>
                        <h1 class="ps-md-4">
                            <?php echo $blog->bogTitel; ?>
                        </h1>
                        <p class="lead ps-md-4">
                            af forfatteren <?php echo $blog->bogForfatter; ?>
                        </p>
                        <div class="ps-md-4 text-white textBeskrivelse">
                            <p class="text-danger ">
                                <?php
                                echo $blog->bogBeskrivelse;
                                ?>
                            </p>
                            <p class="pris">Kr.
                                <?php
                                echo number_format($blog->bogPris, 2, ",", ".");
                                ?>
                            </p>
                        </div>
                        <!-- Start info bokse -->
                        <div class="row ps-md-4 pt-lg-4">
                            <div class="col-12 col-md-6">
                                <div>
                                    <p><span class="text-primary">Sprog:</span>
                                        <?php
                                        echo $blog->bogSprog;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div>
                                    <p><span class="text-primary">Genre:</span>
                                        <?php
                                        echo $blog->bogGenre;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row ps-md-4">
                            <div class="col-12 col-md-6">
                                <div>
                                    <p><span class="text-primary">Sider:</span>
                                        <?php
                                        echo $blog->bogSider;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div>
                                    <p><span class="text-primary">Bogudgave:</span>
                                        <?php
                                        echo $blog->bogUdgave;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row ps-md-4">
                            <div class="col-12 col-md-6">
                                <div>
                                    <p><span class="text-primary">Forlag:</span>
                                        <?php
                                        echo $blog->bogForlag;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div>
                                    <p><span class="text-primary">Udgivelsesår:</span>
                                        <?php
                                        echo $blog->bogUdgivelsesAar;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row ps-md-4">
                            <div class="col-12 col-md-6">
                                <div>
                                    <p><span class="text-primary">ISBN:</span>
                                        <?php
                                        echo $blog->bogISBN;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

        }
        ?>
    </div>
</div>



<?php include "include/footer.php"; ?>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>


