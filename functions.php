<?php
/*
	GTM for Accelerated Mobile Pages (AMP) in Wordpress
	by Julien Coquet
	This function outputs a Google Tag Manager snippet and dataLayer adapted for the AMP format, 
	which does not support JavaScript by default.
*/

//AMP Analytics
function gtm_amp_post_template_head() {
    // Outputs required script element
		?>
		<!-- AMP Analytics -->
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
		<?php
}

function gtm_amp_post_template_footer($amp_template) {
    /* 
      Inserts the GTM element itself. 
      Make sure to replace the GTM-XXXXXX string with your container ID.
      The vars JSON array contains example values of datalayer elements you want GTM to capture in your AMP container.
    */
		?>
<!-- Google Tag Manager -->
<amp-analytics config="https://www.googletagmanager.com/amp.json?id=GTM-XXXXXX&gtm.url=SOURCE_URL" data-credentials="include">
  <script type="application/json">
  {
    "vars": {
      "postType": "<?php print get_post_type(); ?>", "var1": "val1" 
    }
  }
  </script>  
</amp-analytics>
		<?php
}

// Tell Wordpress to insert the GTM support for AMP blocks
add_action( 'amp_post_template_footer', 'gtm_amp_post_template_footer' );
add_action( 'amp_post_template_head', 'gtm_amp_post_template_head' );
?>
