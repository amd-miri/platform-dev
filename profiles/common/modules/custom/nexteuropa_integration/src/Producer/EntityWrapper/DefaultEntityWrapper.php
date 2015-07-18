<?php

/**
 * @file
 * Contains DefaultEntityWrapper.
 */

namespace Drupal\nexteuropa_integration\Producer\EntityWrapper;

/**
 * Class DefaultEntityWrapper.
 *
 * @package Drupal\nexteuropa_integration\Producer\EntityWrapper
 */
class DefaultEntityWrapper extends \EntityDrupalWrapper implements EntityWrapperInterface {

  /**
   * Default Entity Wrapper date format.
   *
   * Date format can be overridden by setting the 'default_date_format' value
   * on the $info array, to be passed in the object constructor.
   *
   * @see parent::__construct()
   */
  const DEFAULT_DATE_FORMAT = 'Y-m-d H:i:s';

  /**
   * Translation handler instance.
   *
   * @var \EntityTranslationHandlerInterface
   *   A class implementing EntityTranslationHandlerInterface.
   */
  protected $translationHandler = NULL;

  /**
   * Construct a new EntityDrupalWrapper object.
   *
   * @param string $type
   *   The type of the passed data.
   * @param object $data
   *   Optional. The entity to wrap or its identifier.
   * @param mixed $info
   *   Optional. Used internally to pass info about properties down the tree.
   */
  public function __construct($type, $data = NULL, $info = array()) {
    parent::__construct($type, $data, $info);
    $this->translationHandler = entity_translation_get_handler($type, $data);
    $this->setUp();
  }

  /**
   * {@inheritdoc}
   */
  public function isProperty($name) {
    return in_array($name, $this->getPropertyList());
  }

  /**
   * {@inheritdoc}
   */
  public function getProperty($name) {
    if ($this->isProperty($name)) {
      $info = $this->getPropertyInfo($name);
      switch ($info['type']) {

        // Format and return a date properties.
        case 'date':
          $format = isset($this->info['default_date_format']) ? $this->info['default_date_format'] : self::DEFAULT_DATE_FORMAT;
          return date($format, $this->get($name)->value());

        // By default simply return all other property types.
        default:
          return $this->get($name)->value();
      }
    }
    return '';
  }

  /**
   * {@inheritdoc}
   */
  public function getPropertyList() {
    $properties = array();
    foreach ($this->propertyInfo['properties'] as $name => $info) {
      if (!isset($info['field'])) {
        $properties[] = $name;
      }
    }
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function getFieldList() {

    $fields = array();
    foreach ($this->propertyInfo['properties'] as $name => $info) {
      if (isset($info['field']) && $info['field']) {
        $fields[] = $name;
      }
    }
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function isField($name) {
    return in_array($name, $this->getFieldList());
  }

  /**
   * {@inheritdoc}
   */
  public function getField($name, $language = NULL) {
    $this->language($language);
    $value = $this->{$name}->value();
    $this->language($this->translationHandler->getDefaultLanguage());
    return $value;
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailableLanguages() {
    $translations = $this->translationHandler->getTranslations();
    return array_keys($translations->data);
  }

  /**
   * {@inheritdoc}
   */
  public function getDefaultLanguage() {
    return $this->translationHandler->getDefaultLanguage();
  }

}