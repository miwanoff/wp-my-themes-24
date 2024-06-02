<?php
function kc_show_carousel($content)
{
    // $html =
    //     '<section id="demos">
    //     <div class="row">
    //         <div class="large-12 columns">
    //             <div class="owl-carousel owl-theme">
    //                 <div class="item">
    //                     <h4>1</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>2</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>3</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>4</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>5</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>6</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>7</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>8</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>9</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>10</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>11</h4>
    //                 </div>
    //                 <div class="item">
    //                     <h4>12</h4>
    //                 </div>
    //             </div>
    //         </div>
    //     </div>
    // </section>';

    $args = [
        'post_type' => 'post',
        'showposts' => 6,
        //'category_name' => 'cooking',
        //'post_type' => 'recipe',
        // 'post_type' => 'movies',
        //'tag' => 'cooking',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    $query = new WP_Query($args);

    $html = '';
    if ($query->have_posts()) {
        $html = '<section id="demos">
    <div class="row">
        <div class="large-12 columns">
            <div class="owl-carousel owl-theme">';
        while ($query->have_posts()) {
            $query->the_post();
            $html .= '<div class="item"><h5>';
            $html .= '<a href="' . get_permalink($query->post->ID) . '">' . $query->post->post_title . '</a>';
            $html .= '</h5></div>';
        }
        $html .= ' </div>
    </div>
</div>
</section>';
    }

    return $content . $html;
}
