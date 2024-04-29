<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Optimizer</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h1 class="mb-4">Image Optimizer</h1>

  <div class="custom-file mb-4">
    <input type="file" class="custom-file-input" id="imageInput" accept="image/*">
    <label class="custom-file-label" for="imageInput">Choose image</label>
  </div>

  <div class="form-group">
    <label for="compressionRange">Compression Level: <span id="compressionValue">50</span></label>
    <input type="range" class="form-control-range" id="compressionRange" min="1" max="100" value="50">
  </div>

  <div class="text-center mb-4">
    <img id="previewImage" src="#" alt="Preview" class="img-fluid">
  </div>

  <div class="form-group">
    <label for="formatSelect">Choose Format:</label>
    <select class="form-control" id="formatSelect">
      <option value="jpeg">JPEG</option>
      <option value="png">PNG</option>
      <option value="gif">GIF</option>
    </select>
  </div>

  <button id="downloadBtn" class="btn btn-primary btn-block">Download Optimized Image</button>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="image-optimizer.js"></script>
</body>
</html>
