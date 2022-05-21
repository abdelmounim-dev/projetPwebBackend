<!-- Page Inscription qui propose à l’utilisateur de faire une demande d’adhésion au club via
un formulaire complet comportant le matricule, le nom, le prénom, l’adresse mail , le
téléphone, l’année d’étude(L1,L2,L3,M1,M2), la spécialité, la faculté, le motif
d’inscription et l’objectif attendu du club. Un message de confirmation de la demande
doit être affiché pour informer l’utilisateur que sa demande a bien été enregistrée. Cette
demande sera enregistrée au niveau de la base de données du site. Des statistiques
comme le nombre d’inscrits par faculté/ par année d’études seront affichées aussi.-->
<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "project_prototype";

  $connected = false;
  // $conn = new mysqli($servername, $username, $password, $dbname);
  try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    
    $matricule = $_POST['matricule'];
    $nom = $_REQUEST['nom'];
    $prenom = $_REQUEST['prenom'];
    $email = $_REQUEST['email'];
    $telephone = $_REQUEST['telephone'];
    $anneEtude = $_REQUEST['anneEtude'];
    $specialite = $_REQUEST['specialite'];
    $fac = $_REQUEST['fac'];
    $motif = $_REQUEST['motif'];

    


  $stmt = $conn->prepare("INSERT INTO inscription (matricule,
   nom,
   prenom,
   email,
   telephone,
   anneEtude,
   fac,
   specialite,
   motif
  )
      VALUES (:matricule,
       :nom,
       :prenom,
       :email,
       :telephone,
       :anneEtude,
       :fac,
       :specialite,
       :motif
      )");
  $stmt->bindParam(':matricule', $matricule);
  $stmt->bindParam(':nom', $nom);
  $stmt->bindParam(':prenom', $prenom);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':telephone', $telephone);
  $stmt->bindParam(':anneEtude', $anneEtude);
  $stmt->bindParam(':fac', $fac);
  $stmt->bindParam(':specialite', $specialite);
  $stmt->bindParam(':motif', $motif);




  $stmt->execute();
  $connected = true;
  }
  } catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
  }

if ($connected) {
  echo "Connected successfully";
} 
$conn = null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <title>Document</title>
</head>

<body>
  <pre>
    <?php
      var_dump($_POST);
    ?>
  </pre>

<form action="Inscription2.php" method="post" enctype= multipart/form-data>
  <div class="mb-3">
    <label >Matricule</label>
    <input type="text" name="matricule" class="form-control" required>
  </div>
  <div class="mb-3">
    <label >Nom</label>
    <input type="text" name="nom" class="form-control" required>
  </div>
  <div class="mb-3">
    <label >Prenom</label>
    <input type="text" name="prenom" class="form-control" required>
  </div>
  <div class="mb-3">
    <label >Adresse Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label >telephone</label>
    <input type="tel" name="telephone" class="form-control" pattern="0[0-9]{9}" required>
  </div>
  <div class="mb-3">
    <label for="anneEtude">Année d'étude</label>
    <select name="anneEtude" id="Année"required>
      <option value="l1">L1</option>
      <option value="l2">L2</option>
      <option value="l3">L3</option>
      <option value="m1">M1</option>
      <option value="m2">M2</option>
    </select>
  </div>
  <div class="mb-3">
    <label >specialité</label>
      <input type="text" name="specialite" class="form-control" >
  </div>
  <div class="mb-3">
    <label >faculté</label>
      <input type="text" name="fac" class="form-control" required>
  </div>
  <div class="mb-3">
    <label >Motif</label>
    <textarea class="form-control" name="motif" required></textarea>
  </div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
  if ($connected) {
    ?>
    <h3
      style="
        text-align: center;
      "
    >Connected successfuly</h3>
    <?php
  }
?>

</body>

</html>
