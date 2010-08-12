function create_menu(basepath)
{
	var base = (basepath == 'null') ? '' : basepath;

	document.write(
		'<table cellpadding="0" cellspaceing="0" border="0" style="width:98%"><tr>' +
		'<td class="td" valign="top">' +

		'<ul>' +
		'<li><a href="'+base+'index.html">User Guide Home</a></li>' +	
		'<li><a href="'+base+'toc.html">Table of Contents Page</a></li>' +
		'</ul>' +	

		'<h3>Basic Info</h3>' +
		'<ul>' +
			'<li><a href="'+base+'general/requirements.html">Requirements</a></li>' +
			'<li><a href="'+base+'license.html">License Agreement</a></li>' +
			'<li><a href="'+base+'changelog.html">Change Log</a></li>' +
			'<li><a href="'+base+'general/credits.html">Credits</a></li>' +
		'</ul>' +	
		
		'<h3>Installation</h3>' +
		'<ul>' +
			'<li><a href="'+base+'installation/downloads.html">Downloading PHP Blasty</a></li>' +
			'<li><a href="'+base+'installation/index.html">Installation Instructions</a></li>' +
			'<li><a href="'+base+'installation/upgrading.html">Upgrading from a Previous Version</a></li>' +
			'<li><a href="'+base+'installation/troubleshooting.html">Troubleshooting</a></li>' +
		'</ul>' +
		
		'</td><td class="td_sep" valign="top">' +

		'<h3>Introduction</h3>' +
		'<ul>' +
			'<li><a href="'+base+'overview/getting_started.html">Getting Started</a></li>' +
			'<li><a href="'+base+'overview/at_a_glance.html">PHP Blasty at a glance</a></li>' +
		'</ul>' +	

		'<h3>General Topics</h3>' +
		'<ul>' +
			'<li><a href="'+base+'general/blasty.html">Blasty Class</a></li>' +
			'<li><a href="'+base+'general/phpblasty.html">PHP Blasty static Class</a></li>' +
			'<li><a href="'+base+'general/page_render.html">Render pages with YUI components</a></li>' +
			'<li><a href="'+base+'general/yuiloader.html">Loading a YUI component</a></li>' +
			'<li><a href="'+base+'general/reserved_names.html">Reserved names</a></li>' +
			'<li><a href="'+base+'general/stylecoding.html">PHP coding style used</a></li>' +
		'</ul>' +
		
		'<h3>Common function reference</h3>' +
		'<ul>' +
			'<li><a href="'+base+'general/widget_reference.html">Widget function reference</a></li>' +
			'<li><a href="'+base+'general/utility_reference.html">Utility function reference</a></li>' +
		'</ul>' +

		'</td><td class="td_sep" valign="top">' +

		'<h3>PHP Blasty Widgets Reference</h3>' +
		'<ul>' +
      '<li><a href="'+base+'components/autocomplete.html">AutoComplete</a></li>' +
      '<li><a href="'+base+'components/button.html" class="tbd">Button</a></li>' +
      '<li><a href="'+base+'components/calendar.html">Calendar</a></li>' +
      '<li><a href="'+base+'components/carousel.html" class="tbd">Carousel</a></li>' +
      '<li><a href="'+base+'components/charts.html" class="tbd">Charts</a></li>' +
      '<li><a href="'+base+'components/colorpicker.html" class="tbd">Color Picker</a></li>' +
      '<li><a href="'+base+'components/container.html" class="tbd">Container</a></li>' +
      '<li><a href="'+base+'components/containercore.html" class="tbd">Container Core</a></li>' +
      '<li><a href="'+base+'components/datatable.html">DataTable</a></li>' +
      '<li><a href="'+base+'components/editor.html" class="tbd">Rich Text Editor</a></li>' +
      '<li><a href="'+base+'components/imagecropper.html" class="tbd">ImageCropper</a></li>' +
      '<li><a href="'+base+'components/layout.html" class="tbd">Layout Manager</a></li>' +
      '<li><a href="'+base+'components/menu.html" class="tbd">Menu</a></li>' +
      '<li><a href="'+base+'components/paginator.html" class="tbd">Paginator</a></li>' +
      '<li><a href="'+base+'components/profiler.html" class="tbd">Profiler</a></li>' +
      '<li><a href="'+base+'components/profilerview.html" class="tbd">Profiler view</a></li>' +
      '<li><a href="'+base+'components/progressbar.html" class="tbd">Progress Bar</a></li>' +
      '<li><a href="'+base+'components/slider.html" class="tbd">Slider</a></li>' +
      '<li><a href="'+base+'components/tabview.html" class="tbd">TabView</a></li>' +
      '<li><a href="'+base+'components/treeview.html" class="tbd">TreeView</a></li>' +
      '<li><a href="'+base+'components/uploader.html" class="tbd">Uploader</a></li>' +
    '</ul>' +

    '</td><td class="td_sep" valign="top">' +

		'<h3>PHP Blasty Utility Reference</h3>' +
		'<ul>' +
      '<li><a href="'+base+'components/animation.html">Animation</a></li>' +
      '<li><a href="'+base+'components/connection.html" class="tbd">Connection Manager</a></li>' +
      '<li><a href="'+base+'components/cookie.html" class="tbd">Cookie</a></li>' +
      '<li><a href="'+base+'components/datasource.html">Data Source</a></li>' +
      '<li><a href="'+base+'components/dom.html" class="tbd">DOM Collection</a></li>' +
      '<li><a href="'+base+'components/dragdrop.html">Drag and Drop</a></li>' +
      '<li><a href="'+base+'components/element.html" class="tbd">Element</a></li>' +
      '<li><a href="'+base+'components/event.html" class="tbd">Event</a></li>' +
      '<li><a href="'+base+'components/font.html" class="tbd">Fonts</a></li>' +
      '<li><a href="'+base+'components/get.html" class="tbd">Get</a></li>' +
      '<li><a href="'+base+'components/grids.html" class="tbd">Grids</a></li>' +
      '<li><a href="'+base+'components/history.html" class="tbd">Browser History</a></li>' +
      '<li><a href="'+base+'components/imageloader.html" class="tbd">ImageLoader</a></li>' +
      '<li><a href="'+base+'components/json.html" class="tbd">JSON</a></li>' +
      '<li><a href="'+base+'components/logger.html" class="tbd">Logger</a></li>' +
      '<li><a href="'+base+'components/reset.html" class="tbd">Reset</a></li>' +
      '<li><a href="'+base+'components/resize.html" class="tbd">Resize</a></li>' +
      '<li><a href="'+base+'components/selector.html" class="tbd">Selector</a></li>' +
      '<li><a href="'+base+'components/storage.html" class="tbd">Storage</a></li>' +
      '<li><a href="'+base+'components/swf.html" class="tbd">SWF</a></li>' +
      '<li><a href="'+base+'components/swfstore.html" class="tbd">SWFStore</a></li>' +
      '<li><a href="'+base+'components/yahoo.html" class="tbd">Yahoo</a></li>' +
      '<li><a href="'+base+'components/yuiloader.html" class="tbd">yuiloader</a></li>' +
      '<li><a href="'+base+'components/yuitest.html" class="tbd">yuitest</a></li>' +
		'</ul>' +
				
		'</td></tr></table>');
}