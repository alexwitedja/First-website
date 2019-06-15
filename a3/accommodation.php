<?php session_start(); $title = "Accommodation"; ?>

<!DOCTYPE html>
<html lang='en'>
<head>
  <?php include "tools.php";?>
  <?php head_module("Accommodation")?>
  <link type="text/css" rel="stylesheet" href="css/CSS Styling Alex.css"/>
</head>

<style>
  span{
    color:#FF0000;
  }
  #price{
    color: #000;
  }
  #GST{
    color: #000;
  }
</style>

<script>

  var priceBook = {
    minAdult: 1,
    minChild: 0,
    maxPerson: 10,
    sites: {
      C:{
        price: 100.00,
        extraAdultPrice: 0.00,
        extraChildPrice: 0.00,
        includedPerson: 0
      },
      PM:{
        price: 60.50,
        includedPerson: 2,
        extraAdultPrice: 10.00,
        extraChildPrice: 5.00
        
      },
      PS:{
        price: 50.25,
        includedPerson: 2,
        extraAdultPrice: 10.00,
        extraChildPrice: 5.00
      },
      UM:{
        price: 40.50,
        includedPerson: 2,
        extraAdultPrice: 10.00,
        extraChildPrice: 5.00
      },
      US:{
        price: 35.25,
        includedPerson: 2,
        extraAdultPrice: 10.00,
        extraChildPrice: 5.00
      }
    }
  };

  function selectSite(whichButton){
    
    var aid = document.getElementById("aidForm");
    var check = aid.value;
    var b1 = document.getElementById("US");
    var b2 = document.getElementById("UM");
    var b3 = document.getElementById("PS");
    var b4 = document.getElementById("PM");
    var b5 = document.getElementById("C");
    var buttons = [b1, b2, b3, b4, b5];

    for(i = 0; i < buttons.length; i++){
      
      buttons[i].style.background = "rgb(235,255,253, 0.7)";
    
    }
    if(check == whichButton.id){
      
      aid.value = ''
      document.getElementById('price').innerHTML = "";
      document.getElementById('GST').innerHTML = "";
    
    } else {
      
    whichButton.style.background = "rgb(143, 60, 12)";
    aid.value =  whichButton.id;
    
    }

    calculatePrice();
    
  }

  function calculatePrice(){
    
    var campId = document.getElementById("aidForm").value;
    var inputDays = parseInt(document.getElementById("daysForm").value);
    var inputAdults = parseInt(document.getElementById("adultsForm").value);
    var inputChildren = parseInt(document.getElementById("childrenForm").value);

    var perNight = priceBook['sites'][campId]['price'];
    var extraAdult = priceBook['sites'][campId]['extraAdultPrice'];
    var extraChild = priceBook['sites'][campId]['extraChildPrice'];

    var price = 0;
    var GST = 0;
    var people = inputAdults + inputChildren;

      if (priceBook['sites'][campId]['includedPerson'] > 0){
        
        if(people > 10){
          alert("too many people!");
        }

        if(people < 2){
        
        price = inputDays*perNight;
        } else if (inputAdults == 1){
        
        price = inputDays*perNight + (inputAdults-1)*extraAdult + (inputChildren-1)*extraChild;
        } else {
        
        price = inputDays*perNight + (inputAdults-2)*extraAdult + inputChildren*extraChild;
        }

      } else {

        price = inputDays*perNight + (inputAdults-2)*extraAdult + inputChildren*extraChild;;

      }
      
      GST = (price /((10/100) + 1)*10)/100;
      if(isNaN(price)){price = ""}
      if(isNaN(GST)){GST = ""}

      document.getElementById('price').innerHTML = price.toFixed(2);
      document.getElementById('GST').innerHTML = GST.toFixed(2);
  }

  function check(){

    var boolean1 = checkAid();
    var boolean2 = checkDate();
    var boolean3 = checkPeople();
    
    if ((boolean1 && boolean2) && boolean3){
      return true;
    }
    else {
      return false;
    }
  }

  function checkAid(){

    var campId = document.getElementById("aidForm").value;
    
    if(campId == ''){
      document.getElementById("errorAid").innerHTML = "*Select accommodation";
      return false;
    }else{
      document.getElementById("errorAid").innerHTML = "";
      return true;
    }

  }

  function checkDate(){

    var today = new Date();
    var input = document.getElementById("dateForm").value;

    var inputDate = new Date(input);

    if(Date.parse(today) > Date.parse(inputDate)){
      document.getElementById("errorDate").innerHTML = "*Input date inappropriate";
      document.getElementById("dateForm").focus();
      
      return false;
    }else{
      document.getElementById("errorDate").innerHTML = "";
      return true;
    }

  }

  function checkPeople(){

    var childInput = parseInt(document.getElementById("childrenForm").value);
    var adultInput = parseInt(document.getElementById("adultsForm").value);

    if(childInput + adultInput > '10'){
      document.getElementById("errorPeople").innerHTML = "*Max number of people 10";
      document.getElementById("adultsForm").focus();

      return false;
    }else{
      document.getElementById("errorPeople").innerHTML = "";
      return true;
    }
  }

</script>

