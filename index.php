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

<body>
  <header>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhGeNJgDFZQ5WRgX4nTiEGW-2IMH9-VREVH-tb9K9eew&s"
      alt="Logo">
    <div class="menu-links">
      <a href="index.php">KONSULTATSIOONID</a>
      <a href="sisestus.php">KONSULTATSIOONI SISESTUS</a>
      <a href="registreerimine.php">REGISTREERIMINE</a>
      <a href="puuduvad.php">PUUDUVAD KONSULTATSIOONID</a>
      <a href="haldus.php">HALDUS</a>
    </div>
    <a href="http://tthk.ee" target="_blank" class="button">Tagasi kooli</a>
  </header>

  <div class="content">
    <div class="left-menu">
      <h2>Konsultatsioonid</h2>
      <div class="search-container">
        <input type="text" id="searchInput" placeholder="Otsi siit">
        <button type="submit">Otsi</button>
      </div>
      <ul>
        <li><a href="#">Programmeerimine</a></li>
        <li><a href="#">Veebiprogrammeerimine</a></li>
        <li><a href="#">Robootika</a></li>
        <li><a href="#">Read more...</a></li>
      </ul>
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
  <footer>
    <a href="#">Konsultatsioonid</a>
    <a href="#">Konsultatsiooni sisestus</a>
    <a href="#">Registreerimine</a>
    <a href="#">Puuduvad konsultatsioonid</a>
    <a href="#">Haldus</a>
  </footer>
</body>

</html>