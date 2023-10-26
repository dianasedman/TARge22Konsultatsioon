<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");
global $yhendus;
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
          echo "<br><br>";
          echo "<span>KONSULTATSIOON TOIMUB AINULT REGISTREERIMISE ALUSEL!</span>";
        } else {
          echo "Vigased andmed.";
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
        }

      }
      ?>
    </div>
</body>
<?php
require("footer.php");
?>

</html>

<?php
$yhendus->close();
?>