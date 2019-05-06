<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DEV php junior - 404 Not Found</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">
    <style>
        #notfound {
            position: relative;
            height: 100vh;
        }
        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .notfound {
            max-width: 520px;
            width: 100%;
            line-height: 1.4;
            text-align: center;
        }
        .notfound .notfound-404 {
            position: relative;
            height: 200px;
            margin: 0px auto 20px;
            z-index: -1;
        }
        .notfound .notfound-404 h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 236px;
            font-weight: 200;
            margin: 0px;
            color: #211b19;
            text-transform: uppercase;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .notfound .notfound-404 h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 28px;
            font-weight: 400;
            text-transform: uppercase;
            color: #211b19;
            background: #fff;
            padding: 10px 5px;
            margin: auto;
            display: inline-block;
            position: absolute;
            bottom: 0px;
            left: 0;
            right: 0;
        }
        .notfound a {
            font-family: 'Montserrat', sans-serif;
            display: inline-block;
            font-weight: 700;
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
            padding: 7px 10px;
            background: black;
            font-size: 10px;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
            border-radius: 10px;
        }
        .notfound a:hover {
            color: black;
            background: #999999;
        }
        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 h1 {
                font-size: 148px;
            }
        }
        @media only screen and (max-width: 480px) {
            .notfound .notfound-404 {
                height: 148px;
                margin: 0px auto 10px;
            }
            .notfound .notfound-404 h1 {
                font-size: 86px;
            }
            .notfound .notfound-404 h2 {
                font-size: 16px;
            }
            .notfound a {
                padding: 7px 15px;
                font-size: 14px;
            }
        }

    </style>
</head>
<body>

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>Oops!</h1>
            <h2>404 - The Page can't be found</h2>
        </div>
        <a href="{{ URL::previous() }}"><i class="fal fa-arrow-circle-left"></i> Back</a>
    </div>
</div>

</body>
</html>
