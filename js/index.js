$(document).ready(function() {
	$('select').material_select();
	$('.modal').modal();
	});
	$(".more").click(function(){
		$(".hidden").toggle("slow");
	});

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

function createCard (fileName, downloadLocation, category , dateModified)
{
	return  "<div class='col s12 m6'>"+
			"<div class='card white darken-1'>"+
			" <div class='card-content black-text'>"+
			"<span class='card-title'><a href='"+downloadLocation+"' >"+fileName+"</a></span>"+
			"<p> File Type :"+category.capitalize()+"</p>"+Date(dateModified)+
			"</div>"+"</div>"+"</div>";
	
}


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
			$('#mainContent').hide();
			$('#mainContent').empty();
			var array = JSON.parse(response);
			if ( array == null )
			{
				$("#mainContent").append("<div class='col s12 m6'><div class='card white darken-1'><div class='card-content black-text'><p>Sorry! No files found on server :(</p></div></div></div>");
				$('#mainContent').fadeIn();
				return ;
			}
			var content;
			for( i = 0 ; i < array.length ; i ++)
			{
				content = createCard(array[i]['fileName'],array[i]['downloadLocation'],array[i]['category'] , array[i]['dateModified']);
				$("#mainContent").append(content);
			}
			$('#mainContent').fadeIn();

		}
	});
});