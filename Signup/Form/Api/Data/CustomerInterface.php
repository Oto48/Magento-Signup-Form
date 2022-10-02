<?php
namespace Signup\Form\Api\Data;

/**
 * Interface CustomerInterface
 *
 * @api
 */
interface CustomerInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $customer_id
     * @return $this
     */
    public function setId($customer_id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $title
     * @return $this
     */
    public function setName($title);

    /**
     * @return string
     */
    public function getDate();

    /**
     * @param string $description
     * @return $this
     */
    public function setDate($description);
}
