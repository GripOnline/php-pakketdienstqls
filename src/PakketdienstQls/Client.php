<?php

namespace Grip\PakketdienstQls;

use Grip\PakketdienstQls\Model\Company;
use Grip\PakketdienstQls\Model\Product;
use Grip\PakketdienstQls\Model\ServicePoint;
use Grip\PakketdienstQls\Model\Shipment;

class Client
{

    /**
     * @var string
     */
    const BASE_URI = 'https://api.pakketdienstqls.nl';

    private $username;

    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function request($method, $endpoint, $data = [])
    {

        $method = strtoupper($method);

        $headers = [];
        $headers[] = 'Authorization: Basic ' . base64_encode("$this->username:$this->password");
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';

        $options = [
            'http' => [
                'header' => implode("\r\n", $headers),
                'method' => $method,
                'ignore_errors' => true
            ]
        ];

        if ($method === 'POST') {
            $options['http']['method'] = 'POST';
            $options['http']['content'] = json_encode($data);
        }

        $context = stream_context_create($options);

        $http_response_header = null;

        $json = file_get_contents(self::BASE_URI . '/' . $endpoint, false, $context);

        $responseCode = null;

        if ($http_response_header) {

            $responseCode = explode(' ', $http_response_header[0])[1];
        }

        if ($responseCode !== '200') {

            // throw new \Exception("Request failed with response code $responseCode");
        }

        $res = null;

        if ($json) {

            $res = json_decode($json, true);
        }

        return $res;
    }

    /**
     * Send a GET request.
     *
     * @param string $endpoint
     *
     * @return array
     */
    public function get($endpoint)
    {
        return $this->request('GET', $endpoint);
    }

    /**
     * Send a GET request.
     *
     * @param string $endpoint
     *
     * @return array
     */
    public function post($endpoint, $data)
    {
        return $this->request('POST', $endpoint, $data);
    }

    /**
     * Get companies.
     *
     * @param int $page = 1
     *
     * @return Company[]
     */
    public function getCompanies($page = 1)
    {
        $companies = [];

        $res = $this->get("companies?page=$page");

        if ($res) {

            $parser = new ObjectTranscoder();

            foreach ($res['data'] as $companyData) {

                $company = $parser->parseCompanyData($companyData);

                $companies[] = $company;
            }
        }

        return $companies;
    }

    /**
     * @param string $companyId
     * @return Company
     */
    public function getCompanyById($companyId)
    {
        $company = null;

        $res = $this->get("companies/$companyId");

        if ($res && isset($res['data'])) {

            $companyData = $res['data'];

            $parser = new ObjectTranscoder();

            $company = $parser->parseCompanyData($companyData);
        }

        return $company;
    }

    /**
     * Get brands by company id.
     * @param string $companyId
     * @return Brand[]
     */
    public function getBrandsByCompanyId($companyId)
    {

        $brands = [];

        $res = $this->get("companies/$companyId/brands");

        if ($res) {

            $parser = new ObjectTranscoder();

            foreach ($res['data'] as $brandData) {

                $brand = $parser->parseBrandData($brandData);

                $brands[] = $brand;
            }
        }

        return $brands;
    }

    /**
     * Get brand by id.
     * @param string $companyId
     * @param string $brandId
     * @return Brand
     */
    public function getBrandById($companyId, $brandId)
    {
        $brand = null;

        $res = $this->get("companies/$companyId/brands/$brandId");

        if ($res && isset($res['data'])) {

            $brandData = $res['data'];

            $parser = new ObjectTranscoder();

            $brand = $parser->parseBrandData($brandData);
        }

        return $brand;
    }

    /**
     * Get products.
     * @return Product[]
     */
    public function getProductsByCompanyId($companyId)
    {
        $products = [];

        $res = $this->get("companies/$companyId/products");

        if ($res && isset($res['data'])) {

            $parser = new ObjectTranscoder();

            foreach ($res['data'] as $productData) {

                $product = $parser->parseProductData($productData);

                $products[] = $product;
            }
        }

        return $products;
    }

    /**
     * Get service points for a postal code
     * @param string $companyId
     * @param string $country
     * @param string $postalCode
     * @return ServicePoint[]
     */
    public function getServicePoints($companyId, $country, $postalCode)
    {

        $servicePoints = [];

        $res = $this->get("companies/$companyId/service-points/$country/$postalCode");

        if ($res) {

            $parser = new ObjectTranscoder();

            foreach ($res['data'] as $servicePointData) {

                $servicePoint = $parser->parseServicePointData($servicePointData);

                $servicePoints[] = $servicePoint;
            }
        }

        return $servicePoints;
    }

