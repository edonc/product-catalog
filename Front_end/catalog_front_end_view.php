<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function front_end_catalog($images, $paramssld, $paramssld3, $catalog)
{
 ob_start();
	$catalogID=$catalog[0]->id;
	$catalogtitle=$catalog[0]->name;
	$catalogheight=$catalog[0]->sl_height;
	$catalogwidth=$catalog[0]->sl_width;
	$catalogeffect=$catalog[0]->catalog_list_effects_s;
	$slidepausetime=((int)$catalog[0]->description+(int)$catalog[0]->param);
	$catalogpauseonhover=$catalog[0]->pause_on_hover;
	$catalogposition=$catalog[0]->sl_position;
    $catalogcountinpage = ($catalog[0]->count_into_page) ? $catalog[0]->count_into_page : 999;
	$slidechangespeed=$catalog[0]->param;
        $catalogCats=$catalog[0]->categories;
        $catalogShowSorting=$catalog[0]->ht_show_sorting;
        $catalogShowFiltering=$catalog[0]->ht_show_filtering;
        $catalogSearch=$catalog[0]->catalog_search;
		$myAllImages = count($images);

        global $wpdb;

        ///////////////////Catalog sorting and floatinf not existing variables////////////////
        if ($paramssld==null) $paramssld=array();

        $paramssld["ht_view0_sorting_float"] = "left";
        $paramssld["ht_view1_sorting_float"] = "left";
        $paramssld["ht_view2_sorting_float"] = "left";
        $paramssld["ht_view3_sorting_float"] = "left";
        $paramssld["ht_view0_filtering_float"] = "left";
        $paramssld["ht_view1_filtering_float"] = "left";
        $paramssld["ht_view2_filtering_float"] = "left";
        $paramssld["ht_view3_filtering_float"] = "left";
        $sorting_block_width = "100%";
        $filtering_block_width = "100%";
        $paramssld["ht_view0_sorting_float"] = "left";
        $paramssld["ht_view1_sorting_float"] = "left";
        $paramssld["ht_view2_sorting_float"] = "left";
        $paramssld["ht_view3_sorting_float"] = "left";
        $paramssld["ht_view0_filtering_float"] = "left";
        $paramssld["ht_view1_filtering_float"] = "left";
        $paramssld["ht_view2_filtering_float"] = "left";
        $paramssld["ht_view3_filtering_float"] = "left";
        $paramssld["ht_view0_show_sorting"] = "on";
        $paramssld["ht_view1_show_sorting"] = "on";
        $paramssld["ht_view2_show_sorting"] = "on";
        $paramssld["ht_view3_show_sorting"] = "on";
        $paramssld["ht_view0_show_filtering"] = "on";
        $paramssld["ht_view1_show_filtering"] = "on";
        $paramssld["ht_view2_show_filtering"] = "on";
        $paramssld["ht_view3_show_filtering"] = "on";
        $paramssld["ht_view0_sortbutton_border_radius"] = "3px";
        $paramssld["ht_view1_sortbutton_border_radius"] = "3px";
        $paramssld["ht_view2_sortbutton_border_radius"] = "3px";
        $paramssld["ht_view3_sortbutton_border_radius"] = "3px";
        $left_to_top = "ok";
        $paramssld["ht_view0_sortbutton_font_size"] = "12px";
        $paramssld["ht_view1_sortbutton_font_size"] = "12px";
        $paramssld["ht_view2_sortbutton_font_size"] = "12px";
        $paramssld["ht_view3_sortbutton_font_size"] = "12px";
        $paramssld["ht_view0_sortbutton_font_color"] = "#000";
        $paramssld["ht_view1_sortbutton_font_color"] = "#000";
        $paramssld["ht_view2_sortbutton_font_color"] = "#000";
        $paramssld["ht_view3_sortbutton_font_color"] = "#000";
        $paramssld["ht_view0_sortbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view1_sortbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view2_sortbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view3_sortbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view0_filterbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view1_filterbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view2_filterbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view3_filterbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view0_filterbutton_hover_font_color"] = "#000";
        $paramssld["ht_view1_filterbutton_hover_font_color"] = "#000";
        $paramssld["ht_view2_filterbutton_hover_font_color"] = "#000";
        $paramssld["ht_view3_filterbutton_hover_font_color"] = "#000";
        $paramssld["ht_view0_sortbutton_hover_font_color"] = "#000";
        $paramssld["ht_view1_sortbutton_hover_font_color"] = "#000";
        $paramssld["ht_view2_sortbutton_hover_font_color"] = "#000";
        $paramssld["ht_view3_sortbutton_hover_font_color"] = "#000";
        $paramssld["ht_view3_filterbutton_hover_font_color"] = "#000";
        $paramssld["ht_view0_sortbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view1_sortbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view2_sortbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view3_sortbutton_hover_background_color"] = "#fff";
        $paramssld["ht_view0_sortbutton_background_color"] = "#fff";
        $paramssld["ht_view1_sortbutton_background_color"] = "#fff";
        $paramssld["ht_view2_sortbutton_background_color"] = "#fff";
        $paramssld["ht_view3_sortbutton_background_color"] = "#fff";
        $paramssld["ht_view0_filterbutton_font_size"] = "12px";
        $paramssld["ht_view1_filterbutton_font_size"] = "12px";
        $paramssld["ht_view2_filterbutton_font_size"] = "12px";
        $paramssld["ht_view3_filterbutton_font_size"] = "12px";
        $paramssld["ht_view0_filterbutton_font_color"] = "#000";
        $paramssld["ht_view1_filterbutton_font_color"] = "#000";
        $paramssld["ht_view2_filterbutton_font_color"] = "#000";
        $paramssld["ht_view3_filterbutton_font_color"] = "#000";
        $paramssld["ht_view0_filterbutton_background_color"] = "#fff";
        $paramssld["ht_view1_filterbutton_background_color"] = "#fff";
        $paramssld["ht_view2_filterbutton_background_color"] = "#fff";
        $paramssld["ht_view3_filterbutton_background_color"] = "#fff";
        $paramssld["ht_view0_filterbutton_border_radius"] = "3px";
        $paramssld["ht_view1_filterbutton_border_radius"] = "3px";
        $paramssld["ht_view2_filterbutton_border_radius"] = "3px";
        $paramssld["ht_view3_filterbutton_border_radius"] = "3px";
        $width_middle = "10px";

        //////////////////////////////////////////////////////////////////////////////////////


        $paramssld["ht_view0_border_width"] = "0";
        $paramssld["ht_view0_togglebutton_style"] = "dark";
        $paramssld["ht_view0_show_separator_lines"] = "on";
        $paramssld["ht_view0_linkbutton_text"] = "View Product";
        $paramssld["ht_view0_show_linkbutton"] = "on";
        $paramssld["ht_view0_linkbutton_background_hover_color"] = "df2e1b";
        $paramssld["ht_view0_linkbutton_background_color"] = "e74c3c";
        $paramssld["ht_view0_linkbutton_font_hover_color"] = "ffffff";
        $paramssld["ht_view0_linkbutton_color"] = "ffffff";
        $paramssld["ht_view0_linkbutton_font_size"] = "14";
        $paramssld["ht_view0_description_color"] = "5b5b5b";
        $paramssld["ht_view0_description_font_size"] = "14";
        $paramssld["ht_view0_show_description"] = "on";
        $paramssld["ht_view0_thumbs_width"] = "75";
        $paramssld["ht_view0_thumbs_position"] = "before";
        $paramssld["ht_view0_show_thumbs"] = "on";
        $paramssld["ht_view0_title_font_size"] = "15";
        $paramssld["ht_view0_title_font_color"] = "555555";
        $paramssld["ht_view0_element_border_width"] = "1";
        $paramssld["ht_view0_element_border_color"] = "D0D0D0";
        $paramssld["ht_view0_element_background_color"] = "f7f7f7";
        $paramssld["ht_view0_block_width"] = "275";
        $paramssld["ht_view0_block_height"] = "275";

        $paramssld["ht_view1_show_separator_lines"] = "on";
        $paramssld["ht_view1_linkbutton_text"] = "View Product";
        $paramssld["ht_view1_show_linkbutton"] = "on";
        $paramssld["ht_view1_linkbutton_background_hover_color"] = "df2e1b";
        $paramssld["ht_view1_linkbutton_background_color"] = "e74c3c";
        $paramssld["ht_view1_linkbutton_font_hover_color"] = "ffffff";
        $paramssld["ht_view1_linkbutton_color"] = "ffffff";
        $paramssld["ht_view1_linkbutton_font_size"] = "14";
        $paramssld["ht_view1_description_color"] = "5b5b5b";
        $paramssld["ht_view1_description_font_size"] = "14";
        $paramssld["ht_view1_show_description"] = "on";
        $paramssld["ht_view1_thumbs_width"] = "75";
        $paramssld["ht_view1_thumbs_position"] = "before";
        $paramssld["ht_view1_show_thumbs"] = "on";
        $paramssld["ht_view1_title_font_size"] = "15";
        $paramssld["ht_view1_title_font_color"] = "555555";
        $paramssld["ht_view1_element_border_width"] = "1";
        $paramssld["ht_view1_element_border_color"] = "D0D0D0";
        $paramssld["ht_view1_element_background_color"] = "f7f7f7";
        $paramssld["ht_view1_block_width"] = "275";
        $paramssld["ht_view2_element_linkbutton_text"] = "View Product";
        $paramssld["ht_view2_element_show_linkbutton"] = "on";
        $paramssld["ht_view2_element_linkbutton_color"] = "ffffff";
        $paramssld["ht_view2_element_linkbutton_font_size"] = "14";
        $paramssld["ht_view2_element_linkbutton_background_color"] = "2ea2cd";
        $paramssld["ht_view2_show_popup_linkbutton"] = "on";
        $paramssld["ht_view2_popup_linkbutton_text"] = "View Product";
        $paramssld["ht_view2_popup_linkbutton_background_hover_color"] = "0074a2";
        $paramssld["ht_view2_popup_linkbutton_background_color"] = "2ea2cd";
        $paramssld["ht_view2_popup_linkbutton_font_hover_color"] = "ffffff";
        $paramssld["ht_view2_popup_linkbutton_color"] = "ffffff";
        $paramssld["ht_view2_popup_linkbutton_font_size"] = "14";
        $paramssld["ht_view2_description_color"] = "222222";
        $paramssld["ht_view2_description_font_size"] = "14";
        $paramssld["ht_view2_show_description"] = "on";
        $paramssld["ht_view2_thumbs_width"] = "75";
        $paramssld["ht_view2_thumbs_height"] = "75";
        $paramssld["ht_view2_thumbs_position"] = "before";
        $paramssld["ht_view2_show_thumbs"] = "on";
        $paramssld["ht_view2_popup_background_color"] = "FFFFFF";
        $paramssld["ht_view2_popup_overlay_color"] = "000000";
        $paramssld["ht_view2_popup_overlay_transparency_color"] = "70";
        $paramssld["ht_view2_popup_closebutton_style"] = "dark";
        $paramssld["ht_view2_show_separator_lines"] = "on";
        $paramssld["ht_view2_show_popup_title"] = "on";
        $paramssld["ht_view2_element_title_font_size"] = "18";
        $paramssld["ht_view2_element_title_font_color"] = "222222";
        $paramssld["ht_view2_popup_title_font_size"] = "18";
        $paramssld["ht_view2_popup_title_font_color"] = "222222";
        $paramssld["ht_view2_element_overlay_color"] = "FFFFFF";
        $paramssld["ht_view2_element_overlay_transparency"] = "70";
        $paramssld["ht_view2_zoombutton_style"] = "light";
        $paramssld["ht_view2_element_border_width"] = "1";
        $paramssld["ht_view2_element_border_color"] = "dedede";
        $paramssld["ht_view2_element_background_color"] = "f9f9f9";
        $paramssld["ht_view2_element_width"] = "275";
        $paramssld["ht_view2_element_height"] = "275";

        $paramssld["ht_view3_show_separator_lines"] = "on";
        $paramssld["ht_view3_linkbutton_text"] = "View Product";
        $paramssld["ht_view3_show_linkbutton"] = "on";
        $paramssld["ht_view3_linkbutton_background_hover_color"] = "0074a2";
        $paramssld["ht_view3_linkbutton_background_color"] = "2ea2cd";
        $paramssld["ht_view3_linkbutton_font_hover_color"] = "ffffff";
        $paramssld["ht_view3_linkbutton_color"] = "ffffff";
        $paramssld["ht_view3_linkbutton_font_size"] = "14";
        $paramssld["ht_view3_description_color"] = "555555";
        $paramssld["ht_view3_description_font_size"] = "14";
        $paramssld["ht_view3_show_description"] = "on";
        $paramssld["ht_view3_thumbs_width"] = "75";
        $paramssld["ht_view3_thumbs_height"] = "75";
        $paramssld["ht_view3_show_thumbs"] = "on";
        $paramssld["ht_view3_title_font_size"] = "18";
        $paramssld["ht_view3_title_font_color"] = "0074a2";
        $paramssld["ht_view3_mainimage_width"] = "240";
        $paramssld["ht_view3_element_border_width"] = "1";
        $paramssld["ht_view3_element_border_color"] = "dedede";
        $paramssld["ht_view3_element_background_color"] = "f9f9f9";

        $paramssld["ht_view5_icons_style"] = "dark";
        $paramssld["ht_view5_show_separator_lines"] = "on";
        $paramssld["ht_view5_linkbutton_text"] = "View Product";
        $paramssld["ht_view5_show_linkbutton"] = "on";
        $paramssld["ht_view5_linkbutton_background_hover_color"] = "0074a2";
        $paramssld["ht_view5_linkbutton_background_color"] = "2ea2cd";
        $paramssld["ht_view5_linkbutton_font_hover_color"] = "ffffff";
        $paramssld["ht_view5_linkbutton_color"] = "ffffff";
        $paramssld["ht_view5_linkbutton_font_size"] = "14";
        $paramssld["ht_view5_description_color"] = "555555";
        $paramssld["ht_view5_description_font_size"] = "14";
        $paramssld["ht_view5_show_description"] = "on";
        $paramssld["ht_view5_thumbs_width"] = "75";
        $paramssld["ht_view5_thumbs_height"] = "75";
        $paramssld["ht_view5_show_thumbs"] = "on";
        $paramssld["ht_view5_title_font_size"] = "16";
        $paramssld["ht_view5_title_font_color"] = "0074a2";
        $paramssld["ht_view5_main_image_width"] = "275";
        $paramssld["ht_view5_slider_tabs_font_color"] = "d9d99";
        $paramssld["ht_view5_slider_tabs_background_color"] = "555555";
        $paramssld["ht_view5_slider_background_color"] = "f9f9f9";

        $paramssld["ht_view6_title_font_size"] = "16";
        $paramssld["ht_view6_title_font_color"] = "0074A2";
        $paramssld["ht_view6_title_font_hover_color"] = "2EA2CD";
        $paramssld["ht_view6_title_background_color"] = "000000";
        $paramssld["ht_view6_title_background_transparency"] = "80";
        $paramssld["ht_view6_border_radius"] = "3";
        $paramssld["ht_view6_border_width"] = "0";
        $paramssld["ht_view6_border_color"] = "eeeeee";
        $paramssld["ht_view6_width"] = "275";

        $paramssld["light_box_size"] = "17";
        $paramssld["light_box_width"] = "500";
        $paramssld["light_box_transition"] = "elastic";
        $paramssld["light_box_speed"] = "800";
        $paramssld["light_box_href"] = "False";
        $paramssld["light_box_title"] = "false";
        $paramssld["light_box_scalephotos"] = "true";
        $paramssld["light_box_rel"] = "false";
        $paramssld["light_box_scrolling"] = "false";
        $paramssld["light_box_opacity"] = "20";
        $paramssld["light_box_open"] = "false";
        $paramssld["light_box_overlayclose"] = "true";
        $paramssld["light_box_esckey"] = "false";
        $paramssld["light_box_arrowkey"] = "false";
        $paramssld["light_box_loop"] = "true";
        $paramssld["light_box_data"] = "false";
        $paramssld["light_box_classname"] = "false";
        $paramssld["light_box_fadeout"] = "300";
        $paramssld["light_box_closebutton"] = "false";
        $paramssld["light_box_current"] = "image";
        $paramssld["light_box_previous"] = "previous";
        $paramssld["light_box_next"] = "next";
        $paramssld["light_box_close"] = "close";
        $paramssld["light_box_iframe"] = "false";
        $paramssld["light_box_inline"] = "false";
        $paramssld["light_box_html"] = "false";
        $paramssld["light_box_photo"] = "false";
        $paramssld["light_box_height"] = "500";
        $paramssld["light_box_innerwidth"] = "false";
        $paramssld["light_box_innerheight"] = "false";
        $paramssld["light_box_initialwidth"] = "300";
        $paramssld["light_box_initialheight"] = "100";
        $paramssld["light_box_maxwidth"] = "768";
        $paramssld["light_box_maxheight"] = "500";
        $paramssld["light_box_slideshow"] = "false";
        $paramssld["light_box_slideshowspeed"] = "2500";
        $paramssld["light_box_slideshowauto"] = "true";
        $paramssld["light_box_slideshowstart"] = "start slideshow";
        $paramssld["light_box_slideshowstop"] = "stop slideshow";
        $paramssld["light_box_fixed"] = "true";
        $paramssld["light_box_top"] = "false";
        $paramssld["light_box_bottom"] = "false";
        $paramssld["light_box_left"] = "false";
        $paramssld["light_box_right"] = "false";
        $paramssld["light_box_reposition"] = "false";
        $paramssld["light_box_retinaimage"] = "true";
        $paramssld["light_box_retinaurl"] = "false";
        $paramssld["light_box_retinasuffix"] = "@2x.$1";
        $paramssld["light_box_returnfocus"] = "true";
        $paramssld["light_box_trapfocus"] = "true";
        $paramssld["light_box_fastiframe"] = "true";
        $paramssld["light_box_preloading"] = "true";
        $paramssld["slider_title_position"] = "5";
        $paramssld["light_box_style"] = "1";
        $paramssld["light_box_size_fix"] = "false";

        $paramssld["ht_view2_popup_full_width"] = "on";
        $paramssld["ht_view0_price_text"] = "Price";
        $paramssld["ht_view1_price_text"] = "Price";
        $paramssld["ht_view2_price_text"] = "Price";
        $paramssld["ht_view3_price_text"] = "Price";
        $paramssld["ht_view5_price_text"] = "Price";

        $paramssld["ht_catalog_view0_show_price"] = "on";
        $paramssld["ht_catalog_view0_price_font_size"] = "15";
        $paramssld["ht_catalog_view0_price_font_color"] = "e74c3c";
        $paramssld["ht_catalog_view0_market_price_font_size"] = "15";
        $paramssld["ht_catalog_view0_market_price_font_color"] = "000000";
        $paramssld["ht_catalog_view1_show_price"] = "on";
        $paramssld["ht_catalog_view1_price_font_size"] = "15";
        $paramssld["ht_catalog_view1_price_font_color"] = "e74c3c";
        $paramssld["ht_catalog_view1_market_price_font_size"] = "15";
        $paramssld["ht_catalog_view1_market_price_font_color"] = "000000";
        $paramssld["ht_catalog_view2_show_price"] = "on";
        $paramssld["ht_catalog_view2_price_font_size"] = "15";
        $paramssld["ht_catalog_view2_price_font_color"] = "e74c3c";
        $paramssld["ht_catalog_view2_market_price_font_size"] = "15";
        $paramssld["ht_catalog_view2_market_price_font_color"] = "000000";
        $paramssld["ht_catalog_view3_show_price"] = "on";
        $paramssld["ht_catalog_view3_price_font_size"] = "15";
        $paramssld["ht_catalog_view3_price_font_color"] = "0074a2";
        $paramssld["ht_catalog_view3_market_price_font_size"] = "15";
        $paramssld["ht_catalog_view3_market_price_font_color"] = "000000";
        $paramssld["ht_catalog_view5_show_price"] = "on";
        $paramssld["ht_catalog_view5_price_font_size"] = "15";
        $paramssld["ht_catalog_view5_price_font_color"] = "0074a2";
        $paramssld["ht_catalog_view5_market_price_font_size"] = "15";
        $paramssld["ht_catalog_view5_market_price_font_color"] = "000000";


        $paramssld["ht_catalog_zoom_window_type"] = "window";
        $paramssld["ht_catalog_zoom_window_width"] = "300";
        $paramssld["ht_catalog_zoom_window_height"] = "200";
        $paramssld["ht_catalog_zoom_x_asis"] = "0";
        $paramssld["ht_catalog_zoom_y_asis"] = "200";
        $paramssld["ht_catalog_zoom_window_position"] = "16";
        $paramssld["ht_catalog_zoom_window_border_size"] = "0";
        $paramssld["ht_catalog_zoom_window_border_color"] = "#000";
        $paramssld["ht_catalog_zoom_window_lens_size"] = "200";
        $paramssld["ht_catalog_zoom_window_fadein"] = "200";
        $paramssld["ht_catalog_zoom_window_fadeout"] = "200";
        $paramssld["ht_catalog_zoom_lens_fadein"] = "200";
        $paramssld["ht_catalog_zoom_lens_fadeout"] = "200";
        $paramssld["ht_catalog_zoom_lens_hide"] = "false";
        $paramssld["ht_catalog_zoom_lens_shape"] = "square";
        $paramssld["ht_catalog_zoom_lens_color"] = "fff";
        $paramssld["ht_catalog_zoom_lens_opacity"] = "40";
        $paramssld["ht_catalog_zoom_cursor"] = "crosshair";
        $paramssld["ht_catalog_zoom_scrollzoom"] = "true";
        $paramssld["ht_catalog_zoom_easing"] = "true";
        $paramssld["ht_catalog_zoom_lens_size_fix"] = "false";
        $paramssld["ht_catalog_zoom_lens_height"] = "100";
        $paramssld["ht_catalog_zoom_lens_width"] = "100";
        $paramssld["ht_catalog_zoom_tint"] = "false";
        $paramssld["ht_catalog_zoom_tint_colour"] = "#fff";
        $paramssld["ht_catalog_zoom_tint_opacity"] = "40";
        $paramssld["ht_catalog_zoom_tint_fadein"] = "200";
        $paramssld["ht_catalog_zoom_tint_fadeout"] = "200";
        $paramssld['ht_catalog_zoom_lens_hide'] = "false";
        $paramssld["ht_view3_allow_lightbox"] = "off";
        $paramssld["ht_catalog_zoom_thumbs_zoom"] = "off";
        $paramssld["ht_view3_allow_zooming"] = "on";

        $paramssld["ht_view0_sorting_float"] = "none";
        $paramssld["ht_view1_sorting_float"] = "none";
        $paramssld["ht_view2_sorting_float"] = "none";
        $paramssld["ht_view3_sorting_float"] = "none";
        $paramssld["ht_view4_sorting_float"] = "none";
        $paramssld["ht_view5_sorting_float"] = "none";
        $paramssld["ht_view6_sorting_float"] = "none";

        $paramssld["ht_view0_filtering_float"] = "none";
        $paramssld["ht_view1_filtering_float"] = "none";
        $paramssld["ht_view2_filtering_float"] = "none";
        $paramssld["ht_view3_filtering_float"] = "none";
        $paramssld["ht_view4_filtering_float"] = "none";
        $paramssld["ht_view5_filtering_float"] = "none";
        $paramssld["ht_view6_filtering_float"] = "none";
        $paramssld["ht_view0_allow_zooming"] = "off";
        $paramssld["ht_view0_allow_lightbox"] = "off";
        $paramssld["ht_view1_allow_zooming"] = "on";
        $paramssld["ht_view1_allow_lightbox"] = "off";
        $paramssld["ht_view2_allow_zooming"] = "off";
        $paramssld["ht_view2_allow_lightbox"] = "off";
        $paramssld["ht_view5_allow_zooming"] = "on";
        $paramssld["ht_view5_allow_lightbox"] = "off";

        $paramssld["htc_view0_load_more_position"] = "center";
        $paramssld["htc_view1_load_more_position"] = "center";
        $paramssld["htc_view2_load_more_position"] = "center";
        $paramssld["htc_view3_load_more_position"] = "center";
        $paramssld["htc_view0_load_more_font_size"] = "18";
        $paramssld["htc_view1_load_more_font_size"] = "18";
        $paramssld["htc_view2_load_more_font_size"] = "22";
        $paramssld["htc_view3_load_more_font_size"] = "20";
        $paramssld["htc_view0_load_more_font_color"] = "F2F2F2";
        $paramssld["htc_view1_load_more_font_color"] = "F2F2F2";
        $paramssld["htc_view2_load_more_font_color"] = "F2F2F2";
        $paramssld["htc_view3_load_more_font_color"] = "F2F2F2";
        $paramssld["htc_view0_load_more_font_hover_color"] = "F2F2F2";
        $paramssld["htc_view1_load_more_font_hover_color"] = "F2F2F2";
        $paramssld["htc_view2_load_more_font_hover_color"] = "F2F2F2";
        $paramssld["htc_view3_load_more_font_hover_color"] = "FFFFFF";
        $paramssld["htc_view0_load_more_button_background_color"] = "A1A1A1";
        $paramssld["htc_view1_load_more_button_background_color"] = "A1A1A1";
        $paramssld["htc_view2_load_more_button_background_color"] = "FF2C2C";
        $paramssld["htc_view3_load_more_button_background_color"] = "A1A1A1";
        $paramssld["htc_view0_load_more_button_background_hover_color"] = "A1A1A1";
        $paramssld["htc_view1_load_more_button_background_hover_color"] = "A1A1A1";
        $paramssld["htc_view2_load_more_button_background_hover_color"] = "991A1A";
        $paramssld["htc_view3_load_more_button_background_hover_color"] = "A1A1A1";
        $paramssld["htc_view0_load_more_loading_icon"] = "1";
        $paramssld["htc_view1_load_more_loading_icon"] = "1";
        $paramssld["htc_view2_load_more_loading_icon"] = "1";
        $paramssld["htc_view3_load_more_loading_icon"] = "1";

        $paramssld["htc_view0_pagination_font_size"] = "22";
        $paramssld["htc_view1_pagination_font_size"] = "22";
        $paramssld["htc_view2_pagination_font_size"] = "22";
        $paramssld["htc_view3_pagination_font_size"] = "22";
        $paramssld["htc_view0_pagination_font_color"] = "000";
        $paramssld["htc_view1_pagination_font_color"] = "000";
        $paramssld["htc_view2_pagination_font_color"] = "000";
        $paramssld["htc_view3_pagination_font_color"] = "000";
        $paramssld["htc_view0_pagination_icon_size"] = "22";
        $paramssld["htc_view1_pagination_icon_size"] = "22";
        $paramssld["htc_view2_pagination_icon_size"] = "22";
        $paramssld["htc_view3_pagination_icon_size"] = "22";
        $paramssld["htc_view0_pagination_icon_color"] = "000";
        $paramssld["htc_view1_pagination_icon_color"] = "000";
        $paramssld["htc_view2_pagination_icon_color"] = "000";
        $paramssld["htc_view3_pagination_icon_color"] = "000";
        $paramssld["htc_view0_pagination_position"] = "center";
        $paramssld["htc_view1_pagination_position"] = "center";
        $paramssld["htc_view2_pagination_position"] = "center";
        $paramssld["htc_view3_pagination_position"] = "center";

		/** <add search> **/
		$paramssld['ht_view0_search_form_width']= '94';
		$paramssld['ht_view0_search_form_position']='left';
		$paramssld['ht_view0_search_form_border_radius']= '0';
		$paramssld['ht_view0_search_form_border_color']='dedede';
		$paramssld['ht_view0_search_form_border_width']= '1';
		$paramssld['ht_view0_search_button_background'] = '6EBFDC';
		$paramssld['ht_view0_search_button_hover_color'] = '718B94';
		$paramssld['ht_view0_search_button_text_color'] ='ffffff';
		$paramssld['ht_view1_search_form_width']= '94';
		$paramssld['ht_view1_search_form_position']='left';
		$paramssld['ht_view1_search_form_border_radius']= '0';
		$paramssld['ht_view1_search_form_border_color']='dedede';
		$paramssld['ht_view1_search_form_border_width']= '1';
		$paramssld['ht_view1_search_button_background'] = '6EBFDC';
		$paramssld['ht_view1_search_button_hover_color'] = '718B94';
		$paramssld['ht_view1_search_button_text_color'] ='ffffff';
		$paramssld['ht_view2_search_form_width']= '94';
		$paramssld['ht_view2_search_form_position']='left';
		$paramssld['ht_view2_search_form_border_radius']= '0';
		$paramssld['ht_view2_search_form_border_color']='dedede';
		$paramssld['ht_view2_search_form_border_width']= '1';
		$paramssld['ht_view2_search_button_background'] = '6EBFDC';
		$paramssld['ht_view2_search_button_hover_color'] = '718B94';
		$paramssld['ht_view2_search_button_text_color'] ='ffffff';
		$paramssld['ht_view3_search_form_width']= '94';
		$paramssld['ht_view3_search_form_position']='left';
		$paramssld['ht_view3_search_form_border_radius']= '0';
		$paramssld['ht_view3_search_form_border_color']='dedede';
		$paramssld['ht_view3_search_form_border_width']= '1';
		$paramssld['ht_view3_search_button_background'] = '6EBFDC';
		$paramssld['ht_view3_search_button_hover_color'] = '718B94';
		$paramssld['ht_view3_search_button_text_color'] ='ffffff';

		/** </add search> **/

?>
<script>
        var allowZooming;
        var allowLightbox;
            var for_zoom;
            if("<?php echo $paramssld['ht_catalog_zoom_thumbs_zoom']; ?>" == "on"){
                for_zoom = ".for_zoom img, .thumbs-block img";
            }
            else if("<?php echo $paramssld['ht_catalog_zoom_thumbs_zoom']; ?>" == "off"){
                for_zoom = ".for_zoom img";
            }
            var view_num = <?php echo $catalogeffect; ?>;

            var catalogZoomType = "<?php echo $paramssld['ht_catalog_zoom_window_type'];?>";
		var catalogWindowWidth = <?php echo $paramssld['ht_catalog_zoom_window_width'];?>;
		var catalogWindowHeight = <?php echo $paramssld['ht_catalog_zoom_window_height'];?>;
		var catalogWindowOffetx = <?php echo $paramssld['ht_catalog_zoom_x_asis'];?>;
		var catalogWindowOffety = <?php echo $paramssld['ht_catalog_zoom_y_asis'];?>;
		var catalogWindowPosition = <?php echo $paramssld['ht_catalog_zoom_window_position'];?>;
		var catalogBorderSize = <?php echo $paramssld['ht_catalog_zoom_window_border_size'];?>;
		var catalogBorderColour = "<?php echo $paramssld['ht_catalog_zoom_window_border_color'];?>";
		var catalogWindowFadeIn = <?php echo $paramssld['ht_catalog_zoom_window_fadein'];?>;
		var catalogWindowFadeOut = <?php echo $paramssld['ht_catalog_zoom_window_fadeout'];?>;
		var catalogLensSize = <?php echo $paramssld['ht_catalog_zoom_window_lens_size'];?>;

		var catalogLensFadeIn = <?php echo $paramssld['ht_catalog_zoom_lens_fadein'];?>;
		var catalogLensFadeOut = <?php echo $paramssld['ht_catalog_zoom_lens_fadeout'];?>;
		var catalogZoomLens = <?php echo $paramssld['ht_catalog_zoom_lens_hide'];?>;
		var catalogLensShape = "<?php echo $paramssld['ht_catalog_zoom_lens_shape'];?>";
		var catalogLensColour = "<?php echo $paramssld['ht_catalog_zoom_lens_color'];?>";
		var catalogLensOpacity = <?php echo $paramssld['ht_catalog_zoom_lens_opacity'];?>/100;
		var catalogCursor = "<?php echo $paramssld['ht_catalog_zoom_cursor'];?>";
                if(catalogZoomType != "inner") { var catalogScrollZoom = <?php echo $paramssld['ht_catalog_zoom_scrollzoom'];?>; }
                else{ var catalogScrollZoom = false; }

		var catalogEasing = <?php echo $paramssld['ht_catalog_zoom_easing'];?>;

		var catalogTint = <?php echo $paramssld['ht_catalog_zoom_tint'];?>;
		var catalogTintColour = "<?php echo $paramssld['ht_catalog_zoom_tint_colour'];?>";
		var catalogTintOpacity = <?php echo $paramssld['ht_catalog_zoom_tint_opacity'];?>/100;
		var catalogZoomTintFadeIn = <?php echo $paramssld['ht_catalog_zoom_tint_fadein'];?>;
		var catalogZoomTintFadeOut = <?php echo $paramssld['ht_catalog_zoom_tint_fadeout'];?>;

		var catalogGallery = null;

            var lightbox_transition = '<?php echo $paramssld['light_box_transition'];?>';
            var lightbox_speed = <?php echo $paramssld['light_box_speed'];?>;
            var lightbox_fadeOut = <?php echo $paramssld['light_box_fadeout'];?>;
            var lightbox_title = <?php echo $paramssld['light_box_title'];?>;
            var lightbox_scalePhotos = <?php echo $paramssld['light_box_scalephotos'];?>;
            var lightbox_scrolling = <?php echo $paramssld['light_box_scrolling'];?>;
            var lightbox_opacity = <?php echo ($paramssld['light_box_opacity']/100)+0.001;?>;
            var lightbox_open = <?php echo $paramssld['light_box_open'];?>;
            var lightbox_returnFocus = <?php echo $paramssld['light_box_returnfocus'];?>;
            var lightbox_trapFocus = <?php echo $paramssld['light_box_trapfocus'];?>;
            var lightbox_fastIframe = <?php echo $paramssld['light_box_fastiframe'];?>;
            var lightbox_preloading = <?php echo $paramssld['light_box_preloading'];?>;
            var lightbox_overlayClose = <?php echo $paramssld['light_box_overlayclose'];?>;
            var lightbox_escKey = <?php echo $paramssld['light_box_esckey'];?>;
            var lightbox_arrowKey = <?php echo $paramssld['light_box_arrowkey'];?>;
            var lightbox_loop = <?php echo $paramssld['light_box_loop'];?>;
            var lightbox_closeButton = <?php echo $paramssld['light_box_closebutton'];?>;
            var lightbox_previous = "<?php echo $paramssld['light_box_previous'];?>";
            var lightbox_next = "<?php echo $paramssld['light_box_next'];?>";
            var lightbox_close = "<?php echo $paramssld['light_box_close'];?>";
            var lightbox_html = <?php echo $paramssld['light_box_html'];?>;
            var lightbox_photo = <?php echo $paramssld['light_box_photo'];?>;
            var lightbox_width = '<?php if($paramssld['light_box_size_fix'] == 'false'){ echo 'false';} else { echo $paramssld['light_box_width']; } ?>';
            var lightbox_height = '<?php if($paramssld['light_box_size_fix'] == 'false'){ echo 'false';} else { echo $paramssld['light_box_height']; } ?>';
            var lightbox_innerWidth = '<?php echo $paramssld['light_box_innerwidth'];?>';
            var lightbox_innerHeight = '<?php echo $paramssld['light_box_innerheight'];?>';
            var lightbox_initialWidth = '<?php echo $paramssld['light_box_initialwidth'];?>';
            var lightbox_initialHeight = '<?php echo $paramssld['light_box_initialheight'];?>';

            var maxwidth=jQuery(window).width();
            if(maxwidth><?php echo $paramssld['light_box_maxwidth'];?>){ maxwidth=<?php echo $paramssld['light_box_maxwidth'];?>; }
            var lightbox_maxWidth = <?php if($paramssld['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo 'maxwidth'; } ?>;
            var lightbox_maxHeight = <?php if($paramssld['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo $paramssld['light_box_maxheight']; } ?>;

            var lightbox_slideshow = <?php echo $paramssld['light_box_slideshow'];?>;
            var lightbox_slideshowSpeed = <?php echo $paramssld['light_box_slideshowspeed'];?>;
            var lightbox_slideshowAuto = <?php echo $paramssld['light_box_slideshowauto'];?>;
            var lightbox_slideshowStart = "<?php echo $paramssld['light_box_slideshowstart'];?>";
            var lightbox_slideshowStop = "<?php echo $paramssld['light_box_slideshowstop'];?>";
            var lightbox_fixed = <?php echo $paramssld['light_box_fixed'];?>;


	<?php
	$pos = $paramssld['slider_title_position'];
	switch($pos){
	case 1:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;
	case 1:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;
	case 2:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;
	case 3:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;
	case 4:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;
	case 5:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;
	case 6:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;
	case 7:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;
	case 8:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;
	case 9:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;
	} ?>

	var lightbox_reposition = <?php echo $paramssld['light_box_reposition'];?>;
	var lightbox_retinaImage = <?php echo $paramssld['light_box_retinaimage'];?>;
	var lightbox_retinaUrl = <?php echo $paramssld['light_box_retinaurl'];?>;
	var lightbox_retinaSuffix = "<?php echo $paramssld['light_box_retinasuffix'];?>";
    var disable_right_click = '<?php echo get_option( 'product_catalog_disable_right_click' ); ?>' == 'on';

				jQuery(document).ready(function(){

                                        var group_count = 0;
                                        jQuery(".catalog_ccolorbox_grouping_<?php echo $catalogID; ?>").each(function(){
                                            group_count++;
                                        });
                                        var i;
                                        for(i = 1; i <= group_count; i++){
                                            jQuery(".catalog_group" + i + "<?php echo "_".$catalogID; ?>").ccolorbox({rel:'catalog_group' + i + "<?php echo "_".$catalogID; ?>"});
                                        }

                                        var catalog_slider_slides_count = 0;
                                        jQuery(".slider-content").each(function(){
                                            catalog_slider_slides_count++;
                                        });
                                        catalog_slider_slides_count = catalog_slider_slides_count - 1;

                                        for(i = 1; i <= catalog_slider_slides_count; i++){
                                            jQuery(".catalog_slider_group" + i + "_<?php echo $catalogID; ?>").ccolorbox({rel:'catalog_slider_group' + i + "_<?php echo $catalogID; ?>"});
                                            jQuery(".clone .catalog_slider_group" + i + "_<?php echo $catalogID; ?>").removeClass("catalog_slider_group" + i + "_<?php echo $catalogID; ?>" + " ccboxElement");
                                        }
                                        //alert(catalog_slider_slides_count);

                                        jQuery(".callbacks").ccolorbox({
                                                onOpen:function(){ alert('onOpen: ccolorbox is about to open'); },
                                                onLoad:function(){ alert('onLoad: ccolorbox has started to load the targeted content'); },
                                                onComplete:function(){ alert('onComplete: ccolorbox has displayed the loaded content'); },
                                                onCleanup:function(){ alert('onCleanup: ccolorbox has begun the close process'); },
                                                onClosed:function(){ alert('onClosed: ccolorbox has completely closed'); }
                                        });

                                        jQuery('.non-retina').ccolorbox({rel:'group5', transition:'none'})
                                        jQuery('.retina').ccolorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});


                                        jQuery("#click").click(function(){
                                                jQuery('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                                                return false;
                                        });
                                });
</script>
<script>
function HugeCatalogSearch_<?php echo $catalogID; ?>(searchText,type,paginationType,view_obj) {
			var existElements,data,query,group_count,i,max_count;

                max_count = <?php echo $myAllImages; ?>;
				data = {};
				data.type = type;
				data.pagetype = paginationType;
				data.text = searchText;
				jQuery.extend(data,view_obj);

				if(type == 'load') {
					jQuery('.load_more_elements_<?php echo $catalogID; ?>').css({ "display" : "none" });
					jQuery('.catalog_load_block_<?php echo $catalogID; ?>').find(".load_more_loading_icon").css({ "display" : "" });
					existElements = '('+getCurrentElementsId_<?php echo $catalogID; ?>().toString()+')';
					data.elements = existElements;
				}
				else {
					jQuery(".catalog_load_block_<?php echo $catalogID; ?>").css('display','block');
					jQuery('#huge_it_catalog_container_<?php echo $catalogID; ?>').html('');
				}

				jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", data, function(response) {
					response = JSON.parse(response);
					 query = response.query;
					 var morePopups = response.morePopups;
                    var searched_count = response.searched_count;
                    var searched_type = response.search_type;
                    var count_into_page = <?php echo $catalogcountinpage; ?>;
					response = response.moreImages;
					if(view_obj.show_popup_linkbutton) {//when content popup
						jQuery("#huge_it_catalog_popup_list_<?php echo $catalogID; ?>").append(morePopups);
					}
					if(type=='load') {
						 if(!response) {
							 jQuery(".catalog_load_block_<?php echo $catalogID; ?>").css('display','none');
							 jQuery('#search_block_<?php echo $catalogID; ?> form > input').keyup();
						 }
						 jQuery("#huge_it_catalog_container_<?php echo $catalogID; ?>").append(response);
                          jQuery("#huge_it_catalog_container_<?php echo $catalogID; ?> img").load(function () {
                                 if( getCurrentElementsId_<?php echo $catalogID; ?>().length >=  max_count){
                                        jQuery(".catalog_load_block_<?php echo $catalogID; ?>").css('display','none');
                                 }
                                 else jQuery(".catalog_load_block_<?php echo $catalogID; ?>").css('display','block');
                          });
                           setTimeout(function () {
                                  if( jQuery(window).width() >= 600) {
                                         jQuery('.main-image-block.not_for_zoom').hide();
                                         jQuery('.main-image-block.for_zoom').show();
                                  }
                           },100);
                           if(disable_right_click) {
                                  jQuery('section[id^="huge_it_catalog_content_"] img, ul[id^="huge_it_catalog_popup_list_"] img, div[id^="main-slider_"] img').bind('contextmenu', function () {
                                         return false;
                                  });
                                  jQuery('#ccolorbox').bind('contextmenu', '#pcboxLoadedContent img', function () {
                                         return false;
                                  });
                           }
					}
					else {
						if(response != '') {
							jQuery("#huge_it_catalog_container_<?php echo $catalogID; ?>").append(response);
							jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?>').find('#search_not_results_<?php echo $catalogID; ?>').css('display','none');
						}
						else {
							jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?>').find('#search_not_results_<?php echo $catalogID; ?>').css('display','block');
							jQuery(".catalog_load_block_<?php echo $catalogID; ?>").css('display','none');
							jQuery('#search_block_<?php echo $catalogID; ?> form > input').keyup();
						}

                        if(disable_right_click) {
                               jQuery('section[id^="huge_it_catalog_content_"] img, ul[id^="huge_it_catalog_popup_list_"] img, div[id^="main-slider_"] img').bind('contextmenu', function () {
                                      return false;
                               });
                               jQuery('#ccolorbox').bind('contextmenu', '#pcboxLoadedContent img', function () {
                                      return false;
                               });
                        }


                        ///hide load_more/pagination if count less
                        if (count_into_page >= searched_count) {
                            jQuery(".catalog_load_block_<?php echo $catalogID; ?>").css('display', 'none');
                            jQuery(".catalog_pagination_block_<?php echo $catalogID; ?>").css('display', 'none');
                        }
                        else {
                            jQuery(".catalog_load_block_<?php echo $catalogID; ?>").css('display', 'block');
                            jQuery(".catalog_pagination_block_<?php echo $catalogID; ?>").css('display', 'block');
                        }




					}
                        setTimeout(function(){
                              jQuery("#huge_it_catalog_container_<?php echo $catalogID; ?>").hugeitmicro('reloadItems' ).hugeitmicro({ sortBy: 'original-order' }).hugeitmicro( 'reLayout' );
                              jQuery(".load_more_elements_<?php echo $catalogID; ?>").css({ "display" : "" });
                              jQuery(".load_more_elements_<?php echo $catalogID; ?>").parent().find(".load_more_loading_icon").css({ "display" : "none" });
                       }, 100);
						if(data.allow_lightbox == "on") {
                               setccolorboxGrouping();
                               group_count = getCurrentElementsId_<?php echo $catalogID; ?>().length;

                               for(i = 0; i <= group_count; i++){
                                      jQuery(".catalog_group" + i + "<?php echo "_".$catalogID; ?>").ccolorbox({rel:'catalog_group' + i + "<?php echo "_".$catalogID; ?>"});
                               }
                               for(i = 0; i <= group_count; i++){
                                      jQuery(".catalog_group_not_for_zoom" + i + "<?php echo "_".$catalogID; ?>").ccolorbox({rel:'catalog_group_not_for_zoom' + i + "<?php echo "_".$catalogID; ?>"});
                               }
						}
                        zoom_resize();               //      CALLING ELEVATEZOOM

                });
 };
  function getCurrentElementsId_<?php echo $catalogID; ?>() {
	 var ExistElementsArray = [];
	 jQuery('#huge_it_catalog_container_<?php echo $catalogID; ?> .element_<?php echo $catalogID; ?>').each(function(){
		 ExistElementsArray.push(jQuery(this).attr('data-element-id'));
	 });
	 return ExistElementsArray;
 }

 function setccolorboxGrouping() {
	 var i = 0;
	 jQuery('#huge_it_catalog_container_<?php echo $catalogID; ?> .element_<?php echo $catalogID; ?>').each(function(){
		 jQuery(this).find('img').parent('a').not('.not_for_zoom_class').removeClass().addClass('catalog_group'+i+'_'+<?php echo $catalogID; ?>);
		 i++;
	 });
 }

/****<calling events for loading elements> ***/

	jQuery(function(){
		if('<?php echo $catalogSearch;?>' == 'on') {

			jQuery('#search_block_<?php echo $catalogID; ?> > form').submit(function(event){
				event.preventDefault();
				jQuery('#search_block_<?php echo $catalogID; ?> form > input').keyup();
				var searchText = jQuery(this).find('input').val();
				HugeCatalogSearch_<?php echo $catalogID; ?>(searchText,'search','<?php echo $catalog[0]->pagination_type;?>',$ob_<?php echo $catalogID; ?>);
			});

			jQuery('#search_block_<?php echo $catalogID; ?> form > input').on('keyup',function(event){
				event.preventDefault();
				(jQuery(this).val() != '')?jQuery(this).next().css('display','block'):jQuery(this).next().css('display','none');
			});
			jQuery('#search_block_<?php echo $catalogID; ?> form > input+div').on('click',function(event){
				event.preventDefault();
				(jQuery(this).prev().val(''))&&(jQuery(this).prev().attr('placeholder','Search products...'));
				jQuery(this).css('display','none');
				HugeCatalogSearch_<?php echo $catalogID; ?>('','search','<?php echo $catalog[0]->pagination_type;?>',$ob_<?php echo $catalogID; ?>);
				jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?>').find('#search_not_results_<?php echo $catalogID; ?>').css('display','none');
			});
			jQuery('.show_all_<?php echo $catalogID; ?>').click(function(){
				jQuery('#search_items_<?php echo $catalogID; ?>').find('#search_block_<?php echo $catalogID; ?> form > input').val('');
				jQuery(this).css('display','none');
				HugeCatalogSearch_<?php echo $catalogID; ?>('','show_all','<?php echo $catalog[0]->pagination_type;?>',$ob_<?php echo $catalogID; ?>);
			});

		}
				/*        <!--     VIEW 0 LOAD MORE CLICK          */

		jQuery(".load_more_elements_<?php echo $catalogID; ?>").click(function(){
			jQuery('#search_block_<?php echo $catalogID; ?> form > input').keyup();
			var searchText = jQuery(this).parents('#huge_it_catalog_content_<?php echo $catalogID; ?>').find('#search_block_<?php echo $catalogID; ?> form > input').val();
			searchText||(searchText='');
			HugeCatalogSearch_<?php echo $catalogID; ?>(searchText,'load','<?php echo $catalog[0]->pagination_type;?>',$ob_<?php echo $catalogID; ?>);
			return false;
		});
	});

/****</calling events for loading elements> ***/
</script>
	<!--Huge IT catalog START-->
	<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    wp_register_style( 'colorbox-index-css', plugins_url( '../style/colorbox-'.$paramssld['light_box_style'].'.css' , __FILE__ )  );
    wp_enqueue_style( 'colorbox-index-css' );
	?>

	<?php
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !(is_plugin_active( 'wp-lightbox-2/wp-lightbox-2.php' ) )) { ?>

	<?php } ?>


	<?php
	$i = $catalogeffect;
	switch ($i) {
        /////////////////////////////// VIEW 0 Toggle Up/Down Blocks /////////////////////////////////////////

        case 0:
            include('view_toggle_up_down.php');
            break;

        ///////////////////////////////// VIEW 1 FullHeight Blocks ///////////////////////////////////////////

        case 1:
            include('view_full_height.php');
            break;

        /////////////////////////////// VIEW 2 Popup /////////////////////////////////////////////////////////

        case 2:
            include('view_content_popup.php');
            break;

        ////////////////////////////// VIEW 3 FullWidth //////////////////////////////////////////////////////

        case 3:
            include('view_full_width.php');
            break;

        /////////////////////////////////// VIEW 5 Content Slider ////////////////////////////////////////////

        case 5:
            include('view_content_slider.php');
            break;

    }
 ?>


<?php
	return ob_get_clean();
}
?>
<?php
    function html_single_product_page($productArray, $paramssld, $paramssld2, $paramssld3, $paramssld4, $ratingsArray, $reviewsArray, $spamReviewsArray, $captchaFirstNum, $captchaSecondNum, $captcha_val){
        ob_start();
        $rating = 0;
        if(!empty($ratingsArray)){
            for($i = 0; $i < count($ratingsArray) ; $i++ ){
                $rating = $rating + $ratingsArray[$i]->value;
            }
            $rating = intval($rating / count($ratingsArray));
        };
        if(isset($_GET['single_prod_id'])) $prod_id = absint($_GET['single_prod_id']);
        else $prod_id = 1;

        wp_get_current_user() ;
        global $user_level;$user_info = get_userdata(1);



        $prod_params = $productArray[0]->parameters;
        $productArray = $productArray[0];
        $allParamsAndChildsInArray = explode('*()*', $prod_params);
        //var_dump($prod_params);     var_dump($rating);
        $group_key = $productArray->id;
        //		var_dump($productArray->id);exit;
        $link =$productArray->image_url;

        $myPageLink = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $adminLink = get_option( 'admin_email' );

        if ($paramssld==null) $paramssld=array();
        if ($paramssld2==null) $paramssld2=array();

        $paramssld["ht_view0_sorting_float"] = "none";
        $paramssld["ht_view1_sorting_float"] = "none";
        $paramssld["ht_view2_sorting_float"] = "none";
        $paramssld["ht_view3_sorting_float"] = "none";
        $paramssld["ht_view4_sorting_float"] = "none";
        $paramssld["ht_view5_sorting_float"] = "none";
        $paramssld["ht_view6_sorting_float"] = "none";

        $paramssld["ht_view0_filtering_float"] = "none";
        $paramssld["ht_view1_filtering_float"] = "none";
        $paramssld["ht_view2_filtering_float"] = "none";
        $paramssld["ht_view3_filtering_float"] = "none";
        $paramssld["ht_view4_filtering_float"] = "none";
        $paramssld["ht_view5_filtering_float"] = "none";
        $paramssld["ht_view6_filtering_float"] = "none";
        $paramssld["ht_single_product_allow_lightbox"] = "off";
        $paramssld["ht_single_product_allow_zooming"] = "on";
        $paramssld["ht_single_product_border_width"] = "1";
        $paramssld["ht_single_product_border_color"] = "f9f9f9";
        $paramssld["ht_single_product_background_color"] = "efefef";
        $paramssld["ht_single_product_mainimage_width"] = "240";
        $paramssld["ht_single_product_show_separator_lines"] = "on";
        $paramssld["ht_single_product_title_font_size"] = "24";
        $paramssld["ht_single_product_title_font_color"] = "0074A2";
        $paramssld["ht_single_product_show_description"] = "on";
        $paramssld["ht_single_product_description_font_size"] = "14";
        $paramssld["ht_single_product_description_font_color"] = "000";
        $paramssld["ht_single_product_show_thumbs"] = "on";
        $paramssld["ht_single_product_thumbs_width"] = "75";
        $paramssld["ht_single_product_thumbs_height"] = "75";
        $paramssld["ht_single_product_price_font_size"] = "14";
        $paramssld["ht_single_product_price_font_color"] = "E22828";
        $paramssld["ht_single_product_market_price_font_size"] = "14";
        $paramssld["ht_single_product_market_price_font_color"] = "E22828";
        $paramssld["ht_single_product_rating_font_size"] = "14";
        $paramssld["ht_single_product_rating_font_color"] = "000000";
        $paramssld["ht_single_product_tabs_font_color"] = "000";
        $paramssld["ht_single_product_tabs_font_hover_color"] = "fff";
        $paramssld["ht_single_product_params_tab_box_background_color"] = "fff";
        $paramssld["ht_single_product_params_tab_words_font_color"] = "000";
        $paramssld["ht_single_product_comments_tab_words_font_color"] = "000";
        $paramssld["ht_single_product_params_name_font_color"] = "000";
        $paramssld["ht_single_product_params_values_font_color"] = "000";
        $paramssld["ht_single_product_comments_name_font_color"] = "000";
        $paramssld["ht_single_product_comments_content_font_color"] = "000";
        $paramssld["ht_single_product_comments_submit_button_text"] = "Submit";
        $paramssld["ht_single_product_comments_submit_button_text_font_size"] = "14";
        $paramssld["ht_single_product_comments_submit_button_text_font_color"] = "FFFFFF";
        $paramssld["ht_single_product_comments_submit_button_text_font_hover_color"] = "FFFFFF";
        $paramssld["ht_single_product_comments_submit_button_text_background_color"] = "4ca6cf";
        $paramssld["ht_single_product_comments_submit_button_text_background_hover_olor"] = "21759b";
        $paramssld["ht_single_product_price_text"] = "Price";
        $paramssld["ht_single_product_market_price_text"] = "Discount Price";
        $paramssld["ht_single_product_comments_text"] = "Comments";
        $paramssld["ht_single_product_parameters_text"] = "Parameters";
        $paramssld["ht_single_product_rating_text"] = "Rating";
        $paramssld["ht_single_product_share_text"] = "Share";
        $paramssld["ht_single_product_show_price"] = "on";
        $paramssld["ht_single_product_show_rating"] = "on";
        $paramssld["ht_single_product_show_share_buttons"] = "on";
        $paramssld["ht_single_product_show_parameters"] = "on";
        $paramssld["ht_single_product_show_comments"] = "on";
        $paramssld["ht_single_product_tabs_border_color"] = "cccccc";
        $paramssld["ht_single_product_your_name_text"] = "Your Name";
        $paramssld["ht_single_product_your_Comment_text"] = "Your Comment";
        $paramssld["ht_single_product_captcha_text"] = "Captcha";
        $paramssld["ht_single_product_invalid_captcha_text"] = "Invalid Captcha";

        $paramssld2["ht_view0_togglebutton_style"] = "dark";
        $paramssld2["ht_view0_show_separator_lines"] = "on";
        $paramssld2["ht_view0_linkbutton_text"] = "View Product";
        $paramssld2["ht_view0_show_linkbutton"] = "on";
        $paramssld2["ht_view0_linkbutton_background_hover_color"] = "df2e1b";
        $paramssld2["ht_view0_linkbutton_background_color"] = "e74c3c";
        $paramssld2["ht_view0_linkbutton_font_hover_color"] = "ffffff";
        $paramssld2["ht_view0_linkbutton_color"] = "ffffff";
        $paramssld2["ht_view0_linkbutton_font_size"] = "14";
        $paramssld2["ht_view0_description_color"] = "5b5b5b";
        $paramssld2["ht_view0_description_font_size"] = "14";
        $paramssld2["ht_view0_show_description"] = "on";
        $paramssld2["ht_view0_thumbs_width"] = "75";
        $paramssld2["ht_view0_thumbs_position"] = "before";
        $paramssld2["ht_view0_show_thumbs"] = "on";
        $paramssld2["ht_view0_title_font_size"] = "15";
        $paramssld2["ht_view0_title_font_color"] = "555555";
        $paramssld2["ht_view0_element_border_width"] = "1";
        $paramssld2["ht_view0_element_border_color"] = "D0D0D0";
        $paramssld2["ht_view0_element_background_color"] = "f7f7f7";
        $paramssld2["ht_view0_block_width"] = "275";
        $paramssld2["ht_view0_block_height"] = "160";
        $paramssld2["ht_view1_show_separator_lines"] = "on";
        $paramssld2["ht_view1_linkbutton_text"] = "View Product";
        $paramssld2["ht_view1_show_linkbutton"] = "on";
        $paramssld2["ht_view1_linkbutton_background_hover_color"] = "df2e1b";
        $paramssld2["ht_view1_linkbutton_background_color"] = "e74c3c";
        $paramssld2["ht_view1_linkbutton_font_hover_color"] = "ffffff";
        $paramssld2["ht_view1_linkbutton_color"] = "ffffff";
        $paramssld2["ht_view1_linkbutton_font_size"] = "14";
        $paramssld2["ht_view1_description_color"] = "5b5b5b";
        $paramssld2["ht_view1_description_font_size"] = "14";
        $paramssld2["ht_view1_show_description"] = "on";
        $paramssld2["ht_view1_thumbs_width"] = "75";
        $paramssld2["ht_view1_thumbs_position"] = "before";
        $paramssld2["ht_view1_show_thumbs"] = "on";
        $paramssld2["ht_view1_title_font_size"] = "15";
        $paramssld2["ht_view1_title_font_color"] = "555555";
        $paramssld2["ht_view1_element_border_width"] = "1";
        $paramssld2["ht_view1_element_border_color"] = "D0D0D0";
        $paramssld2["ht_view1_element_background_color"] = "f7f7f7";
        $paramssld2["ht_view1_block_width"] = "275";
        $paramssld2["ht_view2_element_linkbutton_text"] = "View Product";
        $paramssld2["ht_view2_element_show_linkbutton"] = "on";
        $paramssld2["ht_view2_element_linkbutton_color"] = "ffffff";
        $paramssld2["ht_view2_element_linkbutton_font_size"] = "14";
        $paramssld2["ht_view2_element_linkbutton_background_color"] = "2ea2cd";
        $paramssld2["ht_view2_show_popup_linkbutton"] = "on";
        $paramssld2["ht_view2_popup_linkbutton_text"] = "View Product";
        $paramssld2["ht_view2_popup_linkbutton_background_hover_color"] = "0074a2";
        $paramssld2["ht_view2_popup_linkbutton_background_color"] = "2ea2cd";
        $paramssld2["ht_view2_popup_linkbutton_font_hover_color"] = "ffffff";
        $paramssld2["ht_view2_popup_linkbutton_color"] = "ffffff";
        $paramssld2["ht_view2_popup_linkbutton_font_size"] = "14";
        $paramssld2["ht_view2_description_color"] = "222222";
        $paramssld2["ht_view2_description_font_size"] = "14";
        $paramssld2["ht_view2_show_description"] = "on";
        $paramssld2["ht_view2_thumbs_width"] = "75";
        $paramssld2["ht_view2_thumbs_height"] = "75";
        $paramssld2["ht_view2_thumbs_position"] = "before";
        $paramssld2["ht_view2_show_thumbs"] = "on";
        $paramssld2["ht_view2_popup_background_color"] = "FFFFFF";
        $paramssld2["ht_view2_popup_overlay_color"] = "000000";
        $paramssld2["ht_view2_popup_overlay_transparency_color"] = "70";
        $paramssld2["ht_view2_popup_closebutton_style"] = "dark";
        $paramssld2["ht_view2_show_separator_lines"] = "on";
        $paramssld2["ht_view2_show_popup_title"] = "on";
        $paramssld2["ht_view2_element_title_font_size"] = "18";
        $paramssld2["ht_view2_element_title_font_color"] = "222222";
        $paramssld2["ht_view2_popup_title_font_size"] = "18";
        $paramssld2["ht_view2_popup_title_font_color"] = "222222";
        $paramssld2["ht_view2_element_overlay_color"] = "FFFFFF";
        $paramssld2["ht_view2_element_overlay_transparency"] = "70";
        $paramssld2["ht_view2_zoombutton_style"] = "light";
        $paramssld2["ht_view2_element_border_width"] = "1";
        $paramssld2["ht_view2_element_border_color"] = "dedede";
        $paramssld2["ht_view2_element_background_color"] = "f9f9f9";
        $paramssld2["ht_view2_element_width"] = "275";
        $paramssld2["ht_view2_element_height"] = "160";
        $paramssld2["ht_view3_show_separator_lines"] = "on";
        $paramssld2["ht_view3_linkbutton_text"] = "View Product";
        $paramssld2["ht_view3_show_linkbutton"] = "on";
        $paramssld2["ht_view3_linkbutton_background_hover_color"] = "0074a2";
        $paramssld2["ht_view3_linkbutton_background_color"] = "2ea2cd";
        $paramssld2["ht_view3_linkbutton_font_hover_color"] = "ffffff";
        $paramssld2["ht_view3_linkbutton_color"] = "ffffff";
        $paramssld2["ht_view3_linkbutton_font_size"] = "14";
        $paramssld2["ht_view3_description_color"] = "555555";
        $paramssld2["ht_view3_description_font_size"] = "14";
        $paramssld2["ht_view3_show_description"] = "on";
        $paramssld2["ht_view3_thumbs_width"] = "75";
        $paramssld2["ht_view3_thumbs_height"] = "75";
        $paramssld2["ht_view3_show_thumbs"] = "on";
        $paramssld2["ht_view3_title_font_size"] = "18";
        $paramssld2["ht_view3_title_font_color"] = "0074a2";
        $paramssld2["ht_view3_mainimage_width"] = "240";
        $paramssld2["ht_view3_element_border_width"] = "1";
        $paramssld2["ht_view3_element_border_color"] = "dedede";
        $paramssld2["ht_view3_element_background_color"] = "f9f9f9";
        $paramssld2["ht_view5_icons_style"] = "dark";
        $paramssld2["ht_view5_show_separator_lines"] = "on";
        $paramssld2["ht_view5_linkbutton_text"] = "View Product";
        $paramssld2["ht_view5_show_linkbutton"] = "on";
        $paramssld2["ht_view5_linkbutton_background_hover_color"] = "0074a2";
        $paramssld2["ht_view5_linkbutton_background_color"] = "2ea2cd";
        $paramssld2["ht_view5_linkbutton_font_hover_color"] = "ffffff";
        $paramssld2["ht_view5_linkbutton_color"] = "ffffff";
        $paramssld2["ht_view5_linkbutton_font_size"] = "14";
        $paramssld2["ht_view5_description_color"] = "555555";
        $paramssld2["ht_view5_description_font_size"] = "14";
        $paramssld2["ht_view5_show_description"] = "on";
        $paramssld2["ht_view5_thumbs_width"] = "75";
        $paramssld2["ht_view5_thumbs_height"] = "75";
        $paramssld2["ht_view5_show_thumbs"] = "on";
        $paramssld2["ht_view5_title_font_size"] = "16";
        $paramssld2["ht_view5_title_font_color"] = "0074a2";
        $paramssld2["ht_view5_main_image_width"] = "275";
        $paramssld2["ht_view5_slider_tabs_font_color"] = "d9d99";
        $paramssld2["ht_view5_slider_tabs_background_color"] = "555555";
        $paramssld2["ht_view5_slider_background_color"] = "f9f9f9";
        $paramssld2["ht_view6_title_font_size"] = "16";
        $paramssld2["ht_view6_title_font_color"] = "0074A2";
        $paramssld2["ht_view6_title_font_hover_color"] = "2EA2CD";
        $paramssld2["ht_view6_title_background_color"] = "000000";
        $paramssld2["ht_view6_title_background_transparency"] = "80";
        $paramssld2["ht_view6_border_radius"] = "3";
        $paramssld2["ht_view6_border_width"] = "0";
        $paramssld2["ht_view6_border_color"] = "eeeeee";
        $paramssld2["ht_view6_width"] = "275";
        $paramssld2["light_box_size"] = "17";
        $paramssld2["light_box_width"] = "500";
        $paramssld2["light_box_transition"] = "elastic";
        $paramssld2["light_box_speed"] = "800";
        $paramssld2["light_box_href"] = "False";
        $paramssld2["light_box_title"] = "false";
        $paramssld2["light_box_scalephotos"] = "true";
        $paramssld2["light_box_rel"] = "false";
        $paramssld2["light_box_scrolling"] = "false";
        $paramssld2["light_box_opacity"] = "20";
        $paramssld2["light_box_open"] = "false";
        $paramssld2["light_box_overlayclose"] = "true";
        $paramssld2["light_box_esckey"] = "false";
        $paramssld2["light_box_arrowkey"] = "false";
        $paramssld2["light_box_loop"] = "true";
        $paramssld2["light_box_data"] = "false";
        $paramssld2["light_box_classname"] = "false";
        $paramssld2["light_box_fadeout"] = "300";
        $paramssld2["light_box_closebutton"] = "false";
        $paramssld2["light_box_current"] = "image";
        $paramssld2["light_box_previous"] = "previous";
        $paramssld2["light_box_next"] = "next";
        $paramssld2["light_box_close"] = "close";
        $paramssld2["light_box_iframe"] = "false";
        $paramssld2["light_box_inline"] = "false";
        $paramssld2["light_box_html"] = "false";
        $paramssld2["light_box_photo"] = "false";
        $paramssld2["light_box_height"] = "500";
        $paramssld2["light_box_innerwidth"] = "false";
        $paramssld2["light_box_innerheight"] = "false";
        $paramssld2["light_box_initialwidth"] = "300";
        $paramssld2["light_box_initialheight"] = "100";
        $paramssld2["light_box_maxwidth"] = "768";
        $paramssld2["light_box_maxheight"] = "500";
        $paramssld2["light_box_slideshow"] = "false";
        $paramssld2["light_box_slideshowspeed"] = "2500";
        $paramssld2["light_box_slideshowauto"] = "true";
        $paramssld2["light_box_slideshowstart"] = "start slideshow";
        $paramssld2["light_box_slideshowstop"] = "stop slideshow";
        $paramssld2["light_box_fixed"] = "true";
        $paramssld2["light_box_top"] = "false";
        $paramssld2["light_box_bottom"] = "false";
        $paramssld2["light_box_left"] = "false";
        $paramssld2["light_box_right"] = "false";
        $paramssld2["light_box_reposition"] = "false";
        $paramssld2["light_box_retinaimage"] = "true";
        $paramssld2["light_box_retinaurl"] = "false";
        $paramssld2["light_box_retinasuffix"] = "@2x.$1";
        $paramssld2["light_box_returnfocus"] = "true";
        $paramssld2["light_box_trapfocus"] = "true";
        $paramssld2["light_box_fastiframe"] = "true";
        $paramssld2["light_box_preloading"] = "true";
        $paramssld2["slider_title_position"] = "5";
        $paramssld2["light_box_style"] = "1";
        $paramssld2["light_box_size_fix"] = "false";
        $paramssld2["ht_view2_popup_full_width"] = "on";
        $paramssld2["ht_view0_price_text"] = "Price";
        $paramssld2["ht_view1_price_text"] = "Price";
        $paramssld2["ht_view2_price_text"] = "Price";
        $paramssld2["ht_view3_price_text"] = "Price";
        $paramssld2["ht_view5_price_text"] = "Price";
        $paramssld2["ht_catalog_view0_show_price"] = "on";
        $paramssld2["ht_catalog_view0_price_font_size"] = "15";
        $paramssld2["ht_catalog_view0_price_font_color"] = "e74c3c";
        $paramssld2["ht_catalog_view0_market_price_font_size"] = "15";
        $paramssld2["ht_catalog_view0_market_price_font_color"] = "000000";
        $paramssld2["ht_catalog_view1_show_price"] = "on";
        $paramssld2["ht_catalog_view1_price_font_size"] = "15";
        $paramssld2["ht_catalog_view1_price_font_color"] = "e74c3c";
        $paramssld2["ht_catalog_view1_market_price_font_size"] = "15";
        $paramssld2["ht_catalog_view1_market_price_font_color"] = "000000";
        $paramssld2["ht_catalog_view2_show_price"] = "on";
        $paramssld2["ht_catalog_view2_price_font_size"] = "15";
        $paramssld2["ht_catalog_view2_price_font_color"] = "e74c3c";
        $paramssld2["ht_catalog_view2_market_price_font_size"] = "15";
        $paramssld2["ht_catalog_view2_market_price_font_color"] = "000000";
        $paramssld2["ht_catalog_view3_show_price"] = "on";
        $paramssld2["ht_catalog_view3_price_font_size"] = "15";
        $paramssld2["ht_catalog_view3_price_font_color"] = "0074a2";
        $paramssld2["ht_catalog_view3_market_price_font_size"] = "15";
        $paramssld2["ht_catalog_view3_market_price_font_color"] = "000000";
        $paramssld2["ht_catalog_view5_show_price"] = "on";
        $paramssld2["ht_catalog_view5_price_font_size"] = "15";
        $paramssld2["ht_catalog_view5_price_font_color"] = "0074a2";
        $paramssld2["ht_catalog_view5_market_price_font_size"] = "15";
        $paramssld2["ht_catalog_view5_market_price_font_color"] = "000000";
        $paramssld2["ht_catalog_zoom_window_type"] = "window";
        $paramssld2["ht_catalog_zoom_window_width"] = "300";
        $paramssld2["ht_catalog_zoom_window_height"] = "200";
        $paramssld2["ht_catalog_zoom_x_asis"] = "0";
        $paramssld2["ht_catalog_zoom_y_asis"] = "200";
        $paramssld2["ht_catalog_zoom_window_position"] = "16";
        $paramssld2["ht_catalog_zoom_window_border_size"] = "0";
        $paramssld2["ht_catalog_zoom_window_border_color"] = "#000";
        $paramssld2["ht_catalog_zoom_window_lens_size"] = "200";
        $paramssld2["ht_catalog_zoom_window_fadein"] = "200";
        $paramssld2["ht_catalog_zoom_window_fadeout"] = "200";
        $paramssld2["ht_catalog_zoom_lens_fadein"] = "200";
        $paramssld2["ht_catalog_zoom_lens_fadeout"] = "200";
        $paramssld2["ht_catalog_zoom_lens_hide"] = "false";
        $paramssld2["ht_catalog_zoom_lens_shape"] = "square";
        $paramssld2["ht_catalog_zoom_lens_color"] = "fff";
        $paramssld2["ht_catalog_zoom_lens_opacity"] = "40";
        $paramssld2["ht_catalog_zoom_cursor"] = "crosshair";
        $paramssld2["ht_catalog_zoom_scrollzoom"] = "true";
        $paramssld2["ht_catalog_zoom_easing"] = "true";
        $paramssld2["ht_catalog_zoom_lens_size_fix"] = "false";
        $paramssld2["ht_catalog_zoom_lens_height"] = "100";
        $paramssld2["ht_catalog_zoom_lens_width"] = "100";
        $paramssld2["ht_catalog_zoom_tint"] = "false";
        $paramssld2["ht_catalog_zoom_tint_colour"] = "#fff";
        $paramssld2["ht_catalog_zoom_tint_opacity"] = "40";
        $paramssld2["ht_catalog_zoom_tint_fadein"] = "200";
        $paramssld2["ht_catalog_zoom_tint_fadeout"] = "200";
        $paramssld2['ht_catalog_zoom_lens_hide'] = "false";
        $paramssld2["ht_view3_allow_lightbox"] = "on";
        $paramssld2["ht_catalog_zoom_thumbs_zoom"] = "off";
        $paramssld2["ht_view3_allow_zooming"] = "on";
        $paramssld["ht_view0_allow_zooming"] = "off";
        $paramssld["ht_view0_allow_lightbox"] = "on";
        $paramssld["ht_view1_allow_zooming"] = "on";
        $paramssld["ht_view1_allow_lightbox"] = "on";
        $paramssld["ht_view2_allow_zooming"] = "off";
        $paramssld["ht_view2_allow_lightbox"] = "on";
        $paramssld["ht_view5_allow_zooming"] = "on";
        $paramssld["ht_view5_allow_lightbox"] = "off";
        $paramssld["ht_single_product_show_asc_seller_button"] = "on";
        $paramssld["ht_single_product_asc_seller_button_text"] = "Contact Seller";
        $paramssld["ht_single_product_asc_seller_button_text_size"] = "18";
        $paramssld["ht_single_product_asc_seller_button_text_color"] = "ffffff";
        $paramssld["ht_single_product_asc_seller_button_text_hover_color"] = "ffffff";
        $paramssld["ht_single_product_asc_seller_button_background_color"] = "E22828";
        $paramssld["ht_single_product_asc_seller_button_background_hover_color"] = "E22828";
        $paramssld["ht_single_product_asc_to_seller_text"] = "Asc Seller";
        $paramssld["ht_single_product_asc_seller_popup_background_1"] = "ffffff";
        $paramssld["ht_single_product_asc_seller_popup_background_2"] = "ffffff";
        $paramssld["ht_single_product_your_mail_text"] = "Your E-mail";
        $paramssld["ht_single_product_your_phone_text"] = "Your Phone";
        $paramssld["ht_single_product_your_message_text"] = "Your Message";
        $paramssld["ht_single_product_asc_seller_popup_button_text"] = "Submit";
        $paramssld["ht_single_product_asc_seller_popup_button_text_size"] = "19";
        $paramssld["ht_single_product_asc_seller_popup_button_text_color"] = "fff";
        $paramssld["ht_single_product_asc_seller_popup_button_background_color"] = "E22828";
        $paramssld["ht_single_product_asc_seller_popup_button_background_hover_color"] = "C52323";
        $paramssld["ht_single_product_asc_seller_popup_close_style"] = "dark";
		$paramssld["ht_single_product_asc_seller_button_position"] = "left";
        $paramssld["ht_single_product_asc_seller_button_border_radius"] = "5";


        $paramssld["htc_view0_load_more_position"] = "center";
        $paramssld["htc_view1_load_more_position"] = "center";
        $paramssld["htc_view2_load_more_position"] = "center";
        $paramssld["htc_view3_load_more_position"] = "center";
        $paramssld["htc_view0_load_more_font_size"] = "18";
        $paramssld["htc_view1_load_more_font_size"] = "18";
        $paramssld["htc_view2_load_more_font_size"] = "22";
        $paramssld["htc_view3_load_more_font_size"] = "20";
        $paramssld["htc_view0_load_more_font_color"] = "F2F2F2";
        $paramssld["htc_view1_load_more_font_color"] = "F2F2F2";
        $paramssld["htc_view2_load_more_font_color"] = "F2F2F2";
        $paramssld["htc_view3_load_more_font_color"] = "F2F2F2";
        $paramssld["htc_view0_load_more_font_hover_color"] = "F2F2F2";
        $paramssld["htc_view1_load_more_font_hover_color"] = "F2F2F2";
        $paramssld["htc_view2_load_more_font_hover_color"] = "F2F2F2";
        $paramssld["htc_view3_load_more_font_hover_color"] = "FFFFFF";
        $paramssld["htc_view0_load_more_button_background_color"] = "A1A1A1";
        $paramssld["htc_view1_load_more_button_background_color"] = "A1A1A1";
        $paramssld["htc_view2_load_more_button_background_color"] = "FF2C2C";
        $paramssld["htc_view3_load_more_button_background_color"] = "A1A1A1";
        $paramssld["htc_view0_load_more_button_background_hover_color"] = "A1A1A1";
        $paramssld["htc_view1_load_more_button_background_hover_color"] = "A1A1A1";
        $paramssld["htc_view2_load_more_button_background_hover_color"] = "991A1A";
        $paramssld["htc_view3_load_more_button_background_hover_color"] = "A1A1A1";
        $paramssld["htc_view0_load_more_loading_icon"] = "1";
        $paramssld["htc_view1_load_more_loading_icon"] = "1";
        $paramssld["htc_view2_load_more_loading_icon"] = "1";
        $paramssld["htc_view3_load_more_loading_icon"] = "1";

        $paramssld["htc_view0_pagination_font_size"] = "22";
        $paramssld["htc_view1_pagination_font_size"] = "22";
        $paramssld["htc_view2_pagination_font_size"] = "22";
        $paramssld["htc_view3_pagination_font_size"] = "22";
        $paramssld["htc_view0_pagination_font_color"] = "000";
        $paramssld["htc_view1_pagination_font_color"] = "000";
        $paramssld["htc_view2_pagination_font_color"] = "000";
        $paramssld["htc_view3_pagination_font_color"] = "000";
        $paramssld["htc_view0_pagination_icon_size"] = "22";
        $paramssld["htc_view1_pagination_icon_size"] = "22";
        $paramssld["htc_view2_pagination_icon_size"] = "22";
        $paramssld["htc_view3_pagination_icon_size"] = "22";
        $paramssld["htc_view0_pagination_icon_color"] = "000";
        $paramssld["htc_view1_pagination_icon_color"] = "000";
        $paramssld["htc_view2_pagination_icon_color"] = "000";
        $paramssld["htc_view3_pagination_icon_color"] = "000";
        $paramssld["htc_view0_pagination_position"] = "center";
        $paramssld["htc_view1_pagination_position"] = "center";
        $paramssld["htc_view2_pagination_position"] = "center";
        $paramssld["htc_view3_pagination_position"] = "center";

        $paramssld["ht_single_product_asc_to_seller_input_border_size"]  = "1";
        $paramssld["ht_single_product_asc_to_seller_text_font_size"]     = "26";
        $paramssld["ht_single_product_asc_to_seller_text_font_color"]    = "D91A1A";
        $paramssld["ht_single_product_asc_to_seller_input_border_color"] = "B3B3B3";

    if ( is_plugin_active( 'product-catalog-releated-products/product-catalog-releated-products.php' ) ){  }
    else{

        if ($paramssld4==null) $paramssld4=array();

        $paramssld4['ht_catalog_related_products_show'] = "off";
        $paramssld4['ht_catalog_related_products_visible_count'] = "4";
        $paramssld4['ht_catalog_related_products_vertical'] = "false";
        $paramssld4['ht_catalog_related_products_start'] = "1";
        $paramssld4['ht_catalog_related_products_circular'] = "true";
        $paramssld4['ht_catalog_related_products_autoplay'] = "off";
        $paramssld4['ht_catalog_related_products_show_arrows'] = "on";
        $paramssld4['ht_catalog_related_products_delay'] = "1000";
        $paramssld4['ht_catalog_related_products_changing_speed'] = "1000";
        $paramssld4['ht_catalog_related_products_direction_reverse'] = "off";
        $paramssld4['ht_catalog_related_products_position'] = "bottom";
        $paramssld4['ht_catalog_related_products_pause_on_hover'] = "off";
        $paramssld4['ht_catalog_related_products_vertical_elem_height'] = "105";
        $paramssld4['ht_catalog_related_products_vertical_elem_width'] = "250";
        $paramssld4['ht_catalog_related_products_vertical_caption_width'] = "50";
        $paramssld4['ht_catalog_related_products_horizontal_elem_width'] = "190";
        $paramssld4['ht_catalog_related_products_horizontal_elem_height'] = "143";
        $paramssld4['ht_catalog_related_products_horizontal_border_size'] = "1";
        $paramssld4['ht_catalog_related_products_horizontal_border_color'] = "c0c0c0";
        $paramssld4['ht_catalog_related_products_vertical_border_size'] = "1";
        $paramssld4['ht_catalog_related_products_vertical_border_color'] = "c0c0c0";
        $paramssld4['ht_catalog_related_products_vertical_font_size'] = "17";
        $paramssld4['ht_catalog_related_products_vertical_font_color'] = "c0c0c0";
        $paramssld4['ht_catalog_related_products_horizontal_font_size'] = "17";
        $paramssld4['ht_catalog_related_products_horizontal_font_color'] = "c0c0c0";
        $paramssld4['ht_catalog_related_products_autoplay_speed'] = "2000";
        $paramssld4['ht_catalog_related_products_horizontal_caption_height'] = "105";
//        var_dump($paramssld4);exit;
    }

//        exit;

?>

<script>
	var allowZooming = '<?php echo $paramssld['ht_single_product_allow_zooming'];?>';
	var allowLightbox = '<?php echo $paramssld['ht_single_product_allow_lightbox'];?>';

        var view_num = 0;

	if(allowZooming == "on"){
		var for_zoom;
		if("<?php echo $paramssld2['ht_catalog_zoom_thumbs_zoom']; ?>" == "on"){
			for_zoom = ".for_zoom img, .thumbs-block img";
		}
		else if("<?php echo $paramssld2['ht_catalog_zoom_thumbs_zoom']; ?>" == "off"){
			for_zoom = ".for_zoom img";
		}
//            var catalogThumbsZoom = "<?php echo $paramssld2['ht_catalog_zoom_thumbs_zoom'];?>";
		var catalogZoomType = "<?php echo $paramssld2['ht_catalog_zoom_window_type'];?>";
		var catalogWindowWidth = <?php echo $paramssld2['ht_catalog_zoom_window_width'];?>;
		var catalogWindowHeight = <?php echo $paramssld2['ht_catalog_zoom_window_height'];?>;
		var catalogWindowOffetx = <?php echo $paramssld2['ht_catalog_zoom_x_asis'];?>;
		var catalogWindowOffety = <?php echo $paramssld2['ht_catalog_zoom_y_asis'];?>;
		var catalogWindowPosition = <?php echo $paramssld2['ht_catalog_zoom_window_position'];?>;
		var catalogBorderSize = <?php echo $paramssld2['ht_catalog_zoom_window_border_size'];?>;
		var catalogBorderColour = "<?php echo $paramssld2['ht_catalog_zoom_window_border_color'];?>";
		var catalogWindowFadeIn = <?php echo $paramssld2['ht_catalog_zoom_window_fadein'];?>;
		var catalogWindowFadeOut = <?php echo $paramssld2['ht_catalog_zoom_window_fadeout'];?>;
		var catalogLensSize = <?php echo $paramssld2['ht_catalog_zoom_window_lens_size'];?>;

		var catalogLensFadeIn = <?php echo $paramssld2['ht_catalog_zoom_lens_fadein'];?>;
		var catalogLensFadeOut = <?php echo $paramssld2['ht_catalog_zoom_lens_fadeout'];?>;
		var catalogZoomLens = <?php echo $paramssld2['ht_catalog_zoom_lens_hide'];?>;
		var catalogLensShape = "<?php echo $paramssld2['ht_catalog_zoom_lens_shape'];?>";
		var catalogLensColour = "<?php echo $paramssld2['ht_catalog_zoom_lens_color'];?>";
		var catalogLensOpacity = <?php echo $paramssld2['ht_catalog_zoom_lens_opacity'];?>/100;
		var catalogCursor = "<?php echo $paramssld2['ht_catalog_zoom_cursor'];?>";
         if(catalogZoomType != "inner") { var catalogScrollZoom = <?php echo $paramssld2['ht_catalog_zoom_scrollzoom'];?>; }
         else{ var catalogScrollZoom = false; }

		var catalogEasing = <?php echo $paramssld2['ht_catalog_zoom_easing'];?>;

		var catalogTint = <?php echo $paramssld2['ht_catalog_zoom_tint'];?>;
		var catalogTintColour = "<?php echo $paramssld2['ht_catalog_zoom_tint_colour'];?>";
		var catalogTintOpacity = <?php echo $paramssld2['ht_catalog_zoom_tint_opacity'];?>/100;
		var catalogZoomTintFadeIn = <?php echo $paramssld2['ht_catalog_zoom_tint_fadein'];?>;
		var catalogZoomTintFadeOut = <?php echo $paramssld2['ht_catalog_zoom_tint_fadeout'];?>;

		var catalogGallery = null;
	}
	if(allowLightbox == "on"){
		var lightbox_transition = '<?php echo $paramssld2['light_box_transition'];?>';
		var lightbox_speed = <?php echo $paramssld2['light_box_speed'];?>;
		var lightbox_fadeOut = <?php echo $paramssld2['light_box_fadeout'];?>;
		var lightbox_title = <?php echo $paramssld2['light_box_title'];?>;
		var lightbox_scalePhotos = <?php echo $paramssld2['light_box_scalephotos'];?>;
		var lightbox_scrolling = <?php echo $paramssld2['light_box_scrolling'];?>;
		var lightbox_opacity = <?php echo ($paramssld2['light_box_opacity']/100)+0.001;?>;
		var lightbox_open = <?php echo $paramssld2['light_box_open'];?>;
		var lightbox_returnFocus = <?php echo $paramssld2['light_box_returnfocus'];?>;
		var lightbox_trapFocus = <?php echo $paramssld2['light_box_trapfocus'];?>;
		var lightbox_fastIframe = <?php echo $paramssld2['light_box_fastiframe'];?>;
		var lightbox_preloading = <?php echo $paramssld2['light_box_preloading'];?>;
		var lightbox_overlayClose = <?php echo $paramssld2['light_box_overlayclose'];?>;
		var lightbox_escKey = <?php echo $paramssld2['light_box_esckey'];?>;
		var lightbox_arrowKey = <?php echo $paramssld2['light_box_arrowkey'];?>;
		var lightbox_loop = <?php echo $paramssld2['light_box_loop'];?>;
		var lightbox_closeButton = <?php echo $paramssld2['light_box_closebutton'];?>;
		var lightbox_previous = "<?php echo $paramssld2['light_box_previous'];?>";
		var lightbox_next = "<?php echo $paramssld2['light_box_next'];?>";
		var lightbox_close = "<?php echo $paramssld2['light_box_close'];?>";
		var lightbox_html = <?php echo $paramssld2['light_box_html'];?>;
		var lightbox_photo = <?php echo $paramssld2['light_box_photo'];?>;
		var lightbox_width = '<?php if($paramssld2['light_box_size_fix'] == 'false'){ echo 'false';} else { echo $paramssld2['light_box_width']; } ?>';
		var lightbox_height = '<?php if($paramssld2['light_box_size_fix'] == 'false'){ echo 'false';} else { echo $paramssld2['light_box_height']; } ?>';
		var lightbox_innerWidth = '<?php echo $paramssld2['light_box_innerwidth'];?>';
		var lightbox_innerHeight = '<?php echo $paramssld2['light_box_innerheight'];?>';
		var lightbox_initialWidth = '<?php echo $paramssld2['light_box_initialwidth'];?>';
		var lightbox_initialHeight = '<?php echo $paramssld2['light_box_initialheight'];?>';

		var maxwidth=jQuery(window).width();
		if(maxwidth><?php echo $paramssld2['light_box_maxwidth'];?>){ maxwidth=<?php echo $paramssld2['light_box_maxwidth'];?>; }
		var lightbox_maxWidth = <?php if($paramssld2['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo 'maxwidth'; } ?>;
		var lightbox_maxHeight = <?php if($paramssld2['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo $paramssld2['light_box_maxheight']; } ?>;

		var lightbox_slideshow = <?php echo $paramssld2['light_box_slideshow'];?>;
		var lightbox_slideshowSpeed = <?php echo $paramssld2['light_box_slideshowspeed'];?>;
		var lightbox_slideshowAuto = <?php echo $paramssld2['light_box_slideshowauto'];?>;
		var lightbox_slideshowStart = "<?php echo $paramssld2['light_box_slideshowstart'];?>";
		var lightbox_slideshowStop = "<?php echo $paramssld2['light_box_slideshowstop'];?>";
		var lightbox_fixed = <?php echo $paramssld2['light_box_fixed'];?>;

		<?php
		$pos = $paramssld2['slider_title_position'];
		switch($pos){
			case 1:
			?>
				var lightbox_top = '10%';
				var lightbox_bottom = false;
				var lightbox_left = '10%';
				var lightbox_right = false;
			<?php
			break;
			case 1:
			?>
				var lightbox_top = '10%';
				var lightbox_bottom = false;
				var lightbox_left = '10%';
				var lightbox_right = false;
			<?php
			break;
			case 2:
			?>
				var lightbox_top = '10%';
				var lightbox_bottom = false;
				var lightbox_left = false;
				var lightbox_right = false;
			<?php
			break;
			case 3:
			?>
				var lightbox_top = '10%';
				var lightbox_bottom = false;
				var lightbox_left = false;
				var lightbox_right = '10%';
			<?php
			break;
			case 4:
			?>
				var lightbox_top = false;
				var lightbox_bottom = false;
				var lightbox_left = '10%';
				var lightbox_right = false;
			<?php
			break;
			case 5:
			?>
				var lightbox_top = false;
				var lightbox_bottom = false;
				var lightbox_left = false;
				var lightbox_right = false;
			<?php
			break;
			case 6:
			?>
				var lightbox_top = false;
				var lightbox_bottom = false;
				var lightbox_left = false;
				var lightbox_right = '10%';
			<?php
			break;
			case 7:
			?>
				var lightbox_top = false;
				var lightbox_bottom = '10%';
				var lightbox_left = '10%';
				var lightbox_right = false;
			<?php
			break;
			case 8:
			?>
				var lightbox_top = false;
				var lightbox_bottom = '10%';
				var lightbox_left = false;
				var lightbox_right = false;
			<?php
			break;
			case 9:
			?>
				var lightbox_top = false;
				var lightbox_bottom = '10%';
				var lightbox_left = false;
				var lightbox_right = '10%';
			<?php
			break;
		} ?>

		var lightbox_reposition = <?php echo $paramssld2['light_box_reposition'];?>;
		var lightbox_retinaImage = <?php echo $paramssld2['light_box_retinaimage'];?>;
		var lightbox_retinaUrl = <?php echo $paramssld2['light_box_retinaurl'];?>;
		var lightbox_retinaSuffix = "<?php echo $paramssld2['light_box_retinasuffix'];?>";

			jQuery(document).ready(function(){

            jQuery(".catalog_single_product_group_<?php echo $productArray->id; ?>").ccolorbox({rel:'catalog_single_product_group_<?php echo $productArray->id; ?>'});

			jQuery(".callbacks").ccolorbox({
				onOpen:function(){ alert('onOpen: ccolorbox is about to open'); },
				onLoad:function(){ alert('onLoad: ccolorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: ccolorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: ccolorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: ccolorbox has completely closed'); }
			});

			jQuery('.non-retina').ccolorbox({rel:'group5', transition:'none'})
			jQuery('.retina').ccolorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});


			jQuery("#click").click(function(){
				jQuery('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	}


                        /*    <-- Related Products    */

        var related_products_show           = "<?php echo $paramssld4['ht_catalog_related_products_show'];           ?>";
        var related_products_visible_count  = <?php  echo $paramssld4['ht_catalog_related_products_visible_count'];  ?>;
        var related_products_circular       = <?php  echo $paramssld4['ht_catalog_related_products_circular'];       ?>;
        var related_products_autoplay       = "<?php echo $paramssld4['ht_catalog_related_products_autoplay'];       ?>";
        var related_products_autoplay_speed = <?php  echo $paramssld4['ht_catalog_related_products_autoplay_speed']; ?>;
        var related_products_start          = <?php  echo $paramssld4['ht_catalog_related_products_start'] - 1;      ?>;
        var related_products_changing_speed = <?php  echo $paramssld4['ht_catalog_related_products_changing_speed']; ?>;
        var related_products_pause_on_hover = "<?php  echo $paramssld4['ht_catalog_related_products_pause_on_hover']; ?>";
//        var related_products_vertical       = <?php  echo $paramssld4['ht_catalog_related_products_vertical']; ?>;
        var vertical_carousel_li_height     = <?php  echo $paramssld4['ht_catalog_related_products_vertical_elem_height']; ?>;

                                /*    Related Products -->    */

</script>

<?php


    if($paramssld4['ht_catalog_related_products_autoplay'] == "on"){ $autoplay_speed = $paramssld4['ht_catalog_related_products_autoplay_speed']; } else { $autoplay_speed = 0; }
    if($paramssld4['ht_catalog_related_products_position'] == "left" || $paramssld4['ht_catalog_related_products_position'] == "right"){
        $paramssld4['ht_catalog_related_products_vertical'] = "true"; $carousel_vertical = "vertical"; $fullWithProducts = "false";
    }
    else { $paramssld4['ht_catalog_related_products_vertical'] = "false"; $carousel_vertical = "responsive"; $fullWithProducts = "true"; }
?>

	<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        wp_register_style( 'colorbox-index-single-css', plugins_url('../style/colorbox-'.$paramssld2['light_box_style'].'.css'), __FILE__);
        wp_enqueue_style( 'colorbox-index-single-css' );



	?>


	<?php
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !(is_plugin_active( 'wp-lightbox-2/wp-lightbox-2.php' ) )) { ?>

	<?php } ?>

<style type="text/css">
<?php // if($paramssld2["ht_catalog_zoom_lens_size_fix"] == "true") { ?>

/*.zoomLens {
    width: <?php echo $paramssld2["ht_catalog_zoom_lens_width"]; ?>px !important;
    height: <?php echo $paramssld2["ht_catalog_zoom_lens_height"]; ?>px !important;
}*/

.zoomContainer {
    z-index: 10;
}

<?php // } ?>
.huge_it_catalog_single_product_page li{list-style:none !important;}
.huge_it_catalog_single_product_page {
	position: relative;
	<?php
            if($paramssld4['ht_catalog_related_products_show'] == "on" && $paramssld4['ht_catalog_related_products_position'] == "left"){ ?>
                float: left;
                width: -moz-calc(94% - <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px) !important;
                width: -webkit-calc(94% - <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px)  !important;
                width: calc(94% - <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px) !important;
                width: -o-calc(94% - <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px) !important;
                width: -ms-calc(94% - <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px) !important;
                margin-left: 2% !important;
      <?php }
      else{
          if($paramssld4['ht_catalog_related_products_show'] == "on" && $paramssld4['ht_catalog_related_products_position'] == "right"){ ?>
              float: right;
              width: -moz-calc(94% - <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px) !important;
              width: -webkit-calc(94% - <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px) !important;
              width: calc(94% - <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px) !important;
              width: -o-calc(94% - <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px) !important;
              width: -ms-calc(94% - <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px) !important;
              margin-right: 2% !important;
    <?php }
          else{ ?>
                width: 96% !important;
      <?php }
      }
      ?>
	margin:5px 0px 5px 0px;
	padding:2%;
	/*clear:both;*/
	overflow: hidden;
	/*border:<?php echo $paramssld['ht_single_product_border_width']; ?>px solid #<?php echo $paramssld['ht_single_product_border_color']; ?>;*/
	background:#<?php echo $paramssld['ht_single_product_background_color']; ?>;
}

.huge_it_catalog_single_product_page div.left-block {
	position:relative;
	float:left;
	width:40%;
}

.huge_it_catalog_single_product_page div.left-block .main-image-block {
	clear:both;
	width:<?php echo $paramssld['ht_single_product_mainimage_width']; ?>px;
}

.for_zoom {
	max-width:100% !important;
}

.huge_it_catalog_single_product_page div.left-block .main-image-block img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld['ht_single_product_mainimage_width']; ?>px !important;
	height:auto;
}

.huge_it_catalog_single_product_page div.left-block .thumbs-block {
	position:relative;
	margin-top:10px;
}

.huge_it_catalog_single_product_page div.left-block .thumbs-block ul {
	width:100%;
	height:auto;
	display:table;
	margin:0px;
	padding:0px;
	list-style:none;
}

.huge_it_catalog_single_product_page div.left-block .thumbs-block ul li {
	margin: 3px;
	padding:0px;
	width:<?php echo $paramssld['ht_single_product_thumbs_width']; ?>px;
	height:<?php echo $paramssld['ht_single_product_thumbs_height']; ?>px !important;
	float:left;
}

.huge_it_catalog_single_product_page div.left-block .thumbs-block ul li a {
	display:block;
	width:<?php echo $paramssld['ht_single_product_thumbs_width']; ?>px;
	height:<?php echo $paramssld['ht_single_product_thumbs_height']; ?>px;
}

.huge_it_catalog_single_product_page div.left-block .thumbs-block ul li a img {
	margin:0px !important;
	padding:0px !important;
	width:<?php echo $paramssld['ht_single_product_thumbs_width']; ?>px;
	height:<?php echo $paramssld['ht_single_product_thumbs_height']; ?>px !important;
}


/*######RIGHT BLOCK########*/

.huge_it_catalog_single_product_page .rating-and-share-blocks {
	font-size:<?php echo $paramssld['ht_single_product_rating_font_size']; ?>px !important;
	color:#<?php echo $paramssld['ht_single_product_rating_font_color']; ?> !important;
        background: none !important;;
        /*padding-bottom: 2% !important;*/
}

.huge_it_catalog_single_product_page div.right-block {
	position:relative;
	float:left;
	width:58%;
	padding-left:2%;
}

.huge_it_catalog_single_product_page div.right-block > div {
	padding:3px 0px 3px 0px;
	<?php if($paramssld['ht_single_product_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
	<?php } ?>
}

.huge_it_catalog_single_product_page div.right-block > div p {
	margin:0px;
        padding: 4px 0px 12px 0px;
        font-size: initial;
}

.huge_it_catalog_single_product_page div.right-block > div:last-child {
    display: block;
    width: 100%;
	background:none !important;
}

.huge_it_catalog_single_product_page div.right-block .title-block  {
	margin-top:3px;
}

.huge_it_catalog_single_product_page div.right-block .title-block h2 {
	margin:-10px 0px 0px 0px;
	padding:0px;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_single_product_title_font_size']; ?>px !important;
	line-height:<?php echo $paramssld['ht_single_product_title_font_size']+4; ?>px !important;
	color:#404040;
}

.huge_it_catalog_single_product_page .price-block {
	margin:0px;
	padding:10px 0px 5px 0px !important;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_single_product_price_font_size']; ?>px;
	color:#<?php echo $paramssld['ht_single_product_price_font_color']; ?>;
}

.huge_it_catalog_single_product_page .price-block .old-price {
	text-decoration:line-through;
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_single_product_price_font_size']; ?>px;
	padding:7px 10px 7px 10px;
	margin:0px 10px 0px 0px;
	border-radius:3px;
	color:#<?php echo $paramssld['ht_single_product_background_color']; ?>;
	background:#<?php echo $paramssld['ht_single_product_price_font_color']; ?>;
}



.huge_it_catalog_single_product_page div.right-block .description-block p,.huge_it_catalog_single_product_page div.right-block .description-block {
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:<?php echo $paramssld['ht_single_product_description_font_size']; ?>px;
	color:#<?php echo $paramssld['ht_single_product_description_font_color']; ?>;
}


.huge_it_catalog_single_product_page div.right-block .description-block h1,
.huge_it_catalog_single_product_page div.right-block .description-block h2,
.huge_it_catalog_single_product_page div.right-block .description-block h3,
.huge_it_catalog_single_product_page div.right-block .description-block h4,
.huge_it_catalog_single_product_page div.right-block .description-block h5,
.huge_it_catalog_single_product_page div.right-block .description-block h6,
.huge_it_catalog_single_product_page div.right-block .description-block p,
.huge_it_catalog_single_product_page div.right-block .description-block strong,
.huge_it_catalog_single_product_page div.right-block .description-block span {
	padding:2px !important;
	margin:0px !important;
}

.huge_it_catalog_single_product_page div.right-block .description-block ul,
.huge_it_catalog_single_product_page div.right-block .description-block li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}



.huge_it_catalog_single_product_page .rating-block {
	margin:0px 10px 0px 0px;
	padding:0px;
	font-weight:normal;
	float:left;
        padding: 2% 0px;
}

.huge_it_catalog_single_product_page .rating-block .label {
	display: block;
	float:left;
	line-height:15px;
	margin-right: 5px;
}


.huge_it_catalog_single_product_page .right-block .rating-block ul.rating-stars  {
	background-image:url(<?php echo plugins_url('../images/stars.png', __FILE__); ?>);
	background-repeat: no-repeat;
	background-position: 0px <?php if($rating != 0) echo $rating * (-15); else echo 0; ?>px;
	line-height: 15px;
        height: 15px;
	width: 100px;
	display: table;
	margin: 0px !important;
        padding: 0px !important;
}

.huge_it_catalog_single_product_page .right-block .rating-stars li {
    float: left;
    list-style: none;
    height: 15px;
    width: 19px;
    margin: 0px !important;
    padding: 0px !important;

}

.huge_it_catalog_single_product_page .right-block .rating-stars li input[type='radio'] {
    display: block;
    opacity: 0;
    height: 19px;
    width: 16px;
    margin: 0px !important;
    padding: 0px !important;
    cursor:pointer;
}


.huge_it_catalog_single_product_page .right-block .share_buttons_block {
        padding: 0px;
        font-weight: normal;
        float: left;
        padding: 2% 0px;
        height: auto;

}

.huge_it_catalog_single_product_page .right-block .share_buttons_block .label {
	display: block;
        float: left;
        line-height: 15px;
        margin-right: 6px;
        margin-top: 3%;

}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul {
	display: table;
        margin: 0px 0px 0px 40px !important;
        padding: 0px !important;
        list-style: none !important;
        height: auto;

}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li {
	float:left;
	margin:6px 3px 0px 3px;
        padding: 0;
	background: none;
	list-style: none;

}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li a {
        border:none;
	display:block;
	width: 75px !important;
	height: 26px !important;
        padding: 0 !important;
        margin: 0 !important;
	cursor:pointer;
	text-indent:-9999px !important;
	background-image:url('<?php echo  plugins_url( '../images/share.buttons.png', __FILE__ ); ?>');

}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.facebook a:hover {
    background-position: 0 -28px;

}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.pinterest a:hover {
    background-position: -164px -28px;

}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.twitter a:hover{
	background-position: -82px -28px;

}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.google_plus a:hover{
	background-position: -246px -28px;

}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.facebook a {background-position:left top; }

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.twitter a {background-position:-82px top;}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.pinterest a {background-position:-164px top;}

.huge_it_catalog_single_product_page .right-block .share_buttons_block ul li.google_plus a {background-position:-246px top; }



.huge_it_catalog_single_product_page .order_button {

    margin: 3px 0 5px 0;

}
.huge_it_catalog_single_product_page .contact-seller-block{
	text-align: left;
}
.huge_it_catalog_single_product_page .order_button {
  display: inline-block;
  /*width: 100%;*/
  text-decoration: none;
  font-weight: bold;
  margin: 0px;
  padding: 0px;
  font-size: <?php echo $paramssld['ht_single_product_asc_seller_button_text_size']; ?>px;
  border: none;
  padding: 7px 10px 7px 10px;
  border-radius: <?php echo $paramssld['ht_single_product_asc_seller_button_border_radius']; ?>px;
  color: #<?php echo $paramssld['ht_single_product_asc_seller_button_text_color']; ?>;
  background: #<?php echo $paramssld['ht_single_product_asc_seller_button_background_color']; ?>;
}

.huge_it_catalog_single_product_page .order_button:hover {
  color: #<?php echo $paramssld['ht_single_product_asc_seller_button_text_hover_color']; ?>;
  background: #<?php echo $paramssld['ht_single_product_asc_seller_button_background_hover_color']; ?>;
}



/*###NAYAC CHI###*/

#huge_it_catalog_content_<?php echo $productArray->id; ?> a{
	box-shadow: none;
}

#catalog-order-popup-1 label {
    display: block;
    padding: 6px 0px;
    overflow: hidden;
}

#catalog-order-popup-1 input, #catalog-order-popup-1 textarea {
    display: block;
    width: 100%;
    margin: 6px 0px 0px 0px;
    padding: 6px 0px;
    padding-left: 5px;
    font-size: initial;
    border: <?php echo $paramssld['ht_single_product_asc_to_seller_input_border_size']; ?>px solid #<?php echo $paramssld['ht_single_product_asc_to_seller_input_border_color']; ?>;
}

#catalog-order-popup-1 input::-webkit-input-placeholder, #catalog-order-popup-1 textarea::-webkit-input-placeholder { color: #666666; }
#catalog-order-popup-1 input:-moz-placeholder , #catalog-order-popup-1 textarea:-moz-placeholder { color: #666666; }
#catalog-order-popup-1 input::-moz-placeholder, #catalog-order-popup-1 textarea::-moz-placeholder { color: #666666; }
#catalog-order-popup-1 input:-ms-input-placeholder, #catalog-order-popup-1 textarea:-ms-input-placeholder { color: #666666; }

#catalog-order-popup-1 textarea{
    height: 120px;
}

.order_popup_submit_close{
    display: block;
    text-decoration: none;
    width:98%;
}
.order_popup_submit_close input{
    width: 100% !important;
}
#catalog-order-popup-1 #order_popup_submit {
    font-size: <?php echo $paramssld["ht_single_product_asc_seller_popup_button_text_size"]; ?>px !important;
    font-weight: bold;
    color: #<?php echo $paramssld["ht_single_product_asc_seller_popup_button_text_color"]; ?> !important;
    background: #<?php echo $paramssld["ht_single_product_asc_seller_popup_button_background_color"]; ?> !important;
    border: none;
    height: auto;
}

#catalog-order-popup-1 #order_popup_submit:hover {
    background: #<?php echo $paramssld["ht_single_product_asc_seller_popup_button_background_hover_color"]; ?> !important;
}

#catalog-order-popup-1 .empty::-webkit-input-placeholder { color: #E22828; }

.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.5);
	z-index: 99999;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
}
.modalDialog:target {
	opacity:1;
	pointer-events: auto;
}

