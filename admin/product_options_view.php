<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
function html_show_product_options($param_values)
{ ?>

    <div class="wrap">
    <?php $path_site2 = plugins_url("../images", __FILE__);
    require "product-catalog-admin-free-banner.php"; ?>
    <div style="clear:both;"></div>
    <div style="color: #a00; width: 40%; margin: 15px auto;"><?php echo __("These features are available in the Professional version of the plugin only.", "product-catalog"); ?>
        <a href="http://huge-it.com/product-catalog/" target="_blank" class="button button-primary red_pro_button">Enable</a>
    </div>
    <div class="catalog_options_grey_overlay"></div>
    <div id="post-body-content" class="catalog-options">
        <div id="post-body-heading">
            <h3><?php echo __("Single Product Options", "product-catalog"); ?></h3>
            <a onclick="document.getElementById('adminForm').submit()"
               class="save-catalog-options button-primary"><?php echo __("Save", "product-catalog"); ?></a>
        </div>
        <div id="catalog-options-list">
            <div class="get_full_version">
                <a href="https://huge-it.com/product-catalog/" target="_blank">
                    <?php echo __("Get Full Version", "product-catalog"); ?>
                </a>
            </div>
            <ul class="options-block catalog-grey-wrapper" id="catalog-view-tabs-contents">
                <li id="catalog-view-options-0">
                    <div>
                        <h3><?php echo __("Image Options", "product-catalog"); ?></h3>
                        <div class="has-background">
                            <label for="ht_single_product_allow_lightbox"><?php echo __("Allow Lightbox", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_allow_lightbox]"/>
                            <input type="checkbox"
                                   id="ht_single_product_allow_lightbox" name="params[ht_single_product_allow_lightbox]"
                                   value="on"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_allow_zooming"><?php echo __("Allow Zooming", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_allow_zooming]"/>
                            <input type="checkbox"
                                   id="ht_view3_allow_zooming" name="params[ht_single_product_allow_zooming]"
                                   value="on"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_mainimage_width"><?php echo __("Main Image Width", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_mainimage_width]"
                                   id="ht_single_product_mainimage_width"
                                   value=""
                                   class="text"/>
                            <span>px</span>
                        </div>
                        <div>
                            <label for="ht_single_product_show_thumbs"><?php echo __("Show Thumbnails", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_show_thumbs]"/>
                            <input type="checkbox"
                                   id="ht_single_product_show_thumbs" name="params[ht_single_product_show_thumbs]"
                                   value="on"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_thumbs_width"><?php echo __("Thumbnails Width", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_thumbs_width]"
                                   id="ht_single_product_thumbs_width"
                                   value=""
                                   class="text"/>
                            <span>px</span>
                        </div>
                        <div>
                            <label for="ht_single_product_thumbs_height"><?php echo __("Thumbnails Height", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_thumbs_height]"
                                   id="ht_single_product_thumbs_height"
                                   value=""
                                   class="text"/>
                            <span>px</span>
                        </div>
                    </div>
                    <div>
                        <h3><?php echo __("Product Options", "product-catalog"); ?></h3>
                        <div class="has-background">
                            <label for="ht_single_product_background_color"><?php echo __("Product Block Background Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_background_color]" type="text" class="color"
                                   id="ht_single_product_background_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div>
                            <label for="ht_single_product_title_font_size"><?php echo __("Title Font Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_title_font_size]"
                                   id="ht_single_product_title_font_size"
                                   value=""
                                   class="text"/>
                            <span>px</span>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_title_font_color"><?php echo __("Title Font Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_title_font_color]" type="text" class="color"
                                   id="ht_single_product_title_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_show_price"><?php echo __("Show Price", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_show_price]"/>
                            <input type="checkbox"
                                   id="ht_single_product_show_price" name="params[ht_single_product_show_price]"
                                   value="on"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_price_font_size"><?php echo __("Price Font Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_price_font_size]"
                                   id="ht_single_product_price_font_size"
                                   value=""
                                   class="text"/>
                            <span>px</span>
                        </div>

                        <div class="">
                            <label for="ht_single_product_price_font_color"><?php echo __("Price Font Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_price_font_color]" type="text" class="color"
                                   id="ht_single_product_price_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_show_description"><?php echo __("Show Description", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_show_description]"/>
                            <input type="checkbox"
                                   id="ht_single_product_show_description"
                                   name="params[ht_single_product_show_description]" value="on"/>
                        </div>
                        <div>
                            <label for="ht_single_product_description_font_size"><?php echo __("Description Font Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_description_font_size]"
                                   id="ht_single_product_description_font_size"
                                   value=""
                                   class="text"/>
                            <span>px</span>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_description_font_color"><?php echo __("Description Font Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_description_font_color]" type="text" class="color"
                                   id="ht_single_product_description_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>

                        <div class="">
                            <label for="ht_single_product_show_rating"><?php echo __("Show Rating", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_show_rating]"/>
                            <input type="checkbox"
                                   id="ht_single_product_show_rating" name="params[ht_single_product_show_rating]"
                                   value="on"/>
                        </div>

                        <div class="has-background">
                            <label for="ht_single_product_show_share_buttons"><?php echo __("Show Share Buttons", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_show_share_buttons]"/>
                            <input type="checkbox"
                                   id="ht_single_product_show_share_buttons"
                                   name="params[ht_single_product_show_share_buttons]" value="on"/>
                        </div>

                        <div class="">
                            <label for="ht_single_product_rating_font_size"><?php echo __("Rating's / Share Button's Label Font Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_rating_font_size]"
                                   id="ht_single_product_rating_font_size"
                                   value=""
                                   class="text"/>
                            <span>px</span>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_rating_font_color"><?php echo __("Rating's / Share Button's Label Font Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_rating_font_color]" type="text" class="color"
                                   id="ht_single_product_rating_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_show_separator_lines"><?php echo __("Show Separator Lines", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_show_separator_lines]"/>
                            <input type="checkbox"
                                   id="ht_single_product_show_separator_lines"
                                   name="params[ht_single_product_show_separator_lines]" value="on"/>
                        </div>
                    </div>

                    <div style="margin-top: -309px;">
                        <h3><?php echo __("Comments Box Options", "product-catalog"); ?></h3>
                        <div class="has-background">
                            <label for="ht_single_product_show_comments"><?php echo __("Show Comments", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_show_comments]"/>
                            <input type="checkbox"
                                   id="ht_single_product_show_comments" name="params[ht_single_product_show_comments]"
                                   value="on"/>
                        </div>
                        <div>
                            <label for="ht_single_product_comments_name_font_color"><?php echo __("Commentator Name Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_comments_name_font_color]" type="text" class="color"
                                   id="ht_single_product_comments_name_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>

                        <div class="has-background">
                            <label for="ht_single_product_comments_content_font_color"><?php echo __("Comment Text Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_comments_content_font_color]" type="text"
                                   class="color" id="ht_single_product_comments_content_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>


                        <div class="">
                            <label for="ht_single_product_comments_tab_words_font_color"><?php echo __("Comment's box Background Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_comments_tab_words_font_color]" type="text"
                                   class="color" id="ht_single_product_comments_tab_words_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_comments_name_font_size"><?php echo __("Commentator Name Text Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_comments_name_font_size]"
                                   id="ht_single_product_comments_name_font_size"
                                   value=""
                                   class="text"/>
                            <span>px</span>
                        </div>
                        <div class="">
                            <label for="ht_single_product_comments_content_font_size"><?php echo __("Comment Text Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_comments_content_font_size]"
                                   id="ht_single_product_comments_content_font_size"
                                   value=""
                                   class="text"/>
                            <span>px</span>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_comments_submit_button_text_font_size"><?php echo __("Submit Button Text Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_comments_submit_button_text_font_size]"
                                   id="ht_single_product_comments_submit_button_text_font_size"
                                   value=""
                                   class="text"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_comments_submit_button_text_font_color"><?php echo __("Submit Button Text Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_comments_submit_button_text_font_color]" type="text"
                                   class="color" id="ht_single_product_comments_submit_button_text_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_comments_submit_button_text_font_hover_color"><?php echo __("Submit Button Text Hover Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_comments_submit_button_text_font_hover_color]"
                                   type="text" class="color"
                                   id="ht_single_product_comments_submit_button_text_font_hover_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_comments_submit_button_text_background_color"><?php echo __("Submit Button Background Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_comments_submit_button_text_background_color]"
                                   type="text" class="color"
                                   id="ht_single_product_comments_submit_button_text_background_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_comments_submit_button_text_background_hover_olor"><?php echo __("Submit Button Background Hover Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_comments_submit_button_text_background_hover_olor]"
                                   type="text" class="color"
                                   id="ht_single_product_comments_submit_button_text_background_hover_olor"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>

                    </div>

                    <div>
                        <h3><?php echo __("Tabs Options", "product-catalog"); ?></h3>
                        <div class="has-background">
                            <label for="ht_single_product_tabs_font_color"><?php echo __("Tabs Titles Font Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_tabs_font_color]" type="text" class="color"
                                   id="ht_single_product_tabs_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_tabs_font_hover_color"><?php echo __("Tabs Titles Font Hover Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_tabs_font_hover_color]" type="text" class="color"
                                   id="ht_single_product_tabs_font_hover_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_tabs_border_color"><?php echo __("Tabs Border Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_tabs_border_color]" type="text" class="color"
                                   id="ht_single_product_tabs_border_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                    </div>

                    <div style="margin-top: -5px;">
                        <h3><?php echo __("Parameters Box Options", "product-catalog"); ?></h3>
                        <div class="has-background">
                            <label for="ht_single_product_show_parameters"><?php echo __("Show Parameters", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_show_parameters]"/>
                            <input type="checkbox"
                                   id="ht_single_product_show_parameters"
                                   name="params[ht_single_product_show_parameters]" value="on"/>
                        </div>
                        <div>
                            <label for="ht_single_product_params_name_font_color"><?php echo __("Parameter Name Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_params_name_font_color]" type="text" class="color"
                                   id="ht_single_product_params_name_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>

                        <div class="has-background">
                            <label for="ht_single_product_params_values_font_color"><?php echo __("Parameter Value Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_params_values_font_color]" type="text" class="color"
                                   id="ht_single_product_params_values_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                    </div>

                    <div style="margin-top: -180px;">
                        <h3><?php echo __("Contact Seller Button Styles", "product-catalog"); ?></h3>
                        <div class="has-background">
                            <label for="ht_single_product_show_asc_seller_button"><?php echo __("Show Contact Seller Button", "product-catalog"); ?></label>
                            <input type="hidden" value="off" name="params[ht_single_product_show_asc_seller_button]"/>
                            <input type="checkbox"
                                   id="ht_single_product_show_asc_seller_button"
                                   name="params[ht_single_product_show_asc_seller_button]" value="on"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_asc_seller_button_text_size"><?php echo __("Button Text Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_asc_seller_button_text_size]"
                                   id="ht_single_product_asc_seller_button_text_size"
                                   value=""
                                   class="text"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_asc_seller_button_text_color"><?php echo __("Button Text Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_asc_seller_button_text_color]" type="text"
                                   class="color" id="ht_single_product_asc_seller_button_text_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_asc_seller_button_text_hover_color"><?php echo __("Button Text Hover Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_asc_seller_button_text_hover_color]" type="text"
                                   class="color" id="ht_single_product_asc_seller_button_text_hover_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_asc_seller_button_background_color"><?php echo __("Single", "product-catalog"); ?>
                                Button Background Color</label>
                            <input name="params[ht_single_product_asc_seller_button_background_color]" type="text"
                                   class="color" id="ht_single_product_asc_seller_button_background_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_asc_seller_button_background_hover_color"><?php echo __("Single", "product-catalog"); ?>
                                Button Background Hover Color</label>
                            <input name="params[ht_single_product_asc_seller_button_background_hover_color]" type="text"
                                   class="color" id="ht_single_product_asc_seller_button_background_hover_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_asc_seller_button_position"><?php echo __("Button Position", "product-catalog"); ?></label>
                            <select id="ht_single_product_asc_seller_button_position"
                                    name="params[ht_single_product_asc_seller_button_position]">
                                <option value="left">Left
                                </option>
                                <option value="center">Center
                                </option>
                                <option value="right">Right
                                </option>
                            </select>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_asc_seller_button_border_radius"><?php echo __("Button Border Radius", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_asc_seller_button_border_radius]"
                                   id="ht_single_product_asc_seller_button_border_radius"
                                   value=""
                                   class="text"/>
                            <span>px</span>
                        </div>
                    </div>

                    <div style="margin-top: -10px;">
                        <h3><?php echo __("Contact Seller Popup Styles", "product-catalog"); ?></h3>
                        <div class="has-background">
                            <label for="ht_single_product_tabs_font_color"><?php echo __("Popup Background Gradient", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_asc_seller_popup_background_1]" type="text"
                                   class="color" id="ht_single_product_asc_seller_popup_background_1"
                                   value="#FFFFFF"
                                   size="10" style="width: 47px"/>
                            <input name="params[ht_single_product_asc_seller_popup_background_2]" type="text"
                                   class="color" id="ht_single_product_asc_seller_popup_background_2"
                                   value="#333333"
                                   size="10" style="width: 47px"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_asc_to_seller_text"><?php echo __("Popup Title", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_asc_to_seller_text]"
                                   id="ht_single_product_asc_to_seller_text"
                                   value=""
                                   class="text"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_asc_to_seller_text_font_size"><?php echo __("Popup Title Font Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_asc_to_seller_text_font_size]"
                                   id="ht_single_product_asc_to_seller_text_font_size"
                                   value=""
                                   class="text"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_asc_to_seller_text_font_color"><?php echo __("Popup Title Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_asc_to_seller_text_font_color]" type="text"
                                   class="color" id="ht_single_product_asc_to_seller_text_font_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_asc_seller_popup_close_style"><?php echo __("Close Button Style", "product-catalog"); ?></label>
                            <select id="ht_single_product_asc_seller_popup_close_style"
                                    name="params[ht_single_product_asc_seller_popup_close_style]">
                                <option value="light"><?php echo __("Light", "product-catalog"); ?>
                                </option>
                                <option value="dark"><?php echo __("Dark", "product-catalog"); ?>
                                </option>
                            </select>
                        </div>
                        <div class="">
                            <label for="ht_single_product_asc_to_seller_input_border_size"><?php echo __("Text Field Border Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_asc_to_seller_input_border_size]"
                                   id="ht_single_product_asc_to_seller_input_border_size"
                                   value=""
                                   class="text"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_asc_to_seller_input_border_color"><?php echo __("Text Field Border Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_asc_to_seller_input_border_color]" type="text"
                                   class="color" id="ht_single_product_asc_to_seller_input_border_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_asc_seller_popup_button_text_size"><?php echo __("Submit Button Text Size", "product-catalog"); ?></label>
                            <input type="text" name="params[ht_single_product_asc_seller_popup_button_text_size]"
                                   id="ht_single_product_asc_seller_popup_button_text_size"
                                   value=""
                                   class="text"/>
                        </div>
                        <div class="has-background">
                            <label for="ht_single_product_asc_seller_popup_button_text_color"><?php echo __("Submit Button Text Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_asc_seller_popup_button_text_color]" type="text"
                                   class="color" id="ht_single_product_asc_seller_popup_button_text_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>

                        <div class="has-background">
                            <label for="ht_single_product_asc_seller_popup_button_background_color"><?php echo __("Submit Button Background Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_asc_seller_popup_button_background_color]" type="text"
                                   class="color" id="ht_single_product_asc_seller_popup_button_background_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                        <div class="">
                            <label for="ht_single_product_asc_seller_popup_button_background_hover_color"><?php echo __("Submit Button Background Hover Color", "product-catalog"); ?></label>
                            <input name="params[ht_single_product_asc_seller_popup_button_background_hover_color]"
                                   type="text" class="color"
                                   id="ht_single_product_asc_seller_popup_button_background_hover_color"
                                   value="#FFFFFF"
                                   size="10"/>
                        </div>
                    </div>

                </li>
            </ul>
            <div id="post-body-footer">
                <a onclick="document.getElementById('adminForm').submit()"
                   class="save-catalog-options button-primary"><?php echo __("Save", "product-catalog"); ?></a>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <style>
        #wpfooter {
            position: inherit;
        }

        .catalog_left_pading {
            padding-left: 20px;
        }

        .catalog-options div label .help {
            float: right;
            position: relative;
            display: inline-block;
            width: 20px;
            height: 20px;
            margin: 0px 10px 0px 20px;
            border: 1px solid #888;
            border-radius: 20px;
            text-indent: 7px;
        }

        .catalog-options div label .help:hover {
            border: 1px solid #1e8cbe;
            border-radius: 20px;
            text-indent: 7px;
        }

        .catalog-options div .help-block {
            position: absolute;
            min-width: 250px;
            padding: 5px;
            top: 30px;
            left: -121px;
            background: #fff;
            border: 1px solid #aaa;
            border-radius: 3px;
            display: none;
            font-size: 12px;
            z-index: 5;
            text-align: justify;
        }

        .catalog-options div .help-block.active {
            display: block;
        }

        .catalog-options div .help-block .pnt {
            position: absolute;
            width: 10px;
            height: 11px;
            top: -10px;
            left: 50%;
            margin-left: -5px;
            background: url(../images/help.box.pnt.gif) left top no-repeat;
        }

        .catalog-options div .help-block p {
            margin: 0px;
            padding: 0px;
            text-indent: 0px;
        }

        #post-body-heading {
            width: 100%;
            padding: 10px 0px 10px 0px;
            height: 30px;
            background: #fff;
            border-bottom: 1px solid #e5e5e5;
        }

        .catalog-options #post-body-heading {
            width: 100%;
        }

        #post-body-heading h3 {
            float: left;
            margin: -5px 0px 0px 5px !important;
            padding: 0px;
        }

        #post-body-heading .button, #post-body-heading .save-catalog-options {
            float: right;
            margin-right: 10px !important;
        }

        #post-body-heading .button.add-post-slide input {
            position: absolute;
            display: none;
        }

        #post-body-heading .button.add-new-image .wp-media-buttons-icon {
            background: url('../../../../wp-admin/images/media-button.png') no-repeat top left;
            display: inline-block;
            width: 140px;
            height: 24px;
            vertical-align: text-top;
            color: #fff;
            -webkit-box-shadow: inset 0 0px 0 #fff, 0 1px 0 rgba(0, 0, 0, .08);
            box-shadow: inset 0 0px 0 #fff, 0 1px 0 rgba(0, 0, 0, .08);
            border: none;
            padding-left: 22px;
            background-position: 0px;
            margin-right: 0px !important;
        }

        #post-body-heading .button.add-new-catalog .wp-media-buttons-icon {
            background: url('../../../../wp-admin/images/media-button.png') no-repeat top left;
            display: inline-block;
            width: 140px;
            height: 24px;
            vertical-align: text-top;
            color: #fff;
            -webkit-box-shadow: inset 0 0px 0 #fff, 0 1px 0 rgba(0, 0, 0, .08);
            box-shadow: inset 0 0px 0 #fff, 0 1px 0 rgba(0, 0, 0, .08);
            border: none;
            padding-left: 22px;
            background-position: 0px;
            margin-right: 0px !important;
        }

        #post-body-heading .button.add-post-slide .wp-media-buttons-icon {
            background: url('../../../../wp-admin/images/post-ats.png') no-repeat top left;
            display: inline-block;
            width: 16px;
            height: 16px;
            vertical-align: text-top;
            margin: 2px 7px 0px 0px;
        }

        #post-body-footer {
            float: right;
        }

        #catalog-options-list {
            width: 100%;
            background: #fff;
        }

        #catalog-view-tabs-contents > li {
            position: relative;
            width: 100%;
            float: left;
            display: block;
            background: #fff;
        }

        #catalog-view-tabs-contents > li > div {
            position: relative;
            display: block;
            float: left;
            margin: 10px 1% 25px 1%;
            padding: 0px 1% 10px 1%;
            width: 46%;
            background: #f9f9f9;
        }

        #catalog-view-tabs-contents > li div.has-background {
            background: #fff;
        }

        #catalog-view-tabs-contents > li div.has-height > div {
            display: inline-block;
        }

        #catalog-view-tabs-contents > li > div h3 {
            display: block;
            text-align: center;
            margin: 0px 0px 10px 0px;
        }

        #catalog-view-tabs-contents > li > div > div {
            position: relative;
            clear: both;
            width: 100%;
            height: 35px;
            padding: 5px 0px 0px 0px;
            margin: 0px !important;
        }

        #catalog-view-tabs-contents > li > div > div label {
            display: inline-block;
            width: 60%;
            padding: 5px 0px 0px 2%;
            height: 30px;
            float: left;
        }

        #catalog-view-tabs-contents > li > div > div div.slider-container {
            position: relative;
            display: inline-block;
            width: 145px;
            margin-left: -5px;
        }

        #catalog-view-tabs-contents > li > div > div div.slider-container span {
            position: absolute;
            top: -3px;
            right: 0px;
        }

        #catalog-view-tabs-contents > li > div > div input[type='text'], #catalog-view-tabs-contents > li > div > div select {
            width: 100px;
        }

        #catalog-view-tabs-contents > li > div > div input[type='checkbox'] {
            margin: 7px 0px 3px 0px;
        }

        #catalog-view-tabs-contents > li > div > div.bws_position_table input {
            margin: 3px 17px 3px 3px;
        }


    </style>
<?php } ?>