<!-- Page Content -->
<?php
/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*The Fixtures & Results page.
*
*/

include ( 'includes/header.html' ) ;
include ( 'access/session.php' ) ;
?>

<title>Fixtures & Results</title>
</head>
<!-- Start Content -->
<body>

<?php
echo '<div class="container" >' ;
echo '<div class="col-12"  style="background:linear-gradient(#000000,#6A87AB); color:#FFF">' ;

include ( 'includes/navigation.html' ) ;

echo '<h6 style="padding-bottom: 20px; margin-left: 32px;">';
echo "User: {$_SESSION['first_name']} {$_SESSION['last_name']}";
echo '</h6></div>'; 

?>

<!-- Accordion -->
<div class="container">
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h3 class="mb-0 ">
                    <button class="btn btn-lg btn-block" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h4 class="float-left">Upcoming Match</h4><h3><i class="far fa-plus-square float-right" style="padding-top:5px;"></i><h3>
                    </button>
                </h3>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="list-group">
                
                    <!-- Fixtures (list-group) -->
                    <?php
                    include ( 'includes/upcoming_match.html' ) ;
                    ?>
                    <!-- End Fixtures -->
                
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h3 class="mb-0 text-center">
                    <button class="btn btn-lg btn-block" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h4 class="float-left">Last Match</h4><h3><i class="far fa-plus-square float-right" style="padding-top:5px;"></i><h3>
                    </button>
                </h3>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <div class="list-group">
            
                        <!-- Results (list-group) -->
                        <?php
                        include ( 'includes/last_match.html' ) ;
                        ?>
                        <!-- End Results -->
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingThree">
                <h3 class="mb-0 text-center">
                    <button class="btn btn-lg btn-block" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h4 class="float-left">Past Matches</h4><h3><i class="far fa-plus-square float-right" style="padding-top:5px;"></i><h3>
                    </button>
                </h3>
            </div>

            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <div class="list-group">    
                        <!-- Results (list-group) -->
                        <?php
                        
                        include ( 'access/results.php' ) ;
                        ?>
                        <!-- End Results -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Accordion --> 
     	
<!-- End Page Content -->	

<?php
include ( 'includes/footer.html' ) ;

?>