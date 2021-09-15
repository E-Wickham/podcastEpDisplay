<?php 
require_once 'models/buzzsproutAPI.php';

//Call Buzzsprout API 
$api = New Buzz();
$episodes = $api->getEp();


if(isset($_GET['id'])){

    $id = (string) $_GET['id'];

    foreach($episodes as $episode) if ($episode->id == $id){

        $title = $episode->title;
        $audio = $episode->audio_url;
        $artwork = $episode->artwork_url;
        $shownotes = $episode->description;
        $publishdate = $episode->published_at;
        $showtime = $episode->duration;

        $myDateTime = new DateTime($publishdate);
        $epPublishDate = $myDateTime->format('M d Y');
    } 

    $showtimeS = $showtime % 60;
    $showtimeM = ($showtime /60) % 60;
    $showtimeH = floor(($showtime /60) / 60);

    if ($showtimeS < 10) {
        $episodeDuration = $showtimeH . ":" . $showtimeM . ":0" . $showtimeS;

    } else if ($showtimeM < 10) {
        $episodeDuration = $showtimeH . ":0" . $showtimeM . ":" . $showtimeS;

    } else if ($showtimeM < 10 && $showtimeS < 10){
        $episodeDuration = $showtimeH . ":0" . $showtimeM . ":0" . $showtimeS;

    } else {
        $episodeDuration = $showtimeH . ":" . $showtimeM . ":" . $showtimeS;
    }



}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/player.css">
    <link rel="stylesheet" href="css/ep-style.css">
     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <link href="css/styles.css" rel="stylesheet" /> 

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com"> <link href="https://fonts.googleapis.com/css2?family=Newsreader&display=swap" rel="stylesheet">
    
    
    <!-- going to have to build navbar from scratch or something like that 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    -->
    <!-- Core theme CSS (includes Bootstrap)-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta property="og:title" content="Big Shiny Takes">
        <meta property="og:description" content="The world's only Canadian news columnist review AND anti-free speech Podcast">
        <meta property="og:image" content="assets/img/bigshinytakes.png">
        <meta property="og:url" content="https://bigshinytakes.com">
        <meta name="twitter:card" content="assets/img/newspapers-canada.png">
    <title><?php echo $title; ?></title>
</head>
<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Big Shiny Takes</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="./episodes.php">Episodes</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://bigshinytakes.com/#about">About</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://bigshinytakes.com/#contact">Support</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://www.instagram.com/bigshinytakes" target="_blank"><i class="fab fa-fw fa-instagram"></i></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://www.twitter.com/bigshinytakes" target="_blank"><i class="fab fa-fw fa-twitter"></i></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://www.facebook.com/bigshinytakes" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
            <div>
            <div class="hero-overlay"></div>   
            <img class="hero-img" src="assets/heroimg-test.jpg" alt="">
            <div id="episode-title">
                <h5><?php echo $epPublishDate ?></h5>

                <h1><?php echo $title ?></h1>
            </div>
        </div>



<div id="ep-container">    


            <!--Show Notes-->
            <div id="ShowNotes">
                <h4>Show Notes</h4>
                <p><?php echo $shownotes; ?></p>
            </div>

        
    </div>

</div>


    <div id="bottom-bar">
            <div class="player">
            
            <div id="title-container">
                <div id="art-flex">
                    <?php echo "<img id='pod-art' src='$artwork' width='200px' alt=''>";?>
                </div>
                <div id="title-flex">
                    <h5>Big Shiny Takes</h5>

                    <h3 id="showTitle"><?php echo $title ?></h3>
                        <div id="audioControls">
                            <div id="audioFlex">
                            <!-- Time and Progress Bar-->
                                <div id="time_and_progressFlex">
                                    <div id="episode_time">                   
                                    </div>
                                        <div id="episode_duration">/ <?php echo $episodeDuration ?>
                                        </div>
                                    <audio src="<?php echo $audio; ?>" class="player__audio listener"></audio>
                                
                                </div>
                                
                                <div id="playerFlex">
                                    <!--Player Buttons-->
                                    <button data-skip="-10" class="player__button">-10</button>
                                        <button id="playbtn" class="player__button toggle" title="Toggle Play">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
                                            <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                                            </svg>
                                        </button>
                                    <button data-skip="25" class="player__button">+25</button>
                                    <!--Volume Range-->
                                        <div>
                                            <input type="range" name="volume" class="player__slider" min=0 max="1" step="0.05" value="1">
                                        </div>
                                </div>    
                            </div>

                        </div>
                        <div class="player__controls">
                            <div class="progress">
                                <div class="progress__filled">
                                                
                                </div>
                            </div>
                        </div>    

                </div>
                
            </div>

        </div>
        </div>
    </div>
    <script src="scripts/audioplayer.js"></script>
    
</body>
</html>