<?php

if ($catalog[0]->pagination_type == "show_all") {
    $myAllImages = count($images);
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

        $imagesUsefulElements = array();
        if ($page_index <= 1 || ($maxCount > $myAllImages) && $morePaste > $countIntoPage) {
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
//                    var_dump($usefulKeys);
        }
        $images = $imagesUsefulElements;
    }
}

?>

<style type="text/css">
    <?php // if($paramssld["ht_catalog_zoom_lens_size_fix"] == "true") { ?>

    /*.zoomLens {
        width:
    <?php echo $paramssld["ht_catalog_zoom_lens_width"]; ?>
    px !important;
        height:
    <?php echo $paramssld["ht_catalog_zoom_lens_height"]; ?> px !important;*/
    /*}*/
    <?php // } ?>

    .element_<?php echo $catalogID; ?> {
        position: relative;
        width: 93%;
        margin: 5px 0px 5px 0px;
        padding: 2%;
        clear: both;
        overflow: hidden;
        border: <?php echo $paramssld['ht_view3_element_border_width']; ?> px solid #<?php echo $paramssld['ht_view3_element_border_color']; ?>;
        background: #<?php echo $paramssld['ht_view3_element_background_color']; ?>;
    }

    .element_<?php echo $catalogID; ?> > div {
        display: table-cell;
    }

    .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> {
        padding-right: 10px;
    }

    .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .main-image-block_<?php echo $catalogID; ?> {
        clear: both;
        width: <?php echo $paramssld['ht_view3_mainimage_width']; ?>px;
    }

    .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .main-image-block_<?php echo $catalogID; ?> img {
        margin: 0px !important;
        padding: 0px !important;
        width: <?php echo $paramssld['ht_view3_mainimage_width']; ?>px !important;
        height: auto;
    }

    .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block {
        position: relative;
        margin-top: 10px;
    }

    .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block ul {
        width: <?php echo $paramssld['ht_view3_mainimage_width']; ?>px;
        height: auto;
        display: table;
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block ul li {
        margin: 0px 3px 5px 2px;
        padding: 0px;
        width: <?php echo $paramssld['ht_view3_thumbs_width']; ?>px;
        height: <?php echo $paramssld['ht_view3_thumbs_height']; ?>px;
        float: left;
    }

    .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block ul li a {
        display: block;
        width: <?php echo $paramssld['ht_view3_thumbs_width']; ?>px;
        height: <?php echo $paramssld['ht_view3_thumbs_height']; ?>px;
    }

    .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block ul li a img {
        margin: 0px !important;
        padding: 0px !important;
        width: <?php echo $paramssld['ht_view3_thumbs_width']; ?>px;
        height: <?php echo $paramssld['ht_view3_thumbs_height']; ?>px;
    }

    .element_<?php echo $catalogID; ?> div.right-block {
        vertical-align: top;
    }

    .element_<?php echo $catalogID; ?> div.right-block > div {
        width: 100%;
        padding-bottom: 10px;
        margin-top: 10px;
    <?php if($paramssld['ht_view3_show_separator_lines']=="on") {?> background: url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
    <?php } ?>
    }

    .element_<?php echo $catalogID; ?> div.right-block > div:last-child {
        background: none;
    }

    .element_<?php echo $catalogID; ?> div.right-block .title-block_<?php echo $catalogID; ?> {
        margin-top: 3px;
    }

    .element_<?php echo $catalogID; ?> div.right-block .title-block_<?php echo $catalogID; ?> h3 {
        margin: 0px;
        padding: 0px;
        font-weight: normal;
        font-size: <?php echo $paramssld['ht_view3_title_font_size']; ?>px !important;
        line-height: <?php echo $paramssld['ht_view3_title_font_size']+4; ?>px !important;
        color: #<?php echo $paramssld['ht_view3_title_font_color']; ?>;
    }

    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> p, .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> {
        margin: 0px;
        padding: 0px;
        font-weight: normal;
        font-size: <?php echo $paramssld['ht_view3_description_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_view3_description_color']; ?>;
    }

    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h1,
    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h2,
    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h3,
    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h4,
    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h5,
    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> h6,
    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> p,
    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> strong,
    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> span {
        padding: 2px !important;
        margin: 0px !important;
    }

    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> ul,
    .element_<?php echo $catalogID; ?> div.right-block .description-block_<?php echo $catalogID; ?> li {
        padding: 2px 0px 2px 5px;
        margin: 0px 0px 0px 8px;
    }

    .element_<?php echo $catalogID; ?> div.right-block .price-block_<?php echo $catalogID; ?> {
        color: #<?php echo $paramssld['ht_catalog_view3_price_font_color']; ?>;
    }

    .element_<?php echo $catalogID; ?> div.right-block .old-price {
        text-decoration: line-through;
        font-weight: normal;
        font-size: <?php echo $paramssld['ht_catalog_view3_price_font_size']; ?>px;
        padding: 7px 10px 7px 10px;
        margin: 0px 10px 0px 0px;
        border-radius: 5px;
        color: #<?php echo $paramssld['ht_view3_element_background_color']; ?>;
        background: #<?php echo $paramssld['ht_catalog_view3_price_font_color']; ?>;
    }

    .element_<?php echo $catalogID; ?> div.right-block .old-price-block {

    }

    .element_<?php echo $catalogID; ?> div.right-block .discont-price-block {

    }

    .element_<?php echo $catalogID; ?> .button-block {
        position: relative;
    }

    .element_<?php echo $catalogID; ?> div.right-block .button-block a, .element_<?php echo $catalogID; ?> div.right-block .button-block a:link, .element_<?php echo $catalogID; ?> div.right-block .button-block a:visited {
        position: relative;
        display: inline-block;
        padding: 6px 12px;
        background: #<?php echo $paramssld["ht_view3_linkbutton_background_color"];?>;
        color: #<?php echo $paramssld["ht_view3_linkbutton_color"];?>;
        font-size: <?php echo $paramssld["ht_view3_linkbutton_font_size"];?>;
        text-decoration: none;
    }

    .element_<?php echo $catalogID; ?> div.right-block .button-block a:hover, .pupup-elemen.element div.right-block .button-block a:focus, .element_<?php echo $catalogID; ?> div.right-block .button-block a:active {
        background: #<?php echo $paramssld["ht_view3_linkbutton_background_hover_color"];?>;
        color: #<?php echo $paramssld["ht_view3_linkbutton_font_hover_color"];?>;
    }

    @media only screen and (max-width: 767px) {

        .element_<?php echo $catalogID; ?> > div {
            display: block;
            width: 100%;
            clear: both;
        }

        .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> {
            padding-right: 0px;
        }

        .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .main-image-block_<?php echo $catalogID; ?> {
            clear: both;
            width: 100%;
        }

        .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .thumbs-block ul {
            width: 100%;
        }
    }

    @media only screen and (max-width: 600px) {
        .element_<?php echo $catalogID; ?> div.left-block_<?php echo $catalogID; ?> .main-image-block_<?php echo $catalogID; ?> img {
            margin: 0px !important;
            padding: 0px !important;
            width: 100% !important;
            height: auto;
        }
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> {
    <?php if ($paramssld["ht_view3_show_sorting"] == 'off')
    echo "display:none;";
    if($paramssld["ht_view3_filtering_float"] == 'left' && $paramssld["ht_view3_sorting_float"] == 'none') { if($catalogShowFiltering == "on") { echo "margin-left: 30%;"; } else echo "margin-left: 0%;"; }
//    else if($paramssld["ht_view3_filtering_float"] == 'right' && $paramssld["ht_view3_sorting_float"] == 'none' || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%;"; } ?> overflow: hidden;
        margin-top: 5px;
        float: <?php echo $paramssld["ht_view3_sorting_float"]; ?>;
        width: <?php echo $sorting_block_width; ?>;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
        margin: 0px !important;
        padding: 0px !important;
        list-style: none;
    <?php if($paramssld["ht_view3_sorting_float"] == 'top') {
          echo "float:left;margin-left:1%;";
          } ?>
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul {
        margin: 0px !important;
        padding: 0px !important;
        overflow: hidden;
    <?php if($paramssld["ht_view3_filtering_float"] == 'top') {
        echo "float:left;margin-left:1%;";
        } ?>
    }

    <?php if($paramssld["ht_view3_sorting_float"] == 'none') { ?>
    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
        float: left;
    }

    <?php } ?>

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li {
        border-radius: <?php echo $paramssld["ht_view3_sortbutton_border_radius"];?>px;
        list-style-type: none;
        margin: 0px !important;
    <?php
        if($sorting_block_width == "100%" ) {
            echo "float:left !important;margin: 4px 8px 4px 0px !important;";
        }
        if($left_to_top == "ok")
        { echo "float:left !important;"; }
        if($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else
        { echo 'border: 1px solid #ccc;'; }
    ?>
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a {
        background-color: # <?php echo $paramssld["ht_view3_sortbutton_background_color"];?> !important;
        font-size: <?php echo $paramssld["ht_view3_sortbutton_font_size"];?>px !important;
        color: # <?php echo $paramssld["ht_view3_sortbutton_font_color"];?> !important;
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
        background-color: # <?php echo $paramssld["ht_view3_sortbutton_hover_background_color"];?> !important;
        color: # <?php echo $paramssld["ht_view3_sortbutton_hover_font_color"];?> !important;
        cursor: pointer;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> {
        margin-top: 5px;
        float: <?php echo $paramssld["ht_view3_filtering_float"]; ?>;
        width: <?php echo $filtering_block_width; ?>;
    <?php
        if ($paramssld["ht_view3_show_filtering"] == 'off') echo "display:none;";
        if($paramssld["ht_view3_filtering_float"] == 'none' && ($paramssld["ht_view3_sorting_float"] == 'left') ) { if($catalogShowSorting == 'on') { echo "margin-left: 31%;"; } else echo "margin-left: 1%"; }
//        if(($paramssld["ht_view3_filtering_float"] == 'none' && ($paramssld["ht_view3_sorting_float"] == 'right')) || ($sorting_block_width == '100%' && $filtering_block_width == "100%")) { echo "margin-left: 1%";}
    ?>
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li {
        list-style-type: none;
    <?php
        if($filtering_block_width == "100%") { echo "float:left !important;margin: 4px 8px 4px 0px !important;"; }
        if($left_to_top == "ok") { echo "float:left !important;"; }
        if($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right")
        { echo 'border-bottom: 1px solid #ccc;'; }
        else echo "border: 1px solid #ccc;";
    ?>
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li a {
        font-size: <?php echo $paramssld["ht_view3_filterbutton_font_size"];?>px !important;
        color: # <?php echo $paramssld["ht_view3_filterbutton_font_color"];?> !important;
        background-color: # <?php echo $paramssld["ht_view3_filterbutton_background_color"];?> !important;
        border-radius: <?php echo $paramssld["ht_view3_filterbutton_border_radius"];?>px;
        padding: 3px;
        display: block;
        text-decoration: none;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li a:hover {
        color: # <?php echo $paramssld["ht_view3_filterbutton_hover_font_color"];?> !important;
        background-color: # <?php echo $paramssld["ht_view3_filterbutton_hover_background_color"];?> !important;
        cursor: pointer;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> section {
        position: relative;
        display: block;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_container_<?php echo $catalogID; ?> {

    <?php
        if($paramssld["ht_view3_sorting_float"] == "left" && $paramssld["ht_view3_filtering_float"] == "right" ||
           $paramssld["ht_view3_sorting_float"] == "right" && $paramssld["ht_view3_filtering_float"] == "left")
        { ?> margin-left: 21%;
    <?php }
    if((($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right" && $paramssld["ht_view3_sorting_float"] == "top") || ($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right" && $paramssld["ht_view3_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
         { ?> width: <?php echo $width_middle; ?> !important;
    <?php } ?>
    }

    .catalog_pagination_block_<?php echo $catalogID; ?> {
        /*text-align:
    <?php echo $paramssld["htc_view3_pagination_position"]; ?> ;*/
        padding: 20px 0px;
        margin: 16px 0px 35px 0px;
    }

    .catalog_pagination_<?php echo $catalogID; ?> {
        text-align: <?php echo $paramssld["htc_view3_pagination_position"]; ?>;
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
        color: #<?php echo $paramssld["htc_view3_pagination_font_color"]; ?>;
        font-size: <?php echo $paramssld["htc_view3_pagination_font_size"]; ?>px;
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
        font-size: <?php echo $paramssld["htc_view3_pagination_icon_size"]; ?>px;
        color: #<?php echo $paramssld["htc_view3_pagination_icon_color"]; ?>;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-first {
        font-size: 10px !important;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-first-passive {
        font-size: 10px !important;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-previous {
        font-size: 10px !important;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-previous-passive {
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-last {
        font-size: 10px !important;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-last-passive {
        font-size: 10px !important;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-next {
        font-size: 10px !important;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-next-passive {
        font-size: 10px !important;
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
        font-size: <?php echo $paramssld["htc_view3_load_more_font_size"]; ?>px !important;
        color: # <?php echo $paramssld["htc_view3_load_more_font_color"]; ?> !important;
        background: # <?php echo $paramssld["htc_view3_load_more_button_background_color"]; ?> !important;
        cursor: pointer;
    }

    .catalog_load_<?php echo $catalogID; ?> a:hover {
        color: # <?php echo $paramssld["htc_view3_load_more_font_hover_color"]; ?> !important;
        background: # <?php echo $paramssld["htc_view3_load_more_button_background_hover_color"]; ?> !important;
    }

    .catalog_load_<?php echo $catalogID; ?> a:focus {
        outline: none;
    }

    /*<add search>*/
    #search_block_<?php echo $catalogID; ?> {
        text-align: <?php echo $paramssld["ht_view3_search_form_position"]; ?>;
        margin: 5px;
    }

    #search_block_<?php echo $catalogID; ?> > form {
        position: relative;
        height: 36px;
        display: inline-block;
        width: <?php echo $paramssld["ht_view3_search_form_width"]; ?>%;
        overflow: hidden;
        border-radius: <?php echo $paramssld["ht_view3_search_form_border_radius"]; ?>px;
        border: <?php echo $paramssld["ht_view3_search_form_border_width"]; ?> px solid #<?php echo $paramssld["ht_view3_search_form_border_color"]; ?>;
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
        color: #<?php echo $paramssld["ht_view3_search_button_background"]; ?>;
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
        border-top-right-radius: <?php echo $paramssld["ht_view3_search_form_border_radius"]; ?>px;
        border: 0;
        background: #<?php echo $paramssld["ht_view3_search_button_background"]; ?>;
        color: #<?php echo $paramssld["ht_view3_search_button_text_color"]; ?>;
        margin: 0;
    }

    #search_block_<?php echo $catalogID; ?> > form > #search_button_<?php echo $catalogID; ?>:hover {
        background: #<?php echo $paramssld["ht_view3_search_button_hover_color"]; ?>;
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
                       data><?php echo $paramssld["ht_view3_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id"
                       data-option-value="id"><?php echo $paramssld["ht_view3_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol"
                       data-option-value="symbol"><?php echo $paramssld["ht_view3_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view3_sorting_name_by_random"]; ?></a>
                </li>
            </ul>

            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true"
                       class="selected"><?php echo $paramssld["ht_view3_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false"
                       data-option-value="false"><?php echo $paramssld["ht_view3_sorting_name_by_desc"]; ?></a></li>
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
         class="super-list variable-sizes clearfix" <?php // if($paramssld["ht_view3_sorting_float"] == "top" && $paramssld["ht_view3_filtering_float"] == "top") echo "style='clear: both;'";?>>
        <?php
        $group_key = 0;
        foreach ($images as $key => $row) {
            $group_key++;
            $link = $row->sl_url;
            ?>
            <div class="element_<?php echo $catalogID; ?> <?php if ($paramssld['ht_view3_allow_lightbox'] == "on") {
                echo "catalog_ccolorbox_grouping_" . $catalogID;
            } ?> " data-element-id="<?php echo $row->id; ?>" data-symbol="<?php echo esc_attr($row->name); ?>"
                 data-category="alkaline-earth">
                <div class="left-block_<?php echo $catalogID; ?>">
                    <div class="main-image-block_<?php echo $catalogID; ?> main-image-block for_zoom">
                        <?php
                        $imgurl = explode(";", $row->image_url);
                        if ($row->image_url != ';') {
                            if ($paramssld['ht_view3_allow_zooming'] == "off" && $paramssld['ht_view3_allow_lightbox'] == "on") { ?>
                                <a href="<?php echo esc_attr($imgurl[0]); ?>"
                                   class="catalog_group<?php echo $group_key . "_" . $catalogID; ?>">
                                    <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo esc_attr($imgurl[0]); ?>"/>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo esc_attr($imgurl[0]); ?>"
                                   class="catalog_group<?php echo $group_key . "_" . $catalogID; ?>" <?php if ($paramssld['ht_view3_allow_lightbox'] == "off") {
                                    echo "onclick='return false;'";
                                } ?>>
                                    <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo esc_attr($imgurl[0]); ?>"/>
                                </a>
                            <?php } ?>
                        <?php } else { ?>
                            <a href="<?php echo esc_attr($imgurl[0]); ?>"><img id="wd-cl-img<?php echo $key; ?>"
                                                                               src="images/noimage.png"></a>
                        <?php } ?>
                    </div>
                    <div class="main-image-block_<?php echo $catalogID; ?> main-image-block not_for_zoom">
                        <?php
                        $imgurl = explode(";", $row->image_url);
                        if ($row->image_url != ';') {
                            if ($paramssld['ht_view3_allow_zooming'] == "off" && $paramssld['ht_view3_allow_lightbox'] == "on") { ?>
                                <a href="<?php echo esc_attr($imgurl[0]); ?>"
                                   class="not_for_zoom_class catalog_group_not_for_zoom<?php echo $group_key . "_" . $catalogID; ?>">
                                    <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo esc_attr($imgurl[0]); ?>"/>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo esc_attr($imgurl[0]); ?>"
                                   class="not_for_zoom_class catalog_group_not_for_zoom<?php echo $group_key . "_" . $catalogID; ?>" <?php if ($paramssld['ht_view3_allow_lightbox'] == "off") {
                                    echo "onclick='return false;'";
                                } ?>>
                                    <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo esc_attr($imgurl[0]); ?>"/>
                                </a>
                            <?php } ?>
                        <?php } else { ?>
                            <a href="<?php echo esc_attr($imgurl[0]); ?>"><img id="wd-cl-img<?php echo $key; ?>"
                                                                               src="images/noimage.png"></a>
                        <?php } ?>
                    </div>
                    <div class="thumbs-block">
                        <?php
                        if ($paramssld["ht_view3_show_thumbs"] == 'on') {
                            ?>
                            <ul class="thumbs-list_<?php echo $catalogID; ?>">
                                <?php
                                $imgurl = explode(";", $row->image_url);
                                array_pop($imgurl);       //      array_shift($imgurl);

                                if (($paramssld['ht_view3_allow_zooming'] == "on" && $paramssld['ht_view3_allow_lightbox'] == "off") || ($paramssld['ht_view3_allow_zooming'] == "off" && $paramssld['ht_view3_allow_lightbox'] == "off")) {
                                } else {
                                    array_shift($imgurl);
                                }

                                foreach ($imgurl as $key => $img) { ?>
                                    <li><a href="<?php echo esc_attr($img); ?>"
                                           class="catalog_group<?php echo $group_key . "_" . $catalogID; ?>"><img
                                                    src="<?php echo esc_attr($img); ?>"></a></li>
                                <?php } ?>
                            </ul>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="right-block">
                    <?php if ($row->name != '') { ?>
                        <div class="title-block_<?php echo $catalogID; ?>"><h3><?php echo $row->name; ?></h3>
                        </div><?php } ?>
                    <?php
                    if ($paramssld["ht_view3_show_description"] == 'on') {
                        if ($row->description != '') { ?>
                            <div class="description-block_<?php echo $catalogID; ?>">
                                <p><?php echo $row->description; ?></p></div>
                        <?php } ?>
                    <?php } ?>

                    <?php if ($paramssld["ht_catalog_view3_show_price"] == 'on' && $row->price != "") { ?>
                        <div class="price-block_<?php echo $catalogID; ?>">
                            <span class="old-price-block"><?php echo $paramssld3['ht_single_product_price_text']; ?>
                                : <span class="old-price" <?php if ($row->market_price == "") {
                                    echo "style='text-decoration: none !important;'";
                                } ?>><?php echo $row->price; ?></span></span>
                            <span class="discont-price-block"><span
                                        class="discont-price"><?php echo $row->market_price; ?></span></span>
                        </div>
                    <?php } ?>

                    <?php
                    if ($paramssld["ht_view3_show_linkbutton"] == 'on') {
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
                        <?php
                    } ?>
                </div>
            </div>

            <?php
        }
        ?>

    </div>

    <?php
    include "catalog_pagination.php";
    ?>

</section>

<script>

    /***<object for ajax add search> ***/

    var $ob_<?php echo $catalogID; ?> = {
        action: 'my_action',
        post: 'load_more_elements_into_catalog',
        view: <?php echo $catalog[0]->catalog_list_effects_s; ?>,
        catalog_id: <?php echo $catalogID; ?>,
        count_into_page: <?php echo $countIntoPage; ?>,
        allow_lightbox: "<?php echo $paramssld['ht_view3_allow_lightbox']; ?>",
        show_thumbs: "<?php echo $paramssld['ht_view3_show_thumbs']; ?>",
        show_description: "<?php echo $paramssld['ht_view3_show_description']; ?>",
        show_price: "<?php echo $paramssld["ht_catalog_view3_show_price"]; ?>",
        show_linkbutton: "<?php echo $paramssld['ht_view3_show_linkbutton']; ?>",
        price_text: "<?php echo $paramssld3['ht_single_product_price_text']; ?>",
        linkbutton_text: "<?php echo $paramssld3["ht_catalog_general_linkbutton_text"]; ?>",
        parmalink: "<?php echo get_permalink(); ?>",
        thumbs_position: "useLess",
        show_popup_title: "useLess",
        // show_popup_linkbutton: "useLess"
    };

    /***</object for ajax add search > ***/


    var allowZooming = '<?php echo $paramssld['ht_view3_allow_zooming'];?>';
    jQuery(function () {
        var defaultBlockWidth =<?php echo $paramssld['ht_view3_mainimage_width']; ?>;

        var $container = jQuery('#huge_it_catalog_container_<?php echo $catalogID; ?>');


        // add randomish size classes
        $container.find('.element_<?php echo $catalogID; ?>').each(function () {
            var $this = jQuery(this),
                number = parseInt($this.find('.number').text(), 10);
            //alert(number);
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
                columnWidth: <?php echo $paramssld['ht_view3_mainimage_width']; ?>+20 +<?php echo $paramssld['ht_view3_element_border_width'] * 2; ?>
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
            });
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

            //alert(strheight);

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
            <?php // if(($paramssld["ht_view3_sorting_float"] == "left" || $paramssld["ht_view3_sorting_float"] == "right") && $paramssld["ht_view3_filtering_float"] == "none")
            //                  { ?>
//                        var topmargin = jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?> ul").height();
//                        jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php // }
            //            else  {
            //                    if(($paramssld["ht_view3_filtering_float"] == "left" || $paramssld["ht_view3_filtering_float"] == "right") && $paramssld["ht_view3_sorting_float"] == "none")
            //                      { ?>
//                         var topmargin = jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").height();
//                         jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?>").css({'margin-top':'5px'});
            <?php // }
            //                  } ?>


            /*    <--   VIEW 3 ELEMENTS THUMBS CLICK    */

            var lightbox_is = "<?php echo $paramssld['ht_view3_allow_lightbox']; ?>";
            if (lightbox_is != "on") {
                jQuery(".element_<?php echo $catalogID; ?> .left-block_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li a img").click(function (e) {
                    e.preventDefault();
//                        alert(lightbox_is);
                    var new_src = jQuery(this).attr("src");    //    alert(new_src);
                    var container = jQuery(this).closest(".element_<?php echo $catalogID; ?>");
//                        alert(container.html());
                    var image_block = container.find(".main-image-block_<?php echo $catalogID; ?>");

                    var image_block_height = image_block.height();
                    image_block.height(image_block_height);


                    var image = image_block.find("a img");
                    var container_height = container.height();
                    container.height(container_height);

                    container.find('.zoomWrapper img').unwrap();

                    container.find(".main-image-block_<?php echo $catalogID; ?> .zoomWrapper").each(function () {
                        jQuery(this).find("img").unwrap();
                    });

                    zoom_resize();

                    setTimeout(function () {
                        image.after("<img src='" + new_src + "' style='height: " + image_block.height() + "px !important;' />")
                        image.remove();
                    }, 100);
                    setTimeout(function () {
                        zoom_start();
//                            jQuery("#huge_it_catalog_container_<?php echo $catalogID; ?>").hugeitmicro( 'reloadItems' ).hugeitmicro({ sortBy: 'original-order' }).hugeitmicro( 'reLayout' );
                    }, 100);
                });
            }

            /*           VIEW 3 ELEMENTS THUMBS CLICK    -->    */

            /*    <--    VIEW 3 LOAD MORE CLICK    */


            /*           VIEW 3 LOAD MORE CLICK    -->    */

        });

        //end of filtering

        jQuery(window).load(function () {
            $container.hugeitmicro('reLayout');
            jQuery(window).resize(function () {
                $container.hugeitmicro('reLayout');
            });
        });

    });

</script>