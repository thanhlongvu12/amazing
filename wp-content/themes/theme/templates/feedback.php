<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/13/2023
 * Time: 11:55 AM
 * Template Name: Feed Back
 */

get_header();
?>

<style>
    form p{
        color: black;
        font-size: 20px;
    }
</style>

<div class="form-feedback">
    <?php
    $formFeedback = '[contact-form-7 id="328" title="Feedback"]';
    echo do_shortcode($formFeedback);
    ?>
</div>

<?php
get_footer();
?>
