<?php
// Fix Media Permissions
add_action('init', function() {
    global $wp_post_types;
    $wp_post_types['attachment']->cap->edit_posts = 'edit_uploads';
    $wp_post_types['attachment']->cap->delete_posts = 'delete_uploads';
});

// Roles
function ifrs_portal_roles_addRoles() {
    $admin = get_role('administrator');
    $admin->add_cap('edit_uploads');
    $admin->add_cap('delete_uploads');

    if (!get_role( 'jornalista' )) {
        add_role('jornalista', __('Jornalista'), array(
            'read'                   => true,
            'upload_files'           => true,
            'edit_uploads'           => true,
            'delete_uploads'         => false,

            'publish_posts'          => true,
            'edit_posts'             => true,
            'edit_others_posts'      => true,
            'edit_published_posts'   => true,
            'delete_posts'           => true,
            'delete_others_posts'    => true,
            'delete_published_posts' => true,
            'manage_categories'      => true,
        ));
    }

    if (!get_role( 'conteudista' )) {
        add_role('conteudista', __('Conteudista'), array(
            'read'                   => true,
            'upload_files'           => true,
            'edit_uploads'           => true,
            'delete_uploads'         => false,

            'publish_pages'          => false,
            'edit_pages'             => true,
            'edit_others_pages'      => true,
            'edit_published_pages'   => true,
        ));
    }

    if (!get_role( 'gerente_conteudo' )) {
        add_role('gerente_conteudo', __('Gerente de Conteúdo'), array(
            'read'                   => true,
            'upload_files'           => true,
            'edit_uploads'           => true,
            'delete_uploads'         => true,

            'publish_pages'          => true,
            'edit_pages'             => true,
            'edit_others_pages'      => true,
            'edit_published_pages'   => true,
            'delete_pages'           => true,
            'delete_others_pages'    => true,
            'delete_published_pages' => true,
        ));
    }
}

function ifrs_portal_roles_removeRoles() {
    $admin = get_role('administrator');
    $admin->remove_cap('edit_uploads');
    $admin->remove_cap('delete_uploads');

    if (get_role( 'jornalista' )) {
        remove_role( 'jornalista' );
    }
    if (get_role( 'conteudista' )) {
        remove_role( 'conteudista' );
    }
    if (get_role( 'gerente_conteudo' )) {
        remove_role( 'gerente_conteudo' );
    }
}
