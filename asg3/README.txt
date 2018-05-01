The purpose of this assignment is to familiarize with PHP Queries.
Write a PHP script for each of the following questions (q1.php, q2.php, ...) and test them on the company database (tables) in xampp module.
You are encouraged to write more than one database query for each question.

    1. For a given dependent name (input from a browser), output
        a. dependent name
        b. firstname, lastname of the corresponding employee
        c. firstname, lastname of the manager for that employee
    
    2. Output the firstname and lastname of each pair of employees who work for the same project. 
       There should not be any duplicate reversed pair and no employee be paired with the same 
       employee.
    
    3. For a given department number (input from a browser), output
        a. name of the department
        b. number of projects controlled by this department
        c. total number of hours worked by all employees for all these projects
    
    4. For a given department name (input from a browser), output
        a. department name
        b. firstname, lastname of the manager
        c. total number of dependents of all employees who work for the department

Please note that a department has only one manager (that is specified by the mgrssn attribute) but a department may have more than one supervisor. 
Note that each supervisor is also an employee as well as each manager is also an employee. 
The role of a supervisor is to oversee the work of his/her immediate subordinates where as a manager is responsible for the entire operation of the department and the budget.

(Please note queries are not optimized for this assignment)