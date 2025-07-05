<?php

namespace Grip\PakketdienstQls\Model;

class Shipment
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $productId;

    /**
     * @var int
     */
    private $productCombinationId;

    /**
     * @var string
     */
    private $companyId;

    /**
     * @var string
     */
    private $brandId;

    /**
     * @var string
     */
    private $barcode;

    /**
     * @var string
     */
    private $trackingUrl;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $servicePointCode;

    /**
     * @var string
     */
    private $reference;

    /**
     * Weight in gram
     * @var int
     */
    private $weight;

    /**
     * The cash on delivery amount in euros
     * @var float
     */
    private $codAmount;

    /**
     * Invoice number used for customs
     * @var string
     */
    private $customsInvoiceNumber;

    /**
     * Either: commercial, documents, return, sample
     * @var string
     */
    private $customsShipmentType;

    /**
     * @var string
     */
    private $labelPdfUrl;

    /**
     * @var string
     */
    private $labelZplUrl;

    /**
     * @var Contact
     */
    private $returnContact;

    /**
     * @var Contact
     */
    private $senderContact;

    /**
     * @var Contact
     */
    private $receiverContact;

    /**
     * @var Contact
     */
    private $deliveryContact;

    /**
     * @var Product
     */
    private $product;

    /**
     * @var string
     */
    private $trackingId;

    /**
     * Whether you want to get the zpl label in the same request or not
     * @var bool
     */
    private $zplDirect;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $modified;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return int
     */
    public function getProductCombinationId()
    {
        return $this->productCombinationId;
    }

    /**
     * @param int $productCombinationId
     */
    public function setProductCombinationId($productCombinationId)
    {
        $this->productCombinationId = $productCombinationId;
    }

    /**
     * @return string
     */
    public function getTrackingId()
    {
        return $this->trackingId;
    }

    /**
     * @param string $trackingId
     */
    public function setTrackingId($trackingId)
    {
        $this->trackingId = $trackingId;
    }

    /**
     * @return string
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @return string
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @param string $brandId
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;
    }

    /**
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return string
     */
    public function getTrackingUrl()
    {
        return $this->trackingUrl;
    }

    /**
     * @param string $trackingUrl
     */
    public function setTrackingUrl($trackingUrl)
    {
        $this->trackingUrl = $trackingUrl;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getLabelPdfUrl()
    {
        return $this->labelPdfUrl;
    }

    /**
     * @param string $labelPdfUrl
     */
    public function setLabelPdfUrl($labelPdfUrl)
    {
        $this->labelPdfUrl = $labelPdfUrl;
    }

    /**
     * @return string
     */
    public function getLabelZplUrl()
    {
        return $this->labelZplUrl;
    }

    /**
     * @param string $labelZplUrl
     */
    public function setLabelZplUrl($labelZplUrl)
    {
        $this->labelZplUrl = $labelZplUrl;
    }

    /**
     * @return string
     */
    public function getServicePointCode()
    {
        return $this->servicePointCode;
    }

    /**
     * @param string $servicePointCode
     */
    public function setServicePointCode($servicePointCode)
    {
        $this->servicePointCode = $servicePointCode;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getCodAmount()
    {
        return $this->codAmount;
    }

    /**
     * @param float $codAmount
     */
    public function setCodAmount($codAmount)
    {
        $this->codAmount = $codAmount;
    }

    /**
     * @return string
     */
    public function getCustomsInvoiceNumber()
    {
        return $this->customsInvoiceNumber;
    }

    /**
     * @param string $customsInvoiceNumber
     */
    public function setCustomsInvoiceNumber($customsInvoiceNumber)
    {
        $this->customsInvoiceNumber = $customsInvoiceNumber;
    }

    /**
     * @return string
     */
    public function getCustomsShipmentType()
    {
        return $this->customsShipmentType;
    }

    /**
     * @param string $customsShipmentType
     */
    public function setCustomsShipmentType($customsShipmentType)
    {
        $this->customsShipmentType = $customsShipmentType;
    }

    /**
     * @return Contact
     */
    public function getReturnContact()
    {
        return $this->returnContact;
    }

    /**
     * @param Contact $returnContact
     */
    public function setReturnContact($returnContact)
    {
        $this->returnContact = $returnContact;
    }

    /**
     * @return Contact
     */
    public function getSenderContact()
    {
        return $this->senderContact;
    }

    /**
     * @param Contact $senderContact
     */
    public function setSenderContact($senderContact)
    {
        $this->senderContact = $senderContact;
    }

    /**
     * @return Contact
     */
    public function getReceiverContact()
    {
        return $this->receiverContact;
    }

    /**
     * @param Contact $receiverContact
     */
    public function setReceiverContact($receiverContact)
    {
        $this->receiverContact = $receiverContact;
    }

    /**
     * @return Contact
     */
    public function getDeliveryContact()
    {
        return $this->deliveryContact;
    }

    /**
     * @param Contact $deliveryContact
     */
    public function setDeliveryContact($deliveryContact)
    {
        $this->deliveryContact = $deliveryContact;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return bool
     */
    public function getZplDirect()
    {
        return $this->zplDirect;
    }

    /**
     * @param bool $zplDirect
     */
    public function setZplDirect($zplDirect)
    {
        $this->zplDirect = $zplDirect;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param \DateTime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }
}
