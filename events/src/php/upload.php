<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "events_db";

// Create a database connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Process form data
if (isset($_POST['submit'])) {
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Iterate over uploaded files
    foreach ($_FILES['media']['tmp_name'] as $key => $tmp_name) {
        $media_type = $_FILES['media']['type'][$key];
        $media_name = $_FILES['media']['name'][$key];
        $media_path = "media/" . $media_name; // Folder to store media files

        // Check if the file is an image or video
        if (strstr($media_type, "image") || strstr($media_type, "video")) {
            // Move the uploaded file to the media folder
            move_uploaded_file($tmp_name, $media_path);

            // Insert file information into the database
            $insert_query = "INSERT INTO events (event_type, media_url, event_date, description) VALUES (?, ?, ?, ?)";
            $stmt = $mysqli->prepare($insert_query);
            $event_type = (strstr($media_type, "image")) ? 'Image' : 'Video';
            $stmt->bind_param("ssss", $event_type, $media_path, $start_date, $description);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// Close the database connection
$mysqli->close();

// Redirect back to the form
echo '<script type = "text/javascript">';
       echo 'alert("Uploaded file Successfully")';
       echo '</script>';
       echo '<script type="text/javascript">
           window.location = "events.php"
      </script>';
?>
