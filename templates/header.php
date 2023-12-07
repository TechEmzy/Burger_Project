<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Bite</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Internal CSS Styling -->
    <style>
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
            font-size: 2.5rem;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .burger{
            width: 140px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -40px;
        }
        @media(max-width: 992px){
            nav .brand-logo {
            left: 27%;
        }
        }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Burger Bite</a>
            <ul id="nav-mobile" class="right show-on-small-and-down">
                <li><a href="add.php" class="btn brand z-depth-0">Add a Burger</a></li>
            </ul>
        </div>
    </nav>