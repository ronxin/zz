<?php
require_once 'SqlUtils.php';
$term = SQL_Utils::escapeString($_GET['term']);
$wc_table_name = SQL_Utils::escapeString($_GET['wc_table_name']);

$sql = "SELECT word, id FROM $wc_table_name WHERE word LIKE '{$term}%'";
if (strpos($wc_table_name, 'medline') !== FALSE) {
  $sql .= " AND word_class IS NOT NULL";
}
$sql .= " LIMIT 10";

$rows = SQL_Utils::selectQuery($sql);
if ($rows) {
  $output = array();
  foreach ($rows as $row) {
    $word = $row['word'];
    $id = $row['id'];
    $output[] = array('label'=>$word, 'value'=>$id);
  }
  echo json_encode($output);
}
?>
