<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoCovid</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">

    <!-- style -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/index.css">

    <!-- Font (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- properties pop ups -->
    <style>
        .wrapper {
        position: relative;
      }

      .overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        color: #fff;
        display: none;
      }
    </style>
    <script>
      function showOverlay() {
      $('.overlay').show()
      }
      setTimeout(showOverlay, 2000)
    </script>
    <SCRIPT TYPE="text/javascript">
      function popup(mylink, windowname) { 
        if (! window.focus)return true;
        var href;
        if (typeof(mylink) == 'string') href=mylink;
        else href=mylink.href; 
        window.open(href, windowname, 'width=400,height=200,scrollbars=yes'); 
        return false; 
      }
    </SCRIPT>
</head>
<body onLoad="popup('autopopup.html', 'ad')">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
          <a class="navbar-brand me-4 fs-3" href="#"><span>Info Covid</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="world/">World</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="country/">Country</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Nama Negara">
              <button class="btn btn-dark" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <!-- Hero -->
      <section class="hero" id="hero">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-6 col-sm-12 urut-2">
                    <h2 class="fs-1">Informasi <span>Covid</span></h2>
                    <p class="mt-4"> <span>Covid </span> mulai meningkat akhir akhir ini, maka dari itu kami membuat website ini agar kalian bisa memantau seberapa jauhnya perkembangan <span>Covid</span> akhir akhir ini.</p>
                </div>
                <div class="col-md-6 col-sm-12 mb-5 pt-5 urut-1">
                  <img src="assets/svg/hero.svg" class="img float-end" alt="">
                </div>
            </div>
        </div>
      </section>

      <!-- World -->
      <section class="world bg-light" id="world">
          <div class="container">
              <div class="row d-flex justify-content-between">
                    <div class="col-md-6 col-sm-12 pt-5 mb-5">
                      <img src="assets/svg/world.svg" class="img float-start" alt="">
                    </div>
                    <div class="teks col-md-6 col-sm-12">
                        <h2 class="fs-2">Informasi <span>Covid</span> di Seluruh Dunia</h2>
                        <p class="mt-3 mb-5">Disini kami menyediakan informasi tentang <span>Covid</span> secara realtime dan <span>Global</span> telusuri lebih lanjut untuk melihat perkembangan <span>Covid</span>.</p>
                        <a href="world/">
                            <button type="button" class="btn btn-dark">Kunjungi <i class="bi bi-arrow-down"></i></button>
                        </a>
                    </div>
              </div>
          </div>
      </section>

      <!-- By Country -->
      <section class="country" id="country">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="teks col-md-6 col-sm-12 urut-2">
                    <h2 class="fs-2">Informasi <span>Covid</span> di Berbagai Negara</h2>
                    <p class="mt-3 mb-5">Kami juga memberikan informasi terperinci dari berbagai negara yang terlist satu persatu dengan rapi jadi anda tidak perlu kebingungan untuk mencari negara tertentu.</p>
                    <a href="country/">
                        <button type="button" class="btn btn-dark">Kunjungi <i class="bi bi-arrow-down"></i></button>
                    </a>
                </div>
                <div class="col-md-6 col-sm-12 pt-5 mb-5 urut-1">
                    <img src="assets/svg/country.svg" class="img float-end" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="footer">
        <div class="container-fluid">
            <p class="text-center fs-6">&copy; <script>document.write(new Date().getFullYear())</script> Info Covid</p>
        </div>
    </footer>

      <!-- Javascript -->
      
      <!-- bootstrap -->
      <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>