<?php

/**
 * @file
 * Contains ...Parsers\SensioLabsSecurityCheckerParser.
 */

namespace Drupal\composer_security_checker\Parsers;

use Drupal\composer_security_checker\Collections\AdvisoryCollection;
use Drupal\composer_security_checker\Models\Advisory;

/**
 * Class SensioLabsSecurityCheckerParser.
 *
 * @package Drupal\composer_security_checker\Parsers
 */
class SensioLabsSecurityCheckerParser {

  /**
   * A single response item from a SensioLabs Security Checker response.
   *
   * @var array
   */
  private $securityAdvisories;

  /**
   * A collection item to have parsed advisories parsed into.
   *
   * @var \Drupal\composer_security_checker\Collections\AdvisoryCollection
   */
  private $collection;

  private $libraryTitle;

  /**
   * SensioLabsSecurityCheckerParser constructor.
   *
   * @param array $security_advisories
   *   A single response item from a SensioLabs Security Checker response.
   */
  public function __construct($library_title, array $security_advisories) {
    $this->securityAdvisories = $security_advisories;
    $this->collection = new AdvisoryCollection();
    $this->libraryTitle = $library_title;
  }

  public function parse() {

    foreach ($this->securityAdvisories['advisories'] as $advisory_item_key => $advisory_item) {

      $advisory = new Advisory(
        $this->libraryTitle,
        $this->parseVersion(),
        $this->parseIdentifier($advisory_item_key, $advisory_item),
        $advisory_item['title'],
        $advisory_item['link']
      );

      $this->collection->add($advisory);

    }

    return $this->collection;

  }

  private function parseVersion() {
    return $this->securityAdvisories['version'];
  }

  private function parseIdentifier($advisory_item_key, $advisory_item) {
    if (!empty($advisory_item['cve'])) {
      return $advisory_item['cve'];
    }

    return $advisory_item_key;
  }

}
