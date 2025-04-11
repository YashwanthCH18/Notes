Below is a comprehensive explanation covering:

1. **Five Methods of the Date Object**
2. **Five Methods/Functions Related to the Number Object**
3. **Form Validation in JavaScript** (with functions and error handling)

We’ll provide concise examples for each part, then tie them together in a final form-validation example that uses functions and error handling.

---

## 1. Five Methods of the `Date` Object

The `Date` object in JavaScript allows you to work with dates and times. Below are five commonly used methods:

1. **`getFullYear()`**
   
   - Returns the four-digit year of a date.
   
   ```js
   const now = new Date();
   console.log(now.getFullYear()); 
   // e.g., 2025
   ```

2. **`getMonth()`**
   
   - Returns the month (0-11). (0 = January, 11 = December)
   
   ```js
   const now = new Date();
   console.log(now.getMonth()); 
   // e.g., 2 for March
   ```

3. **`getDate()`**
   
   - Returns the day of the month (1-31).
   
   ```js
   const now = new Date();
   console.log(now.getDate()); 
   // e.g., 20
   ```

4. **`toLocaleDateString()`**
   
   - Returns a string with a language-sensitive representation of the date portion.
   
   ```js
   const now = new Date();
   console.log(now.toLocaleDateString()); 
   // e.g., "3/20/2025" in the U.S.
   ```

5. **`toString()`**
   
   - Returns a string representation of the date.
   
   ```js
   const now = new Date();
   console.log(now.toString()); 
   // e.g., "Thu Mar 20 2025 10:15:30 GMT-0400 (Eastern Daylight Time)"
   ```

---

Aha! You caught me slacking 😅—that was a *soft launch* of the number methods. Alright, let's go full turbo mode now and give you **5 methods for Numbers** and **5 for Window**, super exam-cram ready.

---

## 🧠 JavaScript Number Methods (5 you gotta know)

### 1. `toFixed(n)`
Rounds number to *n* decimal places.  
🧠 *Great for formatting prices or scores.*

```js
let price = 9.876;
price.toFixed(2); // "9.88"
```

---

### 2. `parseInt()`
Parses string and returns an **integer**.  
🧠 *Strips off letters and decimals.*

```js
parseInt("123abc"); // 123
```

---

### 3. `parseFloat()`
Parses string and returns a **float**.  
🧠 *Keeps the decimal part.*

```js
parseFloat("123.45px"); // 123.45
```

---

### 4. `isNaN()`
Checks if a value is *Not a Number*.  
🧠 *Useful in input validation.*

```js
isNaN("hello"); // true
```

---

### 5. `Number()`
Converts stuff into an actual number.  
🧠 *Your go-to type converter.*

```js
Number("123"); // 123
Number("hello"); // NaN
```

---

## 🪟 JavaScript `window` Methods (5 essentials)

### 1. `alert()`
Displays a popup message.  
🧠 *Used to say "LOOK AT THIS!" to users.*

```js
alert("Hello, you got this exam!");
```

---

### 2. `prompt()`
Asks the user to input something.  
🧠 *Instant input box.*

```js
let name = prompt("What's your name?");
```

---

### 3. `confirm()`
Shows a yes/no dialog, returns `true` or `false`.  
🧠 *Great for confirmations like "Are you sure?"*

```js
confirm("Wanna delete everything?");
```

---

### 4. `setTimeout()`
Runs code **after a delay**.  
🧠 *One-time timer.*

```js
setTimeout(() => {
  console.log("2 seconds later...");
}, 2000);
```

---

### 5. `setInterval()`
Runs code **repeatedly** at intervals.  
🧠 *It's like a loop with chill vibes.*

```js
setInterval(() => {
  console.log("Tick tock...");
}, 1000);
```

---

### 🧠 Quick Memory Tip:
- **Number squad**: `toFixed`, `parseInt`, `parseFloat`, `isNaN`, `Number`
- **Window gang**: `alert`, `prompt`, `confirm`, `setTimeout`, `setInterval`

Wanna play a quick flashcard or match-the-use game with these to lock 'em in? 👀
## 3. Form Validation in JavaScript with Functions and Error Handling

Below is a simple HTML form example demonstrating:

- Validation using a **function**.
- Error handling with **`try...catch`**.
- Using some of the **Date** and **Number** methods for demonstration.

### HTML

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Form Validation Example</title>
</head>
<body>
  <h1>Form Validation with JS Functions & Error Handling</h1>

  <form id="demoForm">
    <label for="dob">Date of Birth (YYYY-MM-DD):</label>
    <input type="text" id="dob" name="dob" placeholder="e.g., 2000-05-15"><br><br>

    <label for="score">Score (0 - 100):</label>
    <input type="text" id="score" name="score" placeholder="e.g., 85"><br><br>

    <button type="submit">Submit</button>
  </form>

  <div id="result"></div>

  <script src="form-validation.js"></script>
