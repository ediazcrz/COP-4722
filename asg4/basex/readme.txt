            XML documents and Xqueries
            ==========================

Three sets of xml documents are given. The folder "docs" contains three xml files
that are part of a previous XQuery module. Other folders "company" and "premiere" 
contain xml documents for their respective databases.

After you download basex module, and unzip it on any part of hard disk
(may be on a flash drive). This software needs to be installed on Windows.
Read basex\download\BaseX_info.txt for details.

You can learn about all capabilities of BaseX module and XQuery features from
the main website at http://docs.basex.org/wiki/Startup .

I have created and tested fourteen queries (*.xq) with various levels of difficulties. 
In a XQuery file, comment lines can be included by enclosing with "(:" and ":)".
Variables can be declared to refer to any xml file or even to element(s)
(finer level) within a xml document. Inside a Xquery, an element at further 
sub-levels can be addressed using "//" or "/" with respect to a xml document
or a variable. To access an attribute of an element, the attribute name must be
prefixed with "@" sign. Note that XML documents and XQueries are case sensitive.

Some of the following predefined functions that will be useful:
   "normalize-space" [trims leading and trailing spaces of a string argument]
   "format-number" [formats a numberic argument according to a format argument]
   "distinct-values" [removes duplicates from a list of given arguments]
   "count", "sum", "max", "min", "avg" [aggregate function can be applied to a collection]


--Prabakar
