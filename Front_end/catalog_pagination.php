<?php

if ($catalog[0]->pagination_type == "pagination" && $pages != 1) {
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
    $actual_link = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "";
    $checkREQ = '';
    $pattern = "/\?/";
    $pattern2 = "/&catalog_page_" . $catalogID . "=[0-9]+/";
    if (preg_match($pattern, $actual_link)) {
        if (preg_match($pattern2, $actual_link)) {
            $actual_link = preg_replace($pattern2, '', $actual_link);
        }
        $checkREQ = $actual_link . '&catalog_page_' . $catalogID;
    } else {
        $checkREQ = '?catalog_page_' . $catalogID;
    }
    $page = (isset($_GET["catalog_page_" . $catalogID])) ? intval($_GET["catalog_page_" . $catalogID]) : 1;
    $pervpage = '';

    if ($page != 1) {
        $pervpage .= '<a href= ' . $checkREQ . '=1"> <i class="fa fa-angle-double-left"></i> </a>';

        $pervpage .= '<a href= ' . $checkREQ . '=' . ($page - 1) . '> <i class="fa fa-angle-left"></i> </a> ';
    }
    $cur_page = (isset($_GET["catalog_page_" . $catalogID])) ? intval($_GET["catalog_page_" . $catalogID]) : 1;
    if ($cur_page <= 0) {
        $cur_page = 1;
    }

    $page_numbers = '';
    if ($pages <= 5) {
        $nearby = $pages;
    } else {
        $nearby = 5;
    }

    for ($i = 1; $i <= $pages; $i++) {
        if ($i >= $cur_page - $nearby && $i <= $cur_page + $nearby && $i != $cur_page) {
            $page_numbers .= '<a href= ' . $checkREQ . '=' . $i . '> ' . $i . ' </a>';
        } elseif ($i == $cur_page) {
            $page_numbers .= '<a href="#" class="active"> ' . $i . ' </a>';
        }
    }

    $nextpage = '';

    if ($page != $pages) {
        $nextpage .= ' <a href= ' . $checkREQ . '=' . ($page + 1) . '> <i class="fa fa-angle-right"></i> </a>';

        $nextpage .= '<a href= ' . $checkREQ . '=' . $pages . '> <i class="fa fa-angle-double-right"></i> </a>';
    }


    ?>

    <div class="catalog_pagination_block_<?php echo $catalogID; ?>">
        <div class="catalog_pagination_<?php echo $catalogID; ?>">
            <?php echo $pervpage . $page_numbers . $nextpage; ?>
        </div>
    </div>

    <?php
} elseif ($catalog[0]->pagination_type == "load_more" && $pages > 1) {
    $path_site = plugins_url("/../images", __FILE__); ?>
    <div class="catalog_load_block_<?php echo $catalogID; ?>">
        <div class="catalog_load_<?php echo $catalogID; ?>">
            <a href="#"
               class="load_more_elements_<?php echo $catalogID; ?>"><?php echo __("Load More...", "product-catalog"); ?></a>
            <img src="<?php echo $path_site; ?>/load_more_icon_<?php echo $paramssld['htc_view3_load_more_loading_icon']; ?>.gif"
                 class="load_more_loading_icon" style="display: none"/>
            <input type="hidden" class="load-more-elements-count" value="<?php echo esc_attr($countIntoPage); ?>"/>
        </div>
    </div>
<?php } ?>

<style>
    .catalog_pagination_<?php echo $catalogID ?> a, .catalog_pagination_<?php echo $catalogID ?> a i {
        font-size: 28px;
        color: #777777;
    }

    .catalog_pagination_<?php echo $catalogID ?> a.active {
        cursor: pointer;
        pointer-events: none;
        font-weight: bold;
        color: #333;
    }

    .catalog_pagination_<?php echo $catalogID ?> a:hover, .catalog_pagination_<?php echo $catalogID ?> a:hover i {
        color: #333;
    }

    .catalog_pagination_block_<?php echo $catalogID; ?>, .catalog_load_block_<?php echo $catalogID; ?> {
        padding: 0px !important;
        margin: 0px !important;
        position: relative !important;
        margin-bottom: 30px !important;
    }

    .catalog_pagination_<?php echo $catalogID; ?>, .catalog_load_<?php echo $catalogID; ?> {
        position: absolute;
        width: 100%;
        z-index: 9999;
        padding: 23px 15px;
    }
</style>



