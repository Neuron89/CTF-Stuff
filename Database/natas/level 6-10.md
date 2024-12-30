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

---

- ***

# level 9-10

---

- ***

# level 10-11

---

- ***
