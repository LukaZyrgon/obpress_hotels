<div class="obpress-hotels-holder">
    <div class="obpress-hotels-widget-holder">
        <div class="obpress-hotels-widget-info">
            <h3><?= array_values($HotelDescriptiveContents)[0]->HotelRef->HotelName ?></h3>
            <div class="obpress-hotels-widget-info-holder">
                <p><?= $firstHotelDesc ?></p>
                <a href="/hotel-results?q=<?= array_values($HotelDescriptiveContents)[0]->HotelRef->HotelCode ?>" class="obpress-hotels-widget-button"><?php _e('See more', 'OBPress_Hotels') ?></a>
                <a href="/chain-results" class="obpress-hotels-link"><?php _e('See all hotels', 'OBPress_Hotels') ?></a>
            </div>
        </div>
        <div class="obpress-hotel-widget-gallery <?php if(count($HotelDescriptiveContents) < 6) echo 'flex-wrap'; ?>">
            <div class="obpress-hotels-swiper">
                <!-- Slider main container -->
                <div class="swiper-container obpress-hotel-swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php if ($HotelDescriptiveContents != null) : ?>
                            <?php foreach ($HotelDescriptiveContents as $key => $HotelDescriptiveContent) : ?>
                                <?php
                                $hotel_description = '';
                                if ($HotelDescriptiveContent->VendorMessagesType != null) {
                                    foreach ($HotelDescriptiveContent->VendorMessagesType->VendorMessages as $VendorMessage) {
                                        $hotel_description .= $VendorMessage->Description;
                                        if(strlen($hotel_description) > 100) {
                                            $hotel_description = substr($hotel_description, 0, 100) . '...';
                                        }
                                    }
                                }
                                ?>

                                <div data-hotel-id="<?php echo $HotelDescriptiveContent->HotelRef->HotelCode; ?>" class="swiper-slide obpress-hotels-swiper-slide" data-hotel-description="<?= $hotel_description ?>" data-hotel-name="<?= $HotelDescriptiveContent->HotelRef->HotelName ?>">
                                    <div class="obpress-hotels-swiper-image" style="background-image:url(<?= $HotelDescriptiveContent->ImageURL ?>);"></div>
                                    <div class="obpress-swiper-overlay">
                                        <h4><?= $HotelDescriptiveContent->HotelRef->HotelName ?></h4>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="obpress-hotels-swiper-nav">
                <div class="swiper-button-prev" <?php if(!empty($prevIcon)){ echo 'style="background-image: url('. $prevIcon . ')"';} ?>></div>
                <div class="swiper-pagination <?php if($settings_hotels['hotels_slide_pagination'] == 'lines'){echo 'obpress-hotels-swiper-lines';} ?><?php if($settings_hotels['hotels_slide_pagination'] == 'disabled'){echo 'obpress-swiper-pagination-disabled';} ?>"></div>
                <div class="swiper-button-next" <?php if(!empty($nextIcon)){ echo 'style="background-image: url( '. $nextIcon . ')"';} ?>></div>
            </div>
        </div>
    </div>
</div>
<div class="ob-mob-hotels-holder">
    <div class="ob-mob-hotels-swiper">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php if ($HotelDescriptiveContents != null) : ?>
                    <?php foreach($HotelDescriptiveContents as $key => $HotelDescriptiveContent): ?>
                        <?php
                            $hotel_description = '';
                            if ($HotelDescriptiveContent->VendorMessagesType != null) {
                                foreach ($HotelDescriptiveContent->VendorMessagesType->VendorMessages as $VendorMessage) {
                                    $hotel_description .= $VendorMessage->Description;
                                }
                            }                        
                        ?>
                        <div class=" swiper-slide ob-mob-hotels-slide">
                            <div class="ob-mob-hotels-swiper-image" style="background-image:url(<?= $HotelDescriptiveContent->ImageURL ?>);"></div>
                            <div class="ob-mob-hotels-overlay">
                                <h4><?= $HotelDescriptiveContent->HotelRef->HotelName ?></h4>
                                <p><?= $hotel_description ?></p>
                                <button><?php _e('See more', 'OBPress_Hotels') ?></button>
                                <a href=""><?php _e('See more about hotels', 'OBPress_Hotels') ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="obpress-hotels-swiper-nav">
            <div class="swiper-button-prev" <?php if(!empty($prevIcon)){ echo 'style="background-image: url( '. $prevIcon . ')"';} ?>></div>
            <div class="swiper-pagination <?php if($settings_hotels['hotels_slide_pagination'] == 'lines'){echo 'obpress-hotels-swiper-lines';} ?><?php if($settings_hotels['hotels_slide_pagination'] == 'disabled'){echo 'obpress-swiper-pagination-disabled';} ?>"></div>
            <div class="swiper-button-next" <?php if(!empty($nextIcon)){ echo 'style="background-image: url('. $nextIcon . ')"';} ?>></div>
        </div>        
    </div>
</div>