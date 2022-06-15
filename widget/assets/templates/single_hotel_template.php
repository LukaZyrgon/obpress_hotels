<?php if($rooms != null): ?>


<div class="obpress-hotels-holder single-hotel-holder">
    <div class="obpress-hotels-widget-holder">
        <div class="obpress-hotels-widget-info">
            <h3><?php $first = reset($rooms); $first_room = reset($first); echo $first_room->DescriptiveText; ?></h3>
            <p><?php echo substr( $first_room->MultimediaDescriptionsType->MultimediaDescriptions[0]->TextItemsType->TextItems[0]->Description, 0, 80) . "..."; ?></p>
            <a href="/room/?room_id=<?php echo $first_room->ID ?>" class="obpress-hotels-widget-button"><?php _e('See more', 'OBPress_Hotels') ?></a>
            <a href="/rooms" class="obpress-hotels-link"><?php _e('See all rooms', 'OBPress_Hotels') ?></a>
        </div>
        <div class="obpress-hotel-widget-gallery">
            <div class="obpress-hotels-swiper">
                <!-- Slider main container -->
                <div class="swiper-container obpress-hotel-swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->

                            <?php foreach($rooms as $key => $rooms_per_hotel): ?>
                                <?php foreach($rooms_per_hotel as $key => $room): ?>

                                    <?php 
                                        $description = $room->MultimediaDescriptionsType->MultimediaDescriptions[0]->TextItemsType->TextItems[0]->Description;
                                        if(strstr($description, '<br/>')) {
                                            if(strstr($description, '<br/><br/>')) {
                                                $descriptionWithoutDoubleBr = str_replace('<br/><br/>', ': ', $description);
                                            } 
                                            $descriptionWithoutBr = str_replace('<br/>', ' ', $descriptionWithoutDoubleBr);
                                        } else {
                                            $descriptionWithoutBr = $description;
                                        }

                                        if($descriptionWithoutBr != '') {
                                            if(strlen($descriptionWithoutBr) > 100) {
                                                $descriptionWithoutBr = substr($descriptionWithoutBr, 0, 100) . '...';
                                            }
                                        }
                                        
                                    ?>

                                        <div data-hotel-id="<?= $room->ID ?>" class="swiper-slide obpress-hotels-swiper-slide" data-hotel-description="<?= $descriptionWithoutBr ?>" data-hotel-name="<?= $room->DescriptiveText ?>">
                                            <div class="obpress-hotels-swiper-image" style="background-image:url(<?= $room->MultimediaDescriptionsType->MultimediaDescriptions[1]->ImageItemsType->ImageItems[0]->URL->Address ?>);"></div>
                                            <div class="obpress-swiper-overlay">
                                                <h4> <?= substr($room->DescriptiveText, 0, 80) ?></h4>
                                            </div>
                                        </div>

                                <?php endforeach; ?>

                            <?php endforeach; ?>



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


                 <?php foreach($rooms as $key => $rooms_per_hotel): ?>

                    <?php foreach($rooms_per_hotel as $key => $room): ?>

                        <?php 
                            $description = $room->MultimediaDescriptionsType->MultimediaDescriptions[0]->TextItemsType->TextItems[0]->Description;
                            if(strstr($description, '<br/>')) {
                                if(strstr($description, '<br/><br/>')) {
                                    $descriptionWithoutDoubleBr = str_replace('<br/><br/>', ': ', $description);
                                } 
                                $descriptionWithoutBr = str_replace('<br/>', ' ', $descriptionWithoutDoubleBr);
                            } else {
                                $descriptionWithoutBr = $description;
                            }
                        ?>


                            <div class="swiper-slide ob-mob-hotels-slide">
                                <div class="ob-mob-hotels-swiper-image" style="background-image:url(<?= $room->MultimediaDescriptionsType->MultimediaDescriptions[1]->ImageItemsType->ImageItems[0]->URL->Address ?>);"></div>
                                <div class="ob-mob-hotels-overlay">
                                    <h4><?= $room->DescriptiveText ?></h4>
                                    <p><?= $descriptionWithoutBr ?></p>

                                    <a href="/room/?room_id=<?php echo $room->ID ?>" class="obpress-hotels-widget-button"><?php _e('See more', 'OBPress_Hotels') ?></a>
                                    <a href="/rooms" class="obpress-hotels-link"><?php _e('See all rooms', 'OBPress_Hotels') ?></a>

                                </div>
                            </div>

                    <?php endforeach; ?>

                <?php endforeach; ?>



            </div>
        </div>
        <div class="obpress-hotels-swiper-nav">
            <div class="swiper-button-prev" <?php if(!empty($prevIcon)){ echo 'style="background-image: url( '. $prevIcon . ')"';} ?>></div>
            <div class="swiper-pagination <?php if($settings_hotels['hotels_slide_pagination'] == 'lines'){echo 'obpress-hotels-swiper-lines';} ?><?php if($settings_hotels['hotels_slide_pagination'] == 'disabled'){echo 'obpress-swiper-pagination-disabled';} ?>"></div>
            <div class="swiper-button-next" <?php if(!empty($nextIcon)){ echo 'style="background-image: url('. $nextIcon . ')"';} ?>></div>
        </div>        
    </div>
</div>


<?php else: ?>
    <h1><?php _e('No rooms available', 'OBPress_RoomsList') ?></h1>
<?php endif; ?>