<Q1>
  {
    for $n in distinct-values(
      for $i in (doc("../docs/auction.xml")//* | doc("../docs/auction.xml")//@*)
        return namespace-uri($i) 
    )
    return  <ns>{$n}</ns>
  }
</Q1> 

