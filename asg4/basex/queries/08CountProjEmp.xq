(:
   For each project, list the project name 
        and the number of employees work on that project

:)

<results>
  { for $p in doc("../company/project.xml")//project
    let $w := doc("../company/works_on.xml")//works_on[pno = $p/pnumber]
    return 
      <proj
        name="{ $p/pname }"
        empcount="{ count($w) }"
      />
  }
</results>

