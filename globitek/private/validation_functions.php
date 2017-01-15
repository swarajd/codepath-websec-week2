<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    // Function can be improved later to check for
    // more than just '@'.
    return strpos($value, '@') !== false;
  }

  function has_valid_phone_format($value) {
    return preg_match('/^[0-9()\- ]+$/', $value) === 1;
  }

  function has_valid_name_format($value) {
    return preg_match('/^[a-zA-Z]+$', $value) === 1;
  }

  function has_valid_numeric_format($value) {
    return preg_match('/^[0-9]+$/', $value) === 1;
  }

  function has_valid_code_format($value) {
    return preg_match('/^[A-Z]+$/', $value) === 1;
  }

?>
