<?php

namespace Drupal\roosevelt_migrate\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 *
 * @MigrateProcessPlugin(
 *   id = "media_directory"
 * )
 */
class MediaDirectoryTerm extends ProcessPluginBase {
  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $properties = [];
    // Explode the path to get the pieces which represent the taxonomy terms
    // as well as the path.
    $path = explode('/', $row->getSourceProperty('path'));

    if (count($path) > 0) {
      // The second from last piece is always the term name we need.
      if ($term_name = $path[count($path) - 2]) {
        $properties['name'] = $term_name;
        $terms = \Drupal::entityManager()->getStorage('taxonomy_term')->loadByProperties($properties);
        $term = reset($terms);
      }


      return [
        'target_id' => !empty($term) ? $term->id() : 0,
      ];
    }

    return 0;
  }

}
