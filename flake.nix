{
  description = "PHP 7.4 development environment for tenancy docs";

  inputs = {
    nixpkgs.url = "github:NixOS/nixpkgs/nixos-unstable";
    phps.url = "github:fossar/nix-phps";
    flake-utils.url = "github:numtide/flake-utils";
  };

  outputs = { self, nixpkgs, phps, flake-utils }:
    flake-utils.lib.eachDefaultSystem (system:
      let
        pkgs = nixpkgs.legacyPackages.${system};
        php74 = phps.packages.${system}.php74;
      in
      {
        devShells.default = pkgs.mkShell {
          packages = [
            php74
            php74.packages.composer
            pkgs.nodejs_24
          ];

          shellHook = ''
            echo "Welcome to the tenancy docs development environment!"
            echo "PHP version: $(php -v | head -n 1)"
            echo "Node.js version: $(node -v)"
            echo "You can use 'npm run watch' for local development, see package.json for other scripts."
          '';
        };

        # npm run watch
        apps.default = {
          type = "app";
          program = "${pkgs.writeShellApplication {
            name = "build-docs";
            runtimeInputs = [ php74 php74.packages.composer pkgs.nodejs_24 ];
            text = ''
              echo "Installing dependencies..."
              composer install
              npm install
              echo "Running npm run watch..."
              npm run watch
            '';
          }}/bin/build-docs";
        };

        # npm run production
        apps.production = {
          type = "app";
          program = "${pkgs.writeShellApplication {
            name = "build-docs";
            runtimeInputs = [ php74 php74.packages.composer pkgs.nodejs_24 ];
            text = ''
              echo "Installing dependencies..."
              composer install
              npm install
              echo "Building production site..."
              npm run production
              echo "Build complete! Output in build_production/"
            '';
          }}/bin/build-docs";
        };

        lib.mkTenancyDocs = { baseUrl ? "https://tenancyforlaravel.com", legacy ? true, minimal ? false }: let
          composerDeps = php74.buildComposerProject2 {
            pname = "tenancy-docs-composer";
            version = "1.0.0";
            src = ./.;

            vendorHash = "sha256-X7yyQ/fV5vKul+jZlw1vMsPsMrBMVUGhMMDMJDUugsU=";

            postInstall = ''
              cp -R ./vendor/* $out
            '';
          };
        in pkgs.buildNpmPackage {
          pname = "tenancy-docs";
          version = "1.0.0";
          src = ./.;

          nodejs = pkgs.nodejs_24;
          npmDepsHash = "sha256-ufeN4BXCAlZZypViznlkXWosSgZ5nsPvMJJ0FVLXxJI=";

          buildInputs = [ php74 ];

          buildPhase = ''
              cp -R ${composerDeps} ./vendor
              JIGSAW_BASE_URL="${baseUrl}" DOCS_LEGACY_DEPLOYMENT=${toString legacy} npm run production
          '';

          installPhase = if minimal then ''
              mkdir $out
              cp -R ./build_production/docs/ $out/docs
              cp -R ./build_production/assets/ $out/assets
          '' else ''
              cp -R ./build_production/ $out/
          '';
        };

        packages.default = self.lib.${system}.mkTenancyDocs {};
        packages.local = self.lib.${system}.mkTenancyDocs { baseUrl = "http://localhost:8000"; legacy = false; };
        packages.minimalLocal = self.lib.${system}.mkTenancyDocs { baseUrl = "http://localhost:8000"; legacy = false; minimal = true; };
      }
    );
}
