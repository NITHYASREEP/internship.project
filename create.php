<?php
include 'db.php';

if(isset($_POST['submit'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "INSERT INTO posts(title, content) 
              VALUES('$title', '$content')";

    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>

<h2>Add New Post</h2>

<form method="POST">

    Title:
    <br>
    <input type="text" name="title" required>
    <br><br>

    Content:
    <br>
    <textarea name="content" required></textarea>
    <br><br>

    <button type="submit" name="submit">Add Post</button>

</form>

</body>
</html>