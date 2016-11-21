<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see newsroom_elated_header_meta() - hooked with 10
     * @see eltd_user_scalable - hooked with 10
     */
    ?>
	<?php do_action('newsroom_elated_header_meta'); ?>
	<!-- Googletag Started -->

	<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
	<script>
	  var googletag = googletag || {};
	  googletag.cmd = googletag.cmd || [];
	</script>

	<script>
	var adtag7,adtag15;
	  googletag.cmd.push(function() {
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-160x600', [[160, 600], [120, 600]], 'div-gpt-ad-1477973619953-0').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-160x600_BTF', [[160, 600], [120, 600]], 'div-gpt-ad-1477973619953-1').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-300x250', [[300, 250], [300, 100], [300, 50]], 'div-gpt-ad-1477973619953-2').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-300x250_BTF', [[300, 250], [300, 100], [300, 50]], 'div-gpt-ad-1477973619953-3').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-300x250_BTF2', [[300, 250], [300, 100], [300, 50]], 'div-gpt-ad-1477973619953-4').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-300x250_BTF3', [[300, 250], [300, 100], [300, 50]], 'div-gpt-ad-1477973619953-5').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-300x600', [[300, 600], [300, 250], [300, 100], [300, 50]], 'div-gpt-ad-1477973619953-6').addService(googletag.pubads());
		adtag7 = googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-728x90', [[970, 250], [728, 90], [970, 90], [970, 66], [468, 60]], 'div-gpt-ad-1477973619953-7').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-728x90_BTF', [[970, 250], [728, 90], [970, 90], [970, 66], [468, 60]], 'div-gpt-ad-1477973619953-8').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-Interstitial', [600, 300], 'div-gpt-ad-1477973619953-9').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-Interstitial-Mobile', [300, 250], 'div-gpt-ad-1477973619953-10').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-Mobile_300x250', [[300, 250], [300, 100], [300, 50]], 'div-gpt-ad-1477973619953-11').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-Mobile_300x250_BTF', [[300, 250], [300, 100], [300, 50]], 'div-gpt-ad-1477973619953-12').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-Mobile_300x250_BTF2', [[300, 250], [300, 100], [300, 50]], 'div-gpt-ad-1477973619953-13').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-Mobile_300x250_BTF3', [[300, 250], [300, 100], [300, 50]], 'div-gpt-ad-1477973619953-14').addService(googletag.pubads());
		adtag15 = googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-Mobile_320x50', [[320, 50], [300, 50], [320, 100], [300, 250]], 'div-gpt-ad-1477973619953-15').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-Mobile_320x50_BTF', [[320, 50], [300, 50], [320, 100], [300, 250]], 'div-gpt-ad-1477973619953-16').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-Mobile_320x50_BTF1', [[320, 50], [300, 50], [320, 100], [300, 250]], 'div-gpt-ad-1477973619953-17').addService(googletag.pubads());
		googletag.defineSlot('/78528705/ZAGSBLOG-Multisize-Mobile_320x50_BTF2', [[320, 50], [300, 50], [320, 100], [300, 250]], 'div-gpt-ad-1477973619953-18').addService(googletag.pubads());
		googletag.pubads().enableSingleRequest();
		googletag.pubads().collapseEmptyDivs();
		googletag.enableServices();
	  });
	</script>

	<!-- Googletag ended -->

	<?php wp_head(); ?>
	<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php newsroom_elated_get_side_area(); ?>
<div class="eltd-wrapper">
    <div class="eltd-wrapper-inner">
        <?php
        $id = newsroom_elated_get_page_id();
        if(newsroom_elated_get_meta_field_intersect('uncovering_footer', $id ) == 'yes') { ?>
            <div id="eltd-content-wrapper">
            <!-- needed for uncovering footer effect -->
        <?php } ?>

        <?php newsroom_elated_get_header(); ?>

        <?php if(newsroom_elated_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='eltd-back-to-top'  href='#'>
                <span class="eltd-icon-stack eltd-front-side">
                     <span aria-hidden="true" class="eltd-icon-font-elegant arrow_carrot-2up "></span>
                </span>
                <span class="eltd-icon-stack eltd-back-side">
                     <span aria-hidden="true" class="eltd-icon-font-elegant arrow_carrot-2up "></span>
                </span>
            </a>
        <?php } ?>

        <div class="eltd-content" <?php newsroom_elated_content_elem_style_attr(); ?>>
            <div class="eltd-content-inner">