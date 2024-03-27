<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<body>
    <h2>Đăng ký</h2>
    <form action="register_process.php" method="post">
        <input type="text" name="username" placeholder="Tài Khoản" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Mật khẩu" required><br>
        <input type="text" name="fullname" placeholder="Tên Người Dùng" required><br>
        <button type="submit">Đăng ký</button>
    </form>
</body>
</html>