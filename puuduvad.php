<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");
global $yhendus;

$query = "SELECT o.opetajanimi
          FROM opetaja o
          WHERE o.id NOT IN (
            SELECT k.opetaja
            FROM konsultatsioon k
            GROUP BY k.opetaja
            HAVING COUNT(*) >= 2
          )";
$result = mysqli_query($yhendus, $query);
$nimed = array();
while ($row = mysqli_fetch_assoc($result)) {
  $nimed[] = $row["opetajanimi"];
}

?>
<?php
require("header.php");
?>

<body>
  <main>
    <h1 style="color: #d3d3d3">Puuduvad konsultatsiooni ajad</h1>
    <h3 style="color: #d3d3d3 ">2023 - 2024. õa</h3>

    <div class=" teacher-list">
      <?php
      if (!empty($nimed)) {
        echo "<ul>";
        foreach ($nimed as $nimi) {
          echo "<li><a href='sisestus.php' style=' color: black'> .$nimi</li>";
        }
        echo "</ul>";
      } else {
        echo "Kõik õpetajad vastavad tingimusele.";
      }
      ?>
    </div>
  </main>
  <footer>
    <?php require("footer.php"); ?>
  </footer>

</body>



</html>