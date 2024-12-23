<?php
session_start();
include 'db_connection.php'; 

$targetDirectory = "../uploads/";
$uploadOk = 1;
$errorMessages = [];

// Handle document upload
if (!empty($_FILES["document"]["name"])) {
    $targetFile = $targetDirectory . basename($_FILES["document"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedDocumentTypes = ["pdf", "doc", "docx"];

    if (file_exists($targetFile)) {
        $errorMessages[] = "Sorry, document already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["document"]["size"] > 5000000) {
        $errorMessages[] = "Sorry, your document is too large.";
        $uploadOk = 0;
    }

    if (!in_array($fileType, $allowedDocumentTypes)) {
        $errorMessages[] = "Sorry, only PDF, DOC, and DOCX files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFile)) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $sql = "INSERT INTO contents (title, description, document_path, document_type) VALUES (?, ?, ?, 'document')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $title, $description, $targetFile);

            if (!$stmt->execute()) {
                $errorMessages[] = "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $errorMessages[] = "Sorry, there was an error uploading your document.";
        }
    }
}

// Handle video upload
if (!empty($_FILES["video"]["name"])) {
    $targetFile = $targetDirectory . basename($_FILES["video"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedVideoTypes = ["mp4", "avi", "mov", "wmv"];

    if (file_exists($targetFile)) {
        $errorMessages[] = "Sorry, video already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["video"]["size"] > 50000000) {
        $errorMessages[] = "Sorry, your video is too large.";
        $uploadOk = 0;
    }

    if (!in_array($fileType, $allowedVideoTypes)) {
        $errorMessages[] = "Sorry, only MP4, AVI, MOV, and WMV files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetFile)) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $sql = "INSERT INTO contents (title, description, document_path, document_type) VALUES (?, ?, ?, 'video')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $title, $description, $targetFile);

            if (!$stmt->execute()) {
                $errorMessages[] = "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $errorMessages[] = "Sorry, there was an error uploading your video.";
        }
    }
}

mysqli_close($conn);

if (!empty($errorMessages)) {
    $_SESSION['errorMessages'] = $errorMessages;
    header("Location: administration.php");
    exit();
} else {
    header("Location: administration.php?success=1");
    exit();
}
?>
