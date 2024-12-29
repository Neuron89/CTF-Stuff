Natas walkthrough

---

# level 0-1

---

empty webpage with a button. button is listed as a moveable object. tried moving it to see if anything was under its location. after learning that ther wasnt anything there, inspected the source code for the button itself. password was hidden inside the buttons source code.

---

# level 1-2

---

this level didnt allow for you to be able to right click. you had to open the page inspection and then make your way over to the button, view the source code for the button, and then you would find the password.

---

# level 2-3

---

there isnt anything on the page and the button is no longer the source of the password. there IS an image on the site. they use a PNG file the period at the end of the
` there is nothing on this page`
this leads me to belive that the password is hidden in the image. i have viewed the source code for that image and found nothing. if this was much higher levels, i would think maybe some stegonography but i doubt there is a substantial jump in diffuclty.

after reviewing the image, i realized there wasnt anything there but there WAS a folder inwhich the image was stored called "files". using that path, i found a file called "users.txt". In that file was all the users login info including the password.

---

# level 3-4

---

when inspecting the page they had a hidden comment about "not even google can find this". this made me wonder about how google finds things. when I had made my own website i added the "robots.txt" file. this was reccomended to reduce load but it was expressed that it wouldnt allow things like google to access this file. after remembering a little bit about how that worked and then researching more about it, i went to the extension

```
/robots.txt
```

which brought me to the text file with a "disallow: /s3cr3t/". Typed this in to the extension and bobs your uncle, password is listed.

---

# level 4-5

---

---

# level 5-6

---
