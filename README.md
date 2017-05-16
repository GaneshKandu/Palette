[![GitHub Stars](https://img.shields.io/github/stars/GaneshKandu/Palette.svg)](https://github.com/GaneshKandu/Palette/stargazers)
[![GitHub Issues](https://img.shields.io/github/issues/GaneshKandu/Palette.svg)](https://github.com/GaneshKandu/Palette/issues) 
[![Releases](https://img.shields.io/github/release/GaneshKandu/Palette.svg)](https://github.com/GaneshKandu/Palette/releases) 

### Palette is a freehand CMS which allows to construct websites directly in a web-browser. It uses flat files for storage and provides an intuitive GUI

# Palette

Palette is a freehand CMS which allows to construct websites directly in a web-browser. It uses flat files for storage and provides an intuitive GUI

# Getting Started

+ [Prerequirement](#prerequirement)
+ [Installation](#installation)
+ [Installation using git](#installation-using-git)
+ [Sreenshots](https://github.com/GaneshKandu/Palette/blob/master/SCREENSHOTS.md)
+ [Language](https://github.com/GaneshKandu/Palette/blob/master/lang/LANGUAGE.md)
+ [Main Developer](#main-developers)
+ [Feature](#feature)
+ [MultiSite](#multisite)
+ [Third Party Components](#third-party-components)
+ [Main Developers](#main-developers)

# Prerequirement
## PHP Version

* PHP 5.3+

## Extension

* gd
* zip

## Mod Rewrite

* ``` mod_rewrite ``` should be enabled for friendly ``` URL ```

# Installation

Create Folder

* thumbs/
* sites/
* .palette/

Give a Writable Permission on
* config/
* .palette
* thumbs/
* sites/
* logs/error.log
* .htaccess

and open install.php in you Browser

# Installation using git

```sh
$ #installing Palette
$ git clone https://github.com/GaneshKandu/Palette.git
$ cd Palette
$ mkdir thumbs sites .palette
$ chmod -R 777 thumbs sites config logs/error.log .htaccess .palette
$ sudo chown -R www-data:www-data ../Palette
```
and open install.php in you Browser

# Feature

* Easy to Use
* Support of multiple languages
* Easy Customizing options
* Live Editor
* Single and Multiple Site Support

# MultiSite

chnage MULTISITE to true for multisite and false for singesite

```php

// single site
define('MULTISITE',false);

```

# Third Party Components

* thanks the following open source projects for the components used by Palette

|Components|Link|
|---|---|
|Metro UI|[http://metroui.org.ua](http://metroui.org.ua)|
|JQuery|[https://jquery.com](https://jquery.com)|
|JSColor|[http://jscolor.com](http://jscolor.com)|
|DropzoneJS|[http://www.dropzonejs.com](http://www.dropzonejs.com)|

# Main Developers

* **Ganesh Kandu** [Ganesh Kandu](https://github.com/GaneshKandu)
* **Contact** [kanduganesh@gmail.com](mailto:kanduganesh@gmail.com) :envelope:

