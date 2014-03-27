<!DOCTYPE html>
<html>
<head>
<title>ZZ</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" 	href="zz.css">
<link rel="stylesheet" type="text/css" 	href="jquery-ui-1.10.4.custom.min.css">

<body>
	<h1 class="center">ZZ</h1>
	<div class="center"
		style="float: top; background-color: LightGray; padding: 10px;">		
		<form id='query_form' action="index.php" method="get">
			<span>
				<label for="query">Ask me: </label> 
				<input type="text" name="q" id="query" size="50" value="<?php 
				  $query = isset($_GET['q']) ? $_GET['q'] : "What is";
				  echo $query;				
				?>"></input>
			</span> 
			<input type="submit" value="Submit"/>
		</form>
	</div>
  <div class="center" id="answer">
  </div>
</body>

<?php
require_once 'SqlUtils.php';
echo "<h2 class=\"center\">";

if (isset($_GET['q'])) {
  $query = $_GET['q'];
  $answer = "Err... I don't know. Make me smarter!";
  if (substr($query, 0, 8) == "What is ") {
    $entity = substr($query, 8);
    $entity = rtrim($entity, "?");
    $entity = trim($entity);
    $sql = "SELECT * FROM facts WHERE entity LIKE '$entity' LIMIT 1";
    $row = SQL_Utils::selectQueryExpectSingleResult($sql);
    if ($row) {
      $desc = $row['desc'];
      if (strlen($desc) > 0) {
        $answer = $entity . ' is ' . $desc . '.';
        $answer = ucfirst($answer);
      }
    }
  }
  echo $answer;
}
echo "</h2>";
?>

<script src="jquery-1.10.2.js"></script>
<script src="jquery-ui-1.10.4.custom.min.js"></script>
<script src="zz.js"></script>
<center>&copy; 2014&nbsp;Xin Rong, <a href="mailto:ronxin@umich.edu">ronxin@umich.edu</a></center>
</html>
