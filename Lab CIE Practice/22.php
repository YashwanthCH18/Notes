<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Basics Example</title>
</head>
<body>
  <?php
  // --------------------------
  // Variables and Constants
  // --------------------------
  $message = "Hello, PHP!";
  define("MY_CONSTANT", "This is a constant value.");

  echo "<h2>Variables and Constants</h2>";
  echo "<p>Variable: " . $message . "</p>";
  echo "<p>Constant: " . MY_CONSTANT . "</p>";

  // --------------------------
  // Class Definition and Usage
  // --------------------------
  echo "<h2>Class Example</h2>";

  class Person {
      public $name;
      public $age;

      // Constructor to initialize name and age
      public function __construct($name, $age) {
          $this->name = $name;
          $this->age = $age;
      }

      // Method to return a greeting message
      public function greet() {
          return "Hello, my name is " . $this->name . " and I am " . $this->age . " years old.";
      }
  }

  // Create an object of Person class
  $person = new Person("Alice", 30);
  echo "<p>" . $person->greet() . "</p>";

  // --------------------------
  // Indexed Array Example
  // --------------------------
  echo "<h2>Indexed Array</h2>";
  $fruits = ["Apple", "Banana", "Cherry"];

  echo "<ul>";
  for ($i = 0; $i < count($fruits); $i++) {
      echo "<li>" . $fruits[$i] . "</li>";
  }
  echo "</ul>";

  // --------------------------
  // Associative Array Example
  // --------------------------
  echo "<h2>Associative Array</h2>";
  $ages = [
      "Alice"   => 30,
      "Bob"     => 25,
      "Charlie" => 35
  ];

  echo "<ul>";
  foreach ($ages as $name => $age) {
      echo "<li>$name is $age years old.</li>";
  }
  echo "</ul>";
  ?>
</body>
</html>
