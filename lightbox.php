<div class='no-display'>
    <?php
    $query_product = "select * from product";
    $result_product = mysql_query($query_product);
    while ($row = mysql_fetch_array($result_product)) {
        ?>
        <div class="single-content" id="<?php echo str_replace(' ', '_', $row['title']) ?>">
            <div class="lightbox">
                <div class="thumb">
                    <img width="880" height="600" src="<?php echo $row['picture'] ?>" class="attachment-lightbox" alt="<?php echo $row['title']; ?>">
                </div>
                <div class="thumb mobile">
                    <img width="280" height="330" src="<?php echo $row['picture'] ?>" class="attachment-mobile-lightbox" alt="<?php echo $row['title']; ?>">
                </div>
                <div class="content-wrapper">
                    <div class="content">
                        <h2><?php echo $row['title'] ?></h2>
                        <?php echo $row['text'] ?>
                    </div>
                    <div class="cleaner"></div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    $query_headline = "Select * from headline where id='1'";
    $result_headline = mysql_query($query_headline);
    while ($row = mysql_fetch_array($result_headline)) {
        ?>
        <div class="single-content" id="<?php echo str_replace(' ', '_', $row['title_1']); ?>">
            <div class="lightbox">
                <div class="thumb">
                    <img width="880" height="600" src="<?php echo $row['pic_1'] ?>" class="attachment-lightbox" alt="about.jpg">
                </div>
                <div class="thumb mobile">
                    <img width="280" height="330" src="<?php echo $row['pic_1'] ?>" class="attachment-mobile-lightbox" alt="(16).jpg">
                </div>
                <div class="content-wrapper">
                    <div class="content">
                        <?php echo $row['text_1'] ?>
                    </div>
                    <div class="cleaner"></div>
                </div>
            </div>
        </div>
        <div class="single-content" id="<?php echo str_replace(' ', '_', $row['title_2']); ?>">
            <div class="lightbox">
                <div class="thumb">
                    <img width="880" height="600" src="<?php echo $row['pic_2'] ?>" class="attachment-lightbox" alt="news.jpg">
                </div>
                <div class="thumb mobile">
                    <img width="280" height="330" src="<?php echo $row['pic_2'] ?>" class="attachment-mobile-lightbox" alt="(16).jpg">
                </div>
                <div class="content-wrapper">
                    <div class="content">
                        <?php echo $row['text_2'] ?>
                    </div>
                    <div class="cleaner"></div>
                </div>
            </div>	
        </div>
    <?php } ?>
    <div class="single-content" id="<?php echo str_replace(' ', '_', $row['title_3']); ?>">
        <div class="lightbox">
            <div class="thumb">
                <img width="880" height="600" src="<?php echo $row['pic_3'] ?>" class="attachment-lightbox" alt="brus.jpg">
            </div>
            <div class="thumb mobile">
                <img width="280" height="330" src="<?php echo $row['pic_3'] ?>" class="attachment-mobile-lightbox" alt="(16).jpg">
            </div>
            <div class="content-wrapper">
                <div class="content">
                    <?php echo $row['text_3'] ?>
                </div>
                <div class="cleaner"></div>
            </div>
        </div>
    </div> 