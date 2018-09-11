# Voyager Advanced Support
advanced file options : https://voyager.readme.io/docs/additional-field-options


Actions : create custom buttons per row on bread items.


These are some snippets that might be of use when creating Voyager bread entries.



Adding BSdatetime...
Download the formfield and view files
app/Formfields/BSDateTimeFormField.php
app/resources/views/formfields/bsdatetime.blade.php


Edit app/Providers/AppServiceProvider.php

 add :
         Voyager::addFormField(BSDateTimeFormField::class);
         
 to: boot()
 
 
Change database field to DATETIME, or change the code to work with timestamps.
