<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");
global $yhendus;
$kask = $yhendus->prepare("SELECT Id, opetajanimi FROM opetaja");
$kask->bind_result($id, $opetaanimi);

$kask->execute();
?>
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
      <h1>Programmeerimine</h1>
      <div class="schedule">
        <div class="column">
          <div class="row">D.Sedman</div>
          <div class="row">A230</div>
          <div class="row">Teisipäev</div>
          <div class="row">17:00-19:00</div>
        </div>

        <div class="column">
          <div class="row">D.Sedman</div>
          <div class="row">A230</div>
          <div class="row">Teisipäev</div>
          <div class="row">17:00-19:00</div>
        </div>

        <div class="column">
          <div class="row">D.Sedman</div>
          <div class="row">A230</div>
          <div class="row">Teisipäev</div>
          <div class="row">17:00-19:00</div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php
require("footer.php");
?>
<?php
$yhendus->close();
?>