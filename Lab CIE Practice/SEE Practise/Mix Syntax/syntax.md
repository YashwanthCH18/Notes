// 🌐 JavaScript                          |  🐘 PHP
//--------------------------------------|---------------------------------------
let str = "Hello, world!";             | $str = "Hello, world!";
let num = 42;                          | $num = 42;
let bool = true;                       | $bool = true;
let nul = null;                        | $nul = null;
let undef;                             | $undef = null;

console.log("String:", typeof str, str);   | echo "String: " . gettype($str) . " - $str<br>";
console.log("Number:", typeof num, num);   | echo "Number: " . gettype($num) . " - $num<br>";
console.log("Boolean:", typeof bool, bool);| echo "Boolean: " . gettype($bool) . " - " . ($bool ? 'true' : 'false') . "<br>";
console.log("Null:", typeof nul, nul);     | echo "Null: " . gettype($nul) . " - null<br>";
console.log("Undefined:", typeof undef, undef); | echo "Undefined: " . gettype($undef) . " - null<br>";

// Control Structures
if (bool) {                            | if ($bool) {
    console.log("true");              |     echo "true<br>";
} else {                              | } else {
    console.log("false");            |     echo "false<br>";
}                                     | }

// Indexed array and classic for loop
let fruits = ["🍎", "🍌", "🍇"];       | $fruits = ["🍎", "🍌", "🍇"];
for (let i = 0; i < fruits.length; i++) { | for ($i = 0; $i < count($fruits); $i++) {
    console.log(fruits[i]);           |     echo $fruits[$i] . "<br>";
}                                     | }

// Associative object or array
let person = { name: "Alice", age: 25 }; | $person = ["name" => "Alice", "age" => 25];
for (let key in person) {             | foreach ($person as $key => $value) {
    console.log(key, person[key]);   |     echo "$key => $value<br>";
}                                     | }

// While loop
let j = 3;                             | $j = 3;
while (j > 0) {                        | while ($j > 0) {
    console.log(j);                  |     echo "$j<br>";
    j--;                             |     $j--;
}                                     | }

// do...while loop
let k = 0;                             | $k = 0;
do {                                  | do {
    console.log(k);                  |     echo "$k<br>";
    k++;                             |     $k++;
} while (k < 3);                      | } while ($k < 3);

// Switch
let day = "Wednesday";                | $day = "Wednesday";
switch (day) {                        | switch ($day) {
    case "Monday":                   |     case "Monday":
        console.log("Monday");      |         echo "It's Monday.<br>";
        break;                      |         break;
    case "Wednesday":               |     case "Wednesday":
        console.log("Wednesday");  |         echo "It's Wednesday.<br>";
        break;                      |         break;
    default:                        |     default:
        console.log("Other day");  |         echo "It's another day.<br>";
}                                     | }

// Regular function
function addNumbers(a, b) {           | function addNumbers($a, $b) {
    return a + b;                    |     return $a + $b;
}                                     | }

let sum = addNumbers(5, 3);           | $sum = addNumbers(5, 3);
console.log("Sum:", sum);           | echo "Sum: $sum<br>";

// Arrow function                         | Anonymous function (Closure)
const multiply = (a, b) => a * b;     | $multiply = fn($a, $b) => $a * $b;
console.log("Product:", multiply(4, 2));| echo "Product: " . $multiply(4, 2) . "<br>";
