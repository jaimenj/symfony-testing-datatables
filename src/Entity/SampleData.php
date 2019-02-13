<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SampleDataRepository")
 */
class SampleData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $col1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $col2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $col3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $col4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $col5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $col6;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $col7;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $col8;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $col9;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $col10;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCol1(): ?string
    {
        return $this->col1;
    }

    public function setCol1(string $col1): self
    {
        $this->col1 = $col1;

        return $this;
    }

    public function getCol2(): ?string
    {
        return $this->col2;
    }

    public function setCol2(string $col2): self
    {
        $this->col2 = $col2;

        return $this;
    }

    public function getCol3(): ?string
    {
        return $this->col3;
    }

    public function setCol3(string $col3): self
    {
        $this->col3 = $col3;

        return $this;
    }

    public function getCol4(): ?string
    {
        return $this->col4;
    }

    public function setCol4(string $col4): self
    {
        $this->col4 = $col4;

        return $this;
    }

    public function getCol5(): ?string
    {
        return $this->col5;
    }

    public function setCol5(string $col5): self
    {
        $this->col5 = $col5;

        return $this;
    }

    public function getCol6(): ?string
    {
        return $this->col6;
    }

    public function setCol6(string $col6): self
    {
        $this->col6 = $col6;

        return $this;
    }

    public function getCol7(): ?string
    {
        return $this->col7;
    }

    public function setCol7(string $col7): self
    {
        $this->col7 = $col7;

        return $this;
    }

    public function getCol8(): ?string
    {
        return $this->col8;
    }

    public function setCol8(string $col8): self
    {
        $this->col8 = $col8;

        return $this;
    }

    public function getCol9(): ?string
    {
        return $this->col9;
    }

    public function setCol9(string $col9): self
    {
        $this->col9 = $col9;

        return $this;
    }

    public function getCol10(): ?string
    {
        return $this->col10;
    }

    public function setCol10(string $col10): self
    {
        $this->col10 = $col10;

        return $this;
    }
}
