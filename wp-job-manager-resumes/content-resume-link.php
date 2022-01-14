<?php

/**
 * Display a link inside the resume content of a resume list.
 *
 * This template can be overridden by copying it to yourtheme/wp-job-manager-resumes/content-resume-link.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager-resumes
 * @category    Template
 * @version     1.2.2
 */

if (!defined('ABSPATH')) {
    exit;
}

$parsed_url = parse_url($link['url']);
$host       = isset($parsed_url['host']) ? current(explode('.', $parsed_url['host'])) : '';
?>
<li class="candidate__links--link resume-link resume-link-<?php echo esc_attr(sanitize_title($host)); ?>">
    <a rel="nofollow" href="<?php echo esc_url($link['url']); ?>"
        target="_blank"><?php echo esc_html($link['name']); ?></a>
</li>