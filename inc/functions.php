
<?php

// NAVBAR GENERATOR
$navbar = ['Log In'=>'login',
			 'Home'=>'home',
			 'Flight Details'=>'details',
			 'Order Flight' =>'order'];

function renderNav($navArray) {
	foreach ($navArray as $name=>$link):?> 
		<li><a href='?page=<?=$link?>'><?=$name?></a></li>
		<?php endforeach ?>

<?php
};

// MAILER

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
if (isset ($_POST['send']) || isset($_POST['feedback'])) {
    try {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'kalafioras.serveriai.lt';              // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'send@ldauto.lt';                   // SMTP username
        $mail->Password = 'Testas123';        // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('send@ldauto.lt', 'Mailer');
        $mail->addAddress(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['name']));

        $mail->isHTML(true);                                  // Set email format to HTML
        if (isset ($_POST['send'])) {
            $mail->Subject = 'Problem from air_project';
        } else {
            $mail->Subject = 'Feedback from air_project';
        }
        $mail->Body    = htmlspecialchars($_POST['message']);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->send();
        header('Location:index.php');
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

// MYSQL DATABASE CONNECTION AND MANIPULATION

try {
    $conn = new PDO($dsn, $username, $password);
    $bestDeals = $conn->query("SELECT * FROM category JOIN flight ON category.id = flight.flight_category WHERE flight.flight_category = 1");
    $flightNames = $bestDeals->fetchAll(PDO::FETCH_ASSOC);
    $flightCategories = $conn->query("SELECT category.id, category.name FROM category");
    $categoryNames = $flightCategories->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo $e;
}

function generateDeals($flightNames) {
    foreach ($flightNames as $flightName):?>
    <?php $flightId = $flightName['id'];?>
       <div class="4u 12u$(medium)">
           <section class="box">
                <i class="icon big rounded color1 fa-cloud"></i>
                <h3><?=$flightName['name'] ?></h3>
                <p><?=$flightName['description'] ?></p>
                <form method='post'><button class="button small" name='flightInfo' value='<?=$flightId;?>'>Placiau</button></form>
           </section>
       </div>
    <?php endforeach;
}

function generateCategories($categoryNames, $connection) {
    foreach ($categoryNames as $categoryName):?>
    <?php $categoryId = $categoryName['id'];
    $flights = $connection->query("SELECT * FROM category JOIN flight ON category.id = flight.flight_category WHERE flight.flight_category = $categoryId");
    $flightsForCategory = $flights->fetchAll(PDO::FETCH_ASSOC) ?>
    <section id="one" class="wrapper style1 special">
        <div class='container'>
            <header class='major'>
                <h2><?=$categoryName['name'] ?></h2>
            </header>
            <div class='row 150%'>
                <?php generateDeals($flightsForCategory) ?>
            </div>
        </div>
    </section>
    <?php endforeach;
}

function generateFlightInfo($connection) {
    if(isset($_POST['flightInfo'])) {
        $post = $_POST['flightInfo'];
        $flightDetails = "SELECT * FROM flight WHERE id = :id";
        $flightDetailsPrepare = $connection->prepare($flightDetails);
        $flightDetailsPrepare->bindParam(':id', $post, PDO::PARAM_STR);
        $flightDetailsPrepare->execute();
        $fullFlightDetails = $flightDetailsPrepare->fetchAll(PDO::FETCH_ASSOC);?>
        <div class='container 50%'>
            <br>
            <h2>Name: <?=$fullFlightDetails[0]['name'] ?></h2>
            <h2>Description: <?=$fullFlightDetails[0]['description'] ?></h2>
            <h2>From: <?=$fullFlightDetails[0]['flight_from'] ?></h2>
            <h2>To: <?=$fullFlightDetails[0]['flight_to'] ?></h2>
            <h2>Price: <?=$fullFlightDetails[0]['price'] ?></h2>
            <br>
        </div>
        <?php 
    }
}


function showTable($connection){
    $flight = $connection->query("SELECT * FROM flight");
    $flArray = $flight -> fetchAll(PDO::FETCH_ASSOC);
    foreach ($flArray as $flight):?>
        <tr>

            <td><?=$flight['id'];?></td>
            <td><?=$flight['name'];?></td>
            <td><?=$flight['description'];?></td>
            <td><?=$flight['flight_from'];?></td>
            <td><?=$flight['flight_to'];?></td>
            <td><?=$flight['price'];?></td>
            <td><?=$flight['flight_category'];?></td>

        </tr>
    <?php endforeach;
}


function showCategory($connection){
    $category = $connection->query("SELECT * FROM category");
    $catArray = $category -> fetchAll(PDO::FETCH_ASSOC);
    foreach ($catArray as $category):?>
        <tr>

            <td><?=$category['id'];?></td>
            <td><?=$category['name'];?></td>

        </tr>
    <?php endforeach;
}





function addFlight($connection){
    if (isset($_POST["insert"]))
    {
        $skaiciu_sablonas = '/[0-9.,]{1,10}/';
        $raidziu_sablonas = '/[A-Za-z .,]{5,100}/';
        $id = $_GET['id'];
        $vardas = $_POST['name'];
        $description = $_POST['description'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        if (preg_match($raidziu_sablonas, $vardas) && preg_match($raidziu_sablonas, $description) && preg_match($raidziu_sablonas, $from) &&
            preg_match($raidziu_sablonas, $to) && preg_match($skaiciu_sablonas, $price) && preg_match($skaiciu_sablonas, $category))
        {
            $flightInfo = "INSERT INTO flight(name, description, flight_from, fligh_to, price, flight_category) 
                          VALUES(:name, :description , :from , :to , :price, :category)";
            $flightInfoPrep = $connection->prepare($flightInfo);
            $flightInfoPrep->bindParam(':name', $vardas, PDO::PARAM_STR);
            $flightInfoPrep->bindParam(':description', $description, PDO::PARAM_STR);
            $flightInfoPrep->bindParam(':from', $from, PDO::PARAM_STR);
            $flightInfoPrep->bindParam(':to', $to, PDO::PARAM_STR);
            $flightInfoPrep->bindParam(':price', $price, PDO::PARAM_STR);
            $flightInfoPrep->bindParam(':category', $category, PDO::PARAM_STR);

            if ($conn->query($flightInfo) === TRUE)
            {
                echo "New record created successfuly";
            }
            else
            {
                echo "Error: " . $flightInfo . "<br />" . $conn->error;
            }
        }
        else
        {
            echo "Blogai ivesti duomenys";
        }
    }
}