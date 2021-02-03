
#### Composer
```
$ composer require "brunopazz/zoop-sdk"
```

## credit card + Split

````php
$credentials = new Credentials("xxx","zpk_test_xxxx", "xxxxxx","PRODUCTION");
$transaction = new Transactions();
$transaction->setAmount(704);
$transaction->setCurrency("BRL");
$transaction->setDescription("MinhaLoja");
$transaction->setPaymentType("credit");
$transaction->setCapture(true);
$transaction->setOnBehalfOf("f90083c033c24bae834a41077e03ba31");
$transaction->setReferenceId("ref1234".rand(1,100000));
$transaction->setUsage("single_use");
$transaction->setType("card");
$transaction->setCardNumber("4916521617351812");
$transaction->setHolderName("Teste card");
$transaction->setExpirationMonth("10");
$transaction->setExpirationYear("22");
$transaction->setSecurityCode("123");
$transaction->setStatementDescriptor("MinhaLoja");
$transaction->setInstallmentPlan("with_interest", "12");

$zoop = new Zoop($credentials);

$authorize = $zoop->Authorize($transaction);
//$capture = $zoop->Capture($authorize->getOnBehalfOf(),$authorize->getId(),$authorize->getAmount()*100);
//$cancel = $zoop->Cancel($capture->getOnBehalfOf(),$capture->getId(),$capture->getAmount()*100);

$split = new Split();
$split->setLiable(true)
    ->setAmount(100)
    ->setChargeProcessingFee(true)
    //->setPercentage(50)
    ->setRecipient("0a4775ddea084632973fca5b384847fd");
$splitResponse = $zoop->Split($split,$authorize->getId());

if($splitResponse->hasSplitted()){
    print "OK";
}else
    print $splitResponse->toJSON();
````

## Boleto Bancário + Split
`````php
$credentials = new Credentials("xxx","zpk_test_xxxx", "xxxxxx","PRODUCTION");

$transaction = new Boleto();
$transaction->setAmount(704);
$transaction->setCurrency("BRL");
$transaction->setDescription("minhaloja");
$transaction->setPaymentType("boleto");
$transaction->setOnBehalfOf("f90083c033c24bae834a41077e03ba31");
$transaction->setExpirationDate("2019-11-20");
$transaction->setPaymentLimitDate("2019-11-20");
$transaction->setBodyInstructions("teste de instrucao");

$customer = new Customer();
$customer->setFirstName("Bruno Teste");
$customer->setTaxpayerId("30628284812");
$customer->setEmail("minhaloja@gmail.com");
$customer->setAddressLine1("ruas de testes");
$customer->setAddressLine2("bairro teste");
$customer->setAddressNeighborhood("centro");
$customer->setAddressCity("Sao paulo");
$customer->setAddressState("SP");
$customer->setAddressPostalCode("04742350");
$customer->setAddressCountryCode("BR");


$zoop = new Zoop($credentials);

$authorize = $zoop->Boleto($transaction,$customer);



$split = new Split();
$split->setLiable(true)
    ->setAmount(100)
    ->setChargeProcessingFee(true)
    //->setPercentage(50)
    ->setRecipient("0a4775ddea084632973fca5b384847fd");

$splitResponse = $zoop->Split($split,$authorize->getId());

if($splitResponse->hasSplitted()){
    print "OK";
}else
    print $splitResponse->toJSON();
`````

### Seller (IN DEVELOPMENT)

````php 
$credentials = new Credentials("xxx","zpk_test_xxxx", "xxxxxx","PRODUCTION");
$seller = new Seller($credentials);
print_r($seller->getById("0c2fb87678664ce694c3ace391923f9d"));

````

### Zero Dolar Auth

````php 
$credentials = new Credentials("xxx","zpk_test_xxxx", "xxxxxx","PRODUCTION");



$card = new Card();
$card->setCardNumber("4916521617351812");
$card->setHolderName("Teste card");
$card->setExpirationMonth("12");
$card->setExpirationYear("28");
$card->setSecurityCode("188");

$customer = new Customer();
$customer->setFirstName("Bruno");
$customer->setLastName("Paz");
$customer->setTaxpayerId("23628284802");
$customer->setEmail("minhaloja@gmail.com");
//$customer->setAddressLine1("ruas de testes");
//$customer->setAddressLine2("bairro teste");
//$customer->setAddressNeighborhood("centro");
//$customer->setAddressCity("Sao paulo");
//$customer->setAddressState("SP");
//$customer->setAddressPostalCode("08742350");
//$customer->setAddressCountryCode("BR");



$zoop = new Zoop($credentials);

$ZeroAuth = $zoop->ZeroDolarAuth($card,$customer);



if($ZeroAuth->isValidCard()){

    $transaction = new Transactions();
    $transaction->setAmount(704);
    $transaction->setCurrency("BRL");
    $transaction->setDescription("minhaloja");
    $transaction->setPaymentType("credit");
    $transaction->setCapture(true);
    $transaction->setOnBehalfOf("f90083c033c24bae834a41077e03ba31");
    $transaction->setReferenceId("ref1234".rand(1,100000));
    $transaction->setCustomer($ZeroAuth->getCustomer());
    $transaction->setStatementDescriptor("minhaloja");
    $transaction->setInstallmentPlan("with_interest", "12");

    $zoop = new Zoop($credentials);

    $authorize = $zoop->Authorize($transaction);

    if($authorize->isAuthorized()){

        $split = new Split();
        $split->setLiable(true)
            //->setAmount(100)
            ->setChargeProcessingFee(true)
            ->setPercentage(50)
            ->setRecipient("0a4775ddea084632973fca5b384847fd");

        $splitResponse = $zoop->Split($split,$authorize->getId());
        print $splitResponse->toJSON();
    }else{
        print $authorize->toJSON();
    }
}
````
## Split

````php
...

$split = new Split();
$split->setLiable(true)
    ->setAmount(100)
    ->setChargeProcessingFee(true)
    //->setPercentage(50)
    ->setRecipient("0a4775ddea084632973fca5b384847fd");
$splitResponse = $zoop->Split( $split, "{TRANSACTION_ID}");

if($splitResponse->hasSplitted()){
    print "OK";
}else
    print $splitResponse->toJSON();
````