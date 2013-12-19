
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text">B&uacute;squeda:</span>
        <input type="search" class="search-field" name="s" id="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="B&uacute;squeda&hellip;" title="B&uacute;squeda">
    </label>
    <input type="submit" class="submit" id="searchsubmit" value="B&uacute;squeda">
</form>
