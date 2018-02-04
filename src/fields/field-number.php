<?php
class SF_Field_Number extends SF_Field {
	function __construct( $data = array() ) {
		$data['type'] = 'number';
		parent::__construct( $data );
	}
	public function form_field_html(){
		$data = $this->sanitize_data( $this->data );
		extract( $data );

		$html = $before;

		if( $field_wrap ){
			$html .= sprintf( '<div class="%1$s"%2$s>', $this->form_pitc_class('sffw', $id, $type, $class), $attr );
		}

		$html .= $field_before;
			// label
			$html .= $label_wrap_before;
			$html .= $this->form_field_label( $data );

			// description
			if( ! empty($desc) ){
				$html .= sprintf( '<div class="%1$s">%2$s</div>', $this->form_pitc_class('sffdw', $id, $type), $desc );
			}

			// input
			$html .= $input_wrap_before;
			if( $input_wrap ){
				$html .= sprintf( '<div class="%1$s %2$s"%3$s>', $this->form_pitc_class('sffew', $id, $type), $input_wrap_class, $input_wrap_attr );
			}
			$html .= $input_before;
			$html .= sprintf( 
				'<input class="%1$s %5$s" id="%2$s" name="%3$s" value="%4$s" type="%7$s"%6$s />', 
				$this->form_pitc_class('sff', $id, $type), $id, $name, $value, $input_class, $input_attr, $type
			);
			$html .= $input_after;
			if( $input_wrap ){
				$html .= '</div>';
			}

		$html .= $field_after;
		
		if( isset($desc_after) ){
			if( ! empty($desc_after) ){
				$html .= sprintf( '<div class="%1$s">%2$s</div>', $this->form_pitc_class('sffdaw', $id, $type), $desc_after );
			}
		}

		if( $field_wrap ){
			$html .= '</div>';
		}

		return $html;
	}
	function get_html(){
		return $this->form_field_html();
	}
	function render(){
		echo $this->get_html();
	}
}

?>