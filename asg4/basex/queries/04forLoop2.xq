(:
   Illustrates loop structure with a selection condition
     an element is not prefixed with '@'
:)
<results>
  {
    for $e in doc("../company/employee.xml")//employee
    where $e/dno = 4
    return
        <emp
          fname="{ $e/fname }"
          lname="{ $e/lname }"
        />
  }
</results>

