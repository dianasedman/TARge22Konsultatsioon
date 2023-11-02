<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");
global $yhendus;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["kustuta_opetaja"])) {
  $opetajanimi = $_POST["opetaja"];

  $kask = $yhendus->prepare("DELETE FROM opetaja WHERE Id = ?");
  $kask->bind_param("i", $opetajanimi);

  if ($kask->execute()) {
    // Successful deletion, you can add a success message here.
  } else {
    // Error handling, display an error message or log the error.
  }
}

// $kask = $yhendus->prepare("SELECT Id, opetajanimi FROM opetaja");
// $kask->bind_result($id, $opetajanimi);
// $kask->execute();

$query = "SELECT o.opetajanimi
          FROM opetaja o
          WHERE o.id NOT IN (
            SELECT k.opetaja
            FROM konsultatsioon k
            GROUP BY k.opetaja
            HAVING COUNT(*) >= 1
          )";
$result = mysqli_query($yhendus, $query);
$nimed = array();
while ($row = mysqli_fetch_assoc($result)) {
  $nimed[] = $row["opetajanimi"];
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require("header.php"); ?>

<body>
  <div class="content">
    <div class="center-content">
      <h2>Kustuta õpetaja</h2>
      <div class="container" style="margin-left: auto,
    margin-right: auto ">
        <form method="POST" class="column">
          <label for="opetajanimi">ÕPETAJA NIMI:</label>

          <div class="column">
            <select id="opetaja" name="opetaja" required style="width: 301px">
              <?php
              foreach ($nimed as $opetajanimi) {
                // Kui päring on edukas, loome rippmenüü valikud
              
                echo "<option value=\"$opetajanimi\">$opetajanimi</option>";

              }
              ?>
            </select>

            <button class="lisa-button" type="submit" name="kustuta_opetaja">Kustuta</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
require("footer.php");
?>