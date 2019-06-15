<!DOCTYPE html>
<html lang='en'>
<head>
  <?php include "tools.php"; ?>
  <link type="text/css" rel="stylesheet" href="css/CSS Styling Alex.css"/>
  <?php head_module("Contact Us"); ?>
</head>

<body>

  <div class="header">
    <?php header_module("Sea View Escape"); ?>  
  </div>

  <div class="main">
    
    <nav class="navigation">
      <?php nav_module($title)  ?>
    </nav>
    
    <div>
        <table>
            <thead>
              <tr>
                <th>Type</th>
                <th>Per night</th>
                <th>Extra night</th>
                <th>Extra child</th>
              </tr>
            </thead> 
            <tbody>
              <tr>
                <th>Unpowered Small Camping Sites</th>
                <td>$35.25</td>
                <td>$10.00</td>
                <td>$5.00</td>
              </tr>
              <tr>
                <th>Unpowered Medium Camping Sites</th>
                <td>$40.50</td>
                <td>$10.00</td>
                <td>$5.00</td>
              </tr>
              <tr>
                <th>Powered Small Camping Sites</th>
                <td>$50.25</td>
                <td>$10.00</td>
                <td>$5.00</td>
              </tr>
              <tr>
                <th>Powered Medium Camping Sites</th>
                <td>$60.50</td>
                <td>$10.00</td>
                <td>$5.00</td>
              </tr><tr>
                <th>Caravan Sites</th>
                <td>$100.00</td>
                <td>Free</td>
                <td>Free</td>
              </tr>
            </tbody>
          </table>
        </div>
    <div>
        <h2>
            Additional information for customers
          </h2>
          <p>
            <strong>Camping sites information:</strong>
            <br>The per night rate includes 2 adults or 1 adult + 1 child
          </p>
          <p>
            <strong>Price information:</strong>
            <br>All prices include GST.
          </p>
        </div>
  </div>

  <footer class="footer">
    <?php footer_module() ?>
  </footer>
</body>
</html>