<?php
class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance->value();
    }

    public function deposit(Money $amount)
    {
        $this->balance = $this->balance + $amount->value();   
        return $this->balance; 
    }

    public function transfer(Money $amount, BankAccount $account)
    {
         if($this->balance < $amount->value())
         {
            throw new Exception("Withdrawl amount larger than balance");     
            return false;                  
         }
         else{
            
            $this->balance = $this->balance - $amount->value();   
            $account->balance = $account->balance() +$amount->value();   
          }
    }
    public function withdraw(Money $amount)
     {
         if($this->balance < $amount->value())
         {
            throw new Exception("Withdrawl amount larger than balance");     
             return false;                  
         }
         else
         {
        $withdrawamt = $this->balance = $this->balance - $amount->value();  
        return $withdrawamt; 
         }
    } 

    public function balance()
    {
        return $this->balance;
    }
}