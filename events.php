<!-- Page Evènements ou se trouve une liste de tous les événements du club du plus récent
au plus ancien. Chaque évènement possède un titre, une date, un type : formation,
conférence, manifestation scientifique,..etc et une petite description. Ces informations
doivent être enregistrées dans la base de données du site. -->
<?php
  
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "project_prototype";

  try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
  }

  $statement = $conn->prepare("SELECT titre, date, type, description FROM events ORDER BY date DESC");
  $statement->execute();
  $events = $statement->fetchAll(PDO::FETCH_ASSOC);
  echo $events;
  } catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
  }

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css"> -->
  <title>Events!</title>
</head>

<body>

  <h1>Events</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">titre</th>
        <th scope="col">date</th>
        <th scope="col">type</th>
        <th scope="col">description</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($events as $i => $event): ?>
      <tr>
        <th scope="row"><?php echo $event['titre']?></th>
        <td><?php echo $event['date']?></td>
        <td><?php echo $event['type']?></td>
        <td><?php echo $event['description']?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

</body>

</html>