

## Definition
![[Pasted image 20250403144727.png]]

## 1 NF

![](C:\Users\Yashwanth%20C%20H\AppData\Roaming\marktext\images\2025-03-19-12-15-19-image.png)

To convert a table that is not in **First Normal Form (1NF)** to **1NF**, follow these steps:

### **Steps to Convert a Table to 1NF**

1. **Identify repeating groups or multivalued attributes**
   
   - A table is not in 1NF if a column contains multiple values (arrays, lists, or sets).

2. **Eliminate repeating groups by creating separate rows**
   
   - Convert multivalued attributes into separate rows so that each field contains a single value.

3. **Ensure a primary key is defined**
   
   - If needed, introduce a unique identifier for each row.

4. **Create a separate table if necessary**
   
   - If the repeating group can be normalized into a new table, create a new table and establish a relationship using a foreign key.

---

### **Example: Converting Non-1NF to 1NF**

#### **Non-1NF Table (Repeating Groups)**

| StudentID | Name    | Courses          |
| --------- | ------- | ---------------- |
| 101       | Alice   | Math, Science    |
| 102       | Bob     | English, History |
| 103       | Charlie | Math             |

- The `Courses` column contains multiple values, violating 1NF.

#### **1NF Table (Atomic Values)**

| StudentID | Name    | Course  |
| --------- | ------- | ------- |
| 101       | Alice   | Math    |
| 101       | Alice   | Science |
| 102       | Bob     | English |
| 102       | Bob     | History |
| 103       | Charlie | Math    |

- Each column now contains **atomic values**.
- The repeating group (`Courses`) is **eliminated**.
- A composite key `{StudentID, Course}` could be used to ensure uniqueness.

---

This transformation ensures that each column contains a single value, which is a requirement of **1NF**. Do you need help with a specific table?

