<?php
    function own_slider(){
        $attachments = new Attachments( 'attachments' );
        if($attachments->exist()){
            ?>
            <div id="single-slider" class="flexslider">
                <ul class="slides">
                    <?php
                        while($attachments->get()){
                        ?>
                        <li>
                            <div class="hm-thumb-bg">
                                <a href="<?php echo $attachments->src( 'full' ); ?>" class="image-link"><?php echo $attachments->image( 'thumbnail' ); ?></a>
                            </div>
                        </li>
                        <?php                           
                        }
                    ?>                    
                </ul>
            </div>
            <?php
        }
    }
?>