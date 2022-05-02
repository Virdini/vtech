<?php

namespace Drupal\vtech\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Reset the contents of the opcode cache.
 */
class OPcache extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'vtech_opcache';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['actions'] = [
      '#type' => 'actions',
      'submit' => [
        '#type' => 'submit',
        '#value' => $this->t('Clear all caches'),
        '#button_type' => 'primary',
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    @opcache_reset();

    $this->messenger()->addStatus($this->t('Caches cleared.'));
  }

}
