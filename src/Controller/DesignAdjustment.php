<?php

namespace Drupal\vtech\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * All elements for design adjustment.
 */
class DesignAdjustment extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function page() {
    $build = [];

    // Add messages
    $this->messenger()->addMessage('Test status message.', 'status');
    $this->messenger()->addMessage('Test 1 status message.', 'status');
    $this->messenger()->addMessage('Test warning message.', 'warning');
    $this->messenger()->addMessage('Test 1 warning message.', 'warning');
    $this->messenger()->addMessage('Test error message.', 'error');
    $this->messenger()->addMessage('Test 1 error message.', 'error');
    $this->messenger()->addMessage('Test info message.', 'info');

    // Add pager
    $pager = \Drupal::service('pager.manager')->createPager(100, 5, 0);
    $build['pager'] = ['#type' => 'pager'];

    // Add form
    $build['form'] = \Drupal::formBuilder()->getForm('\Drupal\vtech\Form\DesignAdjustment');
    return $build;
  }

}
