# Ecommerce Social Script
PHP, jQuery and MongoDB

1. Classifieds Portal (100% working)
2. Marketplace Portal with Shop Editors (some bugs, needs improvements)
3. Social Portal
in one place

Advanced Multitype Product Editor - we can make totally customized product attributes editor in HTML.
After saving the offer, the jQuery script is crawling through the field's containers, types, names and values, and automagically make a new JSON document saved in MongoDB.
This is what for the Mongo was used, instead of saving complicated data structures in relational DB.
1. Radio, Checkbox, Text Input, Textarea or Select fields types possible to use
2. Group of fields must be of "shoper_editor_product_line container" class.
3. Every field for crawler must be "idg" CSS class.
4. Selects, textarea and text inputs must have additional class "std_text_input"
Sample: ogloszenia/offer_editors_simple/moto.php

It's possible to create an "editor for editor" for admin/moderator,
that creates HTML layout file for new product editor.

Shop Page Editor with menu editor

Automated ads buying module with Polish voivodeship / county / community division.

Simple Social Portal with posting to few category walls.

demo https://vg.wokulski.online

