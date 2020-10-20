$(document).ready(function(){

$("#show").click(function(){
	if ($("#input1").val()=="") {
		$("#span1").text("please enter name");
	}
	else{
		$("#span1").text("");
	}
	if ($("#input2").val()=="") {
		$("#span2").text("please enter email");
	}
	else{
		$("#span2").text("");
	}
	if ($("#input3").val()=="") {
		$("#span3").text("please enter phone");
	}
	else{
		$("#span3").text("");
	}
	
	if ($("#input4").val()=="") {
		$("#span4").text("please enter address");
	}
	else{
		$("#span4").text("");
	}
	if ($("#input5").val()=="") {
		$("#span5").text("please enter nrc");
	}
	else{
		$("#span5").text("");
	}
	if ($("#input6").val()=="") {
		$("#span6").text("please enter Dept_id");
	}
	else{
		$("#span6").text("");
	}
	
	var select1=$("#input6").val();
	if($("#input1").val()!="" &&  $("#input1").val()!="" && $("#input1").val()!="" && $("#input1").val()!="" && $("#input1").val()!="" && select1!="")
	{
    return true;
	}
	else{

    return false;
	}
	})

})