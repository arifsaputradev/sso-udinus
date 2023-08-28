<!DOCTYPE html>
<html>
<head>
    <title>Udinus | Authentication</title>
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
        main {
            width: 35%;
            border-radius: 10px;
            border: 1px solid #E8E8E8;
            background: #FFF;
            margin: 0 auto;
            padding: 40px 80px;
        }
        input , button {
            width: 100%;
            padding: 8px 10px;
            border-radius: 6px;
        }
        input {
            font-size: 12px;
            border: 1px solid #F1F1F1;
            margin-bottom: 10px;
        }
        input:focus {
            outline: none;
            box-shadow: 0 0 0 0.1rem rgb(17, 77, 145);
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
        p {
            font-size: 12px;
        }
        a {
            text-decoration: none;
            color: #114D91;
        }
        .or {
            color: #555;
            text-align: center;
            margin-top: 10px;
        }
        button.sso {
            border: 1px solid #114D91;
            background: #FFF;
            color: #114D91;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <!-- Header content here -->
    </header>

    <main>
        <form id="loginWithSSO">
            <button type="button" class="sso" onclick="window.location.href='<?= site_url('sso/login') ?>'">Login with Udinus</button>
        </form>
    </main>

    <footer>
        <!-- Footer content here -->
    </footer>
</body>
</html>
