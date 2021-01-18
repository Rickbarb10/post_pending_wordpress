function postPending($post_ID)
 { 
$user = wp_get_current_user();
$allowed_roles = array( 'author' );
if ( array_intersect( $allowed_roles, $user->roles ) ) {
        //Unhook this function
        remove_action('post_updated', 'postPending', 10, 3);

        return wp_update_post(array('ID' => $post_ID, 'post_status' => 'pending'));

        // re-hook this function
        add_action( 'post_updated', 'postPending', 10, 3 );
     }
 }
add_action('post_updated', 'postPending', 10, 3);
