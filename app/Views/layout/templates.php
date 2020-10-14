<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="shortcut icon" type="image/icon" href="/favicon.ico">

    <title><?= $tittle; ?></title>
</head>

<body>


    <nav class="navbar navigasi shadow-sm">
        <div class="container">
            <!-- brand -->
            <a href="" class="navbar-brand text-white">TITIK TEMU</a>


    </nav>
    <div class="container pb-5">

        <!-- -----------BATAS------------ -->
        <?= $this->renderSection('content'); ?>
        <!-- ----------BATAS-------------- -->

        <?= $pager->links(); ?>


    </div>




    <div class="fluid-container position-absolute footer">
        <div class="container bg-rpimary footer text-center">
            <footer>&copy copyright 2020 find me !
                <a href="https://twitter.com/yuugisans_" target="_blank">
                    <img src="/img/twitter.png" alt="Yogi Pristiawan" width="17px">
                    Yogi
                </a>
            </footer>
        </div>
    </div>

    </div>




    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>



    <script src="/js/bootstrap.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>