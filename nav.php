<div id="nav" class="main-nav" role="nav">

<?php
  $menu_name = 'primary';
  $locations = get_nav_menu_locations();
  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
  $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>


<ul class="main-nav">
    <?php
    $count = 0;
    $submenu = false;
    $menuitems = (array)$menuitems;

    foreach( $menuitems as $item ):
        // get page id from using menu item object id
        global $post; 

        $id = get_post_meta( $item->ID, '_menu_item_object_id', true );
        // set up a page object to retrieve page data
        $page = get_post( $id );
        $post = $page;
        $link = get_page_link( $id );

        // item does not have a parent so menu_item_parent equals 0 (false)
        if ( !$item->menu_item_parent ):
 
        // save this id for later comparison with sub-menu items
        $parent_id = $item->ID;

        // save parent values for later
        $parent_thumb = get_the_post_thumbnail();
        $parent_title = ($item->post_title != null) ? $item->post_title : $page->post_title;
        $parent_excerpt = $post->post_excerpt;
        $parent_link = get_permalink();

    ?>
 
    <li class="item">
        <a href="<?php echo $link; ?>" class="title">
            <?php // echo the item title if it exists, else just echo the post title ?>
            <?php echo ($item->post_title != null) ? $item->post_title : $page->post_title; ?>
        </a>
    <?php endif; ?>
 
        <?php if ( $parent_id == $item->menu_item_parent ): ?>
 
            <?php if ( !$submenu ) : $submenu = true; ?>
            
            <ul class="sub-menu">

                <?php // Card for this page ?>
                <ul class="sub-menu-page">
                    <li>
                        <a href="<?php echo $parent_link ?>">
                            <?php if( '' != $parent_thumb ) : ?>
                                <?php echo $parent_thumb; ?>
                            <?php endif; ?>
                            <h2><?php echo $parent_title; ?></h2>
                            <p><?php echo $parent_excerpt; ?></p>
                        </a>
                    </li>
                </ul>

                <?php // List the child elements (no nesting) ?>
                <ul class="sub-menu-list">
            <?php endif; ?>
                <li class="item">
                    <a href="<?php echo $link; ?>" class="title">
                        <span class="sub-menu-post-title"><?php echo $page->post_title; ?></span>
                        <?php if(has_excerpt($page->ID)) : ?>
                        <span class="sub-menu-post-desc">
                            <?php echo $page->post_excerpt; ?>
                        </span>
                        <?php endif; ?>
                    </a>
                </li>
                <?php if ( $count < count($menuitems)-1 && $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
                </ul><!-- .sub-menu-list -->
            </ul><!-- .sub-menu -->

            <?php $submenu = false; endif; ?>
 
        <?php endif; ?>
 

    <?php if ( $count < count($menuitems)-1 && $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>

    </li>                           
    
    <?php $submenu = false; endif; ?>

    <?php wp_reset_postdata(); ?>

<?php $count++; endforeach; ?>



            <li class="search">
                <form role="search" method="get" id="searchform" action="http://localhost/journalism.wisc.edu/">
                    <input class="search-input" type="text" size="18" value="Search..." name="s" id="s" />
                    <input class="search-submit" type="button" id="searchsubmit" class="btn" />
                </form>
            </li>

        <div class="clearfix"></div>
 
</ul>


	<div class="clearfix"></div>
</div>





