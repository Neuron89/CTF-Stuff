# level 6-7

This level provides you with a input box

```
Wrong secret
Input secret:
```

it also gives you a button to view the source code. when you click on the source code you get

```
<?

include "includes/secret.inc";

    if(array_key_exists("submit", $_POST)) {
        if($secret == $_POST['secret']) {
        print "Access granted. The password for natas7 is <censored>";
    } else {
        print "Wrong secret";
    }
    }
?>
```

the place to focus in this is the `includes/secret.inc`. since the file secret is what holds the `secret`, we can first look into if that file is accessible. adding that domain extension `http://natas6.natas.labs.overthewire.org/includes/secret.inc` we get the following

```
<?
$secret = "FOEIUWGHFEEUHOFUOIU";
?>
```

taking this password and then putting it into the text box on the main page and we get the password.

---

# level 7-8

looking at this level, we get two buttons `home` and `about`. they bring us to two different pages. both pages look the same with a small description. when we look at the source code we get

```
</h1>
<div id="content">

<a href="index.php?page=home">Home</a>
<a href="index.php?page=about">About</a>
<br>
<br>
this is the about page

<!-- hint: password for webuser natas8 is in /etc/natas_webpass/natas8 -->
</div>
</body>
</html>
```

the hint points us at the file path. when we enter in the file path as a URL extension, we get a failure. when ispecting the URL when you press either of the buttons, we get

```
http://natas7.natas.labs.overthewire.org/index.php?page=home
```

its that `index.php?page=home` thats interesting. with future research and understanding how websites work, we know that index.php is our main page. the `page=home` is a refrence point on that `index.php`.

if we take the file path that we know `/etc/natas_webpass/natas8` and add it as the extension, it does nothing. if we add is at a page `index.php?page=/etc/natas_webpass/natas8` then we get our password.

- ***

# level 8-9

this is another level where you have to input the secrect and you have access to the source code. the section of code we need to look at it :

```
<?

$encodedSecret = "3d3d516343746d4d6d6c315669563362";

function encodeSecret($secret) {
    return bin2hex(strrev(base64_encode($secret)));
}

if(array_key_exists("submit", $_POST)) {
    if(encodeSecret($_POST['secret']) == $encodedSecret) {
    print "Access granted. The password for natas9 is <censored>";
    } else {
    print "Wrong secret";
    }
}
?>
```

looking at this, its very similar to level 6-7. the big differenece is we dont have access to the file with the password but we do have the encoded secret. to solve this we fisrt need to convert this back to a binary, then reverse it, then decode the base64 string. we start with converting it back to binary. for this we will refrence the hexcode placed in a file called `code`. we will cat each output to show what happened

```bash
xxd -r -p code >> code_binary | cat code_binary
==QcCtmMml1ViV3b

# then we take this new file and reverse it

rev code_binary >> code_rev | cat code_rev
b3ViV1lmMmtCcQ==

# we then take this and decode using the base 64

base64 -d code_rev >> code_decode | cat code_decode
oubWYf2kBq
```

now we have the secret. we take this secret and input it in the text box which then gives us the password for the next level.

we can also use one line that would look like this

```bash
xxd -r -p code >> code_binary | rev code_binary >> code_rev | base64 -d code_rev >> code_decode
```

- ***

# level 9-10

- ***

# level 10-11

- ***
