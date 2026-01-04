#الاتصال بقاعدة البيانات

# التكليف الثالث

# سام احمد الخامري

<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "test_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("فشل الاتصال: " . mysqli_connect_error());
}

echo "تم الاتصال بنجاح";



# (SELECT)
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['username'] . "<br>";
}
#  (INSERT)
$sql = "INSERT INTO users (username, email)
VALUES ('maran', 'maran@gmail.com')";

mysqli_query($conn, $sql);

#  (UPDATE)
$sql = "UPDATE users SET email='new@gmail.com' WHERE id=1";
mysqli_query($conn, $sql);

# (DELETE)
$sql = "DELETE FROM users WHERE id=1";
mysqli_query($conn, $sql);

#  انهاء
mysqli_close($conn);
?>
