<?php

if ($catalog[0]->pagination_type == "show_all") {
    $myAllImages = count($images);
    if ($myAllImages < $catalog[0]->count_into_page)            //update pagination bug
        $countIntoPage = $myAllImages;
    else
        $countIntoPage = $catalog[0]->count_into_page;
    if ($countIntoPage == "" || $countIntoPage < 1) {
        $countIntoPage = 1;
    }
    $pages = ceil($myAllImages / $countIntoPage);
    if (isset($_GET["catalog_page_" . $catalogID])) {
        $page_index = absint($_GET["catalog_page_" . $catalogID]);
    } else {
        $page_index = 1;
    }
    $maxCount = $page_index * $countIntoPage;
    $morePaste = $maxCount - $myAllImages;
} else {
    if (isset($_GET["catalog_page_" . $catalogID])) {
        $myAllImages = count($images);
        if ($myAllImages < $catalog[0]->count_into_page)            //update pagination bug
            $countIntoPage = $myAllImages;
        else
            $countIntoPage = $catalog[0]->count_into_page;
        if ($countIntoPage == "" || $countIntoPage < 1) {
            $countIntoPage = 1;
        }
        $pages = ceil($myAllImages / $countIntoPage);
        $page_index = absint($_GET["catalog_page_" . $catalogID]);
        $maxCount = $page_index * $countIntoPage;
        $morePaste = $maxCount - $myAllImages;


        if ($page_index <= 1 || ($maxCount > $myAllImages) && $morePaste > $countIntoPage) {
            $imagesUsefulElements = array();
            for ($usefulKeys = 0; $usefulKeys < $countIntoPage; $usefulKeys++) {
                $imagesUsefulElements[] = $images[$usefulKeys];
            }
            $images = $imagesUsefulElements;
        } elseif (($maxCount <= $myAllImages) || ($maxCount > $myAllImages && $morePaste <= $countIntoPage)) {
            $show_from = $page_index * $countIntoPage - $countIntoPage;
            $show_until = $page_index * $countIntoPage - 1;
            $usefulElementsKey = 0;


            foreach ($images as $galleryElements) {
                if ($usefulElementsKey >= $show_from && $usefulElementsKey <= $show_until) {
                    $imagesUsefulElements[] = $galleryElements;
                }
                $usefulElementsKey++;
            }
            $images = $imagesUsefulElements;
        }
    } else {
        $myAllImages = count($images);
        $page_index = 1;
        if ($myAllImages < $catalog[0]->count_into_page)            //update pagination bug
            $countIntoPage = $myAllImages;
        else
            $countIntoPage = $catalog[0]->count_into_page;
        if ($countIntoPage == "" || $countIntoPage < 1) {
            $countIntoPage = 1;
        }
        $pages = ceil($myAllImages / $countIntoPage);
        $imagesUsefulElements = array();
        for ($usefulKeys = 0; $usefulKeys < $countIntoPage; $usefulKeys++) {
            $imagesUsefulElements[] = $images[$usefulKeys];
        }
        $images = $imagesUsefulElements;
    }
}

?>

