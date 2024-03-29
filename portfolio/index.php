<?php
    function debug($var, bool $stop): string
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";

        if($stop) die;

        return false;
    }

    $data = require_once ('data.php');
    $avatar = $data['avatar'];
    $about_data = $data['about'];
    $educationData = $data['education'];
    $langData = $data['language'];
    $intData = $data['interests'];
    $aboutCareer = $data['aboutCareer'];
    $careers = $data['careers'];
    $skills = $data['skills'];
    $introProjects = $data['projects']['intro'];
    $projects = $data['projects'];
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Responsive Resume/CV Template for Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/styles-6.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body>

    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="<?=$avatar?>" alt="" />
                <h1 class="name"><?=$about_data['name'];?></h1>
                <h3 class="tagline"><?=$about_data['post'];?></h3>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto: <?=$about_data['email'];?>"><?=$about_data['email'];?></a></li>
                    <li class="phone"><i class="fa fa-phone"></i><a href="<?=$about_data['phone'];?>"><?=$about_data['phone'];?></a></li>
                    <li class="website"><i class="fa fa-globe"></i><a href="<?=$about_data['site'];?>" target="_blank"><?=$about_data['site'];?></a></li>
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title">Оброзование</h2>
                <?php foreach($educationData as $education){?>
                    <div class="item">
                        <h4 class="degree"><?= $education['faculty'];?></h4>
                        <h5 class="meta"><?= $education['university'];?></h5>
                        <div class="time"><?= $education['yearStart'];?> - <?= $education['yearEnd'];?></div>
                    </div><!--//item-->
                <?php } ?>
            </div><!--//education-container-->
            
            <div class="languages-container container-block">
                <h2 class="container-block-title">Языки</h2>
                <ul class="list-unstyled interests-list">
                    <?php foreach ($langData as $key => $lang){?>
                        <li><?= $key?> <span class="lang-desc"><?= $lang?></span></li>
                    <?php }?>
                </ul>
            </div><!--//interests-->
            
            <div class="interests-container container-block">
                <h2 class="container-block-title">Интересы</h2>
                <ul class="list-unstyled interests-list">
                    <?php foreach ($intData as $int){?>
                        <li> <?= $int?></li>
                    <?php }?>
                </ul>
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                <div class="summary">
                    <p><?=$aboutCareer?></p>
                </div><!--//summary-->
            </section><!--//section-->
            
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>
                <?php foreach ($careers as $career){?>

                    <div class="item">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="job-title"><?=$career['post'];?></h3>
                                <div class="time"><?=$career['yearStart'];?> - <?=$career['yearEnd'];?></div>
                            </div><!--//upper-row-->
                            <div class="company"><?=$career['place'];?></div>
                        </div><!--//meta-->
                        <div class="details">
                           <p><?=$career['duty'];?></p>
                        </div><!--//details-->
                    </div><!--//item-->

                <?php }?>
                
            </section><!--//section-->
            
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                <div class="intro">
                    <p><?=$introProjects;?></p>
                </div><!--//intro-->
                <?php foreach ($projects['projectsList'] as $project){?>
                    <div class="item">
                        <span class="project-title"><a href="<?=$project['link'];?>"><?=$project['name'];?></a></span> - <span class="project-tagline">A responsive website template designed to help startups promote, market and sell their products.</span>
                    </div><!--//item-->
                <?php }?>


            </section><!--//section-->
            
            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                <div class="skillset">
                    <?php foreach ($skills as $skill){?>
                        <div class="item">
                            <h3 class="level-title"><?=$skill['skills']?></h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" data-level="<?=$skill['percent']?>%">
                                </div>
                            </div><!--//level-bar-->
                        </div><!--//item-->

                    <?php }?>

                    
                </div>  
            </section><!--//skills-section-->
            
        </div><!--//main-body-->
    </div>
 
    <footer class="footer">
        <div class="text-center">
                <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div><!--//container-->
    </footer><!--//footer-->
 
    <!-- Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html> 

