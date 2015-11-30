<?php
get_header();

$projects = get_posts(array('post_type' => 'project', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => -1));
foreach ($projects as $project) {?>
	<a class="col-xs-12 col-sm-6 col-md-4 col-lg-3" href="/<?php echo $project->post_name?>">
		<div<?php 
		$attachments = new Attachments('project_attachments', $project->ID);
		if ($attachment = $attachments->get_single(0)) {?>
			 style="background-image: url(<?php echo $attachments->src('small', 0)?>);"
		<?php }?>></div>
		<?php echo $project->post_title?>
	</a>

<?php
}
get_footer();