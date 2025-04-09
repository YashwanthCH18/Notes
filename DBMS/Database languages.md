
### **1. Data Query Language (DQL)**

DQL is used to retrieve and fetch data from a database. It mainly consists of the `SELECT` statement.  
**Example:**

```sql
SELECT * FROM Employees WHERE Department = 'HR';
```

### **2. Data Definition Language (DDL)**

DDL is used to define and modify database structures like tables, indexes, and schemas. It includes commands like `CREATE`, `ALTER`, and `DROP`.  
**Example:**

```sql
CREATE TABLE Customers (ID INT PRIMARY KEY, Name VARCHAR(50), Age INT);
```

### **3. Data Manipulation Language (DML)**

DML is used to manipulate data within database tables, including inserting, updating, and deleting records. It includes `INSERT`, `UPDATE`, and `DELETE` commands.  
**Example:**

```sql
UPDATE Employees SET Salary = 60000 WHERE Name = 'Alice';
```

### **4. Data Control Language (DCL)**

DCL is used to control access to data within a database by granting or revoking permissions. It includes `GRANT` and `REVOKE` commands.  
**Example:**

```sql
GRANT SELECT ON Employees TO User1;
```

### **5. Transaction Control Language (TCL)**

TCL manages transactions to ensure database integrity by committing or rolling back changes. It includes `COMMIT`, `ROLLBACK`, and `SAVEPOINT`.  
**Example:**

```sql
BEGIN TRANSACTION;  
UPDATE Accounts SET Balance = Balance - 100 WHERE ID = 1;  
COMMIT;
```