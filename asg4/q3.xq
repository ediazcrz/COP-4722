<q3>
  {
    for $dep   in doc("../company/department.xml")//department,
        $proj  in doc("../company/project.xml")//project,
        $works in doc("../company/works_on.xml")//works_on
    
    where $dep/dnumber = $proj/dnum and $works/pno = $proj/pnumber
    group by $name := $dep/dname

    return 
    <row>
        Department Name = {data($dep/dname)}
        Projects Count = {count(distinct-values($proj/pnumber))}
        Work-Hours = {sum($works/hours)}
        {concat('&#10;', '&#32;', '&#32;')} 
    </row>
  }
</q3>