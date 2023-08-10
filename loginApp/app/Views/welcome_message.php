<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Udinus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }
        body {
            display: flex;
            align-items: center;
            height: 98vh;
        }
        .container {
            width: 60%;
            margin: 0 auto;
            text-align: center;
        }
        main {
            width: 35%;
            border-radius: 10px;
            border: 1px solid #E8E8E8;
            background: #FFF;
            margin: 0 auto;
            padding: 40px 80px;
        }
        h2 {
            color: #555;
            font-size: 18px;
        }
        .buttons {
            display: flex;
            justify-content: center;
        }
        button {
            width: 150px;
            padding: 8px 10px;
            border-radius: 6px;
            margin: 0 10px;
        }
        button {
            font-size: 14px;
            background: #114D91;
            color: #FFF;
            font-weight: 500;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        button:active {
            box-shadow: 0 0 0 0.2rem rgba(17, 77, 145, 0.25);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome! Ready to experience the convenience?</h1>
        <h2>Login or embark on a seamless Registration journey now.</h2>
        <div class="buttons">
            <a href="<?= site_url('login') ?>"><button>Login</button></a>
            <a href="<?= site_url('register') ?>"><button>Register</button></a>
        </div>
    </div>
</body>
</html>