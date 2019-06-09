<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .arrange-button {

    position: relative;

    margin-left: 704px;
    margin-top: 48px;

}

        </style>
    </head>
    <body>
            
            <div class="flex-center">
                
                <h2>hitrekkers</h2>

            </div>

            <div class="content">

             <h3 id="simpleUsage" style="margin-top:20px;"></h3>

             </div>

             <div class="arrange-button">
                     <a href="{{route('customLogin')}}"><button class="btn btn-primary">Login</button></a>
                    <a href="{{route('customRegister')}}"><button class="btn btn-primary">Register</button></a>
                  </div>
        <!-- <script type="" src="https://cdn.jsdelivr.net/npm/typeit@VERSION_NUMBER/dist/typeit.min.js" /> -->

        <script src="https://cdn.jsdelivr.net/npm/typeit@6.0.3/dist/typeit.min.js"></script>


        <script>
            
            // import TypeIt from 'typeit';

new TypeIt('#simpleUsage', {
  strings: 'Hi, Register/Login Button is Waiting For you...',
  speed: 50,
  waitUntilVisible: true
}).go();




        </script>
    </body>
</html>
