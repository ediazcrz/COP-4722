The purpose of this assignment is to familiarize with XQueries.
Write an XQuery for each of the following queries (q1.xq, q2.xq, ...) and test them on the company 
xml documents (included in "basex\company" folder of the basex package).

    1. For each dependent, output
        a. dependent name
        b. firstname, lastname of the corresponding employee
        c. firstname, lastname of the manager for that employee
    
    2. Output the firstname and lastname of each pair of employees who work for the same project. 
       There should not be any duplicate reversed pair and no employee be paired with the same 
       employee.

    3. For each department, output
        a. name of the department
        b. number of projects controlled by this project
        c. total number of hours worked by all employees for all these projects
    
    4. For each project, output
        a. project name
        b. name of the controlling department
        c. firstname, lastname of the manager of the department
        d. total number of employee-work assignments (number of worker-project assignments
           from works_on) for the project

(BaseX folder was placed at the root of the C drive when writing these queries)
(Please note that queries are not optimized for this assignment)