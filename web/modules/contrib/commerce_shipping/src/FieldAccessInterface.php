<?php

namespace Drupal\commerce_shipping;

use Drupal\Core\Access\AccessResultInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Runs field access checks on JSON API routes.
 */
interface FieldAccessInterface {

  /**
   * Handles field access.
   *
   * @param string $operation
   *   The operation to be performed. See
   *   \Drupal\Core\Entity\EntityAccessControlHandlerInterface::fieldAccess()
   *   for possible values.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The field definition.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user account to check.
   * @param \Drupal\Core\Field\FieldItemListInterface $items
   *   (optional) The entity field object for which to check access, or NULL if
   *   access is checked for the field definition, without any specific value
   *   available. Defaults to NULL.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public function handle(string $operation, FieldDefinitionInterface $field_definition, AccountInterface $account, FieldItemListInterface $items = NULL): AccessResultInterface;

}
