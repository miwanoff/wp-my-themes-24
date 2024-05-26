<?php
get_header();?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <!-- <h1 class="mt-4 mb-3">Blog Home One
        <small>Subheading</small>
    </h1> -->

    <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Blog Home 1</li>
    </ol> -->
    <?php breadcrumbs();?>
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
            <?php if (have_posts()) {
    while (have_posts()) {
        the_post();
        global $post;
        $author_ID = $post->post_author;
        $author_URL = get_author_posts_url($author_ID);
        ?>
            <!-- Title -->
            <h1 class="mt-4"><?php the_title()?></h1>
            <!-- Post category: -->
            <h2 class="mt-4"><?php the_category(" ")?></h2>
            <!-- Author -->
            <p class="lead">
                by
                <a href="<?php echo $author_URL; ?>"><?php the_author();?></a>
            </p>
            <hr>
            <!-- Date/Time -->
            <p><?php the_time(get_option('date_format'));
        echo " ";
        the_time(get_option('time_format'));?></p>
            <hr>
            <!-- Preview Image -->
            <?php
if (has_post_thumbnail()) {
            the_post_thumbnail("full", ["class" => "card-img-top"]);
        }
        ?>
            <hr>
            <!-- Post Content -->
            <?php the_content();?>
            <hr>
            <?php if (has_tag()) {?>
            <!-- Tag cloud -->
            <?php the_tags('', ', ');?>
            <hr>
            <?php }?>

            <?php
$defaults = array(
            'before' => '<div class="row justify-content-center align-items-center">' . __('Pages:'),
            'after' => '</div>',
        );
        wp_link_pages($defaults);
        edit_post_link();
        ?>
            <!-- Post Author Info -->
            <div class="card">
                <div class="card-header">
                    <strong>
                        Posted by
                        <a href="<?php echo $author_URL; ?>"><?php the_author();?></a>
                    </strong>
                </div>
                <div class="card-body">
                    <div class="author-image">
                        <?php echo get_avatar($author_ID, 90, '', false, ['class' => 'img-circle']); ?>
                    </div>
                    <?php echo nl2br(get_the_author_meta('description')); ?>
                </div>
            </div><!-- Post Single - Author End -->

            <?php
if (comments_open() || get_comments_number()) {
            comments_template();
        }

    }
}?>

            <h4>Related Posts
                <?php the_category()?>
            </h4>
            <div class="related-posts clearfix">
                <?php
$categories = get_the_category();
$rp_query = new WP_Query([
    'posts_per_page' => 2,
    'post__not_in' => [$post->ID],
    'cat' => !empty($categories) ? $categories[0]->term_id : null,
]);
if ($rp_query->have_posts()) {
    while ($rp_query->have_posts()) {
        $rp_query->the_post();
        ?>
                <div class="mpost clearfix">
                    <h5><?php the_category();?></h5>
                    <?php
if (has_post_thumbnail()) {
            ?>
                    <div class="entry-image">
                        <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail('thumbnail');?>
                        </a>
                    </div>
                    <?php
}
        ?>
                    <div class="entry-c">
                        <div class="entry-title">
                            <h4>
                                <a href="<?php the_permalink();?>">
                                    <?php the_title();?>
                                </a>
                            </h4>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-calendar3"></i> <?php echo get_the_date(); ?></li>
                            <li><i class="icon-comments"></i> <?php comments_number('0');?></li>
                        </ul>
                        <div class="entry-content">
                            <?php the_excerpt();?>
                        </div>
                    </div>
                </div>
                <?php
}
    wp_reset_postdata();
    $query = new WP_Query(['category_name' => 'news']);
    while ($query->have_posts()) {
        $query->the_post();?>
                <!-- <ul> -->
                <li> <a href="<?php the_permalink();?>">
                        <?php the_title();?>
                    </a></li>
                <!-- </ul> -->

                <?php
}
}
?>
            </div>
        </div>

        <?php get_sidebar();?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer();?>