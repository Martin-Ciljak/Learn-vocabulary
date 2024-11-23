<?php 
$connection = new mysqli("sql203.infinityfree.com", "if0_37770038", "5kAKuFfFr8wPIpm","if0_37770038_vocabulary");
$sql = "INSERT INTO `german-47` (`id`, `slovak`, `german`, `word_class`, `plural`, `is_irregular`, `prasens`, `prateritum`, `perfekt`) VALUES (NULL, 'cyklista', 'der Radfahrer', 'noun', NULL, NULL, NULL, NULL, NULL);";
if ($conn->query($sql)) {
    echo "values_inserted";
} else {
    echo "failed";
}
$conn->close();
?>