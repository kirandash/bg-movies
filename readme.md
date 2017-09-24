## Step 1 : Plugin Header Requirements & Activation Version check
register_activation_hook and version_compare

## Step 2 : Security checkup
if( !function_exists( 'add_action' ) )

## Step 3 : Create Custom Post type - movies

## Step 4 : Create meta boxes with add_meta_box

## Step 5 : Enqueue stylesheet to load in admin only for movie CPT
wp_enqueue_style and plugins_url

## Step 6 : Save metadata
save_post_ and update_post_meta

## Step 7 : Filter data with filter hook and placeholders
add_filter ( 'the_content' )

## Step 8 : Internationalizing all strings

