<?php
include 'db.php';

$id = $_GET['id'];

$query = "SELECT * FROM posts WHERE id=$id";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $update_query = "UPDATE posts 
                     SET title='$title', content='$content' 
                     WHERE id=$id";

    mysqli_query($conn, $update_query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>

<h2>Edit Post</h2>

<form method="POST">

    Title:
    <br>
    <input type="text" name="title"
    value="<?php echo $row['title']; ?>" required>

    <br><br>

    Content:
    <br>

    <textarea name="content" required><?php echo $row['content']; ?></textarea>

    <br><br>

    <button type="submit" name="update">Update Post</button>

</form>

</body>
</html>