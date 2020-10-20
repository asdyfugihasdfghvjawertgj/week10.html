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
		$("#span3").text("please enter Phone");
	}
	else{
		$("#span3").text("");
	}
	if($("#input1").val()!="" && $("#input2").val()!="" &&  $("#input3").val()!="")
	{
    return true;
	}
	else{

    return false;
	}
	})

})