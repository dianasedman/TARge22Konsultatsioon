<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");
global $yhendus;
$kask = $yhendus->prepare("SELECT Id, opetajanimi FROM opetaja");
$kask->bind_result($id, $opetaanimi);

$kask->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konsultatsioonid</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>
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
        } else {
          echo "Vigased andmed.";
        }
      }
      ?>
</body>

</html>
<?php
require("footer.php");
?>
<?php
$yhendus->close();
?>