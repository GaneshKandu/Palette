
# LANGUAGE

To Add Your Own Language. Copy en.php and rename to your favriote language ex. {{language}}.php
and Translate all values to your Corresponding language

* change {{language}} to change language you want,
* {{language}}.php should exist in lang folder otherwise default language will be shown
* if you want to get default language you set in your browser just set it to "AUTO" and {{language}}.php should exist
* to add your language copy en.php and rename it to your language and translate all values to your language
* if you dont know what is short name of your language just go to HELP>>About section of palette and get your languages short name to rename translated file ( ex. if its en then en.php )

```php
define('LANG', 'AUTO');
```

Update Language in config.php

```php
/*

change {{language}} to change language you want
{{language}}.php should exist in lang folder otherwise default language will be shown
if you want to get default language you set in your browser just set it to "AUTO"

define('LANG', 'AUTO');

*/
define('LANG', '{{language}}');

```

