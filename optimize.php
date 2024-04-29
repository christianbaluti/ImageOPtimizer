<?php
// Check if the form has been submitted and the image file is present
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    // Include the Intervention Image library
    require 'vendor/autoload.php';
    use Intervention\Image\ImageManagerStatic as Image;

    // Retrieve the uploaded file
    $image = $_FILES['image'];

    // Check if the file is an image
    if (in_array($image['type'], ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
        // Load the image
        $img = Image::make($image['tmp_name']);

        // Retrieve the quality and format from the form
        $quality = isset($_POST['quality']) ? $_POST['quality'] : 80;
        $format = isset($_POST['format']) ? $_POST['format'] : 'jpg';

        // Optimize the image
        ob_start();
        $img->save(null, $quality, $format);
        $optimizedImageData = ob_get_clean();

        // Set the correct content type
        header('Content-Type: image/' . $format);

        // Output the optimized image
        echo $optimizedImageData;
    } else {
        // Handle non-image files
        http_response_code(400);
        echo "Error: Only image files are supported.";
    }
} else {
    // Redirect to the form if the form was not submitted
    header('Location: index.html');
    exit;
}
?>
