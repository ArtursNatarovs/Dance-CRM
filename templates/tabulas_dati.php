<?php
require_once("config.php");
include('header.php');
include('navbar.php');
include('Layout/section.php');
include('leftMenu.php');

//echo '<a href="tabscont.php">Atpakaļ</a>';
$tabula=$_POST["tabula"];
echo '<div class="h-screen flex-grow-1 overflow-y-lg-auto"><h1>Tabulas '.$tabula. ' dati</h1>';


if ($result = $conn->query("SHOW TABLES LIKE '".$tabula."'" )) {
if($result->num_rows == 1) {
echo "Table exists";
$sql="select * from ".$tabula;
$result =$conn->query($sql);
$tnosaukumi = $result->fetch_fields();
//$i=1;
echo "<table >";
//echo "<tr><th>N.p.k.</th><th>Nosaukums</th><th>Cena</th></tr>";
echo '<tr>';
    foreach ($tnosaukumi as $elements) {
        echo '<th>';
        echo $elements->name;
        echo '</th>';
    }
echo '</tr>';

while ($row = $result->fetch_assoc())
{echo '<tr>';
        foreach ($row as $item) {
            echo '<td>';
            echo $item;
            echo '</td>';
        }//foreach
echo '</tr>';
}
echo "</table>";
}
else {
echo "Table does not exist";
}
}





/*$i=1;
while ($row=$result->fetch_assoc()){
echo $i.". ".$row["Tables_in_computercourses_it2021"]."<br>";
      $i++;
      }
*/
include('Layout/sectionEnd.php');
include('footer.php');

?>
