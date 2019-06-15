<?php session_start(); include "tools.php"?>

<?php $title = 'Booking';

$priceBook = array (
    'minAdult'=> 1,
    'minChild'=> 0,
    'maxPerson'=> 10,
    'sites'=> array(
        'C'=> array(
          'price'=> 100.00,
          'extraAdultPrice'=> 0.00,
          'extraChildPrice'=> 0.00,
          'includedPerson'=> 0,
          'campType' => 'Caravan'
        ),
        'PM'=> array(
          'price'=> 60.50,
          'includedPerson'=> 2,
          'extraAdultPrice'=> 10.00,
          'extraChildPrice'=> 5.00,
          'campType' => 'Powered Medium Campsite'
        ),
        'PS'=> array(
          'price'=> 50.25,
          'includedPerson'=> 2,
          'extraAdultPrice'=> 10.00,
          'extraChildPrice'=> 5.00,
          'campType' => 'Powered Small Campsite'
        ),
        'UM'=> array(
          'price'=> 40.50,
          'includedPerson'=> 2,
          'extraAdultPrice'=> 10.00,
          'extraChildPrice'=> 5.00,
          'campType' => 'Unpowered Medium Campsite'
        ),
        'US'=> array(
          'price'=> 35.25,
          'includedPerson'=> 2,
          'extraAdultPrice'=> 10.00,
          'extraChildPrice'=> 5.00,
          'campType' => 'Unpowered Small Campsite'
        )
    )
);

fillSession();

$date = $_SESSION['booking']['date'];
$aid = $_SESSION['booking']['aid'];
$days= $_SESSION['booking']['days'];
$adults = $_SESSION['booking']['adults'];
$children = $_SESSION['booking']['children'];

$name = $_SESSION['booking']['children'];
$email = $_SESSION['booking']['children'];
$phone = $_SESSION['booking']['children'];

$perNight = $priceBook['sites'][$aid]['price'];
$extraAdult = $priceBook['sites'][$aid]['extraAdultPrice'];
$extraChildren = $priceBook['sites'][$aid]['extraChildPrice'];

$price = 0;
$GST = 0;
$people = $adults + $children;

if ($priceBook['sites'][$aid]['includedPerson'] > 2){

    if ($people < 2){

        $price = $days * $perNight;

    } else if ($adults == 1){

        $price = $days*$perNight + ($adults-1)*$extraAdult + ($children-1)*$extraChild;
        
    } else {

        $price =  $days*$perNight + ($adults-2)*$extraAdult + $children*$extraChild;

    }
} else {
    
    $price = $days * $perNight; 

}
$GST = ($price /((10/100) + 1)*10)/100;
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <?php head_module("Booking"); ?>
</head>

<script>
    function getCustDetails(){
        var name = localStorage.getItem('name');
        var email = localStorage.getItem('email');
        var phone = localStorage.getItem('phone');

        document.getElementById('name').innerHTML = name
        document.getElementById('email').innerHTML = email;
        document.getElementById('phone').innerHTML = phone;
        
        document.getElementById('hiddenName').value = name;
        document.getElementById('hiddenEmail').value = email;
        document.getElementById('hiddenPhone').value = phone;
     
    }
</script>

<body onload ="getCustDetails()">
    <header class = "header">
    <?php header_module("Sea View Escape"); ?>
    </header>

    <main class = "main">
        <div class = "content">
            <section>
                <h2>Booking details</h1>
                <p>Arrival Date: <?php echo($date)?></p>
                <p>Duration of Stay: <?php echo($days)?></p>
                <p>Accommodation:  <?php echo($aid)?></p>
                <p>Number of Adults: <?php echo($adults)?></p>
                <p>Number of Children: <?php echo($children)?></p>
                <p>GST: $ <?php echo number_format((float)$GST,2,".","");?></p>
                <p>Price: $ <?php echo number_format((float)$price,2,".","");?></p>

                <h2>Customer details</h2>
                <p>Name: <span id="name"></span></p>
                <p>E-mail: <span id="email"></span></p>
                <p>Phone: <span id="phone"></span></p>
                
            <form class="form" action="receipt.php" method="post">

            <input type="hidden" name="date" value="<?php echo($date)?>" > 
            <input type="hidden" name="days" value="<?php echo($days)?>" > 
            <input type="hidden" name="aid" value="<?php echo($aid)?>" > 
            <input type="hidden" name="adults" value="<?php echo($adults)?>" > 
            <input type="hidden" name="children" value="<?php echo($children)?>" > 
            <input type="hidden" id ="hiddenName" name="name" value="" >
            <input type="hidden" id ="hiddenEmail" name="email" value="" > 
            <input type="hidden" id ="hiddenPhone" name="phone" value="" > 
            <input type="hidden" id ="price" name="price" value="<?php echo($price)?>" > 
            <input type="hidden" id ="GST" name="GST" value="<?php echo($GST)?>" > 
            <p><input type= "submit" value = "Confirm Booking" name="confirm"><input type= "submit" value = "Cancel Booking" name="cancel"></p>
            </form>

            </section>

            <form class="form" action="receipt.php" method="post">

            </form>
        </div>
    </main>

    <footer class = "footer">
    <?php footer_module() ?>
    </footer>
</body>

</html>