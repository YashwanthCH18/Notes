In JavaScript, there are multiple ways to create objects. Two common approaches are:

1. **Shorthand (Object Literal Notation):**  
   This is the concise, modern way to create objects. You directly declare an object with its properties and methods.

2. **Longhand (Using the Object Constructor or Constructor Functions):**  
   This involves creating an object by instantiating a new object using the `new Object()` syntax or using a constructor function.

Below are examples for each approach.

---

### **1. Shorthand (Object Literal Notation)**

**Basic Object Literal:**

```js
// Creating an object using literal notation
const person = {
  name: "Alice",
  age: 25,
  greet() {
    console.log(`Hello, my name is ${this.name}`);
  }
};

person.greet(); // Output: Hello, my name is Alice
```

**ES6 Property and Method Shorthand:**

If you have variables with the same name as the property, you can use the shorthand syntax:

```js
const name = "Bob";
const age = 30;

// Object literal shorthand for properties
const person = {
  name, // equivalent to name: name
  age,  // equivalent to age: age
  greet() {
    console.log(`Hi, I'm ${this.name}`);
  }
};

person.greet(); // Output: Hi, I'm Bob
```

---

### **2. Longhand Methods**

#### **a. Using `new Object()`**

This is a more verbose way to create an object:

```js
// Create an empty object
const person = new Object();

// Adding properties and methods
person.name = "Charlie";
person.age = 35;
person.greet = function() {
  console.log(`Hello, I am ${this.name}`);
};

person.greet(); // Output: Hello, I am Charlie
```

#### **b. Using a Constructor Function**

A constructor function is a pattern that lets you create multiple similar objects:

```js
// Constructor function for creating Person objects
function Person(name, age) {
  this.name = name;
  this.age = age;
  this.greet = function() {
    console.log(`Hi, my name is ${this.name}`);
  };
}

// Creating new Person instances
const person1 = new Person("Dave", 40);
const person2 = new Person("Eve", 28);

person1.greet(); // Output: Hi, my name is Dave
person2.greet(); // Output: Hi, my name is Eve
```

#### **c. Using ES6 Classes (A Modern Variant of Constructor Functions)**

While similar to constructor functions, ES6 classes offer a more intuitive and cleaner syntax:

```js
// ES6 Class syntax
class Person {
  constructor(name, age) {
    this.name = name;
    this.age = age;
  }

  greet() {
    console.log(`Hello, I'm ${this.name}`);
  }
}

const person1 = new Person("Frank", 45);
const person2 = new Person("Grace", 32);

person1.greet(); // Output: Hello, I'm Frank
person2.greet(); // Output: Hello, I'm Grace
```

---

### **Summary**

- **Shorthand (Object Literal):**  
  
  - Quick, concise, and ideal for creating a single object or configuration objects.
  - ES6 shorthand allows you to omit the property value if the variable name is the same as the property key.

- **Longhand (Constructor or `new Object()`):**  
  
  - More verbose and useful when you need to create multiple similar objects or encapsulate object creation logic.
  - Constructor functions or ES6 classes let you create multiple instances with shared properties and methods.

Each method has its own use cases, and choosing between them depends on your project requirements and code style preferences.

JavaScript objects are very versatile, and there’s a lot more you can do beyond deleting properties. Below are some common operations and techniques you might find helpful:

---

## 1. **Add or Modify Properties**

- **Dot Notation**:
  
  ```js
  const person = {};
  person.name = "Alice";        // Add a new property
  person.age = 25;             // Add a new property
  person.age = 26;             // Modify an existing property
  ```

- **Bracket Notation**:
  
  ```js
  person["city"] = "New York"; // Add or modify a property using brackets
  ```

---

## 2. **Check if a Property Exists**

- **`in` Operator**:
  
  ```js
  if ("name" in person) {
    console.log("Property 'name' exists in person");
  }
  ```

- **`hasOwnProperty` Method**:
  
  ```js
  if (person.hasOwnProperty("age")) {
    console.log("Property 'age' is owned by person");
  }
  ```

---

## 3. **Loop Through Properties**

- **For...in Loop**:
  
  ```js
  for (const key in person) {
    console.log(key, "=", person[key]);
  }
  ```

- **`Object.keys()`, `Object.values()`, `Object.entries()`**:
  
  ```js
  console.log(Object.keys(person));   // ["name", "age", "city"]
  console.log(Object.values(person)); // ["Alice", 26, "New York"]
  console.log(Object.entries(person)); // [["name","Alice"],["age",26],["city","New York"]]
  ```

---

## 4. **Copy or Merge Objects**

- **Shallow Copy Using Spread Operator**:
  
  ```js
  const copyOfPerson = { ...person };
  ```

- **Merging Objects**:
  
  ```js
  const address = { city: "New York", zip: "10001" };
  const merged = { ...person, ...address };
  // merged now has all properties from person and address
  ```

- **`Object.assign()`**:
  
  ```js
  const mergedObj = Object.assign({}, person, address);
  ```

---

## 5. **Freeze or Seal Objects**

- **`Object.freeze()`**: Prevents any changes (add, delete, modify) to an object’s properties.
  
  ```js
  const frozenPerson = Object.freeze(person);
  frozenPerson.age = 30; // Fails silently in strict mode or throws an error in strict mode
  ```

- **`Object.seal()`**: Allows modifying existing properties but prevents adding or deleting properties.
  
  ```js
  const sealedPerson = Object.seal(person);
  delete sealedPerson.age; // Won't work
  sealedPerson.age = 30;   // This will work
  ```

---

## 6. **Getters and Setters**

You can define dynamic getters and setters within an object literal:

```js
const user = {
  firstName: "John",
  lastName: "Doe",
  get fullName() {
    return `${this.firstName} ${this.lastName}`;
  },
  set fullName(value) {
    [this.firstName, this.lastName] = value.split(" ");
  }
};

