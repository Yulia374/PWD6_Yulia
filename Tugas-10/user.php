<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level'] != 1) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
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
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 105, 180, 0.3) 0%, transparent 70%);
            top: -300px;
            right: -300px;
            border-radius: 50%;
        }
        
        body::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 182, 193, 0.2) 0%, transparent 70%);
            bottom: -200px;
            left: -200px;
            border-radius: 50%;
        }
        
        .dashboard {
            background: rgba(255, 255, 255, 0.95);
            padding: 50px 40px;
            width: 500px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px);
            text-align: center;
        }
        
        h2 {
            color: #333;
            font-size: 32px;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .welcome-text {
            color: #666;
            font-size: 16px;
            margin-bottom: 10px;
        }
        
        .username {
            color: #ff69b4;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            display: block;
        }
        
        .info-box {
            background: linear-gradient(135deg, #f8f8f8 0%, #efefef 100%);
            padding: 25px;
            border-radius: 15px;
            margin: 30px 0;
            border-left: 5px solid #ff69b4;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .info-box h3 {
            color: #ff69b4;
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .info-box p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }
        
        .btn-logout {
            display: inline-block;
            text-decoration: none;
            color: white;
            background: linear-gradient(135deg, #ff69b4 0%, #ff1493 100%);
            padding: 16px 40px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
            margin-top: 10px;
        }
        
        .btn-logout:hover {
            background: linear-gradient(135deg, #ff1493 0%, #ff69b4 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 105, 180, 0.4);
        }
        
        .btn-logout:active {
            transform: translateY(0);
        }
        
        .footer {
            margin-top: 30px;
            color: #999;
            font-size: 12px;
        }
        
        @media (max-width: 580px) {
            .dashboard {
                width: 90%;
                padding: 40px 30px;
            }
            
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>User Panel</h2>
        
        <p class="welcome-text">Halo,</p>
        <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
        
        <div class="info-box">
            <p>Anda berhasil login sebagai user. Akses dashboard dan kelola akun Anda dengan mudah.</p>
        </div>
        
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
</body>
</html>