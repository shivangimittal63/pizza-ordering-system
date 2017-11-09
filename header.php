<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Feedback System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style=" background-color:beige;">

        <div class="container">
            <br>
            <center>
                <h1>Pizza Ordering System</h1>  </center>
                <br>
                

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>

                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner"> 
                    <div class="item active">
                       <center> <img src="p2.jpg" alt=" " style="width:90%;"></center>
                    </div>

                    <div class="item" >
                       <center> <img src="pp2.jpg" alt=" " style="width:90%;"> </center>
                    </div>

                    <div class="item" >
                       <center> <img src="p4.jpg" alt=" " style="width:90%;"> </center>
                    </div>
                   


                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel"  data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>

        <center>
         <h2><u>  Want to Order?  </u></h2>
        </center>
        <br>
        <?php include 'login.php' ?>
        <br>
        <marquee><h3>Order online to get 'Hot' and 'Fresh' pizzas at your door step within 30 min. You can also choose to pick up your 
            favorite Pizza from Domino's after Ordering online. Dominos delivers across various cities.</h3> </marquee>
    </body>


</html>
