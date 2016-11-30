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
use model\model\Endereco as ChildEndereco;
use model\model\EnderecoQuery as ChildEnderecoQuery;
use model\model\Map\EnderecoTableMap;

/**
 * Base class that represents a query for the 'endereco' table.
 *
 * 
 *
 * @method     ChildEnderecoQuery orderBySqEndereco($order = Criteria::ASC) Order by the SQ_ENDERECO column
 * @method     ChildEnderecoQuery orderByBairro($order = Criteria::ASC) Order by the BAIRRO column
 * @method     ChildEnderecoQuery orderByRua($order = Criteria::ASC) Order by the RUA column
 * @method     ChildEnderecoQuery orderByCep($order = Criteria::ASC) Order by the CEP column
 * @method     ChildEnderecoQuery orderByComplemento($order = Criteria::ASC) Order by the COMPLEMENTO column
 * @method     ChildEnderecoQuery orderByCidade($order = Criteria::ASC) Order by the CIDADE column
 * @method     ChildEnderecoQuery orderByNumero($order = Criteria::ASC) Order by the NUMERO column
 * @method     ChildEnderecoQuery orderByIdUf($order = Criteria::ASC) Order by the ID_UF column
 *
 * @method     ChildEnderecoQuery groupBySqEndereco() Group by the SQ_ENDERECO column
 * @method     ChildEnderecoQuery groupByBairro() Group by the BAIRRO column
 * @method     ChildEnderecoQuery groupByRua() Group by the RUA column
 * @method     ChildEnderecoQuery groupByCep() Group by the CEP column
 * @method     ChildEnderecoQuery groupByComplemento() Group by the COMPLEMENTO column
 * @method     ChildEnderecoQuery groupByCidade() Group by the CIDADE column
 * @method     ChildEnderecoQuery groupByNumero() Group by the NUMERO column
 * @method     ChildEnderecoQuery groupByIdUf() Group by the ID_UF column
 *
 * @method     ChildEnderecoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEnderecoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEnderecoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEnderecoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEnderecoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEnderecoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEnderecoQuery leftJoinUf($relationAlias = null) Adds a LEFT JOIN clause to the query using the Uf relation
 * @method     ChildEnderecoQuery rightJoinUf($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Uf relation
 * @method     ChildEnderecoQuery innerJoinUf($relationAlias = null) Adds a INNER JOIN clause to the query using the Uf relation
 *
 * @method     ChildEnderecoQuery joinWithUf($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Uf relation
 *
 * @method     ChildEnderecoQuery leftJoinWithUf() Adds a LEFT JOIN clause and with to the query using the Uf relation
 * @method     ChildEnderecoQuery rightJoinWithUf() Adds a RIGHT JOIN clause and with to the query using the Uf relation
 * @method     ChildEnderecoQuery innerJoinWithUf() Adds a INNER JOIN clause and with to the query using the Uf relation
 *
 * @method     ChildEnderecoQuery leftJoinPessoa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pessoa relation
 * @method     ChildEnderecoQuery rightJoinPessoa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pessoa relation
 * @method     ChildEnderecoQuery innerJoinPessoa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pessoa relation
 *
 * @method     ChildEnderecoQuery joinWithPessoa($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pessoa relation
 *
 * @method     ChildEnderecoQuery leftJoinWithPessoa() Adds a LEFT JOIN clause and with to the query using the Pessoa relation
 * @method     ChildEnderecoQuery rightJoinWithPessoa() Adds a RIGHT JOIN clause and with to the query using the Pessoa relation
 * @method     ChildEnderecoQuery innerJoinWithPessoa() Adds a INNER JOIN clause and with to the query using the Pessoa relation
 *
 * @method     \model\model\UfQuery|\model\model\PessoaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEndereco findOne(ConnectionInterface $con = null) Return the first ChildEndereco matching the query
 * @method     ChildEndereco findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEndereco matching the query, or a new ChildEndereco object populated from the query conditions when no match is found
 *
 * @method     ChildEndereco findOneBySqEndereco(int $SQ_ENDERECO) Return the first ChildEndereco filtered by the SQ_ENDERECO column
 * @method     ChildEndereco findOneByBairro(string $BAIRRO) Return the first ChildEndereco filtered by the BAIRRO column
 * @method     ChildEndereco findOneByRua(string $RUA) Return the first ChildEndereco filtered by the RUA column
 * @method     ChildEndereco findOneByCep(string $CEP) Return the first ChildEndereco filtered by the CEP column
 * @method     ChildEndereco findOneByComplemento(string $COMPLEMENTO) Return the first ChildEndereco filtered by the COMPLEMENTO column
 * @method     ChildEndereco findOneByCidade(string $CIDADE) Return the first ChildEndereco filtered by the CIDADE column
 * @method     ChildEndereco findOneByNumero(string $NUMERO) Return the first ChildEndereco filtered by the NUMERO column
 * @method     ChildEndereco findOneByIdUf(int $ID_UF) Return the first ChildEndereco filtered by the ID_UF column *

 * @method     ChildEndereco requirePk($key, ConnectionInterface $con = null) Return the ChildEndereco by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEndereco requireOne(ConnectionInterface $con = null) Return the first ChildEndereco matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEndereco requireOneBySqEndereco(int $SQ_ENDERECO) Return the first ChildEndereco filtered by the SQ_ENDERECO column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEndereco requireOneByBairro(string $BAIRRO) Return the first ChildEndereco filtered by the BAIRRO column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEndereco requireOneByRua(string $RUA) Return the first ChildEndereco filtered by the RUA column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEndereco requireOneByCep(string $CEP) Return the first ChildEndereco filtered by the CEP column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEndereco requireOneByComplemento(string $COMPLEMENTO) Return the first ChildEndereco filtered by the COMPLEMENTO column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEndereco requireOneByCidade(string $CIDADE) Return the first ChildEndereco filtered by the CIDADE column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEndereco requireOneByNumero(string $NUMERO) Return the first ChildEndereco filtered by the NUMERO column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEndereco requireOneByIdUf(int $ID_UF) Return the first ChildEndereco filtered by the ID_UF column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEndereco[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEndereco objects based on current ModelCriteria
 * @method     ChildEndereco[]|ObjectCollection findBySqEndereco(int $SQ_ENDERECO) Return ChildEndereco objects filtered by the SQ_ENDERECO column
 * @method     ChildEndereco[]|ObjectCollection findByBairro(string $BAIRRO) Return ChildEndereco objects filtered by the BAIRRO column
 * @method     ChildEndereco[]|ObjectCollection findByRua(string $RUA) Return ChildEndereco objects filtered by the RUA column
 * @method     ChildEndereco[]|ObjectCollection findByCep(string $CEP) Return ChildEndereco objects filtered by the CEP column
 * @method     ChildEndereco[]|ObjectCollection findByComplemento(string $COMPLEMENTO) Return ChildEndereco objects filtered by the COMPLEMENTO column
 * @method     ChildEndereco[]|ObjectCollection findByCidade(string $CIDADE) Return ChildEndereco objects filtered by the CIDADE column
 * @method     ChildEndereco[]|ObjectCollection findByNumero(string $NUMERO) Return ChildEndereco objects filtered by the NUMERO column
 * @method     ChildEndereco[]|ObjectCollection findByIdUf(int $ID_UF) Return ChildEndereco objects filtered by the ID_UF column
 * @method     ChildEndereco[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EnderecoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \model\model\Base\EnderecoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\model\\model\\Endereco', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEnderecoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEnderecoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEnderecoQuery) {
            return $criteria;
        }
        $query = new ChildEnderecoQuery();
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
     * @return ChildEndereco|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EnderecoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EnderecoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEndereco A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT SQ_ENDERECO, BAIRRO, RUA, CEP, COMPLEMENTO, CIDADE, NUMERO, ID_UF FROM endereco WHERE SQ_ENDERECO = :p0';
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
            /** @var ChildEndereco $obj */
            $obj = new ChildEndereco();
            $obj->hydrate($row);
            EnderecoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEndereco|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EnderecoTableMap::COL_SQ_ENDERECO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EnderecoTableMap::COL_SQ_ENDERECO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the SQ_ENDERECO column
     *
     * Example usage:
     * <code>
     * $query->filterBySqEndereco(1234); // WHERE SQ_ENDERECO = 1234
     * $query->filterBySqEndereco(array(12, 34)); // WHERE SQ_ENDERECO IN (12, 34)
     * $query->filterBySqEndereco(array('min' => 12)); // WHERE SQ_ENDERECO > 12
     * </code>
     *
     * @param     mixed $sqEndereco The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterBySqEndereco($sqEndereco = null, $comparison = null)
    {
        if (is_array($sqEndereco)) {
            $useMinMax = false;
            if (isset($sqEndereco['min'])) {
                $this->addUsingAlias(EnderecoTableMap::COL_SQ_ENDERECO, $sqEndereco['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sqEndereco['max'])) {
                $this->addUsingAlias(EnderecoTableMap::COL_SQ_ENDERECO, $sqEndereco['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnderecoTableMap::COL_SQ_ENDERECO, $sqEndereco, $comparison);
    }

    /**
     * Filter the query on the BAIRRO column
     *
     * Example usage:
     * <code>
     * $query->filterByBairro('fooValue');   // WHERE BAIRRO = 'fooValue'
     * $query->filterByBairro('%fooValue%', Criteria::LIKE); // WHERE BAIRRO LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bairro The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByBairro($bairro = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bairro)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnderecoTableMap::COL_BAIRRO, $bairro, $comparison);
    }

    /**
     * Filter the query on the RUA column
     *
     * Example usage:
     * <code>
     * $query->filterByRua('fooValue');   // WHERE RUA = 'fooValue'
     * $query->filterByRua('%fooValue%', Criteria::LIKE); // WHERE RUA LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rua The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByRua($rua = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rua)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnderecoTableMap::COL_RUA, $rua, $comparison);
    }

    /**
     * Filter the query on the CEP column
     *
     * Example usage:
     * <code>
     * $query->filterByCep('fooValue');   // WHERE CEP = 'fooValue'
     * $query->filterByCep('%fooValue%', Criteria::LIKE); // WHERE CEP LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cep The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByCep($cep = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cep)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnderecoTableMap::COL_CEP, $cep, $comparison);
    }

    /**
     * Filter the query on the COMPLEMENTO column
     *
     * Example usage:
     * <code>
     * $query->filterByComplemento('fooValue');   // WHERE COMPLEMENTO = 'fooValue'
     * $query->filterByComplemento('%fooValue%', Criteria::LIKE); // WHERE COMPLEMENTO LIKE '%fooValue%'
     * </code>
     *
     * @param     string $complemento The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByComplemento($complemento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($complemento)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnderecoTableMap::COL_COMPLEMENTO, $complemento, $comparison);
    }

    /**
     * Filter the query on the CIDADE column
     *
     * Example usage:
     * <code>
     * $query->filterByCidade('fooValue');   // WHERE CIDADE = 'fooValue'
     * $query->filterByCidade('%fooValue%', Criteria::LIKE); // WHERE CIDADE LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cidade The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByCidade($cidade = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cidade)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnderecoTableMap::COL_CIDADE, $cidade, $comparison);
    }

    /**
     * Filter the query on the NUMERO column
     *
     * Example usage:
     * <code>
     * $query->filterByNumero('fooValue');   // WHERE NUMERO = 'fooValue'
     * $query->filterByNumero('%fooValue%', Criteria::LIKE); // WHERE NUMERO LIKE '%fooValue%'
     * </code>
     *
     * @param     string $numero The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByNumero($numero = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($numero)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnderecoTableMap::COL_NUMERO, $numero, $comparison);
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
     * @see       filterByUf()
     *
     * @param     mixed $idUf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByIdUf($idUf = null, $comparison = null)
    {
        if (is_array($idUf)) {
            $useMinMax = false;
            if (isset($idUf['min'])) {
                $this->addUsingAlias(EnderecoTableMap::COL_ID_UF, $idUf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUf['max'])) {
                $this->addUsingAlias(EnderecoTableMap::COL_ID_UF, $idUf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnderecoTableMap::COL_ID_UF, $idUf, $comparison);
    }

    /**
     * Filter the query by a related \model\model\Uf object
     *
     * @param \model\model\Uf|ObjectCollection $uf The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByUf($uf, $comparison = null)
    {
        if ($uf instanceof \model\model\Uf) {
            return $this
                ->addUsingAlias(EnderecoTableMap::COL_ID_UF, $uf->getIdUf(), $comparison);
        } elseif ($uf instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EnderecoTableMap::COL_ID_UF, $uf->toKeyValue('PrimaryKey', 'IdUf'), $comparison);
        } else {
            throw new PropelException('filterByUf() only accepts arguments of type \model\model\Uf or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Uf relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function joinUf($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Uf');

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
            $this->addJoinObject($join, 'Uf');
        }

        return $this;
    }

    /**
     * Use the Uf relation Uf object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \model\model\UfQuery A secondary query class using the current class as primary query
     */
    public function useUfQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUf($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Uf', '\model\model\UfQuery');
    }

    /**
     * Filter the query by a related \model\model\Pessoa object
     *
     * @param \model\model\Pessoa|ObjectCollection $pessoa the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEnderecoQuery The current query, for fluid interface
     */
    public function filterByPessoa($pessoa, $comparison = null)
    {
        if ($pessoa instanceof \model\model\Pessoa) {
            return $this
                ->addUsingAlias(EnderecoTableMap::COL_SQ_ENDERECO, $pessoa->getSqEndereco(), $comparison);
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
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildEndereco $endereco Object to remove from the list of results
     *
     * @return $this|ChildEnderecoQuery The current query, for fluid interface
     */
    public function prune($endereco = null)
    {
        if ($endereco) {
            $this->addUsingAlias(EnderecoTableMap::COL_SQ_ENDERECO, $endereco->getSqEndereco(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the endereco table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EnderecoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EnderecoTableMap::clearInstancePool();
            EnderecoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EnderecoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EnderecoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            EnderecoTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            EnderecoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EnderecoQuery
