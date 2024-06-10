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
    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
        <h1>Đăng nhập</h1>
        @if (!empty($_SESSION['errors']))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($_SESSION['errors'] as $key => $error)
                        <li>Key: {{ $key }} - Error: {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @php
                unset($_SESSION['errors']);
            @endphp
        @endif
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label>Name: </label>
                <input type="text" name="name" class="form-control" placeholder="Enter name">
            </div>

            <div class="mb-3 mt-3">
                <label>Email: </label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>

            <div class="mb-3">
                <label for="">Password: </label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
