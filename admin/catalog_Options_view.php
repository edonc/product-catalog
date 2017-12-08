<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
if (function_exists('current_user_can'))
    if (!current_user_can('delete_pages')) {
        die(__('Access Denied', "product-catalog"));
    }
if (!function_exists('current_user_can')) {
    die(__('Access Denied', "product-catalog"));
}

function html_showStyles($param_values, $op_type)
{
    ?>
    <script>

        jQuery(document).ready(function () {
            var strliID = jQuery(location).attr('hash');
            //alert(strliID);
            jQuery('#catalog-view-tabs li').removeClass('active');
            if (jQuery('#catalog-view-tabs li a[href="' + strliID + '"]').length > 0) {
                jQuery('#catalog-view-tabs li a[href="' + strliID + '"]').parent().addClass('active');
            } else {
                jQuery('#catalog-view-tabs li a[href="#catalog-view-options-0"]').parent().addClass('active');
            }
            jQuery('#catalog-view-tabs-contents li').removeClass('active');
            strliID = strliID;
            //alert(strliID);
            if (jQuery(strliID).length > 0) {
                jQuery(strliID).addClass('active');
            } else {
                jQuery('#catalog-view-options-0').addClass('active');
            }
            jQuery('input[data-slider="true"]').bind("slider:changed", function (event, data) {
                jQuery(this).parent().find('span').html(parseInt(data.value) + "%");
                jQuery(this).val(parseInt(data.value));
            });
        });
    </script>
    <div class="wrap">

        <?php $path_site2 = plugins_url("../images", __FILE__); ?>

        <div id="poststuff">
            <?php $path_site2 = plugins_url("../images/", __FILE__); ?>
            <?php $path_site2 = plugins_url("../images", __FILE__);
            require "product-catalog-admin-free-banner.php";
            ?>
            <div style="clear:both;"></div>
            <div style="color: #a00; width: 40%; margin: 15px auto;"><?php echo __("These features are available in the Professional version of the plugin only.", "product-catalog"); ?>
                <a href="https://huge-it.com/product-catalog/" target="_blank"
                   class="button button-primary red_pro_button">Enable</a>
            </div>
            <div id="post-body-content" class="catalog-options">
                <div id="post-body-heading">
                    <h3><?php echo __("Themes Options", "product-catalog"); ?></h3>

                    <a class="save-catalog-options button-primary"><?php echo __("Save"); ?></a>

                </div>
                <form action="admin.php?page=Options_product_Catalog_styles&task=save" method="post" id="adminForm"
                      name="adminForm">
                    <div id="catalog-options-list">

                        <ul id="catalog-view-tabs">
                            <li>
                                <a href="#catalog-view-options-0"><?php echo __("Blocks Toggle Up/Down", "product-catalog"); ?></a>
                            </li>
                            <li>
                                <a href="#catalog-view-options-1"><?php echo __("Full-Height Blocks", "product-catalog"); ?></a>
                            </li>
                            <li>
                                <a href="#catalog-view-options-2"><?php echo __("Catalog/Content-Popup", "product-catalog"); ?></a>
                            </li>
                            <li>
                                <a href="#catalog-view-options-3"><?php echo __("Full-Width Blocks", "product-catalog"); ?></a>
                            </li>
                            <li>
                                <a href="#catalog-view-options-5"><?php echo __("Content Slider", "product-catalog"); ?></a>
                            </li>
                        </ul>

                        <ul class="options-block catalog-grey-wrapper" id="catalog-view-tabs-contents">
                            <li id="catalog-view-options-0">
                                <div>
                                    <h3><?php echo __("View Types", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view0_allow_lightbox"><?php echo __("Allow Lightbox", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view0_allow_lightbox]"/>
                                        <input type="checkbox" id="ht_view0_allow_lightbox"
                                               name="params[ht_view0_allow_lightbox]" value="on"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_allow_zooming"><?php echo __("Allow Zooming", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view0_allow_zooming]"/>
                                        <input type="checkbox" id="ht_view0_allow_zooming"
                                               name="params[ht_view0_allow_zooming]" value="on"/>
                                    </div>
                                    <div id="natural_zoom_warning" style="display: none">
                                        <span class="pnt"></span>
                                        <p><?php _e('NOTE: Zoom option in Blocks Toggle Up/Down View works with Resize Image behaviour element only!', 'product-catalog'); ?></p>
                                    </div>
                                </div>
                                <div>
                                    <h3><?php _e('Element Styles', 'product-catalog'); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view0_image_behaviour"><?php echo __("Element's Image Behaviour", "product-catalog"); ?></label>
                                        <select id="ht_view0_image_behaviour" name="params[ht_view0_image_behaviour]">
                                            <option value="crop"><?php echo __("Natural", "product-catalog"); ?></option>
                                            <option value="resize"><?php echo __("Resize", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="ht_view0_element_background_color"><?php echo __("Element Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_element_background_color]" type="text"
                                               class="color" id="ht_view0_element_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_element_border_width"><?php echo __("Element Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_element_border_width]"
                                               id="ht_view0_element_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view0_element_border_color"><?php echo __("Element Border Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_element_border_color]" type="text" class="color"
                                               id="ht_view0_element_border_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_togglebutton_style"><?php echo __("Toggle Button Style", "product-catalog"); ?></label>
                                        <select id="ht_view0_togglebutton_style"
                                                name="params[ht_view0_togglebutton_style]">
                                            <option value="light"><?php echo __("Light", "product-catalog"); ?></option>
                                            <option value="dark"><?php echo __("Dark", "product-catalog"); ?>Dark
                                            </option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="ht_view0_show_separator_lines"><?php echo __("Show Separator Lines", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view0_show_separator_lines]"/>
                                        <input type="checkbox" id="ht_view0_show_separator_lines"
                                               name="params[ht_view0_show_separator_lines]" value="on"/>
                                    </div>
                                </div>
                                <div style="margin-top: -105px">
                                    <h3><?php echo __("Main Image", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view0_block_width"><?php echo __("Main Image Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_block_width]" id="ht_view0_block_width"
                                               value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view0_block_height"><?php echo __("Main Image Height", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_block_height]"
                                               id="ht_view0_block_height" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                </div>
                                <div style="margin-top: 14px;">
                                    <h3><?php echo __("Title", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view0_title_font_size"><?php echo __("Title Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_title_font_size]"
                                               id="ht_view0_title_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view0_title_font_color"><?php echo __("Title Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_title_font_color]" type="text" class="color"
                                               id="ht_view0_title_font_color" value="#" size="10"/>
                                    </div>
                                </div>

                                <div style="margin-top:-40px; display: none;">
                                    <h3><?php echo __("as", "product-catalog"); ?>Sorting styles</h3>
                                    <div class="has-background" style="display: none;">
                                        <label for="ht_view0_show_sorting"><?php echo __("Show Sorting", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view0_show_sorting]"/>
                                        <input type="checkbox" id="ht_view0_show_sorting"
                                               name="params[ht_view0_show_sorting]" value="on"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_sortbutton_font_size"><?php echo __("Sort Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_sortbutton_font_size]"
                                               id="ht_view0_sortbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_sortbutton_font_color"><?php echo __("Sort Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_sortbutton_font_color]" type="text" class="color"
                                               id="ht_view0_sortbutton_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_sortbutton_hover_font_color"><?php echo __("Sort Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_sortbutton_hover_font_color]" type="text"
                                               class="color" id="ht_view0_sortbutton_hover_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_sortbutton_background_color"><?php echo __("Sort Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_sortbutton_background_color]" type="text"
                                               class="color" id="ht_view0_sortbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_sortbutton_hover_background_color"><?php echo __("Sort Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_sortbutton_hover_background_color]" type="text"
                                               class="color" id="ht_view0_sortbutton_hover_background_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="" style="display: none;">
                                        <label for="ht_view0_sortbutton_border_width"><?php echo __("Sort Button Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_sortbutton_border_width]"
                                               id="ht_view0_sortbutton_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <input name="params[ht_view0_sortbutton_border_color]" type="text" class="color"
                                               id="ht_view0_sortbutton_border_color" value="#FFFFFF" size="10"/>
                                        <label for="ht_view0_sortbutton_border_color"><?php echo __("Sort Button Border Color", "product-catalog"); ?></label>
                                    </div>
                                    <div>
                                        <label for="ht_view0_sortbutton_border_radius"><?php echo __("Sort Button Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_sortbutton_border_radius]"
                                               id="ht_view0_sortbutton_border_radius" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_sortbutton_border_padding"><?php echo __("Sort Button Padding", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_sortbutton_border_padding]"
                                               id="ht_view0_sortbutton_border_padding" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <label for="ht_view0_sortbutton_margin"><?php echo __("Sort Button Margins", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_sortbutton_margin]"
                                               id="ht_view0_sortbutton_margin" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view0_sorting_float"><?php echo __("Sort block Position", "product-catalog"); ?></label>
                                        <select id="ht_view0_sorting_float" name="params[ht_view0_sorting_float]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                            <option value="top"><?php echo __("Light", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_sorting_name_by_default"><?php echo __("Sort By Default Bottom Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_sorting_name_by_default]" type="text"
                                               id="ht_view0_sorting_name_by_default" value="" size="10" class="text"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_sorting_name_by_id"><?php echo __("Sorting By ID Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_sorting_name_by_id]" type="text"
                                               id="ht_view0_sorting_name_by_id" value="" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_sorting_name_by_name"><?php echo __("Sorting By ID Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_sorting_name_by_name]" type="text"
                                               id="ht_view0_sorting_name_by_name" value="" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_sorting_name_by_random"><?php echo __("Random Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_sorting_name_by_random]" type="text"
                                               id="ht_view0_sorting_name_by_random" value="" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_sorting_name_by_asc"><?php echo __("Ascending Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_sorting_name_by_asc]" type="text"
                                               id="ht_view0_sorting_name_by_asc" value="" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_sorting_name_by_desc"><?php echo __("Descending Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_sorting_name_by_desc]" type="text"
                                               id="ht_view0_sorting_name_by_desc" value="" size="10"/>
                                    </div>
                                </div>

                                <div style="margin-top: -105px">
                                    <h3><?php echo __("Thumbnails", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view0_show_thumbs"><?php echo __("Show Thumbnails", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view0_show_thumbs]"/>
                                        <input type="checkbox" id="ht_view0_show_thumbs"
                                               name="params[ht_view0_show_thumbs]" value="on"/>
                                    </div>
                                    <div>
                                        <label for="ht_view0_thumbs_position"><?php echo __("Thumbnails Position", "product-catalog"); ?></label>
                                        <select id="ht_view0_thumbs_position" name="params[ht_view0_thumbs_position]">
                                            <option value="before"><?php echo __("Before Description", "product-catalog"); ?></option>
                                            <option value="after"><?php echo __("After Description", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_thumbs_width"><?php echo __("Thumbnails Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_thumbs_width]"
                                               id="ht_view0_thumbs_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                </div>


                                <div>
                                    <h3><?php echo __("Description", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view0_show_description"><?php echo __("Show Description", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view0_show_description]"/>
                                        <input type="checkbox" id="ht_view0_show_description"
                                               name="params[ht_view0_show_description]" value="on"/>
                                    </div>
                                    <div>
                                        <label for="ht_view0_description_font_size"><?php echo __("Description Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_description_font_size]"
                                               id="ht_view0_description_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_description_color"><?php echo __("Description Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_description_color]" type="text" class="color"
                                               id="ht_view0_description_color" value="#FFFFFF" size="10"/>
                                    </div>
                                </div>

                                <div style="margin-top: 14px; display: none;">
                                    <h3><?php echo __("Category styles", "product-catalog"); ?></h3>

                                    <div style="display: none;">
                                        <label for="ht_view0_show_filtering"><?php echo __("Show Filtering", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view0_show_filtering]"/>
                                        <input type="checkbox" id="ht_view0_show_filtering"
                                               name="params[ht_view0_show_filtering]" value="on"/>
                                    </div>

                                    <div class="has-background">
                                        <label for="ht_view0_filterbutton_font_size"><?php echo __("Filter Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_filterbutton_font_size]"
                                               id="ht_view0_filterbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_filterbutton_font_color"><?php echo __("Filter Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_filterbutton_font_color]" type="text" class="color"
                                               id="ht_view0_filterbutton_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_filterbutton_hover_font_color"><?php echo __("Filter Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_filterbutton_hover_font_color]" type="text"
                                               class="color" id="ht_view0_filterbutton_hover_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_filterbutton_background_color"><?php echo __("Filter Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_filterbutton_background_color]" type="text"
                                               class="color" id="ht_view0_filterbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_filterbutton_hover_background_color"><?php echo __("Filter Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_filterbutton_hover_background_color]" type="text"
                                               class="color" id="ht_view0_filterbutton_hover_background_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>

                                    <div class="" style="display: none;">
                                        <label for="ht_view0_filterbutton_border_width"><?php echo __("Filter Button Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_filterbutton_border_width]"
                                               id="ht_view0_filterbutton_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <input name="params[ht_view0_filterbutton_border_color]" type="text"
                                               class="color" id="ht_view0_filterbutton_border_color" value="#FFFFFF"
                                               size="10"/>
                                        <label for="ht_view0_filterbutton_border_color"><?php echo __("Filter Button Border Color", "product-catalog"); ?></label>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_filterbutton_border_radius"><?php echo __("Filter Button Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_filterbutton_border_radius]"
                                               id="ht_view0_filterbutton_border_radius" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_filterbutton_border_padding"><?php echo __("Filter Button Padding", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_filterbutton_border_padding]"
                                               id="ht_view0_filterbutton_border_padding" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <label for="ht_view0_filterbutton_margin"><?php echo __("Filter Button Margins", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_filterbutton_margin]"
                                               id="ht_view0_filterbutton_margin" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_filtering_float"><?php echo __("Filter block Position", "product-catalog"); ?></label>
                                        <select id="ht_view0_filtering_float" name="params[ht_view0_filtering_float]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                            <option value="top"><?php echo __("Top", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div style="margin-top: -105px">
                                    <h3><?php echo __("Product Button", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view0_show_linkbutton"><?php echo __("Show Product Button", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view0_show_linkbutton]"/>
                                        <input type="checkbox" id="ht_view0_show_linkbutton"
                                               name="params[ht_view0_show_linkbutton]" value="on"/>
                                    </div>

                                    <div>
                                        <label for="ht_view0_linkbutton_font_size"><?php echo __("Product Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_linkbutton_font_size]"
                                               id="ht_view0_linkbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_linkbutton_color"><?php echo __("Product Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_linkbutton_color]" type="text" class="color"
                                               id="ht_view0_linkbutton_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_linkbutton_font_hover_color"><?php echo __("Product Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_linkbutton_font_hover_color]" type="text"
                                               class="color" id="ht_view0_linkbutton_font_hover_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_linkbutton_background_color"><?php echo __("Product Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_linkbutton_background_color]" type="text"
                                               class="color" id="ht_view0_linkbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view0_linkbutton_background_hover_color"><?php echo __("Product Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view0_linkbutton_background_hover_color]" type="text"
                                               class="color" id="ht_view0_linkbutton_background_hover_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>

                                </div>

                                <div style="">
                                    <h3><?php echo __("Light", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_catalog_view0_show_price"><?php echo __("Show Price", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_catalog_view0_show_price]"/>
                                        <input type="checkbox" id="ht_catalog_view0_show_price"
                                               name="params[ht_catalog_view0_show_price]" value="on"/>
                                    </div>
                                    <div>
                                        <label for="ht_catalog_view0_price_font_size"><?php echo __("Price Block Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_catalog_view0_price_font_size]"
                                               id="ht_catalog_view0_price_font_size" value="" class="text"/>px
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_catalog_view0_price_font_color"><?php echo __("Price Block Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_catalog_view0_price_font_color]" type="text"
                                               class="color" id="ht_catalog_view0_price_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div>
                                        <label for="ht_catalog_view0_price_text_font_color"><?php echo __("Price Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_catalog_view0_price_text_font_color]" type="text"
                                               class="color" id="ht_catalog_view0_price_text_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                </div>
                                <div style="margin-top: 15px">
                                    <h3><?php echo __("Load More Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="htc_view0_load_more_position"><?php echo __("Light", "product-catalog"); ?></label>
                                        <select id="htc_view0_load_more_position"
                                                name="params[htc_view0_load_more_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="htc_view0_load_more_font_size"><?php echo __("Load More Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view0_load_more_font_size]"
                                               id="htc_view0_load_more_font_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view0_load_more_font_color"><?php echo __("Load More Font Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view0_load_more_font_color]" class="color"
                                               id="htc_view0_load_more_font_color" value="" class="text">

                                    </div>
                                    <div>
                                        <label for="htc_view0_load_more_font_hover_color"><?php echo __("Load More Font Hover Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view0_load_more_font_hover_color]"
                                               class="color" id="htc_view0_load_more_font_hover_color" value=""
                                               class="text">
                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view0_load_more_button_background_color"><?php echo __("Load More Button Background Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view0_load_more_button_background_color]"
                                               class="color" id="htc_view0_load_more_button_background_color" value=""
                                               class="text">

                                    </div>
                                    <div>
                                        <label for="htc_view0_load_more_button_background_hover_color"><?php echo __("Load More Button Background Hover Color", "product-catalog"); ?></label>
                                        <input type="text"
                                               name="params[htc_view0_load_more_button_background_hover_color]"
                                               class="color" id="htc_view0_load_more_button_background_hover_color"
                                               value="" class="text">
                                    </div>
                                    <div class="navigation-type-block has-height has-background"
                                         style="padding-top:10px;display:inline-block;">
                                        <label for="">Loading Animation </label>
                                        <div class="has-height"
                                             style="clear:both;padding:10px 0px 0px 0px; width: 100%;">
                                            <div style=" width: 100%;">
                                                <ul id="arrows-type"
                                                    style="background: #fff;width: 100%; padding-top: 12px;">
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_1.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view0_load_more_loading_icon]" value="1"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_2.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view0_load_more_loading_icon]" value="2"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_3.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view0_load_more_loading_icon]" value="3"
                                                               style="width: 135px;height: 135px;">
                                                    </li>

                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_4.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view0_load_more_loading_icon]" value="4"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: 20px">
                                    <h3><?php echo __("Pagination Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="htc_view0_pagination_font_size"><?php echo __("Pagination Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view0_pagination_font_size]"
                                               id="htc_view0_pagination_font_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="htc_view0_pagination_font_color"><?php echo __("Pagination Font Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view0_pagination_font_color]" class="color"
                                               id="htc_view0_pagination_font_color" value="" class="text">

                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view0_pagination_icon_size"><?php echo __("agination Icons Size", "product-catalog"); ?>
                                            P</label>
                                        <input type="text" name="params[htc_view0_pagination_icon_size]"
                                               id="htc_view0_pagination_icon_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="htc_view0_pagination_icon_color"><?php echo __("Pagination Icons Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view0_pagination_icon_color]" class="color"
                                               id="htc_view0_pagination_icon_color" value="" class="text">

                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view0_pagination_position"><?php echo __("Pagination Position", "product-catalog"); ?></label>
                                        <select id="htc_view0_pagination_position"
                                                name="params[htc_view0_pagination_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <!--search options xxx open--->
                                <div style="margin-top: 30px">
                                    <h3><?php echo __("Product Search Options", "product-catalog"); ?></h3>
                                    <div class="has-">
                                        <label for="ht_view0_search_form_position"><?php echo __("Search Form position", "product-catalog"); ?></label>
                                        <select id="ht_view0_search_form_position"
                                                name="params[ht_view0_search_form_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_search_form_width"><?php echo __("Search Form Width", "product-catalog"); ?></label>
                                        <div class="slider-container">
                                            <input name="params[ht_view0_search_form_width]"
                                                   id="ht_view0_search_form_width" data-slider-highlight="true"
                                                   data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text"
                                                   data-slider="true" value=""/>
                                            <span>90%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="ht_view0_search_form_border_radius"><?php echo __("Search Form Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_search_form_border_radius]"
                                               id="ht_view0_search_form_border_radius" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_search_form_border_color"><?php echo __("Search Form Border Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_search_form_border_color]"
                                               id="ht_view0_search_form_border_color" value="" class="text color">
                                    </div>
                                    <div>
                                        <label for="ht_view0_search_form_border_width"><?php echo __("Search Form Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_search_form_border_width]"
                                               id="ht_view0_search_form_border_width" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_search_button_background"><?php echo __("Search Button Background", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_search_button_background]"
                                               id="ht_view0_search_button_background" value="" class="text color">
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view0_search_button_hover_color"><?php echo __("Search Button Background Hover", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_search_button_hover_color]"
                                               id="ht_view0_search_button_hover_color" value="" class="text color">
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view0_search_button_text_color"><?php echo __("Search Button Text Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view0_search_button_text_color]"
                                               id="ht_view0_search_button_text_color" value="" class="text color">
                                    </div>
                                </div>
                                <!--search options xxx close--->
                            </li>
                            <!-- VIEW 1 -->
                            <li id="catalog-view-options-1">
                                <div>
                                    <h3><?php echo __("View Types", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view1_allow_lightbox"><?php echo __("Allow Lightbox", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view1_allow_lightbox]"/>
                                        <input type="checkbox" id="ht_view1_allow_lightbox"
                                               name="params[ht_view1_allow_lightbox]" value="on"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_allow_zooming"><?php echo __("Allow Zooming", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view1_allow_zooming]"/>
                                        <input type="checkbox" id="ht_view1_allow_zooming"
                                               name="params[ht_view1_allow_zooming]" value="on"/>
                                    </div>
                                </div>
                                <div>
                                    <h3><?php echo __("Element Styles", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view1_block_width"><?php echo __("Block Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_block_width]" id="ht_view1_block_width"
                                               value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view1_element_background_color"><?php echo __("Element Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_element_background_color]" type="text"
                                               class="color" id="ht_view1_element_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_element_border_width"><?php echo __("Element Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_element_border_width]"
                                               id="ht_view1_element_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view1_element_border_color"><?php echo __("Element Border Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_element_border_color]" type="text" class="color"
                                               id="ht_view1_element_border_color" value="" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_show_separator_lines"><?php echo __("Show Separator Lines", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view1_show_separator_lines]"/>
                                        <input type="checkbox" id="ht_view1_show_separator_lines"
                                               name="params[ht_view1_show_separator_lines]" value="on"/>
                                    </div>
                                </div>
                                <div style="margin-top: -105px">
                                    <h3><?php echo __("Title", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view1_title_font_size"><?php echo __("Title Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_title_font_size]"
                                               id="ht_view1_title_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view1_title_font_color"><?php echo __("Title Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_title_font_color]" type="text" class="color"
                                               id="ht_view1_title_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                </div>
                                <div style="margin-top: 14px;">
                                    <h3><?php echo __("Thumbnails", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view1_show_thumbs"><?php echo __("Show Thumbnails", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view1_show_thumbs]"/>
                                        <input type="checkbox" id="ht_view1_show_thumbs"
                                               name="params[ht_view1_show_thumbs]" value="on"/>
                                    </div>
                                    <div>
                                        <label for="ht_view1_thumbs_position"><?php echo __("Thumbnails Position", "product-catalog"); ?></label>
                                        <select id="ht_view1_thumbs_position" name="params[ht_view1_thumbs_position]">
                                            <option value="before">Before Description</option>
                                            <option value="after">After Description</option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_thumbs_width"><?php echo __("Thumbnails Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_thumbs_width]"
                                               id="ht_view1_thumbs_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                </div>

                                <div style="margin-top: -145px">
                                    <h3><?php echo __("Product Button", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view1_show_linkbutton"><?php echo __("Light", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view1_show_linkbutton]"/>
                                        <input type="checkbox" id="ht_view1_show_linkbutton"
                                               name="params[ht_view1_show_linkbutton]" value="on"/>
                                    </div>

                                    <div class="">
                                        <label for="ht_view1_linkbutton_font_size"><?php echo __("Product Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_linkbutton_font_size]"
                                               id="ht_view1_linkbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_linkbutton_color"><?php echo __("Product Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_linkbutton_color]" type="text" class="color"
                                               id="ht_view1_linkbutton_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div>
                                        <label for="ht_view1_linkbutton_font_hover_color"><?php echo __("Product Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_linkbutton_font_hover_color]" type="text"
                                               class="color" id="ht_view1_linkbutton_font_hover_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_linkbutton_background_color"><?php echo __("Product Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_linkbutton_background_color]" type="text"
                                               class="color" id="ht_view1_linkbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div>
                                        <label for="ht_view1_linkbutton_background_hover_color"><?php echo __("Product Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_linkbutton_background_hover_color]" type="text"
                                               class="color" id="ht_view1_linkbutton_background_hover_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                </div>

                                <div style="margin-top: 14px;">
                                    <h3><?php echo __("Description", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view1_show_description"><?php echo __("Show Description", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view1_show_description]"/>
                                        <input type="checkbox" id="ht_view1_show_description"
                                               name="params[ht_view1_show_description]" value="on"/>
                                    </div>
                                    <div>
                                        <label for="ht_view1_description_font_size"><?php echo __("Description Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_description_font_size]"
                                               id="ht_view1_description_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_description_color"><?php echo __("Description Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_description_color]" type="text" class="color"
                                               id="ht_view1_description_color" value="#FFFFFF" size="10"/>
                                    </div>
                                </div>

                                <div style="margin-top:14px; display: none;">
                                    <h3><?php echo __("Category styles", "product-catalog"); ?></h3>
                                    <div style="display: none;">
                                        <label for="ht_view1_show_filtering"
                                               style="display: none;"><?php echo __("Show Filtering", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view1_show_filtering]"/>
                                        <input type="checkbox" id="ht_view1_show_filtering"
                                               name="params[ht_view1_show_filtering]" value="on"/>
                                    </div>

                                    <div class="has-background">
                                        <label for="ht_view1_filterbutton_font_size"><?php echo __("Filter Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_filterbutton_font_size]"
                                               id="ht_view1_filterbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_filterbutton_font_color"><?php echo __("Filter Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_filterbutton_font_color]" type="text" class="color"
                                               id="ht_view1_filterbutton_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_filterbutton_hover_font_color"><?php echo __("Filter Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_filterbutton_hover_font_color]" type="text"
                                               class="color" id="ht_view1_filterbutton_hover_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_filterbutton_background_color"><?php echo __("Filter Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_filterbutton_background_color]" type="text"
                                               class="color" id="ht_view1_filterbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_filterbutton_hover_background_color"><?php echo __("Filter Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_filterbutton_hover_background_color]" type="text"
                                               class="color" id="ht_view1_filterbutton_hover_background_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="" style="display: none;">
                                        <label for="ht_view1_filterbutton_border_width"><?php echo __("Filter Button Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_filterbutton_border_width]"
                                               id="ht_view1_filterbutton_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <input name="params[ht_view1_filterbutton_border_color]" type="text"
                                               class="color" id="ht_view1_filterbutton_border_color" value="#FFFFFF"
                                               size="10"/>
                                        <label for="ht_view1_filterbutton_border_color"><?php echo __("Filter Button Border Color", "product-catalog"); ?></label>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_filterbutton_border_radius"><?php echo __("Filter Button Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_filterbutton_border_radius]"
                                               id="ht_view1_filterbutton_border_radius" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_filterbutton_border_padding"><?php echo __("Filter Button Padding", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_filterbutton_border_padding]"
                                               id="ht_view1_filterbutton_border_padding" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <label for="ht_view1_filterbutton_margin"><?php echo __("Filter Button Margins", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_filterbutton_margin]"
                                               id="ht_view1_filterbutton_margin" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_filtering_float"><?php echo __("Filter block Position", "product-catalog"); ?></label>
                                        <select id="ht_view1_filtering_float" name="params[ht_view1_filtering_float]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                            <option value="top"><?php echo __("Top", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_sorting_name_by_default"><?php echo __("Sort By Default Bottom Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_sorting_name_by_default]" type="text"
                                               id="ht_view1_sorting_name_by_default" value="" size="10" class="text"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_sorting_name_by_id"><?php echo __("Sorting By ID Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_sorting_name_by_id]" type="text"
                                               id="ht_view1_sorting_name_by_id" value="" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_sorting_name_by_name"><?php echo __("Sorting By ID Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_sorting_name_by_name]" type="text"
                                               id="ht_view1_sorting_name_by_name" value="" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_sorting_name_by_random"><?php echo __("Random Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_sorting_name_by_random]" type="text"
                                               id="ht_view1_sorting_name_by_random" value="" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_sorting_name_by_asc"><?php echo __("Ascedding Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_sorting_name_by_asc]" type="text"
                                               id="ht_view1_sorting_name_by_asc" value="" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_sorting_name_by_desc"><?php echo __("Descedding Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_sorting_name_by_desc]" type="text"
                                               id="ht_view1_sorting_name_by_desc" value="" size="10"/>
                                    </div>
                                </div>

                                <div style="margin-top: -574px; display: none;">
                                    <h3><?php echo __("Sorting styles", "product-catalog"); ?></h3>
                                    <div class="" style="display: none;">
                                        <label for="ht_view1_show_sorting"
                                               style="display: none;"><?php echo __("Show Sorting", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view1_show_sorting]"/>
                                        <input type="checkbox" id="ht_view1_show_sorting"
                                               name="params[ht_view1_show_sorting]" value="on"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_sortbutton_font_size"><?php echo __("Sort Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_sortbutton_font_size]"
                                               id="ht_view1_sortbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_sortbutton_font_color"><?php echo __("Sort Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_sortbutton_font_color]" type="text" class="color"
                                               id="ht_view1_sortbutton_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_sortbutton_hover_font_color"><?php echo __("Sort Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_sortbutton_hover_font_color]" type="text"
                                               class="color" id="ht_view1_sortbutton_hover_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_sortbutton_background_color"><?php echo __("Sort Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_sortbutton_background_color]" type="text"
                                               class="color" id="ht_view1_sortbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_sortbutton_hover_background_color"><?php echo __("Sort Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view1_sortbutton_hover_background_color]" type="text"
                                               class="color" id="ht_view1_sortbutton_hover_background_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background" style="display: none;">
                                        <label for="ht_view1_sortbutton_border_width"><?php echo __("Sort Button Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_sortbutton_border_width]"
                                               id="ht_view1_sortbutton_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <input name="params[ht_view1_sortbutton_border_color]" type="text" class="color"
                                               id="ht_view1_sortbutton_border_color" value="#FFFFFF" size="10"/>
                                        <label for="ht_view1_sortbutton_border_color"><?php echo __("Sort Button Border Color", "product-catalog"); ?></label>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_sortbutton_border_radius"><?php echo __("Sort Button Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_sortbutton_border_radius]"
                                               id="ht_view1_sortbutton_border_radius" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_sortbutton_border_padding"><?php echo __("Sort Button Padding", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_sortbutton_border_padding]"
                                               id="ht_view1_sortbutton_border_padding" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <label for="ht_view1_sortbutton_margin"><?php echo __("Sort Button Margins", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_sortbutton_margin]"
                                               id="ht_view1_sortbutton_margin" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view1_sorting_float"><?php echo __("Sort block Position", "product-catalog"); ?></label>
                                        <select id="ht_view1_sorting_float" name="params[ht_view1_sorting_float]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                            <option value="top"><?php echo __("Top", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div style="margin-top: -20px;">
                                    <h3><?php echo __("Price Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_catalog_view1_show_price"><?php echo __("Show Price", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_catalog_view1_show_price]"/>
                                        <input type="checkbox" id="ht_catalog_view1_show_price"
                                               name="params[ht_catalog_view1_show_price]" value="on"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_catalog_view1_price_font_size"><?php echo __("Price Block Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_catalog_view1_price_font_size]"
                                               id="ht_catalog_view1_price_font_size" value="" class="text"/>px
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_catalog_view1_price_font_color"><?php echo __("Price Block Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_catalog_view1_price_font_color]" type="text"
                                               class="color" id="ht_catalog_view1_price_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div>
                                        <label for="ht_catalog_view1_price_text_font_color"><?php echo __("Price Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_catalog_view1_price_text_font_color]" type="text"
                                               class="color" id="ht_catalog_view1_price_text_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                </div>
                                <div style="margin-top: 15px">
                                    <h3><?php echo __("Load More Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="htc_view1_load_more_position"><?php echo __("Load More Position", "product-catalog"); ?></label>
                                        <select id="htc_view1_load_more_position"
                                                name="params[htc_view1_load_more_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="htc_view1_load_more_font_size"><?php echo __("Load More Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view1_load_more_font_size]"
                                               id="htc_view1_load_more_font_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view1_load_more_font_color"><?php echo __("Load More Font Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view1_load_more_font_color]" class="color"
                                               id="htc_view1_load_more_font_color" value="" class="text">

                                    </div>
                                    <div class=" ">
                                        <label for="htc_view1_load_more_font_hover_color"><?php echo __("Load More Font Hover Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view1_load_more_font_hover_color]"
                                               class="color" id="htc_view1_load_more_font_hover_color" value=""
                                               class="text">
                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view1_load_more_button_background_color"><?php echo __("Load More Button Background Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view1_load_more_button_background_color]"
                                               class="color" id="htc_view1_load_more_button_background_color" value=""
                                               class="text">

                                    </div>
                                    <div class=" ">
                                        <label for="htc_view1_load_more_button_background_hover_color"><?php echo __("Load More Button Background Hover Color", "product-catalog"); ?></label>
                                        <input type="text"
                                               name="params[htc_view1_load_more_button_background_hover_color]"
                                               class="color" id="htc_view1_load_more_button_background_hover_color"
                                               value="" class="text">
                                    </div>
                                    <div class="navigation-type-block has-height has-background"
                                         style="padding-top:10px;display:inline-block;">
                                        <label for=""><?php echo __("Loading Animation", "product-catalog"); ?> </label>
                                        <div class="has-height"
                                             style="clear:both;padding:10px 0px 0px 0px; width: 100%;">
                                            <div style=" width: 100%;">
                                                <ul id="arrows-type"
                                                    style="background: #fff;width: 100%; padding-top: 12px;">
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_1.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view1_load_more_loading_icon]" value="1"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_2.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view1_load_more_loading_icon]" value="2"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_3.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view1_load_more_loading_icon]" value="3"
                                                               style="width: 135px;height: 135px;">
                                                    </li>

                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_4.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view1_load_more_loading_icon]" value="4"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: -340px">
                                    <h3><?php echo __("Pagination Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="htc_view1_pagination_font_size"><?php echo __("Pagination Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view1_pagination_font_size]"
                                               id="htc_view1_pagination_font_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="htc_view1_pagination_font_color"><?php echo __("Pagination Font Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view1_pagination_font_color]" class="color"
                                               id="htc_view1_pagination_font_color" value="" class="text">

                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view1_pagination_icon_size"><?php echo __("Pagination Icons Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view1_pagination_icon_size]"
                                               id="htc_view1_pagination_icon_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="htc_view1_pagination_icon_color"><?php echo __("Pagination Icons Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view1_pagination_icon_color]" class="color"
                                               id="htc_view1_pagination_icon_color" value="" class="text">

                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view1_pagination_position"><?php echo __("Pagination Position", "product-catalog"); ?></label>
                                        <select id="htc_view1_pagination_position"
                                                name="params[htc_view1_pagination_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <!--search options xxx open--->
                                <div style="margin-top: -50px">
                                    <h3><?php echo __("Product Search Options", "product-catalog"); ?></h3>
                                    <div class="has-">
                                        <label for="ht_view1_search_form_position"><?php echo __("Search Form position", "product-catalog"); ?></label>
                                        <select id="ht_view1_search_form_position"
                                                name="params[ht_view1_search_form_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_search_form_width"><?php echo __("Search Form Width", "product-catalog"); ?></label>
                                        <div class="slider-container">
                                            <input name="params[ht_view1_search_form_width]"
                                                   id="ht_view1_search_form_width" data-slider-highlight="true"
                                                   data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text"
                                                   data-slider="true" value=""/>
                                            <span>90%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="ht_view1_search_form_border_radius"><?php echo __("Search Form Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_search_form_border_radius]"
                                               id="ht_view1_search_form_border_radius" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_search_form_border_color"><?php echo __("Search Form Border Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_search_form_border_color]"
                                               id="ht_view1_search_form_border_color" value="" class="text color">
                                    </div>
                                    <div>
                                        <label for="ht_view1_search_form_border_width"><?php echo __("Search Form Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_search_form_border_width]"
                                               id="ht_view1_search_form_border_width" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_search_button_background"><?php echo __("Search Button Background", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_search_button_background]"
                                               id="ht_view1_search_button_background" value="" class="text color">
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view1_search_button_hover_color"><?php echo __("Search Button Background Hover", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_search_button_hover_color]"
                                               id="ht_view1_search_button_hover_color" value="" class="text color">
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view1_search_button_text_color"><?php echo __("Search Button Text Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view1_search_button_text_color]"
                                               id="ht_view1_search_button_text_color" value="" class="text color">
                                    </div>
                                </div>
                                <!--search options xxx close--->
                            </li>
                            <!-- VIEW 2 POPUP -->
                            <li id="catalog-view-options-2">
                                <div>
                                    <h3><?php echo __("Element Styles", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view2_element_width"><?php echo __("Element Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_element_width]"
                                               id="ht_view2_element_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view2_element_height"><?php echo __("Element Height", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_element_height]"
                                               id="ht_view2_element_height" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_element_background_color"><?php echo __("Element Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_element_background_color]" type="text"
                                               class="color" id="ht_view2_element_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div>
                                        <label for="ht_view2_element_border_width"><?php echo __("Element Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_element_border_width]"
                                               id="ht_view2_element_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_element_border_color"><?php echo __("Element Border Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_element_border_color]" type="text" class="color"
                                               id="ht_view2_element_border_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div>
                                        <label for="ht_view2_element_overlay_color"><?php echo __("Element's Image Overlay Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_element_overlay_color]" type="text" class="color"
                                               id="ht_view2_element_overlay_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_zoombutton_style"><?php echo __("Element's Image Overlay Transparency", "product-catalog"); ?></label>
                                        <div class="slider-container">
                                            <input name="params[ht_view2_element_overlay_transparency]"
                                                   id="ht_view2_element_overlay_transparency"
                                                   data-slider-highlight="true"
                                                   data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text"
                                                   data-slider="true" value=""/>
                                            <span>90%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="ht_view2_zoombutton_style"><?php echo __("Zoom Image Style", "product-catalog"); ?></label>
                                        <select id="ht_view2_zoombutton_style" name="params[ht_view2_zoombutton_style]">
                                            <option value="light"><?php echo __("Light", "product-catalog"); ?></option>
                                            <option value="dark"><?php echo __("Dark", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div style="">
                                    <h3><?php echo __("Element Title", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view2_element_title_font_size"><?php echo __("Right", "product-catalog"); ?>
                                            Element Title Font Size</label>
                                        <input type="text" name="params[ht_view2_element_title_font_size]"
                                               id="ht_view2_element_title_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view2_element_title_font_color"><?php echo __("Element Title Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_element_title_font_color]" type="text"
                                               class="color" id="ht_view2_element_title_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                </div>
                                <div style="margin-top: 15px;">
                                    <h3><?php echo __("Element Product Button", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view2_element_show_linkbutton"><?php echo __("Show Product Button On Element", "product-catalog"); ?></label>
                                        <input type="hidden" value="off"
                                               name="params[ht_view2_element_show_linkbutton]"/>
                                        <input type="checkbox" id="ht_view2_element_show_linkbutton"
                                               name="params[ht_view2_element_show_linkbutton]" value="on"/>
                                    </div>

                                    <div>
                                        <label for="ht_view2_element_linkbutton_font_size"><?php echo __("Product Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_element_linkbutton_font_size]"
                                               id="ht_view2_element_linkbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_element_linkbutton_color"><?php echo __("Product Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_element_linkbutton_color]" type="text"
                                               class="color" id="ht_view2_element_linkbutton_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_element_linkbutton_background_color"><?php echo __("Product Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_element_linkbutton_background_color]" type="text"
                                               class="color" id="ht_view2_element_linkbutton_background_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                </div>

                                <div style="margin-top: 0px; display: none;">
                                    <h3><?php echo __("Sorting styles", "product-catalog"); ?></h3>
                                    <div class="" style="display: none;">
                                        <label for="ht_view2_show_sorting"
                                               style="display: none;"><?php echo __("Show Sorting", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view2_show_sorting]"/>
                                        <input type="checkbox" id="ht_view2_show_sorting"
                                               name="params[ht_view2_show_sorting]" value="on"/>
                                    </div>

                                    <div class="has-background">
                                        <label for="ht_view2_sortbutton_font_size"><?php echo __("Sort Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_sortbutton_font_size]"
                                               id="ht_view2_sortbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_sortbutton_font_color"><?php echo __("Sort Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_sortbutton_font_color]" type="text" class="color"
                                               id="ht_view2_sortbutton_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_sortbutton_hover_font_color"><?php echo __("Sort Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_sortbutton_hover_font_color]" type="text"
                                               class="color" id="ht_view2_sortbutton_hover_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_sortbutton_background_color"><?php echo __("Sort Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_sortbutton_background_color]" type="text"
                                               class="color" id="ht_view2_sortbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_sortbutton_hover_background_color"><?php echo __("Sort Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_sortbutton_hover_background_color]" type="text"
                                               class="color" id="ht_view2_sortbutton_hover_background_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="" style="display: none;">
                                        <label for="ht_view2_sortbutton_border_width"><?php echo __("Sort Button Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_sortbutton_border_width]"
                                               id="ht_view2_sortbutton_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <input name="params[ht_view2_sortbutton_border_color]" type="text" class="color"
                                               id="ht_view2_sortbutton_border_color" value="#FFFFFF" size="10"/>
                                        <label for="ht_view2_sortbutton_border_color"><?php echo __("Sort Button Border Color", "product-catalog"); ?></label>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_sortbutton_border_radius"><?php echo __("Sort Button Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_sortbutton_border_radius]"
                                               id="ht_view2_sortbutton_border_radius" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_sortbutton_border_padding"><?php echo __("Sort Button Padding", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_sortbutton_border_padding]"
                                               id="ht_view2_sortbutton_border_padding" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="" style="display: none;">
                                        <label for="ht_view2_sortbutton_margin"><?php echo __("Sort Button Margins", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_sortbutton_margin]"
                                               id="ht_view2_sortbutton_margin" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_sorting_float"><?php echo __("Sort block Position", "product-catalog"); ?></label>
                                        <select id="ht_view2_sorting_float" name="params[ht_view2_sorting_float]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?>Left
                                            </option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                            <option value="top"><?php echo __("Top", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_sorting_name_by_default"><?php echo __("Sort By Default Bottom Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_sorting_name_by_default]" type="text"
                                               id="ht_view2_sorting_name_by_default" value="" size="10" class="text"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_sorting_name_by_id"><?php echo __("Sorting By ID Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_sorting_name_by_id]" type="text"
                                               id="ht_view2_sorting_name_by_id" value="" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_sorting_name_by_name"><?php echo __("Sorting By ID Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_sorting_name_by_name]" type="text"
                                               id="ht_view2_sorting_name_by_name" value="" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_sorting_name_by_random"><?php echo __("Random Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_sorting_name_by_random]" type="text"
                                               id="ht_view2_sorting_name_by_random" value="" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_sorting_name_by_asc"><?php echo __("Ascedding Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_sorting_name_by_asc]" type="text"
                                               id="ht_view2_sorting_name_by_asc" value="" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_sorting_name_by_desc"><?php echo __("Descedding Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_sorting_name_by_desc]" type="text"
                                               id="ht_view2_sorting_name_by_desc" value="" size="10"/>
                                    </div>
                                </div>

                                <div style="margin-top: 0; display: none;">
                                    <h3><?php echo __("Category styles", "product-catalog"); ?></h3>

                                    <div style="display: none;">
                                        <label for="ht_view2_show_filtering"
                                               style="display: none;"><?php echo __("Show FilteringShow Filtering", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view2_show_filtering]"/>
                                        <input type="checkbox" id="ht_view2_show_filtering"
                                               name="params[ht_view2_show_filtering]" value="on"/>
                                    </div>

                                    <div class="has-background">
                                        <label for="ht_view2_filterbutton_font_size"><?php echo __("Filter Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_filterbutton_font_size]"
                                               id="ht_view2_filterbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_filterbutton_font_color"><?php echo __("Filter Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_filterbutton_font_color]" type="text" class="color"
                                               id="ht_view2_filterbutton_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_filterbutton_hover_font_color"><?php echo __("Filter Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_filterbutton_hover_font_color]" type="text"
                                               class="color" id="ht_view2_filterbutton_hover_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_filterbutton_background_color"><?php echo __("Filter Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_filterbutton_background_color]" type="text"
                                               class="color" id="ht_view2_filterbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_filterbutton_hover_background_color"><?php echo __("Filter Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_filterbutton_hover_background_color]" type="text"
                                               class="color" id="ht_view2_filterbutton_hover_background_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>

                                    <div class="" style="display: none;">
                                        <label for="ht_view2_filterbutton_border_width"><?php echo __("Filter Button Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_filterbutton_border_width]"
                                               id="ht_view2_filterbutton_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <input name="params[ht_view2_filterbutton_border_color]" type="text"
                                               class="color" id="ht_view2_filterbutton_border_color" value="#FFFFFF"
                                               size="10"/>
                                        <label for="ht_view2_filterbutton_border_color"><?php echo __("Filter Button Border Color", "product-catalog"); ?></label>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_filterbutton_border_radius"><?php echo __("Filter Button Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_filterbutton_border_radius]"
                                               id="ht_view2_filterbutton_border_radius" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_filterbutton_border_padding"><?php echo __("Filter Button Padding", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_filterbutton_border_padding]"
                                               id="ht_view2_filterbutton_border_padding" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <label for="ht_view2_filterbutton_margin"><?php echo __("Filter Button Margins", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_filterbutton_margin]"
                                               id="ht_view2_filterbutton_margin" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_filtering_float"><?php echo __("Filter block Position", "product-catalog"); ?></label>
                                        <select id="ht_view2_filtering_float" name="params[ht_view2_filtering_float]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                            <option value="top"><?php echo __("Top", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div style="//margin-top: -30px;">
                                    <h3><?php echo __("Popup Styles", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view2_popup_full_width"><?php echo __("Popup Image Full Width", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view2_popup_full_width]"/>
                                        <input type="checkbox" id="ht_view2_popup_full_width"
                                               name="params[ht_view2_popup_full_width]" value="on"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_popup_background_color"><?php echo __("Popup Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_popup_background_color]" type="text" class="color"
                                               id="ht_view2_popup_background_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_popup_overlay_color"><?php echo __("Popup Overlay Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_popup_overlay_color]" type="text" class="color"
                                               id="ht_view2_popup_overlay_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_popup_overlay_transparency_color"><?php echo __("Popup Overlay Transparency", "product-catalog"); ?></label>
                                        <div class="slider-container">
                                            <input name="params[ht_view2_popup_overlay_transparency_color]"
                                                   id="ht_view2_popup_overlay_transparency_color"
                                                   data-slider-highlight="true"
                                                   data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text"
                                                   data-slider="true" value=""/>
                                            <span>90%</span>
                                        </div>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_popup_closebutton_style"><?php echo __("Popup Close Button Style", "product-catalog"); ?></label>
                                        <select id="ht_view2_popup_closebutton_style"
                                                name="params[ht_view2_popup_closebutton_style]">
                                            <option value="light"><?php echo __("Light", "product-catalog"); ?></option>
                                            <option value="dark"><?php echo __("Dark", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="ht_view2_show_separator_lines"><?php echo __("Show Separator Lines", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view2_show_separator_lines]"/>
                                        <input type="checkbox" id="ht_view2_show_separator_lines"
                                               name="params[ht_view2_show_separator_lines]" value="on"/>
                                    </div>

                                </div>
                                <div style="margin-top: -300px;">
                                    <h3><?php echo __("Popup Title", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view2_popup_title_font_size"><?php echo __("Popup Title Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_popup_title_font_size]"
                                               id="ht_view2_element_title_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view2_popup_title_font_color"><?php echo __("Popup Title Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_popup_title_font_color]" type="text" class="color"
                                               id="ht_view2_element_title_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                </div>
                                <div style="margin-top: -120px;">
                                    <h3><?php echo __("Popup Thumbnails", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view2_show_thumbs"><?php echo __("Show Thumbnails", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view2_show_thumbs]"/>
                                        <input type="checkbox" id="ht_view2_show_thumbs"
                                               name="params[ht_view2_show_thumbs]" value="on"/>
                                    </div>
                                    <div>
                                        <label for="ht_view2_thumbs_position"><?php echo __("Thumbnails Position", "product-catalog"); ?></label>
                                        <select id="ht_view2_thumbs_position" name="params[ht_view2_thumbs_position]">
                                            <option value="before"><?php echo __("Before Description", "product-catalog"); ?></option>
                                            <option value="after"><?php echo __("After Description", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_thumbs_width"><?php echo __("Thumbnails Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_thumbs_width]"
                                               id="ht_view2_thumbs_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view2_thumbs_height"><?php echo __("Thumbnails Height", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_thumbs_height]"
                                               id="ht_view2_thumbs_height" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                </div>
                                <div style="margin-top: 0px;">
                                    <h3><?php echo __("Popup Description", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view2_show_description"><?php echo __("Show Description", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view2_show_description]"/>
                                        <input type="checkbox" id="ht_view2_show_description"
                                               name="params[ht_view2_show_description]" value="on"/>
                                    </div>
                                    <div>
                                        <label for="ht_view2_description_font_size"><?php echo __("Description Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_description_font_size]"
                                               id="ht_view2_description_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_description_color"><?php echo __("Description Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_description_color]" type="text" class="color"
                                               id="ht_view2_description_color" value="#FFFFFF" size="10"/>
                                    </div>
                                </div>
                                <div style="margin-top: -100px;">
                                    <h3><?php echo __("Popup Product Button", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view2_show_popup_linkbutton"><?php echo __("Show Product Buttons", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view2_show_popup_linkbutton]"/>
                                        <input type="checkbox" id="ht_view2_show_popup_linkbutton"
                                               name="params[ht_view2_show_popup_linkbutton]" value="on"/>
                                    </div>

                                    <div class="has-background">
                                        <label for="ht_view2_popup_linkbutton_font_size"><?php echo __("Product Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_popup_linkbutton_font_size]"
                                               id="ht_view2_popup_linkbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view2_popup_linkbutton_color"><?php echo __("Product Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_popup_linkbutton_color]" type="text" class="color"
                                               id="ht_view2_popup_linkbutton_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_popup_linkbutton_font_hover_color"><?php echo __("Product Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_popup_linkbutton_font_hover_color]" type="text"
                                               class="color" id="ht_view2_popup_linkbutton_font_hover_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                    <div>
                                        <label for="ht_view2_popup_linkbutton_background_color"><?php echo __("Product Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_popup_linkbutton_background_color]" type="text"
                                               class="color" id="ht_view2_popup_linkbutton_background_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_popup_linkbutton_background_hover_color"><?php echo __("Product Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view2_popup_linkbutton_background_hover_color]"
                                               type="text" class="color"
                                               id="ht_view2_popup_linkbutton_background_hover_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                </div>


                                <div style="  margin-top: 0px;">
                                    <h3><?php echo __("Price Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_catalog_view2_show_price"><?php echo __("Show Price", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_catalog_view2_show_price]"/>
                                        <input type="checkbox" id="ht_catalog_view2_show_price"
                                               name="params[ht_catalog_view2_show_price]" value="on"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_catalog_view2_price_font_size"><?php echo __("Price Block Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_catalog_view2_price_font_size]"
                                               id="ht_catalog_view2_price_font_size" value="" class="text"/>px
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_catalog_view2_price_font_color"><?php echo __("Dark", "product-catalog"); ?><?php echo __("Price Block Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_catalog_view2_price_font_color]" type="text"
                                               class="color" id="ht_catalog_view2_price_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>

                                    <div>
                                        <label for="ht_catalog_view2_price_text_font_color"><?php echo __("Price Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_catalog_view2_price_text_font_color]" type="text"
                                               class="color" id="ht_catalog_view2_price_text_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                </div>
                                <div style="margin-top: 15px">
                                    <h3><?php echo __("Load More Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="htc_view2_load_more_position"><?php echo __("Load More Position", "product-catalog"); ?></label>
                                        <select id="htc_view2_load_more_position"
                                                name="params[htc_view2_load_more_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="htc_view2_load_more_font_size"><?php echo __("Load More Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view2_load_more_font_size]"
                                               id="htc_view2_load_more_font_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view2_load_more_font_color"><?php echo __("Load More Font Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view2_load_more_font_color]" class="color"
                                               id="htc_view2_load_more_font_color" value="" class="text">

                                    </div>
                                    <div>
                                        <label for="htc_view2_load_more_font_hover_color"><?php echo __("Load More Font Hover Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view2_load_more_font_hover_color]"
                                               class="color" id="htc_view2_load_more_font_hover_color" value=""
                                               class="text">
                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view2_load_more_button_background_color"><?php echo __("Load More Button Background Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view2_load_more_button_background_color]"
                                               class="color" id="htc_view2_load_more_button_background_color" value=""
                                               class="text">

                                    </div>
                                    <div>
                                        <label for="htc_view2_load_more_button_background_hover_color"><?php echo __("Load More Button Background Hover Color", "product-catalog"); ?></label>
                                        <input type="text"
                                               name="params[htc_view2_load_more_button_background_hover_color]"
                                               class="color" id="htc_view2_load_more_button_background_hover_color"
                                               value="" class="text">
                                    </div>
                                    <div class="navigation-type-block has-height has-background"
                                         style="padding-top:10px;display:inline-block;">
                                        <label for=""><?php echo __("Loading Animation", "product-catalog"); ?> </label>
                                        <div class="has-height"
                                             style="clear:both;padding:10px 0px 0px 0px; width: 100%;">
                                            <div style=" width: 100%;">
                                                <ul id="arrows-type"
                                                    style="background: #fff;width: 100%; padding-top: 12px;">
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_1.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view2_load_more_loading_icon]" value="1"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_2.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view2_load_more_loading_icon]" value="2"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_3.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view2_load_more_loading_icon]" value="3"
                                                               style="width: 135px;height: 135px;">
                                                    </li>

                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_4.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view2_load_more_loading_icon]" value="4"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: 0px">
                                    <h3><?php echo __("Pagination Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="htc_view2_pagination_font_size"><?php echo __("Pagination Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view2_pagination_font_size]"
                                               id="htc_view2_pagination_font_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="htc_view2_pagination_font_color"><?php echo __("Pagination Font Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view2_pagination_font_color]" class="color"
                                               id="htc_view2_pagination_font_color" value="" class="text">

                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view2_pagination_icon_size"><?php echo __("Pagination Icons Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view2_pagination_icon_size]"
                                               id="htc_view2_pagination_icon_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="htc_view2_pagination_icon_color"><?php echo __("Pagination Icons Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view2_pagination_icon_color]" class="color"
                                               id="htc_view2_pagination_icon_color" value="" class="text">

                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view2_pagination_position"><?php echo __("Pagination Position", "product-catalog"); ?></label>
                                        <select id="htc_view2_pagination_position"
                                                name="params[htc_view2_pagination_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <!--search options xxx open--->
                                <div style="margin-top: 15px">
                                    <h3><?php echo __("Product Search Options", "product-catalog"); ?></h3>
                                    <div class="has-">
                                        <label for="ht_view2_search_form_position"><?php echo __("Search Form position", "product-catalog"); ?></label>
                                        <select id="ht_view2_search_form_position"
                                                name="params[ht_view2_search_form_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_search_form_width"><?php echo __("Search Form Width", "product-catalog"); ?></label>
                                        <div class="slider-container">
                                            <input name="params[ht_view2_search_form_width]"
                                                   id="ht_view2_search_form_width" data-slider-highlight="true"
                                                   data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text"
                                                   data-slider="true" value=""/>
                                            <span>90%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="ht_view2_search_form_border_radius"><?php echo __("Search Form Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_search_form_border_radius]"
                                               id="ht_view2_search_form_border_radius" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_search_form_border_color"><?php echo __("Search Form Border Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_search_form_border_color]"
                                               id="ht_view2_search_form_border_color" value="" class="text color">
                                    </div>
                                    <div>
                                        <label for="ht_view2_search_form_border_width"><?php echo __("Search Form Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_search_form_border_width]"
                                               id="ht_view2_search_form_border_width" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_search_button_background"><?php echo __("Search Button Background", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_search_button_background]"
                                               id="ht_view2_search_button_background" value="" class="text color">
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view2_search_button_hover_color"><?php echo __("Search Button Background Hover", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_search_button_hover_color]"
                                               id="ht_view2_search_button_hover_color" value="" class="text color">
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view2_search_button_text_color"><?php echo __("Search Button Text Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view2_search_button_text_color]"
                                               id="ht_view2_search_button_text_color" value="" class="text color">
                                    </div>
                                </div>
                                <!--search options xxx close--->
                            </li>
                            <!-- VIEW 3 Fullwidth -->
                            <li id="catalog-view-options-3">
                                <div>
                                    <h3><?php echo __("View Types", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view3_allow_lightbox"><?php echo __("Allow Lightbox", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view3_allow_lightbox]"/>
                                        <input type="checkbox" id="ht_view3_allow_lightbox"
                                               name="params[ht_view3_allow_lightbox]" value="on"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_allow_zooming"><?php echo __("Allow Zooming", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view3_allow_zooming]"/>
                                        <input type="checkbox" id="ht_view3_allow_zooming"
                                               name="params[ht_view3_allow_zooming]" value="on"/>
                                    </div>
                                </div>

                                <div>
                                    <h3>Title</h3>
                                    <div class="has-background">
                                        <label for="ht_view3_title_font_size"><?php echo __("Title Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_title_font_size]"
                                               id="ht_view3_title_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view3_title_font_color"><?php echo __("Title Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_title_font_color]" type="text" class="color"
                                               id="ht_view3_title_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                </div>
                                <div>
                                    <h3><?php echo __("Elements Styles", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view3_mainimage_width"><?php echo __("Main Image Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_mainimage_width]"
                                               id="ht_view3_mainimage_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view3_element_background_color"><?php echo __("Element Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_element_background_color]" type="text"
                                               class="color" id="ht_view3_element_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_element_border_width"><?php echo __("Element Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_element_border_width]"
                                               id="ht_view3_element_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view3_element_border_color"><?php echo __("Element Border Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_element_border_color]" type="text" class="color"
                                               id="ht_view3_element_border_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_show_separator_lines"><?php echo __("Show Separator Lines", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view3_show_separator_lines]"/>
                                        <input type="checkbox" id="ht_view3_show_separator_lines"
                                               name="params[ht_view3_show_separator_lines]" value="on"/>
                                    </div>
                                </div>
                                <div>
                                    <h3><?php echo __("Thumbnails", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view3_show_thumbs"><?php echo __("Show Thumbnails", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view3_show_thumbs]"/>
                                        <input type="checkbox" id="ht_view3_show_thumbs"
                                               name="params[ht_view3_show_thumbs]" value="on"/>
                                    </div>
                                    <div>
                                        <label for="ht_view3_thumbs_width"><?php echo __("Thumbnails Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_thumbs_width]"
                                               id="ht_view3_thumbs_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_thumbs_height"><?php echo __("Thumbnails Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_thumbs_height]"
                                               id="ht_view3_thumbs_height" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                </div>

                                <div style="/* margin-top:-80px; */ display: none;">
                                    <h3><?php echo __("Sorting styles", "product-catalog"); ?></h3>
                                    <div class="" style="display: none;">
                                        <label for="ht_view3_show_sorting"
                                               style="display: none;"><?php echo __("Show Sorting", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view3_show_sorting]"/>
                                        <input type="checkbox" id="ht_view3_show_sorting"
                                               name="params[ht_view3_show_sorting]" value="on"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_sortbutton_font_size"><?php echo __("Sort Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_sortbutton_font_size]"
                                               id="ht_view3_sortbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_sortbutton_font_color"><?php echo __("Sort Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_sortbutton_font_color]" type="text" class="color"
                                               id="ht_view3_sortbutton_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_sortbutton_hover_font_color"><?php echo __("Sort Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_sortbutton_hover_font_color]" type="text"
                                               class="color" id="ht_view3_sortbutton_hover_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_sortbutton_background_color"><?php echo __("Sort Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_sortbutton_background_color]" type="text"
                                               class="color" id="ht_view3_sortbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_sortbutton_hover_background_color"><?php echo __("Right", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_sortbutton_hover_background_color]" type="text"
                                               class="color" id="ht_view3_sortbutton_hover_background_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="" style="display: none;">
                                        <label for="ht_view3_sortbutton_border_width"><?php echo __("Right", "product-catalog"); ?><?php echo __("Sort Button Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_sortbutton_border_width]"
                                               id="ht_view3_sortbutton_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <input name="params[ht_view3_sortbutton_border_color]" type="text" class="color"
                                               id="ht_view3_sortbutton_border_color" value="#FFFFFF" size="10"/>
                                        <label for="ht_view3_sortbutton_border_color"><?php echo __("Sort Button Border Color", "product-catalog"); ?></label>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_sortbutton_border_radius"><?php echo __("Sort Button Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_sortbutton_border_radius]"
                                               id="ht_view3_sortbutton_border_radius" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_sortbutton_border_padding"><?php echo __("Sort Button Padding", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_sortbutton_border_padding]"
                                               id="ht_view3_sortbutton_border_padding" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <label for="ht_view3_sortbutton_margin"><?php echo __("Sort Button Margins", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_sortbutton_margin]"
                                               id="ht_view3_sortbutton_margin" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_sorting_float"><?php echo __("Sort block Position", "product-catalog"); ?></label>
                                        <select id="ht_view3_sorting_float" name="params[ht_view3_sorting_float]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                            <option value="top"><?php echo __("Top", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_sorting_name_by_default"><?php echo __("Sort By Default Bottom Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_sorting_name_by_default]" type="text"
                                               id="ht_view3_sorting_name_by_default" value="" size="10" class="text"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_sorting_name_by_id"><?php echo __("Sorting By ID Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_sorting_name_by_id]" type="text"
                                               id="ht_view3_sorting_name_by_id" value="" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_sorting_name_by_name"><?php echo __("Sorting By ID Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_sorting_name_by_name]" type="text"
                                               id="ht_view3_sorting_name_by_name" value="" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_sorting_name_by_random"><?php echo __("Random Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_sorting_name_by_random]" type="text"
                                               id="ht_view3_sorting_name_by_random" value="" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_sorting_name_by_asc"><?php echo __("Ascedding Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_sorting_name_by_asc]" type="text"
                                               id="ht_view3_sorting_name_by_asc" value="" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_sorting_name_by_desc"><?php echo __("Descedding Sorting Botton Name", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_sorting_name_by_desc]" type="text"
                                               id="ht_view3_sorting_name_by_desc" value="" size="10"/>
                                    </div>
                                </div>

                                <div style="margin-top: -555px; display: none;">
                                    <h3><?php echo __("Right", "product-catalog"); ?>Category styles</h3>

                                    <div style="display: none;">
                                        <label for="ht_view3_show_filtering"
                                               style="display: none;"><?php echo __("Show Filtering", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view3_show_filtering]"/>
                                        <input type="checkbox" id="ht_view3_show_filtering"
                                               name="params[ht_view3_show_filtering]" value="on"/>
                                    </div>

                                    <div class="has-background">
                                        <label for="ht_view3_filterbutton_font_size"><?php echo __("Filter Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_filterbutton_font_size]"
                                               id="ht_view3_filterbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view3_filterbutton_font_color"><?php echo __("Filter Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_filterbutton_font_color]" type="text" class="color"
                                               id="ht_view3_filterbutton_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_filterbutton_hover_font_color"><?php echo __("Filter Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_filterbutton_hover_font_color]" type="text"
                                               class="color" id="ht_view3_filterbutton_hover_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_filterbutton_background_color"><?php echo __("Filter Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_filterbutton_background_color]" type="text"
                                               class="color" id="ht_view3_filterbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_filterbutton_hover_background_color"><?php echo __("Filter Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_filterbutton_hover_background_color]" type="text"
                                               class="color" id="ht_view3_filterbutton_hover_background_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="has-background" style="display: none;">
                                        <label for="ht_view3_filterbutton_border_width"><?php echo __("Filter Button Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_filterbutton_border_width]"
                                               id="ht_view3_filterbutton_border_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <input name="params[ht_view3_filterbutton_border_color]" type="text"
                                               class="color" id="ht_view3_filterbutton_border_color" value="#FFFFFF"
                                               size="10"/>
                                        <label for="ht_view3_filterbutton_border_color"><?php echo __("Filter Button Border Color", "product-catalog"); ?></label>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_filterbutton_border_radius"><?php echo __("Filter Button Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_filterbutton_border_radius]"
                                               id="ht_view3_filterbutton_border_radius" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_filterbutton_border_padding"><?php echo __("Filter Button Padding", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_filterbutton_border_padding]"
                                               id="ht_view3_filterbutton_border_padding" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div style="display: none;">
                                        <label for="ht_view3_filterbutton_margin"><?php echo __("Filter Button Margins", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_filterbutton_margin]"
                                               id="ht_view3_filterbutton_margin" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_filtering_float"><?php echo __("Filter block Position", "product-catalog"); ?></label>
                                        <select id="ht_view3_filtering_float" name="params[ht_view3_filtering_float]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                            <option value="top"><?php echo __("Top", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div style="margin-top: 0px;">
                                    <h3><?php echo __("Description", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view3_show_description"><?php echo __("Show Description", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view3_show_description]"/>
                                        <input type="checkbox" id="ht_view3_show_description"
                                               name="params[ht_view3_show_description]" value="on"/>
                                    </div>
                                    <div>
                                        <label for="ht_view3_description_font_size"><?php echo __("Description Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_description_font_size]"
                                               id="ht_view3_description_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_description_color"><?php echo __("Description Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_description_color]" type="text" class="color"
                                               id="ht_view3_description_color" value="#FFFFFF" size="10"/>
                                    </div>
                                </div>
                                <div style=" margin-top: -118px;">
                                    <h3><?php echo __("Product Button", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view3_show_linkbutton"><?php echo __("Show Product Button", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view3_show_linkbutton]"/>
                                        <input type="checkbox" id="ht_view3_show_linkbutton"
                                               name="params[ht_view3_show_linkbutton]" value="on"/>
                                    </div>

                                    <div>
                                        <label for="ht_view3_linkbutton_font_size"><?php echo __("Product Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_linkbutton_font_size]"
                                               id="ht_view3_linkbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_linkbutton_color"><?php echo __("Product Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_linkbutton_color]" type="text" class="color"
                                               id="ht_view3_linkbutton_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_linkbutton_font_hover_color"><?php echo __("Product Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_linkbutton_font_hover_color]" type="text"
                                               class="color" id="ht_view3_linkbutton_font_hover_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_linkbutton_background_color"><?php echo __("Product Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_linkbutton_background_color]" type="text"
                                               class="color" id="ht_view3_linkbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view3_linkbutton_background_hover_color"><?php echo __("Product Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view3_linkbutton_background_hover_color]" type="text"
                                               class="color" id="ht_view3_linkbutton_background_hover_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                </div>

                                <div style="">
                                    <h3><?php echo __("Price Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_catalog_view3_show_price"><?php echo __("Show Price", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_catalog_view3_show_price]"/>
                                        <input type="checkbox" id="ht_catalog_view3_show_price"
                                               name="params[ht_catalog_view3_show_price]" value="on"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_catalog_view3_price_font_size"><?php echo __("Price Block Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_catalog_view3_price_font_size]"
                                               id="ht_catalog_view3_price_font_size" value="" class="text"/>px
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_catalog_view3_price_font_color"><?php echo __("Price Block Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_catalog_view3_price_font_color]" type="text"
                                               class="color" id="ht_catalog_view3_price_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>

                                    <div>
                                        <label for="ht_catalog_view3_price_text_font_color"><?php echo __("Price Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_catalog_view3_price_text_font_color]" type="text"
                                               class="color" id="ht_catalog_view3_price_text_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                </div>
                                <div style="margin-top: 7px">
                                    <h3><?php echo __("Load More Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="htc_view3_load_more_position"><?php echo __("Load More Position", "product-catalog"); ?></label>
                                        <select id="htc_view3_load_more_position"
                                                name="params[htc_view3_load_more_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="htc_view3_load_more_font_size"><?php echo __("Load More Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view3_load_more_font_size]"
                                               id="htc_view3_load_more_font_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view3_load_more_font_color"><?php echo __("Load More Font Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view3_load_more_font_color]" class="color"
                                               id="htc_view3_load_more_font_color" value="" class="text">

                                    </div>
                                    <div class=" ">
                                        <label for="htc_view3_load_more_font_hover_color"><?php echo __("Load More Font Hover Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view3_load_more_font_hover_color]"
                                               class="color" id="htc_view3_load_more_font_hover_color" value=""
                                               class="text">
                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view3_load_more_button_background_color"><?php echo __("Load More Button Background Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view3_load_more_button_background_color]"
                                               class="color" id="htc_view3_load_more_button_background_color" value=""
                                               class="text">

                                    </div>
                                    <div>
                                        <label for="htc_view3_load_more_button_background_hover_color"><?php echo __("Load More Button Background Hover Color", "product-catalog"); ?></label>
                                        <input type="text"
                                               name="params[htc_view3_load_more_button_background_hover_color]"
                                               class="color" id="htc_view3_load_more_button_background_hover_color"
                                               value="" class="text">
                                    </div>
                                    <div class="navigation-type-block has-height has-background"
                                         style="padding-top:10px;display:inline-block;">
                                        <label for=""><?php echo __("Loading Animation", "product-catalog"); ?> </label>
                                        <div class="has-height"
                                             style="clear:both;padding:10px 0px 0px 0px; width: 100%;">
                                            <div style=" width: 100%;">
                                                <ul id="arrows-type"
                                                    style="background: #fff;width: 100%; padding-top: 12px;">
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_1.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view3_load_more_loading_icon]" value="1"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_2.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view3_load_more_loading_icon]" value="2"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_3.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view3_load_more_loading_icon]" value="3"
                                                               style="width: 135px;height: 135px;">
                                                    </li>

                                                    <li onclick="jQuery(this).parent().find('li').removeClass('active');jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('active');">
                                                        <div class="image-block" style="width: 135px;height: 135px;">
                                                            <img src="/../../images/load_more_icon_4.gif"
                                                                 alt=""/>
                                                        </div>
                                                        <input type="radio"
                                                               name="params[htc_view3_load_more_loading_icon]" value="4"
                                                               style="width: 135px;height: 135px;">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: 15px">
                                    <h3><?php echo __("Pagination Block Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="htc_view3_pagination_font_size"><?php echo __("Pagination Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view3_pagination_font_size]"
                                               id="htc_view3_pagination_font_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="htc_view3_pagination_font_color"><?php echo __("Pagination Font Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view3_pagination_font_color]" class="color"
                                               id="htc_view3_pagination_font_color" value="" class="text">

                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view3_pagination_icon_size"><?php echo __("Pagination Icons Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view3_pagination_icon_size]"
                                               id="htc_view3_pagination_icon_size" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="">
                                        <label for="htc_view3_pagination_icon_color"><?php echo __("Pagination Icons Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[htc_view3_pagination_icon_color]" class="color"
                                               id="htc_view3_pagination_icon_color" value="" class="text">

                                    </div>
                                    <div class="has-background">
                                        <label for="htc_view3_pagination_position"><?php echo __("Pagination Position", "product-catalog"); ?></label>
                                        <select id="htc_view3_pagination_position"
                                                name="params[htc_view3_pagination_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <!--search options xxx open--->
                                <div style="margin-top: 15px">
                                    <h3><?php echo __("Product Search Options", "product-catalog"); ?></h3>
                                    <div>
                                        <label for="ht_view3_search_form_position"><?php echo __("Search Form position", "product-catalog"); ?></label>
                                        <select id="ht_view3_search_form_position"
                                                name="params[ht_view3_search_form_position]">
                                            <option value="left"><?php echo __("Left", "product-catalog"); ?></option>
                                            <option value="center"><?php echo __("Center", "product-catalog"); ?></option>
                                            <option value="right"><?php echo __("Right", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_search_form_width"><?php echo __("Search Form Width", "product-catalog"); ?></label>
                                        <div class="slider-container">
                                            <input name="params[ht_view3_search_form_width]"
                                                   id="ht_view3_search_form_width" data-slider-highlight="true"
                                                   data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text"
                                                   data-slider="true" value=""/>
                                            <span>90%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="ht_view3_search_form_border_radius"><?php echo __("Search Form Border Radius", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_search_form_border_radius]"
                                               id="ht_view3_search_form_border_radius" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_search_form_border_color"><?php echo __("Search Form Border Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_search_form_border_color]"
                                               id="ht_view3_search_form_border_color" value="" class="text color">
                                    </div>
                                    <div>
                                        <label for="ht_view3_search_form_border_width"><?php echo __("Search Form Border Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_search_form_border_width]"
                                               id="ht_view3_search_form_border_width" value="" class="text">
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_search_button_background"><?php echo __("Search Button Background", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_search_button_background]"
                                               id="ht_view3_search_button_background" value="" class="text color">
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view3_search_button_hover_color"><?php echo __("Search Button Background Hover", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_search_button_hover_color]"
                                               id="ht_view3_search_button_hover_color" value="" class="text color">
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view3_search_button_text_color"><?php echo __("Search Button Text Color", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view3_search_button_text_color]"
                                               id="ht_view3_search_button_text_color" value="" class="text color">
                                    </div>
                                </div>
                                <!--search options xxx close--->
                            </li>
                            <!-- View 5 Slider -->
                            <li id="catalog-view-options-5">
                                <div>
                                    <h3><?php echo __("View Types", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view5_allow_lightbox"><?php echo __("Allow Lightbox", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view5_allow_lightbox]"/>
                                        <input type="checkbox" id="ht_view5_allow_lightbox"
                                               name="params[ht_view5_allow_lightbox]" value="on"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view5_allow_zooming"><?php echo __("Allow Zooming", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view5_allow_zooming]"/>
                                        <input type="checkbox" id="ht_view5_allow_zooming"
                                               name="params[ht_view5_allow_zooming]" value="on"/>
                                    </div>
                                </div>
                                <div>
                                    <h3><?php echo __("Slider", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view5_slider_background_color"><?php echo __("Slider Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view5_slider_background_color]" type="text" class="color"
                                               id="ht_view5_slider_background_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div>
                                        <label for="ht_view5_icons_style"><?php echo __("Icons Style", "product-catalog"); ?></label>
                                        <select id="ht_view5_icons_style" name="params[ht_view5_icons_style]">
                                            <option value="light"><?php echo __("Light", "product-catalog"); ?></option>
                                            <option value="dark"><?php echo __("Dark", "product-catalog"); ?></option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view5_show_separator_lines"><?php echo __("Show Separator Lines", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view5_show_separator_lines]"/>
                                        <input type="checkbox" id="ht_view5_show_separator_lines"
                                               name="params[ht_view5_show_separator_lines]" value="on"/>
                                    </div>
                                </div>
                                <div style="margin-top: -30px">
                                    <h3><?php echo __("Images", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view5_main_image_width"><?php echo __("Main Image Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view5_main_image_width]"
                                               id="ht_view5_main_image_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view5_show_thumbs"><?php echo __("Show Thumbs", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view5_show_thumbs]"/>
                                        <input type="checkbox" id="ht_view5_show_thumbs"
                                               name="params[ht_view5_show_thumbs]" value="on"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view5_thumbs_width"><?php echo __("Thumbs Width", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view5_thumbs_width]"
                                               id="ht_view5_thumbs_width" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view5_thumbs_height"><?php echo __("Thumbs Height", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view5_thumbs_height]"
                                               id="ht_view5_thumbs_height" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                </div>
                                <div style="margin-top: 13px;">
                                    <h3>Title</h3>
                                    <div class="has-background">
                                        <label for="ht_view5_title_font_size"><?php echo __("Title Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view5_title_font_size]"
                                               id="ht_view5_title_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="ht_view5_title_font_color"><?php echo __("Title Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view5_title_font_color]" type="text" class="color"
                                               id="ht_view5_title_font_color" value="#FFFFFF" size="10"/>
                                    </div>
                                </div>
                                <div>
                                    <h3><?php echo __("Description", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view5_show_description"><?php echo __("Show Description", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view5_show_description]"/>
                                        <input type="checkbox" id="ht_view5_show_description"
                                               name="params[ht_view5_show_description]" value="on"/>
                                    </div>
                                    <div>
                                        <label for="ht_view5_description_font_size"><?php echo __("Description Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view5_description_font_size]"
                                               id="ht_view5_description_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view5_description_color"><?php echo __("Description Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view5_description_color]" type="text" class="color"
                                               id="ht_view5_description_color" value="#FFFFFF" size="10"/>
                                    </div>
                                </div>
                                <div style="margin-top: -160px;">
                                    <h3><?php echo __("Product Button", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_view5_show_linkbutton"><?php echo __("Show Product Button", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_view5_show_linkbutton]"/>
                                        <input type="checkbox" id="ht_view5_show_linkbutton"
                                               name="params[ht_view5_show_linkbutton]" value="on"/>
                                    </div>

                                    <div class="">
                                        <label for="ht_view5_linkbutton_font_size"><?php echo __("Product Button Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_view5_linkbutton_font_size]"
                                               id="ht_view5_linkbutton_font_size" value="" class="text"/>
                                        <span>px</span>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view5_linkbutton_color"><?php echo __("Product Button Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view5_linkbutton_color]" type="text" class="color"
                                               id="ht_view5_linkbutton_color" value="#FFFFFF" size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view5_linkbutton_font_hover_color"><?php echo __("Product Button Font Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view5_linkbutton_font_hover_color]" type="text"
                                               class="color" id="ht_view5_linkbutton_font_hover_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_view5_linkbutton_background_color"><?php echo __("Product Button Background Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view5_linkbutton_background_color]" type="text"
                                               class="color" id="ht_view5_linkbutton_background_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_view5_linkbutton_background_hover_color"><?php echo __("Product Button Background Hover Color", "product-catalog"); ?></label>
                                        <input name="params[ht_view5_linkbutton_background_hover_color]" type="text"
                                               class="color" id="ht_view5_linkbutton_background_hover_color"
                                               value="#FFFFFF" size="10"/>
                                    </div>
                                </div>

                                <div style="">
                                    <h3><?php echo __("Price Options", "product-catalog"); ?></h3>
                                    <div class="has-background">
                                        <label for="ht_catalog_view5_show_price"><?php echo __("Show Price", "product-catalog"); ?></label>
                                        <input type="hidden" value="off" name="params[ht_catalog_view5_show_price]"/>
                                        <input type="checkbox" id="ht_catalog_view5_show_price"
                                               name="params[ht_catalog_view5_show_price]" value="on"/>
                                    </div>
                                    <div class="">
                                        <label for="ht_catalog_view5_price_font_size"><?php echo __("Price Block Font Size", "product-catalog"); ?></label>
                                        <input type="text" name="params[ht_catalog_view5_price_font_size]"
                                               id="ht_catalog_view5_price_font_size" value="" class="text"/>px
                                    </div>
                                    <div class="has-background">
                                        <label for="ht_catalog_view5_price_font_color"><?php echo __("Price Block Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_catalog_view5_price_font_color]" type="text"
                                               class="color" id="ht_catalog_view5_price_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>

                                    <div>
                                        <label for="ht_catalog_view5_price_text_font_color"><?php echo __("Price Font Color", "product-catalog"); ?></label>
                                        <input name="params[ht_catalog_view5_price_text_font_color]" type="text"
                                               class="color" id="ht_catalog_view5_price_text_font_color" value="#FFFFFF"
                                               size="10"/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div id="post-body-footer">
                            <a class="save-catalog-options button-primary"><?php echo __("Save", "product-catalog"); ?></a>
                            <div class="clear"></div>
                        </div>
                </form>
            </div>

        </div>
    </div>


    <script>
        jQuery("#post-body-heading a, #post-body-footer a").click(function () {
            alert("Product Catalog Settings are disabled in free version. If you need those functionalityes, you need to buy the commercial version.");
            return false;
        });

    </script>

    <input type="hidden" name="option" value=""/>
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="controller" value="options"/>
    <input type="hidden" name="op_type" value="styles"/>
    <input type="hidden" name="boxchecked" value="0"/>

    <?php
}