<q2>
 {
    for $works_t1 in doc("../company/works_on.xml")//works_on,
        $emp_t1   in doc("../company/employee.xml")//employee,
        $works_t2 in doc("../company/works_on.xml")//works_on,
        $emp_t2   in doc("../company/employee.xml")//employee

    where $emp_t1/ssn = $works_t1/essn and $emp_t2/ssn = $works_t2/essn and $works_t1/pno = $works_t2/pno
          and $emp_t1/ssn != $emp_t2/ssn and $emp_t1/fname < $emp_t2/fname  
    
    order by $works_t1/pno

    return 
    <row>    
        Project Number = {data($works_t1/pno)}
        Employee 1 = {concat(data($emp_t1/fname), ' ', data($emp_t1/lname))}
        Employee 2 = {concat(data($emp_t2/fname), ' ', data($emp_t2/lname))}
        {concat('&#10;', '&#32;', '&#32;')}
    </row>

 }
</q2>