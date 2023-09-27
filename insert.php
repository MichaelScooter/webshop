<?php
require "settings/init.php";

?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Indsæt til database</title>
    <meta name="description" content="Indsæt produkter til webshoppen">


    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/071g1xh1hwccgkhfewg0rdoqybb95uwgaiyhpb7xt8dyxzce/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


</head>

<body>

<?php include "include/navigation.php"; ?>
<div class="container-fluid bg-light py-5 pb-5 opretImage" style=" background-image: url('images/book6.webp'); background-size: cover; background-repeat: no-repeat; background-position:top ; background-attachment: fixed">
    <div class="container pt-5 ">
        <div class="bg-black ">
        <h1 class="text-white ps-3">Oprettelse af produkter</h1>
        <p class="text-white ps-3">Udfyld felterne og tryk på "opret produkt" knappen</p>
        </div>
        <?php
        if(!empty($_POST["data"])){
            $data = $_POST["data"];


            $sql = "INSERT INTO bog (bogTitel, bogForfatter, bogGenre, bogSprog, bogSider, bogPris, bogUdgave, bogForlag, bogUdgivelsesAar, bogISBN, bogBeskrivelse ) VALUES (:bogTitel, :bogForfatter, :bogGenre, :bogSprog, :bogSider, :bogPris, :bogUdgave, :bogForlag, :bogUdgivelsesAar, :bogISBN, :bogBeskrivelse)";
            $bind = [":bogTitel" => $data["bogTitel"], ":bogForfatter" => $data["bogForfatter"], ":bogGenre" => $data["bogGenre"], ":bogSprog" => $data["bogSprog"], ":bogSider" => $data["bogSider"], ":bogPris" => $data["bogPris"], ":bogUdgave" => $data["bogUdgave"], ":bogForlag" => $data["bogForlag"], ":bogUdgivelsesAar" => $data["bogUdgivelsesAar"], ":bogISBN" => $data["bogISBN"], ":bogBeskrivelse" => $data["bogBeskrivelse"]];

            $db->sql($sql, $bind, false);

            /* Får at tjekke om koden virker og exit for ikke at køre resten af koden på siden.*/
            echo "<h3 class='text-success pt-3'>Produktet blev indsat korrekt.</h3><a href='insert.php' class='text-white'>Opret et produkt mere</a>";
            exit;
        }
        ?>



    <div class=" px-5 bg-light border border-dark border-1">
        <form method="post" action="insert.php">
            <div class="row">
                <div class="col-12 col-md-6 pt-3">
                    <div class="form-group">
                        <label for="bogTitel" class="fw-semibold">Titel</label>
                        <input class="form-control" type="text" name="data[bogTitel]" id="bogTitel" placeholder="Indtast bogens titel" value="">
                    </div>
                </div>
                <div class="col-12 col-md-6 pt-3">
                    <div class="form-group">
                        <label for="bogForfatter" class="fw-semibold">Forfatter</label>
                        <input class="form-control" type="text" name="data[bogForfatter]" id="bogForfatter" placeholder="Indtast forfatterens navn" value="">
                    </div>
                </div>
                <div class="col-12 col-md-3 pt-3">
                    <div class="form-group">
                        <label for="bogGenre" class="fw-semibold">Genre</label>
                        <input class="form-control" type="text" name="data[bogGenre]" id="bogGenre" placeholder="Indtast genre" value="">
                    </div>
                </div>
                <div class="col-12 col-md-3 pt-3">
                    <div class="form-group">
                        <label for="bogSprog" class="fw-semibold">Sprog</label>
                        <input class="form-control" type="text" name="data[bogSprog]" id="bogSprog" placeholder="Indtast bogens sprog" value="">
                    </div>
                </div>
                <div class="col-12 col-md-3 pt-3">
                    <div class="form-group">
                        <label for="bogSider" class="fw-semibold">Sider</label>
                        <input class="form-control" type="number" name="data[bogSider]" id="bogSider" placeholder="Indtast antal sider" value="">
                    </div>
                </div>
                <div class="col-12 col-md-3 pt-3">
                    <div class="form-group">
                        <label for="bogPris" class="fw-semibold">Pris (brug punktum og <span class="fst-italic text-danger">ikke</span> komma)</label>
                        <input class="form-control" type="number" name="data[bogPris]" id="bogPris" placeholder="F.eks. 249.00" value="">
                    </div>
                </div>
                <div class="col-12 col-md-3 pt-3">
                    <div class="form-group">
                        <label for="bogUdgave" class="fw-semibold">Bog udgave</label>
                        <input class="form-control" type="text" name="data[bogUdgave]" id="bogUdgave" placeholder="Paperback/Hardcover" value="">
                    </div>
                </div>
                <div class="col-12 col-md-3 pt-3">
                    <div class="form-group">
                        <label for="bogForlag" class="fw-semibold">Forlag</label>
                        <input class="form-control" type="text" name="data[bogForlag]" id="bogForlag" placeholder="Indtast forlags navn" value="">
                    </div>
                </div>
                <div class="col-12 col-md-3 pt-3">
                    <div class="form-group">
                        <label for="bogUdgivelsesAar" class="fw-semibold">Udgivelsesår</label>
                        <input class="form-control" type="number" name="data[bogUdgivelsesAar]" id="bogUdgivelsesAar" placeholder="1900" value="">
                    </div>
                </div>
                <div class="col-12 col-md-3 pt-3">
                    <div class="form-group">
                        <label for="bogISBN" class="fw-semibold">ISBN</label>
                        <input class="form-control" type="text" name="data[bogISBN]" id="bogISBN" placeholder="000-0-00-000000-0" value="">
                    </div>
                </div>
                <div class="col-12 pt-3">
                    <div class="form-group">
                        <label for="bogBeskrivelse" class="fw-semibold">Produkt beskrivelse</label>
                        <textarea class="form-control" name="data[bogBeskrivelse]" id="bogBeskrivelse" placeholder="Skriv beskrivelsen"></textarea>
                    </div>
                </div>
                <div class="col-12 col-md-6 offset-md-6 pb-3">
                    <button class="form-control btn btn-success" type="submit" id="btnSubmit">Opret produkt</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
</script>

<?php include "include/footer.php"; ?>

</body>
</html>
