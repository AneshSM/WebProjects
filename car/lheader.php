
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Wheel</title>
    <link rel="icon" href="images/mxw.jpg" type="images/x-icon" />


    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="front.css">
    <style>
        *{
            overflow-y: visible;
            

        }

        .a{
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 13rem;
            padding-bottom: 13rem;
        }
        table,tr,th,td{
            font-weight: bold;
            font-size: 15px;
            overflow-y: auto;
            border: 2px solid yellow;
            text-align: center;
        }

        input,td{
            background-color: lightyellow;
        }


        .f{
            border-radius: 2px;
            max-height: fit-content;
            position: absolute; left: 50%; top: 31%; transform: translate(-50%,-50%);
        }
        .t{
            height: 35vh;
            padding: 1rem;
            color: black;
            background-color: var(--light-yellow);            
            border: 2px solid yellow;
        }



        .progress{
            position: relative;
            height: 10px;
            width: 1110px;
            border: 10px solid yellow;
            border-radius: 15px;
        }
        .progress .color{
            position: absolute;
            background-color: #ffffff;
            width:0px;
            height:10px;
            border-radius: 15px;
            animation: progress 4s infinite linear;
        }
        @keyframes progress {
            0%{
                width: 0%;
            }
            20%{
                width: 20%;
            }
            50%{
                width: 50%;
            }
            70%{
                width: 70%;
            }
            100%{
                width: 100%;
            }
        };
    </style>
</head>

<body>
    <div class="progress">
        <div class="color"></div>
    </div>
    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="#" class="logo"><span>max</span>wheels</a>
        <nav class="navbar">
            <?php if (isset($_SESSION['admin'])=='y') {?>
            <a href="admin.php">ADMIN</a>
        <?php } ?>
            <a href="front.php">HOME</a>
            <a href="#vehicles">vehicles</a>
            <a href="#services">services</a>
            <a href="#featured">featured</a>
            <a href="#reviews">reviews</a>
            <a href="#contact">contact</a>
        </nav>

        <div id="login-btn">
            <button class="btn"><p><a href="front.php?logout='1'">logout</a></p></button>
        </div>



    </header>
