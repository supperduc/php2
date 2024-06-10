<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Trang chu</title>
</head>

<body>
    <div class="container">
        <h1>Trang dashboard</h1>
        <?php
        
        if (isset($_SESSION['user'])) {
            echo 'Xin chào: ' . $_SESSION['user'] . '<br>';
            echo '<a href="/MVCOOP/admin/logout" class="btn btn-info me-3">Đăng xuất</a>';
            echo '<a href="/MVCOOP/admin/categories" class="btn btn-info me-3">Danh mục</a>';
            echo '<a href="/MVCOOP/admin/post" class="btn btn-info me-3">Post</a>';
            echo '<a href="/MVCOOP/admin/users" class="btn btn-info me-3">User</a>';
        } else {
            echo '<a href="/MVCOOP/admin/login" class="btn btn-info">Đăng nhập</a>';
        }
        
        ?>
    </div>
</body>

</html>
