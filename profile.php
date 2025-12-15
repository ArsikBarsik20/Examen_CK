<?php
if (!isset($_COOKIE['User'])) {
    header('Location: /login.php');
    exit;
}

$user = htmlspecialchars($_COOKIE['User']);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Larionov</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .profile-container {
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        
        .hello {
            color: #333;
            font-size: 32px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #4a90e2;
        }
        
        .user-name {
            color: #4a90e2;
            font-weight: 600;
        }
        
        .welcome-message {
            color: #666;
            font-size: 18px;
            margin-bottom: 40px;
            line-height: 1.5;
        }
        
        .action-button {
            display: inline-block;
            padding: 14px 30px;
            background-color: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }
        
        .action-button:hover {
            background-color: #357ae8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="hello">
                            Привет, <?php echo $user; ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>