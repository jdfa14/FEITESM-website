$(document).ready(function () {
	var controls = $(".editable");
	controls.dblclick(toTextArea);
	

	controls.each(function(index){
		addEditButton($(this));
	});
});

function addEditButton(element){
	var div = $("<div></div>");
	var button = $("<button/>");
	var i = $("<i></i>");
	i.addClass("fa");
	i.addClass("fa-pencil");
	button.addClass("btn-primary");
	button.addClass("btn-md");
	
	button.append(i);
	button.hover(function(){$(this).children().addClass("fa-spin");},function(){$(this).children().removeClass("fa-spin");});

	div.addClass("editDiv");
	div.append(button);
	if(element.is("img")){
		element.parent().append(div);
		button.click(toInput);
	}else{
		button.click(toTextArea);
		element.append(div);
	}
}

function getAllAttr(element)
{
	var json = {};

	Array.prototype.slice.call(element[0].attributes).forEach(function(item) {
		json[item.name] = item.value;
	});

	return json;
}

function toInput(){
	var element = $(this).parent().prev();
	var elementTag = element.prop('tagName');
	var input = $("<input>");
	input.attr({type : "text" , placeholder : "Inserta aqui el URL de la imagen" , title : "Ejemplo www.example.com/img.jpg, o directorio raiz images/img.jpg"});
	input.val(element.attr("src"));
	input.width("100%");
	input.attr("allAtt",JSON.stringify(getAllAttr(element)));
	element.replaceWith(input);
	input.focus();
	input.blur(goBackToImg);
	return false;
}

function goBackToImg(){
	var attributes = JSON.parse($(this).attr("allAtt"));
	var element = $("<img>");
	for(var nameAtt in attributes){
		element.attr("" +nameAtt,"" +attributes[nameAtt]);
	}
	element.attr({src : $(this).val()});
	addEditButton(element);
	$(this).replaceWith(element);
}

function toTextArea(){
	var element = $(this).parent().parent();
	var elementTag = element.prop('tagName');
	var editableTextArea = $("<textarea />");
	try{
		editableTextArea.val((element.text()).trim());
	}
	catch(err){
		try{
			editableTextArea.val((element.text()).trim());
		}
		catch(err2){
		}
	}
	
	editableTextArea.width(element.width());
	editableTextArea.height(element.height());
	editableTextArea.attr("class","editableTA");
	editableTextArea.attr("tag",elementTag);
	editableTextArea.attr("allAtt",JSON.stringify(getAllAttr(element)));
	element.replaceWith(editableTextArea);
	editableTextArea.focus();
	editableTextArea.blur(goBackToElement);
	return false;
}

function goBackToElement(){
	var attributes = JSON.parse($(this).attr("allAtt"));
	var tag = $(this).attr("tag");
	var element = $("<" + tag + "> </" + tag + ">");
	for(var nameAtt in attributes){
		element.attr("" +nameAtt,"" +attributes[nameAtt]);
	}
	element.html($(this).val());
	addEditButton(element);
	$(this).replaceWith(element);
}