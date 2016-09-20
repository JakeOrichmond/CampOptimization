<!DOCTYPE html>
<?php include "head.inc.php" ?>
<body class="content-page">
<div id="body" class="culture">
    <?php include "nav.inc.php" ?>
    <div class="hero">
        <div class="side-margin">
            <h1>Culture</h1>
            <p>roboboogie is an industry-leading digital design and optimization agency located in the heart of Portland, Oregon. We fit all of the Portland stereotypes, but particularly those involving bikes, food & beer culture and putting birds on things. We love working closely with with innovative marketers to help them exceed all of their sales and conversion goals. We have a lot of fun being creative scientists, right and left brained folks, analytical thinkers and creative problem solvers, that do great design.</p>
            <!-- <h5>"Science does not know its debt to imagination."</h5>
            <small>- Ralph Waldo Emerson</small> -->
        </div>
    </div>
    <div class="camp-o side-margin">
        <div class="left-side t-gutter-md">
            <img src="/lib/img/icons/campo_logo_lrg.png" alt="camp-optimization">
        </div>
        <div class="right-side">
            <h4>Join Camp Optimization, our monthly conversion optimization meet-up.</h4>
            <p>If you like good beer, chillin' with good people, networking and talking shop with industry experts and peers, Camp Optimization might just be right for you.</p>
            <!-- Begin MailChimp Signup Form -->
            <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
            <style type="text/css">
                #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
            </style>
            <div id="mc_embed_signup">
            <form action="//teamroboboogie.us6.list-manage.com/subscribe/post?u=d0f1f28f1474c98d098d99746&amp;id=00dbdf97aa" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                <h2>Sign-up and we'll get you on the invite list:</h2>
                <div class="mc-field-group name-field">
                    <label for="mce-FNAME"></label>
                    <input placeholder="Your name" type="text" value="" name="FNAME" class="" id="mce-FNAME">
                </div><!--
                 --><div class="mc-field-group">
                    <label for="mce-EMAIL"></label>
                    <input placeholder="Email addy" type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL"><!--
                 --></div><!--
                 --><div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div><!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups
                --><div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d0f1f28f1474c98d098d99746_00dbdf97aa" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Get on the list!" name="subscribe" id="mc-embedded-subscribe" class="btn-light-blue button"></div>
                </div>
            </form>
            </div>
            <!--End mc_embed_signup-->
        </div>
    </div>
    <div id="instagram-box" class="side-margin clearfix">
        <h3 class="b-gutter-md">What we've been up to</h3>
        <?php include "lib/scripts/culture-feed.php" ?>
    </div>
    <?php include "footer.inc.php" ?>
</div>
<?php include "script.inc.php" ?>
<script>
    ga("create", "UA-46315724-1", {name: "0", allowLinker: true, cookieDomain: "auto"});
    ga('0.send', 'pageview', {dimension1: 'Camp-O form interaction'});
    ga('0.send', 'pageview', {dimension1: 'Camp-O form submission'});
</script>
</body>
</html>
