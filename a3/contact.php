<?php session_start(); 
$title = "Contact";
// form validation written with the aide of: https://www.w3schools.com/php/php_form_validation.asp
$nameError = $emailError = $phoneError = "";
$name = $email = $phone = "";
$errorsFound = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['name'])){
    $_SESSION['mailing']['customer']['name'] = $_POST['name'];
  }
  if (isset($_POST['email'])){
    $_SESSION['mailing']['customer']['email'] = $_POST['email'];
  }
  if (isset($_POST['phone'])){
    $_SESSION['mailing']['customer']['phone'] = $_POST['phone'];
  }

  if (empty($_POST["name"])) {
    $nameError = "Name is required";
    $errorsfound = true;
  }
  else {
    $name = stripData($_POST["name"]);
    if (!preg_match("/.+ .+[A-Za-z -.']/", $name)) {
      $nameError = "Please enter first and last name with no special characters.";
      $errorsfound = true;
    }
  }
  if (empty($_POST["email"])) {
    $emailError = "Email is required";
    $errorsfound = true;
  }
  else {
    $email = stripData($_POST["email"]);
  }
  if (empty($_POST["phone"])) {
    $phoneError = "Phone is required";
    $errorsfound = true;
  }
  else {
    $phone = stripData($_POST["phone"]);
    if (!preg_match("/^ *(\(04\)|04|\+614)[ ]?\d{4}[ ]?\d{4}$/", $phone)) {
      $phoneError = "Please enter a valid Australian Mobile.";
      $errorsfound = true;
    }
  }
  $mailing = isset($_POST['mailing'])?"on":"off";

  if ($mailing == on) {
    $mailing = array ($name, $email, $phone);   
    
    $fp = fopen("mailing.txt", "a");
    flock($fp, LOCK_EX);
  
    fputcsv($fp, $mailing, "\t");

    flock($fp, LOCK_UN);
    fclose($fp);
  }
  if ($errorsfound == false) {
    header('location: index.php');
  }
}
?>

<!DOCTYPE html>
<html lang='en'>


<head>
  <?php include_once("tools.php"); ?>
  <link type="text/css" rel="stylesheet" href="css/CSS Styling Joe.css"/>
  <?php head_module("Contact Us"); ?>
</head>

<body onload="populateForm()">
  <header class="header">
      <?php header_module("Sea View Escape"); ?>
  </header>

  <main class="main">
  
    <nav class="navigation">
        <?php nav_module($title)  ?>
    </nav>
  
    <div class="content">
      <section>
        <form name="contactUs" class="contactForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
          <p><label class="formInput">Full Name: <input type = 'text' pattern=".+ .+[A-Za-z -.']" name="name" placeholder='Jain Smith' required id='contactName'/></label><span class="error"> <?php echo $nameError;?></span></p>
          <p><label class="formInput">Email Address: <input type = 'email' name='email' placeholder='smith@contact.com' required id='contactEmail'/></label><span class="error"> <?php echo $emailError;?></span><br></p>
          <p><label class="formInput">Phone Number: <input type = "tel" pattern="^ *(\(04\)|04|\+614)[ ]?\d{4}[ ]?\d{4}$" name='phone' required placeholder='Include area code'  id='contactPhone'/></label><span class="error"> <?php echo $phoneError;?></span><br></p>
          <p><label class="formInput">Message:  <textarea name='message' rows="10" cols="30" placeholder='Please enter a message.'  id='contactMessage'></textarea></label></p>
          <p><label class="formInput">Opt in for our newsletter subscrbtion: <input class="checkbox" type = 'checkbox' name='mailing' id='contactMailing'/></label></p>
          <p><label class="formInput" onclick="return rememberMe()">Remember me: <input class="checkbox" type ='checkbox' id="contactRememberMe" name='rememberme' /></label></p>
          <p><input id="submitButton" class="submit" type = "submit" onclick="return rememberMe()"></p>        
        </form>
      </section>

      <section>
        <h3>How to Find Us</h3>
        <p> Located on the Beach Front at Portarlington there a number of ways to get to this beautiful sea side caravan park.</p>
        <p> From Geelong take Portarlington Rd (c123) and you will be there in about half an hour.</p>
        <p> If you are situated on the Mornington Peninsular, there is a ferrythat departs from Sorrento on an hourly basis from 7am to 7pm, from Queenscliff take the B110 taking a right onto the C126 all the way to Portarlington.</p>
        <p> From Melbourne, take the pricess freeway west to Geelong and then the C123 (Portarlington Rd). This should take you about 1h 45mins in total.</p>
        </section>
      </div>

  </main>

  <!-- form validation written with the aide of: https://www.w3schools.com/php/php_form_validation.asp -->
  <?php
  function stripData($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
  }
  ?>

  <script>
  function rememberMe() {
    if (contactRememberMe.checked) {
      var name = document.getElementById('contactName').value;
      localStorage.setItem("name", name);
      var email = document.getElementById('contactEmail').value;
      localStorage.setItem("email", email);
      var phone = document.getElementById('contactPhone').value;
      localStorage.setItem("phone", phone);
      var message = document.getElementById('contactMessage').value;
      localStorage.setItem("message", message);

      if (contactMailing.checked) {
        localStorage.setItem("mailing", "true");
      }
      else {
        localStorage.removeItem("mailing");
      }

      localStorage.setItem("rememberMe", "true");
    }
    else {
      localStorage.removeItem("name");
      localStorage.removeItem("email");
      localStorage.removeItem("phone");
      localStorage.removeItem("message");
      localStorage.removeItem("mailing");
      localStorage.removeItem("rememberMe");
    }
  }
  
  function populateForm() {
    if (localStorage.rememberMe == 'true') {
      document.getElementById("contactName").value = localStorage.name;
      document.getElementById("contactEmail").value = localStorage.email;
      document.getElementById("contactPhone").value = localStorage.phone;
      document.getElementById("contactMessage").value = localStorage.message;
      if (localStorage.mailing == 'true') {
        document.getElementById("contactMailing").checked = true;
      }
      else {
        localStorage.removeItem("mailing");
      }
      document.getElementById("contactRememberMe").checked = true;
    }
    
  }
  </script>
  

  <footer class="footer">
    <?php footer_module() ?>
  </footer>

<!-- Debug -->
<aside class='debug'>
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

</body>
</html>