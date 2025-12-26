<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2d1b2e 0%, #4a2545 50%, #6b3a5f 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 105, 180, 0.3) 0%, transparent 70%);
            top: -200px;
            right: -200px;
            border-radius: 50%;
        }
        
        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 182, 193, 0.2) 0%, transparent 70%);
            bottom: -150px;
            left: -150px;
            border-radius: 50%;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 50px 40px;
            width: 420px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo h1 {
            color: #ff69b4;
            font-size: 42px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .logo p {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }
        
        .input-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .input-group label {
            display: block;
            color: #555;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .input-group input {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f8f8f8;
        }
        
        .input-group input:focus {
            outline: none;
            border-color: #ff69b4;
            background: white;
            box-shadow: 0 0 0 4px rgba(255, 105, 180, 0.1);
        }
        
        button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #ff69b4 0%, #ff1493 100%);
            border: none;
            color: white;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
        }
        
        button:hover {
            background: linear-gradient(135deg, #ff1493 0%, #ff69b4 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 105, 180, 0.4);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        .footer {
            text-align: center;
            margin-top: 25px;
            color: #888;
            font-size: 13px;
        }
        
        @media (max-width: 480px) {
            .login-container {
                width: 90%;
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <h1>Login</h1>
        </div>
        
        <form method="POST" action="process/login_process.php">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>