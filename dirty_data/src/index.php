<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>发布系统</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .header {
            background-color: #222;
            color: white;
            padding: 15px 15%;
            text-align: start;
        }
        .header a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        .container {
            background-color: white;
            margin: 0 auto;
            padding: 20px;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .post {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
        .post a {
            text-decoration: none;
        }
        .post h2 {
            color: green;
            font-size: 20px;
        }
        .post p {
            font-size: 16px;
            line-height: 1.5;
        }
        .sidebar {
            width: 250px;
            background-color: #f5f5f5;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="header">
    <a href="#">首页</a>
    <a href="/article.php?id=1">关于等保</a>
</div>
<h2 style="padding: 0 15%">发布系统</h2>
<div style="display: flex; justify-content: space-between; padding: 20px 50px">
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "ctf";
        $password = "ctf123";
        $dbname = "ctf";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $conn->set_charset("utf8mb4");

        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM news WHERE id IN (1,2,3)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="post">';
                echo '<p>admin 发表于 202x-06-01 08:00:01</p>';
                echo '<a href="/article.php?id='.$row["id"].'"><h2>'. htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8') .'</h2></a>';
                echo '<p>' . htmlspecialchars($row["content"], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '</div>';
            }
        } else {
            echo "无数据";
        }
        $conn->close();
        ?>
    </div>
    <div class="sidebar">
        <h3>关于等保</h3>
        <p>信息安全等级保护，是对信息和信息载体按照重要性等级分级别进行保护的一种工作。</p>
    </div>
</div>
</body>
</html>
