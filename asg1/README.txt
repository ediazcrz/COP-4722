The purpose of this assignment is to familiarize with query optimization.

Consider the following four queries specified on Company database (tables and schema):

Q1: Retrieve the name and address of all employees who work for the 'Administration' department

        SELECT FName, LName, Address
        FROM Employee, department
        WHERE DName = 'Administration' and DNumber = DNO ;

Q2: For each employee, retrieve the employee's first and last name and the first and last name of
    his/her immediate supervisor.

        SELECT e.FName, e.LName, s.FName, s.LName
        FROM Employee e, Employee s
        WHERE e.SuperSSN = s.SSN ;

Q3: Make a list of all project numbers for projects that involve an employee whose last name is
    'Wong', either as a worker or as a manager of the department that controls the project.

        (SELECT Distinct PNumber
         FROM Project, Department, Employee
         WHERE DNum = DNumber and MgrSSN = SSN and LName = 'Wong')
        UNION
        (SELECT Distinct PNumber
         FROM project, Works_On, Employee
         WHERE PNumber = PNO and ESSN = SSN and LName = 'Wong' );

Q4: For each project, retrieve the project number, the project name, and the number of employees
    from department 4 who work on the project.

        SELECT PNumber, PName, COUNT(*)
        FROM Project, Works_On, Employee
        WHERE PNumber = PNO and SSN = ESSN and DNO = 4
        GROUP BY PNumber, PName;

Draw the initial query tree for each of these queries, then show how the query tree is
optimized (one rule at a time) by the algorithm outlined in chapter 19 and write the SQL
query for the final optimized query tree.

Part2: Extend the sort-merge join algorithm shown in the modified Figure to implement the left outer join operation.