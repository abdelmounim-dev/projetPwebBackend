<!-- get statistics for numbre of inscription/anneEtude/fac/specialite from database -->
<?php
  $conn = new PDO("mysql:host=localhost;dbname=project_prototype", "root", "1234");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT anneEtude, fac, specialite, COUNT(*) as count FROM inscription GROUP BY anneEtude, fac, specialite");
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  var_dump($result)ii;
  $conn = null;
?>

<!-- table for statistics -->
<table>
  <tr>
    <th>anneEtude</th>
    <th>fac</th>
    <th>specialite</th>
    <th>count</th>
  </tr>
  <?php
    foreach ($result as $row) {
      echo "<tr>";
      echo "<td>".$row['anneEtude']."</td>";
      echo "<td>".$row['fac']."</td>";
      echo "<td>".$row['specialite']."</td>";
      echo "<td>".$row['count']."</td>";
      echo "</tr>";
    }
  ?>
</table>