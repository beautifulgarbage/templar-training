#!/bin/bash
if ! -f ".env"; then
    cp .env.example .env
fi
if grep -q 'get from bitwarden' ".env"; then
    echo "Check the .env to make sure all keys are defined. (eg. ACF_PRO_KEY)"
else
    composer install
    rm -rf web/wp/wp-content/themes
    cd web/app/themes/sage/
    composer install
    mkdir -p storage/framework/cache/
    # The following are ubuntu / forge specific
    # sed -i.bak "2i if(typeof formstack_tinymce == 'undefined') return;" web/app/plugins/formstack/tinymce/plugin.js
fi