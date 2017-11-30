<?php
function post_remove ()      //creating functions post_remove for removing menu item
{ 
 remove_menu_page('edit.php');
 remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'post_remove');
?>