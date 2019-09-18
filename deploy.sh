set -e

npm run production
cd docs
    composer install
    npm install
    npm run production
    cp -R build_production/* ../dist/tenancy/docs