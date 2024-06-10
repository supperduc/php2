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
        <h1>Thêm mới post</h1>

        <div class="row">
            @if (!empty($_SESSION['success']))
                <div class="alert alert-success">
                    {{ $_SESSION['success'] }}
                </div>

                @php
                    $_SESSION['success'] = null;
                @endphp
            @endif
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">

                    <label for="name" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="name" required placeholder="Enter title post"
                        name="title" value="{{ $Post['title'] }}" autofocus>

                    <label for="name" class="form-label">Excerpt:</label>
                    <input type="text" class="form-control" id="name" required placeholder="Enter excerpt post"
                        name="excerpt" value="{{ $Post['excerpt'] }}">

                    <label for="name" class="form-label">Content:</label>
                    <textarea type="text" class="form-control" id="name" required placeholder="Enter content post" name="content">{{ $Post['content'] }}</textarea>

                    <label for="name" class="form-label">Image:</label>
                    <input type="file" class="form-control" id="upload-input" placeholder="Enter name post"
                        name="image">
                    <img src="/MVCOOP/{{ $Post['image'] }}" class="img-thumbnail mt-2" alt="Uploaded Image"
                        id="uploaded-image" width="270px">
                    <br>

                    <label for="name" class="form-label">Category name:</label><br>
                    <select class="form-control" name="category_id" id="">
                        @foreach ($getAllCategories as $value)
                            <option @if ($value['id'] == $Post['category_id']) selected @endif value="{{ $value['id'] }}">
                                {{ $value['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/MVCOOP/admin/post" class="btn btn-primary">Home</a>
            </form>
        </div>
    </div>
    <script>
        const uploadInput = document.getElementById('upload-input');
        const uploadedImage = document.getElementById('uploaded-image');
        uploadInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            uploadedImage.src = URL.createObjectURL(file);;
        });
    </script>

</body>

</html>
