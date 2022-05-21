
<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "project_prototype";

$connected = false;
$finished = false;
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

<?php
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT anneEtude, fac, specialite, COUNT(*) as count FROM inscription GROUP BY anneEtude, fac, specialite");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $conn = null;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Start Header -->
    <div class="header" id="header">
      <div class="container">
        <a href="index.php" class="logo"
          ><img src="imgs/Micro Club's Logo.svg" style="height: 30px"
        /></a>
        <ul class="main-nav">
            <li><a href="index.php#description">Brève description</a></li>
            <li><a href="index.php#evenements">Evenements</a></li>
            <li><a href="#features">Historique</a></li>
            <li><a href="#features">Activites</a></li>
        </ul>
      </div>
    </div>
    <!-- End Header -->
    <!-- Start inscription -->
    <div class="inscription" id="inscription">
      <div class="image">
        <div class="content">
          <h2>Commencez avec nous !</h2>
          <img src="imgs/megamenu.png" alt="" />
          <ul class="avantages">
            <div>
            <li>
                <p>
                    Associer votre image à un événement médiatisé auprès du grand
                    public estudiantin.
                </p>
                </li>
            </div>
            <div>
                <li>
                    <p>
                      Acquérir un grand public qui partage les mêmes valeurs à travers
                      nos événements et nos réseaux sociaux qui dépassent les 18 000
                      abonnés
                    </p>
                  </li>
            </div>
            <div>
                <li>
                    <p>
                      Apporter votre soutien à un club scientifique qui a déjà organisé
                      de nombreux évènements réussis.
                    </p>
                  </li>
            </div>
            <div>
                <li>
                    <p>
                      Encourager le développement numérique et ouvrir de nouvelles
                      portes en marketing digital.
                    </p>
                  </li>
            </div>
            <div>
                <li>
                    <p>
                      Nous souhaitons mettre l'accent sur la visibilité, c’est
                      pourquoi la présence des entreprises est capitale pour assurer
                      la réussite de notre événement et donner une dimension
                      professionnelle à notre club.
                    </p>
                  </li>
            </div>
            <div>
                <li>
                    <p>
                      En devenant partenaire/sponsor, vous valorisez vos produits et
                      vos prestations lors des évènements et vous associez votre image
                      à une opération médiatisée.
                    </p>
                  </li>
            </div>
            <div>
                <li>
                    <p>
                      Vous serez reconnu comme un acteur de développement social en
                      encourageant et soutenant les actions menées par de jeunes
                      étudiants.
                    </p>
                  </li>
            </div>
            <div>
                <li>
                    <p>
                      Au-delà d’une aide financière pour la concrétisation de cet
                      événement, vous vous montrerez sensible aux activités du club
                      et vous transmettrez votre soutien aux clubs scientifiques ainsi
                      qu’aux étudiants pleins d’ambition.
                    </p>
                  </li>
            </div>
            <div>
                <li>
                    <p>
                      Opportunité de médiatiser l’image de l’entreprise et la marque
                      dans le cadre d’une manifestation locale permettant de renforcer
                      votre notoriété.
                    </p>
                </li>
            </div>
          </ul>
        </div>
      </div>
      <div class="connected">
          <?php
          if($finished){
              if ($connected) echo "votre inscription a reussit";
              else echo "votre inscription n'a pas reussit, veillez réessayer";
          }
          ?>
      </div>
      <div class="form">
        <div class="content">
          <h2>Inscrire</h2>
          <form action="inscription.php" method="post" enctype= multipart/form-data>
            <div>
                <input
                class="input"
                type="text"
                required
                placeholder="Matricule"
                name="matricule"
                />
            </div>
            <div>
                <input
                class="input"
                type="text"
                required
                placeholder="Nom"
                name="nom"
                />
            </div>
            <div>
                <input
                class="input"
                type="text"
                placeholder="Prénom"
                name="prenom"
                required
                />
            </div>
            <div>
                <input
                class="input"
                placeholder="Adresse mail"
                type="email"
                name="email"
                required
                />
            </div>
            <div>
                <input
                class="input"
                placeholder="Téléphone"
                required
                type="tel"
                name="telephone"
                pattern="0[0-9]{9}"
                required
                />
            </div>
            <div>
                <select class="input" name="anneEtude" id="Année" required>
                    <option value="l1">L1</option>
                    <option value="l2">L2</option>
                    <option value="l3">L3</option>
                    <option value="m1">M1</option>
                    <option value="m2">M2</option>
                </select>
            </div>
            <div>
                <input
                class="input"
                placeholder="Spécialité"
                required
                type="text"
                name="specialite"
                />
            </div>
            <div>
                <input
                class="input"
                placeholder="Faculté"
                required
                type="text"
                name="fac"
                required
                />
            </div>
            <textarea
              class="input"
              placeholder="Parlez nous de votre motif"
              name="motif"
              required
            ></textarea>
            <button type="submit">ENVOYER</button>
          </form>
        </div>
      </div>
    </div>
    <!-- End inscription -->
    <!-- Start Stats -->
    <div class="stats" id="stats">
        <h2>Statistics</h2>
        <div class="container">
            <?php
            foreach ($result as $stat) {
            ?>
            <div class="box">
                <i class="far fa-user fa-2x fa-fw"></i>
                <span class="number" data-goal="<?php echo $stat['count'] ?>"><?php echo $stat['count'] ?></span>
                <span class="text"><?php echo $stat['anneEtude'] ?></span>
                <span class="text"><?php echo $stat['fac'] ?></span>
                <span class="text"><?php echo $stat['specialite'] ?></span>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- End Stats -->
  </body>
</html>