    /**
     * Get service points for a specific product
     * @param string $companyId
     * @param int $productId
     * @param string $country
     * @param string $postalCode
     * @return ServicePoint[]
     */
    public function getServicePointsByProduct($companyId, $productId, $country, $postalCode)
    {

        $servicePoints = [];

        $endpoint = "companies/$companyId/products/$productId/service-points/$country/$postalCode";

        $res = $this->get($endpoint);

        if ($res) {

            $parser = new ObjectTranscoder();

            foreach ($res['data'] as $servicePointData) {

                $servicePoint = $parser->parseServicePointData($servicePointData);

                $servicePoints[] = $servicePoint;
            }
        }

        return $servicePoints;
    }

    /**
     * Create a shipment
     * @param string $companyId
     * @param Shipment $shipment
     * @return Shipment The created shipment
     * @throws \Exception If the response format is unexpected
     */
    public function createShipment($companyId, $shipment)
    {

        $createdShipment = null;

        $transcoder = new ObjectTranscoder();

        $shipmentData = $transcoder->getShipmentData($shipment);

        $res = $this->post("v2/companies/$companyId/shipments", $shipmentData);

        if ($res) {

            if (isset($res['data'])) {

                $createdShipment = $transcoder->parseShipmentData($res['data']);
            } else {
                // Handle the case where 'data' is not set in the response
                // This could be an error or a different structure than expected
                throw new \Exception("Unexpected response format: " . json_encode($res));
            }
        }

        return $createdShipment;
    }

    /**
     * Get a shipment by id
     * @param string $companyId
     * @param string $shipmentId
     * @param bool $returnShipmentLabel
     * @return Shipment
     */
    public function getShipmentById($companyId, $shipmentId, $returnShipmentLabel = false)
    {
        $shipment = null;

        $endpoint = "companies/$companyId/shipments/$shipmentId";

        if ($returnShipmentLabel) {
            $endpoint .= '?returnShipmentLabel=true';
        }

        $res = $this->get($endpoint);

        if ($res && isset($res['data'])) {

            $transcoder = new ObjectTranscoder();

            $shipment = $transcoder->parseShipmentData($res['data']);
        }

        return $shipment;
    }

    /**
     * Get a shipment by id
     * @param string $companyId
     * @return WebhookType[]
     */
    public function getWebhookTypes($companyId)
    {
        $webhookTypes = [];

        $endpoint = "v2/companies/$companyId/webhook-types";

        $res = $this->get($endpoint);

        if ($res && isset($res['data']) && is_array($res['data'])) {

            $transcoder = new ObjectTranscoder();

            foreach ($res['data'] as $data) {
                $webhookType = $transcoder->parseWebhookTypeData($data);

                if ($webhookType) {
                    $webhookTypes[] = $webhookType;
                }
            }
        }

        return $webhookTypes;
    }

    /**
     * Create a webhook
     * @param mixed $companyId
     * @param mixed $url
     * @param mixed $typeId
     * @return Webhook
     */
    public function createWebhook($companyId, $url, $typeId)
    {

        $createdWebhook = null;

        $transcoder = new ObjectTranscoder();

        $webhookData = [];
        $webhookData['url'] = $url;
        $webhookData['type_id'] = $typeId;

        $res = $this->post("v2/companies/$companyId/webhooks", $webhookData);

        if ($res) {

            if (isset($res['id'])) {

                $createdWebhook = $transcoder->parseWebhookData($res);
            }
        }

        return $createdWebhook;
    }

    /**
     * Get a shipment by id
     * @param string $companyId
     * @return WebhookType[]
     */
    public function getWebhooks($companyId)
    {
        $webhooks = [];

        $endpoint = "v2/companies/$companyId/webhooks";

        $res = $this->get($endpoint);

        if ($res && isset($res['data']) && is_array($res['data'])) {

            $transcoder = new ObjectTranscoder();

            foreach ($res['data'] as $data) {
                $webhook = $transcoder->parseWebhookData($data);

                if ($webhook) {
                    $webhooks[] = $webhook;
                }
            }
        }

        return $webhooks;
    }

    /**
     * Delete a webhook
     * @param string $companyId
     * @param string $webhookId
     * @return bool
     */
    public function deleteWebhook($companyId, $webhookId)
    {
        $res = $this->request('DELETE', "v2/companies/$companyId/webhooks/$webhookId");

        return $res;
    }
}
