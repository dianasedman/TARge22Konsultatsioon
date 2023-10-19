<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");
global $yhendus;
$opetajad = array();
$kask = $yhendus->prepare("SELECT Id, opetajanimi FROM opetaja");
$kask->bind_result($id, $opetajanimi);

$kask->execute();
?>
<!DOCTYPE html>
<html lang="est">

<?php
require("header.php");
?>

<body>
  <form>
    <h1>Lisa konsultatsiooni aeg </h1>
    <h3> Igal õpetajal vähemalt kaks konsultatsiooni aega </h3>
    <div class="container">
      <div class="column">
        <label for="teacher">Õpetaja:</label>
        <label for="aine">Aine:</label>
        <label for="klass">Klass:</label>
        <label for="day">Paev:</label>
        <label for="time">Kellaaeg:</label>
      </div>

      <div class="column">
        <select id="teacher" name="teacher">
          <?php


          // Kui päring on edukas, loome rippmenüü valikud
          while ($kask->fetch()) {
            echo "<option value=\"$id\">$opetajanimi</option>";
          }


          ?>
        </select>
        <input type="text" id="aine" name="aine">
        <input type="text" id="klass" name="klass">
        <select id="day" name="day">
          <option value="esmaspaev">Esmaspäev</option>
          <option value="teisipaev">Teisipäev</option>
          <option value="kolmapaev">Kolmapäev</option>
          <option value="neljapaev">Neljapäev</option>
          <option value="reede">Reede</option>
          <option value="laupaev">Laupäev</option>
          <option value="puhapaev">Pühapäev</option>
        </select>
        <input type="time" id="kellaaeg" name="kellaaeg">
      </div>
    </div>
    <button class="column-btn">Kinnita</button>

    </div>
  </form>
</body>

</html>
<?php
$yhendus->close();
?>