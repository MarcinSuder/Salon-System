<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Salon System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                /*background-image: url('../images/ala1.jpg');*/
                background-color: #87e7c5;
                color: #fc640a;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {

                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #e7ca07;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;

            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <a href="<?php echo e(url('/login')); ?>">ZALOGUJ</a>
                    <a href="<?php echo e(url('/register')); ?>">ZAREJESTRUJ SIĘ</a>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    *SALON SYSTEM*
                </div>

                <div class="links">
                    <a href="<?php echo e(url('/appointments')); ?>">WIZYTY</a>
                    <a href="<?php echo e(url('/clients')); ?>">KLIENCI</a>
                    <a href="<?php echo e(url('/warehouses')); ?>">MAGAZYN</a>
                    <a href="<?php echo e(url('/products')); ?>">PRODUKTY</a>
                </div>
            </div>
        </div>
    </body>
</html>
