<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload de Imagens</h2>
    
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

    
    <form id="uploadForm" action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div id="imagePreview"></div>
        <input type="file" id="imageInput" name="image" onchange="previewImage(event)"> <br>
        <input type="submit" value="Upload">
    </form>


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
