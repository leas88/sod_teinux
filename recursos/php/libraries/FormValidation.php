<?php
	include 'libraries/Validation.php';
	include 'language/form_validation_lang.php';

class FormValidation{
		
	private $validationLibrary ;
	private $message;
	private $arrayValidaciones;
	private $messagesText = [];

    public function __construct() {
		$this->validationLibrary = new Validation();
		$language = new form_validation_lang();
		$this->message = $language->getMessage();
		$this->messagesTexts = [];
        //print_r( $this->message);
    }

	/**
	 * $arrayValidaciones 
	 * [
	 * 	[
		* 	'fieldKey'=>'',
		* 	'fieldText'=>'',
		* 	'rules' =>'required|valid_email',
	 * 	],
	 *  [
		* 	'fieldKey'=>[],
		* 	'fieldText'=>[],
		* 	'rules' =>[required|valid_email],
	 * 	],
	 * ]
	 */
	public function setValidaciones($arrayValidaciones){
		$this->arrayValidaciones = $arrayValidaciones;
	}

	public function run($arrayData){
		//print_r($arrayData);
		return $this->analyzer($arrayData);
	}

	private function analyzer($arrayData){		
		foreach ($this->arrayValidaciones as $key => $value) {
			if(isset($arrayData[$value['fieldKey']])){
				$result = $this->analyzerRules($arrayData[$value['fieldKey']], $value['rules'], $value['fieldText']);
				if($result!=null){
					$this->messagesTexts[$arrayData[$value['fieldKey']]] = $result;
				}
			}
		}
		return empty($this->messagesTexts);
	}
	
	private function analyzerRules($data, $rules, $text){
	
		if(strpos($rules, '|') === false){
			if($this->IsSubValueSquare($rules)){
				//$rules.
				$param = $this->subStringMiddel($rules);
				$rules = explode('[',$rules)[0];
				$result = $this->validationLibrary->{$rules}($data,$param);
				if(!$result){
					return $this->getMessageLanguage($rules, $text, $param);
				}
			}else{
				$result = $this->validationLibrary->{$rules}($data);
				if(!$result){
					return $this->getMessageLanguage($rules, $text);
				}
			}
			
		}else{
			$split = explode('|',$rules);
			foreach ($split as $value) {
				
				if($this->IsSubValueSquare($value)){
					$param = $this->subStringMiddel($value);
					$value = explode('[',$value)[0];
					$result = $this->validationLibrary->{$value}($data,$param);
					if(!$result){
						return $this->getMessageLanguage($value, $text, $param);
					}
				}else{
				
					$result = $this->validationLibrary->{$value}($data);
					if(!$result){
						return $this->getMessageLanguage($value, $text);
					}	
				}
			}
		}
		
		return null;
	}

	private function IsSubValueSquare($str){
		//$exp = '/^[\.]+*$/u';
		//return !preg_match($exp, $str);
		return (strpos($str, '[') !== false && strpos($str, ']') !== false);
	}

	private function subStringMiddel($str){
		$init = strpos($str, '[') + 1;
		$end = strpos($str, ']');
		$string = substr($str, $init, ($end-$init));
		return $string;
	}

    /*
     *$keyMessage Llave del mensaje solicitado
        retorna el mensaje solicitado, si existe en el listado de validaciones
     */
    private function getMessageLanguage($keyMessage, $field = null, $param = null){
        if(!is_null($keyMessage) && isset($this->message["form_validation_".$keyMessage])){
            $message  = $this->message["form_validation_".$keyMessage];
            if(!is_null($field)){
                $message = str_replace("{field}", $field, $message);
			}
			if(!is_null($param)){
                $message = str_replace("{param}", $param, $message);
            }
            return $message;
        }else{
            return null;
        }
	}
	
	public function getMessagesTexts(){
		return $this->messagesTexts;
	}

}