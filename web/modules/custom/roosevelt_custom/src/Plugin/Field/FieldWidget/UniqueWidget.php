<?php

namespace Drupal\roosevelt_custom\Plugin\Field\FieldWidget;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\AfterCommand;
use Drupal\Core\Ajax\BeforeCommand;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HTMLCommand;
use Drupal\Core\Ajax\RemoveCommand;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\StringTextfieldWidget;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'unique_textfield' widget.
 *
 * @FieldWidget(
 *   id = "unique_textfield",
 *   label = @Translation("Unique Text"),
 *   field_types = {
 *     "string",
 *   },
 * )
 */
class UniqueWidget extends StringTextfieldWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);
    $message = $this->t('The field value will be unique among all entities.');

    if (!empty($element['#value']['#description'])) {
      $element['value']['#description'] = [
        '#theme' => 'item_list',
        '#items' => [$element['value']['#description'], $message],
      ];
    }
    else {
      $element['value']['#description'] = $message;
    }

    $element['value']['#ajax'] = array(
      'callback' => array($this, 'checkIsUnique'),
      'effect' => 'fade',
      'wrapper' => 'unique-validation',
      'method' => 'replace',
      'event' => 'change',
      'progress' => array(
        'type' => 'throbber',
        'message' => null
      ),
    );

    return $element;
  }

  /**
   * Function to validate the Net ID field
   * @param array $form
   * @param FormStateInterface $form_state
   * @return AjaxResponse
   */
  public function checkIsUnique(array $form, FormStateInterface $form_state) {
    $ajax_response = new AjaxResponse();
    $unique = $form_state->getValue('field_netid')[0]['value'];
    $message = '';

    if (isset($unique)) {
      $query = \Drupal::entityQuery('user')
        ->condition('field_netid', $unique);
      $uids = $query->execute();

      if(count($uids) > 0) {
        $message = '<div class="user-form-error unique-invalid">Please enter a unique Net ID</div>';
      }
    }

    $ajax_response->addCommand(new RemoveCommand('.unique-invalid'));
    $ajax_response->addCommand(new AfterCommand('#edit-field-netid-0-value', $message));
    $ajax_response->addCommand(new CssCommand('.unique-invalid', ['color' => 'red']));

    return $ajax_response;
  }

}
