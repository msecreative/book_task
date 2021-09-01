<?php 
/* Plugin Name: Book
 * Plugin URI: http://github.com
 * Description: Custom Post of Book
 * Version: 1.0
 * Author: Sarmin Akter
 * Author URI: http://msecreative.wedevsteam.com
 * Text Domain: task
 */

function book_task_scripts() {
    wp_enqueue_style( 'book-style',  plugins_url('css/style.css',__FILE__), array(), '4.0.0', 'all');

    //wp_enqueue_script( 'book-jquery-min',  plugins_url('js/jquery-3.5.1.min.js',__FILE__));
    wp_enqueue_script( 'book-masonry',  plugins_url('js/isotope.pkgd.min.js',__FILE__), array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'book-main-js',  plugins_url('js/main.js',__FILE__), array('jquery'), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'book_task_scripts' );

add_action( 'init', 'task_book_init' );
/**
 * Register a Books post type.
 *
 */
function task_book_init() {
     $labels = array(
        'name'                  => _x( 'Books', 'Post type general name', 'task' ),
        'singular_name'         => _x( 'Book', 'Post type singular name', 'task' ),
        'menu_name'             => _x( 'Books', 'Admin Menu text', 'task' ),
        'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'task' ),
        'add_new'               => __( 'Add New', 'task' ),
        'add_new_item'          => __( 'Add New Book', 'task' ),
        'new_item'              => __( 'New Book', 'task' ),
        'edit_item'             => __( 'Edit Book', 'task' ),
        'view_item'             => __( 'View Book', 'task' ),
        'all_items'             => __( 'All Books', 'task' ),
        'search_items'          => __( 'Search Books', 'task' ),
        'parent_item_colon'     => __( 'Parent Books:', 'task' ),
        'not_found'             => __( 'No books found.', 'task' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'task' ),
        'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'task' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'task' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'task' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'task' ),
        'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'task' ),
        'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'task' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'task' ),
        'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'task' ),
        'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'task' ),
        'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'task' ),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'task' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'         => 'dashicons-store',
        'supports'           => array( 'title', 'editor', 'thumbnail', )
    );

    register_post_type( 'book', $args );
}


// Register Custom Taxanomy
add_action( 'init', 'task_book_category', 0 );

// create two taxonomies, genres and Books for the post type "book"
function task_book_category() {

    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name'                       => _x( 'Categories', 'taxonomy general name', 'task' ),
        'singular_name'              => _x( 'Category', 'taxonomy singular name', 'task' ),
        'search_items'               => __( 'Search Categories', 'task' ),
        'popular_items'              => __( 'Popular Categories', 'task' ),
        'all_items'                  => __( 'All Categories', 'task' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Category', 'task' ),
        'update_item'                => __( 'Update Category', 'task' ),
        'add_new_item'               => __( 'Add New Category', 'task' ),
        'new_item_name'              => __( 'New Category Name', 'task' ),
        'separate_items_with_commas' => __( 'Separate Categories with commas', 'task' ),
        'add_or_remove_items'        => __( 'Add or remove Categories', 'task' ),
        'choose_from_most_used'      => __( 'Choose from the most used Categories', 'task' ),
        'not_found'                  => __( 'No Book Categories found.', 'task' ),
        'menu_name'                  => __( 'Categories', 'task' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'cateogry' ),
    );

    register_taxonomy( 'book_category', 'book', $args );
}

 function book_custom_post_shortcode($atts) {

     $result = shortcode_atts( array(
        'per_page' => '',
        
    ), $atts ) ;
     extract($result);
    ob_start();
?>
        <!--portfolio section start-->


    <div class="bookShowcase">
    <div class="menu-item">
        <ul>

            <li data-filter="*">All</li>
            <?php
                $category = get_terms( 'book_category', array('hide_empty'=>true));
                foreach($category as $b_cat) : 

                  echo'<li data-filter=".'.$b_cat->slug.'">'.$b_cat->name.'</li>';
              endforeach;
            ?>
        </ul>
    </div>

    <div class="bookMesonry">

         <?php
               $bq = new WP_Query(array(
                    'post_type'         =>'book',
                    'posts_per_page'    => $per_page
                )); 

               while ($bq->have_posts()): $bq->the_post();
                $books_term = get_the_terms(get_the_ID(), 'book_category');
                $books_cateogry_slug = array();
                foreach($books_term as $term):
                    $books_cateogry_slug[] = $term->slug;
                endforeach;
                $books_cateogry_class = join( ' ', $books_cateogry_slug);
        ?>
        <div class="mesonaryItem <?php echo $books_cateogry_class; ?>">
            <div class="bookPortfolioContent">
                <?php the_post_thumbnail(); ?>
                <div class="portfolioContent">
                    <h3><?php the_title() ?></h3>
                    <p><?php the_content(); ?></p>
                    <a href="<?php the_permalink(); ?>"><?php echo __("Read More", "task"); ?></a>
                </div>
            </div>      
        </div>
        <?php endwhile; ?>

        <div class="grid-sizer"></div>
    </div>

    <div class="loadBtn">
        <a href=""><?php echo __("Load More", "task"); ?></a>
    </div>
</div>
    <!--portfolio section end-->


    <?php return ob_get_clean();  
     
    return $Content;
}


add_shortcode('books', 'book_custom_post_shortcode');
