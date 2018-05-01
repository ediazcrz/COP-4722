(:
   Compute the total salary for all employees who work for a given department name (dname)
:)
<results>
  {
    for $dep in doc("../company/department.xml")//department[dname='Research']
    let $salGrp := (
      for $emp in doc("../company/employee.xml")//employee[dno = $dep/dnumber ]
      return $emp/salary
    )
    return
     <dept>
      {$dep/dnumber} 
      {$dep/dname}
      <total salary="{format-number(sum($salGrp),  '$,000.00')}" /> 
     </dept>   
  }
</results>