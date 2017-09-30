<?php
function bgs_movie_submission_shortcode() {
	$submissionHTML  = file_get_contents( 'submission-template.php', true );
	$editorHTML		 = bgs_add_wysiwyg_editor();
	$submissionHTML	 = str_replace( 'WYSIWYG_EDITOR', $editorHTML, $submissionHTML );
	return $submissionHTML;
}

function bgs_add_wysiwyg_editor() {
	ob_start();
	wp_editor( '',  'moviecontenteditor' ); // tiny MCE editor for form, will replace the textarea in form with PHP buffer
	// https://codex.wordpress.org/Function_Reference/wp_editor
	$editor_contents = ob_get_clean();
	return $editor_contents;
}
?>