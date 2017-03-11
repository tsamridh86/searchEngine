$(document).ready(function() {
	$('select').material_select();
	$('.modal').modal();
	});
	$(".more").click(function(){
		$(".hidden").toggle("slow");
	});
var content = "<div class='card white darken-1'>"+
			" <div class='card-content black-text'>"+
			"This is a new card that i made"+
			"</div>"+"</div>";
$("#mainContent").append(content);

//function to upload the file
$("#uploadFile").click(function(){
	var fileData = $("#uploadTarget").prop('files')[0];
	var formData = new FormData();
	formData.append('file',fileData);
	$.ajax({
		url : 'addFile.php',
			dataType : 'text' , //what to expect from the server
			cache : false,
			contentType : false,
			processData : false,
			data : formData,
			type: 'post',
			success : function(response)
			{
				alert(response);
			}
		});
	});

$("#search").click(function(){
	var query = $("#query").val();
	var cat = $('#searchCategory').val();
	var sort = $('#sortCategory').val();
	var formData = new FormData();
	formData.append('query',query);
	if(cat)
		formData.append('category',cat);
	if(sort)
		formData.append('sort',sort);
	$.ajax({
		url : 'searchFile.php',
		dataType: 'text',
		cache: false, 
		contentType: false,
		processData : false,
		data: formData,
		type: 'post',
		success:function (response)
		{
			alert(response);
		}
	});
});