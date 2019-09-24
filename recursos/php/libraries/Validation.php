<?php

class Validation {
    
    
    public function __construct() {
		
    }


    /**
	 * Valid Email
	 *
	 * @param	string
	 * @return	bool
	 */
	public function valid_email($str)
	{
		if (function_exists('idn_to_ascii') && sscanf($str, '%[^@]@%s', $name, $domain) === 2)
		{
			$str = $name.'@'.idn_to_ascii($domain);
		}
        
		return (bool) filter_var($str, FILTER_VALIDATE_EMAIL);
	}

    public function required($str){
		return is_array($str)
			? (empty($str) === FALSE)
			: (trim($str) !== '');
    }

    /**
	 * Is Unique
	 *
	 * Check if the input value doesn't already exist
	 * in the specified database field.
	 *
	 * @param	string	$str
	 * @param	string	$field
	 * @return	bool
	 */
	public function is_unique($str, $field)
	{
        //Sobreescribir para validar que no exita un registro en la base de datos 
		/*sscanf($field, '%[^.].%[^.]', $table, $field);
		return isset($this->CI->db)
			? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() === 0)
			: FALSE;*/
	}
    
    public function alpha_accent_space($str) {
        $exp = '/^[\p{L}\- ]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    public function alpha_numeric_accent_space($str) {
        $exp = '/^[\p{L}\-0123456789 ]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    public function alpha_numeric_accent_space_dot($str) {
        $exp = '/^[\p{L}\-0123456789,. \s]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    /**/

    public function alpha_accent_space_dot_quot($str) {
        $exp = '/^[\p{L}\-,.\s]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    public function alpha_numeric_accent_slash($str) {
        $exp = '/^[\p{L}\-0123456789.\/]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    public function alpha_numeric_accent_space_dot_parent($str) {
        $exp = '/^[\p{L}\-0123456789,.:\(\)\/\s]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    public function alpha_numeric_accent_space_dot_double_quot($str) {
        $exp = '/^[\p{L}\-0123456789,.:\(\)\/\s]*$/u';
        //$exp = '/^[\p{L}-0123456789,.:;\'\"\(\)\/\s]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    public function exists_a_number($str) {
        $exp = '/^[0123456789,]+*$/u';
        //$exp = '/^[\p{L}-0123456789,.:;\'\"\(\)\/\s]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    public function exists_a_uppercase($str) {
        $exp = '/^[A-Z,]*$/u';
        //$exp = '/^[\p{L}-0123456789,.:;\'\"\(\)\/\s]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    public function exists_a_lowercase($str) {
        $exp = '/^[a-z,]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    public function exists_a_aspecial_character($str) {
        $exp = '/^[%$#,]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    public function exists_a_aspecial_character_password($str) {
        $exp = '/^[*\/_+-,]*$/u';
        return (!preg_match($exp, $str)) ? FALSE : TRUE;
    }

    /**
	 * Minimum Length
	 *
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	public function min_length($str, $val)
	{
		if ( ! is_numeric($val))
		{
			return FALSE;
		}

		return ($val <= mb_strlen($str));
	}

    /**
	 * Max Length
	 *
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	public function max_length($str, $val)
	{
		if ( ! is_numeric($val))
		{
			return FALSE;
		}

		return ($val >= mb_strlen($str));
	}

	// --------------------------------------------------------------------

	/**
	 * Exact Length
	 *
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	public function exact_length($str, $val)
	{
		if ( ! is_numeric($val))
		{
			return FALSE;
		}

		return (mb_strlen($str) === (int) $val);
	}

	// --------------------------------------------------------------------

	/**
	 * Valid URL
	 *
	 * @param	string	$str
	 * @return	bool
	 */
	public function valid_url($str){
		if (empty($str))
		{
			return FALSE;
		}
		elseif (preg_match('/^(?:([^:]*)\:)?\/\/(.+)$/', $str, $matches))
		{
			if (empty($matches[2]))
			{
				return FALSE;
			}
			elseif ( ! in_array(strtolower($matches[1]), array('http', 'https'), TRUE))
			{
				return FALSE;
			}

			$str = $matches[2];
		}

		// PHP 7 accepts IPv6 addresses within square brackets as hostnames,
		// but it appears that the PR that came in with https://bugs.php.net/bug.php?id=68039
		// was never merged into a PHP 5 branch ... https://3v4l.org/8PsSN
		if (preg_match('/^\[([^\]]+)\]/', $str, $matches) && ! is_php('7') && filter_var($matches[1], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== FALSE)
		{
			$str = 'ipv6.host'.substr($str, strlen($matches[1]) + 2);
		}

		return (filter_var('http://'.$str, FILTER_VALIDATE_URL) !== FALSE);
	}
}