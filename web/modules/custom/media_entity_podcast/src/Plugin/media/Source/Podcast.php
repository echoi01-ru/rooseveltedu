<?php

namespace Drupal\media_entity_podcast\Plugin\media\Source;

use Drupal\Core\Entity\Display\EntityFormDisplayInterface;
use Drupal\Core\Entity\Display\EntityViewDisplayInterface;
use Drupal\media\MediaInterface;
use Drupal\media\MediaSourceBase;
use Drupal\media\MediaTypeInterface;

/**
  * External podcast entity media source.
  *
  * @see \Drupal\media\MediaInterface
  *
  * @MediaSource(
  *   id = "podcast",
  *   label = @Translation("Podcast"),
  *   description = @Translation("Podcast media type."),
  *   allowed_field_types = {"string", "string_long"},
  *   thumbnail_alt_metadata_attribute = "alt",
  *   default_thumbnail_filename = "podcast.png"
  * )
  */

class Podcast extends MediaSourceBase {
  
  public function getMetadataAttributes() {
    return [
      'type' => $this->t('Resource type'),
      'title' => $this->t('Podcast Title'),
      'series_title' => $this->t('Podcast Series Title'),
      'series_image' => $this->t('Podcast Series Image'),
      'series_description' => $this->t('Podcast Series Description'),
      'date' => $this->t('Published Date'),
      'more' => $this->t('Learn more'),
      'description' => $this->t('Description'),
      'keywords' => $this->t('Additional Keywords'),
      'id' => $this->t('ID'),
      'url' => $this->t('The source URL of the resource'),
      'width' => $this->t('The width of the resource'),
      'height' => $this->t('The height of the resource'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareViewDisplay(MediaTypeInterface $type, EntityViewDisplayInterface $display) {
    $display->setComponent($this->getSourceFieldDefinition($type)->getName(), [
      'type' => 'podcast',
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function prepareFormDisplay(MediaTypeInterface $type, EntityFormDisplayInterface $display) {
    parent::prepareFormDisplay($type, $display);
    $source_field = $this->getSourceFieldDefinition($type)->getName();

    $display->setComponent($source_field, [
      'type' => 'podcast_textfield',
      'weight' => $display->getComponent($source_field)['weight'],
    ]);
    $display->removeComponent('name');
  }

}
