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
    <p> Igal õpetajal vähemalt <b>kaks</b> konsultatsiooni aega </p>
    <div class="mb-3">
      <label for="teacher" class="form-label">Õpetaja</label>
      <input type="text" class="form-control" id="teacher">
    </div>
    <div class="mb-3">
      <label for="aine" class="form-label">Aine</label>
      <input type="text" class="form-control" id="aine">
    </div>
    <div class="mb-3">
      <label for="klass" class="form-label">Klass</label>
      <input type="text" class="form-control" id="klass">
    </div>

    <div class="mb-3">
      <label for="day">Päev</label>

      <select name="day" id="day">
        <option value="esmaspaev">Esmaspäev</option>
        <option value="teisipaev">Teisipäev</option>
        <option value="kolmapaev">Kolmapäev</option>
        <option value="neljapaev">Neljapäev</option>
        <option value="reede">Reede</option>
        <option value="laupaev">Laupäev</option>
        <option value="puhapaev">Pühapäev</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="kellaaeg" class="form-label">Kellaaeg</label>
      <input type="time" class="form-control" id="kellaaeg">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
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