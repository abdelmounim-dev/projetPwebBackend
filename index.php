<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "project_pweb";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Micro Club</title>
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
          <li><a href="index.php#galerie">Galerie</a></li>
          <li><a href="index.php#footer">Contact</a></li>
        </ul>
      </div>
    </div>
    <!-- End Header -->
    <!-- Start Landing -->
    <div class="landing">
      <div class="background">
        <img style="width: 800px;" src="/imgs/istockphoto-962219860-170667a.jpg" alt="">
      </div>
      <div class="container">
        <div class="text">
          <h1>Welcome, To Micro Club</h1>
          <p>
            a scientific club located in USTHB. <br />
            <a href="inscription.php">
              <button><div>Inscrire</div></button>
            </a>
          </p>
        </div>
        <div class="image">
          <img src="imgs/laptop.png" />
        </div>
      </div>
      <a href="#description" class="go-down">
        <i class="fas fa-angle-double-down fa-2x"></i>
      </a>
    </div>
    <!-- End Landing -->
    <!-- Start description -->
    <div class="description" id="description">
      <h2 class="main-title">Brève description</h2>
      <div class="container">
        <img src="imgs/work-steps.png" alt="" class="image" />
        <div class="info">
          <div class="box">
            <img src="imgs/job-seeking.png" alt="" />
            <div class="text">
              <h3>Qui somme nous</h3>
              <p>
                Créé en 1985 à l’USTHB, Micro Club est le premier club
                scientifique universitaire en Algérie. À but non lucratif, il
                œuvre à la vulgarisation et l’initiation à l’informatique,
                notamment par l’organisation de formations ciblées et
                d’évènements.
              </p>
            </div>
          </div>
          <div class="box">
            <img src="imgs/work-steps-3.png" alt="" />
            <div class="text">
              <h3>Notre but</h3>
              <p>
                Micro Club vise non seulement à armer les étudiants d'un bagage
                de compétences techniques, par le biais de la promotion de
                l’informatique et des différents domaines IT, mais pousse aussi
                à la familiarisation et l'insertion au monde professionnel en
                encourageant le développement des relations entre notre
                communauté estudiantine et le monde de l'entreprenariat. Nous
                poussons notamment les membres actifs et les adhérents du club à
                améliorer la production scientifique, au sein du campus en
                particulier, mais également sur tout le territoire national.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End description -->
    <!-- Start evenements -->
    <div class="evenements" id="evenements">
      <h2 class="main-title">evenements</h2>
      <div class="container">
          <?php
          $statement = $conn->prepare("SELECT titre, date, type, description, image FROM events ORDER BY date DESC");
          $statement->execute();
          $events = $statement->fetchAll(PDO::FETCH_ASSOC);
          
          foreach ($events as $event) {
          ?>
        <div class="box">
          <img src="<?php echo $event['image'] ?>" alt="" />
          <h3><?php echo $event['titre'] ?></h3>
          <span class="title"><?php echo $event['type'] ?></span>
          <div class="date">
            <p><em><?php echo $event['date'] ?></em></p>
          </div>
          <p>
            <?php echo $event['description'];  ?>
          </p>
        </div>
          <?php
          }
          ?>
      </div>
    </div>
    <!-- End evenements -->
    <!-- Start Galerie -->
    <div class="galerie" id="galerie">
      <h2 class="main-title">Galerie</h2>
      <div class="container">
        <div class="box">
          <div class="image">
            <img src="imgs/mc shots/1.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="imgs/mc shots/2.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="imgs/mc shots/3.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="imgs/mc shots/4.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="imgs/mc shots/5.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="imgs/mc shots/6.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="imgs/mc shots/7.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="imgs/mc shots/8.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="imgs/mc shots/9.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
    <!-- End Galerie -->

    <!-- Start Footer -->
    <div class="footer" id="footer">
      <div class="container">
        <div class="box">
          <img src="imgs/Micro Club's Logo.svg" class="logo" />
          <ul class="social">
            <li>
              <a href="https://facebook.com/Micro.Club.USTHB" class="facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/club_micro" class="twitter">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a
                href="https://www.instagram.com/microclub_usthb"
                class="instagram"
              >
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="https://github.com/MicroClub-USTHB" class="github">
                <i class="fab fa-github"></i>
              </a>
            </li>
          </ul>
          <p class="text">
            Notre but vous intéresse? Vous avez des questions? Vous
            souhaitez faire une proposition? Contactez-nous!
          </p>
        </div>
        <form action="feedback_form.php" class="box" method="post">
          <input
            class="input"
            placeholder="Adresse mail"
            type="email"
            name="email_address"
          />
          <textarea class="input" name="feedback" placeholder="Message"></textarea>
          <input class="input" type="submit" name="send" value="Submit">
        </form>
        <div class="box">
          <div class="line">
            <i class="fas fa-map-marker-alt fa-fw"></i>
            <div class="info">
              Room 148, Faculty of computer science, USTHB, Alger, Algérie.
            </div>
          </div>
          <div class="line">
            <i class="fas fa-phone-volume fa-fw"></i>
            <div class="info">
              <span>+213 558 52 11 45</span>
              <span>+213 554 55 28 90</span>
            </div>
          </div>
        </div>
        <div class="box footer-gallery">
          <img src="imgs/mc shots/1.jpg" alt="" />
          <img src="imgs/mc shots/2.jpg" alt="" />
          <img src="imgs/mc shots/3.jpg" alt="" />
          <img src="imgs/mc shots/4.jpg" alt="" />
          <img src="imgs/mc shots/5.jpg" alt="" />
          <img src="imgs/mc shots/6.jpg" alt="" />
        </div>
      </div>
      <p class="copyright">© Micro Club</p>
    </div>
    <!-- End Footer -->
    <script src="js/main.js"></script>
  </body>
</html>
