# Wordpress Boilerplate

Sage 10 as a starter theme.

**Sage 10 is in active development and is currently in alpha. The `master` branch tracks Sage 10 development. If you want a stable version, use the [latest Sage 9 release](https://github.com/roots/sage/releases/latest).**

## Features

* Sass for stylesheets
* Modern JavaScript
* [Laravel Mix](https://github.com/JeffreyWay/laravel-mix) for compiling assets and concatenating and minifying files
* [Browsersync](http://www.browsersync.io/) for synchronized browser testing
* [Blade](https://laravel.com/docs/5.8/blade) as a templating engine
* [Blade Directives](https://log1x.github.io/sage-directives-docs/#requirements)
* [Blade SVG](https://github.com/Log1x/sage-svg)

## Requirements

Make sure all dependencies have been installed before moving on:

* [WordPress](https://wordpress.org/) >= 5.4
* [PHP](https://secure.php.net/manual/en/install.php) >= 7.2.0 (with [`php-mbstring`](https://secure.php.net/manual/en/book.mbstring.php) enabled)
* [Composer](https://getcomposer.org/download/)
* [ImageMagick]
* [Node.js](http://nodejs.org/) >= 8.0.0
*     UPDATE: Node 8 does not work. Works with Node 12.16.3 for sure
* [Yarn](https://yarnpkg.com/en/docs/install) or [NPM](https://www.npmjs.com/get-npm)

## Installation

### Setup.sh
 You can run the setup.sh script that does most of the work, or manually step through the process below.

### .env file
 In /, create the .env file. There is an .env.example to copy from
 You will need to retrieve the **ACF_PRO_KEY** from BitWarden

You will also need to create an auth.json file (gitignored as it contains Key / Secret) and get the content of the auth.json file from BitWarden.

By default we set WordPress to only retain 10 revisions for each post. You can set to a higher number by setting `WP_POST_REVISIONS` in the .env

### missing folder (before composer install)
 In /web/app/themes/sage/, you will need to:
```sh
 $ mkdir -p storage/framework/cache/
 $ sudo chown -R www-data:www-data storage
```
So that the directory /web/app/themes/sage/storage/framework/cache exists
And change the owner so that the application has permissions to run

### BedRock
Install Bedrock / WordPress / and plugins using Composer from the root directory.

```sh
$ composer install
```

This will setup the following folder structure.

```sh
/         # → Root of your Sage based theme
├── /            # → Theme PHP
├── config/        # → Prod / Stage / Local config settings
├── web/           # → Your http server root
├── wp/            # → WP install files (gitignored but created via composer)
├── theme/             # → Symbolic link to web/app/themes/sage
└── readme.md          # → Me!
```

Then you need to install all of Sage's dependencies

```shell
$ cd web/app/themes/sage/
$ composer install
```

Once you're ready, rename the `sage` folder whatever you want and edit the `style.css` file in the root of the theme as well.

## Additional Plugins
All plugins are managed by composer. More and more composer dependencies are manages with just
```
composer require author/plugin
```
But some old-school dependencies that still use WordPress's *Download from ZIP* method need to be manually added. With that in mind, add a node into the `composer.json` file under the `repositories` array
```
{
    "type": "package",
    "package": {
        "name": "author/plugin",
        "type": "wordpress-plugin",
        "version": "1.5",
        "dist": {
            "type": "zip",
            "url": "https://github.com/author/plugin/archive/master.zip"
        },
        "require": {
            "composer/installers": "^v1.0.7"
        }
    }
},
```
Then in the `repositories` section, add a reference matching the `package.name` with a wildcard as the version:
```
"author/plugin": "*"
```
At this point the `dist.url` can be any url. It can be a url right out of wordpress.org's plugin repo, or packagist, or github.

# Glide Image
Glide uses ImageMagick to process various sizes of images from upload source into needed format / size.

```
sudo apt install imagemagick
sudo apt install php-imagick
```

# Front End

## Tailwind CSS
[Tailwind CSS](https://tailwindcss.com/) is a highly customizable, low-level CSS framework that gives you all of the building blocks you need to build bespoke designs without any annoying opinionated styles you have to fight to override.

## Glide coding considerations

In the theme/sage/app/setup.php you will find an area for `$glidePresets`. There is a hero preset as an example.
```
$glidePresets = [
    'hero' => [
        'w' => 1440,
        'h' => 643,
        'q' => 80,
    ],
];
```
This will build a hero preset, along with a hero-x2 preset.

In the blade files you just need to call {{ glide('/uploads/2020/03/02/some_image.jpg', 'hero') }}

So no matter what the uploaded image size it, glide will downscale it to the desired design size (or preset).

Keep in mind this can also work with `<img src="{{ glide(...) }}">` or `<picture>` sets for mobile support, different image formats. The world is your oyster!
```
<picture>
    <source type="image/jpg" src="{{ glide('...', 'hero-jpg')}} 2x">
    <source type="image/webp" media=“min-resolution: 120dpi” src="{{ glide('...', 'hero-webp')}} 1x">
    <img src="{{ glide('...', 'hero')}}">
</picture>
```

*Important note:* In order for WordPress to register the `/img/` path, you will need to save permalinks in WP Admin.

## Theme structure

```sh
app/web/themes/sage/ # → Root of your Sage based theme
├── app/                         # → Theme PHP
│   ├── Composers/               # → View composers
│   ├── Providers/               # → Service providers
│   ├── admin.php                # → Theme customizer setup
│   ├── filters.php              # → Theme filters
│   ├── helpers.php              # → Helper functions
│   └── setup.php                # → Theme setup
├── config/                      # → Config files
│   ├── app.php                  # → Application configuration
│   ├── assets.php               # → Asset configuration
│   ├── filesystems.php          # → Filesystems configuration
│   └── view.php                 # → View configuration
├── composer.json                # → Autoloading for `app/` files
├── composer.lock                # → Composer lock file (never edit)
├── dist/                        # → Built theme assets (never edit)
├── functions.php                # → Composer autoloader, Acorn bootloader
├── index.php                    # → Never manually edit
├── node_modules/                # → Node.js packages (never edit)
├── package.json                 # → Node.js dependencies and scripts
├── resources/                   # → Theme assets and templates
│   ├── assets/                  # → Front-end assets
│   │   ├── fonts/               # → Theme fonts
│   │   ├── images/              # → Theme images
│   │   ├── scripts/             # → Theme JS
│   │   └── styles/              # → Theme stylesheets
│   └── views/                   # → Theme templates
│       ├── components/          # → Component templates
│       ├── layouts/             # → Base templates
│       └── partials/            # → Partial templates
├── styleguide/                  # → The digital styleguide (aka Design System)
├── screenshot.png               # → Theme screenshot for WP admin
├── storage/                     # → Storage location for cache (never edit)
├── style.css                    # → Theme meta information
├── vendor/                      # → Composer packages (never edit)
└── webpack.mix.js               # → Laravel Mix configuration
```

## Theme setup

WP_DEFAULT_THEME is set to sage, so make sure you change this to the theme name of website.

## Theme development

* Run `npm install` or `yarn` from the theme directory to install dependencies

### Build commands

* `npm start` or `npm run start` — Compile assets when file changes are made, start Browsersync session
* `yarn build` or `npm run build` — Compile and optimize the files in your assets directory
* `yarn build:production` or `npm run build:production` — Compile assets for production

## Documentation

* [Sage documentation](https://roots.io/sage/docs/)