console.log(user.fullName); // "John Doe"
user.fullName = "Jane Smith";
console.log(user.firstName); // "Jane"
console.log(user.lastName);  // "Smith"
```

---

## 7. **Define Property Descriptors**

You can use `Object.defineProperty()` for fine-grained control (e.g., making a property read-only, hidden from enumeration, etc.):

```js
const book = {};

Object.defineProperty(book, "title", {
  value: "JavaScript Essentials",
  writable: false,      // can't modify the value
  enumerable: true,     // shows up in loops
  configurable: false   // can't delete this property
});

console.log(book.title); // "JavaScript Essentials"
book.title = "New Title"; // fails silently or throws in strict mode
console.log(book.title); // still "JavaScript Essentials"
```

---

## 8. **Destructuring**

Destructuring allows you to unpack properties from an object into variables:

```js
const product = { name: "Laptop", price: 999, brand: "TechCorp" };
const { name, price } = product;
console.log(name, price); // "Laptop" 999
```

---

### **Summary**

- You can **add, modify, check, or delete** properties in objects.  
- You can **iterate** through properties using loops or built-in methods like `Object.keys()`.  
- **Copying or merging** objects can be done with the spread operator or `Object.assign()`.  
- **Freeze** or **seal** objects to restrict changes.  
- **Getters and setters** let you define dynamic property behaviors.  
- **Destructuring** is a clean way to extract specific properties into variables.

These operations cover most of the day-to-day object manipulation you’ll need in JavaScript. Let me know if you have any specific questions!

Absolutely! You can use **template literals** (the `${ }` syntax) **and** the `this` keyword in functions on objects created with the `new` operator. Here’s a quick example:

```js
// Create an object using the new operator
const person = new Object();

// Add properties
person.name = "Yashwanth";
person.age = 21;

// Add a method using a standard function
person.introduce = function() {
  // Use `this` to refer to the current object
  // and use a template literal for the string
  console.log(`${this.name} is ${this.age} years old!`);
};

// Call the method
person.introduce(); // Output: Yashwanth is 21 years old!
```

### **Key Points**

1. **Template Literals**  
   
   - Use backticks (`` ` ``) to create a string.
   - Insert variables or expressions using `${...}`.

2. **`this` Keyword**  
   
   - Within a **standard function** assigned as a method, `this` refers to the object itself.
   - Make sure you’re not using an arrow function if you want `this` to refer to the object. Arrow functions do not bind their own `this` in the same way.

### **Example with an Arrow Function (Not Recommended for `this` Binding)**

```js
person.introduceArrow = () => {
  // `this` inside an arrow function does NOT refer to the object
  console.log(`${this.name} is ${this.age} years old!`);
};
person.introduceArrow(); 
// Likely prints: "undefined is undefined years old!"
// because arrow functions use the lexical `this` from the outer scope
```

If you need `this` to refer to the object, **use a regular function** instead of an arrow function.

---

**In short:**  
Yes, you can absolutely use `${ }` in methods on an object created with `new`, and the `this` keyword will refer to that object as long as you define the method with a standard function (not an arrow function).