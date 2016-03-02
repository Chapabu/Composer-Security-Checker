<?php

/**
 * @file
 * Contains Drupal\composer_security_checker\RepositoryInterface\Repositories.
 */

namespace Drupal\composer_security_checker\Repositories;

/**
 * Class RepositoryInterface.
 *
 * @package Drupal\composer_security_checker
 */
interface RepositoryInterface
{

  /**
   * Get a list of available updates for installed Composer packages.
   *
   * @return array
   */
  public function getAvailableUpdates();

}
