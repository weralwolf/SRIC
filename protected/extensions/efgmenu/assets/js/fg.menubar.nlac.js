/**
 * source: http://www.yelotofu.com/2008/08/jquery-outerhtml/
 **/

/**
 * Menubar for fg-menu by nlac
 * 
 * fg-menu source: http://www.filamentgroup.com/lab/jquery_ipod_style_and_flyout_menus/
 **/
$.fn.menubar = function(menubarOptions, menuOptions) {
	
	menubarOptions = $.extend(true, {
		menubarItemClass : "ui-widget ui-state-default ui-corner-all ui-button ui-button-text-only"
	}, menubarOptions);
	
	var bVert = (menubarOptions.direction == "vertical"), subMenuIconClass = "ui-icon-triangle-1-s";
	
	menuOptions = $.extend(true, {
		flyOut : true,
		positionOpts : bVert ? {
			posX: 'right', 
			posY: 'top',
			offsetX: 3,
			offsetY: 0,
			directionH: 'right',
			directionV: 'down', 
			detectH: true, // do horizontal collision detection  
			detectV: true, // do vertical collision detection
			linkToFront: false
		}:{
			posX: 'left', 
			posY: 'bottom',
			offsetX: 0,
			offsetY: 3,
			directionH: 'right',
			directionV: 'down', 
			detectH: true, // do horizontal collision detection  
			detectV: true, // do vertical collision detection
			linkToFront: false
		}
	}, menuOptions||{});
	
	
	if (bVert) {		
		subMenuIconClass = "ui-icon-triangle-1-e";
	}

	this.addClass("fg-menubar" + (bVert?" fg-menubar-vert":""));

	for(var i=0,lis=this.find('>li'); i<lis.length; i++) {
		var li = $(lis[i]);
		li.addClass(menubarOptions.menubarItemClass);

		var ul = li.find('>ul');
		var a = li.find('>a').addClass("ui-button-text").css("text-align","left");
		if (!ul.length)
			continue;

		var txt = a.html();
		a.empty()
			.append("<span>"+txt+"</span>")
			.append('<span class="ui-icon ' + subMenuIconClass + '"></span>');

		if (menubarOptions.openOn != "click" && menubarOptions.openOn != "mouseup" && menubarOptions.openOn != "mousedown")
			a[menubarOptions.openOn](function(e){
				Menu.scheduleKillAllMenu(0);
				$(this.parentNode).triggerHandler("click");
			});
		
		li.menu($.extend({}, menuOptions, {
			content : $.outerHTML(ul),
			menuBarElement : 1
		}));

		ul.hide();

	}
	
	return this;
};

$.outerHTML = function(obj) {
	obj = $(obj);
	if (obj.length!=1)
		return "";
	if (obj[0].outerHTML !== undefined)
			return obj[0].outerHTML;
	return $("<div></div>").append( obj.clone(true) ).html();
};
