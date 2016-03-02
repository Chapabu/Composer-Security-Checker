<?php

/**
 * @file
 * Contains \Drupal\composer_security_checker\Controller\SecurityCheckerReportController.
 */

namespace Drupal\composer_security_checker\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class SecurityCheckerReportController.
 *
 * @package Drupal\composer_security_checker\Controller
 */
class SecurityCheckerReportController extends ControllerBase {

  /**
   * Index.
   *
   * @return string
   *   Return Hello string.
   */
  public function index() {
    return [
        '#type' => 'markup',
        '#markup' => $this->t('Implement method: index')
    ];
  }

}
