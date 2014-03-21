// JavaScript Document
images_directory = "kepek/minta/"; 
XML_file = "flash_slideshow.xml";
slides_display_time = 5;
transition_type = "Fade";
transition_speed = 1.5;
border_thickness = 2;
border_radius = 10;
border_color = "0x990000";
background_display = "full";
pagination_display = "auto";
pagination_margin = 20;
pagination_bullets_margin = 45;
pagination_X = "right";
pagination_Y = "bottom";
pagination_background_color = "0x000000";
pagination_background_alpha = 80;
pagination_bullets_color = "0xffffff";
pagination_bullets_alpha = 40;
pagination_selected_bullet_color = "0xffffff";
pagination_selected_bullet_alpha = 100;
var flashvars = { 
	images_directory: images_directory, 
	XML_file: XML_file, 
	slides_display_time: slides_display_time, 
	transition_type: transition_type, 
	transition_speed: transition_speed, 
	border_thickness: border_thickness, 
	border_radius: border_radius, 
	border_color: border_color, 
	background_display: background_display, 
	pagination_display: pagination_display, 
	pagination_margin: pagination_margin, 
	pagination_bullets_margin: pagination_bullets_margin, 
	pagination_X: pagination_X, 
	pagination_Y: pagination_Y, 
	pagination_background_color: pagination_background_color, 
	pagination_background_alpha: pagination_background_alpha, 
	pagination_bullets_color: pagination_bullets_color, 
	pagination_bullets_alpha: pagination_bullets_alpha, 
	pagination_selected_bullet_color: pagination_selected_bullet_color, 
	pagination_selected_bullet_alpha: pagination_selected_bullet_alpha 
};
var params = {
  allowFullScreen: "true", 
  menu: "false", 
  wmode: "transparent" 
};
var attributes = {
  id: "swf_content", 
  name: "swf_content", 
  wmode: "transparent" 
};

swfobject.embedSWF("flash_slideshow.swf", "swf_content", "100%", "100%", "10.0.0", "expressInstall.swf", flashvars, params, attributes);