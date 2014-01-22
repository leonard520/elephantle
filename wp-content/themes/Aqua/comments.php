<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="no-comments"><?php _e('This post is password protected. Enter the password to view comments.', 'Aqua'); ?></p>
	<?php
		return;
	}
?>
	
<?php if ( have_comments() ) : ?>

	<div class="comment_list" id="comments">
		<h3><?php comments_number(__('No Comments', 'Aqua'), __('One Comment', 'Aqua'), __('% Comments', 'Aqua'));?></h3>

		<!-- Comment list -->
		<ol>
			<?php wp_list_comments('type=comment&callback=boc_comment'); ?>
		</ol>
		<!-- Comment list::END -->
		
		<div class="clearfix">
		    <div style="float: left;"><?php previous_comments_link(); ?></div>
		    <div style="float: right;"><?php next_comments_link(); ?></div>
		</div>
	</div>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="no-comments"><?php _e('Comments are closed.', 'Aqua'); ?></p>

	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

				
		<!-- Comment Section -->	
		<div id="respond" class="comments_section">
    			
			<h3 class="title"><span><?php comment_form_title(__('Leave A Comment', 'Aqua'), __('Leave A Comment', 'Aqua')); ?></span></h3>
			
			
			<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>

			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>
			
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				
				<?php if ( is_user_logged_in() ) : ?>

				<p><?php _e('Logged in as', 'Aqua'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out &raquo;', 'Aqua'); ?></a></p>
		
				<div id="comment-textarea">					
					<textarea name="comment" id="comment" rows="8" class="aqua_input"></textarea>			
				</div>
				
				<div id="comment-submit">				
					<p><input name="submit" type="submit" id="submit" value="<?php _e('Comment', 'Aqua'); ?>" class="sm_button" /></p>
					<?php comment_id_fields(); ?>
					<?php do_action('comment_form', $post->ID); ?>					
				</div>
				
				<?php else : ?>
				
				<div id="comment-input">
					<p>
						<label for="author"><?php _e('Name (required)', 'Aqua'); ?><span class="required">*</span></label>
						<input id="author" class="aqua_input" name="author" type="text" value=""/>
					</p>
					<p>	
						<label for="email"><?php _e('Email (required)', 'Aqua'); ?><span class="required">*</span></label> 
						<input id="email" class="aqua_input" name="email" type="email" value=""/>
					</p>
					<p>		
						<label for="url"><?php _e('Website', 'Aqua'); ?></label>
						<input id="url" class="aqua_input" name="url" type="text" value="" size="30"/>
					</p>
				</div>
				<div id="comment-textarea">
					<p>		
						<label for="comment"><?php _e('Comment', 'Aqua'); ?><span class="required">*</span></label>
						<textarea id="comment" rows="8" class="aqua_input" name="comment"></textarea>
					</p>
				</div>
				
				<div id="comment-submit">
					<p><input name="submit" type="submit" id="submit" value="<?php _e('Comment', 'Aqua'); ?>" class="sm_button"></p>	
					<?php comment_id_fields(); ?>
					<?php do_action('comment_form', $post->ID); ?>	
				</div>	
				<?php endif; ?>
								
			</form>
			
			<?php endif; ?>
			
		</div>								
		<!-- Comment Section::END -->


<?php endif; ?>