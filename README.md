# rooseveltedu

[![CircleCI](https://circleci.com/gh/kanopi/rooseveltedu.svg?style=shield)](https://circleci.com/gh/kanopi/rooseveltedu)
[![Dashboard rooseveltedu](https://img.shields.io/badge/dashboard-rooseveltedu-yellow.svg)](https://dashboard.pantheon.io/sites/bd787532-7df1-43fd-9b09-ca162d2c4bab#dev/code)
[![Dev Site rooseveltedu](https://img.shields.io/badge/site-rooseveltedu-blue.svg)](http://dev-rooseveltedu.pantheonsite.io/)

This is a composer based Drupal 8 project with Docksal configuration to easily get a site started.

## Setup instructions

### Step #1: Docksal environment setup

**This is a one time setup - skip this if you already have a working Docksal environment.**  

Follow [Docksal environment setup instructions](https://docs.docksal.io/getting-started/setup/)

### Step #2: Project setup

1. Clone this repo into your Projects directory

    ```
    git clone git@github.com:kanopi/maui.git maui
    cd maui
    ```

2. Initialize the site

    This will initialize local settings and install the site via drush

    ```
    fin init
    ```

3. **On Windows** add `192.168.64.100  maui.docksal` to your hosts file

4. Point your browser to

    ```
    http://maui.docksal
    ```

When the automated install is complete the command line output will display the admin username and password.

## More automation with 'fin init'

Site provisioning can be automated using `fin init`, which calls the shell script in [.docksal/commands/init](.docksal/commands/init).  
This script is meant to be modified per project. The one in this repo will give you a good example of advanced init script.

Some common tasks that can be handled by the init script:

- initialize local settings files for Docker Compose, Drupal, Behat, etc.
- import DB or perform a site install
- compile Sass
- run DB updates, revert features, clear caches, etc.
- enable/disable modules, update variables values

## Installing Modules

Modules are installed using drush. The process for installing a module would be the following:

```
fin composer require VENDOR/PACKAGE
fin drush en [MODULE]
```

The standard drush command is used but with the Docksal specific command `fin` prepended to the beginning.

## Theme

The theme is based off of the Zurb Foundation 6.4.3 framework. Gulp is installed to compile sass to css 
and to minify the javascript and css.

The theme included is located within `web/sites/all/themes/custom/roosevelt`.

```
fin gulp
```

## Workflow

1. Create a feature branch locally, and push it up to GitHub
1. Create a pull request
1. CircleCI will create a multi-dev environment on Pantheon

## Deploy for Review

1. Squash and merge the pull request on GitHub, then delete the branch
1. CircleCI will deploy the changes to the Dev environment on Pantheon
1. Push your code from the Dev environment to the Test environment

## Push to Production

1. Make a backup of the Live site on Pantheon
1. Push your code from the Test environment to the Live environment