.modalDialog > div {
	width: 400px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#<?php echo $paramssld["ht_single_product_asc_seller_popup_background_1"]; ?>, #<?php echo $paramssld["ht_single_product_asc_seller_popup_background_2"]; ?>);
	background: -webkit-linear-gradient(#<?php echo $paramssld["ht_single_product_asc_seller_popup_background_1"]; ?>, #<?php echo $paramssld["ht_single_product_asc_seller_popup_background_2"]; ?>);
	background: -o-linear-gradient(#<?php echo $paramssld["ht_single_product_asc_seller_popup_background_1"]; ?>, #<?php echo $paramssld["ht_single_product_asc_seller_popup_background_2"]; ?>);
}



.catalog-order-popup-close {
        line-height: 25px;
        position: absolute;
        right: 10px;
        text-align: center;
        top: 18px;
        width: 24px;
        text-decoration: none !important;
        border: none !important;
        /*font-weight: bold;*/
        font-size: 27px;
        color: #<?php if($paramssld["ht_single_product_asc_seller_popup_close_style"] == "dark"){ echo "000"; } else { echo "fff"; } ?> !important;
}

.catalog-order-popup-close:hover { color: #<?php if($paramssld["ht_single_product_asc_seller_popup_close_style"] == "dark"){ echo "000"; } else { echo "fff"; } ?> !important; }

#catalog-order-popup-1 h2 {
    font-size: <?php echo $paramssld["ht_single_product_asc_to_seller_text_font_size"]; ?>px !important;
    margin: 10px 0px;
    color: #<?php echo $paramssld["ht_single_product_asc_to_seller_text_font_color"]; ?>;
    display: inline-block;
    padding: 0;
}

.zoomContainer {
    z-index: 99999;
}
.huge-it-catalog-bottom-block {
	clear:both;
	padding-top:20px;
}


.huge_it_catalog_view_tabs {
	<?php if($paramssld["ht_single_product_show_parameters"] == 'on' && $paramssld["ht_single_product_show_comments"] == 'on')
      { ?>
          border-top: 1px solid #<?php echo $paramssld['ht_single_product_tabs_border_color']; ?>;
	<?php } ?>
	margin:0px 0px -1px 0px !important;
	padding:0px !important;
	position:relative;
	list-style:none;
	height:30px;
	clear:both;
}

.huge_it_catalog_view_tabs > li  {
	float:left;
	margin:0px 10px 0px 0px;
        list-style-type: none;
        background: none !important;
}

.huge_it_catalog_view_tabs  > li > a,.huge_it_catalog_view_tabs  > li > a:link,.huge_it_catalog_view_tabs  > li > a:visited {
	display:block;
	height:30px;
	border-bottom:0px;
	text-decoration:none;
	outline:none;
        color: #<?php echo $paramssld["ht_single_product_tabs_font_color"]; ?> !important;
                font-size: 16px;
        <?php if($paramssld["ht_single_product_show_parameters"] == 'on' && $paramssld["ht_single_product_show_comments"] == 'on')
              { ?>
                border: 1px solid #<?php echo $paramssld['ht_single_product_tabs_border_color']; ?>;

        <?php } ?>
                padding:0px 10px !important;
}


.huge_it_catalog_view_tabs  > li > a:hover,.huge_it_catalog_view_tabs  > li > a:focus, .huge_it_catalog_view_tabs  > li > a:active {
	background:#<?php echo $paramssld['ht_single_product_background_color']; ?>;
}

.huge_it_catalog_view_tabs  > li.active > a {
	color: #fff !important;
	height:30px;
	margin:0px 0px -1px 0px !important;
	background: #<?php echo $paramssld['ht_single_product_asc_seller_button_background_color']; ?>;
	border-radius: 2px;
}

.huge_it_catalog_view_tabs_contents {
	margin:0px !important;
	padding:10px 0% 10px 0% !important;
	width:100%;
}

.huge_it_catalog_view_tabs_contents > li {
        margin-top: 1% !important;
	position:relative;
	width:100%;
	float:left;
	display:none;
}

.huge_it_catalog_view_tabs_contents > li.active  {
	display:block;
        margin-top: 10px !important;
}


.huge_it_catalog_view_tabs_contents > li .params-list {
	padding:0px !important;
	margin:0px !important;
	width:100%;
        font-size: 80%
}

.huge_it_catalog_view_tabs_contents > li .params-list li {
	float: left;
        display: block;
        width: 29%;
        height: 27px;
        margin: 0px 0% 10px 0px !important;
        padding: 3px 0px 0px 1% !important;
        background: #f9f7f7;
}

.huge_it_catalog_view_tabs_contents > li .params-list li.parameter-block {
		padding-left: 20px !important;
        text-align: left;
        font-size: 15px;
        overflow: hidden;
        text-overflow: ellipsis;
	color: #<?php echo $paramssld['ht_single_product_params_name_font_color']; ?>;
        /*line-height*/
}


.huge_it_catalog_view_tabs_contents > li .params-list li.value-block {
	padding-left: 20px !important;
	width:69%;
	background: #e2e2e2;
        color: #<?php echo $paramssld['ht_single_product_params_values_font_color']; ?>;
        font-size: 13px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
}

/*UNCHECKED*/

.huge_it_catalog_view_tabs_contents > li   div.has-background {background:#fff;}
.huge_it_catalog_view_tabs_contents > li   div.has-height > div {display:inline-block;}


.huge_it_catalog_view_tabs_contents > li  > div  h3 {
	display:block;
	text-align:center;
	margin:0px 0px 10px 0px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div {
	position:relative;
	clear:both;
	width:100%;
	/*height:60px;*/
	padding:5px 0px 0px 0px;
	margin:0px !important;
}

.huge_it_catalog_view_tabs_contents .reviews-block .review p {
	margin: 0px 0px 10px 0px !important;
        padding: 0px !important;
        line-height: 20px !important;
}

.huge_it_catalog_view_tabs_contents .reviews-block .review p:first-child {
	color: #<?php echo $paramssld["ht_single_product_comments_name_font_color"];?>;
}

.huge_it_catalog_view_tabs_contents .reviews-block .review p:last-child {
	color: #<?php echo $paramssld["ht_single_product_comments_content_font_color"];?>;
        margin-top: 3% !important;
}

.huge_it_catalog_view_tabs_contents .reviews-block .review {
	margin: 0px 0px 10px 0 !important;
        padding: 0px !important;
        line-height: 20px !important;
        border-bottom: 1px solid #<?php echo $paramssld["ht_single_product_tabs_border_color"]; ?>;
}

.huge_it_catalog_view_tabs_contents > li  > div > div label {
	display:inline-block;
	width:60%;
	padding:5px 0px 0px 2%;
	height:30px;
	float:left;
}



.huge_it_catalog_view_tabs_contents > li  > div > div div.slider-container {
	position:relative;
	display: inline-block;
	width: 145px;
	margin-left:-5px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div div.slider-container span {
	position:absolute;
	top:-3px;
	right:0px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div input[type='text'],.huge_it_catalog_view_tabs_contents > li  > div > div select {
	width:100px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div input[type='checkbox'] {
	margin:7px 0px 3px 0px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div.bws_position_table input {
	margin:3px 17px 3px 3px;
}



.huge_it_catalog_view_tabs_contents > li  > div {
	position:relative;
	display:block;
	float:left;
	/*margin:10px 1% 25px 1%;*/
	/*padding:0px 1% 10px 0%;*/
	width: 100%;
	/*background:#f9f9f9;*/
}
.huge_it_catalog_view_tabs_contents > li   div.has-background {background:#fff;}
.huge_it_catalog_view_tabs_contents > li   div.has-height > div {display:inline-block;}


.huge_it_catalog_view_tabs_contents > li  > div  h2 {
	display:block;
	text-align:center;
	margin:0px 0px 10px 0px;
}

/*.huge_it_catalog_view_tabs_contents > li  > div > div {
	position:relative;
	clear:both;
	width:100%;
	height:35px;
	padding:5px 0px 0px 0px;
	margin:0px !important;
}*/

.huge_it_catalog_view_tabs_contents > li  > div > div label {
	display:inline-block;
	width:60%;
	padding:5px 0px 0px 2%;
	height:30px;
	float:left;
}


.huge_it_catalog_view_tabs_contents > li  > div > div div.slider-container {
	position:relative;
	display: inline-block;
	width: 145px;
	margin-left:-5px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div div.slider-container span {
	position:absolute;
	top:-3px;
	right:0px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div input[type='text'],.huge_it_catalog_view_tabs_contents > li  > div > div select {
	width:100px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div input[type='checkbox'] {
	margin:7px 0px 3px 0px;
}

.huge_it_catalog_view_tabs_contents > li  > div > div.bws_position_table input {
	margin:3px 17px 3px 3px;
}

.huge_it_catalog_view_tabs_contents div {
	width: 100%;
}

.huge_it_catalog_view_tabs li a {
	color: #<?php echo $paramssld["ht_single_product_tabs_font_color"];?> !important;

}

.huge_it_catalog_view_tabs_contents .options-block > li:first-child {
	color: #<?php echo $paramssld["ht_single_product_params_tab_words_font_color"];?>;
        font-size: 15px;
        background-color: #<?php echo $paramssld["ht_single_product_background_color"];?>;
        overflow: hidden;
}

.huge_it_catalog_view_tabs_contents .options-block .review {
	display: inline;
}

.huge_it_catalog_view_tabs_contents .options-block li div ,.huge_it_catalog_view_tabs_contents .options-block li:last-child {
	color: #<?php echo $paramssld["ht_single_product_comments_tab_words_font_color"];?>;
        font-size: 15px;
/*        background-color: #<?php echo $paramssld["ht_single_product_background_color"];?>;*/
        /*overflow: hidden;*/
}

.huge_it_catalog_view_tabs_contents #catalog-view-options-1_<?php echo $productArray->id; ?> {

}

.huge_it_catalog_single_product_page .write-rate-block form {
    margin: 0;
    padding: 0;
}

.huge_it_catalog_single_product_page .write-rate-block p {
    margin: 0;
    padding: 0;
}

.huge_it_catalog_single_product_page .write-rate-block input, .huge_it_catalog_single_product_page .write-rate-block label {
	margin: 0%;
        margin-bottom: 10px;
        display: block;
        width: 100%;
}

.huge_it_catalog_single_product_page .write-rate-block input,.huge_it_catalog_single_product_page .write-rate-block textarea, .huge_it_catalog_single_product_page .write-rate-block label.rating-label {
	margin: 0%;
        display: block;
        width: 100%;
        padding: 6px 0px;
}

.huge_it_catalog_single_product_page .write-rate-block textarea {
    min-height: 100px;
    width: 100%;
}


.huge_it_catalog_single_product_page .write-rate-block #comments_submit {
    font-size: <?php echo $paramssld["ht_single_product_comments_submit_button_text_font_size"];?>px;
    color: #<?php echo $paramssld["ht_single_product_comments_submit_button_text_font_color"];?>;
    background: #<?php echo $paramssld["ht_single_product_comments_submit_button_text_background_color"];?>;
    background-color: #<?php echo $paramssld["ht_single_product_comments_submit_button_text_background_color"];?>;
    border: none;
    display: block;
    width: 100%;
}
.huge_it_catalog_single_product_page .write-rate-block #comments_submit:hover {
    color: #<?php echo $paramssld["ht_single_product_comments_submit_button_text_font_hover_color"];?>;
    background-color: #<?php echo $paramssld["ht_single_product_comments_submit_button_text_background_hover_olor"];?>;
    border: none;
}

.huge_it_catalog_single_product_page .write-rate-block .empty {
    border: 1px solid #ff0000;
}

/*
.huge_it_catalog_single_product_page .button-block {
	position:relative;
}

.huge_it_catalog_single_product_page div.right-block .button-block a,.huge_it_catalog_single_product_page div.right-block .button-block a:link,.huge_it_catalog_single_product_page div.right-block .button-block a:visited {
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $paramssld["ht_view3_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view3_linkbutton_color"];?>;
	font-size:<?php echo $paramssld["ht_view3_linkbutton_font_size"];?>;
	text-decoration:none;
}

.huge_it_catalog_single_product_page div.right-block .button-block a:hover,.pupup-elemen.huge_it_catalog_single_product_page div.right-block .button-block a:focus,.huge_it_catalog_single_product_page div.right-block .button-block a:active {
	background:#<?php echo $paramssld["ht_view3_linkbutton_background_hover_color"];?>;
	color:#<?php echo $paramssld["ht_view3_linkbutton_font_hover_color"];?>;
}
*/




/*  ################### MOBILE ################  */



@media only screen and (max-width: 640px) {

/*  ### responsive tabs ###  */

        .huge_it_catalog_view_tabs {
            display: none;
        }

        #catalog-view-options-0_<?php echo $productArray->id; ?> {
            display: block !important;
        }
        #catalog-view-options-1_<?php echo $productArray->id; ?> {
            display: block !important;
        }
        #catalog-view-options-0_<?php echo $productArray->id; ?> .title_for_mobile {
            display: block !important;
        }
        #catalog-view-options-1_<?php echo $productArray->id; ?> .title_for_mobile {
            display: block !important;
        }

/*  ### responsive tabs  OVER ###  */



	.huge_it_catalog_single_product_page > div {
		display:block;
		width:100%;
		clear:both;
	}

	.huge_it_catalog_single_product_page div.left-block,.huge_it_catalog_single_product_page div.right-block {
		clear:both;
		float:none;
		width:100%;
		margin:10px 0px 10px 0px;
	}

	.huge_it_catalog_single_product_page div.left-block .main-image-block {
		clear:both;
		width:100%;
	}

	.huge_it_catalog_single_product_page div.left-block .main-image-block img {
		margin:0px !important;
		padding:0px !important;
		width:100% !important;
		height:auto;
	}

	.huge_it_catalog_single_product_page div.left-block .thumbs-block ul {
		width:100%;
	}



}
.zoomContainer {
    z-index: 10;
}

</style>

        <?php
            if ( is_plugin_active( 'product-catalog-releated-products/product-catalog-releated-products.php' ) ){
                if($paramssld4['ht_catalog_related_products_show'] == "on" && $paramssld4['ht_catalog_related_products_position'] != "bottom"){
                    show_related_products($productArray->id, $carousel_vertical, $paramssld4['ht_catalog_related_products_show_arrows'], "off", $productArray);
                }
            }

        include_once('view_single_product.php');
        ?>



<style>
    .huge-it-related-carousel {
         <?php
            if($paramssld4['ht_catalog_related_products_vertical'] == "true"){ ?>
                display: table;
                margin: 0 !important;
                margin-top: 5px !important;
                padding: 0 !important;
      <?php }
       else { ?>
                /*display: block;*/
                margin: auto;
                margin-right: 4%;
                padding: 0;
                width: 96%;
       <?php } ?>
    }

    .huge-it-related-carousel li {
        margin: 0;
        padding: 0;
        <?php
            if($paramssld4['ht_catalog_related_products_vertical'] == "false"){ ?>
                /*height: <?php echo $paramssld4['ht_catalog_related_products_horizontal_elem_height']; ?>px;*/
                /*max-height: <?php echo $paramssld4['ht_catalog_related_products_horizontal_elem_height']; ?>px;*/
        <?php }
            else{ ?>
                position: relative !important;
                width:  <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px;
      <?php } ?>
    }

    .huge-it-related-carousel li div.RelatedOnHoverVertical {
        border-color: #<?php echo $paramssld4["ht_catalog_related_products_vertical_border_color"]; ?> !important;
    }

    .huge-it-related-carousel li div.RelatedOnHoverHorizontal {
        border-color: #<?php echo $paramssld4["ht_catalog_related_products_horizontal_border_color"]; ?> !important;
    }

    .catalog-related-item-block {
        width: 100%;
        height: calc(100% - 2px);
        height: -moz-calc(100% - 2px);
        height: -webkit-calc(100% - 2px);
        height: calc(100% - 2px);
        height: -o-calc(100% - 2px);
        height: -ms-calc(100% - 2px);
        /*border: 1px solid transparent;*/
    }

    .huge-it-related-carousel li:hover {
        /*width: <?php // echo $paramssld4['ht_catalog_related_products_vertical_elem_width'] * 2; ?>px;*/
    }

    .huge-it-related-carousel li a {
        text-decoration: none;
    }
                                /* <-- Slider Images */
    .huge-it-related-carousel img {
        <?php
            if($paramssld4['ht_catalog_related_products_vertical'] == "false"){ ?>
/*                height: <?php echo $paramssld4['ht_catalog_related_products_horizontal_elem_height']; ?>px;
                max-height: <?php echo $paramssld4['ht_catalog_related_products_horizontal_elem_height']; ?>px;*/
                width: auto !important;
                margin: 0 auto !important;
                display: block;
      <?php }
            else { ?>
                height: auto;
                width: <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width']; ?>px !important;
                vertical-align: middle;
                position: absolute;
                top: 0;
                bottom: 0;
                margin: auto 0 !important;
      <?php } ?>
    }
                                /*     Slider Images --> */

    /* Responsive Slider Images */
    .huge-it-related-carousel.responsive img {
        padding-right: 10px;
    }
        /*  <--  pagination block   */

    .pager-block{

    }
    .cycle-pager {
        position: static;
    }
        /*       pagination block -->  */

    .catalog-related-item-block{
        position: relative;
        <?php
            if($paramssld4['ht_catalog_related_products_vertical'] == "false"){ ?>
                /*border-radius: <?php echo $paramssld4['ht_catalog_related_products_horizontal_border_radius']; ?>px;*/
        <?php }
            else{ ?>
                height: 100%;
                /*border-radius: <?php echo $paramssld4['ht_catalog_related_products_vertical_border_radius']; ?>px;*/
      <?php } ?>
    }

    .catalog-related-caption-block{
        <?php
        if($paramssld4['ht_catalog_related_products_vertical'] == "true" ){ ?>
            position: absolute;
            width: <?php echo $paramssld4['ht_catalog_related_products_vertical_caption_width'] - 8; ?>px;
            font-size: 60%;
            <?php if($paramssld4['ht_catalog_related_products_position'] == "left" ){ ?>
                      right: <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width'] + 3; ?>px;
            <?php }
                  else{ ?>
                      left: <?php echo $paramssld4['ht_catalog_related_products_vertical_elem_width'] + 3; ?>px;
            <?php } ?>
            top: 0;
            padding: 0;
            margin: 0;
            overflow: hidden;
            <?php if( $paramssld4['ht_catalog_related_products_position'] == "left") ?>{
                text-align: right;
            }
  <?php }
        else{ ?>
            position: relative;
            display: block;
            width: 90%;
            height: <?php echo $paramssld4['ht_catalog_related_products_horizontal_caption_height']; ?>px;
            padding: 0;
            margin: 0 auto;
            text-align: center;
  <?php } ?>
    }
    .catalog-related-caption{
        <?php if($paramssld4['ht_catalog_related_products_vertical'] == "true" ){ ?>
                  visibility: hidden;
                  font-size: <?php echo $paramssld4['ht_catalog_related_products_vertical_font_size']; ?>px;
                  color: #<?php echo $paramssld4['ht_catalog_related_products_vertical_font_color']; ?>;
        <?php }
        else{ ?>
                  visibility: visible;
                  font-size: <?php echo $paramssld4['ht_catalog_related_products_horizontal_font_size']; ?>px;
                  color: #<?php echo $paramssld4['ht_catalog_related_products_horizontal_font_color']; ?>;
      <?php }?>
    }
    .catalog-related-caption p{
        margin: 0;
        padding: 0;
        overflow: hidden !important;
        text-overflow: ellipsis;
    }

</style>

<style>
        /* prev / next links */

<?php
      if($paramssld4['ht_catalog_related_products_vertical'] == "false"){ ?>
            .cycle-prev, .cycle-next {
                position: absolute;
                top: 0;
                width: 5%;
                opacity: 0;
                filter: alpha(opacity=0);
                z-index: 800;
                height: 100%;
                cursor: pointer;
            }
            .cycle-prev {
                left: 0;
                background: url(<?php echo plugins_url('../images/leftArrow.png', __FILE__);?>) 10% 50% no-repeat;
                background-color: #c0c0c0;
            }
            .cycle-next {
                right: 0;
                background: url(<?php echo plugins_url('../images/rightArrow.png', __FILE__);?>) 90% 50% no-repeat;
                background-color: #c0c0c0;
            }
            .cycle-prev:hover, .cycle-next:hover {
                opacity: .5;
                filter: alpha(opacity=70);
            }

            .disabled {
                opacity: .5;
                filter:alpha(opacity=50);
            }
<?php }
      else{ ?>
            .cycle-prev, .cycle-next {
                position: absolute;
                /*width: 45%;*/
                height: 5%;
                opacity: 0;
                filter: alpha(opacity=0);
                z-index: 800;
                cursor: pointer;
            }
            .cycle-prev {
                top: 0;
                background: url(<?php echo plugins_url('../images/upArrow.png', __FILE__);?>) 50% 50% no-repeat;
                background-color: #c0c0c0;
            }
            .cycle-next {
                bottom: 0;
                background: url(<?php echo plugins_url('../images/downArrow.png', __FILE__);?>) 50% 50% no-repeat;
                background-color: #c0c0c0;
            }
            .cycle-prev:hover, .cycle-next:hover {
/*                opacity: 0.5;
                filter: alpha(opacity=70); */
            }

            .disabled {
                opacity: .5;
                filter:alpha(opacity=50);
            }
<?php } ?>

    @media (max-width: 1200px) {

        .huge-it-related-carousel li .catalog-related-caption{
            <?php
            if($paramssld4['ht_catalog_related_products_vertical'] == "true"){ ?>
                display: none;
          <?php  } ?>
        }
    }
    @media (max-width: 640px) {
        .huge-it-related-carousel{
            <?php
            if($paramssld4['ht_catalog_related_products_vertical'] == "true"){ ?>
                display: none;
                float: none !important;
     <?php  } ?>
        }
        .huge_it_catalog_single_product_page{
            <?php
            if($paramssld4['ht_catalog_related_products_vertical'] == "true"){ ?>
                width: 98%;
                float: none !important;
     <?php  } ?>
        }

         /* <--  Carousel Horizontalling */

        .huge-it-related-carousel {
            <?php
                if($paramssld4['ht_catalog_related_products_vertical'] == "true"){ ?>
                    margin: auto;
                    margin-right: 2%;
                    padding: 0;
                    width: 98%;
          <?php } ?>
        }

        .huge-it-related-carousel img {
             <?php
                if($paramssld4['ht_catalog_related_products_vertical'] == "true"){ ?>
                    position: relative;
                    width: auto !important;
                    margin: 0 auto !important;
                    display: block;
                <?php } ?>
        }

        .catalog-related-item-block{
            <?php
                if($paramssld4['ht_catalog_related_products_vertical'] == "true"){ ?>
                    position: relative;
                <?php } ?>
        }

        .catalog-related-caption-block{
    <?php
        if($paramssld4['ht_catalog_related_products_vertical'] == "true"){ ?>
            position: relative;
            display: block;
            width: 90%;
            height: <?php echo $paramssld4['ht_catalog_related_products_horizontal_caption_height']; ?>px;
            padding: 0;
            margin: 0 auto;
            text-align: center;
            left: 0;
            right: 0;
    <?php } ?>
    }
    .huge-it-related-carousel li .catalog-related-caption{
    <?php
        if($paramssld4['ht_catalog_related_products_vertical'] == "true"){ ?>
            display: block;
            visibility: visible;
            font-size: <?php echo $paramssld4['ht_catalog_related_products_horizontal_font_size']; ?>px;
            color: #<?php echo $paramssld4['ht_catalog_related_products_horizontal_font_color']; ?>;
  <?php } ?>
    }

    /* slider horizontallimg --> */

        .cycle-prev, .cycle-next {
                position: absolute;
                top: 0;
                width: 5%;
                opacity: 0.5;
                filter: alpha(opacity=70);
                z-index: 800;
                height: 100%;
                cursor: pointer;
            }
            .cycle-prev {
                left: 0;
                background: url(<?php echo plugins_url('../images/leftArrow.png', __FILE__);?>) 10% 50% no-repeat;
                background-color: #c0c0c0;
            }
            .cycle-next {
                right: 0;
                background: url(<?php echo plugins_url('../images/rightArrow.png', __FILE__);?>) 90% 50% no-repeat;
                background-color: #c0c0c0;
            }
            .disabled {
                opacity: .5;
                filter:alpha(opacity=50);
            }

    }

@media (min-width: 640px) {
    .huge-it-related-carousel{
    <?php
      if($paramssld4['ht_catalog_related_products_position'] == "left"){ ?>
          float: left;
          padding-left: <?php echo $paramssld4['ht_catalog_related_products_vertical_caption_width'] + 3; ?>px !important;
          margin-left: -<?php echo $paramssld4['ht_catalog_related_products_vertical_caption_width'] + 3; ?>px !important;
<?php }
      else{
          if($paramssld4['ht_catalog_related_products_position'] == "right"){ ?>
              float:right;
              padding-right: <?php echo $paramssld4['ht_catalog_related_products_vertical_caption_width']; ?>px !important;
              margin-right: -<?php echo $paramssld4['ht_catalog_related_products_vertical_caption_width']; ?>px !important;
    <?php }
      }
?>
}

    .cycle-carousel-wrap{
        <?php if($paramssld4['ht_catalog_related_products_position'] == "left"){ ?>
            left: <?php echo $paramssld4['ht_catalog_related_products_vertical_caption_width'] - 3; ?>px !important;
        <?php } ?>
    }
}

</style>

    <?php
            if ( is_plugin_active( 'product-catalog-releated-products/product-catalog-releated-products.php' ) ){
                if($paramssld4['ht_catalog_related_products_show'] == "on" && $paramssld4['ht_catalog_related_products_position'] == "bottom"){
                    show_related_products($productArray->id, $carousel_vertical, $paramssld4['ht_catalog_related_products_show_arrows'], "off", $productArray);
                }
            }
    ?>


<script>

jQuery(window).load(function(){
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        horizontal_slider_load_function();
        related_horizontal_carousel_call();
    }
    else{
        if(<?php echo $paramssld4['ht_catalog_related_products_vertical']; ?>  == true){
            vertical_slider_load_function();
            related_vertical_container_resize();
   	}
    	else{
      	    horizontal_slider_load_function();
        }
    }
});

jQuery(document).ready(function(){
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
       jQuery(".huge-it-related-carousel").css({"display" : "block"});
    }
    else{
        related_carousel_call();
    }
    related_carousel_ready_styles();
});

jQuery(window).resize(function(){
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
        return false;
    }
    else{
        if(<?php  echo $paramssld4['ht_catalog_related_products_vertical']; ?> == false){
            related_horizontal_container_resize();
        }
        else{
            related_vertical_container_resize();
        }
    }
});

function horizontal_slider_load_function(){
        var kayficent = <?php echo $paramssld4['ht_catalog_related_products_horizontal_elem_width'] / $paramssld4['ht_catalog_related_products_horizontal_elem_height']; ?>;
        var container_width = jQuery(".huge-it-related-carousel").parent().width() * 0.96;
        var elements_max_width = container_width / <?php echo $paramssld4['ht_catalog_related_products_visible_count']; ?>;
        var element_max_height = elements_max_width  / kayficent;
        jQuery(".huge-it-related-carousel li").width(elements_max_width);
        jQuery(".huge-it-related-carousel li .catalog-related-item-block").height(element_max_height);
        jQuery(".huge-it-related-carousel li img").height(element_max_height);

        var caption_and_elem_height = element_max_height + parseInt(<?php echo $paramssld4['ht_catalog_related_products_horizontal_caption_height'] + $paramssld4['ht_catalog_related_products_horizontal_border_size']; ?>);
        jQuery(".huge-it-related-carousel li").height(caption_and_elem_height);
        jQuery(".huge-it-related-carousel").attr("huge-it-carousel-horizontal-li-width", elements_max_width);
        jQuery(".huge-it-related-carousel").attr("huge-it-carousel-horizontal-li-height", caption_and_elem_height);
}
function vertical_slider_load_function(){
        var elements_max_height = 1;
        jQuery(".huge-it-related-carousel li").each(function(){
            if(jQuery(this).find("img").height() > elements_max_height ){
                elements_max_height = jQuery(this).find("img").height();
            }
        });
        elements_max_height = elements_max_height + parseInt(10);       //      img bottom padding
        jQuery(".huge-it-related-carousel li").height(elements_max_height);
        jQuery(".huge-it-related-carousel li .catalog-related-caption-block").height(elements_max_height);
        var carousel_height = <?php echo $paramssld4['ht_catalog_related_products_visible_count']; ?> * elements_max_height;
        jQuery(".huge-it-related-carousel").height(carousel_height);

        var product_width = jQuery('.huge_it_catalog_single_product_page').width();
        jQuery(".huge-it-related-carousel").attr("huge-it-single-prod-width", product_width);
        var elements_max_width = jQuery(".huge-it-related-carousel li").width();
        jQuery(".huge-it-related-carousel").attr("huge-it-carousel-horizontal-li-width", elements_max_width);
        var elements_max_height = jQuery(".huge-it-related-carousel li").height();
        jQuery(".huge-it-related-carousel").attr("huge-it-carousel-vertical-li-width", elements_max_height);
}
function related_horizontal_container_resize(){
        var image = '.huge-it-related-carousel li .catalog-related-item-block img';
        var li = '.huge-it-related-carousel li';
        var new_li_width = jQuery(li).width();
        var old_li_width = jQuery(".huge-it-related-carousel").attr("huge-it-carousel-horizontal-li-width");
        var old_li_height = jQuery(".huge-it-related-carousel").attr("huge-it-carousel-horizontal-li-height");
        var new_li_height = old_li_height * new_li_width / old_li_width;
        jQuery(li).height(new_li_height);
        var li_minus_caption_height = new_li_height - parseInt(<?php  echo $paramssld4['ht_catalog_related_products_horizontal_caption_height'] + $paramssld4['ht_catalog_related_products_horizontal_border_size']; ?>);
        var elem_new_height = new_li_height - parseInt(<?php  echo $paramssld4['ht_catalog_related_products_horizontal_caption_height'] + $paramssld4['ht_catalog_related_products_horizontal_border_size']; ?>);
        jQuery(image).height(li_minus_caption_height);
        jQuery('.huge-it-related-carousel li .catalog-related-item-block').height(elem_new_height);
}
function related_vertical_container_resize(){
        var image = '.huge-it-related-carousel li .catalog-related-item-block img';
        var li = '.huge-it-related-carousel li';
        var caption = jQuery(li).find(".catalog-related-caption-block");
        var old_li_width  = jQuery(".huge-it-related-carousel").attr("huge-it-carousel-horizontal-li-width");
        var old_li_height = jQuery(".huge-it-related-carousel").attr("huge-it-carousel-vertical-li-width");
        var product = '.huge_it_catalog_single_product_page';
        var product_old_width = jQuery(".huge-it-related-carousel").attr("huge-it-single-prod-width");
        var product_new_width = jQuery(product).width();
        var new_li_width = product_new_width * old_li_width / product_old_width;
        var new_li_height = old_li_height * new_li_width / old_li_width;
            jQuery(li).width(new_li_width);
            jQuery(".huge-it-related-carousel .cycle-prev, .huge-it-related-carousel .cycle-next").width(new_li_width);
            jQuery(li).height(new_li_height);
        var caption_old_width = <?php echo $paramssld4['ht_catalog_related_products_vertical_caption_width']; ?>;
        var caption_old_height = old_li_height;
        var caption_new_height = new_li_height * 0.7;
        var caption_new_width  = product_new_width  * caption_old_width   / product_old_width * 0.7;
        var left_position = new_li_width + 10;
        if("<?php echo $paramssld4['ht_catalog_related_products_position']; ?>" == "right"){
            jQuery(".catalog-related-caption-block").css({"left" : left_position});
        }
        else{
            jQuery(".catalog-related-caption-block").css({"right" : left_position});
        }
            caption.height(new_li_height);
            jQuery(caption).width(caption_new_width);
            new_li_width = new_li_width +10;
            if(jQuery(document).width() > 640){
                var product_width = "calc(94% - "+new_li_width+"px)";
                var moz_product_width = "-moz-calc(94% - "+new_li_width+"px)";
                var webkit_product_width = "-webkit-calc(94% - "+new_li_width+"px)";
                jQuery(product).css({"width" : moz_product_width});
                jQuery(product).css({"width" : webkit_product_width});
                jQuery(product).css({"width" : product_width});
            }else{
                var product_width = "98%";
                jQuery(product).css({"width" : product_width});
            }


            var carousel_height = <?php echo $paramssld4['ht_catalog_related_products_visible_count']; ?> * new_li_height;
            jQuery(".huge-it-related-carousel").height(carousel_height);

}
function related_carousel_call(){
    jQuery( '.huge-it-related-carousel' ).cycle({
        fx: "carousel",
        slides: "li",
        autoHeight: "calc",
        log: true,
        delay: <?php echo $paramssld4['ht_catalog_related_products_delay']; ?>,
        timeout: <?php echo $autoplay_speed; ?>,
        carouselVisible: <?php echo $paramssld4['ht_catalog_related_products_visible_count']; ?>,
        carouselFluid: <?php echo $fullWithProducts; ?>,
        allowWrap: <?php echo $paramssld4['ht_catalog_related_products_circular']; ?>,
        pauseOnHover: "<?php echo $paramssld4['ht_catalog_related_products_pause_on_hover']; ?>",
        speed: <?php echo $paramssld4['ht_catalog_related_products_changing_speed']; ?>,
        carouselVertical: <?php echo $paramssld4['ht_catalog_related_products_vertical']; ?>
    });
}
function related_horizontal_carousel_call(){
        jQuery( '.huge-it-related-carousel' ).cycle({
        fx: "carousel",
        slides: "li",
        autoHeight: "calc",
        log: true,
        delay: <?php echo $paramssld4['ht_catalog_related_products_delay']; ?>,
        timeout: <?php echo $autoplay_speed; ?>,
        carouselVisible: <?php echo $paramssld4['ht_catalog_related_products_visible_count']; ?>,
        carouselFluid: <?php echo $fullWithProducts; ?>,
        allowWrap: <?php echo $paramssld4['ht_catalog_related_products_circular']; ?>,
        pauseOnHover: "<?php echo $paramssld4['ht_catalog_related_products_pause_on_hover']; ?>",
        speed: <?php echo $paramssld4['ht_catalog_related_products_changing_speed']; ?>,
        carouselVertical: false
    });
}
function related_carousel_ready_styles(){
    setTimeout(function(){ jQuery(".huge-it-related-carousel .cycle-prev, .huge-it-related-carousel .cycle-next").removeClass("disabled"); }, 300);
    jQuery(".huge-it-related-carousel").hover(function() {
        jQuery(this).find(".cycle-prev, .cycle-next").css({"opacity" : "0.5", "filter" : "alpha(opacity=70)"});
    },function(){
        jQuery(this).find(".cycle-prev, .cycle-next").css({"opacity" : "0", "filter" : "alpha(opacity=0)"});
    });
    if(<?php echo $paramssld4['ht_catalog_related_products_vertical']; ?>  == true){
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){}
        else{
            var arrow_width = jQuery(".huge-it-related-carousel li").width();
            jQuery(".huge-it-related-carousel .cycle-prev, .huge-it-related-carousel .cycle-next").width(arrow_width);
            jQuery(".huge-it-related-carousel li").each(function(){
                jQuery(this).find(".catalog-related-item-block").css({"border" : "<?php echo $paramssld4["ht_catalog_related_products_vertical_border_size"]; ?>px solid transparent"});
            });
            jQuery(".huge-it-related-carousel li").hover(function() {
                jQuery(this).find(".catalog-related-item-block").addClass("RelatedOnHoverVertical");
                jQuery(this).find(".catalog-related-caption").css({"visibility" : "visible"});
            },function(){
                jQuery(this).find(".catalog-related-item-block").removeClass("RelatedOnHoverVertical");
                jQuery(this).find(".catalog-related-caption").css({"visibility" : "hidden"});
            });
        }
    }
    else{
        jQuery(".huge-it-related-carousel li").each(function(){
            jQuery(this).find(".catalog-related-item-block").css({"border" : "<?php echo $paramssld4["ht_catalog_related_products_horizontal_border_size"]; ?>px solid transparent"});
        });
        jQuery(".huge-it-related-carousel li").hover(function() {
                jQuery(this).find(".catalog-related-item-block").addClass("RelatedOnHoverHorizontal");
            },function(){
                jQuery(this).find(".catalog-related-item-block").removeClass("RelatedOnHoverHorizontal");
            });
    }
}

function product_thumbs_click(){

var lightbox_is = allowLightbox;
    if(lightbox_is != "on"){
        jQuery(".huge_it_catalog_container .left-block .thumbs-block .thumbs-list li a img").click(function(e){
            e.preventDefault();
            var new_src = jQuery(this).attr("src");
            var container = jQuery(this).closest(".huge_it_catalog_container");
            var image_block = container.find(".left-block .main-image-block");
            var image = image_block.find("a img");

                image.attr("src", new_src);

                var new_img_height = image.height();
                container.find(".zoomWrapper").height(new_img_height);

                zoom_resize();
        });
    }

}

        // bind filter on select change
jQuery(document).ready(function(){
    jQuery('#huge_it_catalog_filters ul li').click(function() {
      // get filter value from option value
      var filterValue = jQuery(this).attr('rel');
      // use filterFn if matches value
      filterValue = filterValue;//filterFns[ filterValue ] ||
      $container.hugeitmicro({ filter: filterValue });
    });

});

jQuery(document).ready(function($) {
    product_thumbs_click();
});

jQuery(document).ready(function () {
	jQuery('.huge_it_catalog_view_tabs > li > a').click(function(){
		jQuery('.huge_it_catalog_view_tabs > li').removeClass('active');
		jQuery(this).parent().addClass('active');
		jQuery('.huge_it_catalog_view_tabs_contents > li').removeClass('active');
		var liID=jQuery(this).attr('href');
		jQuery(liID).addClass('active');
                return false;
	});

        jQuery(".order_button").click(function(){
            jQuery(".modalDialog").css({ 'opacity': '1','pointer-events':'auto' });
	});
        jQuery(".catalog-order-popup-close").click(function(){
            jQuery(".modalDialog").css({ 'opacity': '0','pointer-events':'none' });
	});

        jQuery('#comments_submit').click(function(){
//            if(jQuery("#captchaInputValue").val() == <?php echo $captcha_val; ?>){
                var comments_name = jQuery("#comments_name").val();
                var author_comment = jQuery("#author_comment").val();
                var ip = jQuery(".huge_it_catalog_product_ip").val();
                var spam =  jQuery(".huge_it_catalog_spam").val();
                var product_id =  jQuery(".huge_it_catalog_product_id").val();
                var captcha_val = jQuery("#captchaInputValue").val();
                if(comments_name == "" || author_comment == "" || captcha_val == ""){
                    if(comments_name == ""){ jQuery("#comments_name").addClass("empty"); }
                    else{ jQuery("#comments_name").removeClass("empty"); }

                    if(jQuery("#author_comment").val() == ""){ jQuery("#author_comment").addClass("empty"); }
                    else{ jQuery("#author_comment").removeClass("empty"); }

                    if(captcha_val == ""){ jQuery("#captchaInputValue").addClass("empty"); }
                    else{ jQuery("#captchaInputValue").removeClass("empty"); }

                    return false;
                }
                else{
                    jQuery("#comments_name,#author_comment,#captchaInputValue").removeClass("empty");
                var data = {
                    action: 'my_action',
                    post: 'applyproductcommentfromuser',
                    comments_name: comments_name,
                    spam: spam,
                    ip: ip,
                    product_id: product_id,
                    author_comment: author_comment,
                    captcha_val: captcha_val
                };

                jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", data, function(response) {
                    response = JSON.parse(response);      //       alert(response.captcha1 + " " + response.captcha2);
                    if(response.index == 1){
                        if( jQuery(".reviews-block .review").text().length == 0 ) { jQuery(".reviews-block").text(""); }
                        jQuery(".reviews-block").append("<div class='review'><p style='font-weight: bold;'>"+ comments_name +"</p><p>" + author_comment + "</p></div>");
                        jQuery("#comments_name").removeAttr('value');
                        jQuery("#author_comment").removeAttr('value');
                        jQuery("#captchaInputValue").removeAttr('value');
                        jQuery("#captchaInputValue").attr("placeholder",response.captcha1 +" + "+response.captcha2 + " = ?");
                        jQuery("#captchaInputValue").parent().find(".invalid").text("");
                    }
                    if(response.index == 2){
                        jQuery("#captchaInputValue").parent().find(".invalid").text("<?php echo $paramssld3["ht_single_product_invalid_captcha_text"]; ?>").css({ "color" : "#E22828" });
                    }
                });
                return false;
                }
        });

        jQuery('.order_popup_submit_close').click(function(e){
            e.preventDefault();
                var user_name       = jQuery("#catalog-order-popup-1 .asc_seller_name").val();
                var user_mail       = jQuery("#catalog-order-popup-1 .asc_seller_mail").val();
                var user_phone      = jQuery("#catalog-order-popup-1 .asc_seller_phone").val();
                var user_massage    = jQuery("#catalog-order-popup-1 .asc_seller_massage").val();
                var user_product_id = jQuery("#catalog-order-popup-1 .asc_seller_product_id").val();
                var user_spam       = jQuery("#catalog-order-popup-1 .asc_seller_spam").val();
                var captcha_val     = jQuery("#catalog-order-popup-1 .captchaInputValue").val();
                var product_name    = jQuery(".right-block .title-block h2").text();
                var user_ip         = jQuery("#catalog-order-popup-1 .huge_it_catalog_product_ip").val();
                var captchaSum      = jQuery("#catalog-order-popup-1 #captcha_sum").val();
                var emailCheck=/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
                    if(user_name == "" || user_mail == ""  || user_phone == ""  || user_massage == ""  || user_product_id == "" || captcha_val == "" || captcha_val != <?php echo $captcha_val; ?>){
                        jQuery("#catalog-order-popup-1 input[type=text], #catalog-order-popup-1 textarea").each(function(){
                            if(!jQuery(this).val()){        //        alert(jQuery(this).attr("name"));
                                jQuery(this).addClass("empty");
                            }
                            else{ jQuery(this).removeClass("empty"); }
                        });
                        if(captcha_val != <?php echo $captcha_val; ?>){
                            jQuery("#catalog-order-popup-1").find(".invalid").text("<?php echo $paramssld3["ht_single_product_invalid_captcha_text"]; ?>").css({ "color" : "#E22828" });
                        }
                        return false;
                    }
                    else{
                        var email_path = jQuery("#catalog-order-popup-1 .asc_seller_mail");
                        if(!(emailCheck.test(user_mail))){
                            jQuery(email_path).val("").attr("placeholder", "Invalid Email").addClass("empty");
                            return false;
                        }
                        else{
                            jQuery(email_path).removeClass("empty").attr("placeholder", "<?php echo $paramssld3["ht_single_product_your_mail_text"]; ?>");
                        var data = {
                            action: 'my_action',
                            post: 'applyproductascsellerfromuser',
                            user_name: user_name,
                            user_mail: user_mail,
                            user_phone: user_phone,
                            user_product_id: user_product_id,
                            user_massage: user_massage,
                            user_spam: user_spam,
                            user_ip: user_ip,
                            captcha_val: captcha_val,
                            product_name:   product_name,
                            captcha_sum: captchaSum
                        };

                        jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", data, function(response) {    //    alert(response);
                            response = JSON.parse(response);
                            if(response.index == 1){
                                if( jQuery(".reviews-block .review").text().length == 0 ) { jQuery(".reviews-block").text(""); }
                                jQuery("#catalog-order-popup-1 .asc_seller_name").removeAttr('value');
                                jQuery("#catalog-order-popup-1 .asc_seller_mail").removeAttr('value');
                                jQuery("#catalog-order-popup-1 .asc_seller_phone").removeAttr('value');
                                jQuery("#catalog-order-popup-1 .asc_seller_massage").removeAttr('value');
                                jQuery("#catalog-order-popup-1 .captchaInputValue").val("").attr("placeholder",response.captcha1 +" + "+response.captcha2 + " = ?").parent().find(".invalid").text("");
                                jQuery("#catalog-order-popup-1 input[type=text]").each(function(){
                                    jQuery(this).removeClass("empty");
                                });
                                window.location = jQuery('.order_popup_submit_close').attr("href");
                            }
                            if(response.index == 2){
                                jQuery("#catalog-order-popup-1").find(".invalid").text("<?php echo $paramssld3["ht_single_product_invalid_captcha_text"]; ?>").css({ "color" : "#E22828" });
                                return false;
                            }
                        });

                    }
                }
                jQuery(".modalDialog").css({ 'opacity': '0','pointer-events':'none' });

        });

            jQuery(".rating-stars li").hover(function() {
                var rate_val = jQuery(this).find("input").val();
                var background_margin = (rate_val * 15);

                jQuery(this).parent().css({
                    'background-position' : '0px -' + background_margin + 'px'
                });
           },function(){
                    if(jQuery(this).parent().hasClass('rated')){
                            var rateis=jQuery(this).parent().attr('data-rateis')*15;
                            jQuery(this).parent().css({
                                    'background-position' : '0px -'+rateis+'px'
                            });
                    }else{
                       jQuery(this).parent().css({
                                    'background-position' : '0px  <?php echo $rating * (-15) ; ?>px'
                            });
                    }
            });


           jQuery(".rating-stars li input[type='radio']").click(function(){
               var strthis=jQuery(this);
               var rate_val = jQuery(this).val();
               var ip = jQuery(".huge_it_catalog_product_ip").val();
               var spam =  jQuery(".huge_it_catalog_spam").val();
               var product_id =  jQuery(".huge_it_catalog_product_id").val();
               var data = {
                    action: 'my_action',
                    post: 'productratingfromuser',
                    spam: spam,
                    ip: ip,
                    product_id: product_id,
                    rate_val: rate_val
               };


               jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", data, function(response) {     //    alert(response.index);
                    response = JSON.parse(response);
                    if(response.index == 1){
                        var newrate = response.rating;      //      alert(newrate);
                        jQuery(strthis).parent().parent().addClass('rated').attr('data-rateis',newrate);
                        jQuery(strthis).parent().parent().css({
                                     'background-position' : '0px -' + newrate*15 + 'px'
                        });

                    }
               });
           });

});

    window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
    Share = {
        url: "",
	vkontakte: function(purl, ptitle, pimg, text) {

		url  = 'http://vkontakte.ru/share.php?';

		url += 'url='          + encodeURIComponent(purl);

		url += '&title='       + encodeURIComponent(ptitle);

		url += '&description=' + encodeURIComponent(text);

		url += '&image='       + encodeURIComponent(pimg);

		url += '&noparse=true';

		Share.popup(url);

	},

	odnoklassniki: function(purl, text) {

		url  = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';

		url += '&st.comments=' + encodeURIComponent(text);

		url += '&st._surl='    + encodeURIComponent(purl);

		Share.popup(url);

	},

	facebook: function(purl, ptitle, pimg, text) {

		url  = 'http://www.facebook.com/sharer.php?s=100';

		url += '&p[title]='     + encodeURIComponent(ptitle);

		url += '&p[summary]='   + encodeURIComponent(text);

		url += '&p[url]='       + encodeURIComponent(purl);

		url += '&p[images][0]=' + encodeURIComponent(pimg);
                console.log(url);

		Share.popup(url);


	},

	twitter: function(purl, ptitle) {

		url  = 'http://twitter.com/share?';

		url += 'text='      + encodeURIComponent(ptitle);

		url += '&url='      + encodeURIComponent(purl);

		url += '&counturl=' + encodeURIComponent(purl);

		Share.popup(url);

	},

	mailru: function(purl, ptitle, pimg, text) {

		url  = 'http://connect.mail.ru/share?';

		url += 'url='          + encodeURIComponent(purl);

		url += '&title='       + encodeURIComponent(ptitle);

		url += '&description=' + encodeURIComponent(text);

		url += '&imageurl='    + encodeURIComponent(pimg);

		Share.popup(url)

	},

	google: function(purl) {

		url  = 'https://plus.google.com/share?';

		url += '&url='      + encodeURIComponent(purl);

		Share.popup(url);

	},


	popup: function(url) {
		window.open(url,'','toolbar=0,status=0,width=626,height=436');
	}

};
</script>
  <?php return ob_get_clean(); ?>
<?php  } ?>


    