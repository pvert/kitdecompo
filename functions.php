<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/******************************************************************
 * Afficher les catégories
 * $categories = get_the_terms( $post->ID, 'category');  
 */

function kitdecompo_wpth_show_categories($categories, $parent_taxonomy) {
 
  if( $categories ) {
  ?>
  <div class="tag">
  <?php
      foreach( $categories as $categorie ) { 
          if ($categorie->slug !== "non-classe") {
          echo '<a href="'.site_url().'/'.$parent_taxonomy.'/'.$categorie->slug.'" class="'.$categorie->slug.'">';

                echo $categorie->name; 
              ?>                    
          </a>
  <?php 
          }
      }
  ?>
  </div>
  <div class="clear"></div>
<?php
    } 
}


include 'inc/kitdecompo-custom-post.php';
include 'inc/kitdecompo-custom-taxonomies.php';

?>