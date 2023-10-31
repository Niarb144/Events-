<?php
// MySQL database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "events_db";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Media Upload</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data" class="upload-form">
        <label for="media">Select Media (Image/Video):</label>
        <input type="file" name="media[]" id="media" multiple accept="image/*,video/*">
        
        <label for="description">Title:</label>
        <textarea name="description" id="description"></textarea>
        
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date">
        
        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date">
        
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>

<?php

// Define the number of items per page
$itemsPerPage = 20;

// Get the current page number from the URL parameter, default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the current page
$offset = ($page - 1) * $itemsPerPage;

// Check if the 'delete' parameter is set in the URL
if (isset($_GET['delete'])) {
    $deleteId = (int)$_GET['delete'];

    // Retrieve the file path from the database to delete the file from the 'media' folder
    $sqlDelete = "SELECT media_url FROM events WHERE event_id = $deleteId";
    $resultDelete = $conn->query($sqlDelete);

    if ($resultDelete->num_rows == 1) {
        $rowDelete = $resultDelete->fetch_assoc();
        $filePathToDelete = $rowDelete['media_url'];

        // Delete the file from the 'media' folder
        if (unlink($filePathToDelete)) {
            // Delete the file details from the database
            $sqlDeleteRecord = "DELETE FROM events WHERE event_id = $deleteId";
            $resultDeleteRecord = $conn->query($sqlDeleteRecord);
            if ($resultDeleteRecord) {
                echo "File deleted successfully.";
            } else {
                echo "Error deleting file details from the database: " . $conn->error;
            }
        } else {
            echo "Error deleting file: $filePathToDelete";
        }
    } 
}

// Prepare and execute the SQL query to retrieve files from the database with pagination
$sql = "SELECT event_id, event_type, media_url, event_date, description FROM events LIMIT $itemsPerPage OFFSET $offset";
$result = $conn->query($sql);

// Display the table header
echo "<table border='1'>
        <tr>
            <th>Media</th>
            <th>Title</th>
            <th>File Type</th>
            <th>Delete</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['event_id'];
        $media = $row["media_url"];
        $fileType = $row["event_type"];
        $description = $row["description"];

        // Display the row in the table
        echo "<tr>";
        
       

        if ($fileType === "Image") {
            echo "<td><img src='$media' alt='$fileType' width='100'></td>";
        } elseif ($fileType === "Video") {
            echo "<td><video controls width='150'><source src='$media' type='video/mp4'></video></td>";
        }

        echo "<td>" . $description . "</td>";
        echo "<td>" . $fileType . "</td>";

        // Add a delete link for each row
        echo "<td><a href='?delete=$id'>Delete</a></td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No files found in the database.</td></tr>";
}

echo "</table>";

// Calculate the total number of pages
$sqlTotal = "SELECT COUNT(*) AS total FROM events";
$resultTotal = $conn->query($sqlTotal);
$rowTotal = $resultTotal->fetch_assoc();
$totalItems = $rowTotal['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Display pagination links
echo "<div class = 'pages'>";
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}
echo "</div>";

// Close the database connection
$conn->close();
?>