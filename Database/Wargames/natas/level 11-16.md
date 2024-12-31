level 11-12

This one gets a bit more interesting. we started to see the use of another type of encrpytion using **_XOR_**. It also uses some color codes as an input method. weather this is the key is unknown right now.

```
<?

$defaultdata = array( "showpassword"=>"no", "bgcolor"=>"#ffffff");

function xor_encrypt($in) {
    $key = '<censored>';
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}

function loadData($def) {
    global $_COOKIE;
    $mydata = $def;
    if(array_key_exists("data", $_COOKIE)) {
    $tempdata = json_decode(xor_encrypt(base64_decode($_COOKIE["data"])), true);
    if(is_array($tempdata) && array_key_exists("showpassword", $tempdata) && array_key_exists("bgcolor", $tempdata)) {
        if (preg_match('/^#(?:[a-f\d]{6})$/i', $tempdata['bgcolor'])) {
        $mydata['showpassword'] = $tempdata['showpassword'];
        $mydata['bgcolor'] = $tempdata['bgcolor'];
        }
    }
    }
    return $mydata;
}

function saveData($d) {
    setcookie("data", base64_encode(xor_encrypt(json_encode($d))));
}

$data = loadData($defaultdata);

if(array_key_exists("bgcolor",$_REQUEST)) {
    if (preg_match('/^#(?:[a-f\d]{6})$/i', $_REQUEST['bgcolor'])) {
        $data['bgcolor'] = $_REQUEST['bgcolor'];
    }
}

saveData($data);



?>

<h1>natas11</h1>
<div id="content">
<body style="background: <?=$data['bgcolor']?>;">
Cookies are protected with XOR encryption<br/><br/>

<?
if($data["showpassword"] == "yes") {
    print "The password for natas12 is <censored><br>";
}

?>
```

It mentions that cookies are encrpyted using XOR. Using BurpSuite and looking at the request, we see the following

```

Referer: http://natas11.natas.labs.overthewire.org/?bgcolor=%23Fe0000
Accept-Encoding: gzip, deflate, br
Cookie: data=HmYkBwozJw4WNyAAFyB1VUcqOE1JZjUIBis7ABdmbU1GAjJfVXRnTRg%3D
Connection: keep-alive
```

we see the cookie with the encryption. we now need to look for the key so we can decrypt the xor encrpytion. my first idea is to use burpsuite intruder to inject my own payload. i wrote a script that takes the cookie and decodes it based on the paramaters.

```
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
```

working my way through, this should provide us with the answer when injected into the site.

---

level 12-13

---

level 13-14

---

level 14-15

---

level 15-16

---
