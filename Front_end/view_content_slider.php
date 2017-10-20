<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.0.0/animate.min.css">
<link href="<?php echo plugins_url('../style/liquid-slider.css', __FILE__);?>" rel="stylesheet" type="text/css" />

<style>
    #main-slider_<?php echo $catalogID; ?>-wrapper .ls-nav { display: none; }
    #main-slider_<?php echo $catalogID; ?> {background:#<?php echo $paramssld["ht_view5_slider_background_color"];?>;}

    #main-slider_<?php echo $catalogID; ?> div.slider-content {
        position:relative;
        width:100%;
        padding:0px 0px 0px 0px;
        position:relative;
        background:#<?php echo $paramssld["ht_view5_slider_background_color"];?>;
    }


    [class$="-arrow"] {
        background-image:url(<?php echo plugins_url('../images/arrow.'.$paramssld["ht_view5_icons_style"].'.png', __FILE__);?>);
    }

    .ls-select-box {
        background:url(<?php echo plugins_url('../images/menu.'.$paramssld["ht_view5_icons_style"].'.png', __FILE__);?>) right center no-repeat #<?php echo $paramssld["ht_view5_slider_background_color"];?>;
    }

    #main-slider_<?php echo $catalogID; ?>-nav-select {
        color:#<?php echo $paramssld["ht_view5_title_font_color"];?>;
    }

    #main-slider_<?php echo $catalogID; ?> div.slider-content .slider-content-wrapper {
        position:relative;
        width:100%;
        padding:0px;
        display:block;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> {
        width:<?php echo $paramssld["ht_view5_main_image_width"];?>px;
        display:table-cell;
        padding:0px 10px 0px 0px;
        float:left;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> img.main-image {
        position:relative !important;
        width:100%;
        height:auto;
        display:block;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> {
        list-style:none;
        display:table;
        position:relative;
        clear:both;
        width:100%;
        margin:10px 0px 0px 0px;
        padding:0px;
        clear:both;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> li {
        display:block;
        float:left;
        width:<?php echo $paramssld["ht_view5_thumbs_width"];?>px;
        height:<?php echo $paramssld["ht_view5_thumbs_height"];?>px;
        margin:0px 2% 5px 1%;
        opacity:0.45;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> li.active,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> li:hover {
        opacity:1;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> li a {
        display:block;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?> ul.thumbs-list_<?php echo $catalogID; ?> li img {
        margin:0px !important;
        padding:0px !important;
        width:<?php echo $paramssld["ht_view5_thumbs_width"];?>px !important;
        height:<?php echo $paramssld["ht_view5_thumbs_height"];?>px !important;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block {
        display:table-cell;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block > div {
        padding-bottom:10px;
        margin-top:10px;
    <?php if($paramssld['ht_view5_show_separator_lines']=="on") {?>
        background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
    <?php } ?>
    }
    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block > div:last-child {background:none;}


    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .title {
        position:relative;
        display:block;
        margin:-10px 0px 0px 0px;
        font-size:<?php echo $paramssld["ht_view5_title_font_size"];?>px !important;
        line-height:<?php echo $paramssld["ht_view5_title_font_size"]+4;?>px !important;
        color:#<?php echo $paramssld["ht_view5_title_font_color"];?>;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description {
        clear:both;
        position:relative;
        font-weight:normal;
        text-align:justify;
        font-size:<?php echo $paramssld["ht_view5_description_font_size"];?>px !important;
        line-height:<?php echo $paramssld["ht_view5_description_font_size"]+4;?>px !important;
        color:#<?php echo $paramssld["ht_view5_description_color"];?>;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h1,
    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h2,
    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h3,
    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h4,
    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h5,
    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description h6,
    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description p,
    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description strong,
    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description span {
        padding:2px !important;
        margin:0px !important;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description ul,
    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .description li {
        padding:2px 0px 2px 5px;
        margin:0px 0px 0px 8px;
    }



    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .old-price {
        text-decoration: line-through;
        font-weight: normal;
        padding: 7px 10px 7px 10px;
        margin: 0px 10px 0px 0px;
        border-radius: 5px;
        color: #<?php echo $paramssld['ht_view5_slider_background_color']; ?>;
        background: #<?php echo $paramssld['ht_catalog_view5_price_font_color']; ?>;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .price-block_<?php echo $catalogID; ?> {
        font-size: <?php echo $paramssld['ht_catalog_view5_price_font_size']; ?>px;
        color: #<?php echo $paramssld['ht_catalog_view5_price_font_color']; ?>;
        line-height: 2 !important;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block .discont-price-block {
    }


    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block {
        position:relative;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a:link,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a:visited{
        position:relative;
        display:inline-block;
        padding:6px 12px;
        background:#<?php echo $paramssld["ht_view5_linkbutton_background_color"];?>;
        color:#<?php echo $paramssld["ht_view5_linkbutton_color"];?>;
        font-size:<?php echo $paramssld["ht_view5_linkbutton_font_size"];?>;
        text-decoration:none;
    }

    #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a:hover,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a:focus,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .button-block a:active {
        background:#<?php echo $paramssld["ht_view5_linkbutton_background_hover_color"];?>;
        color:#<?php echo $paramssld["ht_view5_linkbutton_font_hover_color"];?>;
    }

    @media only screen and (min-width:500px) {
        #main-slider-nav-ul {
            visibility:hidden !important;
            height:1px;
        }
    }

    @media only screen and (max-width:500px) {
        #main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .image-block_<?php echo $catalogID; ?>,#main-slider_<?php echo $catalogID; ?> .slider-content-wrapper .right-block {
            width:100%;
            display:block;
            float:none;
            clear:both;
        }
    }
    .zoomContainer {
        z-index: 10;
    }

</style>
<div id="main-slider_<?php echo $catalogID; ?>" class="liquid-slider product-catalog-content">
    <?php
    $catalog_slider_group = 0;
    foreach($images as $key=>$row)
    {
        $catalog_slider_group++;
        $imgurl=explode(";",$row->image_url);array_pop($imgurl);
        $link = $row->sl_url;
        $descnohtml=strip_tags($row->description);
        $result = substr($descnohtml, 0, 50);
        ?>
        <div class="slider-content">

            <div class="slider-content-wrapper">
                <div class="image-block_<?php echo $catalogID; ?>  ">
                    <?php 	if($row->image_url != ';'){ ?>
                        <div class="main-image-block_<?php echo $catalogID; ?> for_zoom">
                            <a <?php if($paramssld['ht_view5_allow_lightbox'] == "on"){ echo "class='catalog_slider_group".$catalog_slider_group."_".$catalogID."'"; }else{ echo "onclick='return false'"; } ?> href="<?php echo esc_attr($imgurl[0]); ?>" >
                                <img class="main-image" src="<?php echo esc_attr($imgurl[0]); ?>" alt="" />
                            </a>
                        </div>
                    <?php } else { ?>
                        <img class="main-image" src="images/noimage.png" alt="" />
                    <?php } ?>

                    <?php if($paramssld["ht_view5_show_thumbs"] == "on"){ ?>
                        <div class="thumbs-block">
                            <ul class="thumbs-list_<?php echo $catalogID; ?>">
                                <?php

                                if(($paramssld['ht_view5_allow_zooming'] == "on" && $paramssld['ht_view5_allow_lightbox'] == "off") || ($paramssld['ht_view5_allow_zooming'] == "off" && $paramssld['ht_view5_allow_lightbox'] == "off")){  }
                                else{ array_shift($imgurl); }

                                foreach($imgurl as $key=>$img){?>
                                    <li><a class="<?php if($paramssld['ht_view5_allow_lightbox'] == "on"){ echo "catalog_slider_group".$catalog_slider_group."_".$catalogID; } ?>" href="<?php echo esc_attr($img); ?>"><img src="<?php echo esc_attr($img); ?>"></a></li>
                                <?php       } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                <div class="right-block">
                    <div><h2 class="title"><?php echo $row->name; ?></h2></div>
                    <?php if($paramssld["ht_view5_show_description"]=='on'){ ?>
                        <div class="description"><?php echo $row->description; ?></div>
                    <?php } ?>

                    <?php if($paramssld["ht_catalog_view5_show_price"]=='on' && $row->price != ""){ ?>
                        <div class="price-block_<?php echo $catalogID; ?>">
                            <span class="old-price-block" ><?php echo $paramssld3['ht_single_product_price_text']; ?> : <span class="old-price" <?php if($row->market_price == "") { echo "style='text-decoration: none !important;'"; } ?> ><?php echo $row->price; ?></span></span>
                            <span class="discont-price-block" ><span class="discont-price" ><?php echo $row->market_price; ?></span></span>
                        </div>
                    <?php } ?>

                    <?php if($paramssld["ht_view5_show_linkbutton"]=='on'){
                        if($row->single_product_url_type == "default"){
                            $page_link = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                            if (strpos(get_permalink(),'/?') !== false) { $product_page_link = get_permalink()."&single_prod_id=$row->id"; } else { if (strpos(get_permalink(),'/') !== false) { $product_page_link = get_permalink()."?single_prod_id=$row->id"; } else { $product_page_link = get_permalink()."/?single_prod_id=$row->id"; } }
                        }
                        else{ $product_page_link = $row->single_product_url_type; }
                        ?>
                        <div class="button-block">
                            <a class="" href="<?php echo esc_url($product_page_link); ?>"  <?php if($row->link_target == 'on'){echo ' target="_blank"';} ?>><?php echo $paramssld3["ht_catalog_general_linkbutton_text"]; ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
    } ?>
</div>
<script src="<?php echo plugins_url('../js/jquery.liquid-slider.min.js', __FILE__);?>"></script>
<script>
    var allowZooming = '<?php echo $paramssld['ht_view5_allow_zooming'];?>';
    /**
     * If you need to access the internal property or methods, use this:
     * var api = $.data( jQuery('#main-slider_<?php echo $catalogID; ?>')[0], 'liquidSlider');
     * console.log(api);
     */
    jQuery('#main-slider_<?php echo $catalogID; ?>').liquidSlider();


    jQuery(document).ready(function(){

        /*    <--   VIEW 5 ELEMENTS THUMBS CLICK    */

        jQuery(".slider-content-wrapper .image-block_<?php echo $catalogID; ?> .thumbs-list_<?php echo $catalogID; ?> li a img").click(function(e){
            var lightbox_is = "<?php echo $paramssld['ht_view5_allow_lightbox']; ?>";
            if(lightbox_is != "on"){
                e.preventDefault();

                var new_src = jQuery(this).attr("src");
                var container = jQuery(this).closest(".slider-content-wrapper");
                var image_block = container.find(".main-image-block_<?php echo $catalogID; ?>");
                var image = image_block.find("a img.main-image");

                var image_block_height = image_block.height();

//                        var image = jQuery(".slider-content .image-block_<?php echo $catalogID; ?> a .main-image");


                image.attr("src", new_src);

                var new_img_height = image.height();
//                            container.height(new_img_height);
                container.find(".zoomWrapper").height(new_img_height);

                zoom_resize();

                setTimeout(function(){
                    jQuery(".ls-nav-left-arrow").click();
                    jQuery(".ls-nav-right-arrow").click();
                }, 100);

            }

        });


    });

</script>