<!DOCTYPE html>
<html lang="en">

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
        <h1>Xem Chi Tiết Post :{{ $Post['title'] }}</h1>

        <table class="table">
            <tr>
                <th>Ten Truong</th>
                <th>Gia Tri</th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $Post['id'] }}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>{{ $Post['title'] }}</td>
            </tr>
            <tr>
                <td>Excerpt</td>
                <td>{{ $Post['excerpt'] }}</td>
            </tr>
            <tr>
                <td>Content</td>
                <td>{{ $Post['content'] }}</td>
            </tr>
            <tr>
                <td>Image</td>
                <td>
                    <img src="/MVCOOP/{{ $Post['image'] }}" alt="" width="150px">
                </td>
            </tr>
            <tr>
                <td>Categories_Name</td>
                <td>{{ $Post['name'] }}</td>
            </tr>
        </table>
    </div>

</body>

</html>