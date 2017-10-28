<?php

/*
 * This file is part of the RollerworksSearch package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Rollerworks\Component\Search\Tests\Doctrine\Orm\Fixtures\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoices", options={"collate"="utf8_bin"})
 */
class ECommerceInvoice
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="invoice_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", unique=true, nullable=true)
     */
    public $label;

    /**
     * @ORM\Column(name="pubdate", type="date", nullable=true)
     */
    public $date;

    /**
     * @ORM\ManyToOne(targetEntity="ECommerceCustomer")
     * @ORM\JoinColumn(name="customer", referencedColumnName="id")
     */
    public $customer;

    /**
     * @ORM\Column(type="integer")
     */
    public $status;

    /**
     * @ORM\Column(name="price_total", type="decimal", precision=0, scale=2)
     */
    public $total;

    /**
     * @ORM\OneToMany(targetEntity="ECommerceInvoiceRow", mappedBy="invoice", cascade={"persist"})
     */
    public $rows;

    /**
     * @ORM\ManyToOne(targetEntity="ECommerceInvoice", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="invoice_id")
     */
    public $parent;

    /**
     * @ORM\OneToMany(targetEntity="ECommerceInvoice", mappedBy="parent")
     */
    public $children;
}
