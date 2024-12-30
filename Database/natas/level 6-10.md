# level 6-7

---

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

---

- ***

# level 8-9

---

- ***

# level 9-10

---

- ***

# level 10-11

---

- ***
