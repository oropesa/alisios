
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Search:', 'alisios'); ?></span>
        <input type="search" class="search-field" name="s" id="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php _e( 'Search&hellip;', 'alisios' ); ?>" title="<?php _e('Search:', 'alisios'); ?>">
        <i class="fa fa-search"></i>
    </label>
    <input type="submit" class="submit" id="searchsubmit" value="<?php _e( 'Search', 'alisios' ); ?>">
</form>
