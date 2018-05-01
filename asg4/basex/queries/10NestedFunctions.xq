(:
   Compute the total salary for all employees who work for a given department name (dname)
:)
<results>
  {
    for $dep in doc("../company/department.xml")//department
    let $emp := doc("../company/employee.xml")//employee[dno = $dep/dnumber ]
    where $dep/dname='Research'
    return
     <dept>
      {$dep/dnumber} 
      {$dep/dname}
      <total salary="{format-number(sum($emp/salary),  '$,000.00')}" /> 
     </dept>   
  }
</results>