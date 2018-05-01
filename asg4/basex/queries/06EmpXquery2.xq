(:
   Illustrates join operation in Xquery

   List the firstname, lastname, and hours worked
    by employees who work more than 15 hours for project number 30.
:)
<results>
  {
    for $e in doc("../company/employee.xml")//employee,
        $w in doc("../company/works_on.xml")//works_on
    where $w/hours > 15.0 and $w/pno = 30 and $w/essn = $e/ssn
    return
        <ans
          fname="{ $e/fname }"
          lname="{ $e/lname }"
          hours="{ $w/hours }"
        />
  }
</results>

