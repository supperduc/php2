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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="name" required placeholder="Enter title post"
                        name="title" autofocus>

                    <label for="name" class="form-label">Excerpt:</label>
                    <input type="text" class="form-control" id="name" required placeholder="Enter excerpt post"
                        name="excerpt">

                    <label for="name" class="form-label">Content:</label>
                    <textarea  type="text" class="form-control" id="name" required placeholder="Enter content post"
                        name="content"></textarea>

                    <label for="name" class="form-label">Image:</label>
                    <input type="file" class="form-control" id="upload-input" required placeholder="Enter name post"
                        name="image">
                    <img src="" class="img-thumbnail mt-2" alt="Uploaded Image" id="uploaded-image"
                        width="270px">
                    <br>
                    <hr>
                    <label for="name" class="form-label">Gallery:</label>
                    <input type="file" class="form-control" id="upload-input" required placeholder="Enter name post"
                        name="post_gallery[]" multiple>
                    <img src="" class="img-thumbnail mt-2" alt="Uploaded Image" id="uploaded-image"
                        width="270px">
                    <br>
                    <label for="name" class="form-label">Category name:</label><br>
                    <select class="form-control" name="category_id" id="">
                        @foreach ($getAllCategories as $value)
                            <option value="{{$value['id']}}">{{$value['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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
