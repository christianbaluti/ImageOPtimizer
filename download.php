<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['imageUrl']) && isset($_POST['format'])) {
    // Retrieve image URL and format from POST request
    $imageUrl = $_POST['imageUrl'];
    $format = $_POST['format'];

    // Validate image URL and format (you may need more validation)

    // Set the appropriate content type header based on the format
    switch ($format) {
        case 'jpeg':
            header('Content-Type: image/jpeg');
            break;
        case 'png':
            header('Content-Type: image/png');
            break;
        case 'gif':
            header('Content-Type: image/gif');
            break;
        default:
            http_response_code(400); // Bad Request
            echo 'Invalid image format';
            exit;
    }

    // Set the content disposition header to force download
    header('Content-Disposition: attachment; filename="optimized_image.' . $format . '"');

    // Output the image content
    readfile($imageUrl);
} else
