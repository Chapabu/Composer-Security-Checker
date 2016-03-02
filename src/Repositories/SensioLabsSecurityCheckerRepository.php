<?php

/**
 * @file
 * Contains Drupal\composer_security_checker\Repositories\SensioLabsSecurityCheckerRepository.
 */

namespace Drupal\composer_security_checker\Repositories;

use SensioLabs\Security\SecurityChecker;

/**
 * Class SensioLabsSecurityCheckerRepository.
 *
 * @package Drupal\composer_security_checker
 */
class SensioLabsSecurityCheckerRepository implements RepositoryInterface {

  /**
   * @var string
   */
  protected $composerLockfilePath;

  /**
   * @var \SensioLabs\Security\SecurityChecker
   */
  private $checker;

  /**
   * SensioLabsSecurityCheckerRepository constructor.
   *
   * @param string $composerLockfilePath
   *   The path to the composer.lock file.
   * @param \SensioLabs\Security\SecurityChecker $checker
   *
   */
  public function __construct($composerLockfilePath, SecurityChecker $checker ) {
    $this->composerLockfilePath = $composerLockfilePath;
    $this->checker = $checker;
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailableUpdates() {
    return $this->checker->check($this->composerLockfilePath);
  }

}
