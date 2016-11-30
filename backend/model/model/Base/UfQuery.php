<?php

namespace model\model\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use model\model\Uf as ChildUf;
use model\model\UfQuery as ChildUfQuery;
use model\model\Map\UfTableMap;

/**
 * Base class that represents a query for the 'uf' table.
 *
 * 
 *
 * @method     ChildUfQuery orderByIdUf($order = Criteria::ASC) Order by the ID_UF column
 * @method     ChildUfQuery orderByNmUf($order = Criteria::ASC) Order by the NM_UF column
 * @method     ChildUfQuery orderByDsUf($order = Criteria::ASC) Order by the DS_UF column
 *
 * @method     ChildUfQuery groupByIdUf() Group by the ID_UF column
 * @method     ChildUfQuery groupByNmUf() Group by the NM_UF column
 * @method     ChildUfQuery groupByDsUf() Group by the DS_UF column
 *
 * @method     ChildUfQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUfQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUfQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUfQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUfQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUfQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUfQuery leftJoinEndereco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Endereco relation
 * @method     ChildUfQuery rightJoinEndereco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Endereco relation
 * @method     ChildUfQuery innerJoinEndereco($relationAlias = null) Adds a INNER JOIN clause to the query using the Endereco relation
 *
 * @method     ChildUfQuery joinWithEndereco($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Endereco relation
 *
 * @method     ChildUfQuery leftJoinWithEndereco() Adds a LEFT JOIN clause and with to the query using the Endereco relation
 * @method     ChildUfQuery rightJoinWithEndereco() Adds a RIGHT JOIN clause and with to the query using the Endereco relation
 * @method     ChildUfQuery innerJoinWithEndereco() Adds a INNER JOIN clause and with to the query using the Endereco relation
 *
 * @method     \model\model\EnderecoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUf findOne(ConnectionInterface $con = null) Return the first ChildUf matching the query
 * @method     ChildUf findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUf matching the query, or a new ChildUf object populated from the query conditions when no match is found
 *
 * @method     ChildUf findOneByIdUf(int $ID_UF) Return the first ChildUf filtered by the ID_UF column
 * @method     ChildUf findOneByNmUf(string $NM_UF) Return the first ChildUf filtered by the NM_UF column
 * @method     ChildUf findOneByDsUf(string $DS_UF) Return the first ChildUf filtered by the DS_UF column *

 * @method     ChildUf requirePk($key, ConnectionInterface $con = null) Return the ChildUf by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUf requireOne(ConnectionInterface $con = null) Return the first ChildUf matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUf requireOneByIdUf(int $ID_UF) Return the first ChildUf filtered by the ID_UF column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUf requireOneByNmUf(string $NM_UF) Return the first ChildUf filtered by the NM_UF column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUf requireOneByDsUf(string $DS_UF) Return the first ChildUf filtered by the DS_UF column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUf[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUf objects based on current ModelCriteria
 * @method     ChildUf[]|ObjectCollection findByIdUf(int $ID_UF) Return ChildUf objects filtered by the ID_UF column
 * @method     ChildUf[]|ObjectCollection findByNmUf(string $NM_UF) Return ChildUf objects filtered by the NM_UF column
 * @method     ChildUf[]|ObjectCollection findByDsUf(string $DS_UF) Return ChildUf objects filtered by the DS_UF column
 * @method     ChildUf[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UfQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \model\model\Base\UfQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\model\\model\\Uf', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUfQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUfQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUfQuery) {
            return $criteria;
        }
        $query = new ChildUfQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUf|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UfTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UfTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUf A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID_UF, NM_UF, DS_UF FROM uf WHERE ID_UF = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUf $obj */
            $obj = new ChildUf();
            $obj->hydrate($row);
            UfTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildUf|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildUfQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UfTableMap::COL_ID_UF, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUfQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UfTableMap::COL_ID_UF, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ID_UF column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUf(1234); // WHERE ID_UF = 1234
     * $query->filterByIdUf(array(12, 34)); // WHERE ID_UF IN (12, 34)
     * $query->filterByIdUf(array('min' => 12)); // WHERE ID_UF > 12
     * </code>
     *
     * @param     mixed $idUf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUfQuery The current query, for fluid interface
     */
    public function filterByIdUf($idUf = null, $comparison = null)
    {
        if (is_array($idUf)) {
            $useMinMax = false;
            if (isset($idUf['min'])) {
                $this->addUsingAlias(UfTableMap::COL_ID_UF, $idUf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUf['max'])) {
                $this->addUsingAlias(UfTableMap::COL_ID_UF, $idUf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UfTableMap::COL_ID_UF, $idUf, $comparison);
    }

    /**
     * Filter the query on the NM_UF column
     *
     * Example usage:
     * <code>
     * $query->filterByNmUf('fooValue');   // WHERE NM_UF = 'fooValue'
     * $query->filterByNmUf('%fooValue%', Criteria::LIKE); // WHERE NM_UF LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmUf The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUfQuery The current query, for fluid interface
     */
    public function filterByNmUf($nmUf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmUf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UfTableMap::COL_NM_UF, $nmUf, $comparison);
    }

    /**
     * Filter the query on the DS_UF column
     *
     * Example usage:
     * <code>
     * $query->filterByDsUf('fooValue');   // WHERE DS_UF = 'fooValue'
     * $query->filterByDsUf('%fooValue%', Criteria::LIKE); // WHERE DS_UF LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsUf The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUfQuery The current query, for fluid interface
     */
    public function filterByDsUf($dsUf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsUf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UfTableMap::COL_DS_UF, $dsUf, $comparison);
    }

    /**
     * Filter the query by a related \model\model\Endereco object
     *
     * @param \model\model\Endereco|ObjectCollection $endereco the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUfQuery The current query, for fluid interface
     */
    public function filterByEndereco($endereco, $comparison = null)
    {
        if ($endereco instanceof \model\model\Endereco) {
            return $this
                ->addUsingAlias(UfTableMap::COL_ID_UF, $endereco->getIdUf(), $comparison);
        } elseif ($endereco instanceof ObjectCollection) {
            return $this
                ->useEnderecoQuery()
                ->filterByPrimaryKeys($endereco->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEndereco() only accepts arguments of type \model\model\Endereco or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Endereco relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUfQuery The current query, for fluid interface
     */
    public function joinEndereco($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Endereco');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Endereco');
        }

        return $this;
    }

    /**
     * Use the Endereco relation Endereco object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \model\model\EnderecoQuery A secondary query class using the current class as primary query
     */
    public function useEnderecoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEndereco($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Endereco', '\model\model\EnderecoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUf $uf Object to remove from the list of results
     *
     * @return $this|ChildUfQuery The current query, for fluid interface
     */
    public function prune($uf = null)
    {
        if ($uf) {
            $this->addUsingAlias(UfTableMap::COL_ID_UF, $uf->getIdUf(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the uf table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UfTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UfTableMap::clearInstancePool();
            UfTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UfTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UfTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            UfTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            UfTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UfQuery
