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
use model\model\Faixa as ChildFaixa;
use model\model\FaixaQuery as ChildFaixaQuery;
use model\model\Map\FaixaTableMap;

/**
 * Base class that represents a query for the 'faixa' table.
 *
 * 
 *
 * @method     ChildFaixaQuery orderByIdFaixa($order = Criteria::ASC) Order by the ID_FAIXA column
 * @method     ChildFaixaQuery orderByDsFaixa($order = Criteria::ASC) Order by the DS_FAIXA column
 *
 * @method     ChildFaixaQuery groupByIdFaixa() Group by the ID_FAIXA column
 * @method     ChildFaixaQuery groupByDsFaixa() Group by the DS_FAIXA column
 *
 * @method     ChildFaixaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFaixaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFaixaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFaixaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFaixaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFaixaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFaixaQuery leftJoinPessoa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pessoa relation
 * @method     ChildFaixaQuery rightJoinPessoa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pessoa relation
 * @method     ChildFaixaQuery innerJoinPessoa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pessoa relation
 *
 * @method     ChildFaixaQuery joinWithPessoa($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pessoa relation
 *
 * @method     ChildFaixaQuery leftJoinWithPessoa() Adds a LEFT JOIN clause and with to the query using the Pessoa relation
 * @method     ChildFaixaQuery rightJoinWithPessoa() Adds a RIGHT JOIN clause and with to the query using the Pessoa relation
 * @method     ChildFaixaQuery innerJoinWithPessoa() Adds a INNER JOIN clause and with to the query using the Pessoa relation
 *
 * @method     \model\model\PessoaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFaixa findOne(ConnectionInterface $con = null) Return the first ChildFaixa matching the query
 * @method     ChildFaixa findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFaixa matching the query, or a new ChildFaixa object populated from the query conditions when no match is found
 *
 * @method     ChildFaixa findOneByIdFaixa(int $ID_FAIXA) Return the first ChildFaixa filtered by the ID_FAIXA column
 * @method     ChildFaixa findOneByDsFaixa(string $DS_FAIXA) Return the first ChildFaixa filtered by the DS_FAIXA column *

 * @method     ChildFaixa requirePk($key, ConnectionInterface $con = null) Return the ChildFaixa by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFaixa requireOne(ConnectionInterface $con = null) Return the first ChildFaixa matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFaixa requireOneByIdFaixa(int $ID_FAIXA) Return the first ChildFaixa filtered by the ID_FAIXA column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFaixa requireOneByDsFaixa(string $DS_FAIXA) Return the first ChildFaixa filtered by the DS_FAIXA column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFaixa[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFaixa objects based on current ModelCriteria
 * @method     ChildFaixa[]|ObjectCollection findByIdFaixa(int $ID_FAIXA) Return ChildFaixa objects filtered by the ID_FAIXA column
 * @method     ChildFaixa[]|ObjectCollection findByDsFaixa(string $DS_FAIXA) Return ChildFaixa objects filtered by the DS_FAIXA column
 * @method     ChildFaixa[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FaixaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \model\model\Base\FaixaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\model\\model\\Faixa', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFaixaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFaixaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFaixaQuery) {
            return $criteria;
        }
        $query = new ChildFaixaQuery();
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
     * @return ChildFaixa|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FaixaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FaixaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFaixa A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID_FAIXA, DS_FAIXA FROM faixa WHERE ID_FAIXA = :p0';
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
            /** @var ChildFaixa $obj */
            $obj = new ChildFaixa();
            $obj->hydrate($row);
            FaixaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFaixa|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFaixaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FaixaTableMap::COL_ID_FAIXA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFaixaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FaixaTableMap::COL_ID_FAIXA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ID_FAIXA column
     *
     * Example usage:
     * <code>
     * $query->filterByIdFaixa(1234); // WHERE ID_FAIXA = 1234
     * $query->filterByIdFaixa(array(12, 34)); // WHERE ID_FAIXA IN (12, 34)
     * $query->filterByIdFaixa(array('min' => 12)); // WHERE ID_FAIXA > 12
     * </code>
     *
     * @param     mixed $idFaixa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFaixaQuery The current query, for fluid interface
     */
    public function filterByIdFaixa($idFaixa = null, $comparison = null)
    {
        if (is_array($idFaixa)) {
            $useMinMax = false;
            if (isset($idFaixa['min'])) {
                $this->addUsingAlias(FaixaTableMap::COL_ID_FAIXA, $idFaixa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFaixa['max'])) {
                $this->addUsingAlias(FaixaTableMap::COL_ID_FAIXA, $idFaixa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FaixaTableMap::COL_ID_FAIXA, $idFaixa, $comparison);
    }

    /**
     * Filter the query on the DS_FAIXA column
     *
     * Example usage:
     * <code>
     * $query->filterByDsFaixa('fooValue');   // WHERE DS_FAIXA = 'fooValue'
     * $query->filterByDsFaixa('%fooValue%', Criteria::LIKE); // WHERE DS_FAIXA LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsFaixa The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFaixaQuery The current query, for fluid interface
     */
    public function filterByDsFaixa($dsFaixa = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsFaixa)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FaixaTableMap::COL_DS_FAIXA, $dsFaixa, $comparison);
    }

    /**
     * Filter the query by a related \model\model\Pessoa object
     *
     * @param \model\model\Pessoa|ObjectCollection $pessoa the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildFaixaQuery The current query, for fluid interface
     */
    public function filterByPessoa($pessoa, $comparison = null)
    {
        if ($pessoa instanceof \model\model\Pessoa) {
            return $this
                ->addUsingAlias(FaixaTableMap::COL_ID_FAIXA, $pessoa->getIdFaixa(), $comparison);
        } elseif ($pessoa instanceof ObjectCollection) {
            return $this
                ->usePessoaQuery()
                ->filterByPrimaryKeys($pessoa->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPessoa() only accepts arguments of type \model\model\Pessoa or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pessoa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFaixaQuery The current query, for fluid interface
     */
    public function joinPessoa($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pessoa');

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
            $this->addJoinObject($join, 'Pessoa');
        }

        return $this;
    }

    /**
     * Use the Pessoa relation Pessoa object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \model\model\PessoaQuery A secondary query class using the current class as primary query
     */
    public function usePessoaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPessoa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pessoa', '\model\model\PessoaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFaixa $faixa Object to remove from the list of results
     *
     * @return $this|ChildFaixaQuery The current query, for fluid interface
     */
    public function prune($faixa = null)
    {
        if ($faixa) {
            $this->addUsingAlias(FaixaTableMap::COL_ID_FAIXA, $faixa->getIdFaixa(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the faixa table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FaixaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FaixaTableMap::clearInstancePool();
            FaixaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FaixaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FaixaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            FaixaTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            FaixaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FaixaQuery
