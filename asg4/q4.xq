<q4>
  {
    for $dep   in doc("../company/department.xml")//department,
        $proj  in doc("../company/project.xml")//project,
        $works in doc("../company/works_on.xml")//works_on,
        $emp_e in doc("../company/employee.xml")//employee,
        $emp_m in doc("../company/employee.xml")//employee

    where $works/pno = $proj/pnumber and $dep/dnumber = $proj/dnum and $emp_e/dno = $proj/dnum 
          and $emp_e/dno = $dep/dnumber and $emp_m/ssn = $dep/mgrssn

    group by $name := $proj/pname

    return
    <row>
        Project Name = {data($proj/pname)}
        Department Name = {data($dep/dname)}
        Manager Name = {data(concat($emp_m/fname, ' ', $emp_m/lname))}
        Work Assignments = {count(distinct-values($works/essn))}
        {concat('&#10;', '&#32;', '&#32;')} 
    </row>
  }
</q4>