# stancl/tenancy docs

For the main repository, see [stancl/tenancy](https://github.com/stancl/tenancy).

## Dev

You can use `npm run watch`, `npm run dev`, and `npm run production`.

## Nix

A lot of the dependencies in this repo are pretty legacy software by now, so to make building easier
and more reproducible in the long term, we use Nix to wrap the build process.

Devshell: `nix develop`

Run (dev, watcher): `nix run`

Run (prod build into build_production): `nix run .#production`

Build (reproducible via Nix, result symlinked from store): `nix build`

Build (same as above, but using localhost:8000 as the base URL, prod *non-legacy* build): `nix build .#local`

Build (same as `#local` but only including /docs and /assets): `nix build .#minimalLocal`

Legacy builds assume it's the v3 site on the tenancyforlaravel.com domain. Non-legacy builds do not and as such remove some root level links on the frontend
(in other words non-legacy builds support minimal builds.)
