<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
          <option value="sedman">Sedman</option>
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

  <footer>
    <a href="#">Konsultatsioonid</a>
    <a href="#">Konsultatsiooni sisestus</a>
    <a href="#">Registreerimine</a>
    <a href="#">Puuduvad konsultatsioonid</a>
    <a href="#">Haldus</a>
  </footer>
</body>

</html>