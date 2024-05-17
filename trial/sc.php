<?php
// Names for the cookies we'll use to store the number and the operator
$cookie_name1 = "num";
$cookie_value1 = "";
$cookie_name2 = "op";
$cookie_value2 = "";

// Check if a number button was pressed
if (isset($_POST['num'])) {
  // Append the pressed number to the current input value
  $num = $_POST['input'] . $_POST['num'];
} else {
  // If no number was pressed, start with an empty string
  $num = "";
}

// Check if an operator button was pressed
if (isset($_POST['op'])) {
  // Store the current input in a cookie
  $cookie_value1 = $_POST['input'];
  setcookie($cookie_name1, $cookie_value1, time() + (86400 * 30), "/"); // Cookie lasts for 30 days

  // Store the operator in another cookie
  $cookie_value2 = $_POST['op'];
  setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/");

  // Reset the number to an empty string for the next input
  $num = "";
}

// Check if the equals button was pressed
if (isset($_POST['equal'])) {
  // Get the current input value
  $num = $_POST['input'];

  // Perform the calculation based on the stored operator
  switch ($_COOKIE['op']) {
    case "+":
      $result = $_COOKIE['num'] + $num; // Addition
      break;
    case "-":
      $result = $_COOKIE['num'] - $num; // Subtraction
      break;
    case "*":
      $result = $_COOKIE['num'] * $num; // Multiplication
      break;
    case "/":
      $result = $_COOKIE['num'] / $num; // Division
      break;
  }

  // Display the result of the calculation
  $num = $result;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculator</title>
  <link rel="stylesheet" href="sc.css" />
  <style>
    body {
      background-color: rgb(196, 192, 192);
    }
  </style>
</head>

<body>
  <div class="calc">
    <form action="" method="post">
      <br />
      <!-- Display the current input or result -->
      <input type="text" class="maininput" name="input" value="<?php echo @$num ?>"> <br> <br>

      <!-- Number and operator buttons for the calculator -->
      <input type="submit" class="numbtn" name="num" value="7" />
      <input type="submit" class="numbtn" name="num" value="8" />
      <input type="submit" class="numbtn" name="num" value="9" />
      <input type="submit" class="calbtn" name="op" value="+" /><br />
      <br />
      <input type="submit" class="numbtn" name="num" value="4" />
      <input type="submit" class="numbtn" name="num" value="5" />
      <input type="submit" class="numbtn" name="num" value="6" />
      <input type="submit" class="calbtn" name="op" value="-" /><br />
      <br />
      <input type="submit" class="numbtn" name="num" value="1" />
      <input type="submit" class="numbtn" name="num" value="2" />
      <input type="submit" class="numbtn" name="num" value="3" />
      <input type="submit" class="calbtn" name="op" value="*" /><br /><br />
      <input type="submit" class="c" name="num" value="C" />
      <input type="submit" class="numbtn" name="op" value="0" />
      <input type="submit" class="calbtn" name="op" value="." />
      <input type="submit" class="equal" name="equal" value="=" />
    </form>
  </div>

</body>

</html>