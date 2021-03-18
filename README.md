# Ecommerce Social Script (developed in 2020)
PHP, jQuery and MongoDB

1. Classifieds Portal (100% working)
2. Marketplace Portal with Shop Editors (some bugs, needs improvements)
3. Social Portal
in one place

Advanced Multitype Product Editor - we can make totally customized product attributes editor in HTML.
After saving the offer, the jQuery script is crawling through the field's containers, types, names and values, and "automagically" make a new JSON document saved in MongoDB.
This is what for the Mongo was used, instead of saving complicated data structures in relational DB.
1. Radio, Checkbox, Text Input, Textarea or Select fields types possible to use
2. Group of fields must be of "shoper_editor_product_line container" class.
3. Every field for crawler must be "idg" CSS class.
4. Selects, textarea and text inputs must have additional class "std_text_input"
Sample: ogloszenia/offer_editors_simple/moto.php

![schema](https://user-images.githubusercontent.com/35747845/111639435-8e5e0700-87fb-11eb-979e-f6eba8290724.png)

This is universal HTML structure to create any kind of attributes editor.
It's possible to create an "editor for editor" for admin/moderator, where HTML structure would be created from frontend forms.

Shop Page Editor with menu editor

![menu editor](https://user-images.githubusercontent.com/35747845/111639789-dc730a80-87fb-11eb-9610-eacd6298287e.png)

Automated ads buying calculator module with Polish voivodeship / county / community division from JSON file.

![adscre](https://user-images.githubusercontent.com/35747845/111640263-52777180-87fc-11eb-98d3-95ef1fd69b31.png)

Simple Social Portal with posting to few category walls.

![adscre](https://user-images.githubusercontent.com/35747845/111642981-d894b780-87fe-11eb-9105-447b9b43e24c.png)

demo https://vg.wokulski.online
login: demo@demo.demo
pass: demo12345

