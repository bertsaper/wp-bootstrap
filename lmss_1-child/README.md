## them.es Starter Theme
**This a child theme** based on the Bootstrap 5.3 theme described below. All customization is done in this child folder. The CSS also is built from this child folder. Requires nodejs equal to or greater than 16. Once built, npm run compile-scss will build the CSS.

## Bootstrap Columns Gutenberg Block

While there are Bootstap Block plugins, they seemed to create a lot of extra code and it was best to make one just for this theme called Bootrap Columns. Like the menu, the block uses the md breakpoint (though it would be easy to open the lmss_1-child/assets/bootstrap-columns.js file and change it). 

Use the Document Overview tab to arrange your content. All blocks are initialized with two paragraph blocks. You can use these or after adding other media, delete them. The block widths (1- 12) are entered in the right hand control panel.

**them.es Starter** is a WordPress Starter Theme built with Bootstrap. Please note that the Source files are only recommended for WordPress Developers who are searching for a simple, solid, proved and tested **Bootstrap Starter Theme** to build upon. **_Don't_ expect a ready-to-use WordPress Theme!**

If you want to see it in action or want to download a customized Theme for free, check out [https://them.es/starter-bootstrap](https://them.es/starter-bootstrap)

## What's included?

- WordPress Theme
- Bootstrap Framework
- Sass Source files
- gulp + webpack configuration
- NPM configuration to keep the required build libraries updated and to add new libraries
- Customization API
- 2 Menus
- Demo Content

## Task Automation

This Theme comes with a built in gulp/webpack task automation. Sass files will be compiled if changed, vendor prefixes will be added automatically and the CSS will be minified. JS source files will be bundled and minified.

- Prerequisites: [Node.js](https://nodejs.org) (NPM) needs to be installed on your system
- Open the **Project directory** `/` in Terminal and install the required Node.js dependencies: gulp, webpack, Sass-Compiler, Autoprefixer, etc.
- `$ npm install`
- Run the **`watch`** script
- `$ npm run watch`
- Modify `/assets/main.scss` and `/assets/main.js`
- Test the Theme
- Run the **`build`** script
- `$ npm run build`

## Technology

- [Bootstrap](https://github.com/twbs/bootstrap), [MIT license](https://github.com/twbs/bootstrap/blob/master/LICENSE)
- [Sass](https://github.com/sass/sass), [MIT license](https://github.com/sass/sass/blob/stable/MIT-LICENSE)
- [webpack](https://github.com/webpack/webpack), [MIT license](https://github.com/webpack/webpack/blob/master/LICENSE)
- [@wordpress/scripts](https://github.com/WordPress/gutenberg/tree/trunk/packages/scripts), [GPLv2+ and Mozilla Public License v2.0](https://github.com/WordPress/gutenberg/blob/trunk/LICENSE.md)
- [wp-bootstrap-navwalker](https://github.com/twittem/wp-bootstrap-navwalker), [GPLv2+](https://github.com/twittem/wp-bootstrap-navwalker/blob/master/LICENSE.txt)

## Copyright & License

Code and Documentation &copy; [them.es](https://them.es)

Code released under [GPLv2+](https://www.gnu.org/licenses/gpl-2.0.html)
