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
        <h1>Sửa danh mục</h1>

        <div class="row">
            @if (!empty($_SESSION['success']))
                <div class="alert alert-success">
                    {{ $_SESSION['success'] }}
                </div>

                @php
                    $_SESSION['success'] = null;
                @endphp
            @endif
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <input type="hidden" name="id" value="<?=$Categories['id']?>">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" required autofocus
                        placeholder="Enter name danh mục" name="name" value="<?=$Categories['name']?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>