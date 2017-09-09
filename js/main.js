( function( $ ) {
	"use strict";

	window.onload = function() {

		var textareas = document.getElementsByClassName( 'customize-editor-control' );

		for ( var i = 0; i < textareas.length; i++ ) {
			var textarea, id, options;

			textarea = textareas[ i ];
			id = textarea.getAttribute( 'id' );
			options = textarea.getAttribute( 'data-editor' ) ? JSON.parse( textarea.getAttribute( 'data-editor' ) ) : {};

			wp.editor.initialize( id, options );
		}

		setInterval( function() {
			for ( var i = 0; i < textareas.length; i++ ) {
				var textarea, id, oldValue, newValue;

				textarea = textareas[ i ];
				id = textarea.getAttribute( 'id' );
				oldValue = textarea.value;
				newValue = wp.editor.getContent( id );

				if ( oldValue == newValue ) {
					continue;
				}

				textarea.value = newValue;
				$( textarea ).trigger( 'change' );
			}
		}, 500 );
	}
})( jQuery );
