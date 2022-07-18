<?php

namespace Webkul\Sale\Repositories;

use Illuminate\Container\Container;
use Webkul\Core\Eloquent\Repository;
use Webkul\Attribute\Repositories\AttributeValueRepository;

class SaleRepository extends Repository
{
    protected $attributeValueRepository;

    /**
     * Create a new repository instance.
     *
     * @param  \Webkul\Attribute\Repositories\AttributeValueRepository  $attributeValueRepository
     * @param  \Illuminate\Container\Container  $container
     * @return void
     */
    public function __construct(
        AttributeValueRepository $attributeValueRepository,
        Container $container
    )
    {
        $this->attributeValueRepository = $attributeValueRepository;

        parent::__construct($container);
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\Sale\Contracts\Sale';
    }

    /**
     * @param array $data
     * @return \Webkul\Sale\Contracts\Sale
     */
    public function create(array $data)
    {
        $sale = parent::create($data);

        $this->attributeValueRepository->save($data, $sale->id);

        return $sale;
    }

    /**
     * @param array  $data
     * @param int    $id
     * @param string $attribute
     * @return \Webkul\Sale\Contracts\Sale
     */
    public function update(array $data, $id, $attribute = "id")
    {
        $sale = parent::update($data, $id);

        $this->attributeValueRepository->save($data, $id);

        return $sale;
    }

    /**
     * Retreives customers count based on date
     *
     * @return number
     */
    public function getProductCount($startDate, $endDate)
    {
        return $this
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get()
                ->count();
    }
}
