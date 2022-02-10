<?php
if (isset($_GET['id'])) {
include '../library/config.php';
include '../library/opendb.php';
$id = $_GET['id'];

PRAKTIKUM 5

Praktikum Pemrograman WEB Page 5
$query = "SELECT name, type, size, content FROM upload WHERE id =
'$id'";
$result = mysqli_query($conn, $query) or die('Error, query
failed');
list($name, $type, $size, $content) = mysqli_fetch_array($result);
header("Content-Disposition: attachment; filename=$name");
header("Content-length: $size");
header("Content-type: $type");
echo $content;
include '../library/closedb.php';
exit;
}
?>
<html>
<head>
    <title>Download File From MySQL</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <?php
    include '../library/config.php';
    include '../library/opendb.php';
    $query = "SELECT id, name, path FROM upload";
    $result = mysqli_query($conn, $query) or die('Error, query
    failed');
    if (mysqli_num_rows($result) == 0) {
        echo "Database is empty <br>";
    } else {
        while (list($id, $name,$path) = mysqli_fetch_array($result)) {
            ?>
            <a href="<?php echo $path;?>"><?php echo $name;?></a><br>
            <?php
        }
    }
    include '../library/closedb.php';
    ?>
</body>
</html>