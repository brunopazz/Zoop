<?php

namespace Zoop;

/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 02:41
 */
include "../vendor/autoload.php";
$credentials = new Credentials("36401bc3b3aa4d51a55d5ed65210ccac",
    "zpk_test_NkWnSLs3REQwxSnwGTqQqZth", "f90083c033c24bae834a41077e03ba31",
    "PRODUCTION");
$transaction = new Transactions();
$transaction->setAmount(704);
$transaction->setCurrency("BRL");
$transaction->setDescription("kkkk");
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
$transaction->setStatementDescriptor("etste sof");
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
