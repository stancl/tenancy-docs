# stancl/tenancy docs

For the main repository, see [stancl/tenancy](https://github.com/stancl/tenancy).

## Getting started

### Prerequisites

1. Git
1. PHP: any 7.x version starting with v7.3 or greater
1. Composer: See [Composer Website](https://getcomposer.org/doc/00-intro.md)
1. Node: any 12.x version starting with v12.0.0 or greater
1. A fork of the repo (for any contributions)
1. A clone of  [tenancy-docs](https://github.com/stancl/tenancy-docs) on your local machine

### Installation

1. `composer install` to install dependencies
1. `npm install` to install the docs npm dependencies

### Running locally

1. You can use `npm run watch`, `npm run dev`, and `npm run production`.
1. `open http://localhost:3000` to open the site in your favorite browser

## Contributing

### Create a branch

1. `git pull origin master` to ensure you have the latest main code
1. `git checkout -b the-name-of-my-branch` (replacing `the-name-of-my-branch` with a suitable name) to create a branch

## Make the change

### Push it

1. `git add -A && git commit -m "My message"` (replacing `My message` with a commit message, such as `Fix header logo on Android`) to stage and commit your changes
1. `git push my-fork-name the-name-of-my-branch`
1.  A Netlify build will also be automatically created once you make your PR so other people can see your change.
