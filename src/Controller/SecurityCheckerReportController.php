<?php

/**
 * @file
 * Contains \Drupal\composer_security_checker\Controller\SecurityCheckerReportController.
 */

namespace Drupal\composer_security_checker\Controller;

use Drupal\composer_security_checker\Repositories\RepositoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class SecurityCheckerReportController.
 *
 * @package Drupal\composer_security_checker\Controller
 */
class SecurityCheckerReportController extends ControllerBase {

  /**
   * @var RepositoryInterface
   */
  protected $composerSecurityRepository;

  /**
   * SecurityCheckerReportController constructor.
   *
   * @param $composerSecurityRepository
   */
  public function __construct(RepositoryInterface $composerSecurityRepository) {
    $this->composerSecurityRepository = $composerSecurityRepository;
  }

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

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('composer_security_checker.security_checker_repository')
    );
  }


}
