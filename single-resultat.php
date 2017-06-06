<?php
/**
 * The template for displaying all pages
 *
 *
 * @package aeris
 */

get_header(); 

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/header-content', 'page' );
?>

	<div id="content-area" class="wrapper default">
		<main id="main" class="site-main" role="main">

            <article id="post-<?php the_ID(); ?>">
                <header class="entry-header">
                    <?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                     <!-- ********************* THEMES ******************-->
                        <table>
                            <thead>
                                <tr>
                                    <th>Type(s) d’échantillons</th>
                                    <th>Type(s) de materiels</th>
                                    <th>Type(s) de mesures</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php
                                        $echantillons = get_the_terms( $post->ID, 'echantillons');  
                                        kitdecompo_wpth_show_categories($echantillons, 'echantillons');
                                        ?>                                
                                    </td>
                                    <td>
                                        <?php
                                        $materiels = get_the_terms( $post->ID, 'materiels');  
                                        kitdecompo_wpth_show_categories($materiels, 'materiels');
                                        ?>   
                                    </td>
                                    <td>
                                        <?php
                                        $mesures = get_the_terms( $post->ID, 'mesures');  
                                        kitdecompo_wpth_show_categories($mesures, 'mesures');
                                        ?>   
                                    </td>
                                </tr>
                            </tbody>
                        </table>                       

                </header>
                <?php 
                if (get_the_post_thumbnail()) {
                ?>
                <figure>
                <?php the_post_thumbnail( 'illustration-article' ); ?>
                </figure>
                <?php 
                }
                ?>
                <div class="meta-content">
                    <p><strong>Milieu d'étude : </strong>
                    <?php the_field('milieu');  ?>
                    </p>
                    <p><strong>Lieu : </strong>
                    <?php the_field('lieu');  ?>
                    </p>
                    <p><strong>Durée : </strong>
                    <?php the_field('duree');  ?> jours
                    </p>
                    <p><strong>Fichier de résultats : </strong>

                        <?php 
                        $file = get_field('fichier');

                        if( $file ) {
                            // vars
                            $url = $file['url'];
                        ?>
                            <a href="<?php echo $url; ?>" title="Télécharger le fichier">Télécharger le fichier</a>
                        <?php
                            }
                        ?>

                    </p>
                    <p><strong>Essence : </strong>
                    <?php the_field('essence');  ?>
                    </p>
                </div>
                <div class="wrapper-content">
                <?php
                    the_content();

                    // wp_link_pages( array(
                    //     'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'theme-aeris' ),
                    //     'after'  => '</div>',
                    // ) );
                ?>

                </div>
                <footer>
					<span class="icon-user"></span><?php the_author();?>
					<span class="icon-clock"></span><?php the_time( get_option( 'date_format' ) );?>
					<?php 
					// if ( get_edit_post_link() ) : 
					// 	edit_post_link(
					// 		sprintf(
					// 			/* translators: %s: Name of current post */
					// 			esc_html__( 'Edit %s', 'theme-aeris' ),
					// 			the_title( '<span class="screen-reader-text">"', '"</span>', false )
					// 		),
					// 		'<span class="edit-link">',
					// 		'</span>'
					// 	);
					// endif; 

					the_post_navigation();

					?>
				</footer><!-- .entry-meta -->
            </article><!-- #post-## -->

    		<?php 
			// if ( get_edit_post_link() ) : 
			// 	edit_post_link(
			// 		sprintf(
			// 			/* translators: %s: Name of current post */
			// 			esc_html__( 'Edit page%s', 'theme-aeris' ),
			// 			the_title( '<span class="screen-reader-text">"', '"</span>', false )
			// 		),
			// 		'<span class="edit-link">',
			// 		'</span>'
			// 	);
			// endif; ?>
		</main><!-- #main -->
	</div><!-- #content-area -->

<?php
endwhile; // End of the loop.
// get_sidebar();
get_footer();