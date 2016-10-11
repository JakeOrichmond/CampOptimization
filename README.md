To view this project clone it from this repository in your terminal
- git clone https://github.com/JakeOrichmond/CampOptimization to your desktop and then
- cd into the project folder  
type in
- php -S localhost:8080 after it is cloned
in your terminal. Open up your browser and go to
- localhost:8080 in your address bar and you will see the web page.

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
