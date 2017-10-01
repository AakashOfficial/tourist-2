<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HitMag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('hitmag-single'); ?>>
	<header class="entry-header">
		<?php

			hitmag_category_list();

			the_title( '<h1 class="entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php hitmag_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->
	
	<?php hitmag_single_post_thumbnail(); ?>
    <?php own_slider(); ?>
	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hitmag' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
            $rooms = get_field('rooms');
            $services = get_field('services');
            $location = get_field('location');
            $map = get_field('map');
            ?>
            <div class="hotel-tabs">
                <div class="hm-tabs-wdt">
                    <ul class="hm-tab-nav">
                        <?php if($rooms!=null ){?><li class="hm-tab"><a class="hm-tab-anchor" href="#nomera">Номера</a></li><?php } ?>
                        <?php if($services!=null){ ?><li class="hm-tab"><a class="hm-tab-anchor" href="#udobstva">Удобства</a></li><?php } ?>
                        <?php if($location!=null || $map!=null){ ?><li class="hm-tab"><a class="hm-tab-anchor" href="#raspologenie">Расположение</a></li><?php } ?>                 
                    </ul>

                    <div class="tab-content">
                        <?php if($rooms!=null ){?>
                        <div id="nomera">
                            <h2>Номера:</h2>
                            <?php
                                foreach($rooms as $room){
                                    $main_photo = $room['room_photo'][0];
                                    $photos = $room['room_photo'];
                                    unset($photos[0]);
                                    ?>
                                    <div class="room">    
                                        <div class="photos">
                                            <div class="main-photo">
                                                <a href="<?php echo $main_photo['url'] ?>" class="room-photo">
                                                    <img src="<?php echo $main_photo['sizes']['double-thumbnail'] ?>" alt="<?php echo $main_photo['alt'] ?>">
                                                </a>
                                            </div>
                                            <div class="other-photos">
                                            <?php
                                                
                                                foreach($photos as $photo){
                                                    ?>
                                                    <a href="<?php echo $photo['url']; ?>" class="room-photo">
                                                        <img src="<?php echo $photo['sizes']['thumbnail']; ?>" alt="<?php echo $photo['alt'] ?>">
                                                    </a>
                                                    <?php
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="room-info">                                                
                                            <h4 class="room-title"><?php echo $room['room_name']; ?></h4>
                                            <div class="text"><?php echo $room['room_description']; ?></div>
                                            <?php
                                                if($room['room_url']!=null){
                                                    ?>
                                                    <a href="<?php echo $room['room_url'] ?>" class="th-readmore" rel="nofolow" target="_blank">Забронировать</a>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                        <?php } ?>
                        <?php if($services!=null){ ?>
                        <div id="udobstva">
                            <h2>Удобства:</h2>
                            <ul class="services">
                            <?php 
                                foreach($services as $service){
                                    ?>
                                    <li><?php echo $service; ?></li>
                                    <?php
                                }
                            ?>
                            </ul>
                        </div>
                        <?php } ?>
                        <?php if($location!=null || $map!=null){ ?>
                        <div id="raspologenie">
                            <?php if($location!=null){?>
                            <h2>Расположение:</h2>
                            <div class="location">
                                <?php echo $location; ?>
                            </div>
                            <?php } ?>
                            <?php if($map!=null){
                                $coords = explode(',', $map);
                            ?>
                            <h2>Карта:</h2>
                            <div id="hotel-map" data-lat="<?php echo $coords[0]; ?>" data-lng="<?php echo $coords[1]; ?>">
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>

                    </div><!-- .tab-content -->		

                    </div><!-- #tabs -->
            </div>
            <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hitmag' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php 
			hitmag_entry_footer(); 
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
