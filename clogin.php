<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        .textbox {
            margin: 3px;
            padding: 5px;
        }
        
        .btn {
            width: 100px;
            background: none;
            border: 2px solid white;
            color: white;
            padding: 5px;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }
        
        .textbox {
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
        }
        
        .textbox input {
            border: none;
            outline: none;
            background: none;
            color: white;
            font-size: 18px;
        }
        
        form {
            margin-top: 300px;
            margin-bottom: 300px;
        }
    </style>
</head>

<body>

    <body background="login/images4.jpg"></body>
    <form align="center">
        <div class="login-box">
            <h1 style="color:white">Login</h1>
            <div class="textbox">
                <input type="text" placeholder="Email" name="c_email"></div>
            <div class="textbox"><input type="text" placeholder="Password" name="c_password">
            </div>
            <input class="btn" type="button" value="Log in" name="login">
            <br>
            <h style="color: white;">New User?</h>
            <a href="registration.php" style="color: azure;">Register</a>
        </div>
    </form>
</body>

</html>