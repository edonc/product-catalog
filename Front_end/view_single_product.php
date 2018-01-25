<section id="huge_it_catalog_content_<?php echo $productArray->id; ?>" class="huge_it_catalog_single_product_page product-catalog-content">
    <div class="huge_it_catalog_container">
        <div class="left-block">
            <div class="main-image-block for_zoom">
                <?php $imgurl=explode(";",$productArray->image_url); ?>
                <?php 	if($productArray->image_url != ';'){ ?>
                    <a href="<?php echo esc_attr($imgurl[0]); ?>" <?php if($paramssld['ht_single_product_allow_lightbox'] == "on"){ echo "class='catalog_single_product_group_".$productArray->id."'"; }else{ echo "onclick='return false'"; } ?> ><img id="wd-cl-img<?php echo $productArray->id; ?>" src="<?php echo esc_attr($imgurl[0]); ?>"></a>
                <?php } else { ?>
                    <a href="<?php echo esc_attr($imgurl[0]); ?>"><img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.jpg"></a>
                    <?php
                }
                ?>
            </div>
            <?php
            if($paramssld["ht_single_product_show_thumbs"] == 'on')
            {
                ?>
                <div class="thumbs-block">
                    <ul class="thumbs-list">
                        <?php
                        $imgurl=explode(";",$productArray->image_url);
                        array_pop($imgurl);

                        foreach($imgurl as $key=>$img){
                            ?>
                            <li><a href="<?php echo esc_attr($img);?>" class="catalog_single_product_group_<?php echo $productArray->id; ?>"><img src="<?php echo esc_attr($img); ?>"></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="right-block">


            <?php if($productArray->name!=''){?>
                <div class="title-block"><h2><?php echo $productArray->name; ?></h2></div>
            <?php } ?>
            <?php

            if($paramssld["ht_single_product_show_price"] == 'on' && $productArray->price != "")
            {  ?>
                <div class="price-block">
                    <p><?php echo $paramssld3["ht_single_product_price_text"]; ?> :
                        <span class="old-price" <?php if($productArray->market_price == '') { echo "style='text-decoration: none !important;'"; } ?>> <?php echo $productArray->price; ?> </span>
                        <?php
                        if($productArray->market_price != ''){ ?>
                            <span class="discont-price"><?php echo $productArray->market_price; ?></span>
                        <?php   } ?>
                    </p>
                </div>
            <?php  }

            if($paramssld["ht_single_product_show_description"] == 'on')
            {
                if($productArray->description!='') { ?>
                    <div class="description-block">
                        <p><?php echo $productArray->description; ?></p>
                    </div>
                <?php }
            }
            ?>
            <div class="rating-and-share-blocks">
                <?php

                if($paramssld["ht_single_product_show_rating"] == 'on')
                {  ?>
                    <div class="rating-block">
                        <span class="label"><?php echo $paramssld3["ht_single_product_rating_text"]; ?>:</span>
                        <ul class="rating-stars">
                            <li><input type="radio" name="" value="1"></li>
                            <li><input type="radio" name="" value="2"></li>
                            <li><input type="radio" name="" value="3"></li>
                            <li><input type="radio" name="" value="4"></li>
                            <li><input type="radio" name="" value="5"></li>
                        </ul>
                        <?php
                        $path_site = plugins_url("/../images", __FILE__);
                        $pageTitle = get_the_title();
                        if($productArray->image_url != ';'){ $pintimage[0] = $productArray->image_url; }
                        else { $pintimage[0] = $path_site.'/noimage.jpg'; }
                        $spam = 0;

                        foreach($spamReviewsArray as $spamReviews) {
                            if($spamReviews == $_SERVER['REMOTE_ADDR']){ $spam = 1; }
                        }
                        ?>
                        <input type="hidden" name="spam" class="huge_it_catalog_spam" value="<?php echo esc_attr($spam); ?>" />
                        <input type="hidden" name="product_id" class="huge_it_catalog_product_id" value="<?php echo $productArray->id; ?>" />
                        <input type="hidden" name="ip" class="huge_it_catalog_product_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                    </div>

                <?php }

                $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
                $actual_link = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."";
                $pattern="/\?p=/";
                $pattern2="/&page-img[0-9]+=[0-9]+/";
                $pattern3="/\?page-img[0-9]+=[0-9]+/";
                if(preg_match($pattern, $actual_link)){
                    if(preg_match($pattern2, $actual_link)){
                        $actual_link=preg_replace($pattern2, '', $actual_link);
                        header("Location:".$actual_link."");
                        exit;
                    }
                }elseif(preg_match($pattern3, $actual_link)){
                    $actual_link=preg_replace($pattern3, '', $actual_link);
                    header("Location:".$actual_link."");
                    exit;
                }
                if($paramssld["ht_single_product_show_share_buttons"] == 'on')
                {  ?>

                    <div class="share_buttons_block">
                        <span class="label"><?php echo $paramssld3["ht_single_product_share_text"]; ?>:</span>
                        <ul>
                            <li class="facebook"><a href=""  target="_blank" onclick="javascript:void window.open('<?php echo "https://www.facebook.com/sharer/sharer.php?u=".$myPageLink.""; ?>','1410949501326','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Facebook</a></li>
                            </li>
                            <li class="twitter" style="">
                                <a onclick="Share.twitter('URL','<?php echo $actual_link;?>')">Twitter</a>
                            </li>
                            <li class="pinterest"  >
                                <a  href="#" target="_blank" onclick="javascript:void window.open('http://www.pinterest.com/pin/create/button/?url=<?php echo $myPageLink; ?>&media=<?php echo $pintimage[0]; ?>&description=<?php echo $pageTitle; ?>','1410949501326','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Pinterest</a>
                            </li>
                            <li class="google_plus" style="">
                                <a href="https://plus.google.com/share?url=<?php echo $actual_link;?>" onclick="javascript:window.open(this.href,

  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <?php $product_page_link = get_permalink()."&single_prod_id=$productArray->id&asc_seller"; ?>


            <div style="clear: both;" ></div>

            <?php
            if($paramssld3["ht_single_product_show_asc_seller_button"] == 'on'){ ?>
                <div class="contact-seller-block">
                    <div class="order_button" style="cursor:pointer"><span class="label"><?php echo $paramssld3['ht_single_product_asc_seller_button_text']; ?></span>
                    </div>

                    <div id="catalog-order-popup-1" class="modalDialog">
                        <div>
                            <div title="Close" class="catalog-order-popup-close" style="cursor:pointer">X</div>
                            <h2><?php echo $paramssld3['ht_single_product_asc_to_seller_text']; ?></h2>
                            <label><input type="text" name="asc_seller_name" class="asc_seller_name" placeholder="<?php echo esc_attr($paramssld3["ht_single_product_your_name_text"]); ?>" /></label>
                            <label><input type="text" name="asc_seller_mail" class="asc_seller_mail" placeholder="<?php echo esc_attr($paramssld3["ht_single_product_your_mail_text"]); ?>"  /></label>
                            <label><input type="text" name="asc_seller_phone" class="asc_seller_phone" placeholder="<?php echo esc_attr($paramssld3["ht_single_product_your_phone_text"]); ?>" /></label>
                            <label>
                                <textarea name="asc_seller_massage" class="asc_seller_massage" placeholder="<?php echo esc_attr($paramssld3["ht_single_product_your_message_text"]); ?>" ></textarea>
                            </label>
                            <label>
                                <input type="text" class="captchaInputValue" placeholder="<?php echo $captchaFirstNum." + ".$captchaSecondNum." = ?"; ?>" autocomplete="off" />
                                <p class="invalid"></p>
                            </label>
                            <input type="hidden" name="asc_seller_product_id" class="asc_seller_product_id" value="<?php echo $productArray->id; ?>" />
                            <input type="hidden" name="asc_seller_spam" class="asc_seller_spam" value="<?php echo esc_attr($spam); ?>" />
                            <input type="hidden" name="asc_seller_ip" class="huge_it_catalog_product_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                            <input type="hidden" name="captcha_sum" id="captcha_sum" value="<?php echo $captcha_val; ?>">
                            <a href="#1" title="Close" class="order_popup_submit_close">
                                <input type="submit" name="order_popup_submit" id="order_popup_submit" value="<?php echo esc_attr($paramssld3["ht_single_product_asc_seller_popup_button_text"]);?>" />
                            </a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>


        <div class="huge-it-catalog-bottom-block" style="display: block;">
            <ul class="huge_it_catalog_view_tabs">
                <?php if($paramssld["ht_single_product_show_parameters"] == 'on'){ ?>
                    <li class="active" >
                        <a href="#catalog-view-options-0_<?php echo $productArray->id; ?>">
                            <?php echo $paramssld3["ht_single_product_parameters_text"]; ?>
                        </a>
                    </li>
                <?php } ?>
                <?php if($paramssld["ht_single_product_show_comments"] == 'on'){ ?>
                    <li>
                        <a href="#catalog-view-options-1_<?php echo $productArray->id; ?>">
                            <?php echo $paramssld3["ht_single_product_comments_text"]; ?> (<?php echo count($reviewsArray) - count($spamReviewsArray); ?>)
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="huge_it_catalog_view_tabs_contents">
                <?php if($paramssld["ht_single_product_show_parameters"] == 'on'){ ?>
                    <li id="catalog-view-options-0_<?php echo $productArray->id; ?>" class="active" >
                        <h4 style="display: none;" class="title_for_mobile"><?php echo $paramssld3["ht_single_product_parameters_text"]; ?></h4>
                        <ul class="params-list">
                            <?php
                            //                            var_dump($allParamsAndChildsInArray);exit;
                            if($allParamsAndChildsInArray != ""){
                                foreach ($allParamsAndChildsInArray as $singleParamAndChild) {
                                    if(!empty($singleParamAndChild)){
                                        $separateParamAndChildsInArray = explode("_()_", $singleParamAndChild);
                                        foreach ($separateParamAndChildsInArray as $paramKey => $separateParamAndChild) {
                                            if($paramKey == 0){
                                                if(count($separateParamAndChildsInArray) == 1){
                                                    echo "<li class='parameter-block'>".$separateParamAndChild."</li>";
                                                    echo "<li class='value-block'></li>";
                                                }
                                                else{
                                                    echo "<li class='parameter-block'>".$separateParamAndChild."</li>";
                                                }
                                            }
                                            else{
                                                if(count($separateParamAndChildsInArray) != ($paramKey + 1)){
                                                    echo $separateParamAndChild.", ";
                                                }
                                                else {
                                                    $separateParamAndChild = htmlspecialchars_decode($separateParamAndChild);
                                                    $separateParamAndChild = str_replace("thisisat", "_()_", $separateParamAndChild);
                                                    echo '<li class="value-block">'.  $separateParamAndChild.'</li>';
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            else { echo "<br>".__("No Parameters","product-catalog"); }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if($paramssld["ht_single_product_show_comments"] == 'on'){ ?>
                    <li id="catalog-view-options-1_<?php echo $productArray->id; ?>"  <?php if($paramssld["ht_single_product_show_parameters"] == 'off'){ echo "class='active'"; } ?>>
                        <h4 style="display: none;" class="title_for_mobile"><?php echo __("Comments","product-catalog","product-catalog");?></h4>
                        <div class="reviews-block"><?php
                            if(!empty($reviewsArray)){
                                if($reviewsArray[0]->id == ""){
                                    echo "<br>".__("No Comments","product-catalog");
                                }
                                else{
                                    foreach ($reviewsArray as $review) { ?>
                                        <div class="review">
                                            <?php if($review->spam == 0) echo "<p style='font-weight: bold;' >".$review->name."</p><p>".$review->content."</p>"; ?>
                                        </div>
                                    <?php          }
                                }
                            } ?>

                        </div>
                        <div class="write-rate-block">
                            <form action="<?php echo wp_get_referer(); ?>" method="POST" name="comments-form">
                                <label><?php echo $paramssld3["ht_single_product_your_name_text"]; ?>:
                                    <?php if ($user_level > 9) { ?> <input type="text" name="comments_name" id="comments_name" value="<?php echo ' '.$user_info->user_login; ?>"/> <?php } else { ?>
                                        <input type="text" name="comments_name" id="comments_name"/> <?php } ?>
                                </label>
                                <label><?php echo $paramssld3["ht_single_product_your_Comment_text"]; ?>:
                                    <textarea name="author_comment" id="author_comment" value="" ></textarea>
                                </label>
                                <label>
                                    <?php echo $paramssld3["ht_single_product_captcha_text"]; ?>
                                    <input type="text" id="captchaInputValue" placeholder="<?php echo $captchaFirstNum." + ".$captchaSecondNum." = ?"; ?>" autocomplete="off" />
                                    <p class="invalid"></p>
                                </label>
                                <input type="submit" name="comments_submit" id="comments_submit" value="<?php echo esc_attr($paramssld3["ht_single_product_comments_submit_button_text"]);?>" />
                            </form>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</section>
<div class="clear"></div>