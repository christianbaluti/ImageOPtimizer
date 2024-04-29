<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['imageData']) && isset($_POST['compressionValue'])) {
    // Retrieve image data and compression value from POST request
    $imageData = $_POST['imageData'];
    $compressionValue = $_POST['compressionValue'];

    // Validate and sanitize image data (you may need more validation/sanitization)
    $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
    $imageData = str_replace(' ', '+', $imageData);
    $imageData = base64_decode($imageData);

    // Set up ImageMagick
    $image = new Imagick();
    $image->readImageBlob($imageData);

    // Optimize the image
    $image->setImageCompressionQuality($compressionValue);
    $image->setImageFormat('jpeg'); // Change the format if needed
    $optimizedImageData = $image->getImageBlob();

    // Generate a random filename for the optimized image
    $filename = 'optimized_' . uniqid() . '.jpeg';

    // Save the optimized image to a temporary directory (you may need to change the directory path)
    $filepath = 'temp/' . $filename;
    file_put_contents($filepath, $optimizedImageData);

    // Return the URL of the optimized image
    echo $filepath;
} else {
    http_response_code(400); // Bad Request
    echo 'Invalid request';
}
?>
