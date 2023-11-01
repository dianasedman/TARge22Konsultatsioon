<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");
global $yhendus;

if (isset($_POST["lisa_opetaja"])) {
  $opetajanimi = $_POST["opetajanimi"];

  $kask = $yhendus->prepare("INSERT INTO opetaja (opetajanimi) VALUES(?)");
  $kask->bind_param("s", $opetajanimi);
  $kask->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require("header.php"); ?>

<body>
  <div class="content">
    <div class="center-content">
      <h2>Lisa Õpetaja</h2>
      <form method="POST" class="lisa-opetaja-form">
        <label for="opetajanimi">Õpetaja nimi:</label>
        <input type="text" id="opetajanimi" name="opetajanimi">
        <button class="lisa-button" type="submit" name="lisa_opetaja">Lisa Õpetaja</button>
      </form>
    </div>
  </div>
</body>

</html>
<?php
require("footer.php");
?>