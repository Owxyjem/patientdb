<?php
include 'config.php';

// Delete patient record
$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("DELETE FROM patients WHERE id = ?");
$stmt->execute([$id]);
header("Location: index.php");
exit();
?>
