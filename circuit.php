<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch the inputs
    $resistors = explode(",", $_POST['resistors']);
    $capacitors = explode(",", $_POST['capacitors']);
    $inductors = explode(",", $_POST['inductors']);
    $voltage = isset($_POST['voltage']) ? $_POST['voltage'] : null;
    $current = isset($_POST['current']) ? $_POST['current'] : null;
    $resistor_arrangement = $_POST['resistor_arrangement'];
    $capacitor_arrangement = $_POST['capacitor_arrangement'];
    $inductor_arrangement = $_POST['inductor_arrangement'];

    // Ensure the GD library is loaded
    if (!extension_loaded('gd')) {
        die("Error: GD library is not enabled. Please enable it to generate circuit diagrams.");
    }

    // Create an image resource
    $img = imagecreate(800, 600);
    if (!$img) {
        die("Error: Failed to create image resource.");
    }

    // Set colors
    $bg_color = imagecolorallocate($img, 255, 255, 255); // White background
    $line_color = imagecolorallocate($img, 0, 0, 0); // Black lines

    // Placeholder for drawing the circuit (this should be a more complex drawing logic)
    imageline($img, 100, 100, 700, 100, $line_color);

    // Save the image
    $filename = "diagrams/circuit_" . time() . ".png";
    if (!imagepng($img, $filename)) {
        die("Error: Failed to save the image.");
    }

    // Free up memory
    imagedestroy($img);

    // Output the success message and link to the image
    echo "<h2>Circuit Diagram Generated Successfully!</h2>";
    echo "<p>Download your circuit diagram: <a href='$filename'>Download</a></p>";
}
?>
