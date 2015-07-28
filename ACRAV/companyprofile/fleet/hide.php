<html>
<head>
<script type="text/javascript">
function ShowHideField(header, gridID, checkboxElement) {
    var theGrid = document.getElementById(gridID);
    var displayValue;
 
    if (checkboxElement.checked) {
        displayValue = "";
    } else { 
        displayValue = "none";
    }
 
 
    if (theGrid != null) {
        var theHeaders = theGrid.getElementsByTagName("th");
        var theRows = theGrid.getElementsByTagName("tr");
        var numHeaders = theHeaders.length;
        var numRows = theRows.length;
        var i;
        var foundHeader = false;
        //searching through the headers in the grid for one that matches the header value provided
        for (i = 0; i < numHeaders && foundHeader==false; i++) {
            var headerText = theHeaders[i].innerHTML;
            if (headerText == header) {
            //once found the header, set the header's display value to display or not depending on what was provided
                foundHeader = true;
                theHeaders[i].style.display = displayValue;
                var j;
                for (j = 0; j < numRows; j++) {
                //looping through all of the rows in the grid and setting each cell in the column to display or not.
                    var cells = theRows[j].getElementsByTagName("td");
                    if (cells.length > i) {
                        cells[i].style.display = displayValue;
                    }                  
                }
 
            }
        }        
    }
 
}
</script>
</head>
 
<body>
<form>
 
  <input type="checkbox" onclick="ShowHideField('Field 1', 'grid', this)" id="Field1" checked="true" /><label for="Field1">Field 1</label><br />
  <input type="checkbox" onclick="ShowHideField('Field 2', 'grid', this)" id="Field2" checked="true" /><label for="Field2">Field 2</label><br />
  <input type="checkbox" onclick="ShowHideField('Field 3', 'grid', this)" id="Field3" checked="true" /><label for="Field3">Field 3</label><br />
  <input type="checkbox" onclick="ShowHideField('Field 4', 'grid', this)" id="Field4" checked="true" /><label for="Field4">Field 4</label><br />
<br />
 
<table id="grid">
  <tr>
    <th>Field 1</th>
    <th>Field 2</th>
    <th>Field 3</th>
    <th>Field 4</th>
  </tr>
  <tr>
    <td>1,1</td>
    <td>2,1</td>
    <td>3,1</td>
    <td>4,1</td>
  </tr>
  <tr>
    <td>1,2</td>
    <td>2,2</td>
    <td>3,2</td>
    <td>4,2</td>
  </tr>
  <tr>
    <td>1,3</td>
    <td>2,3</td>
    <td>3,3</td>
    <td>4,3</td>
  </tr>
</table>
</form>
</body>
 
</html>