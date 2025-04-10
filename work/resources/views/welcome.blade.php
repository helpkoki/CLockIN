<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: "Comic Sans MS", sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .container {
            text-align: center;
            background: white;
            border: 2px solid #000;
            padding: 40px;
            width: 80%;
            max-width: 600px;
            box-shadow: 10px 10px 0 #000;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn {
            background-color: #ffcc00;
            border: 2px solid #000;
            padding: 12px 24px;
            cursor: pointer;
            box-shadow: 3px 3px 0 #000;
            font-size: 16px;
            text-decoration: none;
            color: black;
        }

        .btn:hover {
            background-color: #ffeb3b;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Our Work Management Website!</h1>
        <p>Enjoy the playful and fun design as you navigate through our site.</p>
        <div class="btn-group">
            <a href="/login" class="btn">Login</a>
            <a href="/register" class="btn">Register</a>
        </div>
    </div>
</body>

</html>