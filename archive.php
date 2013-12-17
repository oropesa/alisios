<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

    <section id="primary" role="main">

        <header class="page-header">

            <h1 class="archive-title">
                <?php
                if ( is_category() ) :
                    echo 'Archivos de categor&iacute;a: ' . '<span>' . single_cat_title( '', false ) . '</span>';

                elseif ( is_tag() ) :
                    echo 'Archivos de etiqueta: ' . '<span>' . single_tag_title( '', false ) . '</span>';

                elseif ( is_author() ) :
                    /* Queue the first post, that way we know
                     * what author we're dealing with (if that is the case).
                    */
                    the_post();
                    echo 'Archivos del autor: ' . '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>';
                    /* Since we called the_post() above, we need to
                     * rewind the loop back to the beginning that way
                     * we can run the loop properly, in full.
                     */
                    rewind_posts();

                elseif ( is_day() ) :
                    echo 'Archivos del d&iacute;a: ' . '<span>' . get_the_date() . '</span>';

                elseif ( is_month() ) :
                    echo 'Archivos del mes: ' . '<span>' . get_the_date( 'F Y' ) . '</span>';

                elseif ( is_year() ) :
                    echo 'Archivos del a&ntilde;: ' . '<span>' . get_the_date( 'Y' ) . '</span>';

                else :
                    echo 'Archivos';

                endif;
                ?>
            </h1>

            <?php
            if ( is_category() ) :
                // show an optional category description
                $category_description = category_description();
                if ( ! empty( $category_description ) ) :
                    echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
                endif;

            elseif ( is_tag() ) :
                // show an optional tag description
                $tag_description = tag_description();
                if ( ! empty( $tag_description ) ) :
                    echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
                endif;

            endif;
            ?>

        </header><!-- /.page-header -->

        <?php if( have_posts() ) : ?>

            <?php get_template_part( 'loop' ); ?>

        <?php else : ?>

            <?php get_template_part( 'loop', 'empty' ); ?>

        <?php endif; ?>


    </section>

<?php get_footer(); ?>