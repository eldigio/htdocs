<?php

namespace class;

class Validator
{

  public static function checkEmpty($value): bool
  {
    if (empty($value) or $value = "") return true;
    return false;
  }

  public static function validateEmail($email): bool
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
    return false;
  }

  public static function validatePassword($password): bool
  {
    if (!(mb_strlen($password) >= 8 and mb_strlen($password) <= 60)) return true;
    return false;
  }
}
