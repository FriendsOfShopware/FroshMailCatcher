#!/usr/bin/env bash

commit=$1
if [ -z ${commit} ]; then
    commit=$(git tag --sort=-creatordate | head -1)
    if [ -z ${commit} ]; then
        commit="master";
    fi
fi

# Remove old release
rm -rf FroshMailCatcher FroshMailCatcher-*.zip

# Build new release
mkdir -p FroshMailCatcher
git archive ${commit} | tar -x -C FroshMailCatcher
composer install --no-dev -n -o -d FroshMailCatcher
( find ./FroshMailCatcher -type d -name ".git" && find ./FroshMailCatcher -name ".gitignore" && find ./FroshMailCatcher -name ".gitmodules" ) | xargs rm -r
zip -r FroshMailCatcher-${commit}.zip FroshMailCatcher