<?php if($this->category_model->get_category_text($category_id)) : ?>
					<div>
						<h1><?= $this->category_model->get_category_text($category_id)['category_name_'.$this->language_library->get_language()] ?></h1>
						<p>
                            <?= $this->category_model->get_category_text($category_id)['category_description_'.$this->language_library->get_language()] ?>
                        </p>
					</div>
<?php endif; ?>
                    <div style="clear:both;"></div>
                    <div style="width:100%; text-align: center;">
<?php foreach($products as $product): ?>
					    <div class="item">
						    <?php /*<h3><?= $this->lang->line('main_category') ?>:
                            <?= $product['category_name_'.$this->language_library->get_language()] ?></h3> */?>
                            <a href="<?= site_url('/shop/product/index/'.$product['slug']) ?>"><img src="<?= empty($product['thumb']) === FALSE ? base_url().$product['thumb'] : base_url().'images/noimage.jpg' ; ?>" class="cart_product" id="product_<?= $product['product_id']; ?>" alt="<?= $product['title_'.$this->language_library->get_language()] ?>" /></a>
                            <div class="item_title"><?= $product['title_'.$this->language_library->get_language()] ?></div>
                            <?php if($this->product_model->get_product_meta($product['product_id'], "Size")) : ?><div class="item_size"><?= $this->product_model->get_product_meta($product['product_id'], "Size"); ?></div><?php endif ?>
                            <?php if($this->product_model->get_product_meta($product['product_id'], "Artist")) : ?><div class="item_artist"><?= $this->product_model->get_product_meta($product['product_id'], "Artist"); ?></div><?php endif ?>
                            <?php //echo $this->lang->line('main_description'); ?>
                            <?php //echo mb_substr(strip_tags($product['description_'.$this->language_library->get_language()]), 0, 350, 'UTF-8').'...'; ?>
                            <?php //echo $this->lang->line('main_price'); ?>
                            <span style="text-decoration: line-through;"><?php if($product['price_old_'.$this->language_library->get_language()]!=0) echo $product['price_old_'.$this->language_library->get_language()].' '.$this->lang->line('main_currency'); ?></span>&nbsp;<?= $product['price_'.$this->language_library->get_language()].' '.$this->lang->line('main_currency') ?>&nbsp;
                            <a href="<?=site_url('shop/cart/cart_add/'.$product['product_id'])?>"><i class="fas fa-cart-arrow-down"></i></a>
                    </div>
<?php endforeach; ?>
                    </div>
                    <div style="clear:both;"></div>
                    <div style="margin: 5px 0 5px 0; text-align: center;">
                        <span class="small"><?= $this->lang->line('main_price_declaration') ?></span>
                        <br />
                        <?php if( ! empty($pagination)) echo $this->lang->line('main_page') .': '. @$pagination; ?>
                    </div>
