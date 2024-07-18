<html>
    <head>
            <link rel="stylesheet" href="main.css">
            
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
          </head>
          <body><header>
                  <img src="logo.jpg" width="10%" height="20%" >
                  <ul class="nav">
                             <li><a href="homes.php">Home</a></li>
                             <li><a href="about.php" >About</a></li>
                             <li><a href="lawer.php" >Lawers</a>
                            <li><a href="condact.php" >Contact us</a></li>
                             <li style="float:right"><a href="login.php" class="active">Login</a></li>
                       
                   </ul>
                  </header>
                         

                            <div class="slideshow-container">
                            
                            <div class="mySlides fade">
                              <div class="numbertext">1 / 3</div>
                              <img src="1.jpg" style="width:1000px; height:500px">
                              
                              <div class="text"><h1>Streamline legal consultations effortlessly with LAS, your personalized Lawyer Appointment System, ensuring swift and efficient scheduling.</h1></div>
                            </div>
                            
                            <div class="mySlides fade">
                              <div class="numbertext">2 / 3</div>
                              <img src="4.jpg" style="width:1000px; height:500px">
                              <div class="text"><h1>Experience legal convenience at your fingertips with LAS, where booking appointments with skilled attorneys is just a click away.</h1></div>
                            </div>
                            
                            <div class="mySlides fade">
                              <div class="numbertext">3 / 3</div>
                              <img src="3.jpg" style="width:1000px; height:500px">
                              <div class="text"><h1> LAS: Your gateway to hassle-free legal appointments—connecting clients with lawyers seamlessly for a smoother legal journey.</h1></div>
                            </div>
                            
                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>
                            
                            </div>
                            <br>
                            
                            <div style="text-align:center">
                              <span class="dot" onclick="currentSlide(1)"></span> 
                              <span class="dot" onclick="currentSlide(2)"></span> 
                              <span class="dot" onclick="currentSlide(3)"></span> 
                            </div>
                            
                            <script>
                            let slideIndex = 1;
                            showSlides(slideIndex);
                            
                            function plusSlides(n) {
                              showSlides(slideIndex += n);
                            }
                            
                            function currentSlide(n) {
                              showSlides(slideIndex = n);
                            }
                            
                            function showSlides(n) {
                              let i;
                              let slides = document.getElementsByClassName("mySlides");
                              let dots = document.getElementsByClassName("dot");
                              if (n > slides.length) {slideIndex = 1}    
                              if (n < 1) {slideIndex = slides.length}
                              for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";  
                              }
                              for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                              }
                              slides[slideIndex-1].style.display = "block";  
                              dots[slideIndex-1].className += " active";
                            }
                            </script>
                            


                        
    </body>
   </html>  
     