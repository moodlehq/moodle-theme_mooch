<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepost) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has-custom-menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300&amp;subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<nav role="navigation">
    <?php include(__DIR__.'/../sitebar/sitebar.html'); ?>
</nav>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php if ($hascustommenu) { ?>
<div id="custommenu"><?php echo $custommenu; ?></div>
<?php } ?>

<div id="page">

    <?php if ($hasheading || $hasnavbar) { ?>
       <div id="wrapper" class="clearfix">

<!-- START OF HEADER -->

            <?php if ($hasheading) { ?>
                <div id="page-header" class="inside">
                    <div id="page-header-wrapper" class="wrapper clearfix">
                        <div id="header-left">
                            <a href="<?php echo $CFG->wwwroot; ?>" title="Home"><img id="logo" src="<?php echo $OUTPUT->pix_url('mooch-banner', 'theme')?>" alt="Logo" /></a>
                        </div>
                        <div class="headermenu"><?php
                            echo $OUTPUT->user_menu();
                                //if (!empty($PAGE->layout_options['langmenu'])) {
                                    echo $OUTPUT->lang_menu();
                                //}
                            echo $PAGE->headingmenu ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($hasnavbar) { ?>
                <div class="navbar">
                    <div class="wrapper clearfix">
                        <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
                        <div class="navbutton"> <?php echo $PAGE->button; ?></div>
                    </div>
                </div>
            <?php } ?>
            <?php
                if ($PAGE->bodyid == 'page-user-profile') {
                    // Display user's name and profile picture.
                    echo $OUTPUT->context_header();
                }
            ?>

<!-- END OF HEADER -->

    <?php } ?>


<!-- START OF CONTENT -->

        <div id="page-content-wrapper" class="wrapper clearfix">
            <div id="page-content">
                <div id="region-main-box">
                    <div id="region-post-box">

                        <div id="region-main-wrap">
                            <div id="region-main">
                                <div class="region-content">
                                    <?php echo core_renderer::MAIN_CONTENT_TOKEN ?>
                                </div>
                            </div>
                        </div>

                        <?php if ($hassidepost) { ?>
                        <div id="region-post" class="block-region">
                            <div class="region-content">
                                <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

<!-- END OF CONTENT -->

    <?php if ($hasheading || $hasnavbar) { ?>
        </div>
    <?php } ?>

<!-- START OF FOOTER -->

        <?php if ($hasfooter) { ?>
            <div id="page-footer" class="wrapper">
                <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
                <?php
                    //echo $OUTPUT->login_info();
//                    echo $OUTPUT->home_link();
                    echo $OUTPUT->standard_footer_html();
                ?>
            </div>
        <?php } ?>

</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
