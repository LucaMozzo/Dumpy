<html>
<head>
<script>
function showUser() {
	var query = document.getElementById("se").value;

    if (query == "") {
        alert("Insert a valid research query");
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","BACKUP.php?q="+query,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<form>
	
	<input type="text" name = "search" id = "se"></input>
	<input  type = "button" name="btn" onclick="showUser()" onchange="showUser()"></input>
	<p id = "txtHint"></p>
 </form>
 

</body>
</html>