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
      <div class="container" style="margin-left: auto,
    margin-right: auto ">
        <form method="POST" class="column" >
          <label for="opetajanimi" >ÕPETAJA NIMI:</label>

          <input type="text" id="opetajanimi" name="opetajanimi">

          <button class="lisa-button" type="submit" name="lisa_opetaja">Lisa</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
require("footer.php");
?>