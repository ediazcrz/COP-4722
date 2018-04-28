<q1>
  {
    for $dep    in doc("../company/dependent.xml")//dependent,
        $emp_e  in doc("../company/employee.xml")//employee,
        $emp_m  in doc("../company/employee.xml")//employee,
        $depart in doc("../company/department.xml")//department
    
    where $dep/essn = $emp_e/ssn and $emp_m/ssn = $depart/mgrssn and 
          $emp_e/dno = $emp_m/dno

    return

    <row>
      Dependent Name = {data($dep/dependent_name)}
      Employee Name = {concat(data($emp_e/fname), ' ', data($emp_e/lname))}
      Manager Name = {concat(data($emp_m/fname), ' ', data($emp_m/lname))}
      {concat('&#10;', '&#32;', '&#32;')} 
    </row>
  }
</q1>