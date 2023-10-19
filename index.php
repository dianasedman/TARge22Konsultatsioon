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
</body>

</html>
<?php
require("footer.php");
?>