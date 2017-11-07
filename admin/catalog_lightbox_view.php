<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if (function_exists('current_user_can'))
    if (!current_user_can('manage_options')) {
        die(__('Access Denied',"product-catalog"));
    }
if (!function_exists('current_user_can')) {
    die(__('Access Denied',"product-catalog"));
}

function      html_showStyles($param_values, $op_type)
{
    ?>
<script>
function display_zoom_type(){
    if(jQuery("#ht_catalog_zoom_window_type").val() == "window"){
        jQuery("#ht_catalog_zoom_window_type").parent().nextAll().css({"display" : "",});
        jQuery(".tint-options").css({"display" : "block",});
    }
    else{
        jQuery("#ht_catalog_zoom_window_type").parent().nextAll().css({"display" : "none",});
        jQuery(".tint-options").css({"display" : "none",});
    }
}

jQuery(document).ready(function () {
	popupsizes(jQuery('#light_box_size_fix'));
	function popupsizes(checkbox){
			if(checkbox.is(':checked')){
				jQuery('.lightbox-options-block .not-fixed-size').css({'display':'none'});
				jQuery('.lightbox-options-block .fixed-size').css({'display':'block'});
			}else {
				jQuery('.lightbox-options-block .fixed-size').css({'display':'none'});
				jQuery('.lightbox-options-block .not-fixed-size').css({'display':'block'});
			}
		}
	jQuery('#light_box_size_fix').change(function(){
		popupsizes(jQuery(this));
	});
	
	
	jQuery('input[data-slider="true"]').bind("slider:changed", function (event, data) {
		 jQuery(this).parent().find('span').html(parseInt(data.value)+"%");
		 jQuery(this).val(parseInt(data.value));
	});	
});
jQuery(document).ready(function () {
	var strliID=jQuery(location).attr('hash');
	//alert(strliID);
	jQuery('#catalog-view-tabs li').removeClass('active');
	if(jQuery('#catalog-view-tabs li a[href="'+strliID+'"]').length>0){
		jQuery('#catalog-view-tabs li a[href="'+strliID+'"]').parent().addClass('active');
	}else {
		jQuery('#catalog-view-tabs li a[href="#lightbox-options"]').parent().addClass('active');
	}
	jQuery('#catalog-view-tabs-contents li').removeClass('active');
	strliID=strliID;
	//alert(strliID);
	if(jQuery(strliID).length>0){
		jQuery(strliID).addClass('active');
	}else {
		jQuery('#lightbox-options').addClass('active');
	}
	jQuery('input[data-slider="true"]').bind("slider:changed", function (event, data) {
		 jQuery(this).parent().find('span').html(parseInt(data.value)+"%");
		 jQuery(this).val(parseInt(data.value));
	});
        
        jQuery(".help").hover(function () {
            jQuery(this).find(".help-block").addClass("active");
        },
        function () {
            jQuery(this).find(".help-block").removeClass("active");
        });
        
        jQuery("#ht_catalog_zoom_window_type").change(function(){
            display_zoom_type();
        });
        
        jQuery("#ht_catalog_zoom_lens_size_fix").change(function(){
            display_sizes();
        });
});
jQuery(window).load(function(){
        display_zoom_type();
});
</script>

<div id="poststuff">
    <?php $path_site2 = plugins_url("../images", __FILE__);
    require "product-catalog-admin-free-banner.php";
    ?>
        <div style="clear:both;"></div>
    <div style="color: #a00; width: 40%; margin: 15px auto;"><?php echo __("These features are available in the Professional version of the plugin only.","product-catalog");?>
        <a href="http://huge-it.com/product-catalog/" target="_blank" class="button button-primary red_pro_button">Enable</a>
    </div>
    <div id="post-body-content" class="catalog-options">            
            <div id="post-body-heading"><h3><?php echo __("Image View Options","product-catalog");?></h3>
                <a onclick="document.getElementById('adminForm').submit()" onclick="" class="save-catalog-options button-primary"><?php echo __("Save","product-catalog");?></a>
            </div>
            <div id="catalog-options-list">

                <ul id="catalog-view-tabs" >
                    <li><a href="#lightbox-options"><?php echo __("Lightbox Options","product-catalog");?></a></li>
                    <li><a href="#zoom-options"><?php echo __("Zoom Options","product-catalog");?></a></li>
                </ul>
                <div class="catalog_options_grey_overlay"></div>
                <ul class="options-block catalog-grey-wrapper" id="catalog-view-tabs-contents">
                    <li id="lightbox-options">
                        <div class="lightbox-options-block">
                            <h3><?php echo __("Internationalization","product-catalog");?></h3>
                            <?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                            //if ( !(is_plugin_active( 'lightbox/lightbox.php' ) )) {
                            ?>
                            <div class="has-background">
                                <label for="light_box_style"><?php echo __("Lightbox style","product-catalog");?></label>
                                <select id="light_box_style" name="params[light_box_style]">
                                    <option <?php if($param_values['light_box_style'] == '1'){ echo 'selected="selected"'; } ?> value="1">1</option>
                                    <option <?php if($param_values['light_box_style'] == '2'){ echo 'selected="selected"'; } ?> value="2">2</option>
                                    <option <?php if($param_values['light_box_style'] == '3'){ echo 'selected="selected"'; } ?> value="3">3</option>
                                    <option <?php if($param_values['light_box_style'] == '4'){ echo 'selected="selected"'; } ?> value="4">4</option>
                                    <option <?php if($param_values['light_box_style'] == '5'){ echo 'selected="selected"'; } ?> value="5">5</option>
                                </select>
                            </div>
                            <?php //} ?>
                            <div>
                                <label for="light_box_transition"><?php echo __("Transition type","product-catalog");?></label>
                                <select id="light_box_transition" name="params[light_box_transition]">
                                    <option <?php if($param_values['light_box_transition'] == 'elastic'){ echo 'selected="selected"'; } ?> value="elastic">Elastic</option>
                                    <option <?php if($param_values['light_box_transition'] == 'fade'){ echo 'selected="selected"'; } ?> value="fade"><?php echo __("Fade","product-catalog");?></option>
                                    <option <?php if($param_values['light_box_transition'] == 'none'){ echo 'selected="selected"'; } ?> value="none"><?php echo __("None","product-catalog");?></option>
                                </select>
                            </div>
                            <div class="has-background">
                                <label for="light_box_speed"><?php echo __("Opening speed","product-catalog");?></label>
                                <input type="number" name="params[light_box_speed]" id="light_box_speed" value="<?php echo $param_values["light_box_speed"]; ?>" class="text">
                                <span>ms</span>
                            </div>
                            <div>
                                <label for="light_box_fadeout"><?php echo __("Closing speed","product-catalog");?></label>
                                <input type="number" name="params[light_box_fadeout]" id="light_box_fadeout" value="<?php echo $param_values["light_box_fadeout"]; ?>" class="text">
                                <span>ms</span>
                            </div>
                            <div class="has-background">
                                <label for="light_box_title"><?php echo __("Show the title","product-catalog");?></label>
                                <input type="hidden" value="false" name="params[light_box_title]" />
                                <input type="checkbox" id="light_box_title"  <?php if($param_values['light_box_title']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_title]" value="true" />
                            </div>
                            <div>
                                <label for="light_box_opacity"><?php echo __("Overlay transparency","product-catalog");?></label>
                                <div class="slider-container">
                                    <input name="params[light_box_opacity]" id="light_box_opacity" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['light_box_opacity']; ?>" />
                                    <span><?php echo $param_values['light_box_opacity']; ?>%</span>
                                </div>
                            </div>
                            <div class="has-background">
                                <label for="light_box_open"><?php echo __("Auto open","product-catalog");?></label>
                                <input type="hidden" value="false" name="params[light_box_open]" />
                                <input type="checkbox" id="light_box_open"  <?php if($param_values['light_box_open']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_open]" value="true" />
                            </div>
                            <div>
                                <label for="light_box_overlayclose"><?php echo __("Overlay close","product-catalog");?> <?php if($param_values['light_box_overlayclose']){ echo "true"; } ?></label>
                                <input type="hidden" value="false" name="params[light_box_overlayclose]" />
                                <input type="checkbox" id="light_box_overlayclose"  <?php if($param_values['light_box_overlayclose']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_overlayclose]" value="true" />
                            </div>
                            <div class="has-background">
                                <label for="light_box_esckey">Esc<?php echo __("Key close","product-catalog");?></label>
                                <input type="hidden" value="false" name="params[light_box_esckey]" />
                                <input type="checkbox" id="light_box_esckey"  <?php if($param_values['light_box_esckey']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_esckey]" value="true" />
                            </div>
                            <div>
                                <label for="light_box_arrowkey"><?php echo __("Keyboard navigation","product-catalog");?></label>
                                <input type="hidden" value="false" name="params[light_box_arrowkey]" />
                                <input type="checkbox" id="light_box_arrowkey"  <?php if($param_values['light_box_arrowkey']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_arrowkey]" value="true" />
                            </div>
                            <div class="has-background">
                                <label for="light_box_loop"><?php echo __("Loop content","product-catalog");?></label>
                                <input type="hidden" value="false" name="params[light_box_loop]" />
                                <input type="checkbox" id="light_box_loop"  <?php if($param_values['light_box_loop']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_loop]" value="true" />
                            </div>
                            <div>
                                <label for="light_box_closebutton"><?php echo __("Show close button","product-catalog");?></label>
                                <input type="hidden" value="false" name="params[light_box_closebutton]" />
                                <input type="checkbox" id="light_box_closebutton"  <?php if($param_values['light_box_closebutton']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_closebutton]" value="true" />
                            </div>
                        </div>
                        <div class="lightbox-options-block">
                            <h3><?php echo __("Dimensions","product-catalog");?></h3>

                            <div class="has-background">
                                <label for="light_box_size_fix"><?php echo __("Popup size fix","product-catalog");?></label>
                                <input type="hidden" value="false" name="params[light_box_size_fix]" />
                                <input type="checkbox" id="light_box_size_fix"  <?php if($param_values['light_box_size_fix']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_size_fix]" value="true" />
                            </div>

                            <div class="fixed-size" >
                                <label for="light_box_width"><?php echo __("Popup width","product-catalog");?></label>
                                <input type="number" name="params[light_box_width]" id="light_box_width" value="<?php echo $param_values["light_box_width"]; ?>" class="text">
                                <span>px</span>
                            </div>

                            <div class="has-background fixed-size">
                                <label for="light_box_height"><?php echo __("Popup height","product-catalog");?></label>
                                <input type="number" name="params[light_box_height]" id="light_box_height" value="<?php echo $param_values["light_box_height"]; ?>" class="text">
                                <span>px</span>
                            </div>

                            <div class="not-fixed-size">
                                <label for="light_box_maxwidth"><?php echo __("Popup maxWidth","product-catalog");?></label>
                                <input type="number" name="params[light_box_maxwidth]" id="light_box_maxwidth" value="<?php echo $param_values["light_box_maxwidth"]; ?>" class="text">
                                <span>px</span>
                            </div>
                            <div class="has-background not-fixed-size">
                                <label for="light_box_maxheight"><?php echo __("Popup maxHeight","product-catalog");?></label>
                                <input type="number" name="params[light_box_maxheight]" id="light_box_maxheight" value="<?php echo $param_values["light_box_maxheight"]; ?>" class="text">
                                <span>px</span>
                            </div>
                            <div>
                                <label for="light_box_initialwidth"><?php echo __("Popup initial width","product-catalog");?></label>
                                <input type="number" name="params[light_box_initialwidth]" id="light_box_initialwidth" value="<?php echo $param_values["light_box_initialwidth"]; ?>" class="text">
                                <span>px</span>
                            </div>
                            <div class="has-background">
                                <label for="light_box_initialheight"><?php echo __("Popup initial height","product-catalog");?></label>
                                <input type="number" name="params[light_box_initialheight]" id="light_box_initialheight" value="<?php echo $param_values["light_box_initialheight"]; ?>" class="text">
                                <span>px</span>
                            </div>
                        </div>
                        <div class="lightbox-options-block">
                            <h3><?php echo __("Slideshow","product-catalog");?></h3>

                            <div class="has-background">
                                <label for="light_box_slideshow"><?php echo __("Slideshow","product-catalog");?></label>
                                <input type="hidden" value="false" name="params[light_box_slideshow]" />
                                <input type="checkbox" id="light_box_slideshow"  <?php if($param_values['light_box_slideshow']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_slideshow]" value="true" />
                            </div>
                            <div>
                                <label for="light_box_slideshowspeed"><?php echo __("Slideshow interval","product-catalog");?></label>
                                <input type="number" name="params[light_box_slideshowspeed]" id="light_box_slideshowspeed" value="<?php echo $param_values["light_box_slideshowspeed"]; ?>" class="text">
                                <span>ms</span>
                            </div>
                            <div class="has-background">
                                <label for="light_box_slideshowauto"><?php echo __("Slideshow auto start","product-catalog");?></label>
                                <input type="hidden" value="false" name="params[light_box_slideshowauto]" />
                                <input type="checkbox" id="light_box_slideshowauto"  <?php if($param_values['light_box_slideshowauto']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_slideshowauto]" value="true" />
                            </div>
                            <div>
                                <label for="light_box_slideshowstart"><?php echo __("Slideshow start button text","product-catalog");?></label>
                                <input type="text" name="params[light_box_slideshowstart]" id="light_box_slideshowstart" value="<?php echo $param_values["light_box_slideshowstart"]; ?>" class="text">
                            </div>
                            <div class="has-background">
                                <label for="light_box_slideshowstop"><?php echo __("Slideshow stop button text","product-catalog");?></label>
                                <input type="text" name="params[light_box_slideshowstop]" id="light_box_slideshowstop" value="<?php echo $param_values["light_box_slideshowstop"]; ?>" class="text">
                            </div>
                        </div>
                        <div class="lightbox-options-block has-height">
                            <h3><?php echo __("Slideshow","product-catalog");?><?php echo __("Positioning","product-catalog");?></h3>

                            <div class="has-background">
                                <label for="light_box_fixed"><?php echo __("Slideshow","product-catalog");?><?php echo __("Fixed position","product-catalog");?></label>
                                <input type="hidden" value="false" name="params[light_box_fixed]" />
                                <input type="checkbox" id="light_box_fixed"  <?php if($param_values['light_box_fixed']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[light_box_fixed]" value="true" />
                            </div>
                            <div class="has-height">
                                <label for=""><?php echo __("Popup position","product-catalog");?></label>
                                <div>
                                    <table class="bws_position_table">
                                        <tbody>
                                        <tr>
                                            <td><input type="radio" value="1" id="slideshow_title_top-left" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == '1'){ echo 'checked="checked"'; } ?> /></td>
                                            <td><input type="radio" value="2" id="slideshow_title_top-center" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == '2'){ echo 'checked="checked"'; } ?> /></td>
                                            <td><input type="radio" value="3" id="slideshow_title_top-right" name="params[slider_title_position]"  <?php if($param_values['slider_title_position'] == '3'){ echo 'checked="checked"'; } ?> /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" value="4" id="slideshow_title_middle-left" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == '4'){ echo 'checked="checked"'; } ?> /></td>
                                            <td><input type="radio" value="5" id="slideshow_title_middle-center" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == '5'){ echo 'checked="checked"'; } ?> /></td>
                                            <td><input type="radio" value="6" id="slideshow_title_middle-right" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == '6'){ echo 'checked="checked"'; } ?> /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" value="7" id="slideshow_title_bottom-left" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == '7'){ echo 'checked="checked"'; } ?> /></td>
                                            <td><input type="radio" value="8" id="slideshow_title_bottom-center" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == '8'){ echo 'checked="checked"'; } ?> /></td>
                                            <td><input type="radio" value="9" id="slideshow_title_bottom-right" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == '9'){ echo 'checked="checked"'; } ?> /></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </form>
        </li>


        <!-- VIEW 1 -->
        <li id="zoom-options">
            <div>
                <h3><?php echo __("Slideshow","product-catalog");?><?php echo __("Zoom Window Options","product-catalog");?></h3>
                <div class="has-background">
                    <label for="ht_catalog_zoom_window_type"><?php echo __("Zoom Type","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Give width size for zoom window","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <select name="params[ht_catalog_zoom_window_type]" id="ht_catalog_zoom_window_type">
                        <option value="window" <?php if($param_values['ht_catalog_zoom_window_type'] == "window") echo "selected='selected' " ?>><?php echo __("Window","product-catalog");?></option>
                        <option value="lens" <?php if($param_values['ht_catalog_zoom_window_type'] == "lens") echo "selected='selected' " ?>><?php echo __("Lens","product-catalog");?></option>
                        <option value="inner" <?php if($param_values['ht_catalog_zoom_window_type'] == "inner") echo "selected='selected' " ?>><?php echo __("Inner","product-catalog");?></option>
                    </select>
                </div>
                <div>
                    <label for="ht_catalog_zoom_window_width"><?php echo __("Zoom Window Width","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Give height size for zoom window","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="text" name="params[ht_catalog_zoom_window_width]" id="ht_catalog_zoom_window_width" value="<?php echo $param_values['ht_catalog_zoom_window_width']; ?>" class="text" />
                    <span>px</span>
                </div>
                <div class="has-background">
                    <label for="ht_catalog_zoom_window_height"><?php echo __("Zoom Window Height","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Choose the position of window by x-asis","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="text" name="params[ht_catalog_zoom_window_height]" id="ht_catalog_zoom_window_height" value="<?php echo $param_values['ht_catalog_zoom_window_height']; ?>" class="text" />
                    <span>px</span>
                </div>
                <div class="">
                    <label for="ht_catalog_zoom_x_asis">X-<?php echo __("Axis Offset","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p>X-<?php echo __("Choose the position of window by x-asis","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="text" name="params[ht_catalog_zoom_x_asis]" id="ht_catalog_zoom_x_asis" value="<?php echo $param_values['ht_catalog_zoom_x_asis']; ?>" class="text" />
                    <span>px</span>
                </div>
                <div class="has-background">
                    <label for="ht_catalog_zoom_y_asis">Y-<?php echo __("Axis Offset","product-catalog");?>Asis
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p>Y-<?php echo __("Choose position of window by y-asis","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="text" name="params[ht_catalog_zoom_y_asis]" id="ht_catalog_zoom_y_asis" value="<?php echo $param_values['ht_catalog_zoom_y_asis']; ?>" class="text" />
                    <span>px</span>
                </div>
                <div class="">
                    <label for="ht_catalog_zoom_window_position"><?php echo __("Zoom Window Position","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Zoom window position by sides","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <select name="params[ht_catalog_zoom_window_position]" id="ht_catalog_zoom_window_position">
                        <option value="16" <?php if($param_values['ht_catalog_zoom_window_position'] == '16') echo "selected='selected' " ?>><?php echo __("Right-Top","product-catalog");?></option>
                        <option value="4" <?php if($param_values['ht_catalog_zoom_window_position'] == '4') echo "selected='selected' " ?>><?php echo __("Right-Bottom","product-catalog");?></option>
                        <option value="12" <?php if($param_values['ht_catalog_zoom_window_position'] == '12') echo "selected='selected' " ?>><?php echo __("Left-Top","product-catalog");?></option>
                        <option value="8" <?php if($param_values['ht_catalog_zoom_window_position'] == '8') echo "selected='selected' " ?>><?php echo __("Left-Bottom","product-catalog");?></option>
                    </select>
                    <span>px</span>
                </div>
                <div class="has-background">
                    <label for="ht_catalog_zoom_window_border_size"><?php echo __("Zoom Window Border Size","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Pick up size for zoom window border","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="text" name="params[ht_catalog_zoom_window_border_size]" id="ht_catalog_zoom_window_border_size" value="<?php echo $param_values['ht_catalog_zoom_window_border_size']; ?>" class="text" />
                    <span>px</span>
                </div>
                <div class="">
                    <label for="ht_catalog_zoom_window_border_color"><?php echo __("Zoom Window Border Color","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Pick up color for zoom window border","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input name="params[ht_catalog_zoom_window_border_color]" type="text" class="color" id="ht_catalog_zoom_window_border_color" value="#<?php echo $param_values['ht_catalog_zoom_window_border_color']; ?>" size="10" />
                    <span>px</span>
                </div>
                <!--                                        <div class="has-background" style="display: none;">
                                                <label for="ht_catalog_zoom_window_lens_size">Zoom Window Lens Size
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Used when zoomType set to lens, when zoom type is set to window, then the lens size is auto calculated</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[ht_catalog_zoom_window_lens_size]" id="ht_catalog_zoom_window_lens_size" value="<?php echo $param_values['ht_catalog_zoom_window_lens_size']; ?>" class="text" />
                                                <span>px</span>
                                        </div>-->
                <div class="has-background">
                    <label for="ht_catalog_zoom_thumbs_zoom"><?php echo __("Allow Zoom On Thumbnails","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Select to allow zooming the thumbnail images Tint Options","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="hidden" value="off" name="params[ht_catalog_zoom_thumbs_zoom]" />
                    <input type="checkbox" name="params[ht_catalog_zoom_thumbs_zoom]" id="ht_catalog_zoom_thumbs_zoom"  <?php if($param_values['ht_catalog_zoom_thumbs_zoom']  == 'on'){ echo 'checked="checked"'; } ?> value="on" />
                </div>
            </div>

            <div class="tint-options">
                <h3>Tint Options</h3>
                <div class="has-background">
                    <label for="ht_catalog_zoom_tint"><?php echo __("Enable Tint","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Select to have transparent overlay out of zoom window","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="hidden" value="false" name="params[ht_catalog_zoom_tint]" />
                    <input type="checkbox" name="params[ht_catalog_zoom_tint]" id="ht_catalog_zoom_tint"  <?php if($param_values['ht_catalog_zoom_tint']  == 'true'){ echo 'checked="checked"'; } ?> value="true" />
                </div>
                <div class="">
                    <label for="ht_catalog_zoom_tint_colour"><?php echo __("Tint colour","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Choose a color for tint overlay","product-catalog");?> #hex, <?php echo __("word(red, blue), or","product-catalog");?>  rgb(x, x, x)</p>
                            </div>
                        </div>
                    </label>
                    <input name="params[ht_catalog_zoom_tint_colour]" type="text" class="color" id="ht_catalog_zoom_tint_colour" value="#<?php echo $param_values['ht_catalog_zoom_tint_colour']; ?>" size="10" />
                </div>
                <div class="has-background">
                    <label for="ht_catalog_zoom_tint_opacity"><?php echo __("Tint Opacity","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Chose transparency level for overlay,which is out of zoom window","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <div class="slider-container">
                        <input name="params[ht_catalog_zoom_tint_opacity]" id="ht_catalog_zoom_tint_opacity" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['ht_catalog_zoom_tint_opacity']; ?>" />
                        <span><?php echo $param_values['ht_catalog_zoom_tint_opacity']; ?>%</span>
                    </div>
                </div>
                <div class="">
                    <label for="ht_catalog_zoom_tint_fadein"><?php echo __("Tint FadeIn Speed","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Set fade-in speed for lens overlay","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="text" name="params[ht_catalog_zoom_tint_fadein]" id="ht_catalog_zoom_tint_fadein" value="<?php echo $param_values['ht_catalog_zoom_tint_fadein']; ?>" class="text" />
                </div>
                <div class="has-background">
                    <label for="ht_catalog_zoom_tint_fadeout"><?php echo __("Tint FadeOut Speed","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Set fade-out speed for lens overlay","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="text" name="params[ht_catalog_zoom_tint_fadeout]" id="ht_catalog_zoom_tint_fadeout" value="<?php echo $param_values['ht_catalog_zoom_tint_fadeout']; ?>" class="text" />
                </div>
            </div>

            <div>
                <h3><?php echo __("Lens Options","product-catalog");?></h3>
                <div class="has-background">
                    <label for="ht_catalog_zoom_lens_fadein"><span id="changing-label-1"><?php echo __("Window Fade In Speed","product-catalog");?></span>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Set fade-in speed for lens overlay","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="text" name="params[ht_catalog_zoom_lens_fadein]" id="ht_catalog_zoom_lens_fadein" value="<?php echo $param_values['ht_catalog_zoom_lens_fadein']; ?>" class="text" />
                </div>
                <div class="">
                    <label for="ht_catalog_zoom_lens_fadeout"><span id="changing-label-2"><?php echo __("Window Fade Out Speed","product-catalog");?></span>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Set fade-out speed for lens overlay","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="text" name="params[ht_catalog_zoom_lens_fadeout]" id="ht_catalog_zoom_lens_fadeout" value="<?php echo $param_values['ht_catalog_zoom_lens_fadeout']; ?>" class="text" />
                </div>
                <div class="has-background" style="display: none;">
                    <label for="ht_catalog_zoom_lens_hide"><?php echo __("Zoom Lens","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Choose lens type Lens Color. Choose color overlay inside zoom lens","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="hidden" value="false" name="params[ht_catalog_zoom_lens_hide]" />
                    <input type="checkbox" name="params[ht_catalog_zoom_lens_hide]" id="ht_catalog_zoom_lens_hide"  <?php if($param_values['ht_catalog_zoom_lens_hide']  == 'true'){ echo 'checked="checked"'; } ?> value="true" />
                </div>
                <div class="has-background">
                    <label for="ht_catalog_zoom_lens_shape"><?php echo __("Lens Shape","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Choose lens type","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <select name="params[ht_catalog_zoom_lens_shape]" id="ht_catalog_zoom_lens_shape">
                        <option value="square" <?php if($param_values['ht_catalog_zoom_lens_shape'] == 'square') echo "selected='selected' " ?>><?php echo __("Square","product-catalog");?></option>
                        <option value="round" <?php if($param_values['ht_catalog_zoom_lens_shape'] == 'round') echo "selected='selected' " ?>><?php echo __("Round","product-catalog");?></option>
                    </select>
                </div>
                <div class="">
                    <label for="ht_catalog_zoom_lens_color"><?php echo __("Lens Color","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Choose color overlay inside zoom lens","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input name="params[ht_catalog_zoom_lens_color]" type="text" class="color" id="ht_catalog_zoom_lens_color" value="#<?php echo $param_values['ht_catalog_zoom_lens_color']; ?>" size="10" />
                </div>
                <div class="has-background">
                    <label for="ht_catalog_zoom_lens_opacity"><?php echo __("Lens Opacity","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __(" Choose opacity level for overlay inside zoom lens","product-catalog");?> 0</p>
                            </div>
                        </div>
                    </label>
                    <div class="slider-container">
                        <input name="params[ht_catalog_zoom_lens_opacity]" id="ht_catalog_zoom_lens_opacity" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['ht_catalog_zoom_lens_opacity']; ?>" />
                        <span><?php echo $param_values['ht_catalog_zoom_lens_opacity']; ?>%</span>
                    </div>
                </div>
                <div class="">
                    <label for="ht_catalog_zoom_cursor"><?php echo __("Cursor","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("The default cursor is usually the arrow, then set the cursor is a pointer and cross icon","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <select name="params[ht_catalog_zoom_cursor]" id="ht_catalog_zoom_cursor">
                        <option value="default" <?php if($param_values['ht_catalog_zoom_cursor'] == 'default') echo "selected='selected' " ?>><?php echo __("Default","product-catalog");?></option>
                        <option value="crosshair" <?php if($param_values['ht_catalog_zoom_cursor'] == 'crosshair') echo "selected='selected' " ?>><?php echo __("Crosshair","product-catalog");?></option>
                        <option value="none" <?php if($param_values['ht_catalog_zoom_cursor'] == 'none') echo "selected='selected' " ?>><?php echo __("None","product-catalog");?></option>
                    </select>
                </div>
                <div class="has-background">
                    <label for="ht_catalog_zoom_easing"><?php echo __("Easing","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __("Select for smoothly movement in lens view","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="hidden" value="false" name="params[ht_catalog_zoom_easing]" />
                    <input type="checkbox" name="params[ht_catalog_zoom_easing]" id="ht_catalog_zoom_easing"  <?php if($param_values['ht_catalog_zoom_easing']  == 'true'){ echo 'checked="checked"'; } ?> value="true" />
                </div>
                <!--                                        <div class="">
                                                <label for="ht_catalog_zoom_lens_size_fix">Lens Size Fix
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Set to true to activate zoom on mouse scroll.</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="hidden" value="false" name="params[ht_catalog_zoom_lens_size_fix]" />
                                                <input type="checkbox" name="params[ht_catalog_zoom_lens_size_fix]" id="ht_catalog_zoom_lens_size_fix"  <?php if($param_values['ht_catalog_zoom_lens_size_fix']  == 'true'){ echo 'checked="checked"'; } ?> value="true" />
                                        </div>-->
                <div class="" id="lens-zoom-scroll">
                    <label for="ht_catalog_zoom_scrollzoom"><?php echo __("Lens Zoom Scroll","product-catalog");?>
                        <div class="help">?
                            <div class="help-block">
                                <span class="pnt"></span>
                                <p><?php echo __(" Select to be able to scroll the zoomInner. Inner type of zoom icon","product-catalog");?></p>
                            </div>
                        </div>
                    </label>
                    <input type="hidden" value="false" name="params[ht_catalog_zoom_scrollzoom]" />
                    <input type="checkbox" name="params[ht_catalog_zoom_scrollzoom]" id="ht_catalog_zoom_scrollzoom"  <?php if($param_values['ht_catalog_zoom_scrollzoom']  == 'true'){ echo 'checked="checked"'; } ?> value="true" />
                </div>
                <!--                                        <div class="has-background lens_width">
                                                 <label for="ht_catalog_zoom_lens_width">Lens Fixed Width
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Lens Fixed Width</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[ht_catalog_zoom_lens_width]" id="ht_catalog_zoom_lens_width" value="<?php echo $param_values['ht_catalog_zoom_lens_width']; ?>" class="text" />
                                        </div>
                                        <div class=" lens_height">
                                                 <label for="params[ht_catalog_zoom_lens_height">Lens Fixed height
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Lens Fixed height</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[ht_catalog_zoom_lens_height]" id="ht_catalog_zoom_lens_height" value="<?php echo $param_values['ht_catalog_zoom_lens_height']; ?>" class="text" />
                                        </div>-->
            </div>
        </li>

        </ul>

                <div id="post-body-footer">
                        <a onclick="" class="save-catalog-options button-primary"><?php echo __("Save","product-catalog");?></a>
                        <div class="clear"></div>
                </div>
            </div>
    </div>  
</div>
<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>


<script>
    jQuery("#post-body-heading a, #post-body-footer a").click(function(){
        alert('<?php echo __("Product Catalog Settings are disabled in free version. If you need those functionalityes, you need to buy the commercial version.","product-catalog");?>');return false;
    });
    
</script>


<?php
}