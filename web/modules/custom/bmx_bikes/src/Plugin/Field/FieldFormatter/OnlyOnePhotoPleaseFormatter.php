<?php declare(strict_types = 1);

namespace Drupal\bmx_bikes\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Markup;

/**
 * Plugin implementation of the 'Only One Photo Please' formatter.
 *
 * @FieldFormatter(
 *   id = "bmx_bikes_only_one_photo_please",
 *   label = @Translation("Only One Photo Please"),
 *   field_types = {
 *     "entity_reference",
 *   },
 * )
 */
final class OnlyOnePhotoPleaseFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode): array {
    /**
     * @var \Drupal\Core\Field\EntityReferenceFieldItemList $items
     * @var \Drupal\media\Entity\Media $media
     * @var \Drupal\file\Entity\File $file
     */
    $media = $items->referencedEntities()[0];
    $file = $media->get('field_media_image')->entity;

    $element = [
      [
        '#type' => 'html_tag',
        '#tag' => 'h2',
        '#value' => 'Only one photo please',
      ],
      [
        '#theme' => 'image_style',
        '#style_name' => 'thumbnail',
        '#uri' => $file->getFileUri(),
        '#width' => NULL,
        '#height' => NULL,
        '#alt' => 'Hello!',
        '#title' => NULL,
        '#attributes' => [],
      ]
    ];

    return $element;
  }

}
