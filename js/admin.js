$(document).ready(function () {
	var controls = $(".editable");
	var tabs_wrapper = $(".tabs-wrapper");
	var tabs = $(".nav-tabs li");

	controls.each(function(){
		addEditButton($(this));
	});
	
	tabs.each(function(){
		addDeleteButton($(this));
	});

	tabs_wrapper.each(function(){
		addPlusOneButton($(this));
	});
});


//Delete button for tabs
function addDeleteButton(tab_li){
	var div = $("<div></div>");
	var button = createEditButton("btn-danger","fa-minus","");

	div.addClass("editDiv");
	div.append(button);

	button.click(function(){ // funcion para eliminar todo
		var tab_li = $(this).parent().parent(); // this = boton, paretn = div, parent = li
		var id_tab = tab_li.children().next().attr("href"); // id del div de donde esta la informacion
		$(id_tab).remove(); // div y removemos
		tab_li.remove(); // removemos el tab tambien

		//crear log de eliminacion para ser guardado en la base de datos
		return false; // Esto es para que el boton no redireccione
	});
	//button.html('Borrar');

	tab_li.prepend(div);
	// ubicacion del divButon
	button.css("right" , button.height()/4);
	button.css("top" , -2*button.height());
}

//Add button for tabs, to add a new tab
function addPlusOneButton(tabs_wrapper){
	var div = $("<div></div>");
	var button = createEditButton("btn-info", "fa-plus-circle","");

	div.addClass("editDiv");
	div.append(button);

	button.click(function(){
		createTab($(this).parent(),"kikiriki");
	});

	tabs_wrapper.prepend(button);
	button.css("left" , "-50px");
}

//Standar Button to edit fields on the page
function addEditButton(element){
	var div = $("<div></div>");
	var button = createEditButton("btn-primary","fa-pencil","");

	button.hover(function(){$(this).children().addClass("fa-spin");},function(){$(this).children().removeClass("fa-spin");});
	div.addClass("editDiv");
	div.append(button);
	if(element.is("img")){
		element.parent().prepend(div);
		button.click(toInput);
	}else{
		button.click(toTextArea);
		element.prepend(div);
	}
	//button.height(button.width()+12);
	if(element.is("a"))
	{
		button.css("left" , -button.height()+5);
		button.css("top" , -2*button.height()-10)
	}else{
		button.css("left" , "-60px");
	}
	
}

//function to get all the attributes from some elements on the page
function getAllAttr(element){
	var json = {};

	Array.prototype.slice.call(element[0].attributes).forEach(function(item) {
		json[item.name] = item.value;
	});

	return json;
}

//tranform the image field to a input field to be able to capture the input path for the img
function toInput(){
	var element = $(this).parent().next();
	var elementTag = element.prop('tagName');
	var input = $("<input>");
	input.attr({type : "text" , placeholder : "Inserta aqui el URL de la imagen" , title : "Ejemplo www.example.com/img.jpg, o directorio raiz images/img.jpg"});
	input.val(element.attr("src"));
	input.width("100%");
	input.attr("allAtt",JSON.stringify(getAllAttr(element)));
	element.replaceWith(input);
	input.focus();
	input.blur(function(){
		var attributes = JSON.parse($(this).attr("allAtt"));
		var element = $("<img>");
		for(var nameAtt in attributes){
			element.attr("" +nameAtt,"" +attributes[nameAtt]);
		}
		element.attr({src : $(this).val()});
		$(this).replaceWith(element);
		addEditButton(element);
	});
	$(this).parent().remove();
	return false;
}

//Tranform the text element to a text area so the user can edit it
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
	editableTextArea.blur(function(){
		var attributes = JSON.parse($(this).attr("allAtt"));
		var tag = $(this).attr("tag");
		var element = $("<" + tag + "> </" + tag + ">");
		for(var nameAtt in attributes){
			element.attr("" +nameAtt,"" +attributes[nameAtt]);
		}
		element.html($(this).val());
		$(this).replaceWith(element);
		addEditButton(element);
	});
	return false;
}

//Icon dor the buttons
function addIcon(button,icon_name){
	var i = $("<i></i>");
	i.addClass("fa");
	i.addClass(icon_name);
	button.append(i);
}

//creating button by params
function createEditButton(button_kind, icon_name,text){
	var button = $("<button/>");
	button.text(text);
	if(icon_name != "")
		addIcon(button,icon_name);
	button.addClass("btn");
	button.addClass("btn-md");
	button.addClass(button_kind);
	button.prop('type','button');
	return button;
}

//create a full tab
function createTab(inHere, id){
	var tab_ul = inHere.find(".nav-tabs");
	var content = inHere.find(".tab-content");

	var new_li = $("<li></li>");
	var a = $("<a></a>");
	a.addClass("newEdit");
	a.attr("href","#"+id);
	a.attr("data-toggle","tab");
	a.html("Nueva Tabla");
	new_li.append(a);
	
	tab_ul.append(new_li);

	var pane = $("<div></div>");
	pane.addClass("tab-pane");
	pane.attr("id",id);

	var info_div = $("<div></div>");
	var img_div = $("<div></div>");
	var h4 = $("<h4></h4>");
	var p = $("<p></p>");
	var img = $("<img/>")

	info_div.addClass("col-md-6 info");
	img_div.addClass("col-md-6 img");

	h4.addClass("newEdit");
	p.addClass("newEdit");
	img.addClass("newEdit img-responsive");

	h4.text("Titulo");
	p.text("Texto");

	

	img.attr("src","images\\default.jpg");
	img.attr("alt","Foto");

	info_div.append(h4);
	info_div.append(p);

	img_div.append(img);

	pane.append(info_div);
	pane.append(img_div);

	content.append(pane);

	addEditButton(a);
	addDeleteButton(new_li);
	addEditButton(h4);
	addEditButton(p);
	addEditButton(img);
}


//ajax