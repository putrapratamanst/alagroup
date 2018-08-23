<div id="ready_review_container" style="display:none">
    <form id="ready_review_form" method="post" action="#" enctype="multipart/form-data">
        <?php settings_fields(ready_review_config("menu_slug")); ?>
        <div id="header">
            <div class="logo ">
                <h2>
                    <img class="theme_options_logo"
                         src="<?php echo get_stylesheet_directory_uri() . "/admin/layout/img/logo.png"; ?>"
                         alt="<?php echo ready_review_config('admin_page_header'); ?>">
                    <a href="http://www.readythemes.com/ready-review-tutorials/?r=wporg" class="read_docs button"
                       target="_blank"
                       style="text-decoration: none;"><?php _e("Read online documentation", "ready_review"); ?></a>
                    <a href="http://www.readythemes.com/affiliate-review-plus/?r=wporg" class="read_docs button"
                       target="_blank"
                       style="color:red; text-decoration: none; "><?php _e("Buy PRO Version", "ready_review"); ?></a>
                </h2>
            </div>
            <div class="clear"></div>
        </div>
        <div id="info_bar">
            <span class="spinner"></span>
            <button type="button" class="button-primary ready_review_save">
                <?php _e('Save All Changes', 'ready_review'); ?>            </button>
            <span class="spinner spinner-reset"></span>
            <button type="button"
                    class="button submit-button reset-button ready_review_reset"><?php _e('Options Reset', 'ready_review'); ?></button>
        </div>
        <!--.info_bar-->
        <div id="main">
            <div id="ready_review_nav">
                <ul>
                    <?php foreach ($tabs as $tab) { ?>
                        <li><a href="#tab-<?php echo $tab['id']; ?>"><?php echo $tab['name']; ?></a></li>
                    <?php } ?></ul>
            </div>
            <div id="content">
                <?php foreach ($tabs as $tab) { ?>
                    <div id="tab-<?php echo $tab['id']; ?>" class="tab-section">
                        <h2><?php echo $tab['name']; ?></h2>
                        <?php foreach ($tab['elements'] as $element) { ?>
                            <?php echo $element['html']; ?>
                        <?php } ?>
                    </div>
                <?php } ?></div>
            <div class="clear"></div>
        </div>
        <div class="save_bar">
            <span class="spinner "></span>
            <button type="button" class="button-primary ready_review_save">
                <?php _e('Save All Changes', 'ready_review'); ?>            </button>
            <span class="spinner  spinner-reset"></span>
            <button type="button"
                    class="button submit-button reset-button  ready_review_reset"><?php _e('Options Reset', 'ready_review'); ?></button>
        </div>
    </form>
    <div style="clear:both;"></div>
</div>
