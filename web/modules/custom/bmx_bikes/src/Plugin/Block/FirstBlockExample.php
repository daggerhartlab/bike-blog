<?php

namespace Drupal\bmx_bikes\Plugin\Block;

use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Whatever. This is a normal comment.
 *
 * @Block(
 *   id = "first_block_exmaple",
 *   admin_label = "First Block Admin Label",
 * )
 */
class FirstBlockExample extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    $string = 'This works!';
    if (isset($config['reverse_string']) && $config['reverse_string']) {
      $string = strrev($string);
    }

    return [
      '#markup' => $string,
    ];
  }

  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();
    //dump($config);

    return [
      'reverse_string' => [
        '#type' => 'checkbox',
        '#title' => $this->t('Reverse the String'),
        '#default_value' => $config['reverse_string'] ?? FALSE,
      ]
    ];
  }

  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['reverse_string'] = $form_state->getValue('reverse_string');
  }

}
