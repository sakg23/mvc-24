<?php

namespace App\Tests\Form;

use App\Entity\Transaction;
use App\Form\TransactionType;
use Symfony\Component\Form\Test\TypeTestCase;

class TransactionTypeTest extends TypeTestCase
{
    // Test that the form has all required fields
    public function testFormFields()
    {
        $form = $this->factory->create(TransactionType::class);

        $this->assertTrue($form->has('type'));
        $this->assertTrue($form->has('amount'));
        $this->assertTrue($form->has('category'));
        $this->assertTrue($form->has('description'));
        $this->assertTrue($form->has('date'));
    }

    public function testSubmitValidData()
    {
        $formData = [
            'type' => 'income',
            'amount' => '1000.00',
            'category' => 'Salary',
            'description' => 'Monthly salary',
            'date' => '2025-01-01',
        ];
    
        $transaction = new Transaction();
        $form = $this->factory->create(TransactionType::class, $transaction);
    
        // Submit the form
        $form->submit($formData);
    
        $this->assertTrue($form->isSynchronized()); // Ensure data submission worked
        $this->assertEquals('income', $transaction->getType());
        $this->assertEquals('1000', $transaction->getAmount()); // Adjusted to match normalized value
        $this->assertEquals('Salary', $transaction->getCategory());
        $this->assertEquals('Monthly salary', $transaction->getDescription());
        $this->assertEquals('2025-01-01', $transaction->getDate()->format('Y-m-d'));
    }
    
    // Test submitting invalid data
    public function testSubmitInvalidData()
    {
        $formData = [
            'type' => 'invalid', // Invalid choice
            'amount' => 'not-a-number', // Invalid amount
            'category' => '', // Missing category
            'date' => 'invalid-date', // Invalid date format
        ];

        $transaction = new Transaction();
        $form = $this->factory->create(TransactionType::class, $transaction);

        // Submit the form
        $form->submit($formData);

        $this->assertFalse($form->isValid()); // Ensure invalid data is rejected
    }
}
