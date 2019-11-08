<!DOCTYPE html>
<html>
  <head>
    <title> Search Saved Calculations</title>
    <link rel="stylesheet" type="text/css" href="styles/main.css">

    <script type="text/javascript">
	function findmatch()
	{
		if (window.XMLHttpRequest) 
		{
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP')
		}

		xmlhttp.onreadystatechange = function () 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
				document.getElementById('results').innerHTML = xmlhttp.responseText;
			}
		}

		xmlhttp.open('GET','appSearch.php?searchText='+document.search.searchText.value,true);
		xmlhttp.send();
	}

</script>

  </head>
  <header>
    
    <h2>Mortgage Calculator</h2>
    <ul style=" display: block; list-style-type: none; text-align: left; text-sixe:10px;">
    <li><a href="index.php">Home</a></li>
    </ul>
   </header>
  <body>
    <header>
     
    </header>
    <main>
   
      <form class="myForm" action="display_results.php" method="post" name="search">
        <label><div class="tooltip">Name/ID:
  <span class="tooltiptext">You can search for old calculations by entering the name or the ID for the calculation.
  
  </span>
</div></label>

        <input type="text" title="Search..." name="searchText"  placeholder="Enter Name / ID " onkeyup="findmatch()">
        
      </form>
	  
      </main>

  <section id="main" class="column">
	<div class="module_content">		
	</div>
	<div id="results">		
	</div>
	<section class="column" style="margin-bottom: 300px;">		
	</section>

 </body>
</html>
