<?php
/**
 * Editor control class
 *
 * @package Customize_Editor_Control
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	include ABSPATH . WPINC . '/class-wp-customize-control.php';
}

/**
 * Class WP_Customize_Editor_Control
 */
class WP_Customize_Editor_Control extends WP_Customize_Control {

	/**
	 * Control's Type.
	 *
	 * @since 3.4.0
	 * @var string
	 */
	public $type = 'editor';

	/**
	 * Constructor.
	 *
	 * Supplied `$args` override class property defaults.
	 *
	 * If `$args['settings']` is not defined, use the $id as the setting ID.
	 *
	 * @since 3.4.0
	 *
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string               $id      Control ID.
	 * @param array                $args    Optional. Arguments to override class property defaults.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );

		if ( ! empty( $args['editor_settings'] ) ) {
			$this->input_attrs['data-editor'] = wp_json_encode( $args['editor_settings'] );
		}
	}

	/**
	 * Render the control's content.
	 *
	 * @since 3.4.0
	 */
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea class="customize-editor-control" id="customize-editor-control-<?php echo intval( $this->instance_number ); ?>" <?php $this->input_attrs(); ?> <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		</label>
		<?php
	}

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {
		wp_enqueue_editor();
		wp_enqueue_script(
			'customize-editor-control',
			plugins_url( 'js/main.js', dirname( __FILE__ ) ),
			array(
				'editor',
			),
			'1.0.0',
			true
		);
	}
}
