<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <style>
            .lawer, .clint {
            width: 20%;
            height: 50%;
            border-radius: 25px;
            position: relative;
            background-color: white;
            margin-top: 5%;
            
        }
            .lawer{
                float: left;
                margin-left: 15%;
            }
            .clint{
                float: right;
                margin-right: 15%;
            }
            .image{ 
            width: 70%;
            height: 55%;
            background-repeat: no-repeat;
            margin-top: 10%;
            margin-left:20%;
            }
            .texts{
            width: 70%;
            height: 20%;

            }
            .lawer .image{
            background: url("download.png");
            background-repeat: no-repeat;
            }
            .clint .image{
            background: url("download (2).png");
            background-repeat: no-repeat;
            }
        </style>
    </head>
    <body>
        <header>
                  <img src="logo.jpg" width="10%" height="20%" >
                  <ul class="nav">
                             <li><a href="home.php">Home</a></li>
                             <li><a href="about.php" >About</a></li>
                             <li><a href="lawer.php" >Lawers</a>
                            <li><a href="condact.php" >Contact us</a></li>
                             <li style="float:right"><a href="login.php" class="active">Login</a></li>
                             <li style="float:right"><a href="logout.php" class="active">Logout</a></li>
                       
                   </ul>
                  </header>
        <a href="llogin.php">
            <div class="lawer"><center>
            <div class="image">
            </div>
            <div class="texts">
            <h1>Lawer</h1>
            </center>
            </div>
            </div>
            </a>
            
            <a href="clogin.php">
            <div class="clint"><center>
            <div class="image">
            </div>
            <div class="texts">
            <h1>Clint</h1>
            </center>
            </div>
            </div>
            </a>
    </body>
</html>
