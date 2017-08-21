<?php
/*
Plugin Name: NM Admin Filter By MAta Fields
Plugin URI: #
Description: Filter posts or pages in admin by custom fields (post meta)
Version: 1.0
Author: Habib
Author URI: #
 */


add_action( 'admin_init','nm_namespace');
function nm_namespace() {
    wp_register_style('nm_namespace', plugins_url('css/new-style.css',__FILE__ ));
    wp_enqueue_style('nm_namespace');
    wp_register_script( 'nm_namespace', plugins_url('custom-jquery.js',__FILE__ ));
    wp_enqueue_script('nm_namespace');
}

add_filter('parse_query', 'ba_admin_posts_filter');
add_action('restrict_manage_posts', 'ba_admin_posts_filter_restrict_manage_posts');
function ba_admin_posts_filter($query)
{
    global $pagenow;
    if (is_admin() && $pagenow == 'edit.php' && isset($_GET['admin_filter_fields_name']) && $_GET['admin_filter_fields_name'] != '') {
        $query->query_vars['meta_key'] = $_GET['admin_filter_fields_name'];
        if (isset($_GET['admin_filter_fields_value']) && $_GET['admin_filter_fields_value'] != '') {
            $query->query_vars['meta_value'] = $_GET['admin_filter_fields_value'];
        }

    }
}
function ba_admin_posts_filter_restrict_manage_posts()
{
    global $post_type;
    if ($post_type == 'member_post_type') {

        global $wpdb;
        //$sql = 'SELECT DISTINCT meta_key FROM '.$wpdb->postmeta.' ORDER BY 1';
        $sql    = "SELECT DISTINCT meta_key FROM wp_postmeta LEFT JOIN wp_posts ON wp_postmeta.post_id = wp_posts.ID WHERE wp_posts.post_type = 'member_post_type' ORDER BY 1";
        $fields = $wpdb->get_results($sql, ARRAY_N);
        ?>
        <div id="nm_search">
<select class="js-example-basic-multiple" name="admin_filter_fields_name">
<option value=""><?php _e('Filter By Member', 'baapf');?></option>
<?php
$current   = isset($_GET['admin_filter_fields_name']) ? $_GET['admin_filter_fields_name'] : '';
        $current_v = isset($_GET['admin_filter_fields_value']) ? $_GET['admin_filter_fields_value'] : '';
        foreach ($fields as $field) {
            if (substr($field[0], 0, 1) != "_") {
                printf
                    (
                    '<option value="%s"%s>%s</option>',
                    $field[0],
                    $field[0] == $current ? ' selected="selected"' : '',
                    $field[0]
                );
            }
        }
        ?>
</select>
<?php _e('', 'baapf');?><input type="TEXT" name="admin_filter_fields_value" value="<?php echo $current_v; ?>" /><input id="mn_s_s" type="submit" value="Search Member">
</div>
<?php }}?>

<!--
<script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script> -->


<!-- Add New  -->
<?php

add_filter('parse_query', 'ba_admin_posts_filter1');
add_action('restrict_manage_posts', 'ba_admin_posts_filter1_restrict_manage_posts');
function ba_admin_posts_filter1($query)
{
    global $pagenow;
    if (is_admin() && $pagenow == 'edit.php' && isset($_GET['admin_filter_fields_name']) && $_GET['admin_filter_fields_name'] != '') {
        $query->query_vars['meta_key'] = $_GET['admin_filter_fields_name'];
        if (isset($_GET['admin_filter_fields_value']) && $_GET['admin_filter_fields_value'] != '') {
            $query->query_vars['meta_value'] = $_GET['admin_filter_fields_value'];
        }

    }
}
function ba_admin_posts_filter1_restrict_manage_posts()
{
    global $post_type;
    if ($post_type == 'transaction_post') {

        global $wpdb;
        //$sql = 'SELECT DISTINCT meta_key FROM '.$wpdb->postmeta.' ORDER BY 1';
        $sql    = "SELECT DISTINCT meta_key FROM wp_postmeta LEFT JOIN wp_posts ON wp_postmeta.post_id = wp_posts.ID WHERE wp_posts.post_type = 'transaction_post' ORDER BY 1";
        $fields = $wpdb->get_results($sql, ARRAY_N);
        ?>
<div id="nm_search">
<select class="js-example-basic-multiple" name="admin_filter_fields_name">
<option value=""><?php _e('Filter By Transaction', 'baapf');?></option>
<?php
$current   = isset($_GET['admin_filter_fields_name']) ? $_GET['admin_filter_fields_name'] : '';
        $current_v = isset($_GET['admin_filter_fields_value']) ? $_GET['admin_filter_fields_value'] : '';
        foreach ($fields as $field) {
            if (substr($field[0], 0, 1) != "_") {
                printf
                    (
                    '<option value="%s"%s>%s</option>',
                    $field[0],
                    $field[0] == $current ? ' selected="selected"' : '',
                    $field[0]
                );
            }
        }
        ?>
</select> <?php _e('', 'baapf');?><input type="TEXT" name="admin_filter_fields_value" value="<?php echo $current_v; ?>" /><input id="mn_s_s" type="submit" value="Search Transaction">
</div>
<?php }}?>


