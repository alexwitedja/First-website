<?php session_start(); include "tools.php" ?>

<?php
    function writeToFile($string){
        file_put_contents('bookings.txt', $string, FILE_APPEND | LOCK_EX);
    }
?>

<?php 
    if (isset($_POST["cancel"])){
        unset ($_SESSION['booking']);
        header('Location:accommodation.php');
    }

    if (isset($_POST["confirm"])){    

    fillSession();
        if(isset($_POST["price"])){
            $price = $_POST["price"];
            $GST = $_POST["GST"];
        }
        $writeString='';
        foreach($_SESSION['booking']['customer'] as $c => $b){
            $writeString .= $b."\t";
        }
        foreach ($_SESSION['booking'] as $i => $a){
            if($i != 'customer'){
                $writeString .= $a."\t";
            }
        }
        $writeString .= "\n";
        writeToFile($writeString);
    }

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <?php head_module("Booking"); ?>
    <style>
    .header {
        background: none;
        color: #000;
    }
    section{
        text-align: center;
    }
    table{
        margin: auto;
        height: 100%;
        font-size: 30px;
        border-spacing: 15px;
    }
    .footer{
        background: none;
        color: #000;
    }
    </style>
</head>

<body>
    <header class = "header">
    <div class="logo"><img src="media/logo.png" width=100% height=auto alt="logo"></div>
    <div class="title"><h1>Sea View Escape</h1></div>
    </header>

    <main>
        <div>
            <section>
                
                <table>
                    <tr>
                        <th>Receipt </th>
                    </tr>
                    <tr>
                        <th>Customer Details </th>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td><?php echo($_SESSION['booking']['customer']['name'])?></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><?php echo($_SESSION['booking']['customer']['email'])?></td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td><?php echo($_SESSION['booking']['customer']['phone'])?></td>
                    </tr>
                    <tr>
                        <th>Booking Details </th>
                    </tr>
                    <tr>
                        <td>Arrival date:</td>
                        <td><?php echo($_SESSION['booking']['date'])?></td>
                    </tr>
                    <tr>
                        <td>Duration of Stay:</td>
                        <td><?php echo($_SESSION['booking']['days'])?></td>
                    </tr>
                    <tr>
                        <td>Accommodation:</td>
                        <td><?php echo($_SESSION['booking']['aid'])?></td>
                    </tr>
                    <tr>
                        <td>Number of Adults:</td>
                        <td><?php echo($_SESSION['booking']['adults'])?></td>
                    </tr>
                    <tr>
                        <td>Number of Child:</td>
                        <td><?php echo($_SESSION['booking']['children'])?></td>
                    </tr>
                    <tr>
                        <td>GST:</td>
                        <td>$<?php echo number_format((float)$GST,2,".","");?></td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>$<?php echo number_format((float)$price,2,".","");?></td>
                    </tr>
                    
                </table>

            </section>
        </div>
    </main>

    <footer class = "footer">
        <?php footer_module() ?>
    </footer>
</body>