<?php

class NewPostTypeController
{
    /**
     * Static function for initialize register post-type.
     */
    static function init()
    {
        register_post_type('festas',
            array(
                'labels' => array(
                    'name' => 'Festas',
                    'singular_name' => 'Festa'
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'festas'),
            )
        );
    }


    /**
     * Sets all the parameters for register the new post-type.
     */
    static function custom_post_type() {

        $labels = array(
            'name'                => 'Festas',
            'singular_name'       => 'Festa',
            'menu_name'           => 'Festas',
            'all_items'           => 'Listar Festas',
            'view_item'           => 'Detalhe Festa',
            'add_new_item'        => 'Nova Festa',
            'add_new'             => 'Nova Festa',
            'edit_item'           => 'Editar Festa',
            'update_item'         => 'Atualizar Festa',
            'search_items'        => 'Busca',
            'not_found'           => 'Nao encontrado',
            'not_found_in_trash'  => 'Nao econtrado',
        );

        $args = array(
            'label'               => 'festas',
            'description'         => 'fotos da festa',
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields'),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 1,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );

        register_post_type('festas', $args );
    }
}
