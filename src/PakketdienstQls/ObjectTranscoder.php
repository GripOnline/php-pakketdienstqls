<?php

namespace Grip\PakketdienstQls;

use Grip\PakketdienstQls\Model\Contact;
use Grip\PakketdienstQls\Model\ServicePoint;
use Grip\PakketdienstQls\Model\Webhook;
use Grip\PakketdienstQls\Model\WebhookType;

class ObjectTranscoder
{

    /**
     * @param array $data
     * @return Model\Product
     */
    public function parseCompanyData($data)
    {
        $company = new Model\Company();
        $company->setId($data['id']);
        $company->setName($data['name']);
        $company->setHasFulfillment($data['hasFulfillment']);
        $company->setIsActive($data['isActive']);
        return $company;
    }

    /**
     * @param array $data
     * @return Model\Product
     */
    public function parseProductData($data)
    {

        $product = new Model\Product();
        $product->setId($data['id']);
        $product->setName($data['name']);
        $product->setType($data['type']);
        if (isset($data['servicepoint'])) {
            $product->setForServicepoint($data['servicepoint']);
        }
        if (isset($data['max_height'])) {
            $product->setMaxHeight($data['max_height']);
        }
        if (isset($data['max_width'])) {
            $product->setMaxWidth($data['max_width']);
        }
        if (isset($data['max_length'])) {
            $product->setMaxLength($data['max_length']);
        }

        $pricing = [];
        if (isset($data['pricing'])) {
            foreach ($data['pricing'] as $pricingData) {
                $pricing[] = $this->parseProductPriceData($pricingData);
            }
        }
        $product->setPricing($pricing);

        $options = [];
        if (isset($data['options'])) {
            foreach ($data['options'] as $optionData) {
                $options[] = $this->parseProductOptionData($optionData);
            }
        }
        $product->setOptions($options);

        $combinations = [];
        if (isset($data['combinations'])) {
            foreach ($data['combinations'] as $combinationData) {
                $combination = $this->parseProductCombinationData($combinationData);
                if ($combination) {
                    $combination->setProductId($product->getId());
                    $combinations[] = $combination;
                }
            }
        }
        $product->setCombinations($combinations);

        if (isset($data['product_family'])) {
            $product->setProductFamily($this->parseProductFamilyData($data['product_family']));
        }

        return $product;
    }

    /**
     * @param array $data
     * @return Model\ProductFamily
     */
    public function parseProductFamilyData($data)
    {
        $productFamily = new Model\ProductFamily();
        if (isset($data['id'])) {
            $productFamily->setId($data['id']);
        }
        if (isset($data['name'])) {
            $productFamily->setName($data['name']);
        }
        if (isset($data['target_group_tag'])) {
            $productFamily->setTargetGroupTag($data['target_group_tag']);
        }
        return $productFamily;
    }

    /**
     * @param array $data
     * @return Model\ProductPrice
     */
    public function parseProductPriceData($data)
    {
        $productPrice = new Model\ProductPrice();
        $productPrice->setId($data['id']);
        $productPrice->setCountry($data['country']);
        $productPrice->setPrice($data['price']);
        $productPrice->setMinWeight($data['weight_min']);
        $productPrice->setMaxWeight($data['weight_max']);
        return $productPrice;
    }

    /**
     * @param array $data
     * @return Model\ProductOption
     */
    public function parseProductOptionData($data)
    {
        $productOption = new Model\ProductOption();
        $productOption->setId($data['id']);
        $productOption->setName($data['name']);
        $productOption->setTag($data['tag']);
        $productOption->setPrice($data['price']);
        return $productOption;
    }

    /**
     * @param array $data
     * @return Model\ProductCombination
     */
    public function parseProductCombinationData($data)
    {
        $productCombination = new Model\ProductCombination();
        $productCombination->setId($data['id']);
        $productCombination->setName($data['name']);

        $productOptions = [];
        if (isset($data['options'])) {
            foreach ($data['options'] as $optionData) {
                $productOptions[] = $this->parseProductOptionData($optionData);
            }
        }
        $productCombination->setProductOptions($productOptions);

        return $productCombination;
    }

