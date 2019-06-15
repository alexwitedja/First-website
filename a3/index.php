<?php session_start(); $title = "Home"; ?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <?php include "tools.php"; ?>
  <link type="text/css" rel="stylesheet" href="css/CSS Styling Joe.css"/>
  <?php head_module("Home"); ?>
</head>

<body>
  <header class="header">
      <?php header_module("Sea View Escape"); ?>
  </header>

  <main class="main">

    <nav class="navigation">
      <?php nav_module($title)  ?>
    </nav>
    
    <div class="content">
      <section>
        <h3>Welcome</h3>
        <p> Set near one of Victoria' stunning coastal towns and just a half hour drive from Geelong, Portarlington and the Sea View Escape is the perfect destination for your next weekend get away.</p>
        <p> Whether you pack a tent or tow a caravan we have the fascilities to suit your needs.</p>
        <p> There are a range of campsites to suit most group sizes, caravan sites surrounded by wildlife and picnic areas with free gas cookers. Activities include several different hiking paths and night guides for the extra adventurous.</p>
        <p> Sea View Escape is proud to be a family friendly with soccer fields and indoor archery to name just a few activities.</p>
        <!-- image sourced: https://www.pexels.com/search/camping/ website indicated no atribution required -->
        <img src='media/beach-bonfire-camping-213807.jpg'  width=100% height=auto alt='bonfire on the beach image'>
      </section>

      <section>
        <!-- image sourced: https://www.pexels.com/search/camping/ website indicated no atribution required -->
       <img src='media/beach-camping-coast-176381.jpg'  width=100% height=auto alt='tent on the beach image'> 
        <h3>How to Find Us</h3>
        <p> Located on the Beach Front at Portarlington there a number of ways to get to this beautiful sea side caravan park.</p>
        <p> From Geelong take Portarlington Rd (c123) and you will be there in about half an hour.</p>
        <p> If you are situated on the Mornington Peninsular, there is a ferrythat departs from Sorrento on an hourly basis from 7am to 7pm, from Queenscliff take the B110 taking a right onto the C126 all the way to Portarlington.</p>
        <p> From Melbourne, take the pricess freeway west to Geelong and then the C123 (Portarlington Rd). This should take you about 1h 45mins in total.</p>
      </section>
    </div>  
  </main>

  <footer class="footer">
    <?php footer_module() ?>
  </footer>


</body>

</html>