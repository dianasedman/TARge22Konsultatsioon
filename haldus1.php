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
        <input type="text" id="searchInput" placeholder="Otsi siit">
        <button type="submit">Otsi</button>
      </div>
      <ol>
        <?php
        $kask = $yhendus->prepare("SELECT id, aine FROM konsultatsioon");
        $kask->bind_result($id, $aine);
        $kask->execute();
        while ($kask->fetch()) {
          echo "<li><a href='?id=$id'>" . htmlspecialchars($aine) . "</a></li>";
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
          echo '<form method="POST">';
          echo '<input type="hidden" name="id" value="' . $id . '">';
          echo 'Aine: <input type="text" name="aine" value="' . $aine . '"><br>';
          echo 'Klass: <input type="text" name="klass" value="' . $klass . '"><br>';
          echo 'Päev: <input type="text" name="paev" value="' . $paev . '"><br>';
          echo 'Kellaaeg: <input type="text" name="kellaaeg" value="' . $kellaaeg . '"><br>';
          echo '<button class="muuda-button" type="submit" name="muuda">Muuda</button>';
          echo '<button class="kustuta-button">Kustuta</button>';
          echo '</form>';
        } else {
          echo "Vigased andmed.";
        }
      }
      ?>
    </div>
  </div>
</body>

</html>
<?php
require("footer.php");
?>