<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");
global $yhendus;

$opetajad = array();
$kask = $yhendus->prepare("SELECT Id, opetajanimi FROM opetaja");
$kask->bind_result($id, $opetajanimi);

$kask->execute();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["opetaja"]) && !empty($_POST["aine"]) && !empty($_POST["klass"]) && !empty($_POST["paev"]) && !empty($_POST["kellaaeg"])) {
    $opetaja = $_POST["opetaja"];
    $aine = $_POST["aine"];
    $klass = $_POST["klass"];
    $paev = $_POST["paev"];
    $kellaaeg = $_POST["kellaaeg"];

    if ($kask) {
      $kask->close();
    }

    $kask_insert = $yhendus->prepare("INSERT INTO konsultatsioon(opetaja, aine, klass, paev, kellaaeg) VALUES (?, ?, ?, ?, ?)");
    $kask_insert->bind_param("sssss", $opetaja, $aine, $klass, $paev, $kellaaeg);
    $kask_insert->execute();

    if (!$kask_insert->error) {
      header("Location: " . $_SERVER['PHP_SELF']);

    } else {
      echo "Viga andmete sisestamisel: " . $kask_insert->error;
    }

  }

}

?>
<!DOCTYPE html>
<html lang="et">

<?php
require("header.php");
?>

<body>
  <div class="center-content">
    <form method="post">
      <h1>LISA KONSULTATSIOONI AEG </h1>

      <h3 style="color: #df3b38"> Igal õpetajal vähemalt kaks konsultatsiooni aega </h3>
      <div class="container">
        <div class="column">
          <label for="teacher">Õpetaja:</label>
          <label for="aine">Aine:</label>
          <label for="klass">Klass:</label>
          <label for="day">Paev:</label>
          <label for="time">Kellaaeg:</label>
        </div>

        <div class="column">
          <select id="opetaja" name="opetaja" required style="width: 301px">
            <?php
            // Kui päring on edukas, loome rippmenüü valikud
            while ($kask->fetch()) {
              echo "<option value=\"$id\">$opetajanimi</option>";
            }
            ?>
          </select>
          <input type="text" id="aine" name="aine" required ">
        <input type=" text" id="klass" name="klass" required>
          <select id="paev" name="paev" required style="width: 305px">
            <option value="esmaspaev">Esmaspäev</option>
            <option value="teisipaev">Teisipäev</option>
            <option value="kolmapaev">Kolmapäev</option>
            <option value="neljapaev">Neljapäev</option>
            <option value="reede">Reede</option>
            <option value="laupaev">Laupäev</option>
            <option value="puhapaev">Pühapäev</option>
          </select>
          <input type="time" id="kellaaeg" name="kellaaeg" required>
        </div>
      </div>
      <button class="column-btn" onclick="validateForm()">KINNITA</button>

      <script>
        function ShowAlert() {
          alert("Andmed edukalt sisestatud!");
        }

        function validateForm() {
          var opetaja = document.getElementById("opetaja").value;
          var aine = document.getElementById("aine").value;
          var klass = document.getElementById("klass").value;
          var paev = document.getElementById("paev").value;
          var kellaaeg = document.getElementById("kellaaeg").value;

          if (opetaja && aine && klass && paev && kellaaeg) {
            ShowAlert();
          } else {
            alert("Palun täitke kõik väljad enne andmete sisestamist.");
          }
        }
      </script>
    </form>
  </div>
</body>
<?php
require("footer.php");
?>

</html>
<?php
$yhendus->close();
?>