    /**
     * @param array $data
     * @return Model\ServicePoint
     */
    public function parseServicePointData($data)
    {
        $servicePoint = new ServicePoint();

        $servicePoint->setCode($data['servicepoint_code']);
        $servicePoint->setName($data['name']);

        if (isset($data['address'])) {
            $servicePoint->setAddress($this->parseAddress($data['address']));
        }

        if (isset($data['geo'])) {
            $servicePoint->setGeo($this->parseGeo($data['geo']));
        }

        $openingTimes = [];

        if (isset($data['times'])) {
            foreach ($data['times'] as $openingTimeData) {
                $openingTimes[] = $this->parseOpeningTime($openingTimeData);
            }
        }

        $servicePoint->setOpeningTimes($openingTimes);
        $servicePoint->setProductId($data['productId']);
        $servicePoint->setProductName($data['productName']);

        return $servicePoint;
    }

    /**
     * @param array $data
     * @return Model\Address
     */
    public function parseAddress($data)
    {
        $address = new Model\Address();
        $address->setStreet($data['street']);
        $address->setHousenumber($data['housenumber']);
        $address->setPostalcode($data['postalcode']);
        $address->setLocality($data['locality']);
        $address->setCountry($data['country']);
        return $address;
    }

    /**
     * @param array $data
     * @return Model\Geo
     */
    public function parseGeo($data)
    {
        $geo = new Model\Geo();
        $geo->setLat($data['lat']);
        $geo->setLong($data['long']);
        return $geo;
    }

    /**
     * @param array $data
     * @return Model\OpeningTime
     */
    public function parseOpeningTime($data)
    {
        $openingTime = new Model\OpeningTime();
        $openingTime->setWeekday($data['weekday']);
        $openingTime->setFormatted($data['formatted']);
        $openingTime->setFrom($data['from']);
        $openingTime->setTo($data['to']);
        return $openingTime;
    }

    /**
     * @param array $data
     * @return Model\Brand
     */
    public function parseBrandData($data)
    {
        $brand = new Model\Brand();
        $brand->setId($data['id']);
        $brand->setName($data['name']);
        return $brand;
    }

    /**
     * @param array $data
     * @return Model\Shipment
     */
    public function parseShipmentData($data)
    {

        $shipment = new Model\Shipment();

        if (isset($data['id'])) {
            $shipment->setId($data['id']);
        }

        if (isset($data['company_id'])) {
            $shipment->setCompanyId($data['company_id']);
        }

        if (isset($data['status'])) {
            $shipment->setStatus($data['status']);
        }

        if (isset($data['barcode'])) {
            $shipment->setBarcode($data['barcode']);
        }

        if (isset($data['tracking_url'])) {
            $shipment->setTrackingUrl($data['tracking_url']);
        }

        if (isset($data['type'])) {
            $shipment->setType($data['type']);
        }

        if (isset($data['label_pdf_url'])) {
            $shipment->setLabelPdfUrl($data['label_pdf_url']);
        } else if (isset($data['label'])) {
            $shipment->setLabelPdfUrl($data['label']);
        }

        if (isset($data['label_zpl_url'])) {
            $shipment->setLabelZplUrl($data['label_zpl_url']);
        } else if (isset($data['label_zpl'])) {
            $shipment->setLabelZplUrl($data['label_zpl']);
        }

        if (isset($data['return_contact'])) {
            $shipment->setReturnContact($this->parseContactData($data['return_contact']));
        }

        if (isset($data['sender_contact'])) {
            $shipment->setSenderContact($this->parseContactData($data['sender_contact']));
        }

        if (isset($data['receiver_contact'])) {
            $shipment->setReceiverContact($this->parseContactData($data['receiver_contact']));
        }

        if (isset($data['delivery_contact'])) {
            $shipment->setDeliveryContact($this->parseContactData($data['delivery_contact']));
        }

        if (isset($data['product'])) {
            $shipment->setProduct($this->parseProductData($data['product']));
        }

        if (isset($data['reference'])) {
            $shipment->setReference($data['reference']);
        }

        if (isset($data['weight'])) {
            $shipment->setWeight($data['weight']);
        }

        if (isset($data['product_id'])) {
            $shipment->setProductId($data['product_id']);
        }

        if (isset($data['product_combination_id'])) {
            $shipment->setProductCombinationId($data['product_combination_id']);
        }

        if (isset($data['brand_id'])) {
            $shipment->setBrandId($data['brand_id']);
        }

        if (isset($data['cod_amount'])) {
            $shipment->setCodAmount($data['cod_amount']);
        }

        if (isset($data['tracking_id'])) {
            $shipment->setTrackingId($data['tracking_id']);
        }

        if (isset($data['created'])) {
            $shipment->setCreated(new \DateTime($data['created']));
        }

        if (isset($data['modified'])) {
            $shipment->setModified(new \DateTime($data['modified']));
        }

        return $shipment;
    }

