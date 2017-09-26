<?php
//Validations
class Validation
{
    public $errors = array();
    public function validate($data, $rules)
    {

        $valid = true;

        foreach ($rules as $fieldname => $rule)
        {
            $callbacks = explode('|', $rule);

            foreach ($callbacks as $callback)
            {
                $value = isset($data[$fieldname]) ? $data[$fieldname] : null;
                if ($this->$callback($value, $fieldname) == false)
                    $valid = false;
            }
        }
        return $valid;

    }

    public function email($value, $fieldname)
    {
        $valid = filter_var($value, FILTER_VALIDATE_EMAIL);
        if ($valid == false)
            $this->errors[] = "The $fieldname needs to be a valid email
            address";
        return $valid;

    }

    public function required   ($value, $fieldname)
    {
        $valid = !empty($value);
        if ($valid == false)
            $this->errors[] = ucwords($fieldname). " is required";
        return $valid;

    }
    public function notrequired($value, $fieldname)
    {
        $valid = empty($value);
        if ($valid == true)
            $this->errors[] = "The $fieldname is optional";
        return $valid;

    }

    public function example_phone($value, $fieldname)
    {
        $whitelist = '/^[0-9+]+$/';

        //if($valid1 == FALSE) $this->errors[] = "Wrong Phone number";
        //if(!is_int($value)) $this->errors[] = "The $fieldname number is wrong";

        //$valid = $whitelist;
        $valid = preg_match($whitelist, $value);

        if ($valid == false)
            $this->errors[] = "The $fieldname was not a valid phone number";
        return $valid;


    }

    public function datetime($value, $fieldname)
    {
        $whitelist = '/^[0-9a-zA-Z \.\s:\-]+$/';

        //if($valid1 == FALSE) $this->errors[] = "Wrong Phone number";
        //if(!is_int($value)) $this->errors[] = "The $fieldname number is wrong";

        //$valid = $whitelist;
        $valid = preg_match($whitelist, $value);

        if ($valid == false)
            $this->errors[] = "The $fieldname number was not a valid phone number";
        return $valid;


    }

    public function amount($value, $fieldname)
    {
        $whitelist = '/^[0-9]+$/';

        //if($valid1 == FALSE) $this->errors[] = "Wrong Phone number";
        //if(!is_int($value)) $this->errors[] = "The $fieldname number is wrong";

        //$valid = $whitelist;
        $valid = preg_match($whitelist, $value);

        if ($valid == false)
            $this->errors[] = "The $fieldname was not valid";
        return $valid;


    }

    public function name($value, $fieldname)
    {
        $whitelist = '/^[a-zA-Z ]+$/';

        //if($valid1 == FALSE) $this->errors[] = "Wrong Phone number";
        //if(!is_int($value)) $this->errors[] = "The $fieldname number is wrong";

        //$valid = $whitelist;
        $valid = preg_match($whitelist, $value);

        if ($valid == false)
            $this->errors[] = "The $fieldname should be alphabets Only";
        return $valid;

    }

    public function name_user($value, $fieldname)
    {
        $whitelist = '/^[0-9a-zA-Z]+$/';

        //if($valid1 == FALSE) $this->errors[] = "Wrong Phone number";
        //if(!is_int($value)) $this->errors[] = "The $fieldname number is wrong";

        //$valid = $whitelist;
        $valid = preg_match($whitelist, $value);

        if ($valid == false)
            $this->errors[] = ucwords($fieldname)." contains invalid characters {alphabets
            & numbers accepted}";
        return $valid;

    }

    public function text($value, $fieldname)
    {
        $whitelist = '/^[0-9a-zA-Z ,\.\'\"\/+\s;:\?\[\]!_\-@]+$/';

        //if($valid1 == FALSE) $this->errors[] = "Wrong Phone number";
        //if(!is_int($value)) $this->errors[] = "The $fieldname number is wrong";

        //$valid = $whitelist;
        $valid = preg_match($whitelist, $value);

        if ($valid == false)
            $this->errors[] = ucwords($fieldname)." is empty or contains invalid
            characters";
        return $valid;

    }
     public function url($value, $fieldname)
    {

        //if($valid1 == FALSE) $this->errors[] = "Wrong Phone number";
        //if(!is_int($value)) $this->errors[] = "The $fieldname number is wrong";

        //$valid = $whitelist;
        $valid =  mysql_real_escape_string($value);

        if ($valid == false)
            $this->errors[] = ucwords($fieldname)." is empty or contains invalid
            characters";
        return $valid;

    }

    public function name_subject($value, $fieldname)
    {
        $whitelist = '/^[a-zA-Z ]+$/';

        //if($valid1 == FALSE) $this->errors[] = "Wrong Phone number";
        //if(!is_int($value)) $this->errors[] = "The $fieldname number is wrong";

        //$valid = $whitelist;
        $valid = preg_match($whitelist, $value);

        if ($valid == false)
            $this->errors[] = "The $fieldname is not selected, 
            Please {Select One}";
        return $valid;

    }

    public function options($optionname)
    {
        $valid = !isset($optionname);
        if ($valid == false)
            $this->errors[] = "No option selected";
        return $valid;

    }


}