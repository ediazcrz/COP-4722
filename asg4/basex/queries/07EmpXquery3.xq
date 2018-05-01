(:
   Illustrates join operation in Xquery

   List the firstname, lastname, and hours worked
    by employees who work more than 15 hours on any project controlled
    by department number 5.
:)
<results>
  {
    for $e in doc("../company/employee.xml")//employee,
        $p in doc("../company/project.xml")//project,
        $w in doc("../company/works_on.xml")//works_on
    where $w/hours > 15.0 and $p/dnum = 5
          and $w/pno = $p/pnumber and $w/essn = $e/ssn
    return
        <ans
          fname="{ $e/fname }"
          lname="{ $e/lname }"
          hours="{ $w/hours }"
        />
  }
</results>

