Dependencies:
- Third-party dependencies are managed by bower

Compilers:
- roboscript.js is minified using UglifyJS: http://www.jetbrains.com/phpstorm/webhelp/minifying-javascript.html#d78529e512
- LESS files are compiled and minified using PHPStorm LESS compiler: http://plugins.jetbrains.com/plugin/7059?pr=idea

CSS/LESS:
- Sample styles can be found in /styles
- Styles that require more than few rules should have their own LESS file. 
- Mobile styles should be included at the end of the LESS file containing the styles to which they apply.



Possible improvements:
- Introduce a template/layout framework to eliminate includes of HTML snippets.
- Clean out unused CSS after Bootstrap migration
