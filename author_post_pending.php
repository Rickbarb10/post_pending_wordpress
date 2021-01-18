function postPending($post_ID)
 { 
     if(get_role('author'))
     {
        //Unhook this function
        remove_action('post_updated', 'postPending', 10, 3);

        return wp_update_post(array('ID' => $post_ID, 'post_status' => 'pending'));

        // re-hook this function
        add_action( 'post_updated', 'postPending', 10, 3 );
     }
 }
add_action('post_updated', 'postPending', 10, 3);