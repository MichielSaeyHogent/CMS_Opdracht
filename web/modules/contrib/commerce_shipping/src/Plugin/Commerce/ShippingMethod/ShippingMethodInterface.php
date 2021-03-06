<?php

namespace Drupal\commerce_shipping\Plugin\Commerce\ShippingMethod;

use Drupal\commerce_shipping\Entity\ShipmentInterface;
use Drupal\commerce_shipping\ShippingRate;
use Drupal\Component\Plugin\ConfigurableInterface;
use Drupal\Component\Plugin\DependentPluginInterface;
use Drupal\Component\Plugin\PluginInspectionInterface;
use Drupal\Core\Plugin\PluginFormInterface;

/**
 * Defines the base interface for shipping methods.
 */
interface ShippingMethodInterface extends ConfigurableInterface, DependentPluginInterface, PluginFormInterface, PluginInspectionInterface, ParentEntityAwareInterface {

  /**
   * Gets the shipping method label.
   *
   * @return mixed
   *   The shipping method label.
   */
  public function getLabel();

  /**
   * Gets the default package type.
   *
   * @return \Drupal\commerce_shipping\Plugin\Commerce\PackageType\PackageTypeInterface
   *   The default package type.
   */
  public function getDefaultPackageType();

  /**
   * Gets the shipping services.
   *
   * @return \Drupal\commerce_shipping\ShippingService[]
   *   The shipping services.
   */
  public function getServices();

  /**
   * Gets the shipment workflow ID.
   *
   * @return string
   *   The shipment workflow ID.
   */
  public function getWorkflowId();

  /**
   * Calculates rates for the given shipment.
   *
   * @param \Drupal\commerce_shipping\Entity\ShipmentInterface $shipment
   *   The shipment.
   *
   * @return \Drupal\commerce_shipping\ShippingRate[]
   *   The rates.
   */
  public function calculateRates(ShipmentInterface $shipment);

  /**
   * Selects the given shipping rate for the given shipment.
   *
   * @param \Drupal\commerce_shipping\Entity\ShipmentInterface $shipment
   *   The shipment.
   * @param \Drupal\commerce_shipping\ShippingRate $rate
   *   The shipping rate.
   */
  public function selectRate(ShipmentInterface $shipment, ShippingRate $rate);

  /**
   * Checks whether the shipping method applies to the given shipment.
   *
   * @param \Drupal\commerce_shipping\Entity\ShipmentInterface $shipment
   *   The shipment.
   *
   * @return bool
   *   TRUE if shipping method applies, FALSE otherwise.
   */
  public function applies(ShipmentInterface $shipment);

}
