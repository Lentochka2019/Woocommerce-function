<?php /*custom loop  content-product.php*/

add_action( 'woocommerce_before_shop_loop_item','asanara_teaser',1 );
function asanara_teaser()
{
    global $product;
    $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);
?>
    <div class="asanara_teaser">
    <div class="asanara_teaser_header"   > 
        <?php woocommerce_template_loop_product_link_open();?>
        <?php woocommerce_template_loop_product_title();?>
        </a>
    </div> 
    <div class="asanara_teaser_content"   > 
    <?php woocommerce_template_loop_product_link_open();?>
            <figure>
                <?php echo woocommerce_get_product_thumbnail();?>
                <figcaption><?php echo woocommerce_template_loop_rating();?></figcaption>
            </figure>            
        </a>
        <?php get_attr_prod();?>
    </div>  
    </div>

    <?php
}
/*get attributes by product Id*/
function get_attr_prod()
{ global $product;?>
    <div class="attr_teaser">
        <?php $attributes = wc_get_attribute_taxonomies();
        foreach ($attributes as $attribute) {
        ?>
           
            <?php
            $attribute->attribute_terms = get_terms(array(
                'taxonomy' => 'pa_' . $attribute->attribute_name,
                'hide_empty' => false,
            )); 
           $naznachenie = wp_get_object_terms($product->get_id(), 'pa_' . $attribute->attribute_name); 
           if (!empty($naznachenie)) {?>
            <label><?php echo $attribute->attribute_name; ?></label>

            <?php echo '<p>';
            foreach ($naznachenie as $item) { echo $item->name; }   
            echo '</p>';
        }	
          ?>
            <p> <?php echo $naznachenie->name;?></p>
        <?php } ?>   
    </div>
<?php
}
?>