<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<table>

<tr>
<td>
</td>
<td>
Name:
</td>
</tr>


<tr>
<td>
</td>
<td>
<input type="text" id="name_entered"/>
</td>
</tr>

<tr>
<td>
</td>
<td>
Comment:
</td>
</tr>


<tr>
<td>
</td>
<td>
<textarea cols="35" rows="6" id="comment_entered">
</textarea>
</td>
</tr>

<tr>
<td>
</td>
<td>
<input type="submit" value="Comment" onclick="submitcomment();"/>
</td>
</tr>

</table>

<br><br>
<div id="showcomments"></div>



</body>
</html>
<script>

function submitcomment() {

var request;

try {

request= new XMLHttpRequest();

}

catch (tryMicrosoft) {

try {

request= new ActiveXObject("Msxml2.XMLHTTP");
}

catch (otherMicrosoft) 
{
try {
request= new ActiveXObject("Microsoft.XMLHTTP");
}

catch (failed) {
request= null;
}
}
}


var webpage= location.href;

position= webpage.lastIndexOf("/"); 

var lastpart= webpage.substring(position + 1);

var period= lastpart.indexOf(".");

var complete= lastpart.substring(0, period);

complete= complete.replace(/-/g, "_");


var url= "usercomments.php";
var username= document.getElementById("name_entered").value;
var usercomment= document.getElementById("comment_entered").value;
var vars= "name="+username+"&comment="+usercomment+"&webpage="+complete;
request.open("POST", url, true);

request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

request.onreadystatechange= function() {
if (request.readyState == 4 && request.status == 200) {
    var return_data=  request.responseText;
    document.getElementById("showcomments").innerHTML= return_data;
}
}

request.send(vars);
}
</script>

