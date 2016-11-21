<?php
require_once get_template_directory().'/htmlpurifier/library/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltd-post-content">
        <?php if (has_post_thumbnail()){ ?>
            <div class="eltd-post-image-area">
                <?php newsroom_elated_get_module_template_part('templates/single/parts/image', 'blog'); ?>
            </div>
        <?php } ?>
        <div class="eltd-post-text">
            <div class="eltd-post-text-inner clearfix">
            	<?php $spilt_content = split('<p>',apply_filters('the_content',get_the_content()));
            	$countsplit = 0;
            	foreach($spilt_content as $splited_content){
					echo $splited_content;
					if($countsplit == 3){
						if(wp_is_mobile()){
						?>
						<style>
						.zagsblog_sidebar_3 { text-align:center;margin:0 auto;margin-top:10px;margin-bottom:10px; }
						</style>
						<!-- /78528705/ZAGSBLOG-Multisize-300x250_BTF2 -->
						<div id='div-gpt-ad-1477973619953-4' class="zagsblog_sidebar_3">
						<script>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1477973619953-4'); });
						</script>
						</div>
						<?php } else { ?>
						<style>
						.zagsblog_leaderboard_2 {text-align:center;margin:0 auto;margin-top:10px;margin-bottom:10px; }
						@media(min-width: 500px) { .zagsblog_leaderboard_2 { width: 300px; height: 250px; } }
						@media(min-width: 800px) { .zagsblog_leaderboard_2 { width: 300px; height: 250px; } }
						</style>
						<!-- /78528705/ZAGSBLOG-Multisize-300x250_BTF2 -->
						<div id='div-gpt-ad-1477973619953-4' class="zagsblog_leaderboard_2">
						<script>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1477973619953-4'); });
						</script>
						</div>
						<?php
						}
					}
					$countsplit++;
            	}
            	?>
                <?php //echo apply_filters('the_content',get_the_content()); ?>
            </div>
        </div>
    </div>
    <?php do_action('newsroom_elated_before_blog_article_closed_tag'); ?>
</article>