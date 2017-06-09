<?php
/******************************************************************
* CUSTOM TAXONOMIES 
*/

if ( ! function_exists('kitdecompo_wpth_custom_taxonomies') ) {

    function kitdecompo_wpth_custom_taxonomies()
    {
        /*** 
        *  COMMONS CAPABILITIES
        *
        * Capacités personnalisées à utiliser avec le plugin "User Role Editor" (URE)
        * Dans URE, ajouter les capacités créées
        *
        */
        
        $capabilities = array(
            'manage_terms'    => 'kitdecompo_manage_terms',
            'edit_terms'      => 'kitdecompo_edit_terms',
            'delete_terms'    => 'kitdecompo_delete_terms',
            'assign_terms'    => 'kitdecompo_assign_terms',
        );
        
        /*** 
        *  TAXONOMIE TYPES D'ECHANTILLONS
        */
        
        $labels_echantillons = array(
            'name' => 'Types d\'échantillons',
            'singular_name' => 'Type d\'échantillon',
            'all_items' => 'Toutes les types d\'échantillons',
            'edit_item' => 'Éditer le type d\'échantillon',
            'view_item' => 'Voir le type d\'échantillon',
            'update_item' => 'Mettre à jour le type d\'échantillon',
            'add_new_item' => 'Ajouter un type d\'échantillon',
            'new_item_name' => 'Nouveau type d\'échantillon',
            'search_items' => 'Rechercher parmi les types d\'échantillons',
            'popular_items' => 'Types d\'échantillons les plus utilisées',
        );
        
        $args_echantillons = array (
            'label' => 'Types d\'échantillons',
            'labels' => $labels_echantillons,
            'hierarchical' => true,
            'capabilities' => $capabilities,
            'show_ui' => true
        );

        register_taxonomy('echantillons', 'resultat', $args_echantillons);

        /*** 
        *  TAXONOMIE TYPES DE MATERIEL
        */
        
        $labels_materiels = array(
            'name' => 'Types de materiels',
            'singular_name' => 'Type de matériel',
            'all_items' => 'Toutes les types de matériel',
            'edit_item' => 'Éditer le type de matériel',
            'view_item' => 'Voir le type de matériel',
            'update_item' => 'Mettre à jour le type de matériel',
            'add_new_item' => 'Ajouter un type de matériel',
            'new_item_name' => 'Nouveau type de matériel',
            'search_items' => 'Rechercher parmi les types de matériel',
            'popular_items' => 'Types de matériel les plus utilisées',
        );
        
        $args_materiels = array (
            'label' => 'Types de matériels',
            'labels' => $labels_materiels,
            'hierarchical' => true,
            'capabilities' => $capabilities,
            'show_ui' => true
        );

        register_taxonomy('materiels', 'resultat', $args_materiels);

        /*** 
        *  TAXONOMIE TYPES DE MESURE
        */
        
        $labels_mesures = array(
            'name' => 'Types de mesures',
            'singular_name' => 'Type de mesures',
            'all_items' => 'Toutes les types de mesure',
            'edit_item' => 'Éditer le type de mesure',
            'view_item' => 'Voir le type de mesure',
            'update_item' => 'Mettre à jour le type de mesure',
            'add_new_item' => 'Ajouter un type de mesure',
            'new_item_name' => 'Nouveau type de mesure',
            'search_items' => 'Rechercher parmi les types de mesure',
            'popular_items' => 'Types de mesure les plus utilisées',
        );
        
        $args_mesures = array (
            'label' => 'Types de mesures',
            'labels' => $labels_mesures,
            'hierarchical' => true,
            'capabilities' => $capabilities,
            'show_ui' => true
        );

        register_taxonomy('mesures', 'resultat', $args_mesures);

        
        //register_taxonomy_for_object_type( 'taxonomie', 'post_type' );
        register_taxonomy_for_object_type( 'echantillons', 'resultat' );
        register_taxonomy_for_object_type( 'materiels', 'resultat' );
        register_taxonomy_for_object_type( 'mesures', 'resultat' );
    }

    add_action('init', 'kitdecompo_wpth_custom_taxonomies');
}
?>