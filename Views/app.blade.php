<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        {{-- Fonts --}}
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/public/assets/css/stylesheet.css">
        {{-- Latest compiled and minified CSS --}}
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h1>Tic Tac Toe</h1>
                </div>
                <ul class="nav navbar-nav">
                    <li>
                        <h3 id="message"></h3> {{-- Used to show the message at the end of the game --}}
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li>
                        <a class="nav-item active" href="index.php?newgamebutton">New Game</a> {{-- launch the script via GET message --}}
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container p-3">
            @yield('content') 
        </div>
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="/public/assets/js/move.js"></script>
    </body>
</html>

