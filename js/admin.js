$(document).ready(function (){
	var tabs = $("#tabs .nav-tabs li");
	var staff = $(".staff");

	staff.dblclick(editableStaff);
	tabs.find("a").dblclick(editarTab);
	tabs.addClass("boxy");
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
		bootbox.confirm("Estas seguro de eliminar esta tab?", function(result) {
			if(result){
				//ajax para eliminar de la base de datos
				$.ajax({
					type : 'POST',
					url : '/feitesm-website/php/remove_information.php',
					data : {
						'tab_id' : $(id_tab).attr('id')
					},
					success : function(msg){
						var success = jQuery.parseJSON(msg);
						if(success['success']){
							$(id_tab).remove(); // div y removemos
							tab_li.remove(); // removemos el tab tambien
						}else{
							bootbox.alert("Error, conexion con base de datos fallida");
						}
						//alert('wow' + msg);
					}
				});
			}
		});
		//crear log de eliminacion para ser guardado en la base de datos
		return false; // Esto es para que el boton no redireccione
	});
	//button.html('Borrar');

	tab_li.prepend(div);
	// ubicacion del divButon
	button.css("right" , button.height()/4);
	button.css("top" , -2*button.height());
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
function createTab(id_tab, tab_name, titulo, contenido, img_url,contacto,redes){
	var obj = $("<div></div>");
	var new_li = $("<li></li>");
	var a = $("<a></a>");
	a.attr("href","#Tab-"+id_tab);
	a.attr("data-toggle","tab");
	a.html(tab_name);
	new_li.append(a);
	new_li.addClass("boxy");
	a.dblclick(editarTab);
	obj.append(new_li);

	var pane = $("<div></div>");
	pane.addClass("tab-pane fade in");
	pane.attr("id","Tab-"+ id_tab);

	var hiddenDiv = $("<div hidden></div>");
	var info_div = $("<div></div>");
	var img_div = $("<div></div>");
	var h4 = $("<h4></h4>");
	var p = $("<p></p>");
	var img = $("<img/>")

	h4.addClass("titulo");
	p.addClass("contenido");
	info_div.addClass("col-md-6 info");
	img_div.addClass("col-md-6 img");

	img.addClass("img-responsive");

	h4.text(titulo);
	p.text(contenido);
	img.attr("src",img_url);

	img.attr("alt","Foto");

	hiddenDiv.append($('<p class="contacto">'+contacto+'</p>'));
	hiddenDiv.append($('<p class="redes">'+redes+'</p>'));

	info_div.append(h4);
	info_div.append(p);

	img_div.append(img);

	pane.append(hiddenDiv);
	pane.append(info_div);
	pane.append(img_div);

	obj.append(pane);
	return obj;
}

//cookies
function readCookie(name) {
    var i, c, ca, nameEQ = name + "=";
    ca = document.cookie.split(';');
    for(i=0;i < ca.length;i++) {
        c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1,c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length,c.length);
        }
    }
    return '';
}

