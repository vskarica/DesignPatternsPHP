<?php
// File Name    : Builder.php
// Purpose      : To explain the Builder pattern structure
// Organization : Sonebharda Technologies
// Author       : Vedran Škarica after S. K. Srivastava
// Date         : 11 Oct 2018

Class Director
{
    private $builder;

    public function SetBuilder(Builder $obj)
    {
        $this->builder = $obj;
    }

    public function Construct($name)
    {
        if ($name == "Product1")
        {
            $this->builder->Create();
            $this->builder->BuildPartA();
            $this->builder->BuildPartB();
        }
        else if ($name == "Product2")
        {
            $this->builder->Create();
            $this->builder->BuildPartC();
            $this->builder->BuildPartD();
        }
    }  
}

abstract class Builder
{
    public abstract function Create();
    public abstract function BuildPartA();
    public abstract function BuildPartB();
    public abstract function BuildPartC();
    public abstract function BuildPartD();
}

class ConcreteBuilder1 extends Builder
{
    private $product;

    public function Create()
    {
        $this->product = new Product1();
    }

    public function BuildPartA() { }
    public function BuildPartB() { }
    public function BuildPartC() { }
    public function BuildPartD() { }

    Public function GetProduct()
    {
        return $this->product;
    }
}

class ConcreteBuilder2 extends Builder
{
    private $product;

    public function Create()
    {
        $this->product = new Product2();
    }

    public function BuildPartA() { }
    public function BuildPartB() { }
    public function BuildPartC() { }
    public function BuildPartD() { }

    public function GetProduct()
    {
        return $this->product;
    }
}

class Product1
{
    public function UseProduct()
    {
        echo "Inside Product1::UseProduct()<br />";
    }
}

class Product2
{
    public function UseProduct()
    {
        echo "Inside Product2::Useproduct()<br />";
    }
}

$director = new Director();

$builder1 = new ConcreteBuilder1();
$director->SetBuilder($builder1);
$director->Construct("Product1");
$prod1 = $builder1->GetProduct();
$prod1->UseProduct();

$builder2 = new ConcreteBuilder2();
$director->SetBuilder($builder2);
$director->Construct("Product2");
$prod2 = $builder2->GetProduct();
$prod2->UseProduct();

?>