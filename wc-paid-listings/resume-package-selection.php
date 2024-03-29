<?php

/**
 * Template for choosing a package during the Resume submission.
 *
 * This template can be overridden by copying it to yourtheme/wc-paid-listings/resume-package-selection.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager-resumes
 * @category    Template
 * @since       1.0.0
 * @version     2.7.3
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if ($packages || $user_packages) :
	$checked = 1;
?>
<?php if ($user_packages) : ?>
<ul class="user-resume_packages">
    <li class="package-section"><?php _e('Your Packages:', 'wp-job-manager-wc-paid-listings'); ?></li>
    <?php foreach ($user_packages as $key => $package) :
				$package = wc_paid_listings_get_package($package);
			?>
    <li class="user-resume-package">
        <input type="radio" <?php checked($checked, 1); ?> name="resume_package" value="user-<?php echo $key; ?>"
            id="user-package-<?php echo $package->get_id(); ?>" />
        <label for="user-package-<?php echo $package->get_id(); ?>"><?php echo $package->get_title(); ?></label><br />
        <?php
					if ($package->get_limit()) {
						printf(_n('%1$s resume posted out of %2$d', '%1$s resumes posted out of %2$s', $package->get_count(), 'wp-job-manager-wc-paid-listings'), $package->get_count(), $package->get_limit());
					} else {
						printf(_n('%s resume posted', '%s resumes posted', $package->get_count(), 'wp-job-manager-wc-paid-listings'), $package->get_count());
					}

					if ($package->get_duration()) {
						printf(' ' . _n('listed for %s day', 'listed for %s days', $package->get_duration(), 'wp-job-manager-wc-paid-listings'), $package->get_duration());
					}

					$checked = 0;
					?>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
<?php if ($packages) : ?>
<ul class="resume_packages">
    <li class="package-section"><?php _e('Purchase Package:', 'wp-job-manager-wc-paid-listings'); ?></li>
    <?php foreach ($packages as $key => $package) :
				$product = wc_get_product($package);
				if (!$product->is_type(array('resume_package', 'resume_package_subscription'))) {
					continue;
				}
				/* @var $product WC_Product_Resume_Package|WC_Product_Resume_Package_Subscription */
				if ($product->is_type('variation')) {
					$post = get_post($product->get_parent_id());
				} else {
					$post = get_post($product->get_id());
				}
			?>
    <li class="resume-package">
        <input type="radio" <?php checked($checked, 1); ?> name="resume_package"
            value="<?php echo $product->get_id(); ?>" id="package-<?php echo $product->get_id(); ?>" />
        <label for="package-<?php echo $product->get_id(); ?>"><?php echo $product->get_title(); ?></label><br />
        <?php
					if (!empty($post->post_excerpt)) {
						echo apply_filters('woocommerce_short_description', $post->post_excerpt);
					} else {
						printf(_n('%1$s to post %2$d resume', '%1$s to post %2$s resumes', $product->get_limit(), 'wp-job-manager-wc-paid-listings') . ' ', $product->get_price_html(), $product->get_limit() ? $product->get_limit() : __('unlimited', 'wp-job-manager-wc-paid-listings'));

						if ($product->get_duration()) {
							printf(' ' . _n('listed for %s day', 'listed for %s days', $product->get_duration(), 'wp-job-manager-wc-paid-listings'), $product->get_duration());
						}
					}
					$checked = 0;
					?>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
<?php else : ?>

<p><?php _e('No packages found', 'wp-job-manager-wc-paid-listings'); ?></p>

<?php endif; ?>