function writeCookie(name,value,days) {
    var date, expires;
    if (days) {
        date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        expires = "; expires=" + date.toGMTString();
            }else{
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}


function checkThis(){
	var selectedVal = $("#radio_btns input:radio:checked").val();
	var titulo = $("#titulo").parent().parent();
	var contenido = $("#contenido").parent().parent();
	var img_url = $("#img_url").parent().parent();
	var img = $("#img_preview").parent();

	if( 1 == selectedVal){ // info
		titulo.removeAttr("hidden");
		contenido.removeAttr("hidden");
		img_url.removeAttr("hidden");
		img.removeAttr("hidden");

		$("#titulo").attr("required","");
		$("#contenido").attr("required","");
	}else {// conctact or social network
		titulo.attr("hidden","");
		contenido.attr("hidden","");
		img_url.attr("hidden","");
		img.attr("hidden","");

		$("#titulo").removeAttr("required");
		$("#contenido").removeAttr("required");
	}
}

//tabs admin habdlers
function agregarTab(){
	bootbox.dialog({
		size : "large",
		title : "Agregar una nueva Tab",
		message : 
			'<div class="row">' +
				'<div class="col-md-12"> ' +
					'<form class="form-horizontal" onsubmit="return false;">' +
						'<div class="form-group">' +
							'<label class="col-md-4 control-label" for="titulo">Titulo de pestaña</label>' +
							'<div class="col-md-8">' +
								'<input id="tab_name" name="tab_name" type="text" placeholder="¿Quienes somos?" class="form-control input-md" required="">' +
							'</div>' +
						'</div>' +
						'<div class="form-group" id="radio_btns">' +
							'<label class="col-md-4 control-label" for="radios">Tipo de Pestaña</label>' +
							'<div class="col-md-4">' +
								'<div class="radio">' +
									'<label for="radios-0">' +
									'<input type="radio" name="radios" id="radios-0" value="1" checked="checked" onchange="checkThis()">' +
									'Información' +
									'</label>' +
								'</div>' +
								'<div class="radio">' +
									'<label for="radios-1">' +
									'<input type="radio" name="radios" id="radios-1" value="2" onchange="checkThis()">' +
									'Contacto' +
									'</label>' +
								'</div>' +
								'<div class="radio">' +
									'<label for="radios-2">' +
									'<input type="radio" name="radios" id="radios-2" value="3" onchange="checkThis()">' +
									'Redes Sociales' +
									'</label>' +
								'</div>' +
							'</div>' +
						'</div>' +

						'<div class="form-group">' +
							'<label class="col-md-4 control-label" for="titulo">Título</label>' +
							'<div class="col-md-8">' +
								'<input id="titulo" name="titulo" type="text" placeholder="¡Somos HTML!" class="form-control input-md" required="">' +
							'</div>' +
						'</div>' +
						'<div class="form-group">' +
							'<label class="col-md-4 control-label" for="contenido">Contenido</label>' +
							'<div class="col-md-8">' +
								'<textarea id="contenido" name="contenido" type="text" placeholder="Somos una organización dedicada a..." class="form-control input-md" required=""></textarea>' +
							'</div>' +
						'</div>' +
						'<div class="form-group">' +
							'<label class="col-md-4 control-label" for="img_url">URL de imagen</label>' +
							'<div class="col-md-4">' +
								'<input id="img_url" name="img_url" type="text" placeholder="images/default.jpg" class="form-control input-md" onblur="imgPreview()">' +
							'</div>' +
							'<img id="img_preview" class="col-md-4" src="images/default.jpg" alt="preview" onError="this.src=\'/feitesm-website/images/default.jpg\'; "/>' +
						'</div>' +
						'<div class="form-group"> ' +
							'<input type="submit" hidden>' +
						'</div> ' +
					'</form>' +
				'</div> ' +
			'</div> ',
		buttons : {
			cancel : {
				label : "Cancelar",
				className : "btn-danger",
				id : "random",
				callback : function(){

				}
			},
			success : {
				label : "Guardar",
				className : "btn-success",
				callback : function(){
					var myForm = $('.form-horizontal')
					if (!myForm[0].checkValidity()) {
						myForm.find(':submit').click()
						return false;
					}
					var selectedVal = $("#radio_btns input:radio:checked").val();
					var tab_name = $("#tab_name").val();
					var titulo = $("#titulo").val();
					var contenido = $("#contenido").val();
					var img_url = $("#img_preview").attr("src");
					var contacto = 0;
					var redes = 0;

					if(2 == selectedVal){// contact
						contacto = 1;
						titulo = "";
						contenido = "";
						img_url = "";
					}else if(3 == selectedVal){//redes
						redes = 1;
						titulo = "";
						contenido = "";
						img_url = "";
					}

					$.ajax({
						type : 'POST',
						url : '/feitesm-website/php/add_information.php',
						data : {
							'org_Name' : readCookie('orgName'),
							'tab_name' : tab_name,
							'titulo' : titulo,
							'contenido' : contenido,
							'img_url' : img_url,
							'contacto' : contacto,
							'redes' : redes
						},
						success : function(msg){

							var jsonObj = jQuery.parseJSON(msg);
							if(jsonObj['success']){
								addTabOnDocument(jsonObj['id_inf'],jsonObj['tab_name'],jsonObj['titulo'],jsonObj['contenido'],jsonObj['img_url'],jsonObj['contacto'],jsonObj['redes']);
							}else{
								bootbox.alert("Error, conexion con base de datos fallida");
							}
							//alert('wow' + msg);
							$(this).attr('id','');
						}
					});
				}
			}
		}
	});
}

function addTabOnDocument(id_inf,tab_name,titulo,contenido,img_url, contacto,redes){
	var obj = createTab(id_inf,tab_name,titulo,contenido,img_url,contacto,redes);
	var tab_ul = $("#tabs .tabs-wrapper").find(".nav-tabs");
	var content = $("#tabs .tabs-wrapper").find(".tab-content");
	content.append(obj.find("li").next())
	tab_ul.append(obj.find("li"));
	tab_ul.append($("#newTabButton"));
}
function editTabOnDocument(id_inf,tab_name,titulo,contenido,img_url,contacto,redes){
	var obj = createTab(id_inf,tab_name,titulo,contenido,img_url,contacto,redes);
	var li = obj.find("li");
	var pane = obj.find("li").next();
	li.addClass("active");
	pane.addClass("in active");
	$($("#editandoTab").find("a").attr("href")).replaceWith(pane);
	$("#editandoTab").replaceWith(li);
}

function removeTabOnDocument(id_inf){
	$.ajax({
		type : 'POST',
		url : '/feitesm-website/php/remove_information.php',
		data : {
			'id_inf' : id_inf
		},
		success : function(msg){
			var jsonObj = jQuery.parseJSON(msg);
			if(jsonObj['success']){
				$("#Tab-" + id_inf).remove();
				$("#editandoTab").remove();
				//activando la priera tab en caso de que haya
				$("#tabs .tabs-wrapper .nav-tabs li").first().addClass("active");
				$("#tabs .tabs-wrapper .tab-content .tab-pane").first().addClass("in active");
			}else{
				bootbox.alert("Error, conexion con base de datos fallida");
			}
		}
	});

}

// edit Tab

function editarTab(){
	$(this).parent().attr("id","editandoTab");
	var id_inf = $(this).attr("href").substring(5);
	var tab_name = $(this).text();
	var pane = $($(this).attr("href"));
	var contacto = pane.find(".contacto").text();
	var redes = pane.find(".redes").text();
	var titulo = pane.find(".titulo").text();
	var contenido = pane.find(".contenido").text();
	var img_url = pane.find("img").attr("src");

	var classesForInputs = {
		'inputs' : '',
		'divs' : ''
	};
	var radios = {
		'radio1' : '',
		'radio2' : '',
		'radio3' : ''
	};
	var imgHid = "";
	if(contacto == 1){
		classesForInputs['divs'] = "hidden";
		radios['radio2'] = 'checked="checked"';
		imgHid = " hidden";
	}else if(redes == 1){
		classesForInputs['divs'] = "hidden";
		radios['radio3'] = 'checked="checked"';
	}else {
		classesForInputs['inputs'] = 'required=""';
		radios['radio1'] = 'checked="checked"';
	}
	$(this).attr("id","editandoStaff");

	bootbox.dialog({
		size : "large",
		title : "Editar Tab",
		closeButton : false,
		message : 
			'<div class="row">' +
				'<div class="col-md-12"> ' +
					'<form class="form-horizontal" onsubmit="return false;">' +
						'<input id="id_inf" type="hidden" value="'+id_inf+'"> ' +
						'<div class="form-group">' +
							'<label class="col-md-4 control-label" for="titulo">Titulo de pestaña</label>' +
							'<div class="col-md-8">' +
								'<input id="tab_name" name="tab_name" type="text" placeholder="¿Quienes somos?" class="form-control input-md" required="" value="'+tab_name+'" >' +
							'</div>' +
						'</div>' +
						'<div class="form-group" id="radio_btns">' +
							'<label class="col-md-4 control-label" for="radios">Tipo de Pestaña</label>' +
							'<div class="col-md-4">' +
								'<div class="radio">' +
									'<label for="radios-0">' +
									'<input type="radio" name="radios" id="radios-0" value="1" '+radios['radio1']+' onchange="checkThis()">' +
									'Información' +
									'</label>' +
								'</div>' +
								'<div class="radio">' +
									'<label for="radios-1">' +
									'<input type="radio" name="radios" id="radios-1" value="2" '+radios['radio2']+' onchange="checkThis()">' +
									'Contacto' +
									'</label>' +
								'</div>' +
								'<div class="radio">' +
									'<label for="radios-2">' +
									'<input type="radio" name="radios" id="radios-2" value="3" '+radios['radio3']+' onchange="checkThis()">' +
									'Redes Sociales' +
									'</label>' +
								'</div>' +
							'</div>' +
						'</div>' +

						'<div class="form-group" '+classesForInputs['divs']+' >' +
							'<label class="col-md-4 control-label" for="titulo">Título</label>' +
							'<div class="col-md-8">' +
								'<input id="titulo" name="titulo" type="text" placeholder="¡Somos HTML!" class="form-control input-md" '+classesForInputs['inputs']+' value="'+titulo+'" >' +
							'</div>' +
						'</div>' +
						'<div class="form-group" '+classesForInputs['divs']+' >' +
							'<label class="col-md-4 control-label" for="contenido">Contenido</label>' +
							'<div class="col-md-8">' +
								'<textarea id="contenido" name="contenido" type="text" placeholder="Somos una organización dedicada a..." class="form-control input-md" '+classesForInputs['inputs']+' >'+contenido+'</textarea>' +
							'</div>' +
						'</div>' +
						'<div class="form-group"'+imgHid+'>' +
							'<label class="col-md-4 control-label" for="img_url">URL de imagen</label>' +
							'<div class="col-md-4">' +
								'<input id="img_url" name="img_url" type="text" placeholder="/feitesm-website/images/default.jpg" class="form-control input-md" onblur="imgPreview()" value="'+img_url+'" >' +
							'</div>' +
							'<img id="img_preview" class="col-md-4" src="'+img_url+'" alt="preview" onError="this.src=\'/feitesm-website/images/default.jpg\'; "/>' +
						'</div>' +
						'<div class="form-group"> ' +
							'<input type="submit" hidden>' +
						'</div> ' +
					'</form>' +
				'</div> ' +
			'</div> ',
		buttons : {
			eliminar : {
				label : "Eliminar Tab",
				className : "btn-warning",
				callback : function(){
					var id_inf = $("#id_inf").val();
					removeTabOnDocument(id_inf);
				}
			},
			cancel : {
				label : "Cancelar",
				className : "btn-danger",
				callback : function(){
					$("#editandoTab").removeAttr("id");
				}
			},
			guardar : {
				label : "Guardar",
				className : "btn-success",
				callback : function(){
					var myForm = $('.form-horizontal')
					if (!myForm[0].checkValidity()) {
						myForm.find(':submit').click()
						return false;
					}
					var selectedVal = $("#radio_btns input:radio:checked").val();
					var id_inf = $("#id_inf").val();
					var tab_name = $("#tab_name").val();
					var titulo = $("#titulo").val();
					var contenido = $("#contenido").val();
					var img_url = $("#img_preview").attr("src");
					var contacto = 0;
					var redes = 0;

					if(2 == selectedVal){// contact
						contacto = 1;
						titulo = "";
						contenido = "";
						img_url = "";
					}else if(3 == selectedVal){//redes
						redes = 1;
						titulo = "";
						contenido = "";
						img_url = "";
					}
					
					$.ajax({
						type : 'POST',
						url : '/feitesm-website/php/actualiza_informacion.php',
						data : {
							'id_inf' : id_inf,
							'tab_name' : tab_name,
							'titulo' : titulo,
							'contenido' : contenido,
							'img_url' : img_url,
							'contacto' : contacto,
							'redes' : redes
						},
						success : function(msg){

							var jsonObj = jQuery.parseJSON(msg);
							if(jsonObj['success']){
								editTabOnDocument(jsonObj['id_inf'],jsonObj['tab_name'],jsonObj['titulo'],jsonObj['contenido'],jsonObj['img_url'],jsonObj['contacto'],jsonObj['redes']);
							}else{
								bootbox.alert("Error con la base de datos: " + jsonObj['message']);
							}
							$(this).attr('id','');
						}
					});
				}
			}
		}
	});
}

//staff admin handler

function imgPreview(){
	$("#img_preview").attr("src",$("#img_url").val());
}

function createStaffObject(nombres, apellido_p,apellido_m,puesto,img_url,id_int){
	var mainDiv;
	if (readCookie('orgName') == "feitesm"){
		mainDiv = $('<div class="col-md-3"></div>');
		var section = $('<div class="section">');
		var pic = $('<div class="pic">');
		var img = $('<img class="img-responsive" alt="Integrante"/>');
		var strongN = $('<strong class="nombres"></strong>');
		var strongAP = $('<strong class="apellido_p"></strong>');
		var strongAM = $('<strong class="apellido_m"></strong>');
		var span =$('<span></span>');

		section.attr("id",id_int);
		img.attr("src",img_url);
		strongN.text(nombres);
		strongAP.text(apellido_p);
		strongAM.text(apellido_m);
		span.text(puesto);

		pic.append(img);
		pic.append(strongN);
		pic.append(" ");
		pic.append(strongAP);
		pic.append(" ");
		pic.append(strongAM);
		pic.append($('<br>'));
		pic.append(span);
		section.append(pic);
		mainDiv.append(section);
		mainDiv.dblclick(editableStaff);
	}

	return mainDiv;
}

function addStaff(){
	bootbox.dialog({
		size : "large",
		title : "Agregar un nuevo Miembro",
		message : 
			'<div class="row">' +
				'<div class="col-md-12"> ' +
					'<form class="form-horizontal" onsubmit="return false;"> ' +
						'<div class="form-group"> ' +
							'<label class="col-md-4 control-label" for="nombres">Nombres</label> ' +
							'<div class="col-md-8"> ' +
								'<input id="nombres" name="nombres" type="text" placeholder="Nombres" class="form-control input-md" required> ' +
								'<span class="help-block">p.e. Mario Alberto.</span>' +
							'</div>' +
						'</div> ' +
						'<div class="form-group"> ' +
							'<label class="col-md-4 control-label" for="apellido_p">Apellido Paterno</label> ' +
							'<div class="col-md-8"> ' +
								'<input id="apellido_p" name="apellido_p" type="text" placeholder="Apellido paterno" class="form-control input-md" required> ' +
								'<span class="help-block">p.e. De La Cruz</span>' +
							'</div>' +
						'</div> ' +
						'<div class="form-group"> ' +
							'<label class="col-md-4 control-label" for="apellido_m">Apellido Materno</label> ' +
							'<div class="col-md-8"> ' +
								'<input id="apellido_m" name="apellido_m" type="text" placeholder="Apellido Materno" class="form-control input-md"> ' +
								'<span class="help-block">p.e. De La Torre </span>' +
							'</div>' +
						'</div> ' +
						'<div class="form-group"> ' +
							'<label class="col-md-4 control-label" for="puesto">Puesto</label> ' +
							'<div class="col-md-8"> ' +
								'<input id="puesto" name="puesto" type="text" placeholder="Cargo" class="form-control input-md" required> ' +
								'<span class="help-block">p.e. Director Consejo de Sociedades de Alumnos</span>' +
							'</div>' +
						'</div> ' +
						'<div class="form-group"> ' +
							'<label class="col-md-4 control-label" for="img_url">URL de imagen</label> ' +
							'<div class="col-md-4"> ' +
								'<input id="img_url" name="img_url" type="text" placeholder="URL imagen" class="form-control input-md" onblur="imgPreview()"> ' +
								'<span class="help-block">p.e. images/foto.jpg </span>' +
							'</div>' +
							'<img id="img_preview" class="col-md-4" src="/feitesm-website/images/default.jpg" alt="preview" onError="this.src=\'/feitesm-website/images/default.jpg\'; ">'+
						'</div> ' +
						'<div class="form-group"> ' +
							'<input type="submit" hidden>' +
						'</div> ' +
					'</form> ' +
				'</div> ' +
			'</div>',
		buttons : {
			danger : {
				label : "Cancelar",
				className : "btn-danger",
				id : "random",
				callback : function(){

				}
			},
			success : {
				label : "Guardar",
				className : "btn-success",
				callback : function(){
					var myForm = $('.form-horizontal')
					if (!myForm[0].checkValidity()) {
						myForm.find(':submit').click()
						return false;
					}
					var nombres = $("#nombres").val();
					var apellido_p = $("#apellido_p").val();
					var apellido_m = $("#apellido_m").val();
					var puesto = $("#puesto").val();
					var img_url = $("#img_preview").attr("src");
					var inThere =  $("#grid-first .container .sections");
					addStaffOnDocument(nombres,apellido_p,apellido_m,puesto,img_url,inThere);
				}
			}
		}
	});
}

// staff edit
function editableStaff(){
	$(this).attr("id","editandoStaff");

	var id_int = $(this).children().attr("id");
	var nombres = $(this).find(".nombres").text();
	var apellido_p = $(this).find(".apellido_p").text();
	var apellido_m = $(this).find(".apellido_m").text();
	var puesto = $(this).find("span").html();
	var img_url = $(this).find("img").attr("src");

	bootbox.dialog({
		size : "large",
		title : "Editar miembro",
		closeButton : false,
		message : 
			'<div class="row"> ' +
				'<div class="col-md-12"> ' +
					'<form class="form-horizontal" onsubmit="return false;"> ' +
						'<input id="id_int" type="hidden" value="'+id_int+'"> ' +
						'<div class="form-group"> ' +
							'<label class="col-md-4 control-label" for="nombres">Nombres</label> ' +
							'<div class="col-md-8"> ' +
								'<input id="nombres" name="nombres" type="text" placeholder="Nombres" class="form-control input-md" value="'+nombres+'" required> ' +
								'<span class="help-block">p.e. Mario Alberto.</span>' +
							'</div>' +
						'</div> ' +
						'<div class="form-group"> ' +
							'<label class="col-md-4 control-label" for="apellido_p">Apellido Paterno</label> ' +
							'<div class="col-md-8"> ' +
								'<input id="apellido_p" name="apellido_p" type="text" placeholder="Apellido paterno" class="form-control input-md" value="'+apellido_p+'" required> ' +
								'<span class="help-block">p.e. De La Cruz</span>' +
							'</div>' +
						'</div> ' +
						'<div class="form-group"> ' +
							'<label class="col-md-4 control-label" for="apellido_m">Apellido Materno</label> ' +
							'<div class="col-md-8"> ' +
								'<input id="apellido_m" name="apellido_m" type="text" placeholder="Apellido Materno" class="form-control input-md" value="'+apellido_m+'"> ' +
								'<span class="help-block">p.e. De La Torre </span>' +
							'</div>' +
						'</div> ' +
						'<div class="form-group"> ' +
							'<label class="col-md-4 control-label" for="puesto">Puesto</label> ' +
							'<div class="col-md-8"> ' +
								'<input id="puesto" name="puesto" type="text" placeholder="Cargo" class="form-control input-md" value="'+puesto+'" required> ' +
								'<span class="help-block">p.e. Director Consejo de Sociedades de Alumnos</span>' +
							'</div>' +
						'</div> ' +
						'<div class="form-group"> ' +
							'<label class="col-md-4 control-label" for="img_url">URL de imagen</label> ' +
							'<div class="col-md-4"> ' +
								'<input id="img_url" name="img_url" type="text" placeholder="URL imagen" class="form-control input-md" onblur="imgPreview()" value="'+img_url+'"> ' +
								'<span class="help-block">p.e. images/foto.jpg </span>' +
							'</div>' +
							'<img id="img_preview" class="col-md-4" src="'+img_url+'" alt="preview"/>'+
						'</div> ' +
						'<div class="form-group"> ' +
							'<input type="submit" hidden/>' +
						'</div> ' +
					'</form> ' +
				'</div> ' +
			'</div>',
		buttons : {
			eliminar : {
				label : "Eliminar miembro",
				className : "btn-warning",
				callback : function(){
					var id_int = $("#id_int").val();
					removeStaffOnDocument(id_int);
				}
			},	
			cancel : {
				label : "Cancelar",
				className : "btn-danger",
				callback : function(){
					$("#editandoStaff").removeAttr("id");
				}
			},
			guardar : {
				label : "Guardar",
				className : "btn-success",
				callback : function(){
					var myForm = $('.form-horizontal')
					if (!myForm[0].checkValidity()) {
						myForm.find(':submit').click()
						return false;
					}
					var id_int = $("#id_int").val();
					var nombres = $("#nombres").val();
					var apellido_p = $("#apellido_p").val();
					var apellido_m = $("#apellido_m").val();
					var puesto = $("#puesto").val();
					var img_url = $("#img_preview").attr("src");
					updateStaffOnDocument(nombres,apellido_p,apellido_m,puesto,img_url,id_int);
				}
			}
		}
	});
}

//Staff database
function addStaffOnDocument(nombres, apellido_p, apellido_m, cargo, img_url,inHere){
	//ajax Stuff
	$.ajax({
		type : 'POST',
		url : '/feitesm-website/php/agrega_integrante.php',
		data : {
			'name_org' : readCookie('orgName'),
			'nombres' : nombres,
			'apellido_p' : apellido_p,
			'apellido_m' : apellido_m,
			'cargo' : cargo,
			'img_url' : img_url
		},
		success : function(response){
			var jsonObj = jQuery.parseJSON(response);
			if(jsonObj['success']){
				//document stuff
				var obj = createStaffObject(jsonObj['nombres'],jsonObj['apellido_p'],jsonObj['apellido_m'],jsonObj['cargo'],jsonObj['img_url'],jsonObj['id_int']);
				inHere.append(obj);
				inHere.append($("#newStaffMember"));
			}else{
				bootbox.alert("Error, conexion con base de datos fallida");
			}
		}
	});
}

function updateStaffOnDocument(nombres, apellido_p,apellido_m,cargo,img_url,id_int){
	$.ajax({
		type : 'POST',
		url : '/feitesm-website/php/actualiza_integrante.php',
		data : {
			'id_int' : id_int,
			'nombres' : nombres,
			'apellido_p' : apellido_p,
			'apellido_m' : apellido_m,
			'cargo' : cargo,
			'img_url' : img_url
		},
		success : function(response){
			var jsonObj = jQuery.parseJSON(response);
			if(jsonObj['success']){
				//document stuff
				var obj = createStaffObject(jsonObj['nombres'],jsonObj['apellido_p'],jsonObj['apellido_m'],jsonObj['cargo'],jsonObj['img_url'],jsonObj['id_int']);
				$("#editandoStaff").replaceWith(obj);
			}else{
				bootbox.alert("Error, conexion con base de datos fallida");
			}
		}
	});
}

function removeStaffOnDocument(id_int){
	//ajax stuff
	$.ajax({
		type : 'POST',
		url : '/feitesm-website/php/elimina_integrante.php',
		data : {
			'id_int' : id_int
		},
		success : function(response){
			var jsonObj = jQuery.parseJSON(response);
			if(jsonObj['success']){
				//document stuff
				$("#editandoStaff").remove();
			}else{
				bootbox.alert("Error, conexion con base de datos fallida");
			}
		}
	});
}

