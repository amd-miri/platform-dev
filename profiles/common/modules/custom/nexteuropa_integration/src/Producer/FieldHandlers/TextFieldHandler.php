<?php

/**
 * @file
 * Contains TextFieldHandler.
 */

namespace Drupal\nexteuropa_integration\Producer\FieldHandlers;

/**
 * Class DefaultFieldHandler.
 *
 * @package Drupal\nexteuropa_integration\Producer\FieldHandlers
 */
class TextFieldHandler extends AbstractFieldHandler {

  /**
   * {@inheritdoc}
   */
  public function processField() {

    foreach ($this->getFieldValues() as $value) {
      $this->getDocument()->setField($this->fieldName, $value);
    }
  }

}