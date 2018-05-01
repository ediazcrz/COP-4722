(:
   Illustrates loop structure
   with a selection condition (where clause)

   Find the firstname, lastname, and salary
    for employees who earn more than 32000.
:)
<results>
  {
    for $e in doc("../company/employee.xml")//employee
    where $e/salary > 32000
    return
        <emp
          fname="{ $e/fname }"
          lname="{ $e/lname }"
          salary="{ $e/salary }"
        />
  }
</results>

