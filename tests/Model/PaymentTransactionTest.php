<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class PaymentTransactionTest extends TestCase
{
    public function testShouldCreatePaymentTransactionObjectWithConstructorSuccessfully()
    {
        $paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction([
            'amount' => 100.0,
            'order_id' => '123456',
            'callback_url' => 'http://localhost',
            'antifraud' => [
                'fingerprint' => '123',
                'provider' => 'test',
            ],
            'payment' => [
                'type' => 'card',
                'method' => 'visa',
                'card' => [
                    'holder' => 'teste',
                    'number' => '123',
                    'cvv' => '123',
                ],
                'boleto' => [
                    'due_date' => '2018-07-31',
                    'instructions' => [
                        ['instruction' => 'Instruções 1'],
                        ['instruction' => 'Instruções 2'],
                    ]
                ],
            ],
            'customer' => [
                'name' => 'Lívia Julia Eduarda Barros',
                'cpf_cnpj' => '074.598.263-83',
                'billing_address' =>
                    [
                        'street' => 'Rua A',
                    ],
                'shipping_address' =>
                    [
                        'street' => 'Rua A',
                    ],
            ],
            'products' => [
                [
                    'name' => 'Produto 1',
                ],
                [
                    'name' => 'Produto 2',
                ]
            ],
            'subscription' => [
                'frequency' => 1,
                'trial' => [
                    'amount' => 100.9,
                ]
            ],
            'split_rules' => [
                [
                    'seller_id' => 'vendedor1@mail.me',
                    'amount' => 15.87,
                ],
                [
                    'seller_id' => 'vendedor2@mail.me',
                    'percentage' => 20.0,
                ],
            ],
            'event' => [
                'name' => 'Reveillon - 2022',
                'venue' => [
                    'name' => 'Campo - Clube das Laranjeiras',
                ],
                'tickets' => [
                    [
                        'id' => 'EVENT001',
                    ],
                    [
                        'id' => 'EVENT002',
                    ]
                ]
            ]
        ]);

        $this->assertEquals(100.0, $paymentTransaction->getAmount());
        $this->assertEquals('123456', $paymentTransaction->getOrderId());
        $this->assertEquals('http://localhost', $paymentTransaction->getCallbackUrl());

        $this->assertEquals('123', $paymentTransaction->getAntifraud()->getFingerprint());
        $this->assertEquals('test', $paymentTransaction->getAntifraud()->getProvider());

        $this->assertEquals('card', $paymentTransaction->getPayment()->getType());
        $this->assertEquals('visa', $paymentTransaction->getPayment()->getMethod());

        $this->assertEquals('teste', $paymentTransaction->getPayment()->getCard()->getHolder());
        $this->assertEquals('123', $paymentTransaction->getPayment()->getCard()->getNumber());
        $this->assertEquals('123', $paymentTransaction->getPayment()->getCard()->getCvv());

        $this->assertEquals('2018-07-31', $paymentTransaction->getPayment()->getBoleto()->getDueDate());

        $this->assertIsArray($paymentTransaction->getPayment()->getBoleto()->getInstructions());
        $this->assertCount(2, $paymentTransaction->getPayment()->getBoleto()->getInstructions());

        $this->assertEquals('Instruções 1', $paymentTransaction->getPayment()->getBoleto()->getInstructions()[0]['instruction']);
        $this->assertEquals('Instruções 2', $paymentTransaction->getPayment()->getBoleto()->getInstructions()[1]['instruction']);

        $this->assertEquals('Lívia Julia Eduarda Barros', $paymentTransaction->getCustomer()->getName());
        $this->assertEquals('07459826383', $paymentTransaction->getCustomer()->getCpfCnpj());

        $this->assertEquals('Rua A', $paymentTransaction->getCustomer()->getBillingAddress()->getStreet());
        $this->assertEquals('Rua A', $paymentTransaction->getCustomer()->getShippingAddress()->getStreet());

        $this->assertIsArray($paymentTransaction->getProducts());
        $this->assertCount(2, $paymentTransaction->getProducts());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Product::class, $paymentTransaction->getProducts()[0]);
        $this->assertInstanceOf(\Ipag\Sdk\Model\Product::class, $paymentTransaction->getProducts()[1]);

        $this->assertEquals('Produto 1', $paymentTransaction->getProducts()[0]->getName());
        $this->assertEquals('Produto 2', $paymentTransaction->getProducts()[1]->getName());

        $this->assertEquals(1, $paymentTransaction->getSubscription()->getFrequency());
        $this->assertEquals(100.9, $paymentTransaction->getSubscription()->getTrial()->getAmount());

        $this->assertIsArray($paymentTransaction->getSplitRules());

        $this->assertInstanceOf(\Ipag\Sdk\Model\PaymentSplitRules::class, $paymentTransaction->getSplitRules()[0]);
        $this->assertInstanceOf(\Ipag\Sdk\Model\PaymentSplitRules::class, $paymentTransaction->getSplitRules()[1]);

        $this->assertEquals(15.87, $paymentTransaction->getSplitRules()[0]->getAmount());
        $this->assertEquals('vendedor1@mail.me', $paymentTransaction->getSplitRules()[0]->getSellerId());

        $this->assertEquals(20.0, $paymentTransaction->getSplitRules()[1]->getPercentage());
        $this->assertEquals('vendedor2@mail.me', $paymentTransaction->getSplitRules()[1]->getSellerId());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Event::class, $paymentTransaction->getEvent());
        $this->assertEquals('Reveillon - 2022', $paymentTransaction->getEvent()->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Venue::class, $paymentTransaction->getEvent()->getVenue());
        $this->assertEquals('Campo - Clube das Laranjeiras', $paymentTransaction->getEvent()->getVenue()->getName());

        $this->assertIsArray($paymentTransaction->getEvent()->getTickets());
        $this->assertCount(2, $paymentTransaction->getEvent()->getTickets());
        $this->assertEquals('EVENT001', $paymentTransaction->getEvent()->getTickets()[0]->getId());
        $this->assertEquals('EVENT002', $paymentTransaction->getEvent()->getTickets()[1]->getId());

    }

    public function testShouldCreatePaymentTransactionObjectAndSetTheValuesSuccessfully()
    {
        $paymentTransaction = (new \Ipag\Sdk\Model\PaymentTransaction)
            ->setAmount(100.0)
            ->setOrderId('123456')
            ->setCallbackUrl('http://localhost')
            ->setAntifraud(
                (new \Ipag\Sdk\Model\PaymentAntifraud)
                    ->setFingerprint('123')
                    ->setProvider('test')
            )
            ->setPayment(
                (new \Ipag\Sdk\Model\Payment)
                    ->setType('card')
                    ->setMethod('visa')
                    ->setCard(
                        (new \Ipag\Sdk\Model\PaymentCard)
                            ->setHolder('teste')
                            ->setNumber('123')
                            ->setCvv('123')
                    )
                    ->setBoleto(
                        (new \Ipag\Sdk\Model\Boleto)
                            ->setDueDate('2018-07-31')
                            ->setInstructions([
                                ['instruction' => 'Instruções 1'],
                            ])
                            ->addInstruction('Instruções 2')
                    )
            )
            ->setCustomer(
                (new \Ipag\Sdk\Model\Customer)
                    ->setName('Lívia Julia Eduarda Barros')
                    ->setCpfCnpj('074.598.263-83')
                    ->setBillingAddress(
                        (new \Ipag\Sdk\Model\Address)
                            ->setStreet('Rua A')
                    )
                    ->setShippingAddress(
                        (new \Ipag\Sdk\Model\Address)
                            ->setStreet('Rua A')
                    )
            )
            ->setProducts([
                (new \Ipag\Sdk\Model\Product)
                    ->setName('Produto 1'),
            ])
            ->addProduct(
                (new \Ipag\Sdk\Model\Product)
                    ->setName('Produto 2')
            )
            ->setSubscription(
                (new \Ipag\Sdk\Model\PaymentSubscription)
                    ->setFrequency(1)
                    ->setTrial(
                        (new \Ipag\Sdk\Model\Trial)
                            ->setAmount(100.9)
                    )
            )
            ->setSplitRules([
                (new \Ipag\Sdk\Model\PaymentSplitRules)
                    ->setSellerId('vendedor1@mail.me')
                    ->setAmount(15.87),
            ])
            ->addSplitRules(
                (new \Ipag\Sdk\Model\PaymentSplitRules)
                    ->setSellerId('vendedor2@mail.me')
                    ->setPercentage(20.0)
            )
            ->setEvent(
                (new \Ipag\Sdk\Model\Event)
                    ->setName('Reveillon - 2022')
                    ->setVenue(
                        (new \Ipag\Sdk\Model\Venue)
                            ->setName('Campo - Clube das Laranjeiras')
                    )
                    ->setTickets([
                        (new \Ipag\Sdk\Model\Ticket)
                            ->setId('EVENT001'),
                    ])
                    ->addTicket(
                        (new \Ipag\Sdk\Model\Ticket)
                            ->setId('EVENT002'),
                    )
            );

        $this->assertEquals(100.0, $paymentTransaction->getAmount());
        $this->assertEquals('123456', $paymentTransaction->getOrderId());
        $this->assertEquals('http://localhost', $paymentTransaction->getCallbackUrl());

        $this->assertEquals('123', $paymentTransaction->getAntifraud()->getFingerprint());
        $this->assertEquals('test', $paymentTransaction->getAntifraud()->getProvider());

        $this->assertEquals('card', $paymentTransaction->getPayment()->getType());
        $this->assertEquals('visa', $paymentTransaction->getPayment()->getMethod());

        $this->assertEquals('teste', $paymentTransaction->getPayment()->getCard()->getHolder());
        $this->assertEquals('123', $paymentTransaction->getPayment()->getCard()->getNumber());
        $this->assertEquals('123', $paymentTransaction->getPayment()->getCard()->getCvv());

        $this->assertEquals('2018-07-31', $paymentTransaction->getPayment()->getBoleto()->getDueDate());

        $this->assertIsArray($paymentTransaction->getPayment()->getBoleto()->getInstructions());
        $this->assertCount(2, $paymentTransaction->getPayment()->getBoleto()->getInstructions());

        $this->assertEquals('Instruções 1', $paymentTransaction->getPayment()->getBoleto()->getInstructions()[0]['instruction']);
        $this->assertEquals('Instruções 2', $paymentTransaction->getPayment()->getBoleto()->getInstructions()[1]['instruction']);

        $this->assertEquals('Lívia Julia Eduarda Barros', $paymentTransaction->getCustomer()->getName());
        $this->assertEquals('07459826383', $paymentTransaction->getCustomer()->getCpfCnpj());

        $this->assertEquals('Rua A', $paymentTransaction->getCustomer()->getBillingAddress()->getStreet());
        $this->assertEquals('Rua A', $paymentTransaction->getCustomer()->getShippingAddress()->getStreet());

        $this->assertIsArray($paymentTransaction->getProducts());
        $this->assertCount(2, $paymentTransaction->getProducts());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Product::class, $paymentTransaction->getProducts()[0]);
        $this->assertInstanceOf(\Ipag\Sdk\Model\Product::class, $paymentTransaction->getProducts()[1]);

        $this->assertEquals('Produto 1', $paymentTransaction->getProducts()[0]->getName());
        $this->assertEquals('Produto 2', $paymentTransaction->getProducts()[1]->getName());

        $this->assertEquals(1, $paymentTransaction->getSubscription()->getFrequency());
        $this->assertEquals(100.9, $paymentTransaction->getSubscription()->getTrial()->getAmount());

        $this->assertIsArray($paymentTransaction->getSplitRules());

        $this->assertInstanceOf(\Ipag\Sdk\Model\PaymentSplitRules::class, $paymentTransaction->getSplitRules()[0]);
        $this->assertInstanceOf(\Ipag\Sdk\Model\PaymentSplitRules::class, $paymentTransaction->getSplitRules()[1]);

        $this->assertEquals(15.87, $paymentTransaction->getSplitRules()[0]->getAmount());
        $this->assertEquals('vendedor1@mail.me', $paymentTransaction->getSplitRules()[0]->getSellerId());

        $this->assertEquals(20.0, $paymentTransaction->getSplitRules()[1]->getPercentage());
        $this->assertEquals('vendedor2@mail.me', $paymentTransaction->getSplitRules()[1]->getSellerId());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Event::class, $paymentTransaction->getEvent());
        $this->assertEquals('Reveillon - 2022', $paymentTransaction->getEvent()->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Venue::class, $paymentTransaction->getEvent()->getVenue());
        $this->assertEquals('Campo - Clube das Laranjeiras', $paymentTransaction->getEvent()->getVenue()->getName());

        $this->assertIsArray($paymentTransaction->getEvent()->getTickets());
        $this->assertCount(2, $paymentTransaction->getEvent()->getTickets());
        $this->assertEquals('EVENT001', $paymentTransaction->getEvent()->getTickets()[0]->getId());
        $this->assertEquals('EVENT002', $paymentTransaction->getEvent()->getTickets()[1]->getId());

    }

    public function testShouldCreateEmptyPaymentTransactionObjectSuccessfully()
    {
        $paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction;

        $this->assertEmpty($paymentTransaction->getAmount());
        $this->assertEmpty($paymentTransaction->getOrderId());
        $this->assertEmpty($paymentTransaction->getCallbackUrl());
        $this->assertEmpty($paymentTransaction->getAntifraud());
        $this->assertEmpty($paymentTransaction->getPayment());
        $this->assertEmpty($paymentTransaction->getCustomer());
        $this->assertEmpty($paymentTransaction->getProducts());
        $this->assertEmpty($paymentTransaction->getSubscription());
        $this->assertEmpty($paymentTransaction->getSplitRules());
        $this->assertEmpty($paymentTransaction->getEvent());

    }

    public function testCreateAndSetEmptyPropertiesPaymentTransactionObjectSuccessfully()
    {
        $paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction([
            'amount' => 100.0,
            'order_id' => '123456',
            'callback_url' => 'http://localhost',
            'antifraud' => [
                'fingerprint' => '123',
                'provider' => 'test',
            ],
            'payment' => [
                'type' => 'card',
                'method' => 'visa',
                'card' => [
                    'holder' => 'teste',
                    'number' => '123',
                    'cvv' => '123',
                ],
                'boleto' => [
                    'due_date' => '2018-07-31',
                    'instructions' => [
                        ['instruction' => 'Instruções 1'],
                        ['instruction' => 'Instruções 2'],
                    ]
                ],
            ],
            'customer' => [
                'name' => 'Lívia Julia Eduarda Barros',
                'cpf_cnpj' => '074.598.263-83',
                'billing_address' =>
                    [
                        'street' => 'Rua A',
                    ],
                'shipping_address' =>
                    [
                        'street' => 'Rua A',
                    ],
            ],
            'products' => [
                [
                    'name' => 'Produto 1',
                ],
                [
                    'name' => 'Produto 2',
                ]
            ],
            'subscription' => [
                'frequency' => 1,
                'trial' => [
                    'amount' => 100.9,
                ]
            ],
            'split_rules' => [
                [
                    'seller_id' => 'vendedor1@mail.me',
                    'amount' => 15.87,
                ],
                [
                    'seller_id' => 'vendedor2@mail.me',
                    'percentage' => 20.0,
                ],
            ],
            'event' => [
                'name' => 'Reveillon - 2022',
                'venue' => [
                    'name' => 'Campo - Clube das Laranjeiras',
                ],
                'tickets' => [
                    [
                        'id' => 'EVENT001',
                    ],
                    [
                        'id' => 'EVENT002',
                    ]
                ]
            ]
        ]);

        $paymentTransaction
            ->setAmount(null)
            ->setOrderId(null)
            ->setCallbackUrl(null)
            ->setAntifraud(null)
            ->setPayment(null)
            ->setCustomer(null)
            ->setProducts(null)
            ->setSubscription(null)
            ->setSplitRules(null)
            ->setEvent(null);

        $this->assertEmpty($paymentTransaction->getAmount());
        $this->assertEmpty($paymentTransaction->getOrderId());
        $this->assertEmpty($paymentTransaction->getCallbackUrl());
        $this->assertEmpty($paymentTransaction->getAntifraud());
        $this->assertEmpty($paymentTransaction->getPayment());
        $this->assertEmpty($paymentTransaction->getCustomer());
        $this->assertEmpty($paymentTransaction->getProducts());
        $this->assertEmpty($paymentTransaction->getSubscription());
        $this->assertEmpty($paymentTransaction->getSplitRules());
        $this->assertEmpty($paymentTransaction->getEvent());

    }

    public function testShouldThrowATypeExceptionOnThePaymentTransactionAmountProperty()
    {
        $paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction;

        $this->expectException(\TypeError::class);

        $paymentTransaction->setAmount('a');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentTransactionAmountProperty()
    {
        $paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction;

        $this->expectException(MutatorAttributeException::class);

        $paymentTransaction->setAmount(-1);
    }

}