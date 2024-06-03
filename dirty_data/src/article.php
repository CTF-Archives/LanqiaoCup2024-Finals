<?php
header("Content-type: text/html; charset=utf8");

// 使用 mysqli 连接数据库
$mysqli = new mysqli("localhost", "ctf", "ctf123", "ctf");

// 检查连接是否成功
if ($mysqli->connect_error) {
    die("连接失败: " . $mysqli->connect_error);
}

// 设置字符集
$mysqli->set_charset("utf8mb4");

if (isset($_GET['id'])) {
    // 使用准备好的语句防止 SQL 注入
    $stmt = $mysqli->prepare("SELECT id, title, content FROM news WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo "<h1>" . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "</h1>";
        echo "<pre>" . htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8') . "</pre>";
    } else {
        echo "没有找到相关内容。";
    }

    // 关闭语句
    $stmt->close();
} else {
    echo "缺少参数。";
}

// 关闭连接
$mysqli->close();
?>
