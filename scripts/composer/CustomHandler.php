<?php

/**
 * @file
 * Contains \RooseveltProject\composer\CustomHandler.
 */

namespace RooseveltProject\composer;

use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class CustomHandler
{

  protected static function getProjectRoot($project_root)
  {
    return $project_root;
  }

  public static function createSymlinks(Event $event)
  {
    $root = static::getProjectRoot(getcwd());

    // Check if config directory exists.
    if (file_exists($root . '/vendor/simplesamlphp/simplesamlphp/config')) {
      // Check if config.php file exists.
      if (file_exists($root . '/vendor/simplesamlphp/simplesamlphp/config/config.php')) {
        // delete the symlink so it can be recreated.
        unlink($root . '/vendor/simplesamlphp/simplesamlphp/config/config.php');
      }

      // Check if authsources.php file exists.
      if (file_exists($root . '/vendor/simplesamlphp/simplesamlphp/config/authsources.php')) {
        // delete the symlink so it can be recreated.
        unlink($root . '/vendor/simplesamlphp/simplesamlphp/config/authsources.php');
      }
    }
    else {
      // Make the directory so the symlink can be created.
      mkdir($root . '/vendor/simplesamlphp/simplesamlphp/config');
    }
    // Create symlinks
    symlink('../../../../private/simplesaml/config/config.php', './vendor/simplesamlphp/simplesamlphp/config/config.php');
    symlink('../../../../private/simplesaml/config/authsources.php', './vendor/simplesamlphp/simplesamlphp/config/authsources.php');

    // Check if metadata directory exists.
    if (file_exists($root . '/vendor/simplesamlphp/simplesamlphp/metadata')) {
      // Check if saml20-idp-remote.php file exists.
      if (file_exists($root . '/vendor/simplesamlphp/simplesamlphp/metadata/saml20-idp-remote.php')) {
        // delete the symlink so it can be recreated.
        unlink($root . '/vendor/simplesamlphp/simplesamlphp/metadata/saml20-idp-remote.php');
      }

      // Check if saml20-sp-remote.php file exists.
      if (file_exists($root . '/vendor/simplesamlphp/simplesamlphp/metadata/saml20-sp-remote.php')) {
        // delete the symlink so it can be recreated.
        unlink($root . '/vendor/simplesamlphp/simplesamlphp/metadata/saml20-sp-remote.php');
      }
    }
    else {
      // Make the directory so the symlink can be created.
      mkdir($root . '/vendor/simplesamlphp/simplesamlphp/metadata');
    }
    // Create symlinks.
    symlink('../../../../private/simplesaml/metadata/saml20-idp-remote.php', './vendor/simplesamlphp/simplesamlphp/metadata/saml20-idp-remote.php');
    symlink('../../../../private/simplesaml/metadata/saml20-sp-remote.php', './vendor/simplesamlphp/simplesamlphp/metadata/saml20-sp-remote.php');

/**
 * If you created local certs, link them by uncommenting the lines below.
 */
/*
    $certs = [
      'doresearch.stanford.edu.crt',
      'doresearch.stanford.edu.pem',
      'saml.crt',
      'saml.pem',
    ];

    // Check if cert directory exists
    if (file_exists($root . '/vendor/simplesamlphp/simplesamlphp/cert')) {
      // Check if saml20-idp-remote.php file exists
      foreach($certs as $cert) {
        if (file_exists($root . '/vendor/simplesamlphp/simplesamlphp/cert/' . $cert)) {
          // delete the symlink so it can be recreated
          unlink($root . '/vendor/simplesamlphp/simplesamlphp/cert/' . $cert);
        }
      }
    }
    else {
      // Make the directory so the symlink can be created
      mkdir($root . '/vendor/simplesamlphp/simplesamlphp/cert');
    }

    // Create symlinks
    foreach($certs as $cert) {
      symlink('../../../../private/simplesaml/cert/' . $cert, './vendor/simplesamlphp/simplesamlphp/cert/' . $cert);
    }
*/

    $event->getIO()->write("Created symlinks");
  }

}
