# CSS Crush for Craft CMS

* Author: [Mark Croxton](http://hallmark-design.co.uk/)
* Author of CSS Crush: [Pete Boere](https://github.com/peteboere)

## Version 1.0.0

[CSS Crush](https://github.com/peteboere/css-crush) is an extensible PHP based CSS preprocessor that aims to alleviate many of the hacks and workarounds necessary in modern CSS development.

This plugin is a wrapper for CSS Crush that allows you to use it in [Craft CMS](http://buildwithcraft.com) templates.

## Requirements

* Craft 2.x
* The PHP function `parse_ini_file` is sometimes disabled by web hosts in the php.ini file. CSS Crush requires this function to be enabled.

## Installation

1. Copy the crush folder to `./craft/plugins/`
2. Create a folder 'cache' somewhere in your public webroot and make it writable by PHP, e.g. `/assets/css/cache`
3. Open your craft/config/general.php file, and add `crushOutputDir` to your `environmentVariables` array:

 		'environmentVariables' => array(
    		'crushOutputDir' => '/assets/css/cache'; // webroot-relative path, no trailing slash
		),


## Usage:

This plugin supports most of the [CSS Crush api functions](http://the-echoplex.net/csscrush/#api--functions) and [parameters](http://the-echoplex.net/csscrush/#api--options)


###{{ craft.csscrush.file }}
Process CSS file and return the compiled file URL.

	{{ craft.csscrush.file("/assets/css/style.css") }}

	{# Or pass multiple parameters #}
	{{ craft.csscrush.file({
			'filename' 		: '/_assets/css/style.css',
			'minify' 		: true,
			'vars' 			: {	
								'my_var1' : '#333',
								'my_var2' : '20px'
							  
							  },
			'attributes' 	: {
								'media' : 'print',
								'title' : 'monkey'
							  },
		}) 
	}}

###{{ craft.csscrush.tag }}
Process CSS file and return an HTML link tag with populated href.

	{{ craft.csscrush.tag("/assets/css/style.css") }}

	{# Or pass multiple parameters #}
	{{ craft.csscrush.tag({
			'filename' 		: '/_assets/css/style.css',
			'minify' 		: true,
			'vars' 			: {	
								'my_var1' : '#333',
								'my_var2' : '20px'
							  },
			'attributes' 	: {
								'media' : 'print',
								'title' : 'monkey'
							  },
		}) 
	}}


###{{ craft.csscrush.inline }}
Process CSS file and return CSS as text wrapped in html style tags.

	{{ craft.csscrush.inline("/assets/css/style.css") }}

	{# Or pass multiple parameters #}

	{{ craft.csscrush.inline({
			'filename' 		: '/_assets/css/style.css',
			'minify' 		: true,
			'vars' 			: {	
								'my_var1' : '#333',
								'my_var2' : '20px'
							  },
			'attributes' 	: {
								'media' : 'print',
								'title' : 'monkey'
							  },
		}) 
	}}

###{{ craft.csscrush.string }}
Compile a raw string of CSS string and return it.

	{{ craft.csscrush.string('@set { color-brand: red; } .my-style { color: $(color-brand); }') }}

	{{ craft.csscrush.inline({
			'css' 		: '@set { color-brand: red; } .my-style { color: $(color-brand); }',
			'minify' 	: true,
		}) 
	}}