<script>
    /***<add search for view> ***/

    var $ob_<?php echo $catalogID; ?> = {
        action: 'my_action',
        post: 'load_more_elements_into_catalog',
        view: <?php echo $catalog[0]->catalog_list_effects_s; ?>,
        catalog_id: <?php echo $catalogID; ?>,
        count_into_page: <?php echo $countIntoPage; ?>,
        allow_lightbox: "<?php echo $paramssld['ht_view2_allow_lightbox']; ?>",
        show_thumbs: "<?php echo $paramssld['ht_view2_show_thumbs']; ?>",
        thumbs_position: "<?php echo $paramssld['ht_view2_thumbs_position']; ?>",
        show_popup_title: "<?php echo $paramssld['ht_view2_show_popup_title']; ?>",
        show_description: "<?php echo $paramssld['ht_view2_show_description']; ?>",
        show_price: "<?php echo $paramssld["ht_catalog_view2_show_price"]; ?>",
        price_text: "<?php echo $paramssld3['ht_single_product_price_text']; ?>",
        show_linkbutton: "<?php echo $paramssld['ht_view2_element_show_linkbutton']; ?>",
        linkbutton_text: "<?php echo $paramssld3["ht_catalog_general_linkbutton_text"]; ?>",
        parmalink: "<?php echo get_permalink(); ?>",
        show_popup_linkbutton: "<?php echo $paramssld["ht_view2_show_popup_linkbutton"]; ?>"
    };
    /***</add search for view> ***/

    var allowZooming = '<?php echo $paramssld['ht_view2_allow_zooming'];?>';

    jQuery(function () {
        var defaultBlockWidth =<?php echo $paramssld['ht_view2_element_width']; ?>;
        var defaultBlockHeight =<?php echo $paramssld['ht_view2_element_height']; ?>;

        var $container = jQuery('#huge_it_catalog_container_<?php echo $catalogID; ?>');


        // add randomish size classes
        $container.find('.element_<?php echo $catalogID; ?>').each(function () {
            var $this = jQuery(this),
                number = parseInt($this.find('.number').text(), 10);
            if (number % 7 % 2 === 1) {
                $this.addClass('width2');
            }
            if (number % 3 === 0) {
                $this.addClass('height2');
            }
        });

        $container.hugeitmicro({
            itemSelector: '.element_<?php echo $catalogID; ?>',
            masonry: {
                columnWidth: <?php echo $paramssld['ht_view2_element_width']; ?>+20 +<?php echo $paramssld['ht_view2_element_border_width'] * 2; ?>
            },
            masonryHorizontal: {
                rowHeight: 300 + 20
            },
            cellsByRow: {
                columnWidth: 300 + 20,
                rowHeight: 240
            },
            cellsByColumn: {
                columnWidth: 300 + 20,
                rowHeight: 240
            },
            getSortData: {
                symbol: function ($elem) {
                    return $elem.attr('data-symbol');
                },
                category: function ($elem) {
                    return $elem.attr('data-category');
                },
                number: function ($elem) {
                    return parseInt($elem.find('.number').text(), 10);
                },
                weight: function ($elem) {
                    return parseFloat($elem.find('.weight').text().replace(/[\(\)]/g, ''));
                },
                id: function ($elem) {
                    return $elem.find('.id').text();
                }
            }
        });


        var $optionSets = jQuery('#huge_it_catalog_options_<?php echo $catalogID; ?> .option-set'),
            $optionLinks = $optionSets.find('a');

        $optionLinks.click(function () {
            var $this = jQuery(this);

            if ($this.hasClass('selected')) {
                return false;
            }
            var $optionSet = $this.parents('.option-set');
            $optionSet.find('.selected').removeClass('selected');
            $this.addClass('selected');


            var options = {},
                key = $optionSet.attr('data-option-key'),
                value = $this.attr('data-option-value');

            value = value === 'false' ? false : value;
            options[key] = value;
            if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {

                changeLayoutMode($this, options)
            } else {

                $container.hugeitmicro(options);
            }
            return false;
        });


        var isHorizontal = false;

        function changeLayoutMode($link, options) {
            var wasHorizontal = isHorizontal;
            isHorizontal = $link.hasClass('horizontal');

            if (wasHorizontal !== isHorizontal) {

                var style = isHorizontal ?
                    {height: '75%', width: $container.width()} :
                    {width: 'auto'};

                $container.filter(':animated').stop();

                $container.addClass('no-transition').css(style);
                setTimeout(function () {
                    $container.removeClass('no-transition').hugeitmicro(options);
                }, 100)
            } else {
                $container.hugeitmicro(options);
            }
        }


        $container.delegate('.default-block_<?php echo $catalogID; ?>', 'click', function () {
            var strheight = 0;
            jQuery(this).parents('.element_<?php echo $catalogID; ?>').find('.wd-catalog-panel_<?php echo $catalogID; ?> > div').each(function () {
                strheight += jQuery(this).outerHeight() + 10;
            })
            strheight +=<?php echo $paramssld['ht_view0_block_height'] + 45; ?>;
            if (jQuery(this).parents('.element_<?php echo $catalogID; ?>').hasClass("large")) {
                jQuery(this).parents('.element_<?php echo $catalogID; ?>').animate({
                    height: "<?php echo $paramssld['ht_view0_block_height'] + 45; ?>px"
                }, 300, function () {
                    jQuery(this).removeClass('large');
                    $container.hugeitmicro('reLayout');
                });

                jQuery(this).parents('.element_<?php echo $catalogID; ?>').removeClass("active");
                return false;
            }


            jQuery(this).parents('.element_<?php echo $catalogID; ?>').css({height: strheight});
            jQuery(this).parents('.element_<?php echo $catalogID; ?>').addClass('large');

            $container.hugeitmicro('reLayout');
            jQuery(this).parents('.element_<?php echo $catalogID; ?>').css({height: "<?php echo $paramssld['ht_view0_block_height'] + 45; ?>px"});

            jQuery(this).parents('.element_<?php echo $catalogID; ?>').animate({
                height: strheight + "px",
            }, 300, function () {
                $container.hugeitmicro('reLayout');
            });
        });

        var $sortBy = jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?> #sort-by');
        jQuery('#huge_it_catalog_content_<?php echo $catalogID; ?> #shuffle a').click(function () {
            $container.hugeitmicro('shuffle');
            $sortBy.find('.selected').removeClass('selected');
            $sortBy.find('[data-option-value="random"]').addClass('selected');
            return false;
        });

        jQuery(window).load(function () {
            $container.hugeitmicro({filter: '*'});
        });

        ////filteringgggggg

        // bind filter on select change
        jQuery(document).ready(function () {
            jQuery('#huge_it_catalog_filters_<?php echo $catalogID; ?> ul li').click(function () {
                // get filter value from option value
                var filterValue = jQuery(this).attr('rel');
                // use filterFn if matches value
                filterValue = filterValue;//filterFns[ filterValue ] ||
                $container.hugeitmicro({filter: filterValue});
            });
            <?php // if(($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right") && $paramssld["ht_view2_filtering_float"] == "none")
            //                  { ?>
//                        var topmargin = jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?> ul").height();
//                        jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php // }
            //            else  {
            //                    if(($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right") && $paramssld["ht_view2_sorting_float"] == "none")
            //                      { ?>
//                         var topmargin = jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").height();
//                         jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?>").css({'margin-top':'5px'});
            <?php // }
            //                  } ?>


            /*    <--    VIEW 2 LOAD MORE CLICK    */
            /*

             */

            /*           VIEW 2 LOAD MORE CLICK    -->    */
            /*      <-- POPUP LEFT CLICK -->        */
            jQuery("#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .left-change").click(function () {
                //var strid = jQuery(this).closest(".pupup-element").prev(".pupup-element").find('a').data('popupid').replace('#','');
                var height = jQuery(window).height();
                //jQuery('#huge_it_gallery_pupup_element_'+strid).css({height:height*0.7});
                var num = jQuery(this).find("a").attr("href").replace('#', '');
                if (num >= 1) {
                    var strid = jQuery(this).closest(".pupup-element").prev(".pupup-element").find('a').data('popupid').replace('#', '');
                    jQuery('#huge_it_catalog_pupup_element_' + strid).css({height: height * 0.7});
                    jQuery(this).closest(".pupup-element").removeClass("active");
                    jQuery(this).closest(".pupup-element").prev(".pupup-element").addClass("active");
                } else {
                    var strid = jQuery("#huge_it_catalog_popup_list_<?php echo $catalogID; ?>").find(".pupup-element").last().find('a').data('popupid').replace('#', '');
                    jQuery('#huge_it_catalog_pupup_element_' + strid).css({height: height * 0.7});
                    jQuery(this).closest(".pupup-element").removeClass("active");
                    jQuery("#huge_it_catalog_popup_list_<?php echo $catalogID; ?>").find(".pupup-element").last().addClass("active");
                }
                if (jQuery('.pupup-element.active .description').height() + jQuery('.right-block h3').height() + 350 > jQuery('.pupup-element.active .right-block').height()) {
                    if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block_<?php echo $catalogID; ?>').height()) {
                        jQuery('.pupup-element.active .right-block').css('overflow-y', '');
                        jQuery('.pupup-element.active .popup-wrapper_<?php echo $catalogID; ?>').css('overflow-y', 'auto');
                    } else {
                        jQuery('.pupup-element.active .right-block').css('overflow-y', 'auto');
                    }
                } else {
                    if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block_<?php echo $catalogID; ?>').height()) {
                        jQuery('.pupup-element.active .popup-wrapper_<?php echo $catalogID; ?>').css('overflow-y', 'auto');
                    }
                }

            });

            /*      <-- POPUP RIGHT CLICK -->        */
            jQuery("#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .right-change").click(function () {
                var height = jQuery(window).height();
                var num = jQuery(this).find("a").attr("href").replace('#', '');
                var cnt = 0;
                jQuery("#huge_it_catalog_popup_list_<?php echo $catalogID; ?>").find(".pupup-element").each(function () {
                    cnt++;
                });
//            alert(num+" "+cnt);
                if (num <= cnt) {
                    var strid = jQuery(this).closest(".pupup-element").next(".pupup-element").find('a').data('popupid').replace('#', '');
                    jQuery('#huge_it_catalog_pupup_element_' + strid).css({height: height * 0.7});
                    jQuery(this).closest(".pupup-element").removeClass("active");
                    jQuery(this).closest(".pupup-element").next(".pupup-element").addClass("active");
                } else {
                    var strid = jQuery("#huge_it_catalog_popup_list_<?php echo $catalogID; ?>").find(".pupup-element:first-child a").data('popupid').replace('#', '');
                    jQuery('#huge_it_catalog_pupup_element_' + strid).css({height: height * 0.7});
                    jQuery(this).closest(".pupup-element").removeClass("active");
                    jQuery("#huge_it_catalog_popup_list_<?php echo $catalogID; ?>").find(".pupup-element:first-child").addClass("active");
                }
                if (jQuery('.pupup-element.active .description').height() + jQuery('.right-block h3').height() + 350 > jQuery('.pupup-element.active .right-block').height()) {
                    if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block_<?php echo $catalogID; ?>').height()) {
                        jQuery('.pupup-element.active .right-block').css('overflow-y', '');
                        jQuery('.pupup-element.active .popup-wrapper_<?php echo $catalogID; ?>').css('overflow-y', 'auto');
                    } else {
                        jQuery('.pupup-element.active .right-block').css('overflow-y', 'auto');
                    }
                } else {
                    if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block_<?php echo $catalogID; ?>').height()) {
                        jQuery('.pupup-element.active .popup-wrapper_<?php echo $catalogID; ?>').css('overflow-y', 'auto');
                    }
                }
            });
            //////

        });

    });
    jQuery(document).ready(function () {

        jQuery('body').delegate('.element_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> .image-overlay a', 'click', function () {
            var strid = jQuery(this).attr('href').replace('#', '');
            jQuery('body').append('<div id="huge-popup-overlay_<?php echo $catalogID; ?>"></div>');
            jQuery('#huge_it_catalog_popup_list_<?php echo $catalogID; ?>').insertBefore('#huge-popup-overlay_<?php echo $catalogID; ?>');
            var height = jQuery(window).height();
            var width = jQuery(window).width();
            if (width <= 767) {
                jQuery('body').scrollTop(0);
            }
            jQuery('#huge_it_catalog_pupup_element_' + strid).addClass('active').css({height: height * 0.7});
            jQuery('#huge_it_catalog_popup_list_<?php echo $catalogID; ?>').addClass('active');

            jQuery('#huge_it_catalog_pupup_element_' + strid + ' ul.thumbs-list_<?php echo $catalogID; ?> li:first-child').addClass('active');
            var strsrc = jQuery('#huge_it_catalog_pupup_element_' + strid + ' ul.thumbs-list_<?php echo $catalogID; ?> li:first-child a img').attr('src');
            jQuery('#huge_it_catalog_pupup_element_' + strid + ' .image-block_<?php echo $catalogID; ?> img').attr('src', strsrc);
            //alert(strsrc);
            if (jQuery('.pupup-element.active .description').height() + jQuery('.right-block h3').height() + 350 > jQuery('.pupup-element.active .right-block').height()) {
                if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block_<?php echo $catalogID; ?>').height()) {
                    jQuery('.pupup-element.active .right-block').css('overflow-y', '');
                    jQuery('.pupup-element.active .popup-wrapper_<?php echo $catalogID; ?>').css('overflow-y', 'auto');
                } else {
                    jQuery('.pupup-element.active .right-block').css('overflow-y', 'auto');
                }
            } else {
                if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block_<?php echo $catalogID; ?>').height()) {
                    jQuery('.pupup-element.active .popup-wrapper_<?php echo $catalogID; ?>').css('overflow-y', 'auto');
                }
            }
            return false;
        });

        jQuery('body').delegate('#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li a', 'click', function () {
            var width = jQuery(window).width();
            if (width <= 767) {
                jQuery('body').scrollTop(0);
            }
            jQuery(this).parent().parent().find('li.active').removeClass('active');
            jQuery(this).parent().addClass('active');
            jQuery(this).parents('.right-block').prev().find('img').attr('src', jQuery(this).find('img').attr('src'));
            return false;
        });

        jQuery('body').delegate('#huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close', 'click', function () {
            closePopup();
            return false;
        });

        jQuery('body').on('click', '#huge-popup-overlay_<?php echo $catalogID; ?>', function () {
            closePopup();
            return false;
        });

        function closePopup() {
            jQuery('#huge-popup-overlay_<?php echo $catalogID; ?>').remove();
            jQuery('#huge_it_catalog_popup_list_<?php echo $catalogID; ?> li').removeClass('active');
            jQuery('#huge_it_catalog_popup_list_<?php echo $catalogID; ?>').removeClass('active');
        }
    });
