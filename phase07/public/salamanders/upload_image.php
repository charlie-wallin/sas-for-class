<?php
require_once('../../private/initialize.php');

$salamander_id = $_POST['salamander_id'] ?? null;
$upload_dir = '../../public/uploads/';

if ($salamander_id && isset($_FILES['images'])) {
  foreach ($_FILES['images']['tmp_name'] as $index => $tmp_name) {
    if ($_FILES['images']['error'][$index] === UPLOAD_ERR_OK) {
      $original = basename($_FILES['images']['name'][$index]);
      $safe_name = uniqid() . "_" . preg_replace("/[^A-Za-z0-9_\.-]/", '_', $original);
      $destination = $upload_dir . $safe_name;

      if (move_uploaded_file($tmp_name, $destination)) {
        $sql = "INSERT INTO salamander_images (salamander_id, filename) VALUES (?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $salamander_id);
        $stmt->bind_param("s", $safe_name);
        $stmt->execute();
      }
    }
  }

  redirect_to("show.php?id=" . urlencode($salamander_id));
} else {
  echo "Invalid request.";
}
?>
