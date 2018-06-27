<!DOCTYPE <!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">
            
        <title>Test bootstrap</title>
            
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
            
        <!-- Custom styles for this template -->
        <link href="/css/test.css" rel="stylesheet">
    </head>



    <body>
        @include('layouts.header')


        <section class="jumbotron text-center">
                <div class="container">
                  <h1 class="jumbotron-heading">Album example</h1>
                  <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks do not simply skip over it entirely.</p>
                  <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                  </p>
                </div>
        </section>



        <div class="container">
            @yield('content')
        </div>

        @include('layouts.footer')
    </body>


</html>





 



