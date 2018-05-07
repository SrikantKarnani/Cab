/*==========================================================
    Template Name: Pickup Cab Service Template
    Created By: Pxtheme
    Envato Profile: https://themeforest.net/user/govindsaini
    Website: http://pxtheme.com
    Description: Pickup is Fully Responsive Parallax Template with awesome features.
    Version: v1.1
    Support: https://themeforest.net/user/govindsaini
============================================================*/


(function ( $ ) {
 
    $.fn.styleSwitcher = function( options ) {
       
	
	     // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
            color: "#556b2f",
            backgroundColor: "white",
			cssRoot:"assets/style_switcher/css/",
			textureRoot:"assets/style_switcher/textures/",
			textureRoot:"assets/style_switcher/backgrounds/",
			texture:true,
			css : [{ colorCode:"0099ff", cssfile:"blue.css" },
				   { colorCode:"00ff2d", cssfile:"red.css" }]
        }, options );
		
		
			this.append('<div class="colors"><ul></ul></div>');
			for (i=0;i<settings.css.length;i++) { 
			this.find('ul.colors').append('<li><a href="'+settings.css[i]["colorCode"]+'" data-css="'+settings.cssRoot+settings.css[i]["cssfile"]+'"></a></li>'
			
		  ); 
		} 
		
		if(settings.texture == true)
		{
			this.find('ul').after('<div class="textures"><ul></ul></div>')
		}
						
        // Greenify the collection based on the settings variable.
         this.css({
            color: settings.color,
            backgroundColor: settings.backgroundColor,
			
        });
		
        return this;
    };
 
}( jQuery ));