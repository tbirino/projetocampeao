<?php

namespace model\model\Base;

use \Exception;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use model\model\AlunoTurma as ChildAlunoTurma;
use model\model\AlunoTurmaQuery as ChildAlunoTurmaQuery;
use model\model\Map\AlunoTurmaTableMap;

/**
 * Base class that represents a query for the 'aluno_turma' table.
 *
 * 
 *
 * @method     ChildAlunoTurmaQuery orderBySqPessoa($order = Criteria::ASC) Order by the SQ_PESSOA column
 * @method     ChildAlunoTurmaQuery orderBySqTurma($order = Criteria::ASC) Order by the SQ_TURMA column
 *
 * @method     ChildAlunoTurmaQuery groupBySqPessoa() Group by the SQ_PESSOA column
 * @method     ChildAlunoTurmaQuery groupBySqTurma() Group by the SQ_TURMA column
 *
 * @method     ChildAlunoTurmaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAlunoTurmaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAlunoTurmaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAlunoTurmaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAlunoTurmaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAlunoTurmaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAlunoTurmaQuery leftJoinPessoa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pessoa relation
 * @method     ChildAlunoTurmaQuery rightJoinPessoa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pessoa relation
 * @method     ChildAlunoTurmaQuery innerJoinPessoa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pessoa relation
 *
 * @method     ChildAlunoTurmaQuery joinWithPessoa($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pessoa relation
 *
 * @method     ChildAlunoTurmaQuery leftJoinWithPessoa() Adds a LEFT JOIN clause and with to the query using the Pessoa relation
 * @method     ChildAlunoTurmaQuery rightJoinWithPessoa() Adds a RIGHT JOIN clause and with to the query using the Pessoa relation
 * @method     ChildAlunoTurmaQuery innerJoinWithPessoa() Adds a INNER JOIN clause and with to the query using the Pessoa relation
 *
 * @method     ChildAlunoTurmaQuery leftJoinTurma($relationAlias = null) Adds a LEFT JOIN clause to the query using the Turma relation
 * @method     ChildAlunoTurmaQuery rightJoinTurma($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Turma relation
 * @method     ChildAlunoTurmaQuery innerJoinTurma($relationAlias = null) Adds a INNER JOIN clause to the query using the Turma relation
 *
 * @method     ChildAlunoTurmaQuery joinWithTurma($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Turma relation
 *
 * @method     ChildAlunoTurmaQuery leftJoinWithTurma() Adds a LEFT JOIN clause and with to the query using the Turma relation
 * @method     ChildAlunoTurmaQuery rightJoinWithTurma() Adds a RIGHT JOIN clause and with to the query using the Turma relation
 * @method     ChildAlunoTurmaQuery innerJoinWithTurma() Adds a INNER JOIN clause and with to the query using the Turma relation
 *
 * @method     \model\model\PessoaQuery|\model\model\TurmaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAlunoTurma findOne(ConnectionInterface $con = null) Return the first ChildAlunoTurma matching the query
 * @method     ChildAlunoTurma findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAlunoTurma matching the query, or a new ChildAlunoTurma object populated from the query conditions when no match is found
 *
 * @method     ChildAlunoTurma findOneBySqPessoa(int $SQ_PESSOA) Return the first ChildAlunoTurma filtered by the SQ_PESSOA column
 * @method     ChildAlunoTurma findOneBySqTurma(int $SQ_TURMA) Return the first ChildAlunoTurma filtered by the SQ_TURMA column *

 * @method     ChildAlunoTurma requirePk($key, ConnectionInterface $con = null) Return the ChildAlunoTurma by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAlunoTurma requireOne(ConnectionInterface $con = null) Return the first ChildAlunoTurma matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAlunoTurma requireOneBySqPessoa(int $SQ_PESSOA) Return the first ChildAlunoTurma filtered by the SQ_PESSOA column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAlunoTurma requireOneBySqTurma(int $SQ_TURMA) Return the first ChildAlunoTurma filtered by the SQ_TURMA column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAlunoTurma[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAlunoTurma objects based on current ModelCriteria
 * @method     ChildAlunoTurma[]|ObjectCollection findBySqPessoa(int $SQ_PESSOA) Return ChildAlunoTurma objects filtered by the SQ_PESSOA column
 * @method     ChildAlunoTurma[]|ObjectCollection findBySqTurma(int $SQ_TURMA) Return ChildAlunoTurma objects filtered by the SQ_TURMA column
 * @method     ChildAlunoTurma[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AlunoTurmaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \model\model\Base\AlunoTurmaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\model\\model\\AlunoTurma', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAlunoTurmaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAlunoTurmaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAlunoTurmaQuery) {
            return $criteria;
        }
        $query = new ChildAlunoTurmaQuery();
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
     * @return ChildAlunoTurma|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AlunoTurma object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The AlunoTurma object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAlunoTurmaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AlunoTurma object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAlunoTurmaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AlunoTurma object has no primary key');
    }

    /**
     * Filter the query on the SQ_PESSOA column
     *
     * Example usage:
     * <code>
     * $query->filterBySqPessoa(1234); // WHERE SQ_PESSOA = 1234
     * $query->filterBySqPessoa(array(12, 34)); // WHERE SQ_PESSOA IN (12, 34)
     * $query->filterBySqPessoa(array('min' => 12)); // WHERE SQ_PESSOA > 12
     * </code>
     *
     * @see       filterByPessoa()
     *
     * @param     mixed $sqPessoa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAlunoTurmaQuery The current query, for fluid interface
     */
    public function filterBySqPessoa($sqPessoa = null, $comparison = null)
    {
        if (is_array($sqPessoa)) {
            $useMinMax = false;
            if (isset($sqPessoa['min'])) {
                $this->addUsingAlias(AlunoTurmaTableMap::COL_SQ_PESSOA, $sqPessoa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sqPessoa['max'])) {
                $this->addUsingAlias(AlunoTurmaTableMap::COL_SQ_PESSOA, $sqPessoa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoTurmaTableMap::COL_SQ_PESSOA, $sqPessoa, $comparison);
    }

    /**
     * Filter the query on the SQ_TURMA column
     *
     * Example usage:
     * <code>
     * $query->filterBySqTurma(1234); // WHERE SQ_TURMA = 1234
     * $query->filterBySqTurma(array(12, 34)); // WHERE SQ_TURMA IN (12, 34)
     * $query->filterBySqTurma(array('min' => 12)); // WHERE SQ_TURMA > 12
     * </code>
     *
     * @see       filterByTurma()
     *
     * @param     mixed $sqTurma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAlunoTurmaQuery The current query, for fluid interface
     */
    public function filterBySqTurma($sqTurma = null, $comparison = null)
    {
        if (is_array($sqTurma)) {
            $useMinMax = false;
            if (isset($sqTurma['min'])) {
                $this->addUsingAlias(AlunoTurmaTableMap::COL_SQ_TURMA, $sqTurma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sqTurma['max'])) {
                $this->addUsingAlias(AlunoTurmaTableMap::COL_SQ_TURMA, $sqTurma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoTurmaTableMap::COL_SQ_TURMA, $sqTurma, $comparison);
    }

    /**
     * Filter the query by a related \model\model\Pessoa object
     *
     * @param \model\model\Pessoa|ObjectCollection $pessoa The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAlunoTurmaQuery The current query, for fluid interface
     */
    public function filterByPessoa($pessoa, $comparison = null)
    {
        if ($pessoa instanceof \model\model\Pessoa) {
            return $this
                ->addUsingAlias(AlunoTurmaTableMap::COL_SQ_PESSOA, $pessoa->getSqPessoa(), $comparison);
        } elseif ($pessoa instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlunoTurmaTableMap::COL_SQ_PESSOA, $pessoa->toKeyValue('PrimaryKey', 'SqPessoa'), $comparison);
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
     * @return $this|ChildAlunoTurmaQuery The current query, for fluid interface
     */
    public function joinPessoa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usePessoaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPessoa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pessoa', '\model\model\PessoaQuery');
    }

    /**
     * Filter the query by a related \model\model\Turma object
     *
     * @param \model\model\Turma|ObjectCollection $turma The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAlunoTurmaQuery The current query, for fluid interface
     */
    public function filterByTurma($turma, $comparison = null)
    {
        if ($turma instanceof \model\model\Turma) {
            return $this
                ->addUsingAlias(AlunoTurmaTableMap::COL_SQ_TURMA, $turma->getSqTurma(), $comparison);
        } elseif ($turma instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlunoTurmaTableMap::COL_SQ_TURMA, $turma->toKeyValue('PrimaryKey', 'SqTurma'), $comparison);
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
     * @return $this|ChildAlunoTurmaQuery The current query, for fluid interface
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
     * @param   ChildAlunoTurma $alunoTurma Object to remove from the list of results
     *
     * @return $this|ChildAlunoTurmaQuery The current query, for fluid interface
     */
    public function prune($alunoTurma = null)
    {
        if ($alunoTurma) {
            throw new LogicException('AlunoTurma object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the aluno_turma table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AlunoTurmaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AlunoTurmaTableMap::clearInstancePool();
            AlunoTurmaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AlunoTurmaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AlunoTurmaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            AlunoTurmaTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            AlunoTurmaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AlunoTurmaQuery
