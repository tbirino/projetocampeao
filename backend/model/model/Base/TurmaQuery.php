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
use model\model\Turma as ChildTurma;
use model\model\TurmaQuery as ChildTurmaQuery;
use model\model\Map\TurmaTableMap;

/**
 * Base class that represents a query for the 'turma' table.
 *
 * 
 *
 * @method     ChildTurmaQuery orderBySqTurma($order = Criteria::ASC) Order by the SQ_TURMA column
 * @method     ChildTurmaQuery orderByHorario($order = Criteria::ASC) Order by the HORARIO column
 * @method     ChildTurmaQuery orderBySqPessoa($order = Criteria::ASC) Order by the SQ_PESSOA column
 * @method     ChildTurmaQuery orderByIdModalidade($order = Criteria::ASC) Order by the ID_MODALIDADE column
 *
 * @method     ChildTurmaQuery groupBySqTurma() Group by the SQ_TURMA column
 * @method     ChildTurmaQuery groupByHorario() Group by the HORARIO column
 * @method     ChildTurmaQuery groupBySqPessoa() Group by the SQ_PESSOA column
 * @method     ChildTurmaQuery groupByIdModalidade() Group by the ID_MODALIDADE column
 *
 * @method     ChildTurmaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTurmaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTurmaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTurmaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTurmaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTurmaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTurmaQuery leftJoinModalidade($relationAlias = null) Adds a LEFT JOIN clause to the query using the Modalidade relation
 * @method     ChildTurmaQuery rightJoinModalidade($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Modalidade relation
 * @method     ChildTurmaQuery innerJoinModalidade($relationAlias = null) Adds a INNER JOIN clause to the query using the Modalidade relation
 *
 * @method     ChildTurmaQuery joinWithModalidade($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Modalidade relation
 *
 * @method     ChildTurmaQuery leftJoinWithModalidade() Adds a LEFT JOIN clause and with to the query using the Modalidade relation
 * @method     ChildTurmaQuery rightJoinWithModalidade() Adds a RIGHT JOIN clause and with to the query using the Modalidade relation
 * @method     ChildTurmaQuery innerJoinWithModalidade() Adds a INNER JOIN clause and with to the query using the Modalidade relation
 *
 * @method     ChildTurmaQuery leftJoinPessoa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pessoa relation
 * @method     ChildTurmaQuery rightJoinPessoa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pessoa relation
 * @method     ChildTurmaQuery innerJoinPessoa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pessoa relation
 *
 * @method     ChildTurmaQuery joinWithPessoa($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pessoa relation
 *
 * @method     ChildTurmaQuery leftJoinWithPessoa() Adds a LEFT JOIN clause and with to the query using the Pessoa relation
 * @method     ChildTurmaQuery rightJoinWithPessoa() Adds a RIGHT JOIN clause and with to the query using the Pessoa relation
 * @method     ChildTurmaQuery innerJoinWithPessoa() Adds a INNER JOIN clause and with to the query using the Pessoa relation
 *
 * @method     ChildTurmaQuery leftJoinAlunoTurma($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlunoTurma relation
 * @method     ChildTurmaQuery rightJoinAlunoTurma($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlunoTurma relation
 * @method     ChildTurmaQuery innerJoinAlunoTurma($relationAlias = null) Adds a INNER JOIN clause to the query using the AlunoTurma relation
 *
 * @method     ChildTurmaQuery joinWithAlunoTurma($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AlunoTurma relation
 *
 * @method     ChildTurmaQuery leftJoinWithAlunoTurma() Adds a LEFT JOIN clause and with to the query using the AlunoTurma relation
 * @method     ChildTurmaQuery rightJoinWithAlunoTurma() Adds a RIGHT JOIN clause and with to the query using the AlunoTurma relation
 * @method     ChildTurmaQuery innerJoinWithAlunoTurma() Adds a INNER JOIN clause and with to the query using the AlunoTurma relation
 *
 * @method     \model\model\ModalidadeQuery|\model\model\PessoaQuery|\model\model\AlunoTurmaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTurma findOne(ConnectionInterface $con = null) Return the first ChildTurma matching the query
 * @method     ChildTurma findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTurma matching the query, or a new ChildTurma object populated from the query conditions when no match is found
 *
 * @method     ChildTurma findOneBySqTurma(int $SQ_TURMA) Return the first ChildTurma filtered by the SQ_TURMA column
 * @method     ChildTurma findOneByHorario(string $HORARIO) Return the first ChildTurma filtered by the HORARIO column
 * @method     ChildTurma findOneBySqPessoa(int $SQ_PESSOA) Return the first ChildTurma filtered by the SQ_PESSOA column
 * @method     ChildTurma findOneByIdModalidade(int $ID_MODALIDADE) Return the first ChildTurma filtered by the ID_MODALIDADE column *

 * @method     ChildTurma requirePk($key, ConnectionInterface $con = null) Return the ChildTurma by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurma requireOne(ConnectionInterface $con = null) Return the first ChildTurma matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTurma requireOneBySqTurma(int $SQ_TURMA) Return the first ChildTurma filtered by the SQ_TURMA column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurma requireOneByHorario(string $HORARIO) Return the first ChildTurma filtered by the HORARIO column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurma requireOneBySqPessoa(int $SQ_PESSOA) Return the first ChildTurma filtered by the SQ_PESSOA column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurma requireOneByIdModalidade(int $ID_MODALIDADE) Return the first ChildTurma filtered by the ID_MODALIDADE column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTurma[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTurma objects based on current ModelCriteria
 * @method     ChildTurma[]|ObjectCollection findBySqTurma(int $SQ_TURMA) Return ChildTurma objects filtered by the SQ_TURMA column
 * @method     ChildTurma[]|ObjectCollection findByHorario(string $HORARIO) Return ChildTurma objects filtered by the HORARIO column
 * @method     ChildTurma[]|ObjectCollection findBySqPessoa(int $SQ_PESSOA) Return ChildTurma objects filtered by the SQ_PESSOA column
 * @method     ChildTurma[]|ObjectCollection findByIdModalidade(int $ID_MODALIDADE) Return ChildTurma objects filtered by the ID_MODALIDADE column
 * @method     ChildTurma[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TurmaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \model\model\Base\TurmaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\model\\model\\Turma', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTurmaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTurmaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTurmaQuery) {
            return $criteria;
        }
        $query = new ChildTurmaQuery();
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
     * @return ChildTurma|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TurmaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TurmaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTurma A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT SQ_TURMA, HORARIO, SQ_PESSOA, ID_MODALIDADE FROM turma WHERE SQ_TURMA = :p0';
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
            /** @var ChildTurma $obj */
            $obj = new ChildTurma();
            $obj->hydrate($row);
            TurmaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTurma|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTurmaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TurmaTableMap::COL_SQ_TURMA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTurmaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TurmaTableMap::COL_SQ_TURMA, $keys, Criteria::IN);
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
     * @param     mixed $sqTurma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTurmaQuery The current query, for fluid interface
     */
    public function filterBySqTurma($sqTurma = null, $comparison = null)
    {
        if (is_array($sqTurma)) {
            $useMinMax = false;
            if (isset($sqTurma['min'])) {
                $this->addUsingAlias(TurmaTableMap::COL_SQ_TURMA, $sqTurma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sqTurma['max'])) {
                $this->addUsingAlias(TurmaTableMap::COL_SQ_TURMA, $sqTurma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TurmaTableMap::COL_SQ_TURMA, $sqTurma, $comparison);
    }

    /**
     * Filter the query on the HORARIO column
     *
     * Example usage:
     * <code>
     * $query->filterByHorario('2011-03-14'); // WHERE HORARIO = '2011-03-14'
     * $query->filterByHorario('now'); // WHERE HORARIO = '2011-03-14'
     * $query->filterByHorario(array('max' => 'yesterday')); // WHERE HORARIO > '2011-03-13'
     * </code>
     *
     * @param     mixed $horario The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTurmaQuery The current query, for fluid interface
     */
    public function filterByHorario($horario = null, $comparison = null)
    {
        if (is_array($horario)) {
            $useMinMax = false;
            if (isset($horario['min'])) {
                $this->addUsingAlias(TurmaTableMap::COL_HORARIO, $horario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horario['max'])) {
                $this->addUsingAlias(TurmaTableMap::COL_HORARIO, $horario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TurmaTableMap::COL_HORARIO, $horario, $comparison);
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
     * @return $this|ChildTurmaQuery The current query, for fluid interface
     */
    public function filterBySqPessoa($sqPessoa = null, $comparison = null)
    {
        if (is_array($sqPessoa)) {
            $useMinMax = false;
            if (isset($sqPessoa['min'])) {
                $this->addUsingAlias(TurmaTableMap::COL_SQ_PESSOA, $sqPessoa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sqPessoa['max'])) {
                $this->addUsingAlias(TurmaTableMap::COL_SQ_PESSOA, $sqPessoa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TurmaTableMap::COL_SQ_PESSOA, $sqPessoa, $comparison);
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
     * @see       filterByModalidade()
     *
     * @param     mixed $idModalidade The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTurmaQuery The current query, for fluid interface
     */
    public function filterByIdModalidade($idModalidade = null, $comparison = null)
    {
        if (is_array($idModalidade)) {
            $useMinMax = false;
            if (isset($idModalidade['min'])) {
                $this->addUsingAlias(TurmaTableMap::COL_ID_MODALIDADE, $idModalidade['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idModalidade['max'])) {
                $this->addUsingAlias(TurmaTableMap::COL_ID_MODALIDADE, $idModalidade['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TurmaTableMap::COL_ID_MODALIDADE, $idModalidade, $comparison);
    }

    /**
     * Filter the query by a related \model\model\Modalidade object
     *
     * @param \model\model\Modalidade|ObjectCollection $modalidade The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTurmaQuery The current query, for fluid interface
     */
    public function filterByModalidade($modalidade, $comparison = null)
    {
        if ($modalidade instanceof \model\model\Modalidade) {
            return $this
                ->addUsingAlias(TurmaTableMap::COL_ID_MODALIDADE, $modalidade->getIdModalidade(), $comparison);
        } elseif ($modalidade instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TurmaTableMap::COL_ID_MODALIDADE, $modalidade->toKeyValue('PrimaryKey', 'IdModalidade'), $comparison);
        } else {
            throw new PropelException('filterByModalidade() only accepts arguments of type \model\model\Modalidade or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Modalidade relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTurmaQuery The current query, for fluid interface
     */
    public function joinModalidade($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Modalidade');

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
            $this->addJoinObject($join, 'Modalidade');
        }

        return $this;
    }

    /**
     * Use the Modalidade relation Modalidade object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \model\model\ModalidadeQuery A secondary query class using the current class as primary query
     */
    public function useModalidadeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinModalidade($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Modalidade', '\model\model\ModalidadeQuery');
    }

    /**
     * Filter the query by a related \model\model\Pessoa object
     *
     * @param \model\model\Pessoa|ObjectCollection $pessoa The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTurmaQuery The current query, for fluid interface
     */
    public function filterByPessoa($pessoa, $comparison = null)
    {
        if ($pessoa instanceof \model\model\Pessoa) {
            return $this
                ->addUsingAlias(TurmaTableMap::COL_SQ_PESSOA, $pessoa->getSqPessoa(), $comparison);
        } elseif ($pessoa instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TurmaTableMap::COL_SQ_PESSOA, $pessoa->toKeyValue('PrimaryKey', 'SqPessoa'), $comparison);
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
     * @return $this|ChildTurmaQuery The current query, for fluid interface
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
     * Filter the query by a related \model\model\AlunoTurma object
     *
     * @param \model\model\AlunoTurma|ObjectCollection $alunoTurma the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTurmaQuery The current query, for fluid interface
     */
    public function filterByAlunoTurma($alunoTurma, $comparison = null)
    {
        if ($alunoTurma instanceof \model\model\AlunoTurma) {
            return $this
                ->addUsingAlias(TurmaTableMap::COL_SQ_TURMA, $alunoTurma->getSqTurma(), $comparison);
        } elseif ($alunoTurma instanceof ObjectCollection) {
            return $this
                ->useAlunoTurmaQuery()
                ->filterByPrimaryKeys($alunoTurma->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlunoTurma() only accepts arguments of type \model\model\AlunoTurma or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlunoTurma relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTurmaQuery The current query, for fluid interface
     */
    public function joinAlunoTurma($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlunoTurma');

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
            $this->addJoinObject($join, 'AlunoTurma');
        }

        return $this;
    }

    /**
     * Use the AlunoTurma relation AlunoTurma object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \model\model\AlunoTurmaQuery A secondary query class using the current class as primary query
     */
    public function useAlunoTurmaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlunoTurma($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlunoTurma', '\model\model\AlunoTurmaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTurma $turma Object to remove from the list of results
     *
     * @return $this|ChildTurmaQuery The current query, for fluid interface
     */
    public function prune($turma = null)
    {
        if ($turma) {
            $this->addUsingAlias(TurmaTableMap::COL_SQ_TURMA, $turma->getSqTurma(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the turma table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TurmaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TurmaTableMap::clearInstancePool();
            TurmaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TurmaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TurmaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            TurmaTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            TurmaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TurmaQuery
