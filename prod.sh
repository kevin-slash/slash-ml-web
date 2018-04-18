cd public/js/build/
rm hh-script.js

gulp mix_css
gulp minify_js
gulp prod

cp .env.prod.example .env