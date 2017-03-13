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

function createCard (fileName, downloadLocation, category , dateModified , fileId)
{
	return  "<div class='col s12 m6'>"+
			"<div class='card white darken-1'>"+
			" <div class='card-content black-text'>"+
			"<span class='card-title'><a href='"+downloadLocation+"' >"+fileName+"</a></span>"+
			"<p> File Type :"+category.capitalize()+"</p>"+
			"<p> File Id : "+fileId+"</p>"+Date(dateModified)+
			"</div>"+"</div>"+"</div>";
	
}

//function to upload the file
$("#uploadFile").click(function(){
	var fileData = $("#uploadTarget").prop('files')[0];
	if(fileData == null)
	{
		alert("No file to be added!");
		return false;
	}
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

//function to update the file
$("#updateFile").click(function(){
	var fileData = $("#updateTarget").prop('files')[0];
	var fileId = $("#updateId").val();
	if (!fileId)
	{
		alert("Replacement Id Not Found");
		return false;
	}
	if(fileData == null )
	{
		alert("Replacement File Not Found");
		return false;
	}
	var formData = new FormData();
	formData.append('updateId',fileId);
	formData.append('file',fileData);
	$.ajax({
		url : 'updateFile.php',
		dataType : 'text',
		cache : false,
		contentType : false,
		processData : false,
		data : formData,
		type : 'post',
		success : function(response){
			alert(response);
			$("#search").trigger("click");
		}
	});
});


//function to delete the file
$("#deleteFile").click(function(){
	var fileId = $("#deleteId").val();
	if(!fileId)
	{
		alert("No File to be deleted");
		return false;
	}
	var formData = new FormData();
	formData.append('deleteId',fileId);
	$.ajax({
		url : 'deleteFile.php',
		dataType : 'text',
		cache : false,
		contentType : false,
		processData : false,
		data : formData,
		type : 'post',
		success : function(response){
			alert(response);
			$("#search").trigger("click");
		}
	});
});

//function to search the file
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
				content = createCard(array[i]['fileName'],array[i]['downloadLocation'],array[i]['category'] , array[i]['dateModified'],array[i]['fileId']);
				$("#mainContent").append(content);
			}
			$('#mainContent').fadeIn();

		}
	});
});