<?php

/**
 * @file
 * Contains MappingHandlerInterface.
 */

namespace Drupal\integration\Consumer\MappingHandler;

use Drupal\integration\Consumer\Consumer;

/**
 * Interface MappingHandlerInterface.
 *
 * @package Drupal\integration\Consumer
 */
interface MappingHandlerInterface {

  /**
   * Process current mapping.
   *
   * @param string $destination_field
   *    Destination field name.
   * @param string|null $source_field
   *    Source field name.
   */
  public function process($destination_field, $source_field = NULL);

  /**
   * Return consumer object instance the mapping handler was constructed with.
   *
   * @return Consumer
   *    Consumer object.
   */
  public function getConsumer();

}