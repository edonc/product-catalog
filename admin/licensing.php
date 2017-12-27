<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$license = array(
    array(
        "title" => "Advanced View Customization",
        "text" => "Unlock all the settings of gallery views, allowing to edit and customize the views, size, effects, buttons, navigation tools, colors and more.",
        "icon" => "-26px -285px"
    ),
    array(
        "title" => "Product Page Customization",
        "text" => "Product Catalog automatically generates Single Product page for each product – on this page you can find detailed information of each product, including parameters, rating, share buttons and others.",
        "icon" => "-132px -288px"
    ),
    array(
        "title" => "Image Resizer Settings",
        "text" => "Unlock the options allowing to play around images, thumbs and edit all the corners of media using advanced resizer settings",
        "icon" => "-229px -286px"
    ),
    array(
        "title" => "Color and Text Styling",
        "text" => "Unlock more options allowing to edit, add or customize every text and color of the plugin with multiple solutions",
        "icon" => "-315px -286px"
    ),
    array(
        "title" => "Advanced Lightbox Options",
        "text" => "Use Lightbox option to show your images in full size. Whether it on products lists or single product page activate the lightbox and images after click will be opened in fancy popup with real (bigger) sizes.",
        "icon" => "-243px -384px"
    ),
    array(
        "title" => "Image Zoom Options",
        "text" => "Image zoom is very necessary feature, with it you can zoom every pixel of the product image and see it’s details.",
        "icon" => "-335px -387px"
    )
);
?>


<div class="responsive grid">
    <?php foreach ($license as $key => $val) { ?>
        <div class="col column_1_of_3">
            <div class="header">
                <div class="col-icon" style="background-position: <?php echo $val["icon"]; ?>; ">
                </div>
                <?php echo $val["title"]; ?>
            </div>
            <p><?php echo $val["text"]; ?></p>
            <div class="col-footer">
                <a href="https://goo.gl/NmLZX2" class="a-upgrate">Upgrade</a>
            </div>
        </div>
    <?php } ?>
</div>


<div class="license-footer">
    <p class="footer-text">
        <?php echo __("This plugin is the non-commercial version of the Huge IT Product Catalog plugin. If you want to customize to the styles and colors of your website,than you need to buy a license.
            Purchasing a license will add possibility to customize Catalog Options, Products Options and Image View Options of the plugin.","product-catalog");?>
    </p>
    <p class="this-steps max-width">
        After the purchasing the commercial version follow this steps
    </p>
    <ul class="steps">
        <li>Deactivate Huge IT Product Catalog Plugin</li>
        <li>Delete Huge IT Product Catalog Plugin</li>
        <li>Install the downloaded commercial version of the plugin</li>
    </ul>
    <a href="https://goo.gl/qn02dV" target="_blank"><?php _e('Purchase a License', 'product-catalog' ); ?>
    </a>
</div>
