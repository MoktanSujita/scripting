<?php
  $cookie_name="user";
  $cookie_value="Jane Doe";
  $expiry=time()+(85400*7);

  setcookie($cookie_name,$cookie_value,$expiry);
  if(isset($_COOKIE[$cookie_name]))
  {
    echo"Welcome ".$_COOKIE[$cookie_name];
  }
  else
  {
    echo"please login again";
  }
?>