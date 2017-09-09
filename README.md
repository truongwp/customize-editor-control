# Customize Editor Control

This plugin provides WordPress editor (WYSIWYG) to Customize. It's easy to use like core controls and works well in both `refresh` and `postMessage` transport.

## Usage

```php
function themeslug_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'example', array(
		'transport' => 'postMessage',
		'default' => 'Lotem ipsum',
	) );

	$wp_customize->add_control( new WP_Customize_Editor_Control( $wp_customize, 'example', array(
		'label' => __( 'Example editor', 'textdomain' ),
		'section' => 'title_tagline',
		'editor_settings' => array(
			'quicktags' => true,
			'tinymce'   => true,
		),
	) ) );
}
add_action( 'customize_register', 'themeslug_customize_register' );
```
