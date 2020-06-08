set -e

npm install
composer install
npm run production
# cd docs
# composer install
# npm install
# npm run staging
# mkdir -p ../dist/docs
# cp -R build_staging/* ../dist/docs