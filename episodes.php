<?php 

require_once 'models/buzzsproutAPI.php';

    //call the function
    $api = New Buzz();
    $episodes = $api->getEp();

    

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Big Shiny Takes Episodes</title>
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
        <!-- Core theme CSS (includes Bootstrap)-->
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta property="og:description" content="The world's only Canadian news columnist review AND anti-free speech Podcast">
            <meta property="og:image" content="assets/img/bigshinytakes.png">
            <meta property="og:url" content="http://bigshinytakes.com">
            <meta name="twitter:card" content="assets/img/newspapers-canada.png">
          
            
    
        </head>
        <body>
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
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://bigshinytakes.com/#portfolio">Episodes</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://bigshinytakes.com/#about">About</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://bigshinytakes.com/#contact">Support</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://www.instagram.com/bigshinytakes" target="_blank"><i class="fab fa-fw fa-instagram"></i></a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://www.twitter.com/bigshinytakes" target="_blank"><i class="fab fa-fw fa-twitter"></i></a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="https://www.facebook.com/bigshinytakes" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-container">

            <h1 id="index-title">Episodes</h1>
                <div class="episodes">
                    <?php 
                
            
                    foreach($episodes as $obj) {
                        
            
                        $myDateTime = new DateTime($obj->published_at);
                        $publishdate = $myDateTime->format('M d Y');
                        $teaser = substr($obj->description, 0 , 300);
                        ?>
            
                        <div class='episode-index'>
                                        <a class='episode-list' href='episode.php?id=<?php echo $obj->id ?>'><h3><?php echo $publishdate. " - ".$obj->title ;?></h3></a>
                                        <div>
                                            <?php echo $teaser?>...
                                        </div>
                                        <?php echo "<a class='episode-list' href='episode.php?id=" . $obj->id ."'><button class='open-ep'>Listen Now</button></a>"; ?>
            
                        </div>
                    <?php            
                    }
                    ?>
                </div>
            </div>
    </body>
    </html>