![Uploaded image](https://files.oaiusercontent.com/file-LrsZ79u9sUef61H3Q9zmEa?se=2025-03-19T06%3A45%3A41Z&sp=r&sv=2024-08-04&sr=b&rscc=max-age%3D299%2C%20immutable%2C%20private&rscd=attachment%3B%20filename%3Dimage.png&sig=ToGlgvpbCf00GX/a82Pw3SJ8mpM9QqBZUFR66m3Oezw%3D)

The given table:  
**Employee(Eid, Ename, SkillSet, Address(DoorNo, City))**

violates **1NF** due to:

1. **Multi-valued attributes** – `SkillSet` may contain multiple values (e.g., "Java, Python").
2. **Nested attributes** – `Address(DoorNo, City)` is a **composite attribute**, which must be broken down into atomic values.

---

### **Converting to 1NF**

#### **Step 1: Flatten the Composite Attribute**

Instead of `Address(DoorNo, City)`, separate them into individual attributes:

- `DoorNo`
- `City`

#### **Step 2: Remove Multi-valued Attribute**

Since `SkillSet` may contain multiple values, we must create a separate row for each skill.

---

### **1NF Table**

| Eid | Ename   | SkillSet | DoorNo | City     |
| --- | ------- | -------- | ------ | -------- |
| 101 | Alice   | Java     | 12A    | New York |
| 101 | Alice   | Python   | 12A    | New York |
| 102 | Bob     | C++      | 45B    | Boston   |
| 102 | Bob     | Java     | 45B    | Boston   |
| 103 | Charlie | Python   | 78C    | Chicago  |

Now:

- **Each column has atomic values.**
- **Repeating groups are removed.**
- **The table is in 1NF.**

---

### **Alternative: Creating a Separate Skill Table**

If each employee has multiple skills, another way to normalize it is to create a separate **EmployeeSkills** table.

#### **Employee Table**

| Eid | Ename   | DoorNo | City     |
| --- | ------- | ------ | -------- |
| 101 | Alice   | 12A    | New York |
| 102 | Bob     | 45B    | Boston   |
| 103 | Charlie | 78C    | Chicago  |

#### **EmployeeSkills Table**

| Eid | SkillSet |
| --- | -------- |
| 101 | Java     |
| 101 | Python   |
| 102 | C++      |
| 102 | Java     |
| 103 | Python   |

This follows **1NF** and prepares the data for **higher normal forms** (2NF, 3NF, etc.).

Would you like further normalization? 🚀

## 2NF

![](C:\Users\Yashwanth%20C%20H\AppData\Roaming\marktext\images\2025-03-19-12-18-29-image.png)

### **Example: Converting a Table from 1NF to 2NF**

#### **Step 1: Understanding 1NF (First Normal Form)**

A table is in **1NF** if:

1. It has a **primary key**.
2. All columns contain **atomic values** (no repeating groups or arrays).
3. Each column contains values of a **single type**.

##### **Example Table (1NF)**

Let's say we have a **Student_Courses** table:

| Student_ID | Student_Name | Course_ID | Course_Name | Instructor |
| ---------- | ------------ | --------- | ----------- | ---------- |
| 101        | Alice        | CSE101    | Database    | Dr. Smith  |
| 101        | Alice        | CSE102    | Networks    | Dr. Lee    |
| 102        | Bob          | CSE101    | Database    | Dr. Smith  |
| 103        | Charlie      | CSE103    | AI          | Dr. Clark  |

✅ **This table is in 1NF** because:

- There are no multi-valued attributes (each student-course combination is in a separate row).
- All values are atomic.

---

#### **Step 2: Converting to 2NF (Second Normal Form)**

A table is in **2NF** if:

1. It is in **1NF**.
2. **No partial dependencies** exist (i.e., all non-key attributes must depend on the **whole** primary key, not just part of it).

##### **Issue in 1NF**

- The primary key here is **(Student_ID, Course_ID)** because a student can take multiple courses.
- But **Student_Name** depends only on **Student_ID**.
- Similarly, **Course_Name** and **Instructor** depend only on **Course_ID**.

##### **Solution: Splitting into Two Tables**

We remove **partial dependencies** by creating separate tables:

1. **Students Table** (Stores student-related information)
   
   | Student_ID | Student_Name |
   | ---------- | ------------ |
   | 101        | Alice        |
   | 102        | Bob          |
   | 103        | Charlie      |

2. **Courses Table** (Stores course-related information)
   
   | Course_ID | Course_Name | Instructor |
   | --------- | ----------- | ---------- |
   | CSE101    | Database    | Dr. Smith  |
   | CSE102    | Networks    | Dr. Lee    |
   | CSE103    | AI          | Dr. Clark  |

3. **Enrollment Table** (Bridges students and courses)
   
   | Student_ID | Course_ID |
   | ---------- | --------- |
   | 101        | CSE101    |
   | 101        | CSE102    |
   | 102        | CSE101    |
   | 103        | CSE103    |

✅ **Now, the table is in 2NF** because:

- **Student_Name** is stored separately and depends only on **Student_ID**.
- **Course_Name** and **Instructor** are stored separately and depend only on **Course_ID**.
- The **Enrollment** table properly links students and courses.

---

### **Your Question:**

You have the following table in **1NF**:

| Order_ID | Customer_Name | Product_ID | Product_Name | Quantity |
| -------- | ------------- | ---------- | ------------ | -------- |
| 201      | John Doe      | P101       | Laptop       | 1        |
| 201      | John Doe      | P102       | Mouse        | 2        |
| 202      | Jane Smith    | P103       | Keyboard     | 1        |

🔹 **What are the partial dependencies in this table?**  
🔹 **How would you break it down into 2NF? **

Great effort! You're on the right track, but there's a small mistake regarding the **dependency of quantity**. Let's refine your approach.

### **Identifying Partial Dependencies**

You're correct that:  
✅ **Customer_Name** depends only on **Order_ID** (not on Product_ID).  
✅ **Product_Name** depends only on **Product_ID**.

However, **Quantity is not dependent on Product_ID alone**.

- A product (e.g., "Laptop") doesn't have a fixed quantity—it varies **per order**.
- So, **Quantity depends on the combination of Order_ID and Product_ID** (not just Product_ID).

---

### **Breaking it into 2NF**

We split the original table into **three** tables to eliminate partial dependencies.

#### **1. Orders Table** (Stores order-specific details)

| Order_ID | Customer_Name |
| -------- | ------------- |
| 201      | John Doe      |
| 202      | Jane Smith    |

#### **2. Products Table** (Stores product-specific details)

| Product_ID | Product_Name |
| ---------- | ------------ |
| P101       | Laptop       |
| P102       | Mouse        |
| P103       | Keyboard     |

#### **3. Order_Details Table** (Bridges Orders and Products, tracking quantities)

| Order_ID | Product_ID | Quantity |
| -------- | ---------- | -------- |
| 201      | P101       | 1        |
| 201      | P102       | 2        |
| 202      | P103       | 1        |

✅ Now, we have **removed partial dependencies**, ensuring each non-key column depends on the whole primary key.

- **Customer_Name** is stored only once per order.
- **Product_Name** is stored only once per product.
- **Quantity** is properly linked to the specific **order-product combination**.

---

Here's your next, more challenging question:

---

**Consider the following table in 1NF representing training enrollments:**

| Employee_ID | Employee_Name | Department_ID | Department_Name | Training_Program_ID | Training_Program_Name | Training_Date | Trainer_ID | Trainer_Name |
| ----------- | ------------- | ------------- | --------------- | ------------------- | --------------------- | ------------- | ---------- | ------------ |
| E1001       | John Smith    | D10           | IT              | T2001               | Database Essentials   | 2023-01-15    | TR3001     | Alice Brown  |
| E1001       | John Smith    | D10           | IT              | T2002               | Advanced Networking   | 2023-02-20    | TR3002     | Bob White    |
| E1002       | Mary Johnson  | D20           | HR              | T2003               | Communication Skills  | 2023-03-10    | TR3003     | Carol Green  |

*Assume the composite primary key for this table is **(Employee_ID, Training_Program_ID)**.*

---

**Your Tasks:**

1. **Identify all the partial dependencies in the table.**
   
   - Consider which non-key attributes depend solely on a part of the composite key.

2. **Decompose the table into tables that satisfy 2NF.**
   
   - Create a decomposition that removes partial dependencies while preserving all the necessary information.
   - Explain your reasoning and the structure of each resulting table.

---

Please repeat your answer for these questions in your next prompt. Good luck!

Your decomposition is spot on for achieving 2NF! Let's summarize your reasoning:

- **Employee Attributes:**
  
  - **Employee_Name, Department_ID, and Department_Name** depend solely on **Employee_ID**.
  - You correctly placed these in the **Employee** table.

- **Training Program Attributes:**
  
  - **Training_Program_Name, Training_Date, Trainer_ID, and Trainer_Name** depend solely on **Training_Program_ID**.
  - These belong in the **Training Program** table.

- **Relationship:**
  
  - The original composite key was **(Employee_ID, Training_Program_ID)**.
  - To capture which employee is enrolled in which training program, you create a separate **Enrollment** table with just these two attributes.

Your tables are:

1. **Employee Table:**
   
   | Employee_ID | Employee_Name | Department_ID | Department_Name |
   | ----------- | ------------- | ------------- | --------------- |

2. **Training Program Table:**
   
   | Training_Program_ID | Training_Program_Name | Training_Date | Trainer_ID | Trainer_Name |
   | ------------------- | --------------------- | ------------- | ---------- | ------------ |

3. **Enrollment Table:**
   
   | Employee_ID | Training_Program_ID |
   | ----------- | ------------------- |

This decomposition successfully removes partial dependencies from the original table and brings it to 2NF. Great job!

## 3NF

![](C:\Users\Yashwanth%20C%20H\AppData\Roaming\marktext\images\2025-03-19-12-25-16-image.png)

Let's use a classic example involving student and department data.

---

### **Starting Table in 2NF**

Consider the **Students** table:

| Student_ID | Student_Name | Dept_ID | Dept_Name    | Dept_Chair  |
| ---------- | ------------ | ------- | ------------ | ----------- |
| S001       | Alice        | D01     | Computer Sci | Dr. Smith   |
| S002       | Bob          | D02     | Mathematics  | Dr. Johnson |
| S003       | Charlie      | D01     | Computer Sci | Dr. Smith   |

- **Primary Key:** `Student_ID`
- **2NF Status:**  
  Every non-key attribute is fully functionally dependent on `Student_ID`.
  - **Student_Name** depends directly on `Student_ID`.
  - **Dept_ID** depends directly on `Student_ID`.
  - **Dept_Name** and **Dept_Chair** are also stored in this table, but here is the issue:
    - **Dept_Name** and **Dept_Chair** are not really determined by `Student_ID` directly; they depend on the department (`Dept_ID`).

---

### **The Transitive Dependency**

- **Direct Dependency:**  
  `Student_ID` → `Dept_ID`

- **Transitive Dependency:**  
  `Dept_ID` → `Dept_Name` and `Dept_Chair`

This means that the department details are transitively dependent on the primary key through `Dept_ID`. This violates **Third Normal Form (3NF)**, which requires that non-key attributes are not transitively dependent on the primary key.

---

### **Converting to 3NF**

To eliminate the transitive dependency, we decompose the table into two separate tables:

1. **Students Table**  
   Contains information directly related to the student.
   
   | Student_ID | Student_Name | Dept_ID |
   | ---------- | ------------ | ------- |
   | S001       | Alice        | D01     |
   | S002       | Bob          | D02     |
   | S003       | Charlie      | D01     |

2. **Departments Table**  
   Contains department details that depend solely on `Dept_ID`.
   
   | Dept_ID | Dept_Name    | Dept_Chair  |
   | ------- | ------------ | ----------- |
   | D01     | Computer Sci | Dr. Smith   |
   | D02     | Mathematics  | Dr. Johnson |

---

### **Outcome**

- **Elimination of Transitive Dependency:**  
  Now, `Dept_Name` and `Dept_Chair` are stored in the **Departments** table where they depend directly on `Dept_ID` (the key of that table).
- **3NF Compliance:**  
  In the **Students** table, every non-key attribute (here, `Student_Name` and `Dept_ID`) depends only on the primary key (`Student_ID`). In the **Departments** table, all attributes depend solely on `Dept_ID`.

This conversion ensures that updates to department information (like a change in `Dept_Chair`) can be made in one place without having to update multiple student records.

---

Does this example help clarify how to convert a table from 2NF to 3NF?

Let's consider another example using a **Sales** table.

---

### **Starting Table in 2NF**

Imagine a **Sales** table that records individual sales transactions. It includes product details that are transitively dependent on the sale via the product identifier:

| Sale_ID | Product_ID | Product_Name | Product_Category | Sale_Quantity |
| ------- | ---------- | ------------ | ---------------- | ------------- |
| S001    | P1001      | Widget A     | Widgets          | 10            |
| S002    | P1002      | Gadget B     | Gadgets          | 5             |
| S003    | P1001      | Widget A     | Widgets          | 7             |

- **Primary Key:** `Sale_ID`
- **2NF Status:**  
  Every non-key attribute is fully dependent on `Sale_ID` (each sale has a unique ID).
- **Transitive Dependency Issue:**  
  Although the sale details (like `Sale_Quantity`) depend directly on `Sale_ID`, the product details are not directly determined by `Sale_ID`. Instead, they depend on `Product_ID`:
  - `Sale_ID` → `Product_ID`
  - And then `Product_ID` → `Product_Name` and `Product_Category`

Thus, **Product_Name** and **Product_Category** are transitively dependent on `Sale_ID` via `Product_ID`.

---

### **Converting to 3NF**

To eliminate the transitive dependency, we split the table into two separate tables:

1. **Sales Table:**  
   Contains only attributes that directly depend on the sale.
   
   | Sale_ID | Product_ID | Sale_Quantity |
   | ------- | ---------- | ------------- |
   | S001    | P1001      | 10            |
   | S002    | P1002      | 5             |
   | S003    | P1001      | 7             |

2. **Products Table:**  
   Contains product-specific details where the primary key is `Product_ID`.
   
   | Product_ID | Product_Name | Product_Category |
   | ---------- | ------------ | ---------------- |
   | P1001      | Widget A     | Widgets          |
   | P1002      | Gadget B     | Gadgets          |

Now, the **Sales** table is in 3NF because:

- All non-key attributes in **Sales** depend solely on `Sale_ID`.
- Product details have been moved to the **Products** table, where they depend solely on `Product_ID`.

---

### **Your Question to Solve**

Given the following **2NF** table:

| Invoice_ID | Customer_ID | Customer_Name | Invoice_Date | Sales_Rep | Sales_Rep_Phone |
| ---------- | ----------- | ------------- | ------------ | --------- | --------------- |
| INV001     | C101        | John Doe      | 2025-01-15   | SR001     | 555-1234        |
| INV002     | C102        | Jane Smith    | 2025-01-16   | SR002     | 555-5678        |
| INV003     | C101        | John Doe      | 2025-01-17   | SR001     | 555-1234        |

1. **Identify the transitive dependency present in this table.**
2. **How would you decompose this table to achieve 3NF?**

Take your time to think through the dependencies and the correct table decomposition. Feel free to provide your solution!

Your answer is correct! You’ve successfully identified the transitive dependencies and decomposed the table into three relations to achieve 3NF. Let's break it down:

---

### **Identified Dependencies**

- **Primary Dependency:**
  
  - **Invoice_ID** is the primary key of the original table.

- **Transitive Dependencies:**
  
  1. **Customer_Name** depends on **Customer_ID** (i.e., Customer_ID → Customer_Name). Since **Customer_ID** is determined by **Invoice_ID**, **Customer_Name** is transitively dependent on **Invoice_ID**.
  2. **Sales_Rep_Phone** depends on **Sales_Rep** (i.e., Sales_Rep → Sales_Rep_Phone). And since **Sales_Rep** is determined by **Invoice_ID**, **Sales_Rep_Phone** is transitively dependent on **Invoice_ID**.

---

### **Decomposition into 3NF**

1. **Invoices Table:**  
   Contains attributes that are directly dependent on **Invoice_ID**.
   
   | Invoice_ID | Customer_ID | Invoice_Date | Sales_Rep |
   | ---------- | ----------- | ------------ | --------- |
   | INV001     | C101        | 2025-01-15   | SR001     |
   | INV002     | C102        | 2025-01-16   | SR002     |
   | INV003     | C101        | 2025-01-17   | SR001     |

2. **Customers Table:**  
   Contains attributes that depend solely on **Customer_ID**.
   
   | Customer_ID | Customer_Name |
   | ----------- | ------------- |
   | C101        | John Doe      |
   | C102        | Jane Smith    |

3. **Sales_Reps Table:**  
   Contains attributes that depend solely on **Sales_Rep**.
   
   | Sales_Rep | Sales_Rep_Phone |
   | --------- | --------------- |
   | SR001     | 555-1234        |
   | SR002     | 555-5678        |

---

### **Summary**

- **Invoice_ID → Customer_ID, Invoice_Date, Sales_Rep**  
  (Directly dependent on the primary key in the Invoices table.)
- **Customer_ID → Customer_Name**  
  (Eliminated the transitive dependency by moving **Customer_Name** to the Customers table.)
- **Sales_Rep → Sales_Rep_Phone**  
  (Eliminated the transitive dependency by moving **Sales_Rep_Phone** to the Sales_Reps table.)

This decomposition ensures that every non-key attribute in each table is fully and directly dependent on the primary key of that table, which is the goal of converting a table from 2NF to 3NF.

Great job on your solution!

## BOYCE CODD NORMAL FORM

![](C:\Users\Yashwanth%20C%20H\AppData\Roaming\marktext\images\2025-03-19-12-40-24-image.png)

A **super key** is a set of one or more attributes (columns) in a database table that can uniquely identify each record (row) in that table. In other words, no two rows will have the same combination of values for the attributes included in the super key.

### Key Points:

- **Uniqueness:** A super key must guarantee that each record in the table is distinct.
- **Not Necessarily Minimal:** A super key can include extra attributes that aren’t necessary for unique identification. When you remove these extra attributes and the key still uniquely identifies the record, the remaining set is called a **candidate key**.
- **Primary Key:** Out of all candidate keys, one is often chosen to be the primary key, which then becomes the main reference for record identification in that table.

### Example:

Consider a table of employees with the following columns: EmployeeID, Email, and Name.

- The attribute set `{EmployeeID}` might be a super key if every EmployeeID is unique.
- The combination `{EmployeeID, Name}` is also a super key because it still uniquely identifies each record, but it’s not minimal because EmployeeID alone is sufficient.

This concept is fundamental in relational database design as it helps ensure data integrity by preventing duplicate records.

**Boyce–Codd Normal Form (BCNF)** is a stricter version of the Third Normal Form (3NF) used in database normalization to eliminate redundancy and prevent update anomalies. In BCNF, every non-trivial functional dependency in a relation must have a determinant that is a candidate key.

---

### What is BCNF?

- **Definition:** A relation is in BCNF if for every non-trivial functional dependency X → Y (where Y is not a subset of X), X is a super key of the relation.
- **Stricter than 3NF:** Although a relation in BCNF is automatically in 3NF, the converse is not necessarily true. A table may be in 3NF yet still have anomalies if some dependencies have determinants that are not candidate keys.
- **Purpose:** The aim is to remove redundancy that can lead to update, insertion, and deletion anomalies.

---

### Converting a 3NF Table to BCNF

If your table is in 3NF but not in BCNF, it means there exists at least one functional dependency where the left-hand side (determinant) is not a candidate key. Here’s how you can convert it:

1. **Identify Functional Dependencies:**  
   List all the functional dependencies (FDs) that hold in the table.

2. **Find Violations:**  
   For each FD, check if the determinant is a candidate key. If it is not, this FD violates BCNF.

3. **Decompose the Table:**  
   For each violating FD (say, X → Y), decompose the original table into two tables:
   
   - **Table 1:** Contains the attributes involved in the dependency, i.e., X ∪ Y. In this table, X will act as the primary key.
   - **Table 2:** Contains the remaining attributes along with X (to preserve the relationship), i.e., (Original Table Attributes – Y) ∪ X.

4. **Ensure Lossless Join:**  
   Verify that the decomposition is lossless (you can reconstruct the original table by joining the decomposed tables) and that the functional dependencies are preserved.

5. **Repeat if Necessary:**  
   If any of the decomposed tables still violate BCNF, repeat the process on those tables.

---