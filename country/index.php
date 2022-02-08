<?php

/** 
 * Project Covid with extension curl PHP
 * Data from https://api.covid19api.com/summary
 */

/** Process Request data */

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.covid19api.com/summary",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "X-Access-Token: 5cf9dfd5-3449-485e-b5ae-70a60e997864"
    ),
));

$response = curl_exec($curl);

curl_close($curl);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">

    <!-- style -->
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/world.css">

    <!-- Font (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->

    <title>Tugas Covid</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
          <a class="navbar-brand me-4 fs-3" href="../"><span>Info Covid</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="../world/">World</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Country</a>
              </li>
            </ul>
            <form class="d-flex" action="search.php" method="post">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Nama Negara">
              <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Search</button>
            </form>
          </div>
        </div>
      </nav>

    <!-- Option Country -->

    <div class="container" style="margin-top: 100px;">
        <div class="row" id="view">

            <!-- Loop Data from response -->

            <?php foreach (json_decode($response, true)['Countries'] as $key) : ?>
                <div class="col-lg-3">
                    <div class="card my-2">
                        <div class="card-body">
                            <h4 class="collapsible card-title"><?= $key['Country']; ?> &nbsp; <i class="fas fa-globe"></i></h4>
                            <div class="content">
                            <h6 class="card-subtitle mb-2 pt-2 text-muted"><?= $key['CountryCode']; ?></h6>
                            <button type="button" class="btn rounded-0 my-2 btn-info w-100">
                                New Confirmed<span class="badge badge-light ml-2"><?= $key['NewConfirmed']; ?></span>
                            </button>
                            <button type="button" class="btn rounded-0 my-2  btn-info w-100">
                                Total Confirmed<span class="badge badge-light ml-2"><?= $key['TotalConfirmed']; ?></span>
                            </button>
                            <button type="button" class="btn rounded-0 my-2  btn-danger w-100">
                                New Death<span class="badge badge-light ml-2"><?= $key['NewDeaths']; ?></span>
                            </button>
                            <button type="button" class="btn rounded-0 my-2  btn-danger w-100">
                                Total Death<span class="badge badge-light ml-2"><?= $key['TotalDeaths']; ?></span>
                            </button>
                            <button type="button" class="btn rounded-0 my-2  btn-primary w-100">
                                New Recoved<span class="badge badge-light ml-2"><?= $key['NewRecovered']; ?></span>
                            </button>
                            <button type="button" class="btn rounded-0 my-2  btn-primary w-100">
                                Total Recovered<span class="badge badge-light ml-2"><?= $key['TotalRecovered']; ?></span>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <!-- Footer -->

    <div class="container-fluid bg-light p-3 mt-3">
        <div class="row">
            <div class="col text-center" id="last_update">
                Last Update : <?php date_default_timezone_set('Asia/Jakarta'); echo date('l,d-F-Y H:i:s'); ?>
            </div>
        </div>
    </div>

    <style>
        .collapsible {
        background-color: none;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        }

        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
        .active, .collapsible:hover {
        background-color: none;
        }

        /* Style the collapsible content. Note: hidden by default */
        .content {
        padding: 0 18px;
        background-color: none;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        }

        a.global:hover {
        background-color: gray;
        color: #000;
        text-decoration: underline;
        }
    </style>

    <script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight){
        content.style.maxHeight = null;
        } else {
        content.style.maxHeight = content.scrollHeight + "px";
        }
    });
    }
    </script>

    <script src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>