$(document).ready(function() {
  $('#imageInput').change(function() {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewImage').attr('src', e.target.result);
    };
    reader.readAsDataURL(file);
  });

  $('#compressionRange').on('input', function() {
    var compressionValue = $(this).val();
    $('#compressionValue').text(compressionValue);
    optimizeImage(compressionValue);
  });

  function optimizeImage(compressionValue) {
  var imageData = $('#previewImage').attr('src');

  $.ajax({
    url: 'optimize.php',
    type: 'POST',
    data: {
      imageData: imageData,
      compressionValue: compressionValue
    },
    success: function(response) {
      // Update the preview with the optimized image
      $('#previewImage').attr('src', response);
    },
    error: function(xhr, status, error) {
      console.error('Error optimizing image:', error);
    }
  });
}


$('#downloadBtn').click(function() {
  // Get the chosen format
  var format = $('#formatSelect').val();
  // Get the URL of the optimized image
  var imageUrl = $('#previewImage').attr('src');
  // Send a request to the server to download the optimized image
  downloadOptimizedImage(imageUrl, format);
});

function downloadOptimizedImage(imageUrl, format) {
  // Send a request to the server to download the optimized image
  $.ajax({
    url: 'download.php',
    type: 'POST',
    data: {
      imageUrl: imageUrl,
      format: format
    },
    success: function(response) {
      // Redirect to the download link
      window.location.href = response;
    },
    error: function(xhr, status, error) {
      console.error('Error downloading image:', error);
    }
  });
}

});