    /**
     * @param array $data
     * @return Model\Contact
     */
    public function parseContactData($data)
    {

        $contact = new Contact();

        $contact->setName($data['name']);
        $contact->setCompanyname($data['companyname']);
        $contact->setStreet($data['street']);
        $contact->setHousenumber($data['housenumber']);
        $contact->setPostalcode($data['postalcode']);
        $contact->setLocality($data['locality']);
        $contact->setCountry($data['country']);
        if (isset($data['email'])) {
            $contact->setEmail($data['email']);
        }
        if (isset($data['phone'])) {
            $contact->setPhone($data['phone']);
        }
        if (isset($data['vat'])) {
            $contact->setVat($data['vat']);
        }
        if (isset($data['eori'])) {
            $contact->setEori($data['eori']);
        }
        if (isset($data['oss'])) {
            $contact->setOss($data['oss']);
        }
        if (isset($data['type'])) {
            $contact->setType($data['type']);
        }

        return $contact;
    }

    /**
     * @param Model\Shipment $shipment
     * @return array
     */
    public function getShipmentData($shipment)
    {

        $data = [];

        $data['reference'] = $shipment->getReference();
        $data['weight'] = $shipment->getWeight();
        $data['product_id'] = $shipment->getProductId();
        $data['product_combination_id'] = $shipment->getProductCombinationId();
        $data['brand_id'] = $shipment->getBrandId();
        $data['cod_amount'] = $shipment->getCodAmount();

        if ($shipment->getReturnContact()) {
            $data['return_contact'] = $this->getContactData($shipment->getReturnContact());
        }

        if ($shipment->getSenderContact()) {
            $data['sender_contact'] = $this->getContactData($shipment->getSenderContact());
        }

        if ($shipment->getReceiverContact()) {
            $data['receiver_contact'] = $this->getContactData($shipment->getReceiverContact());
        }

        if ($shipment->getZplDirect() !== null) {
            $data['zpl_direct'] = $shipment->getZplDirect();
        }

        if ($shipment->getServicePointCode()) {
            $data['servicepoint_code'] = $shipment->getServicePointCode();
        }
        if ($shipment->getStatus() != null) {
            $data['status'] = $shipment->getStatus();
        }
        if ($shipment->getTrackingId() != null) {
            $data['tracking_id'] = $shipment->getTrackingId();
        }
        if ($shipment->getTrackingUrl() != null) {
            $data['tracking_url'] = $shipment->getTrackingUrl();
        }
        if ($shipment->getServicePointCode() != null) {
            $data['servicepoint_code'] = $shipment->getServicePointCode();
        }

        return $data;
    }

    /**
     * @param Model\Contact $contact
     * @return array
     */
    public function getContactData($contact)
    {

        $data = [];

        $data['name'] = $contact->getName();
        $data['companyname'] = $contact->getCompanyname();
        $data['street'] = $contact->getStreet();
        $data['housenumber'] = $contact->getHousenumber();
        $data['postalcode'] = $contact->getPostalcode();
        $data['locality'] = $contact->getLocality();
        $data['country'] = $contact->getCountry();
        $data['email'] = $contact->getEmail();
        $data['phone'] = $contact->getPhone();
        $data['vat'] = $contact->getVat();
        $data['eori'] = $contact->getEori();
        $data['oss'] = $contact->getOss();

        return $data;
    }

    /**
     * @param array $data
     * @return Model\WebhookType
     */
    public function parseWebhookTypeData($data)
    {
        $webhookType = new Model\WebhookType();
        $webhookType->setId($data['id']);
        $webhookType->setAction($data['action']);
        return $webhookType;
    }

    /**
     *
     * @param array $data
     * @return Webhook
     */
    public function parseWebhookData($data)
    {

        $webhook = new Model\Webhook();
        $webhook->setId($data['id']);
        $webhook->setUrl($data['url']);

        if (isset($data['type'])) {
            $webhookType = $this->parseWebhookTypeData($data['type']);
            $webhook->setType($webhookType);
        }

        return $webhook;
    }
}
