<?php
/**
 * Template Name: Spark Compensation Checkout Form
 * Description: The page that holds the spark compensation form
 */

get_header();
?>

<div class="x-container max width offset">
    <div class="x-main full" role="main">
        <h1 class="headline">Spark Compensation Purchase Page</h1>
        <div class="form">
            <form action="">
                <div class="names">
                    <label for="name">Your Name</label>
                    <input type="text" name="Name" id="name" required />
                    <label for="ministry-name">Ministy Name:</label>
                    <input type="text" name="ministry-name" id="ministry-name" required />
                </div>
                <div class="ministry-size">
                    <label for="ministry-size">Ministry Size:</label>
                    <input type="radio" name="ministry-size" id="ministry-size" />&nbsp;Small / Medium
                    <input type="radio" name="ministry-size" id="ministry-size" />&nbsp;Large
                    <input type="radio" name="ministry-size" id="ministry-size" />&nbsp;Mega / Multi
                </div>
                <div class="paricipant">
                    <label for="participant">Participate in Survey?</label>
                    <input type="radio" name="participant" id="participant" />&nbsp;Yes
                    <input type="radio" name="participant" id="participant" />&nbsp;No
                </div>
                <div class="contributor">
                    <label for="contributor">Would you like to contribute data to this?
                    </label>
                    <input type="checkbox" name="contributor" id="contributor" /> Yes, we'll contribute data!
                </div>
            </form>
            <a href="/checkout" class="submit button btn-primary">Checkout</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>