<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Danh sách người dùng</h1>
        <a href="./users/create" class="btn btn-info">Thêm mới</a>
        <div class="row">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>PassWord</th>
                    <th>Action</th>
                </tr>
                @foreach ($users as $value)
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['password'] ?></td>
                        <td>

                            <a href="./users/{{$value['id']}}/update" class="btn btn-warning">Sửa</a>

                            <a href="./users/{{$value['id']}}/show" class="btn btn-info">Show</a>

                            <a href="./users/<?= $value['id'] ?>/delete" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa ?')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
