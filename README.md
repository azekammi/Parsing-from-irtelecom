# Parsing-from-irtelecom
This program doing parsing from "irtelecom.az". It takes all telephone and tablet products and puts them to the table "products", of the schema "irshad". You can use it as example base for your projects.

It is important to create tables in schema "irshad": 
                                <br>-  "products" with columns "product_name", "category_id", "image_path", "product_price", "mark_id", "product_description", "product_color", "product_operaiting_system". May don't have lines;
                                -  "categories" with columns: "id" and "category_name". It has 2 lines: "Telephones" and "Tablets";
                                -  "marks" with columns: "id" and "mark_name". It has 10 lines: "Alcatel", "Apple", "Asus", "Blackberry", 
                                                                                                "HTC", "Keneksi", "Meizu", "Philips", 
                                                                                                 Samsung", "Xiaomi".
                                                                                                 
Program takes "product_name", "category_id", "image_path", "product_price", "mark_id", "product_description", "product_color", "product_operaiting_system" to table "products".
