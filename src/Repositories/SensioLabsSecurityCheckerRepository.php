<?php

/**
 * @file
 * Contains Drupal\composer_security_checker\Repositories\SensioLabsSecurityCheckerRepository.
 */

namespace Drupal\composer_security_checker\Repositories;

use Drupal\composer_security_checker\Collections\AdvisoryCollection;
use Drupal\composer_security_checker\Parsers\SensioLabsSecurityCheckerParser;
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
   * @var \Drupal\composer_security_checker\Collections\AdvisoryCollection
   */
  private $collection;

  /**
   * SensioLabsSecurityCheckerRepository constructor.
   *
   * @param string $composer_lockfile_path
   *   The path to the composer.lock file.
   * @param \SensioLabs\Security\SecurityChecker $checker
   *
   */
  public function __construct($composer_lockfile_path, SecurityChecker $checker) {
    $this->composerLockfilePath = $composer_lockfile_path;
    $this->checker = $checker;
    $this->collection = new AdvisoryCollection();
  }

  private function getRawUpdates() {
    return $this->checker->check($this->composerLockfilePath);
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailableUpdates() {
    foreach ($this->getRawUpdates() as $raw_update_title => $raw_update) {
      $parser = new SensioLabsSecurityCheckerParser($raw_update_title, $raw_update);
      $parsed_response = $parser->parse();
      $this->collection->ingest($parsed_response);
    }
    return $this->collection;
  }

}
