<?php
namespace Signup\Form\Api;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Signup\Form\Api\Data\CustomerInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CustomerRepositoryInterface
 *
 * @api
 */
interface CustomerRepositoryInterface
{
    /**
     * Create or update a Customer.
     *
     * @param CustomerInterface $customer
     * @return CustomerInterface
     */
    public function save(CustomerInterface $customer);

    /**
     * Get a Customer by Id
     *
     * @param int $id
     * @return CustomerInterface
     * @throws NoSuchEntityException If Customer with the specified ID does not exist.
     * @throws LocalizedException
     */
    public function getById($id);
}
