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

    // Initialize the image resource using GD
    $img = @imagecreate(800, 600); // Use '@' to suppress errors and handle them manually

    if (!$img) {
        die("Error: GD library is not enabled or image creation failed.");
    }

    // Set the colors
    $bg_color = imagecolorallocate($img, 255, 255, 255); // White background
    $line_color = imagecolorallocate($img, 0, 0, 0); // Black lines

    // Placeholder for drawing the circuit (this should be a more complex drawing logic)
    imageline($img, 100, 100, 700, 100, $line_color);

    // Define the filename and save the image
    $filename = "diagrams/circuit_" . time() . ".png";
    if (imagepng($img, $filename)) {
        echo "<h2>Circuit Diagram Generated Successfully!</h2>";
        echo "<p>Download your circuit diagram: <a href='$filename'>Download</a></p>";
    } else {
        echo "<h2>Error: Failed to save the circuit diagram.</h2>";
    }

    // Free up memory
    imagedestroy($img);
}
?>
