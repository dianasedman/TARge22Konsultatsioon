<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");
global $yhendus;

if (isset($_POST["muuda"])) {
  // Töötlemine, kui kasutaja on vajutanud "Muuda" nuppu
  // Uuenda andmeid andmebaasis
  $id = $_POST["id"];
  $uusAine = $_POST["aine"];
  $uusKlass = $_POST["klass"];
  $uusPaev = $_POST["paev"];
  $uusKellaaeg = $_POST["kellaaeg"];

  $kask = $yhendus->prepare("UPDATE konsultatsioon SET aine=?, klass=?, paev=?, kellaaeg=? WHERE id=?");
  $kask->bind_param("ssssi", $uusAine, $uusKlass, $uusPaev, $uusKellaaeg, $id);
  $kask->execute();
}


if (isset($_POST["kustuta"])) {

  $id = $_POST["id"];
  $kask = $yhendus->prepare("DELETE FROM konsultatsioon WHERE id=?");
  $kask->bind_param("i", $id);

  $kask->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
require("header.php");
?>

<body>
  <div class="content">
    <div class="left-menu">
      <h2>Konsultatsioonid</h2>
      <div class="search-container">
        <form method="GET">
          <input type="text" id="searchInput" name="search" placeholder="OTSI SIIT">
        </form>
      </div>
      <ol>
        <?php
        $kask = $yhendus->prepare("SELECT id, aine FROM konsultatsioon");
        $kask->bind_result($id, $aine);
        $kask->execute();
        while ($kask->fetch()) {
          echo "<li><a href='?id=$id' style=' color: black'>" . htmlspecialchars($aine) . "</a></li>";
        }
        ?>
        <a href="LisaOpetaja.php" style="color: black; text-decoration: none"><strong>LISA ÕPETAJA</strong></a>
      </ol>
    </div>
    <div class="center-content">
      <?php
      if (isset($_REQUEST["id"])) {
        $kask = $yhendus->prepare("SELECT k.id, k.opetaja, k.aine, k.klass, k.paev, k.kellaaeg, o.opetajanimi FROM konsultatsioon k INNER JOIN opetaja o ON k.opetaja = o.Id WHERE k.id=?");
        $kask->bind_param("i", $_REQUEST["id"]);
        $kask->bind_result($id, $opetaja, $aine, $klass, $paev, $kellaaeg, $opetajanimi);
        $kask->execute();
        if ($kask->fetch()) {
          echo "<h1>" . htmlspecialchars($aine) . "</h1>";
          echo "Õpetaja: " . htmlspecialchars($opetajanimi) . "";
          echo "<br>";
          echo "Klass: " . htmlspecialchars($klass) . "";
          echo "<br>";
          echo "Päev: " . htmlspecialchars($paev) . "";
          echo "<br>";
          echo "Kellaaeg: " . htmlspecialchars($kellaaeg) . "";
          ?>
          <div class="container">
            <div class="column" style="margin-top: 36px">
              <label for="teacher">Õpetaja:</label>
              <label for="aine">Aine:</label>
              <label for="klass">Klass:</label>
              <label for="day">Paev:</label>
              <label for="time">Kellaaeg:</label>
            </div>
            <?php
            // Vorm andmete muutmiseks
            echo '<form method="POST" >';
            ?>
            <div class="column">
              <?php
              echo '<input type="hidden" name="id" value="' . $id . '">';
              echo '<input type="text" name="nimi"  value="' . $opetajanimi . '">';
              echo '<input type="text" name="aine" value="' . $aine . '">';
              echo '<input type="text" name="klass" value="' . $klass . '">';
              echo '<input type="text" name="paev" value="' . $paev . '">';
              echo '<input style="width: 262px" type="time" name="kellaaeg" value="' . $kellaaeg . '">';
              ?>
            </div>
          </div>
          <?php
          echo '<button class="muuda-button" type="submit" name="muuda" onclick="showAlert()"> MUUDA </button>';
          echo '<button class="kustuta-button" type="submit" name="kustuta"> KUSTUTA </button>';
          echo '</form>';

        } else {
          echo "Andmed on kustutatud!";
        }

      }
      if (isset($_GET["search"])) {
        $searchTerm = $_GET["search"];
        $kask = $yhendus->prepare("SELECT id, aine FROM konsultatsioon WHERE aine LIKE ?");
        $searchTerm = "" . $searchTerm . "";
        $kask->bind_param("s", $searchTerm);
        $kask->bind_result($id, $aine);
        $kask->execute();
        echo "<h2>Otsingu tulemused aine kohta: " . htmlspecialchars($searchTerm) . "</h2>";

        while ($kask->fetch()) {
          echo "<a href='?id=$id' style='color: black'>" . htmlspecialchars($aine) . "</a>";
          echo "<br>";
        }

      }
      ?>
    </div>
    <script>
      function showAlert() {
        alert("Andmed edukalt muudetud!");
      }
    </script>
    <?php
    require("footer.php");
    ?>
</body>

</html>