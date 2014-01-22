<h3><?php if ('open'==$post->comment_status)  comments_number(); ?></h3>
<?php
if ( have_comments() ) :
if ( post_password_required() ) :?>
<p>This post is password protected. Enter the  password to view any comments.</p>
<?php
return;
endif;
wp_list_comments(array('style' => 'div')); 
paginate_comments_links();
comment_form();
else :
if ('open'==$post->comment_status) :
comment_form();
endif;
if ('close'==$post->comment_status) :
echo '<h3>Comments are closed</h3>';
endif;
endif;
?>
