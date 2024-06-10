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
    <?php
        // echo $_SESSION['user'];?>
    <div class="container">
        <h1>Danh sách post</h1>
        <a href="post/createPost" class="btn btn-info">Thêm mới</a>
        <div class="row">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th> Sửa - Show - Xóa</th>
                </tr>
                <?php
                // echo '<pre>';
                // print_r($Post);
                ?>
                @foreach ($Post as $value)
                    <tr>
                        <td>{{ $value['id'] }}</td>
                        <td>{{ $value['title'] }}</td>
                        <td>{{ $value['excerpt'] }}</td>
                        <td>
                            <img src="/MVCOOP/{{ $value['image'] }}" width="170px" alt="">
                        </td>
                        <td>{{ $value['name'] }}</td>
                        <td>
                            <a href="post/{{ $value['id'] }}/updatePost" class="btn btn-warning">Sửa</a>

                            <a href="post/{{ $value['id'] }}/showPost" class="btn btn-info">Show</a>

                            <a href="post/{{ $value['id'] }}/deletePost" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa ?')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <img src="./uploads/post/1703570720311.jpg" alt="">
        </div>
    </div>
</body>

</html>
