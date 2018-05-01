(:
   Illustrates loop structure
     an attribute of an element is prefixed with '@'
:)

<results>
  {
    for $p in doc("../docs/parts.xml")//part
    return
        <part id="{ $p/@partid }">
          { $p/@name }
        </part>
  }
</results>

