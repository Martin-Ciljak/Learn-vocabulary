<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="setup.php" method="post">
        <label for="slovak">Slovak</label>
        <input type="text" name="slovak" id="slovak">
        <label for="german">German</label>
        <input type="text" name="german" id="german">
        <label for="word_class">Word class</label>
        <input type="text" name="word_class" id="word_class">
        <input type="submit" value="submit">
    </form>


    <?php
include('config.php');  // Include your configuration file

$slovak = $_POST['slovak'];
$german = $_POST['german'];
$word_class = $_POST['word_class'];



// Try connecting to the MySQL database
try {
    $pdo = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, 
        DB_USERNAME, 
        DB_PASSWORD
    );
    $pdo->exec("SET NAMES 'utf8mb4'"); // This sets the character encoding for the connection

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully to the database!<br>";
    if (!empty($slovak) && !empty($german) && !empty($word_class)){
        $sql = "INSERT INTO `german-47` (`slovak`, `german`, `word_class`, `plural`, `is_irregular`, `prasens`, `prateritum`, `perfekt`) VALUES (:slovak, :german, :word_class, NULL, NULL, NULL, NULL, NULL)";
        $stmt = $pdo -> prepare($sql);
        $stmt->bindParam(':slovak', $slovak);
        $stmt->bindParam(':german', $german);
        $stmt->bindParam(":word_class", $word_class);
        $stmt->execute();
        echo "SK: ".$slovak." -> GE: ".$german." (".$word_class.")<br>";
    }
} catch (PDOException $e) {
    // Handle the error if the connection fails
    echo "Connection failed: " . $e->getMessage();
}
?>

</body>

</html>