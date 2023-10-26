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
        $uniqueAined = array(); // Looge tühi massiiv ainete jaoks
        
        $kask = $yhendus->prepare("SELECT DISTINCT aine FROM konsultatsioon"); // Küsige ainult unikaalseid aineid
        $kask->bind_result($aine);
        $kask->execute();

        while ($kask->fetch()) {
          $uniqueAined[] = $aine; // Lisa ainult unikaalsed ained massiivi
        }

        // Kuvage menüüs ainult unikaalsed ained
        foreach ($uniqueAined as $aine) {
          echo "<li><a href='?aine=$aine' style='color: black'>" . htmlspecialchars($aine) . "</a></li>";
        }
        ?>
      </ol>
    </div>
    <div class="center-content">

      <?php
      if (isset($_REQUEST["aine"])) {
        $aineParam = $_REQUEST["aine"];

        $kask = $yhendus->prepare("SELECT k.id, k.opetaja, k.aine, k.klass, k.paev, k.kellaaeg, o.opetajanimi FROM konsultatsioon k INNER JOIN opetaja o ON k.opetaja = o.Id WHERE k.aine = ?");
        $kask->bind_param("s", $aineParam);
        $kask->bind_result($id, $opetaja, $aine, $klass, $paev, $kellaaeg, $opetajanimi);
        $kask->execute();

        echo "<h1>" . htmlspecialchars($aineParam) . "</h1>";

        while ($kask->fetch()) {
          echo "<hr/>";
          echo "Õpetaja: " . htmlspecialchars($opetajanimi) . "";
          echo "<br>";
          echo "Klass: " . htmlspecialchars($klass) . "";
          echo "<br>";
          echo "Päev: " . htmlspecialchars($paev) . "";
          echo "<br>";
          echo "Kellaaeg: " . htmlspecialchars($kellaaeg) . "";
          echo "<br>";
          echo "<hr/>";

        }
        echo "<span>KONSULTATSIOON TOIMUB AINULT REGISTREERIMISE ALUSEL!</span>";
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
</body>
<?php
require("footer.php");
?>

</html>

<?php
$yhendus->close();
?>