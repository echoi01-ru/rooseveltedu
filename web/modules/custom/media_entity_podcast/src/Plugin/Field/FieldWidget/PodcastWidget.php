<?php

namespace Drupal\media_entity_podcast\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\StringTextfieldWidget;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'podcast_textfield' widget.
 *
 * @FieldWidget(
 *   id = "podcast_textfield",
 *   label = @Translation("Podcast URL"),
 *   field_types = {
 *     "string",
 *     "string_long",
 *   },
 * )
 */
class PodcastWidget extends StringTextfieldWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);

    $message = $this->t('You can link to podcast from providers.');

    if (!empty($element['#value']['#description'])) {
      $element['value']['#description'] = [
        '#theme' => 'item_list',
        '#items' => [$element['value']['#description'], $message],
      ];
    }
    else {
      $element['value']['#description'] = $message;
    }

    return $element;
  }

}
