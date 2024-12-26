let mix = require('laravel-mix');

mix
   .copy('storage/app/public/images', 'public/storage/images')
   .version();