<body>

    <div class="header">
      <?php header_module("Sea View Escape"); ?>
    </div>

  <div class="main">

      <nav class="navigation">
        <?php nav_module($title) ?>
      </nav>

      <div class="buttons">     
            <button name = 'aButton' type = 'button' id = 'US' onclick = 'selectSite(this)'>
              <div>
                <div>
                  <img src="media/small camping site.jpg" alt="small campsite">
                </div>
                <div class="button-text">
                  <h3>Unpowered Small Camping Sites</h3>
                  <p>A small camp perfect for small groups. Despite its size it is comfortable.
                    Get this camp if you're willing to camp without power and if you are camping
                    with a small group.
                  </p>
                  <h4>Pricing details</h4>
                  <ul>
                    <li>
                      Per Night: $35.25
                    </li>
                    <li>
                      Extra Adult: $10.00
                    </li>
                    <li>
                      Extra Child: $5.00
                    </li>
                  </ul>
                </div>
              </div>
            </button>
            <button name = 'aButton' type = 'button' id = 'UM' onclick = 'selectSite(this)'>
              <div>
                <div><img src="media/med camping site.jpg" alt="medium campsite"></div>
                  <div class="button-text">
                    <h3>Unpowered Medium Camping Sites</h3>
                    <p>A larger camp that could fit bigger groups. Spacious and comfortable.
                      Get this camp if you want to camp with more people inside!
                    </p>
                    <h4>Pricing details</h4>
                    <ul>
                      <li>
                        Per Night: $40.50
                      </li>
                      <li>
                        Extra Adult: $10.00
                      </li>
                      <li>
                        Extra Child: $5.00
                      </li>
                    </ul>
                  </div>
              </div>
            </button>
            <button name = 'aButton' type = 'button' id = 'PS' onclick = 'selectSite(this)'>
              <div>
                <div><img src="media/powered small site.jpg" alt="powered small"></div>
                <div class="button-text">
                  <h3>Powered Small Camping Sites</h3>
                  <p>A small camp with power, size and quality is no different. If
                    you want power then book this camp! 
                  </p>
                  <h4>Pricing details</h4>
                  <ul>
                    <li>
                      Per Night: $50.25
                    </li>
                    <li>
                      Extra Adult: $10.00
                    </li>
                    <li>
                      Extra Child: $5.00
                    </li>
                  </ul>
                </div>
              </div>
            </button >
            <button name = 'aButton' type = 'button' id = 'PM' onclick = 'selectSite(this)'>
              <div>
                <div><img src="media/powered medium site.jpg" alt="powered medium"></div>
                <div class="button-text">
                  <h3>Powered Medium Camping Sites</h3>
                  <p>A medium camp with power, size and quality is no different. If you want
                    power and a large space consider booking this camp!
                  </p>
                  <h4>Pricing details</h4>
                  <ul>
                    <li>
                      Per Night: $60.50
                    </li>
                    <li>
                      Extra Adult: $10.00
                    </li>
                    <li>
                      Extra Child: $5.00
                    </li>
                  </ul>
                </div>
              </div>
            </button>
            <button name = 'aButton' type = 'button' id = 'C' onclick = 'selectSite(this)'>
              <div>
                <div><img src="media/caravan sites.jpg" alt="caravan site"></div>
                <div class="button-text">
                  <h3>Caravan Sites</h3>
                  <p>Stay in the caravan for a unique experience, our caravan provides
                    many things that a regular camp does not have. Getting one of our 
                    caravan is definitely worth it.
                  </p>
                  <h4>Pricing details</h4>
                  <ul>
                    <li>
                      Per Night: $100.00
                    </li>
                    <li>
                      Extra Adult: Free
                    </li>
                    <li>
                      Extra Child: Free
                    </li>
                    </ul>
                  </div>
              </div>
            </button> 
            <form onsubmit = "return check()" class="Form" action="booking.php" method="post" enctype="" >
              <input id = "aidForm" type="hidden" name="aid" value="" >
              <p><span id = "errorAid"></span>
              <span id = "errorDate"></span>
              <span id = "errorPeople"></span> 
              </p>
              <p>Arrival Date <input id="dateForm" type="date" name="date" required></p>
              
              <p>Number of days <select id = "daysForm" name = "days" onchange = 'calculatePrice()' required>
                <option value="" disabled selected>Please select</option>
                <option value="1">1</option>
                <option value="2">2</option> 
                <option value="3">3</option> 
                <option value="4">4</option>  
                <option value="5">5</option> 
                <option value="6">6</option> 
                <option value="7">7</option> 
                <option value="8">8</option> 
                <option value="9">9</option> 
                <option value="10">10</option> 
                <option value="11">11</option> 
                <option value="12">12</option> 
                <option value="13">13</option> 
                <option value="14">14</option> 
                </select></p>
              <p>Number of adults <select id = "adultsForm" name = "adults" onchange = 'calculatePrice()' required >
                  
                <option value="" disabled selected>Please select</option>
                <option value="1">1</option>
                <option value="2">2</option> 
                <option value="3">3</option> 
                <option value="4">4</option>  
                <option value="5">5</option> 
                <option value="6">6</option> 
                <option value="7">7</option> 
                <option value="8">8</option> 
                <option value="9">9</option> 
                <option value="10">10</option>              
                </select></p>
              <p>Number of children <select id = "childrenForm" name = "children" onchange = 'calculatePrice()' required>
                <option value="" disabled selected>Please select</option>  
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option> 
                <option value="3">3</option> 
                <option value="4">4</option>  
                <option value="5">5</option> 
                <option value="6">6</option> 
                <option value="7">7</option> 
                <option value="8">8</option> 
                <option value="9">9</option> 
                <option value="10">10</option>              
                </select></p>
              <p>GST $<span id = 'GST'></span></p>
              <p>Total price $<span id = 'price'></span></p>
              <p><input type= "submit" id="Submit"></p>
            </form>
      </div>
    </div>
  </div>
</body>

<footer class="footer">
  <?php footer_module() ?>
</footer>

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
</html>