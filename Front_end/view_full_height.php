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

<style type="text/css">
    .element_<?php echo $catalogID; ?> {
        width: <?php echo $paramssld['ht_view1_block_width']; ?>px;
        height: auto;
        margin: 5px;
        float: left;
        overflow: hidden;
        position: relative;
        outline: none;
        background: #<?php echo $paramssld['ht_view1_element_background_color']?>;
        border: <?php echo $paramssld['ht_view1_element_border_width']; ?> px solid #<?php echo $paramssld['ht_view1_element_border_color']; ?>;
    }

    .default-block_<?php echo $catalogID; ?> {
        position: relative;;
        width: <?php echo $paramssld['ht_view1_block_width']; ?>px;
    }

    .default-block_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> {
        margin: 0px;
        padding: 0px;
        line-height: 0px;
        border: 1px solid #<?php echo $paramssld['ht_view1_element_border_color']; ?>;
    }

    .default-block_<?php echo $catalogID; ?> img {
        margin: 0px !important;
        padding: 0px !important;
        max-width: none !important;
        width: <?php echo $paramssld['ht_view1_block_width']; ?>px !important;
        border-radius: 0px;
    }

    .default-block_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> {
        display: block;
        height: 35px;
        padding: 10px 0px 0px 0px;
        width: 100%;
    }

    .default-block_<?php echo $catalogID; ?> .title-block_<?php echo $catalogID; ?> h3 {
        position: relative;
        margin: 0px !important;
        padding: 0px 5px 0px 5px !important;
        width: <?php echo $paramssld['ht_view1_block_width']; ?>px !important;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        font-weight: normal;
        color: #<?php echo $paramssld['ht_view1_title_font_color']; ?>;
        font-size: <?php echo $paramssld['ht_view1_title_font_size']; ?>px !important;
        line-height: <?php echo $paramssld['ht_view1_title_font_size']+4; ?>px !important;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> {
        position: relative;
        display: block;
        width: <?php echo $paramssld['ht_view1_block_width']-10; ?>px !important;
        margin: 10px 5px 0px 5px;
        padding: 0px;
        text-align: left;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> p, .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> {
        text-align: justify;
        font-weight: normal;
        font-size: <?php echo $paramssld['ht_view1_description_font_size']; ?>px !important;
        color: #<?php echo $paramssld['ht_view1_description_color']; ?>;
        margin: 0px !important;
        padding: 0px !important;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h1,
    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h2,
    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h3,
    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h4,
    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h5,
    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> h6,
    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> p,
    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> strong,
    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> span {
        padding: 2px !important;
        margin: 0px !important;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> ul,
    .wd-catalog-panel_<?php echo $catalogID; ?> .description-block_<?php echo $catalogID; ?> li {
        padding: 2px 0px 2px 5px;
        margin: 0px 0px 0px 8px;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?> {
        color: #<?php echo $paramssld['ht_catalog_view1_price_font_color']?>;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?> .old-price {
        text-decoration: line-through;
        margin: 0px;
        padding: 0px;
        font-weight: normal;
        /*        font-size: 14px;*/
        padding: 7px 10px 7px 10px;
        margin: 0px 10px 0px 0px;
        border-radius: 5px;
        color: #<?php echo $paramssld['ht_view1_element_background_color']?>;
        background: #<?php echo $paramssld['ht_catalog_view1_price_font_color']?>;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?> .old-price-block {
        font-size: <?php echo $paramssld['ht_catalog_view1_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view1_price_font_color']; ?>;

    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .price-block_<?php echo $catalogID; ?> .discont-price-block {
        /*	font-size:
    <?php echo $paramssld['ht_catalog_view1_market_price_font_size']; ?> px;
        color: #
    <?php echo $paramssld['ht_catalog_view1_market_price_font_color']; ?> ; */
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> {
        list-style: none;
        clear: both;
        display: table;
        width: 100%;
        padding: 0px;
        margin: 3px 0px 0px 0px;
        text-align: center;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li {
        display: inline-block;
        margin: 0px 3px 0px 2px;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li a {
        display: block;
        width: <?php echo $paramssld['ht_view1_thumbs_width']; ?>px;
        height: <?php echo $paramssld['ht_view1_thumbs_width']; ?>px;
        opacity: 0.7;
        display: table;
        border: none;
        text-decoration: none;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li a:hover {
        opacity: 1;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> img {
        margin: 0px !important;
        padding: 0px !important;
        display: table-cell;
        vertical-align: middle;
        width: <?php echo $paramssld['ht_view1_thumbs_width']; ?>px !important;
        max-height: <?php echo $paramssld['ht_view1_thumbs_width']; ?>px !important;
        width: 100%;
        height: 100%;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> > div {
        padding: 15px 0 3px 0px;
        margin-bottom: 10px;
    <?php if($paramssld['ht_view1_show_separator_lines']=="on") {?> background: url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center top repeat-x;
    <?php } ?>
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .button-block {
        padding-top: 10px;
        margin-bottom: 10px;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:link, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:visited {
        padding: 10px;
        display: inline-block;
        font-size: <?php echo $paramssld['ht_view1_linkbutton_font_size']; ?>px;
        background: #<?php echo $paramssld['ht_view1_linkbutton_background_color']; ?>;
        color: #<?php echo $paramssld['ht_view1_linkbutton_color']; ?>;
        padding: 6px 12px;
        text-decoration: none;
        border: none;
    }

    .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:hover, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:focus, .wd-catalog-panel_<?php echo $catalogID; ?> .button-block a:active {
        background: #<?php echo $paramssld['ht_view1_linkbutton_background_hover_color']; ?>;
        color: #<?php echo $paramssld['ht_view1_linkbutton_font_hover_color']; ?>;
        text-decoration: none;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> {
    <?php if ($paramssld["ht_view1_show_sorting"] == 'off')
    echo "display:none;"; ?> overflow: hidden;
        margin-top: 5px;
        float: <?php // echo $paramssld["ht_view1_sorting_float"]; ?>;
        width: <?php echo $sorting_block_width; ?>;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul {
        margin: 0px !important;
        padding: 0px !important;
        list-style: none;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul {
        margin: 0px !important;
        padding: 0px !important;
        overflow: hidden;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li {
        border-radius: <?php echo $paramssld["ht_view1_sortbutton_border_radius"];?>px;
        list-style-type: none;
        margin: 0px !important;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_options_<?php echo $catalogID; ?> ul li a {
        background-color: # <?php echo $paramssld["ht_view1_sortbutton_background_color"];?> !important;
        font-size: <?php echo $paramssld["ht_view1_sortbutton_font_size"];?>px !important;
        color: # <?php echo $paramssld["ht_view1_sortbutton_font_color"];?> !important;
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
        background-color: # <?php echo $paramssld["ht_view1_sortbutton_hover_background_color"];?> !important;
        color: # <?php echo $paramssld["ht_view1_sortbutton_hover_font_color"];?> !important;
        cursor: pointer;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> {
        margin-top: 5px;
        /*    float:
    <?php echo $paramssld["ht_view1_filtering_float"]; ?> ;
    width:
    <?php echo $filtering_block_width; ?> ;*/
    <?php
        if ($paramssld["ht_view1_show_filtering"] == 'off') echo "display:none;";
    ?>
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li {
        list-style-type: none;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li a {
        font-size: <?php echo $paramssld["ht_view1_filterbutton_font_size"];?>px !important;
        color: # <?php echo $paramssld["ht_view1_filterbutton_font_color"];?> !important;
        background-color: # <?php echo $paramssld["ht_view1_filterbutton_background_color"];?> !important;
        border-radius: <?php echo $paramssld["ht_view1_filterbutton_border_radius"];?>px;
        padding: 3px;
        display: block;
        text-decoration: none;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_filters_<?php echo $catalogID; ?> ul li a:hover {
        color: # <?php echo $paramssld["ht_view1_filterbutton_hover_font_color"];?> !important;
        background-color: # <?php echo $paramssld["ht_view1_filterbutton_hover_background_color"];?> !important;
        cursor: pointer
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> section {
        position: relative;
        display: block;
    }

    #huge_it_catalog_content_<?php echo $catalogID; ?> #huge_it_catalog_container_<?php echo $catalogID; ?> {
    <?php // if($paramssld["ht_view1_sorting_float"] == "left" && $paramssld["ht_view1_filtering_float"] == "right" ||
    //         $paramssld["ht_view1_sorting_float"] == "right" && $paramssld["ht_view1_filtering_float"] == "left")
    //       { echo "margin: 0px auto;"; }
    //       if((($paramssld["ht_view1_filtering_float"] == "left" || $paramssld["ht_view1_filtering_float"] == "right" && $paramssld["ht_view1_sorting_float"] == "top") || ($paramssld["ht_view1_sorting_float"] == "left" || $paramssld["ht_view1_sorting_float"] == "right" && $paramssld["ht_view1_filting_float"] == "top")) && $catalogShowFiltering == "on" && $catalogShowSorting == "on")
    //       {
    ?>
        /*width:
    <?php echo $width_middle; ?>  !important;*/
    <?php // } ?>
    }

    .catalog_pagination_block_<?php echo $catalogID; ?> {
        /*text-align:
    <?php echo $paramssld["htc_view1_pagination_position"]; ?> ;*/
        padding: 20px 0px;
        margin: 16px 0px 35px 0px;
    }

    .catalog_pagination_<?php echo $catalogID; ?> {
        text-align: <?php echo $paramssld["htc_view1_pagination_position"]; ?>;
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
        color: #<?php echo $paramssld["htc_view1_pagination_font_color"]; ?>;
        font-size: <?php echo $paramssld["htc_view1_pagination_font_size"]; ?>px;
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
        font-size: <?php echo $paramssld["htc_view1_pagination_icon_size"]; ?>px;
        color: #<?php echo $paramssld["htc_view1_pagination_icon_color"]; ?>;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-first {
        font-size: 10px !important;
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-first-passive {
        font-size: 10px !important;
        /*background-color: #F0F0F0 !important;*/
        /*background:url('
    <?php echo  plugins_url( '../images/first-passive.png' , __FILE__ ); ?> ') center center no-repeat;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-previous {
        font-size: 10px !important;
        /*background:url('
    <?php echo  plugins_url( '../images/left-active.png' , __FILE__ ); ?> ') center center no-repeat;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-previous-passive {
        /*background:url('
    <?php echo  plugins_url( '../images/left-passive.png' , __FILE__ ); ?> ') center center no-repeat;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-last {
        font-size: 10px !important;
        /*background:url('
    <?php echo  plugins_url( '../images/last-active.png' , __FILE__ ); ?> ') center center no-repeat;*/

    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-last-passive {
        font-size: 10px !important;
        /*background:url('
    <?php echo  plugins_url( '../images/last-passive.png' , __FILE__ ); ?> ') center center no-repeat;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-next {
        font-size: 10px !important;
        /*background:url('
    <?php echo  plugins_url( '../images/right-active.png' , __FILE__ ); ?> ') center center no-repeat;*/
    }

    .catalog_pagination_<?php echo $catalogID; ?> .go-to-next-passive {
        font-size: 10px !important;
        /*background:url('
    <?php echo  plugins_url( '../images/right-passive.png' , __FILE__ ); ?> ') center center no-repeat;*/

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
        font-size: <?php echo $paramssld["htc_view1_load_more_font_size"]; ?>px !important;
        color: # <?php echo $paramssld["htc_view1_load_more_font_color"]; ?> !important;
        background: # <?php echo $paramssld["htc_view1_load_more_button_background_color"]; ?> !important;
        cursor: pointer;
    }

    .catalog_load_<?php echo $catalogID; ?> a:hover {
        color: # <?php echo $paramssld["htc_view1_load_more_font_hover_color"]; ?> !important;
        background: # <?php echo $paramssld["htc_view1_load_more_button_background_hover_color"]; ?> !important;
    }

    .catalog_load_<?php echo $catalogID; ?> a:focus {
        outline: none;
    }

    /*<add search>*/
    #search_block_<?php echo $catalogID; ?> {
        text-align: <?php echo $paramssld["ht_view1_search_form_position"]; ?>;
        margin: 5px;
    }

    #search_block_<?php echo $catalogID; ?> > form {
        position: relative;
        height: 36px;
        display: inline-block;
        width: <?php echo $paramssld["ht_view1_search_form_width"]; ?>%;
        overflow: hidden;
        border-radius: <?php echo $paramssld["ht_view1_search_form_border_radius"]; ?>px;
        border: <?php echo $paramssld["ht_view1_search_form_border_width"]; ?> px solid #<?php echo $paramssld["ht_view1_search_form_border_color"]; ?>;
    }

    #search_block_<?php echo $catalogID; ?> > form > input {
        width: 100%;
        height: 36px;
        display: block;
        position: absolute;
        padding: 5px 10px;
        top: 0;
        left: 0;
        border: <?php echo $paramssld["ht_view1_search_form_border_width"]; ?>px solid #<?php echo $paramssld["ht_view1_search_form_border_color"]; ?>;
        box-shadow:none;
        color: #272717;
        background: #FFFFFF;
        margin: 0;
    }

    #search_block_<?php echo $catalogID; ?> > form > input + div {
        color: #<?php echo $paramssld["ht_view1_search_button_background"]; ?>;
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
        border-top-right-radius: <?php echo $paramssld["ht_view1_search_form_border_radius"]; ?>px;
        border: 0;
        background: #<?php echo $paramssld["ht_view1_search_button_background"]; ?>;
        color: #<?php echo $paramssld["ht_view1_search_button_text_color"]; ?>;
        margin: 0;
    }

    #search_block_<?php echo $catalogID; ?> > form > #search_button_<?php echo $catalogID; ?>:hover {
        background: #<?php echo $paramssld["ht_view1_search_button_hover_color"]; ?>;
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
                       data><?php echo $paramssld["ht_view1_sorting_name_by_default"]; ?></a></li>
                <li><a href="#sortBy=id"
                       data-option-value="id"><?php echo $paramssld["ht_view1_sorting_name_by_id"]; ?></a></li>
                <li><a href="#sortBy=symbol"
                       data-option-value="symbol"><?php echo $paramssld["ht_view1_sorting_name_by_name"]; ?></a></li>
                <li id="shuffle"><a href='#shuffle'><?php echo $paramssld["ht_view1_sorting_name_by_random"]; ?></a>
                </li>
            </ul>

            <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                <li><a href="#sortAscending=true" data-option-value="true"
                       class="selected"><?php echo $paramssld["ht_view1_sorting_name_by_asc"]; ?></a></li>
                <li><a href="#sortAscending=false"
                       data-option-value="false"><?php echo $paramssld["ht_view1_sorting_name_by_desc"]; ?></a></li>
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
         class="super-list variable-sizes clearfix" <?php //if($paramssld["ht_view1_sorting_float"] == "top" && $paramssld["ht_view1_filtering_float"] == "top") echo "style='clear: both;'";?>>
        <?php
        $group_key = 0;
        foreach ($images as $key => $row) {
            $group_key++;
            $link = $row->sl_url;
            $descnohtml = strip_tags($row->description);
            $result = substr($descnohtml, 0, 50);
            ?>
            <div class="element_<?php echo $catalogID; ?>  <?php if ($paramssld['ht_view1_allow_lightbox'] == "on") {
                echo "catalog_ccolorbox_grouping_" . $catalogID;
            } ?> " data-element-id="<?php echo $row->id; ?>" data-symbol="<?php echo esc_attr($row->name); ?>"
                 data-category="alkaline-earth">
                <div class="default-block_<?php echo $catalogID; ?>">
                    <div class="image-block_<?php echo $catalogID; ?> for_zoom">
                        <?php $imgurl = explode(";", $row->image_url); ?>
                        <?php if ($row->image_url != ';') {
                            if ($paramssld['ht_view1_allow_zooming'] == "off" && $paramssld['ht_view1_allow_lightbox'] == "on") { ?>
                                <a href="<?php echo esc_attr($imgurl[0]); ?>"
                                   class="catalog_group<?php echo $group_key . "_" . $catalogID; ?>">
                                    <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo esc_attr($imgurl[0]); ?>"/>
                                </a>
                            <?php } else { ?>
                                <img id="wd-cl-img<?php echo $key; ?>" src="<?php echo esc_attr($imgurl[0]); ?>"/>
                            <?php } ?>

                        <?php } else { ?>
                            <img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.png"/>
                        <?php } ?>
                    </div>
                    <div class="title-block_<?php echo $catalogID; ?>">
                        <h3 class="title"><?php echo $row->name; ?></h3>
                    </div>
                </div>

                <div class="wd-catalog-panel_<?php echo $catalogID; ?>" id="panel<?php echo $key; ?>">
                    <?php if ($paramssld['ht_view1_show_thumbs'] == 'on' and $paramssld['ht_view1_thumbs_position'] == "before") {
                        ?>
                        <div>
                            <ul class="thumbs-list_<?php echo $catalogID; ?>">
                                <?php
                                $imgurl = explode(";", $row->image_url);
                                array_pop($imgurl);
                                if (($paramssld['ht_view1_allow_zooming'] == "on" && $paramssld['ht_view1_allow_lightbox'] == "off") || ($paramssld['ht_view1_allow_zooming'] == "off" && $paramssld['ht_view1_allow_lightbox'] == "off")) {
                                } else {
                                    array_shift($imgurl);
                                }

                                foreach ($imgurl as $key1 => $img) {
                                    ?>
                                    <li>
                                        <a href="<?php echo esc_attr($img); ?>"
                                           class="catalog_group<?php echo $group_key . "_" . $catalogID; ?>"><img
                                                    src="<?php echo esc_attr($img); ?>"></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    <?php }
                    if ($paramssld['ht_view1_show_description'] == 'on') { ?>
                        <div class="description-block_<?php echo $catalogID; ?>">
                            <p><?php echo $row->description; ?></p>
                        </div>
                    <?php }
                    if ($paramssld['ht_view1_show_thumbs'] == 'on' and $paramssld['ht_view1_thumbs_position'] == "after") {
                        ?>
                        <div>
                            <ul class="thumbs-list_<?php echo $catalogID; ?>">
                                <?php
                                $imgurl = explode(";", $row->image_url);
                                array_pop($imgurl);
                                if (($paramssld['ht_view1_allow_zooming'] == "on" && $paramssld['ht_view1_allow_lightbox'] == "off") || ($paramssld['ht_view1_allow_zooming'] == "off" && $paramssld['ht_view1_allow_lightbox'] == "off")) {
                                } else {
                                    array_shift($imgurl);
                                }

                                foreach ($imgurl as $key1 => $img) {
                                    ?>
                                    <li>
                                        <a href="<?php echo esc_attr($img); ?>"
                                           class="catalog_group<?php echo $group_key . "_" . $catalogID; ?>"><img
                                                    src="<?php echo esc_attr($img); ?>"></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php if ($paramssld["ht_catalog_view1_show_price"] == 'on' && $row->price != "") { ?>
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
                    if ($paramssld['ht_view1_show_linkbutton'] == 'on') {
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
                            } ?>><?php echo $paramssld3['ht_catalog_general_linkbutton_text']; ?></a>
                        </div>
                    <?php } ?>
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
    /***<object for view  add search> ***/

    var $ob_<?php echo $catalogID; ?> = {
        action: 'my_action',
        post: 'load_more_elements_into_catalog',
        view: <?php echo $catalog[0]->catalog_list_effects_s; ?>,
        catalog_id: <?php echo $catalogID; ?>,
        count_into_page: <?php echo $countIntoPage; ?>,
        allow_lightbox: "<?php echo $paramssld['ht_view1_allow_lightbox']; ?>",
        show_thumbs: "<?php echo $paramssld['ht_view1_show_thumbs']; ?>",
        thumbs_position: "<?php echo $paramssld['ht_view1_thumbs_position']; ?>",
        show_description: "<?php echo $paramssld['ht_view1_show_description']; ?>",
        show_price: "<?php echo $paramssld["ht_catalog_view1_show_price"]; ?>",
        price_text: "<?php echo $paramssld3['ht_single_product_price_text']; ?>",
        show_linkbutton: "<?php echo $paramssld['ht_view1_show_linkbutton']; ?>",
        linkbutton_text: "<?php echo $paramssld3['ht_catalog_general_linkbutton_text']; ?>",
        parmalink: "<?php echo get_permalink(); ?>"
    };
    /***</object for view  add search> ***/

    var allowZooming = '<?php echo $paramssld['ht_view1_allow_zooming'];?>';
    var allowLightbox = '<?php // echo $paramssld['ht_view1_allow_lightbox'];?>';
    jQuery(function () {
        var defaultBlockWidth =<?php echo $paramssld['ht_view1_block_width']; ?>;

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
                columnWidth: <?php echo $paramssld['ht_view1_block_width']; ?>+20 +<?php echo $paramssld['ht_view1_element_border_width'] * 2; ?>
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
            <?php // if(($paramssld["ht_view1_sorting_float"] == "left" || $paramssld["ht_view1_sorting_float"] == "right") && $paramssld["ht_view1_filtering_float"] == "none")
            //                  { ?>
//                        var topmargin = jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?> ul").height();
//                        jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").css({'margin-top':parseInt(topmargin) + 5});
            <?php // }
            //            else  {
            //                    if(($paramssld["ht_view1_filtering_float"] == "left" || $paramssld["ht_view1_filtering_float"] == "right") && $paramssld["ht_view1_sorting_float"] == "none")
            //                      { ?>
//                         var topmargin = jQuery("#huge_it_catalog_options_<?php echo $catalogID; ?>").height();
//                         jQuery("#huge_it_catalog_filters_<?php echo $catalogID; ?>").css({'margin-top':'5px'});
            <?php // }
            //                  } ?>

            /*    <--   VIEW 1 ELEMENTS THUMBS CLICK    */

            jQuery(".element_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li a img").click(function (e) {
                var lightbox_is = "<?php echo $paramssld['ht_view1_allow_lightbox']; ?>";
                if (lightbox_is != "on") {
                    e.preventDefault();
//                        alert(lightbox_is);
                    var new_src = jQuery(this).attr("src");    //    alert(new_src);
                    var image = jQuery(this).closest(".element_<?php echo $catalogID; ?>").find(".default-block_<?php echo $catalogID; ?> .image-block_<?php echo $catalogID; ?> img");
                    image.attr("src", new_src);
                    zoom_start();
                }
            });

            ////// remove empty toggle blocks
            if (jQuery('#panel<?php echo $key; ?>') &&
                jQuery('#panel<?php echo $key; ?>').find('.description-block_<?php echo $catalogID; ?> p').text().length == 0 &&
                jQuery('#panel<?php echo $key; ?>').find('.thumbs-list_<?php echo $catalogID; ?> li a img').length == 0 &&
                jQuery('#panel<?php echo $key; ?>').parent().find('.title').text().length == 0 &&
                jQuery('#panel<?php echo $key; ?>').find('.old-price').text().length == 0) {
                jQuery('#panel<?php echo $key; ?>').parent().find('.title-block_<?php echo $catalogID; ?>').hide();
                jQuery('#panel<?php echo $key; ?>').find('.button-block').css({
                    'position': 'absolute',
                    'top': '-15px',
                    'right': '10px',
                    'background': 'none',
                    'display': 'none'
                });
                jQuery('#panel<?php echo $key; ?>').parent().on('hover', function () {
                    jQuery('#panel<?php echo $key; ?>').find('.button-block').toggle();
                })
                jQuery('#panel<?php echo $key; ?> > div').css({'background': 'none'});
            }

        });

        jQuery(window).load(function () {

            $container.hugeitmicro({filter: '*'});
        });
    });
</script>