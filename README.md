# Laravel 4.2 using Foundation 5, Font Awesome 4, Bower, and Gulp.js with Environments 

A starter [Laravel](https://github.com/laravel/laravel) app ready to go with asset management provided by [Gulp.js](https://github.com/gulpjs/gulp), Twitter [Bower](https://github.com/bower/bower) using [Foundation 5](https://github.com/zurb/foundation) and [Font Awesome 4](https://github.com/FortAwesome/Font-Awesome) with preconfigured [Laravel Environments](http://laravel.com/docs/configuration#environment-configuration).

>__Neat__: Pulls in Foundation, JQuery, Font Awesome and any other `bower` packages directly from `bower_components` so you will always have the direct source when building from Gulp. No more copy/paste to update versions! At anytime run `bower update` then `gulp` and your compiled `css` and `js` will be refreshed with the latest versions of each package directly from the `src` directories of each project. See the Gulp `js:vendor` and `less:build` tasks in `gulpfile.js` for more information.

## Getting Started

### Clone Project

  1. Clone this repo in your sites directory:
      * `git clone https://skinnyandbald@bitbucket.org/skinnyandbald/laravel-foundation-bower-gulp.git`
  2. `cd` into project directory

### Create `.env.*.php` Files

  1. Copy `env.template.php` and Rename to `.env.php` (Note: preceeding "dot")
  2. Edit file and change
      * `app.env` from `development` to `production`
  3. Copy `env.template.php` and Rename to `.env.development.php` (Note: preceeding "dot")
  4. __Later__: for each "environment" you can set the other values as needed.

### Init Project
  3. `composer install`
  4. `npm install`
  5. `bower update`
  6. `gulp` (Ignore `jshint` warnings)
  7. `php artisan serve`

### View in Browser

  1. In browser go to: `http://localhost:8000`

### Edit

  1. Edit `app/assets/less/app-styles.less` as needed
  2. Run `gulp css:pub` to regenerate Less to CSS
  3. Refresh in browser to see changes
  4. Edit `app/assets/js/app.js` as needed
  5. Run `gulp js:pub` to regenerate JS
  6. Refresh in browser to see changes
  7. Rinse & Repeat :-)

### Optional - Local Laravel Environment Setup

By default, you will be in `production` environment. You probably want to be in `development` when working locally. To switch:

  1. `php artisan key:generate`. Copy key to `app.key` in `.env.php` and `.env.development.php`
  2. Set an ENV variable for `APP_ENV` to `development`. You can do this in `php-fpm.conf`, `httpd.conf`, or your local shell ENV in `.bash_profile`.
  3. Edit settings in `.env.development.php` or which ever `.env.*.php` you want to use

__NOTE__: For `production`, be sure to change the "Acme" namespace in `app/Acme`, `app/config/auth.php`, and `composer.json`, to your own, then run `composer dumpautoload -o`

### Optional - Site Settings CONSTANTs

While sensitive settings should go in the `.env.*.php` files, site wide settings such as __admin email address__, __phone number__, and other global data typically go in a CONSTANTs file or Site Settings file. If you would like to use a similar setup, add as many entries as you need to the file `app/config/setting.php`.

In your `views` or any other Laravel file, your data will be available via `Config::get('setting.key');`.

See the `app/views/layouts/master.blade.php` file for implementaton example.

## TODO

  * Lessify css in `app-styles.less`

## Gulp Commands Reference

    npm install -g gulp

    npm install --save-dev gulp gulp-less gulp-autoprefixer gulp-minify-css gulp-minify-html gulp-jshint gulp-concat gulp-uglify gulp-imagemin gulp-clean gulp-notify gulp-rename gulp-watch gulp-cache

## Laravel Customizations Reference

  * `app/`

    * Created

        * Directory `assets` and subdirs `js`, `less` and `img` each with nested file `.gitkeep`. Used to store source `src` assets
        * Directory `build` and nested file `.gitignore`. Used when building assets with build tool such as Gulp
        * Directory `Acme`. Used for application namespace and domain logic

***

  * `app/config/`

    * Edited

        * Any file needing secure/safe Environment specific settings. Added `getenv()` with key from `.env.(*.?)php` environment file. See `env.template.php` for specifics
        * `auth.php`, changed `model` key to `Acme\User\User`
        * `cache.php`, changed `prefix` key to `el`

    * Added

        * Array key `options` to `database.php` `connections.mysql` array to support UTC tz in DB:
            * `'options'   => [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET time_zone = \'' . getenv('db.app.timezone') . '\'']
    )`

    * Created

        * Directories `development` and `staging` each with nested file `.gitkeep`. For Environment overriding
        * File `setting.php`. Stores app specific site settings/CONSTANTS

***

  * `app/start/global.php`

    * Commented Out

        * `ClassLoader::addDirectories` => `app_path().'/models',`

    * Edited

        * `Log::useFiles` name to `app.log`

***

  * `app/views/`

    * Deleted

        * `hello.php`

    * Created

        * Directories `layouts`, and `home`
        * Files `layouts/master.blade.php`, and `home/index.blade.php`

***

  * `app/lang/en/`

    * Created

        * Files `header.php`, `footer.php`, and `nav.php`

***

  * `bootstrap/start.php`

    * Edited

        * `detectEnvironment` function to use SYSTEM/SERVER set value `getenv('APP_ENV')`

***

  * `public/`

    * Created

        * Directory `assets` and subdirs `js`, `css`, `fonts`, and `img` each with nested file `.gitkeep`. Used to store compiled/static assets

    * Deleted

        * File `.htaccess`. Using nginx server, not apache

***

  * `/`

    * Created

        * Files for environment config: `env.template.php`, `.env.development.php`, and `.env.php`
        * Files `.jscsrc`, `.jshintrc`, `bower.json`, `gulpfile.js`, `package.json`, and `README.md`
        * Directories `bower_components`, and `node_modules` for use with build tool

    * Edited

        * File `.gitignore` removed ignore of `composer.lock`, added ignores of extra items specific to project

***

  * `composer.json`

    * Edited
        * `"name"` and `"description"`
        * `"require.laravel/framework"` to latest version `"4.2.*"`

    * Added
        * `"psr-4"` for own app namespace

    * Deleted
        * `"app/models",` from `"autoload.classmap"`

## Reset Install

Delete the following project specific files before committing or sharing your generated source on GitHub if creating a new public repo (but not for your own production as they are needed!):

  * `/composer.lock`
  * `/bootstrap/compiled.php`
  * `/vendor` directory