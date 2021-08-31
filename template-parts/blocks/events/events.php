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
$id = 'events-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'events';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {{}
   $className .= ' align' . $block['align'];
}
?>

<h2 class="alignwide">Upcoming Events</h2>
<div class="events alignwide">
	<!-- Individual Event - Begin -->
	<div class="event-info">
		
	</div>
	<!-- Individual Event - End -->
</div>
<a href="http://jewishdetroitcalendar.org/events/list/" class="more-events">More Events</a>
<?php
?>