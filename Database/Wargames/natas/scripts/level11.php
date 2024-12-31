<?php
function xor_encrypt($in) {
    $text = $in;
    $outText = '';
    
    // Get the encrypted cookie (base64 decoded)
    $cookie = base64_decode("HmYkBwozJw4WNyAAFyB1VUcqOE1JZjUIBis7ABdmbU1GAjJfVXRnTRg=");
    
    // Get the original JSON data
    $defaultdata = array( "showpassword"=>"no", "bgcolor"=>"#ffffff");
    $originalText = json_encode($defaultdata);
    
    // XOR the encrypted data with the original text to get the key
    for($i = 0; $i < strlen($originalText); $i++) {
        $outText .= $cookie[$i] ^ $originalText[$i];
    }
    
    return $outText;
}

// Find the key
$key = xor_encrypt("");
echo "The key is: " . $key . "\n";

// Verify the key works
$defaultdata = array( "showpassword"=>"yes", "bgcolor"=>"#ffffff");
$encoded = base64_encode(xor_encrypt(json_encode($defaultdata)));
echo "New cookie to use: " . $encoded . "\n";
?>