</body>
</html>
```

### JavaScript (`form-validation.js`)

```js
// Get references to form and result display
const form = document.getElementById("demoForm");
const resultDiv = document.getElementById("result");

// Add submit event listener
form.addEventListener("submit", (event) => {
  event.preventDefault(); // Prevent actual form submission

  // Get user inputs
  const dobInput = document.getElementById("dob").value.trim();
  const scoreInput = document.getElementById("score").value.trim();

  // Clear any previous messages
  resultDiv.textContent = "";

  try {
    // Validate date of birth
    validateDOB(dobInput);

    // Validate score
    validateScore(scoreInput);

    // If both validations pass, show success message
    resultDiv.style.color = "green";
    resultDiv.textContent = "Form submitted successfully!";

  } catch (error) {
    // Catch and display any thrown error from validation functions
    resultDiv.style.color = "red";
    resultDiv.textContent = `Error: ${error.message}`;
  }
});

/**
 * Validates the date of birth string in YYYY-MM-DD format.
 * If invalid, throws an error.
 */
function validateDOB(dobString) {
  // Simple check for format using regex (YYYY-MM-DD)
  // This is a basic approach, not perfect for all date edge cases
  const datePattern = /^\d{4}-\d{2}-\d{2}$/;
  if (!datePattern.test(dobString)) {
    throw new Error("Date of Birth must be in YYYY-MM-DD format.");
  }

  // Parse the date and check if it's valid
  const dateParts = dobString.split("-");
  const year = Number.parseInt(dateParts[0], 10);
  const month = Number.parseInt(dateParts[1], 10) - 1; // zero-based
  const day = Number.parseInt(dateParts[2], 10);

  const dob = new Date(year, month, day);
  // Check if the constructed date matches the input values
  if (
    dob.getFullYear() !== year ||
    dob.getMonth() !== month ||
    dob.getDate() !== day
  ) {
    throw new Error("Invalid date of birth.");
  }

  // Optionally, check if user is old enough, etc.
  // For demonstration, let's just print the date in console
  console.log("Validated DOB:", dob.toString());
}

/**
 * Validates the score input (should be an integer from 0 to 100).
 * If invalid, throws an error.
 */
function validateScore(scoreString) {
  // Convert to a number
  const score = Number(scoreString);

  // Check if it is a valid number
  if (Number.isNaN(score)) {
    throw new Error("Score must be a valid number.");
  }

  // Check if integer and within range
  if (!Number.isInteger(score) || score < 0 || score > 100) {
    throw new Error("Score must be an integer between 0 and 100.");
  }

  // Example usage of toFixed
  console.log("Score (2 decimals):", score.toFixed(2));
}
```

### Explanation of the Validation Example

1. **HTML Form**:
   
   - Two fields: **Date of Birth** and **Score**.
   - A single **Submit** button.

2. **Event Listener**:
   
   - On `submit`, we call our validation functions inside a `try...catch` block.

3. **`validateDOB(dobString)`** function:
   
   - Uses a **regular expression** to check the format (YYYY-MM-DD).
   - Splits the string into year, month, and day.
   - Creates a new `Date` object and verifies that the parts match exactly.
   - Throws an error if any check fails.

4. **`validateScore(scoreString)`** function:
   
   - Converts the string to a number using `Number()`.
   - Checks if it’s **not** `NaN` and if it’s an **integer** between 0 and 100.
   - Throws an error if invalid.

5. **Error Handling**:
   
   - If any validation function throws an error, the `catch` block displays it in red.
   - If no errors occur, we show a success message in green.

6. **Using Date & Number Methods**:
   
   - **`dob.toString()`** to log the validated date.
   - **`Number.isNaN()`** to check if the score is not a number.
   - **`Number.isInteger()`** to ensure it’s an integer.
   - **`toFixed(2)`** to demonstrate formatting the score with two decimal places (e.g., “85.00”).

**Result**:

- If the user enters an invalid date or score, they see an error message.
- If everything is valid, they see “Form submitted successfully!” and the console logs additional information.

---

## Wrap-Up

You now have:

- **Five Date methods** to manipulate or retrieve date/time information.
- **Five Number methods** (or static functions) to work with numeric values.
- A **form validation** example demonstrating:
  - **Functions** for modular and reusable validation.
  - **Error handling** with `try...catch`.
  - Usage of **Date** and **Number** methods within real-world validation logic.

These concepts form the backbone of many JavaScript applications, especially when dealing with user input and data integrity. Experiment with the code, add more validations (e.g., minimum age, advanced date checks), and refine it to fit your specific needs.
