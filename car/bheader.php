

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


                .hello .s{
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    overflow: hidden;
                }


                .s form{
                    width:fit-content;
                    position: relative;
                    background-color: rgba(0,0,0,0.4);
                    padding:5px;
                    border-radius: 10px;
                }
                .s form h1{
                    text-align: center;
                    text-transform: uppercase;
                    font-size: 20px;
                }
                .s form input{
                    width:100%;
                    height:30px;
                    border:none;
                    color:black;
                    outline: none;
                    border-bottom: 2px solid black ;
                }
                .s form input:focus{
                    border-bottom: 2px solid yellow ;
                    outline: none;
                }
                .s form button{
                    
                    width: 100px;
                    height:40px;
                    border-radius: .5rem;
                    background: var(--light-yellow);
                    color:#080808;
                    border:1px solid #ffee80;
                    text-transform: uppercase;
                    transition: all 0.3s linear;
                    margin: 30px 70px;
                }
                .s form button:hover{
                    background-color: #f9d806;
                    color:black;
                }
                .s form p{
                    font-size:50px;
                    font-weight: 500;
                    color: yellow;
                    text-align: center;
                    margin-top: 30px;
                    font: 1em sans-serif;
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
   td{
        background-color: lightyellow;
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
