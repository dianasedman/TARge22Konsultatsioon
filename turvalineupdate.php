<?php
if (!empty($_REQUEST["korras_id"]) && isset($_REQUEST["page"])) {

  $values = ["slaalom", "ringtee", "tänav"];
  $page = $_REQUEST["page"];

  if (in_array($page, $values)) {
    $sql = "UPDATE jalgrattaeksam SET $page = 1 WHERE id=?";
    $kask = $yhendus->prepare($sql);
    $kask->bind_param("i", $_REQUEST["korras_id"]);

    if ($kask->execute()) {
      echo "Andmebaasi uuendamine õnnestus!";
    } else {
      echo "Viga andmebaasi uuendamisel: " . $kask->error;
    }
  } else {
    echo "Vigane väärtus sisestatud leheküljele (page)!";
  }
}
?>