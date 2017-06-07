<?php
/******************************************************************
 * CUSTOM POST
 *
 */

if ( ! function_exists('kitdecompo_wpth_custom_post') ) {

    function kitdecompo_wpth_custom_post()
    {
        
        /*** 
        *  CAPABILITIES
        *
        * Capacités personnalisées à utiliser avec le plugin "User Role Editor" (URE)
        * Dans URE, ajouter les capacités créées
        *
        */
        
        $capabilities_resultat = array(
            'publish_posts'         => 'publish_resultat',
            'edit_posts'            => 'edit_resultat',
            'edit_others_posts'     => 'edit_others_resultat',
            'delete_posts'          => 'delete_resultat',
            'delete_others_posts'   => 'delete_others_resultat',
            'read_private_posts'    => 'read_private_resultat',
            'edit_post'             => 'edit_resultat',
            'delete_post'           => 'delete_resultat',
            'read_post'             => 'read_resultat',
            'create_posts'          => 'create_resultat'
        );
        
        
        register_post_type(
        'resultat',
        array(
            'label' => 'Résultats',
            'labels' => array(
            'name' => 'Résultats',
            'singular_name' => 'Résultat',
            'all_items' => 'Tous les résultats',
            'add_new_item' => 'Ajouter un résultat',
            'edit_item' => 'Éditer le résultat',
            'new_item' => 'Nouveau résultat',
            'view_item' => 'Voir le résultat',
            'search_items' => 'Rechercher parmi les résultats',
            'not_found' => 'Pas de résultat trouvé',
            'not_found_in_trash'=> 'Pas de résultat dans la corbeille'
            ),
            'public' => true,
            'capability_type' => 'post',
            'capabilities' => $capabilities_resultat,
            'supports' => array(
                                'title',
                                'thumbnail',
                                'editor',
                                'author',  
                                ),
            'has_archive' => true,
            'menu_icon'   => 'dashicons-chart-area',
        )
        );  

    /********************** CUSTOM ROLE *****************************/

        add_role('resultat_author', 'Auteurs fiche résultat', array (
                                                                    'publish_resultat' => true,
                                                                    'edit_resultat' => true,
                                                                    'edit_others_resultat' => false,
                                                                    'delete_resultat' => true,
                                                                    'delete_others_resultat' => false,
                                                                    'read_private_resultat' => false,
                                                                    'edit_resultat' => true,
                                                                    'delete_resultat' => true,
                                                                    'read_resultat' => true,
                                                                    'create_resultats' => true,
                                                                    // Arrets
                                                                    'publish_arretsortie' => true,
                                                                    'edit_arretsortie' => true,
                                                                    'edit_others_arretsortie' => false,
                                                                    'delete_arretsortie' => true,
                                                                    'delete_others_arretsortie' => false,
                                                                    'read_private_arretsortie' => false,
                                                                    'edit_arretsortie' => true,
                                                                    'delete_arretsortie' => true,
                                                                    'read_arretsortie' => true,
                                                                    'create_arretrésultats' => true,
                                                                    // more standard capabilities here
                                                                    'read' => true,
                                                                    'upload_files' => true
                                                                )
        );
                
    } // end my_custom_post_type()

    add_action('init', 'kitdecompo_wpth_custom_post');
}
?>