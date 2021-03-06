<?php
/**
 * Brooks Eshe
 * 1/6/2019
 * index.php
 * This form takes an order for cupcakes and returns a message
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cupcake Orders</title>
</head>
<body>
<pre>
    <?php
    $name = "";
    $flavors = "";
    $flavorsArray = array('grasshopper' => 'The Grasshopper', 'maple' => 'Whiskey Maple Bacon',
        'carrot' => 'Carrot Walnut', 'caramel' => 'Salted Caramel Cupcake', 'velvet'
        => 'Red Velvet', 'lemon' => 'Lemon Drop', 'tiramisu'=>'Tiramisu');
    $total = 0;

    //validation
    if(!empty($_POST)){
        //name
        $isValid = true;
        if(empty($_POST['name'])) {
            echo "<p>Please enter a name</p>";
            $isValid = false;
        } else{
            $name = $_POST['name'];
        }

        //flavors
        if (!isset($_POST['flavorChoice'])){
            echo "<p>Please select a flavor</p>";
            $isValid = false;
        }elseif($_POST['flavorChoice']){
            $flavors = $_POST['flavorChoice'];
        }

        //spoofing
        foreach ($flavors as $cupcake){
            if(!in_array($cupcake, $flavorsArray)){
                echo "not a valid flavor";
                $isValid = false;
            }
        }

        //print statement
        if($isValid) {
            echo "<p>Thank you $name for your order</p>";
            echo "<p>Order Summary:</p>";
            echo "<ul>";
            foreach($flavors as $flav){
                echo"<li>$flav</li>";
                $total += 3.50;
            }
            echo "</ul> <p>Order Total: $$total</p>";
        }
    }

    ?>
</pre>

    <form id="donuts" method="POST" action="">
        <fieldset>
            <label>Name: </label><br>
            <input type="text" size="10" maxlength="30" name="name" id="name"
                   value="<?php echo $name?>"><br>
            <label>Flavors: </label>
        <?php
            //print the contents of array and make it sticky
            foreach ($flavorsArray as $options => $text) {
                echo "<br/><input type='checkbox' name='flavorChoice[]' value='$text'";
                    if(in_array($text, $_POST['flavorChoice'])){
                        echo " checked = 'checked'";
                    }
                 echo ">$text";

            }
        ?>
            <br><input type="submit" value="Order" id="submit" name="btnOrder">
        </fieldset>
    </form>
</body>
</html>