<?php

add_filter('parse_query', 'ba_admin_posts_filter2');
add_action('restrict_manage_posts', 'ba_admin_posts_filter2_restrict_manage_posts');
function ba_admin_posts_filter2($query)
{
    global $pagenow;
    if (is_admin() && $pagenow == 'edit.php' && isset($_GET['admin_filter_fields_name']) && $_GET['admin_filter_fields_name'] != '') {
        $query->query_vars['meta_key'] = $_GET['admin_filter_fields_name'];
        if (isset($_GET['admin_filter_fields_value']) && $_GET['admin_filter_fields_value'] != '') {
            $query->query_vars['meta_value'] = $_GET['admin_filter_fields_value'];
        }

    }
}
function ba_admin_posts_filter2_restrict_manage_posts()
{
    global $post_type;
    if ($post_type == 'payment_type') {

        global $wpdb;
        //$sql = 'SELECT DISTINCT meta_key FROM '.$wpdb->postmeta.' ORDER BY 1';
        $sql    = "SELECT DISTINCT meta_key FROM wp_postmeta LEFT JOIN wp_posts ON wp_postmeta.post_id = wp_posts.ID WHERE wp_posts.post_type = 'payment_type' ORDER BY 1";
        $fields = $wpdb->get_results($sql, ARRAY_N);
        ?>
        <div id="nm_search">
<select class="js-example-basic-multiple" name="admin_filter_fields_name">
<option value=""><?php _e('Filter By Payment', 'baapf');?></option>
<?php
$current   = isset($_GET['admin_filter_fields_name']) ? $_GET['admin_filter_fields_name'] : '';
        $current_v = isset($_GET['admin_filter_fields_value']) ? $_GET['admin_filter_fields_value'] : '';
        foreach ($fields as $field) {
            if (substr($field[0], 0, 1) != "_") {
                printf
                    (
                    '<option value="%s"%s>%s</option>',
                    $field[0],
                    $field[0] == $current ? ' selected="selected"' : '',
                    $field[0]
                );
            }
        }
        ?>
</select> <?php _e('', 'baapf');?><input type="TEXT" name="admin_filter_fields_value" value="<?php echo $current_v; ?>" /><input id="mn_s_s" type="submit" value="Search Payment">
</div>
<?php }}?>


<?php

add_filter('parse_query', 'ba_admin_posts_filter3');
add_action('restrict_manage_posts', 'ba_admin_posts_filter3_restrict_manage_posts');
function ba_admin_posts_filter3($query)
{
    global $pagenow;
    if (is_admin() && $pagenow == 'edit.php' && isset($_GET['admin_filter_fields_name']) && $_GET['admin_filter_fields_name'] != '') {
        $query->query_vars['meta_key'] = $_GET['admin_filter_fields_name'];
        if (isset($_GET['admin_filter_fields_value']) && $_GET['admin_filter_fields_value'] != '') {
            $query->query_vars['meta_value'] = $_GET['admin_filter_fields_value'];
        }

    }
}
function ba_admin_posts_filter3_restrict_manage_posts()
{
    global $post_type;
    if ($post_type == 'merchant_type') {

        global $wpdb;
        //$sql = 'SELECT DISTINCT meta_key FROM '.$wpdb->postmeta.' ORDER BY 1';
        $sql    = "SELECT DISTINCT meta_key FROM wp_postmeta LEFT JOIN wp_posts ON wp_postmeta.post_id = wp_posts.ID WHERE wp_posts.post_type = 'merchant_type' ORDER BY 1";
        $fields = $wpdb->get_results($sql, ARRAY_N);
        ?>
        <div id="nm_search">
<select class="js-example-basic-multiple" name="admin_filter_fields_name">
<option value=""><?php _e('Filter By Merchant', 'baapf');?></option>
<?php
$current   = isset($_GET['admin_filter_fields_name']) ? $_GET['admin_filter_fields_name'] : '';
        $current_v = isset($_GET['admin_filter_fields_value']) ? $_GET['admin_filter_fields_value'] : '';
        foreach ($fields as $field) {
            if (substr($field[0], 0, 1) != "_") {
                printf
                    (
                    '<option value="%s"%s>%s</option>',
                    $field[0],
                    $field[0] == $current ? ' selected="selected"' : '',
                    $field[0]
                );
            }
        }
        ?>
</select> <?php _e('', 'baapf');?><input type="TEXT" name="admin_filter_fields_value" value="<?php echo $current_v; ?>" /><input id="mn_s_s" type="submit" value="Search Merchant">
</div>
<?php }}?>
