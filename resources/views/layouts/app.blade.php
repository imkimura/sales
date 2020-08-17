<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&family=Poppins&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <link href={{ asset('/assets/style.css') }} rel="stylesheet">

        <style>
            span, p, a, * {
                font-family: 'Poppins';
            }
            h1,h2,h3,h3,h5 {
                font-family: 'Archivo';
            }
            .navbar-dark .navbar-brand {
                color: #a17aff;
                font-family: 'Archivo' !important;
                font-weight: 500;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">SellerSale</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a
                    @if(Route::currentRouteName() == 'home')
                    class="nav-item nav-link active"
                    @else
                    class="nav-item nav-link"
                    @endif
                    href="/">Home</a>
                <a
                    @if(Request::is('seller', 'seller/..'))
                    class="nav-item nav-link active"
                    @else
                    class="nav-item nav-link"
                    @endif
                    href="/seller">Vendedores</a>

              </div>
            </div>
        </nav>

        @yield('content')
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

        @yield('script')
    </body>
</html>
