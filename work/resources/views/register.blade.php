<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: "Comic Sans MS", sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200vh;
            margin: 0;
        }

        .register-container {
            background: white;
            border: 2px solid #000;
            padding: 40px;
            width: 320px;
            box-shadow: 10px 10px 0 #000;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #000;
            box-shadow: 3px 3px 0 #000;
            font-size: 14px;
        }

        button {
            background-color: #ffcc00;
            border: 2px solid #000;
            padding: 12px;
            width: 100%;
            cursor: pointer;
            box-shadow: 3px 3px 0 #000;
            font-size: 16px;
        }

        button:hover {
            background-color: #ffeb3b;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h1>Register</h1>
        <form action="/register" method="POST">
            @csrf
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>