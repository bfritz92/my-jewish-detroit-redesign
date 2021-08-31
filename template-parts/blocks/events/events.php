<?php
/**
 * Events Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'front-page-posts-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'front-posts';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {{}
   $className .= ' align' . $block['align'];
}
$select_posts = get_field('select_posts'); 
?>

<h2 class="alignwide">Upcoming Events</h2>
<div class="events alignwide">
<!-- Individual Events - Begin -->

<!-- Individual Events - End -->

</div>
<a href="https://jewishdetroitcalendar.org/events/list/" class="more-events" target="_blank">More Events</a>
<?php
?>