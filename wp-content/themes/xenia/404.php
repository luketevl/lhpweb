<?php
	get_header();
	global $data;

	$gen_crumbs = isset($data['breadcrumbs']) ? $data['breadcrumbs'] : null;
?>
<div class="page-in">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 pull-left">
				<div class="page-in-name">
<?php
					echo "404:";
					echo " <span>". __('Error', THEME_SLUG) ."</span>";
?>
				</div>
			</div>
<?php
			if ($gen_crumbs) :
				PhoenixTeam\Utils::breadcrumbs();
			else :
?>
			<!-- Breadcrumbs turned off -->
<?php
			endif;
?>
		</div>
	</div>
</div>

<div <?php post_class(array('container', 'general-font-area', 'marg75')); ?>>
	<div class="col-lg-12">
		<div class="main_pad">
			<strong class="colored oops">W-P-L-O-C-K-E-R-.-C-O-M - <?php _e("Oops, 404 Error!", THEME_SLUG); ?></strong><br><br>
			<p><?php _e("The page you were looking for could not be found.", THEME_SLUG); ?></p>
		</div>
	</div>
</div>

<?php get_footer(); ?>