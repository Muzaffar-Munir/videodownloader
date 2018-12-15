/*
 * =======================
 * RightClickMenu - jQuery Plugin
 * =======================
 * Author: Walmik Deshpande (http://walmik.com)
 * Depends on:		jquery
 * 
 * --------
 * Summary:
 * --------
 * Assign a HTML element as the right click menu for another HTML element
 * 
 * ------
 * Usage:
 * ------
 * $('#box').rightClickMenu('#menu');
 */
(function($){

	var RightClickMenu = function(element, menu) {
		//en-cache
		this.$el = $(element);
		this.$menu = $(menu);
		//initialize
		this.init();
	}

	RightClickMenu.prototype.init = function() {
		//hide the right click menu item in case it isnt hidden
		this.$menu.hide();
		this.$menu.css('position', 'absolute')
		//bind the current element's contextmenu event(right click menu) to the html element assigned for it
		var self = this;
		this.$el.on('contextmenu', function(e){
			//set its position to the mouse position on the apge
	   	self.$menu.css('left', e.pageX + 'px');
	   	self.$menu.css('top', e.pageY + 'px');
	   	self.$menu.show();
	   	e.preventDefault();
	   	return false;
		});

		//hide right click menu if clicked anywhere on the page...
		$('html').on('click', function(e){
		  self.$menu.hide();
		});

		//...but dont hide the menu if it itself was clicked
		this.$menu.on('click', function(e){
		  e.stopPropagation();
		});

		//as an added measure, hide the right click menu in case the window was resized
		//this will avoid the possible awkward positon of the absolutely positioned menu element
		$(window).on('resize', function() {
		  self.$menu.hide();
		});
	}
	

	///////////////////////////////////////////////////
	///////////////INITIALIZE THE PLUGIN///////////////
	$.fn.rightClickMenu = function(menu) {
		return this.each(function() {
			new RightClickMenu(this, menu);
		});
	}
	////////////////////////////////////////////////////
	////////////////////////////////////////////////////

})(jQuery);