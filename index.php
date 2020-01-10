<?php
  function loadData () {
    $content = file_get_contents("data.json");
    $data = json_decode($content, true);
    return $data;
  }

  function storeData ($data) {
    $content = json_encode($data, JSON_PRETTY_PRINT);
    if ($content === "[]") $content = "{}";
    file_put_contents("data.json", $content);
  }

  function setVariable (&$data, $name, $value) {
    // NOW(), IP()
    if (is_array($name)) {
      for ($i = 0; $i < count($name); $i++) {
        setVariable($data, $name[$i], is_array($value) ? $value[$i] : $value);
      }
    } elseif (!isset($value)) {
      unset($data[$name]);
    } elseif ($value === "NOW()") {
      $data[$name] = time();
    } elseif ($value === "IP()") {
      $data[$name] = $_SERVER["REMOTE_ADDR"];
    } else {
      $data[$name] = $value;
    }
  }

  if (isset($_GET["json"])) {
    header("Content-type: application/json");
    readfile("data.json");
    exit;
  } else if (isset($_GET["get"]) || isset($_GET["set"]) || isset($_GET["since"])) {
    $data = loadData();
    if (isset($_GET["get"])) {
      echo($data[$_GET["get"]]);
      $data = loadData();
    } elseif (isset($_GET["since"])) {
      echo(time() - $data[$_GET["since"]]);
    } else if (isset($_GET["set"])) {
      setVariable($data, $_GET["set"], $_GET["value"]);
      storeData($data);
      var_dump($data);
    }
    exit;
  }
?><!DOCTYPE html>
<html>
  <head>
    <title>Access Denied</title>
  </head>
  <body>
    <h1>Access Denied</h1>
    <?php echo(time()); ?>
  </body>
</html>