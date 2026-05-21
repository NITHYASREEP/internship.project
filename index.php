 <?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

include 'db.php';
$query = "SELECT * FROM posts";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
</head>
<body>

<h2>All Posts</h2>

<a href="create.php">Add New Post</a>
<br><br>
<a href="logout.php">Logout</a>
<?php while($row = mysqli_fetch_assoc($result)) { ?>

    <h3><?php echo $row['title']; ?></h3>
    
    <p><?php echo $row['content']; ?></p>

    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

    <hr>

<?php } ?>

</body>
</html>