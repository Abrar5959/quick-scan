<?php
if (isset($_POST['image'])) {
    $imageData = $_POST['image'];

    // Remove the "data:image/png;base64," prefix
    $imageData = str_replace('data:image/png;base64,', '', $imageData);

    // Decode the base64-encoded image
    $imageData = base64_decode($imageData);

    // Specify the file path where you want to save the image
    $filePath = 'output-graph/chart.png';

    // Save the image to the specified file path
    file_put_contents($filePath, $imageData);

    echo 'Chart saved as image: ' . $filePath;
} else {
    echo 'Image data not received.';
}
?>
