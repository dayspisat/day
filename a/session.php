<?session_start();

if (!isset($_SESSION['id_user'])) {
  header("Location: avtoriz.php");
  exit();
}
?>