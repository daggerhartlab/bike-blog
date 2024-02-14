<?php declare(strict_types = 1);

namespace Drupal\bmx_bikes\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a second block example block.
 *
 * @Block(
 *   id = "bmx_bikes_second_block_example",
 *   admin_label = @Translation("Second Block Example"),
 *   category = @Translation("Custom"),
 * )
 */
final class SecondBlockExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $build['content'] = [
      '#markup' => $this->t('It works!'),
    ];
    return $build;
  }

}
