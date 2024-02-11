<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-dark">

<div class="container-xl d-flex justify-content-center align-items-center vh-100">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="bg-light p-4 rounded-lg shadow-sm">
                
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <form class="m-4" action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="file" class="form-control form-control-lg" id="image" name="image" onchange="previewImage(event)">
                    </div>
                    <div id="imagePreview" class="mb-3"></div>
                    <button type="submit" class="btn btn-primary btn-lg">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function(){
            var dataURL = reader.result;
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = '<img src="' + dataURL + '" style="max-width: 100px; max-height: 100px;">';
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>

</body>
</html>
