<?php 
function bgs_filter_movie_post_content( $content ) {
	
	// https://codex.wordpress.org/Function_Reference/is_singular
	if( !is_singular('movie') ){
		return $content;
	}
	global $post, $wpdb;
	$movie_data = get_post_meta( $post->ID, 'movie_data', true );
	$movie_html = file_get_contents( 'movie-placeholder.php', true );

	$movie_html = str_replace("DIRECTOR_PLACEHOLDER", $movie_data['director'], $movie_html);
	$movie_html = str_replace("WRITER_PLACEHOLDER", $movie_data['writer'], $movie_html);
	$movie_html = str_replace("STARS_PLACEHOLDER", $movie_data['stars'], $movie_html);
	$movie_html = str_replace("TAGLINE_PLACEHOLDER", $movie_data['tagline'], $movie_html);
	$movie_html = str_replace("KEYWORDS_PLACEHOLDER", $movie_data['keywords'], $movie_html);
	$movie_html = str_replace("GENRE_PLACEHOLDER", $movie_data['genres'], $movie_html);
	$movie_html = str_replace("AUDIENCE_PLACEHOLDER", $movie_data['audience'], $movie_html);
	$movie_html = str_replace("CERTIFICATE_PLACEHOLDER", $movie_data['certificate'], $movie_html);

	// Internationalize strings
	$movie_html = str_replace("DIRECTOR_I18N", __("Director", "bg-movies"), $movie_html);
	$movie_html = str_replace("WRITER_I18N", __("Writer", "bg-movies"), $movie_html);
	$movie_html = str_replace("STARS_I18N", __("Stars", "bg-movies"), $movie_html);
	$movie_html = str_replace("TAGLINE_I18N", __("Tagline", "bg-movies"), $movie_html);
	$movie_html = str_replace("KEYWORDS_I18N", __("Key words", "bg-movies"), $movie_html);
	$movie_html = str_replace("GENRE_I18N", __("Genre", "bg-movies"), $movie_html);
	$movie_html = str_replace("AUDIENCE_I18N", __("Audience", "bg-movies"), $movie_html);
	$movie_html = str_replace("CERTIFICATE_I18N", __("Certificate", "bg-movies"), $movie_html);
	$movie_html = str_replace("RATE_I18N", __("Leave your Rating", "bg-movies"), $movie_html);
	$movie_html = str_replace("AVERAGE_I18N", __("Average Rating", "bg-movies"), $movie_html);

	$movie_html = str_replace("MOVIE_ID", $post->ID, $movie_html);
	$movie_html = str_replace("VIEWER_RATING", $movie_data['average_rating'], $movie_html);

	return $movie_html . $content;
}
?>