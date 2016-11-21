<?php
/**
 * Footer template part
 */
?>
</div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<?php 
$id = newsroom_elated_get_page_id();
if(newsroom_elated_get_meta_field_intersect('uncovering_footer', $id ) == 'yes') { ?>
    </div>
    <!-- needed for uncovering footer effect -->
<?php } ?>

<footer>
	<div class="eltd-footer-inner clearfix">
		<?php
            if($display_footer_heading) {
                newsroom_elated_get_footer_heading();
            }
			if($display_footer_top) {
				newsroom_elated_get_footer_top();
			}
			if($display_footer_bottom) {
				newsroom_elated_get_footer_bottom();
			}
		?>
	</div>
</footer>

</div> <!-- close div.eltd-wrapper-inner  -->
</div> <!-- close div.eltd-wrapper -->
<?php wp_footer(); ?>
</body>
</html>