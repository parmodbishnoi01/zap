/list of table in multisite -->
<?php 
wp_blogs: Stores information about each blog created in your network.

wp_blog_versions: Stores general information about each network blog ID, database version, and date of the last update.

wp_registration_log: Stores information about registered users.

wp_signups: Stores information about user sign-ups, including all the information from the wp_registration_log table. Also stores the date the user account was activated as well as the unique activation key the user accessed during the sign-up process.

wp_site: Stores information about the main installation site, including the site ID, domain, and server path.

wp_sitemeta: Stores all the information about the multisite configurations set after you install the multisite feature.
 
wp_commentmeta : Stores every comment published to the site and contains information, or metadata.

wp_comments: Stores the body of the comments published to the website.

wp_links : Stores the name, URL, and description of all links you create by using the WordPress Link Manager.

wp_options :Stores all the option settings that you set for WordPress after you install it. Also, it includes all theme and plugin option settings.

wp_postmeta:Includes all posts and pages published to your site and contains metadata.

wp_posts :This table features the body of any post or page you’ve published to the blog.
 It also contains autosaved revisions and post option settings.

wp_terms: Stores the categories you’ve created for posts and links as well as tags that have been created for posts.

wp_term_relationships: Stores relationships among posts as well as categories and tags that have been assigned to them.

wp_term_taxonomy :WordPress has three types of taxonomies by default, named category, link, and tag. This table stores the taxonomy associated with terms stored in the wp_terms table.

wp_usermeta: Stores metadata from every user having an account on the WordPress website.

wp_users : The list of users having an account on the WordPress website is maintained within this table.
?>
Admin bar false
<? 
add_filter(‘show_admin_bar’, ‘__return_false’);

ordPress has the following default Post Types:

Post (Post Type: post)
Page (Post Type: page)
Attachment (Post Type: attachment)
Revision (Post Type: revision)
Navigation menu (Post Type: nav_menu_item)

global $my_site_var;
$my_site_var = $some_array['0'];


Page exists by URL?
get_page_by_path()  get_page_by_path();  

wp_title()--- its work outside the Loop
the_title() work inside the  loop