<?php
include "link.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <form action="ceklogin.php" method="post">
            <div class="title">Login</div>
            <div class="sub-title text- heavenly">Heavenly Store</div>
            <div class="input-box underline">
                <input type="text" name="username" placeholder="Masukkan Username" required>
                <div class="underline"></div>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Masukkan password" required>
                <div class="underline"></div>
            </div>
            <div class="input-box button">
                <input type="submit" name="Login">
            </div>
        </form>
        <div class="option">belum memiliki akun? <a href="register.html">Register</a></div>

    </div>
</body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&family=Maven+Pro:wght@400..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap');


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    html,
    body {
        display: grid;
        height: 100vh;
        width: 100%;
        place-items: center;
        background: linear-gradient(to top, #d5c702 0%, #fffeb0a7 100%);
    }

    ::selection {
        background: #ff80bf;
    }

    .container {
        background: #fff;
        max-width: 350px;
        width: 100%;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
    }

    .container form .title {
        font-size: 30px;
        font-weight: 600;
        margin: 20px 0 10px 0;
        text-align: center;
    }

    .container form .sub-title {
        font-size: 20px;
        font-weight: 600;
        margin: 2px 0;
        text-align: center;
        color: #e6e600;
    }

    .container form .title:before {
        content: '';
        position: absolute;
        height: 4px;
        width: 33px;
        left: 0px;
        bottom: 3px;
        border-radius: 5px;
        background: linear-gradient(to right, #fbff05 0%, #f8ff79 100%);
    }

    .container form .input-box {
        width: 100%;
        height: 45px;
        margin-top: 25px;
        position: relative;
    }

    .container form .input-box input {
        width: 100%;
        height: 100%;
        outline: none;
        font-size: 16px;
        border: none;
    }

    .container form .underline::before {
        content: '';
        position: absolute;
        height: 2px;
        width: 100%;
        background: #ccc;
        left: 0;
        bottom: 0;
    }

    .container form .underline::after {
        content: '';
        position: absolute;
        height: 2px;
        width: 100%;
        background: linear-gradient(to right, #fbff05 0%, #f8ff79 100%);
        left: 0;
        bottom: 0;
        transform: scaleX(0);
        transform-origin: left;
        transition: all 0.3s ease;
    }

    .container form .input-box input:focus~.underline::after,
    .container form .input-box input:valid~.underline::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    .container form .button {
        margin: 40px 0 20px 0;
    }

    .container .input-box input[type="submit"] {
        background: linear-gradient(to right, #adb604 0%, #fbff00 100%);
        font-size: 17px;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .container .input-box input[type="submit"]:hover {
        letter-spacing: 1px;
        background: linear-gradient(to right, #99a104 0%, #fbff00 100%);
    }

    .container .option {
        font-size: 14px;
        text-align: center;
    }

    .container .facebook a,
    .container .twitter a {
        display: block;
        height: 45px;
        width: 100%;
        font-size: 15px;
        text-decoration: none;
        padding-left: 20px;
        line-height: 45px;
        color: #fff;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .container .facebook i,
    .container .twitter i {
        padding-right: 12px;
        font-size: 20px;
    }

    .container .twitter a {
        background: linear-gradient(to right, #00acee 0%, #1abeff 100%);
        margin: 20px 0 15px 0;
    }

    .container .twitter a:hover {
        background: linear-gradient(to left, #00acee 0%, #1abeff 100%);
        margin: 20px 0 15px 0;
    }

    .container .facebook a {
        background: linear-gradient(to right, #3b5998 0%, #476bb8 100%);
        margin: 20px 0 50px 0;
    }

    .container .facebook a:hover {
        background: linear-gradient(to left, #3b5998 0%, #476bb8 100%);
        margin: 20px 0 50px 0;
    }

    .heavenly {
        font-family: "Kalam", cursive;
        font-weight: 700;
    }
</style>

</html>