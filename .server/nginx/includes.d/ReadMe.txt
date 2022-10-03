

cdn-production.conf

cdn-qa.conf


#we should create the following direction in the nginx directory structure:
/etc/nginx/includes.d/{domain}


# and in the /etc/nginx/sites-enables/ .conf file, we should add the appropriate line:

    include includes.d/{domain}/cdn-qa.conf;  // for QA

    include includes.d/{domain}/cdn-production.conf;  // for production
