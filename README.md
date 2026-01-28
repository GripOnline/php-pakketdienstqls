# A PHP client for QLS Pakketdienst

This library provides a PHP client API for QLS Pakketdienst.

# Installing

The library can be installed using Composer:

```sh
$ composer require grip/pakketdienstqls
```

# Usage
Creating a client instance and get available products

```php
$client = new \Grip\PakketdienstQls\Client($username, $password);

// determine available products and product combinations
var_dump($client->getProductsByCompanyId($companyId));
```
Creating a shipment

```php
$shipment = new \Grip\PakketdienstQls\Model\Shipment();

$receiver = new \Grip\PakketdienstQls\Model\Contact();
$receiver->setName('John Doe');
$receiver->setStreet('Main Street');
$receiver->setHouseNumber('123');
$receiver->setPostalCode('1234AB');
$receiver->setLocality('Amsterdam');
$receiver->setCountry('NL');

$shipment->setReceiverContact($receiver);
$shipment->setProductId($productId);
$shipment->setProductCombinationId($productCombinationId);
$shipment->setWeight(1000); // weight in grams
$shipment->setReference('Order #12345');

// store shipment and get PDF label url
$createdShipment = $client->createShipment($companyId, $shipment);
echo $createdShipment->getLabelPdfUrl();
```

Retrieving a shipment to determine its shipment status

```php
$shipment = $client->getShipmentById($companyId, $shipmentId);
// determine shipment status
$status = $shipment->getStatus();
echo $status;
```

Find pickup location points near a postal code

```php
// get service points near a postal code
$productId = 81; // PostNL Pakje Servicepunt
$servicePoints = $client->getServicePointsByProduct($companyId, $productId, 'NL', '2245AD');
var_dump($servicePoints);
```

Find companies to work with

```php
$pageId = 1;
do {
    $companies = $client->getCompanies($pageId);
    foreach ($companies as $company) {
        var_dump($company);
    }
    $page++;
} while ($companies);
```

Get registered webhooks for a company
```php
$webhooks = $client->getWebhooks($companyId);
var_dump($webhooks);
```

Determine webhook types and register a new webhook
```php
$webhookTypes = $client->getWebhookTypes($companyId);
var_dump($webhookTypes);
$client->createWebhook($companyId, 'https://example.com/webhook', $webhookType);
```