<?php $title = "tools"; ?>

<?php $_SESSION['booking'] = array (
    'aid' => '',
    'date' => '',
    'days' => '',
    'adults' => '',
    'children' => '',
    'customer' => array(
        'name' => '',
        'email' => '',
        'phone' => ''
    )
);
?>

<div class='functions'>
  <!-- Head -->
  <?php
  function head_module($page) {
    echo '<meta charset="utf-8">';
    echo '<title>' . $page . '</title>';
    echo '<link type="text/css" rel="stylesheet" href="css/CSS Styling Joe.css"/>';
    echo '<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">';
    echo '<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab" rel="stylesheet">';
  }
  ?>

  <!-- Header  -->
  <?php
  function header_module($currentPage) {
    echo '<!-- Icons made by "https://www.flaticon.com/authors/turkkub" turkkub from www.flaticon.com is licensed by "http://creativecommons.org/licenses/by/3.0/" -->';
    echo '<div class="logo"><img src="media/logo.png"  width=100% height=auto alt="logo"></div>';
    echo '<div class="title"><h1>' . $currentPage . '</h1></div>';
  }
  ?>
    
  <!-- NavBar -->
  <?php
  function navigate(){
    echo '<p id="Home"><a href="index.php">Home</a></p>';
    echo '<p id="Rates"><a href="rates.php">Rates</a></p>';
    echo '<p id="Accommodation"><a href="accommodation.php">Accommodation</a></p>';
    echo '<p id="Contact"><a href="contact.php">Contact Us</a></p>';
  }
  function nav_module($title) {
    echo '<p id="Home"><a href="index.php">Home</a></p>';
    echo '<p id="Rates"><a href="rates.php">Rates</a></p>';
    echo '<p id="Accommodation"><a href="accommodation.php">Accommodation</a></p>';
    echo '<p id="Contact"><a href="contact.php">Contact Us</a></p>';
  }
  ?>

  <!-- Footer -->
  <?php
  function footer_module() {
    echo '<div>&copy;<script>document.write(new Date().getFullYear());';
    echo '</script> Joseph Williams (s3569541) and Alexander Witedja (s3641938) | Group 12</div>';
    echo '<div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>';
    echo '<div>Maintain links to your working <a href="media/styleguide.pdf">style guide</a>, your <a href="mailing.txt">mailing spreadsheet</a> and <a href="bookings.txt">bookings spreadsheet</a> here.</div>';
  }
  ?>

  <!-- populate session object -->
  <?php
  function fillSession(){
    if (isset($_POST['aid'])){
      $_SESSION['booking']['aid'] = $_POST['aid'];
    }
    if (isset($_POST['date'])){
        $_SESSION['booking']['date'] = $_POST['date'];
    }
    if (isset($_POST['days'])){
        $_SESSION['booking']['days'] = $_POST['days'];
    }
    if (isset($_POST['adults'])){
        $_SESSION['booking']['adults'] = $_POST['adults'];
    }
    if (isset($_POST['children'])){
      if($_POST['children'] == "0"){
          $_SESSION['booking']['children'] = "0"."";
      }else {
          $_SESSION['booking']['children'] = $_POST['children'];
      }
    }
    if (isset($_POST['name'])){
      $_SESSION['booking']['customer']['name'] = $_POST['name'];
    }
    if (isset($_POST['email'])){
      $_SESSION['booking']['customer']['email'] = $_POST['email'];
    }
    if (isset($_POST['phone'])){
      $_SESSION['booking']['customer']['phone'] = $_POST['phone'];
    }

    
  
  }
  ?>

</div>
    
 <!-- Debug -->
 <aside id='debug'>
  <details open>
    <summary>=Debug Show/Hide</summary>
    <pre>
      $_SESSION contains:
        <?php print_r($_SESSION); ?>

      $_POST contains:
        <?php print_r($_POST); ?>
    </pre>
  </details>
</aside>


