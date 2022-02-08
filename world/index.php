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

/** Getting response and parsing data from Request */

$country = [];
$confirmed = [];
$death = [];
$recovered = [];

foreach (json_decode($response, true)['Countries'] as $key) {
    array_push($country, $key['Country']);
    array_push($confirmed, $key['TotalConfirmed']);
    array_push($death, $key['TotalDeaths']);
    array_push($recovered, $key['TotalRecovered']);
}

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Data Covid Dunia</title>
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
                <a class="nav-link active" href="#">World</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../country/">Country</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Nama Negara">
              <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

    <!-- Pie Chart -->

    <div class="container-fluid content">
        <div class="row pb-5">
            <div class="col-lg-12 mb-5">
                <h2 class="text-center fw-bold fs-1 my-5">Global</h2>
                <div class="container">
                    <div class="row" id="global">

                    <!-- Loop For Global Data -->

                        <?php foreach (json_decode($response, true)['Global'] as $key => $val) : ?>
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-primary p-3 m-2 w-100">
                                    <?= $key; ?> <span class="badge badge-light"><?= $val; ?></span>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


            </div>
            <div class="col-lg-6">
                <h2 class="text-center fw-bold fs-1 my-5">Terkonfirmasi</h2>
                <canvas id="confirmed"></canvas>
            </div>

            <div class="col-lg-6">
                <h2 class="text-center fw-bold fs-1 my-5">Kematian</h2>
                <canvas id="death"></canvas>
            </div>

            <!-- tidak digunakan karena 0 data -->
            <div class="col-lg-4 d-none">
                <h2 class="text-center fw-bold fs-1 my-5">Recovered</h2>
                <canvas id="recover"></canvas>
            </div>
        </div>
    </div>



    <!-- Footer -->

    <div class="container-fluid bg-light p-3 mt-3">
        <div class="row">
            <div class="col text-center" id="last_update">
                Last Update : <?php date_default_timezone_set('Asia/Jakarta'); echo date('l,d-F-Y H:i:s');?>
            </div>
        </div>
    </div>

    <style>
        a.hovering:hover {
            background-color: gray;
            text-decoration: underline;
        }
    </style>

    <script>
        /** Get All Element Charts */

        var ctx_confirm = document.getElementById('confirmed').getContext('2d');
        var ctx_death = document.getElementById('death').getContext('2d');
        var ctx_recover = document.getElementById('recover').getContext('2d');

        /** Get All Dataset */

        var country = <?= json_encode($country); ?>;
        var confirmed = <?= json_encode($confirmed); ?>;
        var death = <?= json_encode($death); ?>;
        var recovered = <?= json_encode($recovered); ?>;

        /**  Make Dynamic Color  */

        var coloR = [];

        var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        };

        for (var i in country) {
            coloR.push(dynamicColors());
        }


        /** Chart Total Confirmed */


        var chart_confirm = new Chart(ctx_confirm, {
            type: 'pie',
            data: {
                labels: country,
                datasets: [{
                    label: '# of Votes',
                    data: confirmed,
                    backgroundColor: coloR,
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });

        /** Chart Total Deaths */


        var chart_death = new Chart(ctx_death, {
            type: 'pie',
            data: {
                labels: country,
                datasets: [{
                    label: '# of Votes',
                    data: death,
                    backgroundColor: coloR,
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });


        /** Chart Total Recovered */


        var chart_recover = new Chart(ctx_recover, {
            type: 'pie',
            data: {
                labels: country,
                datasets: [{
                    label: '# of Votes',
                    data: recovered,
                    backgroundColor: coloR,
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>




    <script src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>