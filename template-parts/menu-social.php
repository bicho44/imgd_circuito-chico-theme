<?php if ( has_nav_menu( 'social' ) ) : // Check if there's a menu assigned to the 'social' location. ?>

    <?php wp_nav_menu(
        array(
            'theme_location'  => 'social',
            'container'       => 'nav',
            'container_id'    => 'menu-social',
            'container_class' => 'menu nav navbar-nav',
            'menu_id'         => 'menu-social-items',
            'menu_class'      => 'menu-items',
            'depth'           => 1,
            'link_before'    => '<span class="screen-reader-text">',
            'link_after'     => '</span>',
        )
    ); ?>

<?php endif; // End check for menu. ?>
