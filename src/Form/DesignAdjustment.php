<?php

namespace Drupal\vtech\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * All form elements for design adjustment.
 */
class DesignAdjustment extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'vtech_design_adjustment_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['tabs'] = [
      '#type' => 'vertical_tabs',
      '#default_tab' => 'edit-text',
    ];

    // Simple Text
    $form['text'] = [
      '#type' => 'details',
      '#title' => 'Simple Text',
      '#group' => 'tabs',
      'content' => ['#theme' => 'vtech_adjustment_text'],
    ];

    // Drupal Table
    $form['table'] = [
      '#type' => 'details',
      '#title' => 'Drupal Table',
      '#group' => 'tabs',
    ];
    $form['table']['table'] = [
      '#type' => 'table',
      '#group' => 'tabs',
      '#header' => ['Label', 'Machine name', 'Weight', 'Operations'],
      '#empty' => 'There are no items yet.',
      '#tableselect' => TRUE,
      '#tabledrag' => [
        [
          'action' => 'order',
          'relationship' => 'sibling',
          'group' => 'mytable-order-weight',
        ],
      ],
    ];
    for ($i = 0; $i < 5; $i++) {
      $form['table']['table'][$i]['#attributes']['class'][] = 'draggable';
      $form['table']['table'][$i]['#weight'] = $i;
      $form['table']['table'][$i]['label'] = ['#plain_text' => 'Text'. $i];
      $form['table']['table'][$i]['id'] = ['#plain_text' => 'Text'. $i];
      $form['table']['table'][$i]['weight'] = [
        '#type' => 'weight',
        '#title' => 'Weight for',
        '#title_display' => 'invisible',
        '#default_value' => $i,
        '#attributes' => ['class' => ['mytable-order-weight']],
      ];
      $form['table']['table'][$i]['operations'] = [
        '#type' => 'operations',
        '#links' => [
          'edit' => [
            'title' => 'Edit',
            'url' => Url::fromRoute('<front>'),
          ],
          'delete' => [
            'title' => 'Delete',
            'url' => Url::fromRoute('<front>'),
          ],
        ],
      ];
    }

    // Form Elements
    $form['form'] = [
      '#type' => 'details',
      '#title' => 'Form Elements',
      '#group' => 'tabs',
    ];
    $form_sp = [
      '#field_prefix' => 'Field prefix',
      '#field_suffix' => 'Field suffix',
    ];

    $form['form']['example_textfield'] = [
      '#type' => 'textfield',
      '#title' => 'Textfield element',
      '#required' => TRUE,
      '#placeholder' => 'Placeholder',
      '#description' => 'Description textfield element',
    ];
    $form['form']['example_textfield1'] = $form['form']['example_textfield'] + $form_sp;
    $form['form']['example_textfield1']['#disabled'] = TRUE;
    $form['form']['example_textfield1']['#placeholder'] = 'Disabled';

    $form['form']['example_number'] = [
      '#type' => 'number',
      '#title' => 'Number element',
      '#required' => TRUE,
      '#placeholder' => 'Placeholder',
      '#description' => 'Description number element',
    ];
    $form['form']['example_number1'] = $form['form']['example_number'] + $form_sp;

    $form['form']['example_date'] = [
      '#type' => 'date',
      '#title' => 'Date element',
      '#required' => TRUE,
      '#placeholder' => 'Placeholder',
      '#description' => 'Description date element',
    ];
    $form['form']['example_date1'] = $form['form']['example_date'] + $form_sp;

    $form['form']['example_time'] = [
      '#type' => 'datetime',
      '#title' => 'Datetime element',
      '#required' => TRUE,
      '#placeholder' => 'Placeholder',
      '#description' => 'Description datetime element',
    ];
    $form['form']['example_time1'] = $form['form']['example_time'] + $form_sp;

    $form['form']['example_search'] = [
      '#type' => 'search',
      '#title' => 'Search element',
      '#required' => TRUE,
      '#placeholder' => 'Placeholder',
      '#description' => 'Description search element',
    ];
    $form['form']['example_search1'] = $form['form']['example_search'] + $form_sp;

    $form['form']['example_textarea'] = [
      '#type' => 'textarea',
      '#title' => 'Textarea element',
      '#required' => TRUE,
      '#placeholder' => 'Placeholder',
      '#description' => 'Description textarea element',
    ];
    $form['form']['example_textarea1'] = $form['form']['example_textarea'] + $form_sp;

    $form['form']['example_autocomplete'] = [
      '#type' => 'textfield',
      '#title' => 'Textfield autocomplete element',
      '#required' => TRUE,
      '#placeholder' => 'Placeholder',
      '#description' => 'Description textfield autocomplete element',
      '#autocomplete_route_name' => '<front>',
      '#autocomplete_route_parameters' => [],
    ];
    $form['form']['example_autocomplete1'] = $form['form']['example_autocomplete'] + $form_sp;

    $form['form']['example_file'] = [
      '#type' => 'file',
      '#title' => 'File element',
      '#multiple' => TRUE,
      '#required' => TRUE,
      '#placeholder' => 'Placeholder',
      '#description' => 'Description file element',
    ];
    $form['form']['example_file1'] = $form['form']['example_file'] + $form_sp;

    $form['form']['example_password'] = [
      '#type' => 'password',
      '#required' => TRUE,
      '#title' => 'Password element',
      '#placeholder' => 'Placeholder',
      '#description' => 'Description password element',
    ];
    $form['form']['example_password1'] = $form['form']['example_password'] + $form_sp;

    $form['form']['example_password_confirm'] = [
      '#type' => 'password_confirm',
      '#required' => TRUE,
      '#title' => 'Password confirm element',
      '#placeholder' => 'Placeholder',
      '#description' => 'Description password confirm element',
    ];
    $form['form']['example_password_confirm1'] = $form['form']['example_password_confirm'] + $form_sp;

    $form['form']['example_select'] = [
      '#type' => 'select',
      '#required' => TRUE,
      '#title' => 'Select element',
      '#description' => 'Description select element',
      '#options' => [
        '1' => '1 - option',
        '2 - option group' => [
          '2.1' => '2.1 - option',
          '2.2' => '2.2 - option',
        ],
        '3' => '3 - option',
      ],
    ];
    $form['form']['example_select0'] = $form['form']['example_select'] + $form_sp;

    $form['form']['example_select1'] = $form['form']['example_select'];
    $form['form']['example_select1']['#multiple'] = TRUE;
    $form['form']['example_select11'] = $form['form']['example_select1'] + $form_sp;

    $form['form']['example_checkbox'] = [
      '#type' => 'checkbox',
      '#title' => 'Checkbox element',
      '#return_value' => 1,
      '#required' => TRUE,
      '#description' => 'Description checkbox element',
    ];
    $form['form']['example_checkbox1'] = $form['form']['example_checkbox'] + $form_sp;

    $form['form']['example_checkboxes'] = [
      '#type' => 'checkboxes',
      '#required' => TRUE,
      '#options' => [
        'c1' => 'Checkbox element 1',
        'c2' => 'Checkbox element 2',
        'c3' => 'Checkbox element 3',
      ],
      '#title' => 'Checkboxes element',
      '#description' => 'Description checkboxes element',
    ];
    $form['form']['example_checkboxes1'] = $form['form']['example_checkboxes'] + $form_sp;

    $form['form']['example_radios'] = [
      '#type' => 'radios',
      '#required' => TRUE,
      '#options' => [
        'c1' => 'Radios element 1',
        'c2' => 'Radios element 2',
        'c3' => 'Radios element 3',
      ],
      '#title' => 'Radios element',
      '#description' => 'Description radios element',
    ];
    $form['form']['example_checkboxes1'] = $form['form']['example_checkboxes'] + $form_sp;

    $form['form']['details'] = [
      '#type' => 'details',
      '#description' => 'Description details element',
      '#title' => 'Details element',
      '#open' => FALSE,
      '#value' => 'Value details element',
      'example_textfield' => $form['form']['example_textfield'],
    ];

    $form['form']['fieldset'] = [
      '#type' => 'fieldset',
      '#description' => 'Description fieldset element',
      '#title' => 'Fieldset element',
      'example_textfield' => $form['form']['example_textfield'],
    ];

    $form['form']['fieldgroup'] = [
      '#type' => 'fieldgroup',
      '#description' => 'Description fieldgroup element',
      '#title' => 'Fieldgroup element',
      'example_textfield' => $form['form']['example_textfield'],
    ];

    $form['form']['button'] = [
      '#type' => 'submit',
      '#value' => 'Button',
    ];
    $form['form']['button1'] = ['#value' => 'Primary', '#button_type' => 'primary'] + $form['form']['button'];
    $form['form']['button2'] = ['#value' => 'Danger', '#button_type' => 'danger'] + $form['form']['button'];

    $form['form']['actions'] = [
      '#type' => 'actions',
      'button' => $form['form']['button'],
      'button1' => $form['form']['button1'],
      'button2' => $form['form']['button2'],
    ];

    $form['form']['actions1'] = [
      '#type' => 'actions',
      'extra_actions' => [
        '#type' => 'dropbutton',
        '#links' => [
          'simple_form' => [
            'title' => 'Actions Dropbutton Link 1',
            'url' => Url::fromRoute('<front>'),
          ],
          'demo' => [
            'title' => 'Actions Dropbutton Link 2',
            'url' => Url::fromRoute('<front>'),
          ],
        ],
      ],
    ];

    $form['form']['extra_actions'] = [
      '#type' => 'dropbutton',
      '#links' => [
        'simple_form' => [
          'title' => 'Dropbutton Link 1',
          'url' => Url::fromRoute('<front>'),
        ],
        'demo' => [
          'title' => 'Dropbutton Link 2',
          'url' => Url::fromRoute('<front>'),
        ],
      ],
    ];

    $form['text1'] = [
      '#theme' => 'vtech_adjustment_text',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
