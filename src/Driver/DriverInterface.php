<?php

/**
 * @author Jared King <j@jaredtking.com>
 *
 * @see http://jaredtking.com
 *
 * @copyright 2015 Jared King
 * @license MIT
 */

namespace Pulsar\Driver;

use Pulsar\Exception\DriverException;
use Pulsar\Model;
use Pulsar\Query;

/**
 * Interface DriverInterface.
 */
interface DriverInterface
{
    /**
     * Creates a model.
     *
     * @return mixed result
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function createModel(Model $model, array $parameters);

    /**
     * Gets the last inserted ID. Used for drivers that generate
     * IDs for models after creation.
     *
     * @return mixed
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function getCreatedID(Model $model, string $propertyName);

    /**
     * Loads a model.
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function loadModel(Model $model): ?array;

    /**
     * Performs a query to find models of the given type.
     *
     * @return array raw data from storage
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function queryModels(Query $query): array;

    /**
     * Updates a model.
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function updateModel(Model $model, array $parameters): bool;

    /**
     * Deletes a model.
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function deleteModel(Model $model): bool;

    /**
     * Gets the count matching the given query.
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function count(Query $query): int;

    /**
     * Gets the sum matching the given query.
     *
     * @return number
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function sum(Query $query, string $field);

    /**
     * Gets the average matching the given query.
     *
     * @return number
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function average(Query $query, string $field);

    /**
     * Gets the max matching the given query.
     *
     * @return number
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function max(Query $query, string $field);

    /**
     * Gets the min matching the given query.
     *
     * @return number
     *
     * @throws DriverException when an exception occurs within the driver
     */
    public function min(Query $query, string $field);

    /**
     * Starts a database transaction.
     */
    public function startTransaction(?string $connection): void;

    /**
     * Rolls back the open database transaction.
     */
    public function rollBackTransaction(?string $connection): void;

    /**
     * Commits the database transaction.
     */
    public function commitTransaction(?string $connection): void;
}
