<?php namespace Craft;

/**
 * CSS Crush by Mark Croxton
 *
 * @author     	Mark Croxton <http://hallmark-design.co.uk>
 * @package    	Css Crush
 * @since		Craft 2.5
 * @copyright 	Copyright (c) 2015, Mark Croxton
 * @license 	http://opensource.org/licenses/mit-license.php MIT License
 * @link       	http://github.com/croxton/CSS-Crush-Craft
 */

class CssCrushVariable
{
	/**
	 * {{ craft.csscrush.file() }} variable tag
	 * Process CSS file and return the compiled file URL
	 *
	 * @param Array $params
	 * @return String
	 */
	public function file($params = array())
	{
		/* Example usage:
		{{ craft.csscrush.file("/assets/css/style.css") }}

		OR

		{{ craft.csscrush.file({
				'filename' 		: '/_assets/css/style.css',
				'minify' 		: 'y',
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
		*/
		if ( is_string($params)) 
		{
			$params = array(
				'filename' => $params
			);
		}
		return $this->_run(__FUNCTION__, $params);
	}

	/**
	 * {{ craft.csscrush.tag() }} variable tag
	 * Process CSS file and return an HTML link tag with populated href
	 *
	 * @param Array $params
	 * @return String
	 */
	public function tag($params = array())
	{
		/* Example usage:
		{{ craft.csscrush.tag("/assets/css/style.css") }}

		OR

		{{ craft.csscrush.tag({
				'filename' 		: '/_assets/css/style.css',
				'minify' 		: 'y',
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
		*/
	
		if ( is_string($params)) 
		{
			$params = array(
				'filename' => $params
			);
		}
		return $this->_run(__FUNCTION__, $params);
	}

	/**
	 * {{ craft.csscrush.inline() }} variable tag
	 * Process CSS file and return CSS as text wrapped in html style tags
	 *
	 * @param Array $params
	 * @return String
	 */
	public function inline($params = array())
	{
		/* Example usage:
		{{ craft.csscrush.inline("/assets/css/style.css") }}

		OR

		{{ craft.csscrush.inline({
				'filename' 		: '/_assets/css/style.css',
				'minify' 		: 'y',
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
		*/
	
		if ( is_string($params)) 
		{
			$params = array(
				'filename' => $params
			);
		}
		return $this->_run(__FUNCTION__, $params);
	}

	/**
	 * {{ craft.csscrush.string() }} variable tag
	 * Compile a raw string of CSS string and return it
	 *
	 * @param Array $params
	 * @return String
	 */
	public function string($params = array())
	{
		/* Example usage:
		{{ craft.csscrush.string('@set { color-brand: red; } .my-style { color: $(color-brand); }') }}

		{{ craft.csscrush.inline({
				'css' 		: '@set { color-brand: red; } .my-style { color: $(color-brand); }',
				'minify' 	: 'y',
			}) 
		}}
		*/
	
		if ( is_string($params)) 
		{
			$params = array(
				'css' => $params
			);
		}
		return $this->_run(__FUNCTION__, $params);
	}

	/**
	 * Run variable tags
	 *
	 * @param String $method
	 * @param Array $params
	 * @return String
	 */
	protected function _run($method, $params = array())
	{
		CssCrushPlugin::log(Craft::t('CssCrushVariable::' . $method . '() is being run now.'));

		// register parameters
		craft()->cssCrush->setParams($params);

		// generate output
		$html = craft()->cssCrush->{$method}($params);

		return craft()->cssCrush->makeTwigMarkupFromHtml($html);
	}
}