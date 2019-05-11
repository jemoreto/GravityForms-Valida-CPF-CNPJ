<?php 

/**
 *
 * Plugin Name: Gravity Forms Validação CPF CNPJ
 * Description: Plugin que habilita a validação de CPF e CNPJ
 * Author: JP Tibério [com contribuição de John (João Elton Moreto)]
 * 
 */

/* 
 * Adaptado por John (João Elton Moreto) - https://gist.github.com/jemoreto
 * Ver o README para detalhes.
 * Original em: https://github.com/jptiberio/GravityForms-Valida-CPF-CNPJ
 */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

require 'class-valida-cpf-cnpj.php';

if ( is_plugin_active('gravityforms/gravityforms.php') ) {


	add_filter("gform_validation", "custom_validation");
	function custom_validation( $validation_result){

		$form = $validation_result['form'];

		foreach( $form['fields'] as $field ) {


			if ( strpos( $field->cssClass, 'validar_cpf_cnpj' ) !== false ) {
				
				$msg_validacao = 'CPF ou CNPJ inválido';
				if ( strpos( $field->cssClass, 'tipo_cpf' ) !== false ) {
					$msg_validacao = 'CPF inválido';
				}
				if ( strpos( $field->cssClass, 'tipo_cnpj' ) !== false ) {
					$msg_validacao = 'CNPJ inválido';
				}
				
				// Checa se o campo está oculto pela condicional lógica do GF
				$is_hidden = RGFormsModel::is_field_hidden( $form, $field, array() );
				if ($is_hidden) {
					continue;
				}
				
				$field_value = rgpost( 'input_'.$field->id );
				
				if (isset($cpf_cnpj)) {
					unset($cpf_cnpj);
				}

				$cpf_cnpj = new ValidaCPFCNPJ($field_value);

				if (!empty($cpf_cnpj)) {

					$validado = $cpf_cnpj->valida();

					if ( $validado != true ) {

			            $field->validation_message = $msg_validacao;

			        	$validation_result['is_valid'] = false;

			            $field->failed_validation = true;
					}

				} else {

		            $field->validation_message = $msg_validacao;

		        	$validation_result['is_valid'] = false;

		            $field->failed_validation = true;
				}
							    
			}

	    }

	    $validation_result['form'] = $form;

		return $validation_result;

	}

} else {

	function pls_activate_gforms() {
	    ?>
	    <div class="error notice">
	        <p><?php _e( 'Por favor, instale ou ative o Gravity Forms!', 'my_plugin_textdomain' ); ?></p>
	    </div>
	    <?php
	}
	
	add_action( 'admin_notices', 'pls_activate_gforms' );
}


?>
