<?php
get_header();?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Blog Home One
        <small>Subheading</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Blog Home 1</li>
    </ol> -->
    <?php breadcrumbs(); ?>

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php if (have_posts()) {
    while (have_posts()) {
        the_post();

        get_template_part('partials/posts/content', 'excerpt');

    }
}
?>
            <!-- Pagination -->
            <?php /* posts_nav_link(); */ ?>
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <!-- <a class="page-link" href="#">&larr; Older</a> -->
                    <?php previous_posts_link("&larr; Older");?>
                </li>
                <li class="page-item disabled">
                    <!-- <a class="page-link" href="#">Newer &rarr;</a> -->
                    <?php next_posts_link("Newer &rarr;");?>
                </li>
            </ul>

        </div>

        <?php get_sidebar();?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer();?>