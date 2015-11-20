<?php
include_once('inc_header.php');
$query_heading = "SELECT * from heading where id=1";
$result_heading = mysql_query($query_heading);
while ($row = mysql_fetch_array($result_heading)) {
    $product_text = $row['product_text'];
    $product_sub_text = $row['product_sub_text'];
    $topping_text = $row['topping_text'];
    $topping_sub_text = $row['topping_sub_text'];
    $contact_text = $row['contact_text'];
}
?>
<div class="slider-x">
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <div id="slider1_container" style="position: relative; margin: 0 auto;
         top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                 top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                 top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
        </div>
        <!-- Slides Container -->

        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1300px;height: 500px; overflow: hidden;">
            <?php
            $query = "SELECT * from main_slider";
            $result = mysql_query($query);
            while ($row = mysql_fetch_array($result)) {
                ?>
                <div>
                    <img u="image" src="<?php echo $row['picture'] ?>" />
                    <div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
                         text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
                         color: #FFFFFF;">
                    </div>
                    <div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
                         text-align: left; line-height: 36px; font-size: 30px;
                         color: #FFFFFF;">
                    </div>
                </div>
            <?php } ?>
        </div>

        <!--#region Bullet Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
        <style>
            /* jssor slider bullet navigator skin 21 css */
            /*
            .jssorb21 div           (normal)
            .jssorb21 div:hover     (normal mouseover)
            .jssorb21 .av           (active)
            .jssorb21 .av:hover     (active mouseover)
            .jssorb21 .dn           (mousedown)
            */
            .jssorb21 {
                position: absolute;
            }
            .jssorb21 div, .jssorb21 div:hover, .jssorb21 .av {
                position: absolute;
                /* size of bullet elment */
                width: 19px;
                height: 19px;
                text-align: center;
                line-height: 19px;
                color: white;
                font-size: 12px;
                background: url(img/b21.png) no-repeat;
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb21 div { background-position: -5px -5px; }
            .jssorb21 div:hover, .jssorb21 .av:hover { background-position: -35px -5px; }
            .jssorb21 .av { background-position: -65px -5px; }
            .jssorb21 .dn, .jssorb21 .dn:hover { background-position: -95px -5px; }
        </style>
        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb21" style="bottom: 26px; right: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype"></div>
        </div>
        <!--#endregion Bullet Navigator Skin End -->

        <!--#region Arrow Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-jquery.html -->
        <style>
            /* jssor slider arrow navigator skin 21 css */
            /*
            .jssora21l                  (normal)
            .jssora21r                  (normal)
            .jssora21l:hover            (normal mouseover)
            .jssora21r:hover            (normal mouseover)
            .jssora21l.jssora21ldn      (mousedown)
            .jssora21r.jssora21rdn      (mousedown)
            */
            .jssora21l, .jssora21r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 55px;
                height: 55px;
                cursor: pointer;
                background: url(img/a21.png) center center no-repeat;
                overflow: hidden;
            }
            .jssora21l { background-position: -3px -33px; }
            .jssora21r { background-position: -63px -33px; }
            .jssora21l:hover { background-position: -123px -33px; }
            .jssora21r:hover { background-position: -183px -33px; }
            .jssora21l.jssora21ldn { background-position: -243px -33px; }
            .jssora21r.jssora21rdn { background-position: -303px -33px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora21l" style="top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora21r" style="top: 123px; right: 8px;">
        </span>
        <!--#endregion Arrow Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
    </div>
    <!-- Jssor Slider End -->
</div>
<div class="separator"></div>
<div class="row-fluid">
    <?php
    $query_headline = "Select * from headline where id='1'";
    $result_headline = mysql_query($query_headline);
    while ($row = mysql_fetch_array($result_headline)) {
        ?>
        <div class="span4">
            <a href='#<?php echo str_replace(' ', '_', $row['title_1']); ?>' class="profil"><div class="solutions-icon"></div></a>
            <h2><?php echo $row['title_1'] ?></h2>
        </div>
        <div class="span4">
            <a href="#<?php echo str_replace(' ', '_', $row['title_2']); ?>" class="profil"><div class="competitiveness-icon"></div></a>
            <h2><?php echo $row['title_2'] ?></h2>
        </div>
        <div class="span4">
            <a href="#<?php echo str_replace(' ', '_', $row['title_3']); ?>" class="profil"><div class="confidence-icon"></div></a>
            <h2><?php echo $row['title_3'] ?></h2>
        </div>
    <?php } ?>
</div>
</header>
<!-- #masthead -->
<div id="main">
    <p>
    <div class="team-wrapper" id="team">
        <div class="team">
            <h2><?php echo $product_text; ?></h2>
            <div class="separator-gray"></div>
            <p><?php echo $product_sub_text; ?>
            </p>
            <div class="slider-wrapper">
                <div class="posts-container">
                    <?php
                    $query_product = "select * from product";
                    $result_product = mysql_query($query_product);
                    while ($row = mysql_fetch_array($result_product)) {
                        ?>
                        <a class="member" href="#<?php echo str_replace(' ', '_', $row['title']) ?>">
                            <div class="hover-icon"></div>
                            <img width="375" height="185" src="<?php echo $row['picture'] ?>" class="attachment-member wp-post-image" alt="<?php echo $row['title']; ?>" />
                            <div class="member-meta">
                                <h2><?php echo $row['title'] ?></h2>
                                <span class="job">You’ll be surprised how nice your greens taste.</span><span class="corner"></span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <a href="javascript:void(0)" class="load-more">Load more</a>
            <div class="slider-navigation"></div>
        </div>
    </div>
    <div class="references-wrapper" id="references">
        <div class="references">
            <h2><?php echo $topping_text; ?></h2>
            <div class="separator-pattern"></div>
            <p><?php echo $topping_sub_text; ?>
            </p>
            <div class="slider-wrapper theme-default" style="padding:0!important;">
                <div id="slider" class="nivoSlider">
                    <?php
                    $query_second_slider = "select * from second_slider";
                    $result_second_slider = mysql_query($query_second_slider);
                    $result_second_slider2 = mysql_query($query_second_slider);
                    while ($row = mysql_fetch_array($result_second_slider)) {
                        echo '<img src="' . $row['picture'] . '" data-thumb="' . $row['picture'] . '" alt="" title="#caption' . $row['id'] . '"  />';
                    }
                    ?>
                </div>
                <?php
                while ($row = mysql_fetch_array($result_second_slider2)) {
                    echo '<div id="caption' . $row['id'] . '" class="nivo-html-caption">' . $row['text'] . '</div>';
                }
                ?>
            </div>


            <div class="categories">
                <?php
                $query_topping = "select * from topping";
                $result_query_topping = mysql_query($query_topping);
                $i = 1;
                while ($row = mysql_fetch_array($result_query_topping)) {
                    if ($i == 1 || $i == 6) {
                        ?>
                        <div class="category-container category-<?php echo $i; ?>" data-id="8" data-slug="photography">
                            <img width="375" height="375" src="<?php echo $row['picture'] ?>" class="attachment-story" alt="peperoni.jpg" />
                            <div class="category-meta"><span class="name"><?php echo $row['title'] ?>
                                </span><span class="category-icon">
                                    <img width="50" height="50" src="css/images/content/iconpiz.png" class="attachment-icon" alt="iconpiz.png" />
                                </span>
                            </div>
                        </div>
                        <?php
                    } else {
                        if ($i == 2) {
                            echo '<div class="group">';
                            echo '<div class="category-container category-' . $i . '" data-id="7" data-slug="motion-graphics" style="background=url(\'' . $row['picture'] . '\')">
                                        <div class="category-meta"><span class="name">' . $row['title'] . '</span><span class="category-icon"><img width="50" height="50" src="css/images/content/iconpiz.png" class="attachment-icon" alt="iconpiz.png" /></span></div>
                                  </div>';
                        } else if ($i == 5) {
                            echo '<div class="category-container category-' . $i . '" data-id="7" data-slug="motion-graphics" style="background=url(\'' . $row['picture'] . '\')">
                                        <div class="category-meta"><span class="name">' . $row['title'] . '</span><span class="category-icon"><img width="50" height="50" src="css/images/content/iconpiz.png" class="attachment-icon" alt="iconpiz.png" /></span></div>
                                  </div>';
                            echo '</div>';
                        } else {
                            echo '<div class="category-container category-' . $i . '" data-id="7" data-slug="motion-graphics" style="background=url(\'' . $row['picture'] . '\')">
                                        <div class="category-meta"><span class="name">' . $row['title'] . '</span><span class="category-icon"><img width="50" height="50" src="css/images/content/iconpiz.png" class="attachment-icon" alt="iconpiz.png" /></span></div>
                                  </div>';
                        }
                        ?>
                        <?php
                    }
                    $i++;
                }
                ?>
                <div class="cleaner"></div>
            </div>
        </div>
    </div>
</div>
<!-- #main -->
<?php include_once('footer.php') ?>
<?php include_once('lightbox.php') ?>
</div>
<script type="text/javascript" src="nivo/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('#slider').nivoSlider();
    });
</script>
<!-- #page --> 
</body>
</html>