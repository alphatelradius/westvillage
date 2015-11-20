<?php
$query_setting = "select * from setting where id=1";
$result_setting = mysql_query($query_setting);
while ($row = mysql_fetch_array($result_setting)) {
    $information = $row['information'];
    $primary_address = $row['primary_address'];
    $phone = $row['phone'];
    $email = $row['email'];
    $maps = $row['maps'];
    $fb = $row['fb'];
    $twitter = $row['twitter'];
    $gplus = $row['gplus'];
}
?>
<div class="footer-wrapper" id="contact">
    <footer id="colophon" role="contentinfo">
        <h2><?php echo $contact_text; ?></h2>
        <div class="separator-footer"></div>
        <div class="social-icons">
            <a href="<?php echo $fb; ?>" target="_blank" class="facebook"><span></span></a>
            <a href="<?php echo $twitter; ?>" target="_blank" class="twitter"><span></span></a>
            <a href="<?php echo $gplus; ?>" target="_blank" class="google"><span></span></a>
        </div>
        <div class="row">
            <div class="footer-text span4">
                <h3>Informations</h3>
                <?php
                echo $information;
                echo $primary_address;
                ?>

            </div>
            <div class="contact-form span4">
                <h3>Contact form</h3>
                <form action="action.php" class="contact-validate" method="post">
                    <input type="text" class="required" name="contact_name" placeholder="Name" />
                    <input type="text" class="required email" name="contact_mail" placeholder="Email address" />
                    <textarea name="contact_message" class="required">Message</textarea>
                    <input type="submit" value="" />
                </form>
            </div>
            <div class="map-wrapper span4">
                <h3>Our location</h3>
                <div class="map">
                    <?php echo $maps; ?>
                    <div class="map-icon"></div>
                </div>
            </div>
        </div>
        <div class="left">
            <!-- <img width="146" height="56" src="css/images/content/logo-small.png" class="attachment-logo-footer" alt="logo-small.png" /> -->
            <div class="info"> West Village Pizza & Pasta<br />
                Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a> | Phone:<?php echo $phone; ?> 
            </div>
        </div>
        <div class="site-info"> © 2015 West Village Pizza. All rights reserved. Designed by 
            <a href="http://alphatelradius.net" target="_blank">www.alphatelradius.net</a> 
        </div>
        <!-- .site-info -->
        <div class="cleaner"></div>
    </footer>
    <!-- #colophon --> 
</div>
