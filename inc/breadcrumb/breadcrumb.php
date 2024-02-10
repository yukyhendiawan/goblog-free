<?php
/**
 * Displays a breadcrumbs.
 * 
 * @package     Goblog Free
 * @author:     Dimox
 * @version:    2019.03.03
 * @link        https://gist.github.com/Dimox/5654092
 * @license:    MIT
 */

/**
 * Add Breadcrumbs.
 */
function goblog_free_breadcrumb() {

	/* translators: %s is a placeholder for dynamic content */
	$text['home'] = __( 'Home', 'hendky' );

	/* translators: %s is a placeholder for dynamic content */
	$text['category'] = __( 'Category "%s"', 'hendky' );

	/* translators: %s is a placeholder for dynamic content */
	$text['search'] = __( 'Search Results for "%s" Query', 'hendky' );

	/* translators: %s is a placeholder for dynamic content */
	$text['tag'] = __( 'Tag "%s"', 'hendky' );

	/* translators: %s is a placeholder for dynamic content */
	$text['author'] = __( 'Articles Posted by %s', 'hendky' );

	/* translators: %s is a placeholder for dynamic content */
	$text['404'] = __( '404', 'hendky' );

	/* translators: %s is a placeholder for dynamic content */
	$text['page'] = __( 'Page %s', 'hendky' );

	/* translators: %s is a placeholder for dynamic content */
	$text['cpage'] = __( 'Comment Page %s', 'hendky' );

	$wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // Opening wrapper tag for breadcrumbs container.
	$wrap_after  = '</div><!-- .breadcrumbs -->'; // Closing wrapper tag for breadcrumbs container.
	$sep         = '<span class="separator"> / </span>'; // Separator between breadcrumbs.
	$before      = '<span class="current">'; // HTML tag before the current breadcrumb.
	$after       = '</span>'; // HTML tag after the current breadcrumb.

	$show_on_home   = 1; // Show breadcrumbs on the homepage (1) or not (0).
	$show_home_link = 1; // Show the 'Home' link (1) or not (0).
	$show_current   = 1; // Show current page title (1) or not (0).
	$show_last_sep  = 1; // Show last separator when current page title is not displayed (1) or not (0).

	global $post;
	$home_url  = esc_url( home_url( '/' ) );
	$link      = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link     .= '<a class="link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
	$link     .= '<meta itemprop="position" content="%3$s" />';
	$link     .= '</span>';
	$parent_id = ( $post ) ? $post->post_parent : '';
	$home_link = sprintf( $link, $home_url, $text['home'], 1 );

	if ( is_home() || is_front_page() ) {

		if ( $show_on_home ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $wrap_before . $home_link . $wrap_after;
		}
	} else {

		$position = 0;

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $wrap_before;

		if ( $show_home_link ) {
			++$position;
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $home_link;
		}

		if ( is_category() ) {
			$parents = get_ancestors( get_query_var( 'cat' ), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				++$position;
				if ( $position > 1 ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				++$position;
				$cat = get_query_var( 'cat' );

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) {
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $sep;
					}

					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				} elseif ( $show_last_sep ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
			}
		} elseif ( is_search() ) {
			if ( $show_home_link && $show_current || ! $show_current && $show_last_sep ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
			if ( $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $before . sprintf( $text['search'], get_search_query() ) . $after;
			}
		} elseif ( is_year() ) {
			if ( $show_home_link && $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
			if ( $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $before . esc_html( get_the_time( 'Y' ) ) . $after;
			} elseif ( $show_home_link && $show_last_sep ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
		} elseif ( is_month() ) {
			if ( $show_home_link ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
			++$position;

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ), $position );
			if ( $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . $before . esc_html( get_the_time( 'F' ) ) . $after;
			} elseif ( $show_last_sep ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
		} elseif ( is_day() ) {
			if ( $show_home_link ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
			++$position;
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ), $position ) . $sep;
			++$position;

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ), $position );
			if ( $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . $before . esc_html( get_the_time( 'd' ) ) . $after;
			} elseif ( $show_last_sep ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() !== 'post' ) {
				++$position;
				$post_type = get_post_type_object( get_post_type() );
				if ( $position > 1 ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
				if ( $show_current ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep . $before . esc_html( get_the_title() ) . $after;
				} elseif ( $show_last_sep ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
			} else {
				$cat       = get_the_category();
				$cat_id    = $cat[0]->cat_ID;
				$parents   = get_ancestors( $cat_id, 'category' );
				$parents   = array_reverse( $parents );
				$parents[] = $cat_id;
				foreach ( $parents as $cat ) {
					++$position;
					if ( $position > 1 ) {
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $sep;
					}

					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}
				if ( get_query_var( 'cpage' ) ) {
					/**
					 * So far Haven't tested for this block yet
					 */
					++$position;
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );

					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
				} else {
					if ( $show_current ) {
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $sep . $before . get_the_title() . $after;
					} elseif ( $show_last_sep ) {
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $sep;
					}
				}
			}
		} elseif ( is_post_type_archive() ) {
			$post_type = get_post_type_object( get_post_type() );
			if ( get_query_var( 'paged' ) ) {
				++$position;
				if ( $position > 1 ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
				if ( $show_current ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $before . $post_type->label . $after;
				} elseif ( $show_home_link && $show_last_sep ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
			}
		} elseif ( is_attachment() ) {

			$parent    = get_post( $parent_id );
			$cat       = get_the_category( $parent->ID );
			$cat_id    = isset( $cat[0]->cat_ID ) ? $cat[0]->cat_ID : false;
			$parents   = get_ancestors( $cat_id, 'category' );
			$parents   = array_reverse( $parents );
			$parents[] = $cat_id;
			if ( $cat_id ) {
				foreach ( $parents as $cat ) {
					++$position;
					if ( $position > 1 ) {
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $sep;
					}

					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}
			}
			++$position;

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );

			if ( $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . $before . esc_html( get_the_title() ) . $after;
			} elseif ( $show_last_sep ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
		} elseif ( is_page() && ! $parent_id ) {
			if ( $show_home_link && $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
			if ( $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $before . esc_html( get_the_title() ) . $after;
			} elseif ( $show_home_link && $show_last_sep ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $page_id ) {
				++$position;
				if ( $position > 1 ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo sprintf( $link, get_page_link( $page_id ), get_the_title( $page_id ), $position );
			}
			if ( $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . $before . esc_html( get_the_title() ) . $after;
			} elseif ( $show_last_sep ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
		} elseif ( is_tag() ) {
			if ( get_query_var( 'paged' ) ) {
				++$position;
				$tag_id = get_query_var( 'tag_id' );

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . sprintf( $link, get_tag_link( $tag_id ), single_tag_title( '', false ), $position );

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
				if ( $show_current ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
				} elseif ( $show_home_link && $show_last_sep ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
			}
		} elseif ( is_author() ) {
			$author = get_userdata( get_query_var( 'author' ) );
			if ( get_query_var( 'paged' ) ) {
				++$position;

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
				if ( $show_current ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $before . sprintf( $text['author'], $author->display_name ) . $after;
				} elseif ( $show_home_link && $show_last_sep ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $sep;
				}
			}
		} elseif ( is_404() ) {
			if ( $show_home_link && $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
			if ( $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $before . esc_html( $text['404'] ) . $after;
			} elseif ( $show_last_sep ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}
		} elseif ( has_post_format() && ! is_singular() ) {
			/**
			 * So far Haven't tested for this block yet
			 */
			if ( $show_home_link && $show_current ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $sep;
			}

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo get_post_format_string( get_post_format() );
		}

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $wrap_after;
	}
} // end class