</script>

<style type="text/css">

    .element_<?php echo $catalogID; ?> {
        width: <?php echo $paramssld['ht_view2_element_width']; ?>px;
        height: <?php echo $paramssld['ht_view2_element_height']+45; ?>px;
        margin: 0px 0px 10px 0px;
        background: #<?php echo $paramssld['ht_view2_element_background_color']; ?>;
        border: <?php echo $paramssld['ht_view2_element_border_width']; ?> px solid #<?php echo $paramssld['ht_view2_element_border_color']; ?>;
        outline: none;
    }

    .element_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> {
        position: relative;
        width: 100%;
    }

    .element_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> img {
        margin: 0px !important;
        padding: 0px !important;
        width: <?php echo $paramssld['ht_view2_element_width']; ?>px !important;
        height: <?php echo $paramssld['ht_view2_element_height']; ?>px !important;
        display: block;
        border-radius: 0px !important;
        box-shadow: 0 0px 0px rgba(0, 0, 0, 0) !important;
    }

    .element_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> .image-overlay {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_element_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_element_overlay_transparency"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>;
        display: none;
    }

    .element_<?php echo $catalogID; ?>:hover .image-block_<?php echo $catalogID; ?> .image-overlay {
        display: block;
    }

    .element_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> .image-overlay a {
        position: absolute;
        top: 0px;
        left: 0px;
        display: block;
        width: 100%;
        height: 100%;
        background: url('<?php echo  plugins_url( '../images/zoom.'.$paramssld["ht_view2_zoombutton_style"].'.png' , __FILE__ ); ?>') center center no-repeat;
    }

    .element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> {
        position: relative;
        height: 30px;
        margin: 0;
        padding: 15px 0px 15px 0px;
        -webkit-box-shadow: inset 0 1px 0 rgba(0, 0, 0, .1);
        box-shadow: inset 0 1px 0 rgba(0, 0, 0, .1);
    }

    .element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> h3 {
        position: relative;
        margin: 0px !important;
        padding: 0px 1% 0px 1% !important;
        width: 98%;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        font-weight: normal;
        font-size: <?php echo $paramssld["ht_view2_element_title_font_size"];?>px !important;
        line-height: <?php echo $paramssld["ht_view2_element_title_font_size"]+4;?>px !important;
        color: #<?php echo $paramssld["ht_view2_element_title_font_color"];?>;
    }

    .element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> .button-block {
        position: absolute;
        right: 0px;
        top: 0px;
        display: none;
        vertical-align: middle;
        height: 30px;
        padding: 10px 10px 4px 10px;
        background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_element_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_element_overlay_transparency"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>;
        border-left: 1px solid rgba(0, 0, 0, .05);
    }

    .element_<?php echo $catalogID; ?>:hover .title-block_<?php echo $catalogID; ?> .button-block {
        display: block;
    }

    .element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a, .element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a:link, .element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a:visited,
    .element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a:hover, .element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a:focus, .element_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> a:active {
        position: relative;
        display: block;
        vertical-align: middle;
        padding: 3px 10px 3px 10px;
        border-radius: 3px;
        font-size: <?php echo $paramssld["ht_view2_element_linkbutton_font_size"];?>px;
        background: #<?php echo $paramssld["ht_view2_element_linkbutton_background_color"];?>;
        color: #<?php echo $paramssld["ht_view2_element_linkbutton_color"];?>;
        text-decoration: none;
    }

    /*#####POPUP#####*/

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> {
        position: fixed;
        display: table;
        width: 80%;
        top: 7%;
        left: 7%;
        margin: 0px !important;
        list-style: none;
        z-index: 20000000;
        display: none;
        height: 90%;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?>.active {
        display: table;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element {
        position: relative;
        display: none;
        width: 100%;
        padding: 40px 0px 20px 0px;
        min-height: 100%;
        position: relative;
        background: #<?php echo $paramssld["ht_view2_popup_background_color"];?>;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element.active {
        display: block;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> {
        position: absolute;
        width: 100%;
        height: 40px;
        top: 0px;
        left: 0px;
        z-index: 2001;
        background: url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close:link, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close:visited {
        position: relative;
        float: right;
        width: 40px;
        height: 40px;
        display: block;
        background: url('<?php echo  plugins_url( '../images/close.popup.'.$paramssld["ht_view2_popup_closebutton_style"].'.png' , __FILE__ ); ?>') center center no-repeat;
        border-left: 1px solid #ccc;
        opacity: .65;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close:hover, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close:focus, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .close:active {
        opacity: 1;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element .popup-wrapper_<?php echo $catalogID; ?> {
        position: relative;
        width: 98%;
        height: 98%;
        padding: 2% 0% 0% 2%;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> {
        width: 55%;
    <?php if($paramssld['ht_view2_popup_full_width'] == 'off') { echo "height:100%;"; }
        else {echo "height: 100%;";} ?> position: relative;
        float: left;
        margin-right: 2%;
        border-right: 1px solid #ccc;
        min-width: 200px;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> img {
    <?php
        if($paramssld['ht_view2_popup_full_width'] == 'off') { echo "max-width:100% !important; max-height:100% !important; margin: 0px auto !important; position:relative;"; }
        else { echo "width:100% !important;"; }
    ?> display: block;
        padding: 0px !important;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block {
        height: 100%;
        width: 42.8%;
        position: relative;
        float: left;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element .popup-wrapper_<?php echo $catalogID; ?> .right-block > div {
        padding-top: 10px;
        margin-right: 4%;
        margin-bottom: 10px;
    <?php if($paramssld['ht_view2_show_separator_lines']=="on") {?> background: url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center top repeat-x;
    <?php } ?>
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element .popup-wrapper_<?php echo $catalogID; ?> .right-block > div:last-child {
        background: none;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .title {
        position: relative;
        display: block;
        margin: 0px 0px 10px 0px !important;
        font-size: <?php echo $paramssld["ht_view2_popup_title_font_size"];?>px !important;
        line-height: <?php echo $paramssld["ht_view2_popup_title_font_size"]+4;?>px !important;
        color: #<?php echo $paramssld["ht_view2_popup_title_font_color"];?>;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description {
        clear: both;
        position: relative;
        font-weight: normal;
        text-align: justify;
        font-size: <?php echo $paramssld["ht_view2_description_font_size"];?>px !important;
        color: #<?php echo $paramssld["ht_view2_description_color"];?>;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h1,
    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h2,
    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h3,
    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h4,
    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h5,
    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description h6,
    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description p,
    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description strong,
    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description span {
        padding: 2px !important;
        margin: 0px !important;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description ul,
    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .description li {
        padding: 2px 0px 2px 5px;
        margin: 0px 0px 0px 8px;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .price-block_<?php echo $catalogID; ?> {
        padding: 20px 0px 7px 0px !important;
        font-size: <?php echo $paramssld['ht_catalog_view2_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view2_price_font_color']; ?>;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .old-price {
        text-decoration: line-through;
        margin: 0px;
        padding: 0px;
        font-weight: normal;
        /*        font-size: 14px;*/
        padding: 7px 10px 7px 10px;
        margin: 0px 10px 0px 0px;
        border-radius: 5px;
        color: #<?php echo $paramssld['ht_view2_popup_background_color']; ?>;
        background: #<?php echo $paramssld['ht_catalog_view2_price_font_color']; ?>;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .old-price-block {
        font-size: <?php echo $paramssld['ht_catalog_view2_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view2_price_font_color']; ?>;

    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .discont-price-block {
        /*	font-size:
    <?php echo $paramssld['ht_catalog_view2_market_price_font_size']; ?> px;
        color: #
    <?php echo $paramssld['ht_catalog_view2_market_price_font_color']; ?> ; */
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> {
        list-style: none;
        display: table;
        position: relative;
        clear: both;
        width: 100%;
        margin: 0px auto;
        padding: 0px;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li {
        display: block;
        float: left;
        width: <?php echo $paramssld["ht_view2_thumbs_width"];?>px;
        height: <?php echo $paramssld["ht_view2_thumbs_height"];?>px;
        margin: 0px 2% 5px 1% !important;
        opacity: 0.45;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li.active, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li:hover {
        opacity: 1;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li a {
        display: block;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block ul.thumbs-list_<?php echo $catalogID; ?> li img {
        margin: 0px !important;
        padding: 0px !important;
        width: <?php echo $paramssld["ht_view2_thumbs_width"];?>px !important;
        height: <?php echo $paramssld["ht_view2_thumbs_height"];?>px !important;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .price-block_<?php echo $catalogID; ?> p {
        font-size: <?php echo $paramssld['ht_catalog_view2_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view2_price_font_color']; ?>;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block .market-price-block_<?php echo $catalogID; ?> p {
        font-size: <?php echo $paramssld['ht_catalog_view2_market_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view2_market_price_font_color']; ?>;
    }

    .pupup-element .button-block {
        position: relative;
    }

    .pupup-element .button-block a, .pupup-element .button-block a:link, .pupup-element .button-block a:visited {
        position: relative;
        display: inline-block;
        padding: 6px 12px;
        background: #<?php echo $paramssld["ht_view2_popup_linkbutton_background_color"];?>;
        color: #<?php echo $paramssld["ht_view2_popup_linkbutton_color"];?>;
        font-size: <?php echo $paramssld["ht_view2_popup_linkbutton_font_size"];?>;
        text-decoration: none;
    }

    .pupup-element .button-block a:hover, .pupup-element .button-block a:focus, .pupup-element .button-block a:active {
        background: #<?php echo $paramssld["ht_view2_popup_linkbutton_background_hover_color"];?>;
        color: #<?php echo $paramssld["ht_view2_popup_linkbutton_font_hover_color"];?>;
    }

    #huge-popup-overlay_<?php echo $catalogID; ?> {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        z-index: 199;
        background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_popup_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_popup_overlay_transparency_color"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>
    }

    @media only screen and (max-width: 767px) {

        #huge_it_catalog_popup_list_<?php echo $catalogID; ?> {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: auto !important;
            left: 0px;
        }

        #huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element {
            margin: 0px;
            height: auto !important;
            position: absolute;
            left: 0px;
            top: 0px;
        }

        #huge_it_catalog_popup_list_<?php echo $catalogID; ?> li.pupup-element .popup-wrapper_<?php echo $catalogID; ?> {
            height: auto !important;
            overflow-y: auto;
        }

        #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> {
            width: 100%;
            float: none;
            clear: both;
            margin-right: 0px;
            border-right: 0px;
        }

        #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .popup-wrapper_<?php echo $catalogID; ?> .right-block {
            width: 100%;
            float: none;
            clear: both;
            margin-right: 0px;
            border-right: 0px;
        }

        #huge-popup-overlay_<?php echo $catalogID; ?> {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            z-index: 199;
        }

    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> {
    <?php if ($paramssld["ht_view2_show_sorting"] == 'off')
    echo "display:none;";
    if($paramssld["ht_view2_filtering_float"] == 'left' && $paramssld["ht_view2_sorting_float"] == 'none') { if($catalogShowFiltering == "on") { echo "margin-left: 30%;"; } else { echo "margin-left: 0%;"; } }
    //else if($paramssld["ht_view2_filtering_float"] == 'right' && $paramssld["ht_view2_sorting_float"] == 'none' || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%;"; } ?> overflow: hidden;
        /*margin-top: 5px;*/
        float: <?php echo $paramssld["ht_view2_sorting_float"]; ?>;
        width: <?php echo $sorting_block_width; ?>;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
        margin: 0px !important;
        padding: 0px !important;
        list-style: none;
    <?php if($paramssld["ht_view2_sorting_float"] == 'top') {
          echo "float:left;margin-left:1%;";
          } ?>
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul {
        margin: 0px !important;
        padding: 0px !important;
        overflow: hidden;
    <?php if($paramssld["ht_view2_filtering_float"] == 'top') {
        echo "float:left;margin-left:1%;";
        } ?>
    }

    <?php if($paramssld["ht_view2_sorting_float"] == 'none') { ?>
    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
        float: left;
    }

    <?php } ?>

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li {
        border-radius: <?php echo $paramssld["ht_view2_sortbutton_border_radius"];?>px;
        list-style-type: none;
        margin: 0px !important;
    <?php
        if($sorting_block_width == "100%" ) {
            echo "float:left !important;margin: 4px 8px 4px 0px !important;";
        }
        if($left_to_top == "ok")
        { echo "float:left !important;"; }
        if($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else
        { echo 'border: 1px solid #ccc;'; }
    ?>
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a {
        background-color: # <?php echo $paramssld["ht_view2_sortbutton_background_color"];?> !important;
        font-size: <?php echo $paramssld["ht_view2_sortbutton_font_size"];?>px !important;
        color: # <?php echo $paramssld["ht_view2_sortbutton_font_color"];?> !important;
        text-decoration: none;
        cursor: pointer;
        margin: 0px !important;
        display: block;
        padding: 3px;
    }

    /*#huge_it_catalog_content_
    <?php echo $catalogID; ?>  #huge_it_catalog_options_
    <?php echo $catalogID; ?>
     ul li:hover {

    }*/

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a:hover {
        background-color: # <?php echo $paramssld["ht_view2_sortbutton_hover_background_color"];?> !important;
        color: # <?php echo $paramssld["ht_view2_sortbutton_hover_font_color"];?> !important;
        cursor: pointer;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> {
        /*margin-top: 5px;*/
        float: <?php echo $paramssld["ht_view2_filtering_float"]; ?>;
        width: <?php echo $filtering_block_width; ?>;
    <?php
        if ($paramssld["ht_view2_show_filtering"] == 'off') echo "display:none;";
        if($paramssld["ht_view2_filtering_float"] == 'top' && ($paramssld["ht_view2_sorting_float"] == 'left') ) { if($catalogShowSorting == 'on') { echo "margin-left: 31%;"; } else echo "margin-left: 1%"; }
        //if(($paramssld["ht_view2_filtering_float"] == 'none' && ($paramssld["ht_view2_sorting_float"] == 'right')) || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%";}
    ?>
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li {
        list-style-type: none;
    <?php
        if($filtering_block_width == "100%") { echo "float:left !important;margin: 4px 8px 4px 0px !important;"; }
        if($left_to_top == "ok") { echo "float:left !important;"; }
        if($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else echo "border: 1px solid #ccc;";
    ?>
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li a {
        font-size: <?php echo $paramssld["ht_view2_filterbutton_font_size"];?>px !important;
        color: # <?php echo $paramssld["ht_view2_filterbutton_font_color"];?> !important;
        background-color: # <?php echo $paramssld["ht_view2_filterbutton_background_color"];?> !important;
        border-radius: <?php echo $paramssld["ht_view2_filterbutton_border_radius"];?>px;
        padding: 3px;
        display: block;
        text-decoration: none;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li a:hover {
        color: # <?php echo $paramssld["ht_view2_filterbutton_hover_font_color"];?> !important;
        background-color: # <?php echo $paramssld["ht_view2_filterbutton_hover_background_color"];?> !important;
        cursor: pointer
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> section {
        position: relative;
        display: block;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_container_<?php echo $catalogID; ?> {
    <?php if($paramssld["ht_view2_sorting_float"] == "left" && $paramssld["ht_view2_filtering_float"] == "right" ||
             $paramssld["ht_view2_sorting_float"] == "right" && $paramssld["ht_view2_filtering_float"] == "left")
           { echo "margin: 0px auto;"; }
           if((($paramssld["ht_view2_filtering_float"] == "left" || $paramssld["ht_view2_filtering_float"] == "right" && $paramssld["ht_view2_sorting_float"] == "top") || ($paramssld["ht_view2_sorting_float"] == "left" || $paramssld["ht_view2_sorting_float"] == "right" && $paramssld["ht_view2_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
           {
    ?> width: <?php echo $width_middle; ?> !important;
    <?php } ?>
    }

    .catalog_pagination_block_<?php echo $catalogID; ?> {
        /*text-align:
    <?php echo $paramssld["htc_view2_pagination_position"]; ?> ;*/
        padding: 20px 0px;
        margin: 16px 0px 35px 0px;
    }

    .catalog_pagination_<?php echo $catalogID; ?> {
        text-align: <?php echo $paramssld["htc_view2_pagination_position"]; ?>;
        /*display: inline-block;*/
        /*height: 50px;*/
        /*    border: 1px solid #dadada;
            border-radius: 6px;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> a, .catalog_pagination_<?php echo $catalogID; ?> span {
        color: #515151;
        font-size: 20px;
        text-decoration: none;
        text-align: center;
        margin: 0;
        padding: 0;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .pagination-text {
        color: #<?php echo $paramssld["htc_view2_pagination_font_color"]; ?>;
        font-size: <?php echo $paramssld["htc_view2_pagination_font_size"]; ?>px;
        padding: 12px 0px;
        text-decoration: none;
        text-align: center;
    }

    @media only screen and (max-width: 500px) {
        .catalog_pagination_<?php echo $catalogID; ?> .pagination-text {
            font-size: 16px !important;
            width: 120px !important;
        }

        .catalog_pagination_block_<?php echo $catalogID; ?> {
            text-align: left;
        }
    }

    .catalog_pagination_<?php echo $catalogID; ?> a {
        text-align: center;
        position: relative;
        margin-right: 5px;

    }

    .catalog_pagination_<?php echo $catalogID; ?> a i {
        font-size: <?php echo $paramssld["htc_view2_pagination_icon_size"]; ?>px;
        color: #<?php echo $paramssld["htc_view2_pagination_icon_color"]; ?>;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-first {
        font-size: 10px !important;
        /*background:url('
    <?php echo  plugins_url( '../images/first-active.png' , __FILE__ ); ?> ') center center no-repeat;*/

    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-first-passive {
        font-size: 10px !important;
        /*background-color: #F0F0F0 !important;*/
        /*background:url('
    <?php echo  plugins_url( '../images/first-passive.png' , __FILE__ ); ?> ') center center no-repeat;*/
        /*    border-right: 1px solid #D0D0D0;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-previous {
        font-size: 10px !important;
        /*background-color: #F0F0F0 !important;*/
        /*background:url('
    <?php echo  plugins_url( '../images/left-active.png' , __FILE__ ); ?> ') center center no-repeat;*/
        /*border-right: 1px solid #D0D0D0;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-previous-passive {
        /*background-color: #F0F0F0 !important;*/
        /*background:url('
    <?php echo  plugins_url( '../images/left-passive.png' , __FILE__ ); ?> ') center center no-repeat;*/
        /*border-right: 1px solid #D0D0D0;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-last {
        font-size: 10px !important;
        /*background-color: #F0F0F0 !important;*/
        /*background:url('
    <?php echo  plugins_url( '../images/last-active.png' , __FILE__ ); ?> ') center center no-repeat;*/
        /*    border-left: 1px solid #D0D0D0;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-last-passive {
        font-size: 10px !important;
        /*background-color: #F0F0F0 !important;*/
        /*background:url('
    <?php echo  plugins_url( '../images/last-passive.png' , __FILE__ ); ?> ') center center no-repeat;*/
        /*    border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-left: 1px solid #D0D0D0;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-next {
        font-size: 10px !important;
        /*background-color: #F0F0F0 !important;*/
        /*background:url('
    <?php echo  plugins_url( '../images/right-active.png' , __FILE__ ); ?> ') center center no-repeat;*/
        /*border-left: 1px solid #D0D0D0;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-next-passive {
        font-size: 10px !important;
        /*background-color: #F0F0F0 !important;*/
        /*background:url('
    <?php echo  plugins_url( '../images/right-passive.png' , __FILE__ ); ?> ') center center no-repeat;*/
        /*border-left: 1px solid #D0D0D0;*/
    }

    .zoomContainer {
        z-index: 10;
    }

    .catalog_load_block_<?php echo $catalogID; ?> {
        margin: 35px 0px;
    }

    .catalog_load_<?php echo $catalogID; ?> {
        text-align: center;
    }

    .catalog_load_<?php echo $catalogID; ?> a {
        text-decoration: none;
        /*width: 100%;*/
        border-radius: 5px;
        display: inline-block;
        padding: 5px 15px;
        font-size: <?php echo $paramssld["htc_view2_load_more_font_size"]; ?>px !important;
        color: # <?php echo $paramssld["htc_view2_load_more_font_color"]; ?> !important;
        background: # <?php echo $paramssld["htc_view2_load_more_button_background_color"]; ?> !important;
        cursor: pointer;
    }

    .catalog_load_<?php echo $catalogID; ?> a:hover {
        color: # <?php echo $paramssld["htc_view2_load_more_font_hover_color"]; ?> !important;
        background: # <?php echo $paramssld["htc_view2_load_more_button_background_hover_color"]; ?> !important;
    }

    .catalog_load_<?php echo $catalogID; ?> a:focus {
        outline: none;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .left-change, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .right-change {
        width: 40px;
        height: 39px;
        font-size: 25px;
        display: inline-block;
        text-align: center;
        border: 1px solid #eee;
        border-bottom: none;
        border-top: none;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .right-change {
        margin-left: -6px;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .right-change:hover, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .left-change:hover {
        background: #ddd;
        border-color: #ccc;
        color: #000 !important;
        cursor: pointer;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .right-change a:hover, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .left-change a:hover {
        color: #000 !important;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .right-change a:active, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .left-change a:active {
        outline: none;
        border: none;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .right-change a:visited, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .left-change a:visited {
        color: #000 !important;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .right-change a, #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> .left-change a {
        color: #777;
        text-decoration: none;
        width: 12px;
        height: 17px;
        display: inline-block;
    }

    #huge_it_catalog_popup_list_<?php echo $catalogID; ?> .heading-navigation_<?php echo $catalogID; ?> a {
        border: none;
        text-decoration: none;
    }

    /*<add search>*/
    #search_block_<?php echo $catalogID; ?> {
        text-align: <?php echo $paramssld["ht_view2_search_form_position"]; ?>;
        margin: 5px;
    }

    #search_block_<?php echo $catalogID; ?> > form {
        position: relative;
        height: 36px;
        display: inline-block;
        width: <?php echo $paramssld["ht_view2_search_form_width"]; ?>%;
        overflow: hidden;
        border-radius: <?php echo $paramssld["ht_view2_search_form_border_radius"]; ?>px;
        border: <?php echo $paramssld["ht_view2_search_form_border_width"]; ?> px solid #<?php echo $paramssld["ht_view2_search_form_border_color"]; ?>;
    }

    #search_block_<?php echo $catalogID; ?> > form > input {
        width: 100%;
        height: 36px;
        display: block;
        position: absolute;
        padding: 5px 10px;
        top: 0;
        left: 0;
        border: none;
        color: #272717;
        background: #FFFFFF;
        margin: 0;
    }

    #search_block_<?php echo $catalogID; ?> > form > input + div {
        display: inline-block;
        color: #<?php echo $paramssld["ht_view2_search_button_background"]; ?>;
        position: absolute;
        display: none;
        cursor: pointer;
        height: calc(100% - 2px);
        top: 1px;
        width: 6%;
        right: 20%;
        text-align: center;
        font-size: 20px;
        background: #FFFFFF;
    }

    #search_block_<?php echo $catalogID; ?> > form:hover > input + div {
        display: block;
    }

    #search_block_<?php echo $catalogID; ?> > form > input:blur + div {
        display: none;
    }

    #search_block_<?php echo $catalogID; ?> > form > #search_button_<?php echo $catalogID; ?> {
        width: 20%;
        height: 36px;
        display: block;
        position: absolute;
        padding: 0 10px 5px;
        top: 0;
        right: 0%;
        border-top-right-radius: <?php echo $paramssld["ht_view2_search_form_border_radius"]; ?>px;
        border: 0;
        background: #<?php echo $paramssld["ht_view2_search_button_background"]; ?>;
        color: #<?php echo $paramssld["ht_view2_search_button_text_color"]; ?>;
        margin: 0;
    }

    #search_block_<?php echo $catalogID; ?> > form > #search_button_<?php echo $catalogID; ?>:hover {
        background: #<?php echo $paramssld["ht_view2_search_button_hover_color"]; ?>;
    }

    #search_not_results_<?php echo $catalogID; ?> {
        width: 100%;
        height: 40px;
        background: #F1F1F1;
        color: #A49999;
        border-radius: 5px;
        border: 2px solid #E1E3DF;
        text-align: center;
        display: none;
    }

    #search_not_results_<?php echo $catalogID; ?> > span {
        padding: 0;
        margin: 0;
        line-height: 36px;
        font-size: 14px;
    }

    /*</add search>*/
</style>

<section id="huge_it_catalog_content_<?php echo $catalogID; ?>" class="product-catalog-content">
    <?php if ($catalogShowSorting == "on") { ?>
        <div id="huge_it_catalog_options_<?php echo $catalogID; ?>" class="">
            <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected"
                       data><?php echo $paramssld["ht_view2_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id"
                       data-option-value="id"><?php echo $paramssld["ht_view2_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol"
                       data-option-value="symbol"><?php echo $paramssld["ht_view2_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view2_sorting_name_by_random"]; ?></a>
                </li>
            </ul>

            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true"
                       class="selected"><?php echo $paramssld["ht_view2_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false"
                       data-option-value="false"><?php echo $paramssld["ht_view2_sorting_name_by_desc"]; ?></a></li>
            </ul>
        </div>
    <?php }
    if ($catalogShowFiltering == "on") { ?>
        <div id="huge_it_catalog_filters_<?php echo $catalogID; ?>">
            <ul>
                <li rel="*"><a>All</a></li>
                <?php
                $catalogCats = explode(",", $catalogCats);
                foreach ($catalogCats as $catalogCatsValue) {
                    if (!empty($catalogCatsValue)) {
                        ?>
                        <li rel=".<?php echo str_replace(" ", "_", $catalogCatsValue); ?>">
                            <a><?php echo str_replace("_", " ", $catalogCatsValue); ?></a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    <?php }
    if ($catalogSearch == 'on') { ?>
        <div id="search_block_<?php echo $catalogID; ?>">
            <form>
                <input type="text"/>
                <div><i class="hugeiticons hugeiticons-times"></i></div>
                <button id="search_button_<?php echo $catalogID; ?>" type="submit"><i
                            class="hugeiticons hugeiticons-search"></i>
                </button>
            </form>
            <div id="search_not_results_<?php echo $catalogID; ?>">
                <span><?php echo $paramssld3['ht_catalog_general_no_search_result_text']; ?></span></div>
        </div>
    <?php } ?>
    <div id="huge_it_catalog_container_<?php echo $catalogID; ?>"
         class="super-list variable-sizes clearfix" <?php //if($paramssld["ht_view2_sorting_float"] == "top" && $paramssld["ht_view2_filtering_float"] == "top") echo "style='clear: both;'";?>
         style="margin-top: 5px;">
        <?php

        foreach ($images as $key => $row) {
            $link = $row->sl_url;
            $descnohtml = strip_tags($row->description);
            $result = substr($descnohtml, 0, 50);
//                      $catForFilter = explode(",", $row->category);
            ?>
            <div class="element_<?php echo $catalogID; ?> <?php if ($paramssld['ht_view2_allow_lightbox'] == "on") {
                echo "catalog_ccolorbox_grouping_" . $catalogID;
            } ?> " tabindex="0" data-element-id="<?php echo esc_attr($row->id); ?>"
                 data-symbol="<?php echo esc_attr($row->name); ?>" data-category="alkaline-earth">
                <div class="image-block_<?php echo $catalogID; ?>">
                    <?php $imgurl = explode(";", $row->image_url); ?>
                    <?php if ($row->image_url != ';') { ?>
                        <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo esc_attr($imgurl[0]); ?>" alt=""/>
                    <?php } else { ?>
                        <img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.png" alt=""/>
                        <?php
                    } ?>
                    <div class="image-overlay"><a href="#<?php echo $row->id; ?>"></a></div>
                </div>
                <div class="title-block_<?php echo $catalogID; ?>">
                    <h3><?php echo $row->name; ?></h3>
                    <?php if ($paramssld["ht_view2_element_show_linkbutton"] == 'on') {
                        if ($row->single_product_url_type == "default") {
                            $page_link = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
                            if (strpos(get_permalink(), '/?') !== false) {
                                $product_page_link = get_permalink() . "&single_prod_id=$row->id";
                            } else {
                                if (strpos(get_permalink(), '/') !== false) {
                                    $product_page_link = get_permalink() . "?single_prod_id=$row->id";
                                } else {
                                    $product_page_link = get_permalink() . "/?single_prod_id=$row->id";
                                }
                            }
                        } else {
                            $product_page_link = $row->single_product_url_type;
                        }
                        ?>
                        <div class="button-block"><a
                                    href="<?php echo esc_url($product_page_link); ?>" <?php if ($row->link_target == 'on') {
                                echo ' target="_blank"';
                            } ?> ><?php echo $paramssld3["ht_catalog_general_linkbutton_text"]; ?></a></div>
                    <?php } ?>
                </div>
            </div>
            <?php
        } ?>
        <div style="clear:both;"></div>
    </div>

    <?php
    include "catalog_pagination.php";
    ?>

</section>
<ul id="huge_it_catalog_popup_list_<?php echo $catalogID; ?>">
    <?php
    $changePopup = 1;
    foreach ($images as $key => $row) {
        $imgurl = explode(";", $row->image_url);
        array_pop($imgurl);
        $link = $row->sl_url;
        $descnohtml = strip_tags($row->description);
        $result = substr($descnohtml, 0, 50);
        ?>
        <li class="pupup-element" id="huge_it_catalog_pupup_element_<?php echo $row->id; ?>">
            <div class="heading-navigation_<?php echo $catalogID; ?>">
                <div style="display: inline-block; float: left;">
                    <div class="left-change"><a href="#<?php echo $changePopup - 1; ?>"
                                                data-popupid="#<?php echo $row->id; ?>"><</a></div>
                    <div class="right-change"><a href="#<?php echo $changePopup + 1; ?>"
                                                 data-popupid="#<?php echo $row->id; ?>">></a></div>
                </div>
                <?php $changePopup = $changePopup + 1; ?>
                <a href="#close" class="close"></a>
                <div style="clear:both;"></div>
            </div>
            <div class="popup-wrapper_<?php echo $catalogID; ?>">
                <div class="image-block_<?php echo $catalogID; ?>">
                    <?php if ($row->image_url != ';') { ?>
                        <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo esc_attr($imgurl[0]); ?>" alt=""/>
                    <?php } else { ?>
                        <img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.png" alt=""/>
                        <?php
                    } ?>
                </div>
                <div class="right-block">
                    <?php if ($paramssld["ht_view2_show_popup_title"] == 'on') { ?><h3
                            class="title"><?php echo $row->name; ?></h3><?php } ?>

                    <?php if ($paramssld["ht_view2_thumbs_position"] == 'before' and $paramssld["ht_view2_show_thumbs"] == 'on') { ?>
                        <div>
                            <ul class="thumbs-list_<?php echo $catalogID; ?>">
                                <?php
                                foreach ($imgurl as $key => $img) { ?>
                                    <li><a href="<?php echo esc_attr($row->sl_url); ?>" class=""><img
                                                    src="<?php echo esc_attr($img); ?>"></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php if ($paramssld["ht_view2_show_description"] == 'on') { ?>
                        <div class="description"><?php echo $row->description; ?></div><?php } ?>

                    <?php if ($paramssld["ht_view2_thumbs_position"] == 'after' and $paramssld["ht_view2_show_thumbs"] == 'on') { ?>
                        <div>
                            <ul class="thumbs-list_<?php echo $catalogID; ?>">
                                <?php $imgurl = explode(";", $row->image_url);
                                array_pop($imgurl);
                                foreach ($imgurl as $key => $img) {
                                    ?>
                                    <li><a href="#" class="group1"><img src="<?php echo esc_attr($img); ?>"></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php if ($paramssld["ht_catalog_view2_show_price"] == 'on' && $row->price != "") { ?>
                        <div class="price-block_<?php echo $catalogID; ?>">
                            <span class="old-price-block"><?php echo $paramssld3['ht_single_product_price_text']; ?>
                                : <span class="old-price" <?php if ($row->market_price == "") {
                                    echo "style='text-decoration: none !important;'";
                                } ?>><?php echo $row->price; ?></span></span>
                            <span class="discont-price-block"><span
                                        class="discont-price"><?php echo $row->market_price; ?></span></span>
                        </div>
                    <?php } ?>

                    <?php if ($paramssld["ht_view2_show_popup_linkbutton"] == 'on') {
                        if ($row->single_product_url_type == "default") {
                            $page_link = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
                            if (strpos(get_permalink(), '/?') !== false) {
                                $product_page_link = get_permalink() . "&single_prod_id=$row->id";
                            } else {
                                if (strpos(get_permalink(), '/') !== false) {
                                    $product_page_link = get_permalink() . "?single_prod_id=$row->id";
                                } else {
                                    $product_page_link = get_permalink() . "/?single_prod_id=$row->id";
                                }
                            }
                        } else {
                            $product_page_link = $row->single_product_url_type;
                        }
                        ?>
                        <div class="button-block">
                            <a href="<?php echo esc_url($product_page_link); ?>" <?php if ($row->link_target == 'on') {
                                echo ' target="_blank"';
                            } ?>><?php echo $paramssld3["ht_catalog_general_linkbutton_text"]; ?></a>
                        </div>
                    <?php } ?>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
        </li>
        <?php
    } ?>
</ul>