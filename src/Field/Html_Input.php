<?php
namespace W4dev\Wpform\Field;

class Html_Input extends Field
{
	public function __construct($data = [])
    {
		$data['type'] = 'html_input';
		parent::__construct($data);
	}
	public function get_html($form)
    {
		$data = $this->sanitize_data($this->data);
		extract($data);

		$html = $before;

		if ($field_wrap){
			$html .= sprintf('<div class="%1$s"%2$s>', $this->form_pitc_class('wf-field-wrap', $id, $type, $class), $attr);
		}

		$html .= $field_before;
			// label
			$html .= $label_wrap_before;
			$html .= $this->form_field_label($data);

			// description
			if (! empty($desc)){
				$html .= sprintf('<div class="%1$s">%2$s</div>', $this->form_pitc_class('wf-field-desc-wrap', $id, $type), $desc);
			}

			// input
			$html .= $input_wrap_before;
			if ($input_wrap){
				$html .= sprintf('<div class="%1$s %2$s"%3$s>', $this->form_pitc_class('wf-field-input-wrap', $id, $type), $input_wrap_class, $input_wrap_attr);
			}
			$html .= $input_before;
			$html .= $input_html;
			$html .= $input_after;
			if ($input_wrap){
				$html .= '</div>';
			}

		$html .= $field_after;
		
		if (isset($desc_after)){
			if (! empty($desc_after)){
				$html .= sprintf('<div class="%1$s">%2$s</div>', $this->form_pitc_class('wf-field-desc-after-wrap', $id, $type), $desc_after);
			}
		}

		if ($field_wrap){
			$html .= '</div>';
		}

		return $html;
	}
}

?>