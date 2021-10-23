<?php
/**
 * This template is used to display the login form with [edd_login]
 */
global $edd_login_redirect;
if ( ! is_user_logged_in() ) :

	// Show any error messages after form submission
	edd_print_errors(); ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Login</h1>
		</div>
		<div class="panel-body">
			<form id="edd_login_form" class="edd_form" action="" method="post">
				<fieldset>
					<legend><?php _e( 'Log into Your Account', 'easy-digital-downloads' ); ?></legend>
					<?php do_action( 'edd_login_fields_before' ); ?>
					<!-- Username -->
					<p class="edd-login-username">
						<label for="edd_user_login"><?php _e( 'Username or Email', 'easy-digital-downloads' ); ?></label>
						<input name="edd_user_login" id="edd_user_login" class="edd-required edd-input form-control" type="text" required placeholder="JohnDoe" />
					</p>
					<!-- Password -->
					<p class="edd-login-password">
						<label for="edd_user_pass"><?php _e( 'Password', 'easy-digital-downloads' ); ?></label>
						<input name="edd_user_pass" id="edd_user_pass" class="edd-password edd-required edd-input form-control" type="password" placeholder="********" required/>
					</p>
					<!-- Remember me -->
					<div class="input-group">
						<div class="checkbox">
							<label for="rememberme" class="edd-login-remember">
								<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember Me', 'easy-digital-downloads' ); ?>
							</label>
						</div>
					</div>
					<!-- Lost Password -->
					<p class="edd-lost-password pull-right">
						<a href="<?php echo wp_lostpassword_url(); ?>" class="btn btn-primary">
							<?php _e( 'Lost Password?', 'easy-digital-downloads' ); ?>
						</a>
					</p>
					<!-- Login -->
					<p class="edd-login-submit">
						<input type="hidden" name="edd_redirect" value="<?php echo esc_url( $edd_login_redirect ); ?>"/>
						<input type="hidden" name="edd_login_nonce" value="<?php echo wp_create_nonce( 'edd-login-nonce' ); ?>"/>
						<input type="hidden" name="edd_action" value="user_login"/>
						<input id="edd_login_submit" type="submit" class="edd-submit btn btn-default" value="<?php _e( 'Log In', 'easy-digital-downloads' ); ?>"/>
					</p>
					<?php do_action( 'edd_login_fields_after' ); ?>
				</fieldset>
			</form>
		</div>
	</div>
<?php else : ?>

	<?php do_action( 'edd_login_form_logged_in' ); ?>

<?php endif; ?>
