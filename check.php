<?php
$servername = "db";
$username = "root";
$password = "qwe";
$dbName = "first_db";

$link = mysqli_connect($servername, $username, $password, $dbName);
if (!$link) {
    die("Ошибка подключения к базе: " . mysqli_connect_error());
}

$sql_users = "SELECT * FROM users";
$result_users = mysqli_query($link, $sql_users);
if (!$result_users) {
    die("Ошибка запроса users: " . mysqli_error($link));
}

$sql_posts = "SELECT * FROM posts";
$result_posts = mysqli_query($link, $sql_posts);
if (!$result_posts) {
    die("Ошибка запроса posts: " . mysqli_error($link));
}

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
            padding: 30px 20px;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: #333;
            margin: 40px 0 20px 0;
            padding-bottom: 15px;
            border-bottom: 2px solid #4a90e2;
            font-size: 28px;
        }
        
        h1:first-of-type {
            margin-top: 0;
        }
        
        .empty-message {
            color: #666;
            font-style: italic;
            margin-bottom: 40px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 6px;
            border-left: 4px solid #ddd;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .data-table thead {
            background-color: #4a90e2;
            color: white;
        }
        
        .data-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 16px;
        }
        
        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }
        
        .data-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .data-table tbody tr:hover {
            background-color: #f0f7ff;
            transition: background-color 0.2s;
        }
        
        .data-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .navigation {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .nav-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }
        
        .nav-button:hover {
            background-color: #357ae8;
        }
        
        .nav-button.secondary {
            background-color: #666;
        }
        
        .nav-button.secondary:hover {
            background-color: #555;
        }
        
        .header-info {
            background-color: #e6f2ff;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            border-left: 4px solid #4a90e2;
            font-size: 16px;
        }
        
        .header-info strong {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Пользователи</h1>
    <?php if (mysqli_num_rows($result_users) > 0): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>password</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_users)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['password']) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Пользователей нет.</p>
    <?php endif; ?>

    <h1>Посты</h1>
    <?php if (mysqli_num_rows($result_posts) > 0): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>content</th>
                    <th>image_path</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_posts)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['content'])) ?></td>
                    <td><?= htmlspecialchars($row['image_path']) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Постов нет.</p>
    <?php endif; ?>

<?php
mysqli_close($link);
?>
</body>
</html>
