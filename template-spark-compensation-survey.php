<?php
/**
 * Template Name: Spark Compensation Checkout Form
 * Description: The page that holds the spark compensation form
 */

add_action( 'wp_enqueue_scripts', 'add_assets' );
// phpcs:ignore Squiz.Commenting.FunctionComment.Missing
function add_assets() {
	wp_enqueue_script(
		'compensation',
		get_stylesheet_directory_uri() . '/build/compensation.js',
		array( 'spark-js' ),
		time(),
		true
	);
	wp_enqueue_style( 'compensation-style', get_stylesheet_directory_uri() . '/build/compensation.css', array( 'sparkStyles' ), time() );
}
require get_stylesheet_directory() . '/inc/class-compensation-api.php';
$api = new Compensation_API();
get_header();
?>


<div class="x-container max width offset">
	<div class="x-main full" role="main">
		<h1 class="headline">Spark Compensation Purchase Page</h1>
		<div class="survey">
			<form class="survey__form" action="/compensation-checkout-form" method="post">
				<div class="names">
					<label for="name">Your Name (required)</label>
					<input type="text" autocomplete="given-name" name="Name" id="name" required />
					<label for="email">Your Email (required)</label>
					<input type="email" name="email" id="email" required />
					<label for="ministry-name">Ministy Name: (required)</label>
					<input type="text" name="ministry-name" id="ministry-name" required />
				</div>
				<div class="ministry-size">
					<label for="ministry-size">Ministry Size:</label>
					<input type="radio" name="ministry-size" value="Small/Medium" id="ministry-size" />&nbsp;Small / Medium
					<input value="Large" type="radio" name="ministry-size" id="ministry-size" />&nbsp;Large
					<input type="radio" value="Mega/Multi" name="ministry-size" id="ministry-size" />&nbsp;Mega / Multi
				</div>
				<div class="paricipant">
					<label for="participant">Participate in Survey?</label>
					<input type="radio" value="Participant" name="participant" id="participant" />&nbsp;Yes
					<input type="radio" name="participant" value="Non-Participant" id="participant" />&nbsp;No
				</div>
				<div class="contributor">
					<label for="contributor">Would you like to contribute data to this?
					</label>
					<input type="checkbox" name="contributor" id="contributor" checked /> Yes, we'll contribute data!
				</div>
				<input type='submit' class="submit button" value="Checkout" />
			</form>
			<div class="survey__pricing">
				<span class="h3">Pricing<span id="pricing-ministry-name"></span>:</span>
				<div id="product-price"></div>
			</div>
		</div>
	</div>
</div>
<?php
if ( count( $_POST ) > 0 ) {
	$subscriber = array(
		'first_name' => $_POST['Name'],
		'email'      => $_POST['email'],
	);
	$api->add_person_to_workflow( $subscriber );
}
?>
<?php get_footer(); ?>