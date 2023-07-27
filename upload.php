<?php
$uploadDir = 'C:/xampp/htdocs/uploads/';
$imageData = json_decode(file_get_contents('php://input'), true)['image'];
$imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
$imageData = str_replace(' ', '+', $imageData);
$imageData = base64_decode($imageData);

// Save the image to the server
$filename = uniqid() . '.jpg';
if (file_put_contents($uploadDir . $filename, $imageData)) {
    echo 'Image saved successfully!';
} else {
    echo 'Failed to save the image.';
}
?>
