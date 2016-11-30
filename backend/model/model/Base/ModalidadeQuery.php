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
use model\model\Modalidade as ChildModalidade;
use model\model\ModalidadeQuery as ChildModalidadeQuery;
use model\model\Map\ModalidadeTableMap;

/**
 * Base class that represents a query for the 'modalidade' table.
 *
 * 
 *
 * @method     ChildModalidadeQuery orderByIdModalidade($order = Criteria::ASC) Order by the ID_MODALIDADE column
 * @method     ChildModalidadeQuery orderByDescricao($order = Criteria::ASC) Order by the DESCRICAO column
 *
 * @method     ChildModalidadeQuery groupByIdModalidade() Group by the ID_MODALIDADE column
 * @method     ChildModalidadeQuery groupByDescricao() Group by the DESCRICAO column
 *
 * @method     ChildModalidadeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildModalidadeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildModalidadeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildModalidadeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildModalidadeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildModalidadeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildModalidadeQuery leftJoinTurma($relationAlias = null) Adds a LEFT JOIN clause to the query using the Turma relation
 * @method     ChildModalidadeQuery rightJoinTurma($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Turma relation
 * @method     ChildModalidadeQuery innerJoinTurma($relationAlias = null) Adds a INNER JOIN clause to the query using the Turma relation
 *
 * @method     ChildModalidadeQuery joinWithTurma($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Turma relation
 *
 * @method     ChildModalidadeQuery leftJoinWithTurma() Adds a LEFT JOIN clause and with to the query using the Turma relation
 * @method     ChildModalidadeQuery rightJoinWithTurma() Adds a RIGHT JOIN clause and with to the query using the Turma relation
 * @method     ChildModalidadeQuery innerJoinWithTurma() Adds a INNER JOIN clause and with to the query using the Turma relation
 *
 * @method     \model\model\TurmaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildModalidade findOne(ConnectionInterface $con = null) Return the first ChildModalidade matching the query
 * @method     ChildModalidade findOneOrCreate(ConnectionInterface $con = null) Return the first ChildModalidade matching the query, or a new ChildModalidade object populated from the query conditions when no match is found
 *
 * @method     ChildModalidade findOneByIdModalidade(int $ID_MODALIDADE) Return the first ChildModalidade filtered by the ID_MODALIDADE column
 * @method     ChildModalidade findOneByDescricao(string $DESCRICAO) Return the first ChildModalidade filtered by the DESCRICAO column *

 * @method     ChildModalidade requirePk($key, ConnectionInterface $con = null) Return the ChildModalidade by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModalidade requireOne(ConnectionInterface $con = null) Return the first ChildModalidade matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildModalidade requireOneByIdModalidade(int $ID_MODALIDADE) Return the first ChildModalidade filtered by the ID_MODALIDADE column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildModalidade requireOneByDescricao(string $DESCRICAO) Return the first ChildModalidade filtered by the DESCRICAO column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildModalidade[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildModalidade objects based on current ModelCriteria
 * @method     ChildModalidade[]|ObjectCollection findByIdModalidade(int $ID_MODALIDADE) Return ChildModalidade objects filtered by the ID_MODALIDADE column
 * @method     ChildModalidade[]|ObjectCollection findByDescricao(string $DESCRICAO) Return ChildModalidade objects filtered by the DESCRICAO column
 * @method     ChildModalidade[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ModalidadeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \model\model\Base\ModalidadeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\model\\model\\Modalidade', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildModalidadeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildModalidadeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildModalidadeQuery) {
            return $criteria;
        }
        $query = new ChildModalidadeQuery();
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
     * @return ChildModalidade|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ModalidadeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ModalidadeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildModalidade A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID_MODALIDADE, DESCRICAO FROM modalidade WHERE ID_MODALIDADE = :p0';
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
            /** @var ChildModalidade $obj */
            $obj = new ChildModalidade();
            $obj->hydrate($row);
            ModalidadeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildModalidade|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildModalidadeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ModalidadeTableMap::COL_ID_MODALIDADE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildModalidadeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ModalidadeTableMap::COL_ID_MODALIDADE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ID_MODALIDADE column
     *
     * Example usage:
     * <code>
     * $query->filterByIdModalidade(1234); // WHERE ID_MODALIDADE = 1234
     * $query->filterByIdModalidade(array(12, 34)); // WHERE ID_MODALIDADE IN (12, 34)
     * $query->filterByIdModalidade(array('min' => 12)); // WHERE ID_MODALIDADE > 12
     * </code>
     *
     * @param     mixed $idModalidade The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModalidadeQuery The current query, for fluid interface
     */
    public function filterByIdModalidade($idModalidade = null, $comparison = null)
    {
        if (is_array($idModalidade)) {
            $useMinMax = false;
            if (isset($idModalidade['min'])) {
                $this->addUsingAlias(ModalidadeTableMap::COL_ID_MODALIDADE, $idModalidade['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idModalidade['max'])) {
                $this->addUsingAlias(ModalidadeTableMap::COL_ID_MODALIDADE, $idModalidade['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModalidadeTableMap::COL_ID_MODALIDADE, $idModalidade, $comparison);
    }

    /**
     * Filter the query on the DESCRICAO column
     *
     * Example usage:
     * <code>
     * $query->filterByDescricao('fooValue');   // WHERE DESCRICAO = 'fooValue'
     * $query->filterByDescricao('%fooValue%', Criteria::LIKE); // WHERE DESCRICAO LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descricao The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildModalidadeQuery The current query, for fluid interface
     */
    public function filterByDescricao($descricao = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descricao)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModalidadeTableMap::COL_DESCRICAO, $descricao, $comparison);
    }

    /**
     * Filter the query by a related \model\model\Turma object
     *
     * @param \model\model\Turma|ObjectCollection $turma the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildModalidadeQuery The current query, for fluid interface
     */
    public function filterByTurma($turma, $comparison = null)
    {
        if ($turma instanceof \model\model\Turma) {
            return $this
                ->addUsingAlias(ModalidadeTableMap::COL_ID_MODALIDADE, $turma->getIdModalidade(), $comparison);
        } elseif ($turma instanceof ObjectCollection) {
            return $this
                ->useTurmaQuery()
                ->filterByPrimaryKeys($turma->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTurma() only accepts arguments of type \model\model\Turma or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Turma relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildModalidadeQuery The current query, for fluid interface
     */
    public function joinTurma($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Turma');

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
            $this->addJoinObject($join, 'Turma');
        }

        return $this;
    }

    /**
     * Use the Turma relation Turma object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \model\model\TurmaQuery A secondary query class using the current class as primary query
     */
    public function useTurmaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTurma($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Turma', '\model\model\TurmaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildModalidade $modalidade Object to remove from the list of results
     *
     * @return $this|ChildModalidadeQuery The current query, for fluid interface
     */
    public function prune($modalidade = null)
    {
        if ($modalidade) {
            $this->addUsingAlias(ModalidadeTableMap::COL_ID_MODALIDADE, $modalidade->getIdModalidade(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the modalidade table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ModalidadeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ModalidadeTableMap::clearInstancePool();
            ModalidadeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ModalidadeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ModalidadeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ModalidadeTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ModalidadeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ModalidadeQuery
