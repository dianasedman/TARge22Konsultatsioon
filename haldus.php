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

if (isset($_POST["lisa"])) {
  // Töötlemine, kui kasutaja on vajutanud "Muuda" nuppu
  // Uuenda andmeid andmebaasis
  $id = $_POST["id"];
  $opetajanimi = $_POST["opetajanimi"];

  $kask = $yhendus->prepare("INSERT INTO opetaja (id, opetajanimi) VALUES(?, ?)");
  $kask->bind_param("is", $id, $opetajanimi);
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
          <input type="text" id="searchInput" name="search" placeholder="Otsi siit">
          <button type="submit">Otsi</button>
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

          // Vorm andmete muutmiseks
          echo '<form method="POST" class="muuda-form">';
          echo '<input type="hidden" name="id" value="' . $id . '">';
          echo 'Õpetaja: <input type="text" name="aine" class="muuda-input" value="' . $opetajanimi . '"><br>';
          echo 'Aine: <input type="text" name="aine" class="muuda-input" value="' . $aine . '"><br>';
          echo 'Klass: <input type="text" name="klass" class="muuda-input" value="' . $klass . '"><br>';
          echo 'Päev: <input type="text" name="paev" class="muuda-input" value="' . $paev . '"><br>';
          echo 'Kellaaeg: <input style="width: 262px" type="time" name="kellaaeg" class="muuda-input" value="' . $kellaaeg . '"><br>';
          echo '<button class="lisa-button" type="submit" name="lisa" onclick="showAlert()">Lisa</button>';
          echo '<button class="muuda-button" type="submit" name="muuda" onclick="showAlert()">Muuda</button>';
          echo '<button class="kustuta-button" type="submit" name="kustuta">Kustuta</button>';
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
          echo "<a href='?id=$id' style='color: #d3d3d3'>" . htmlspecialchars($aine) . "</a>";
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
</body>

</html>
<?php
require("footer.php");
?>