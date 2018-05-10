var Encore = require('@symfony/webpack-encore');

var publicFolder = './src/assets/js/';
var nodeModulesFolder = './node_modules/';

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableSassLoader()
    .addEntry('tweet-board', publicFolder + 'tweet-board.js')
    .addEntry('login', publicFolder + 'login.js')

    .addEntry('bootstrapjs', nodeModulesFolder + 'bootstrap/dist/js/bootstrap.js')
    .addEntry('bootstrapcss', nodeModulesFolder + 'bootstrap/dist/css/bootstrap.css')

;

module.exports = Encore.getWebpackConfig();