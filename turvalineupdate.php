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

if (!empty($_REQUEST["korras_id"]) && isset($_REQUEST["page"])) {
  $updateSql = [
    "slalom" => "UPDATE jalgrattaeksam SET slaalom=1 WHERE id=?",
    "roundabout" => "UPDATE jalgrattaeksam SET ringtee=1 WHERE id=?",
    "street" => "UPDATE jalgrattaeksam SET t2nav=1 WHERE id=?"
  ];

  if (in_array($_REQUEST["page"], array_keys($updateSql))) {
    $kask = $yhendus->prepare($updateSql[$_REQUEST["page"]]);
    $kask->bind_param("i", $_REQUEST["korras_id"]);
    $kask->execute();
  }
}
?>