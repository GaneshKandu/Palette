[![GitHub Stars](https://img.shields.io/github/stars/GaneshKandu/Palette.svg)](https://github.com/GaneshKandu/Palette/stargazers)
[![GitHub Issues](https://img.shields.io/github/issues/GaneshKandu/Palette.svg)](https://github.com/GaneshKandu/Palette/issues) 
[![Releases](https://img.shields.io/github/release/GaneshKandu/Palette.svg)](https://github.com/GaneshKandu/Palette/releases) 

###Palette is PHP Based Site Builder

# Palette

Palette is PHP Based Small Site Builder

# Getting Started

+ [Prerequirement](#prerequirement)
+ [Installation](#installation)
+ [Installation using git](#installation-using-git)
+ [Sreenshots](https://github.com/GaneshKandu/Palette/blob/master/SCREENSHOTS.md)
+ [Language](https://github.com/GaneshKandu/Palette/blob/master/lang/LANGUAGE.md)Feature
+ [Main Developer](#main-developers)
+ [Feature](#feature)
+ [MultiSite](#multisite)

# Prerequirement
## PHP Version

* PHP 5.3+

## Extension

* gd
* zip

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

# Main Developers

* **Ganesh Kandu** [Ganesh Kandu](https://github.com/GaneshKandu)
* **Contact** [kanduganesh@gmail.com](mailto:kanduganesh@gmail.com) :envelope:

