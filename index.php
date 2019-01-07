<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    $name = "";
    $flavors = "";
    $flavorsArray = array('grasshopper' => 'The Grasshopper', 'maple' => 'Whiskey Maple Bacon',
                    'carrot' => 'Carrot Walnut', 'caramel' => 'Salted Caramel Cupcake', 'velvet'
                    => 'Red Velvet', 'lemon' => 'Lemon Drop', 'tiramisu'=>'Tiramisu');
    $total = 0;
    //validation

    //name
    $isValid = true;
    if(empty($_POST['name'])) {
        echo "Please enter a name<br>";
        $isValid = false;
    }
    else{
        $name = $_POST['name'];
    }

    //flavors
    if (!isset($_POST['flavorChoice'])){
        echo "<p>Please select a flavor</p>";
        $isValid = false;
    }elseif($_POST['flavorChoice']){
        $flavors = $_POST['flavorChoice'];
    }

    //print statement
    if($isValid) {
        echo "<p>Thank you $name for your order</p>";
        echo "<br><p>Order Summary:</p>";
        echo "<ul>";
        foreach($flavors as $flav => $flavName){
            echo"<li>$flavName</li>";
            $total += 3.50;
        }
        echo "</ul> <p>Order Total: $total</p>";
    }
?>
    <form id="donuts" method="POST" action="">
        <fieldset>
            <label>Name</label><br>
            <input type="text" size="10" maxlength="30" name="name" id="name"
                   value="<?php echo $name?>"><br>
            <label>Flavors:</label>
        <?php

            foreach ($flavorsArray as $options => $text) {
            if ((isset($_POST['flavors']) && $_POST['flavors'] === $options))
                echo "<br/><input type='checkbox' name='flavorChoice[]' value='$options'>$text";
            else
                echo "<br/><input type='checkbox' name='flavorChoice[]' value='$options'>$text";
            }
        ?>
            <br><input type="submit" value="Order" id="submit" name="btnOrder">
        </fieldset>
    </form>
</body>
</html>