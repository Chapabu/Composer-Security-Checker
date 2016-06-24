<?php

namespace Drupal\Tests\composer_security_checker\Functional;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Tests\BrowserTestBase;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

/**
 * Class Requirements.
 *
 * @package Drupal\Tests\composer_security_checker\Functional
 */
class Requirements extends BrowserTestBase {

  public static $modules = [
    'composer_security_checker',
  ];

  /**
   * A normal authenticated user.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $webUser;
  private $entityManager;
  private $configStorage;
  private $configFactory;
  private $config;

  /**
   * {inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $permissions = [
      'administer site configuration',
      'access administration pages',
      'access site reports',
    ];
    $web_user = $this->drupalCreateUser($permissions);

    $this->drupalLogin($web_user);
    $this->webUser = $web_user;
  }

  /**
   * Test that the requirements page shows that the class exists.
   */
  public function testClassRequirementsWhenClassExists() {

    $this->drupalGet('admin/reports/status');
    $this->assertSession()
      ->pageTextContains('Composer Security Checker service available');

  }

  /**
   * Test that the requirements page shows an error when the service isn't
   * available.
   */
  public function testClassRequirementsWhenClassDoesNotExist() {

    // ToDo: If someone can get this working - that'd be AMAZING :-@
//    $this->container->set('composer_security_checker.sensiolabs_security_checker', NULL);
//    $this->kernel->rebuildContainer();
//
//    $this->drupalGet('admin/reports/status');
//    $this->assertSession()
//      ->pageTextContains('Composer Security Checker service unavailable or not loaded');

  }

}
