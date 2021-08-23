<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.3.0
 * 
 * @cmsmasters_package 	My Religion
 * @cmsmasters_version 	1.2.4
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

$ratings_enabled = false;

if (
	(
		function_exists('wc_review_ratings_enabled') && 
		wc_review_ratings_enabled()
	) || 
	get_option( 'woocommerce_enable_review_rating' ) === 'yes'
) {
	$ratings_enabled = true;
}

?>
<div id="reviews">
	<div id="comments" class="post_comments cmsmasters_woo_comments">
		<h2 class="post_comments_title">
			<?php
			$count = $product->get_review_count();
			if ( $count && $ratings_enabled ) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'my-religion' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
				echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
			} else {
				esc_html_e( 'Reviews', 'my-religion' );
			}
			?>
		</h2>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="cmsmasters_wrap_pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args', 
						array(
							'prev_text' => '<span class="cmsmasters_theme_icon_slide_' . (!is_rtl() ? 'prev' : 'next') . '"></span>',
							'next_text' => '<span class="cmsmasters_theme_icon_slide_' . (!is_rtl() ? 'next' : 'prev') . '"></span>',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'my-religion' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'my-religion' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'my-religion' ), get_the_title() ),
					/* translators: %s is product title */						
					'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'my-religion' ),
					'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
					'title_reply_after'   => '</span>',
					'comment_notes_after'  => '',
					'label_submit'        => esc_html__( 'Submit', 'my-religion' ),
					'logged_in_as'        => '',
					'comment_field'       => '',
				);
				
				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'    => __( 'Name', 'my-religion' ),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email'  => array(
						'label'    => __( 'Email', 'my-religion' ),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);
			
				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';

					$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" placeholder="'. esc_attr( $field['label'] ) . ( $field['required'] ? '&nbsp;*' : '' ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

					$comment_form['fields'][ $key ] = $field_html;
				}
				
				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'my-religion' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( $ratings_enabled ) {
					$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'my-religion' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'my-religion' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'my-religion' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'my-religion' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'my-religion' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'my-religion' ) . '</option>
						<option value="1">' . esc_html__( 'Very Poor', 'my-religion' ) . '</option>
					</select></p>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="67" rows="2" placeholder="' . esc_attr__('Your Review', 'my-religion') . '" required></textarea></p>';
								
				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'my-religion' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>
