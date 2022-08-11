<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>About us</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            width: 100%;
        }

        .container {
            margin-top: 8%;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h3 {
            color: rgb(61, 204, 209);
        }

        .about-box {
            max-width: 950px;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: rgb(54, 50, 50);
            box-shadow: 0px 0px 19px 5px rgba(0, 0, 0, 0.19);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }


        .container:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background: url("teamprofile/bg.jpg") no-repeat center;
            background-size: cover;
            filter: blur(0px);
            z-index: -1;
        }

        .contact-box {
            max-width: 450px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #fff;
            box-shadow: 0px 0px 19px 5px rgba(0, 0, 0, 0.19);
        }



        .right {
            padding: 30px 25px;

        }

        h2 {
            position: relative;
            padding: 0 0 10px;
            margin-bottom: 10px;
        }

        h2:after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            height: 4px;
            width: 500px;
            border-radius: 2px;
            background-color: #868d89;
        }

        .field {
            width: 100%;
            border: 2px solid rgba(0, 0, 0, 0);
            outline: none;
            background-color: rgba(230, 230, 230, 0.6);
            padding: 0.5rem 1rem;
            font-size: 1.1rem;
            margin-bottom: 22px;
            transition: .3s;
        }

        .field:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        textarea {
            min-height: 10px;
        }


        .field:focus {
            border: 2px solid rgba(30, 85, 250, 0.47);
            background-color: #fff;
        }

        @media screen and (max-width: 880px) {
            .contact-box {
                grid-template-columns: 1fr;
            }

            .left {
                height: 200px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div>
            <a href="index.php"> <img src="image/logo_innovative_grocery.png" alt="Innovative Grocery" height="70" width="80"></a>
        </div>
    </header>
    <div class="container">
        <div class="about-box">
            <h2 style="font-size:xx-large; color: rgb(240, 230, 90);">About Innovative Grocery</h2>
            <p class="card-text" style="color: rgb(255, 255, 255);  text-align: justify;
                text-justify: inter-word; padding: 50px;">Innovative grocery is an e- commerce platform which accommodates the residents of Cleckhuddersfax. Our website works closely with Traders like Delicatessen, Greengrocer, Bakery, Butcher, Fishmonger who sell their unique products for providing a convenient shopping experience for the customers. We have addressed the needs and requirements and offered this joint e commerce portal .We have incorporated reliable and modest features in our website that are sophisticated in look and simple to navigate. Our website is associated with PayPal as our payment partner. Shop with us and fulfill your wishes to buy amazing products from our traders by engaging with our website.</p>

        </div>
    </div>
    <div class="abc" style="display: flex; margin-top: 13%;">
        <div class="container" style=" margin-left: 5px; 
                height: 50px;
                display: flex;
                justify-content: center;
                align-items: center;">
            <div class="contact-box">
                <div class="left" style="background: url('teamprofile/muna.JPG');background-size:110px; margin-left: 30px;
                    border-radius:100%;
                    height: 50%;
                    width: 60%;"></div>
                <div class="right">
                    <h3>Muna KC</h3>
                    <p class="card-text" style="color: black;margin-right: 10px;"> Fulfills the role Plant of the Team Belbin, solving problems in unconventional ways. </p>

                </div>
            </div>
        </div>

        <div class="container" style=" margin-left:5px; 
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;">
            <div class="contact-box">
                <div class="left" style="background: url('teamprofile/roy.jpg');background-size:110px; margin-left: 30px;
                border-radius:100%;
                height: 50%;
                width: 60%;"></div>
                <div class="right">
                    <h3>Narendra Roy</h3>
                    <p class="card-text" style="color: black; margin-right: 10px;">Fulfills the role Specialist of the Team Belbin, bringing in-depth knowledge of a key area to the team. </p>

                </div>
            </div>
        </div>

        <div class="container" style=" margin-left: 5px; 
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;">
            <div class="contact-box">
                <div class="left" style="background: url('teamprofile/reejan.jpg');background-size: contain; margin-left: 30px;
            border-radius:100%;
            height: 50%;
            width: 60%;"></div>
                <div class="right">
                    <h3>Reejan Katwal</h3>
                    <p class="card-text" style="color: black;margin-right: 10px;">Fulfills the role Implementer of the Team Belbin, planning out effective strategy as possible.</p>

                </div>
            </div>
        </div>

        <div class="container" style=" margin-left: 5px; margin-right: 5px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;">
            <div class="contact-box">
                <div class="left" style="background: url('teamprofile/samiksha.jpg');background-size: 120px; margin-left: 30px;
        border-radius:100%;
        height: 50%;
        width: 60%;"></div>
                <div class="right">
                    <h3>Samiksha Rupakheti</h3>
                    <p class="card-text" style="color: black;margin-right: 8px;">Fulfills the role Coordinator of Team Belbin, focusing on team's objectives&work.</p>

                </div>
            </div>
        </div>

    </div>
    <footer style="margin-top: 110px;">
        <div style="background-color: black; color: white;  height: 30px; text-align: center;">
            <b class="copyright">&copy; 2021 Innovative Grocery </b> All rights reserved.
        </div>
    </footer>

</body>

</html>