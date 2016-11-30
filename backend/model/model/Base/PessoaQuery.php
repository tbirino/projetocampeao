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
use model\model\Pessoa as ChildPessoa;
use model\model\PessoaQuery as ChildPessoaQuery;
use model\model\Map\PessoaTableMap;

/**
 * Base class that represents a query for the 'pessoa' table.
 *
 * 
 *
 * @method     ChildPessoaQuery orderBySqPessoa($order = Criteria::ASC) Order by the SQ_PESSOA column
 * @method     ChildPessoaQuery orderByNome($order = Criteria::ASC) Order by the NOME column
 * @method     ChildPessoaQuery orderByRg($order = Criteria::ASC) Order by the RG column
 * @method     ChildPessoaQuery orderByCpf($order = Criteria::ASC) Order by the CPF column
 * @method     ChildPessoaQuery orderByDtNascimento($order = Criteria::ASC) Order by the DT_NASCIMENTO column
 * @method     ChildPessoaQuery orderByTelResidencial($order = Criteria::ASC) Order by the TEL_RESIDENCIAL column
 * @method     ChildPessoaQuery orderByTelCelular($order = Criteria::ASC) Order by the TEL_CELULAR column
 * @method     ChildPessoaQuery orderByNomePai($order = Criteria::ASC) Order by the NOME_PAI column
 * @method     ChildPessoaQuery orderByNomeMae($order = Criteria::ASC) Order by the NOME_MAE column
 * @method     ChildPessoaQuery orderByEmail($order = Criteria::ASC) Order by the EMAIL column
 * @method     ChildPessoaQuery orderByDtEntrada($order = Criteria::ASC) Order by the DT_ENTRADA column
 * @method     ChildPessoaQuery orderBySqEndereco($order = Criteria::ASC) Order by the SQ_ENDERECO column
 * @method     ChildPessoaQuery orderByIdFaixa($order = Criteria::ASC) Order by the ID_FAIXA column
 *
 * @method     ChildPessoaQuery groupBySqPessoa() Group by the SQ_PESSOA column
 * @method     ChildPessoaQuery groupByNome() Group by the NOME column
 * @method     ChildPessoaQuery groupByRg() Group by the RG column
 * @method     ChildPessoaQuery groupByCpf() Group by the CPF column
 * @method     ChildPessoaQuery groupByDtNascimento() Group by the DT_NASCIMENTO column
 * @method     ChildPessoaQuery groupByTelResidencial() Group by the TEL_RESIDENCIAL column
 * @method     ChildPessoaQuery groupByTelCelular() Group by the TEL_CELULAR column
 * @method     ChildPessoaQuery groupByNomePai() Group by the NOME_PAI column
 * @method     ChildPessoaQuery groupByNomeMae() Group by the NOME_MAE column
 * @method     ChildPessoaQuery groupByEmail() Group by the EMAIL column
 * @method     ChildPessoaQuery groupByDtEntrada() Group by the DT_ENTRADA column
 * @method     ChildPessoaQuery groupBySqEndereco() Group by the SQ_ENDERECO column
 * @method     ChildPessoaQuery groupByIdFaixa() Group by the ID_FAIXA column
 *
 * @method     ChildPessoaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPessoaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPessoaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPessoaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPessoaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPessoaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPessoaQuery leftJoinEndereco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Endereco relation
 * @method     ChildPessoaQuery rightJoinEndereco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Endereco relation
 * @method     ChildPessoaQuery innerJoinEndereco($relationAlias = null) Adds a INNER JOIN clause to the query using the Endereco relation
 *
 * @method     ChildPessoaQuery joinWithEndereco($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Endereco relation
 *
 * @method     ChildPessoaQuery leftJoinWithEndereco() Adds a LEFT JOIN clause and with to the query using the Endereco relation
 * @method     ChildPessoaQuery rightJoinWithEndereco() Adds a RIGHT JOIN clause and with to the query using the Endereco relation
 * @method     ChildPessoaQuery innerJoinWithEndereco() Adds a INNER JOIN clause and with to the query using the Endereco relation
 *
 * @method     ChildPessoaQuery leftJoinFaixa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Faixa relation
 * @method     ChildPessoaQuery rightJoinFaixa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Faixa relation
 * @method     ChildPessoaQuery innerJoinFaixa($relationAlias = null) Adds a INNER JOIN clause to the query using the Faixa relation
 *
 * @method     ChildPessoaQuery joinWithFaixa($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Faixa relation
 *
 * @method     ChildPessoaQuery leftJoinWithFaixa() Adds a LEFT JOIN clause and with to the query using the Faixa relation
 * @method     ChildPessoaQuery rightJoinWithFaixa() Adds a RIGHT JOIN clause and with to the query using the Faixa relation
 * @method     ChildPessoaQuery innerJoinWithFaixa() Adds a INNER JOIN clause and with to the query using the Faixa relation
 *
 * @method     ChildPessoaQuery leftJoinAlunoTurma($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlunoTurma relation
 * @method     ChildPessoaQuery rightJoinAlunoTurma($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlunoTurma relation
 * @method     ChildPessoaQuery innerJoinAlunoTurma($relationAlias = null) Adds a INNER JOIN clause to the query using the AlunoTurma relation
 *
 * @method     ChildPessoaQuery joinWithAlunoTurma($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AlunoTurma relation
 *
 * @method     ChildPessoaQuery leftJoinWithAlunoTurma() Adds a LEFT JOIN clause and with to the query using the AlunoTurma relation
 * @method     ChildPessoaQuery rightJoinWithAlunoTurma() Adds a RIGHT JOIN clause and with to the query using the AlunoTurma relation
 * @method     ChildPessoaQuery innerJoinWithAlunoTurma() Adds a INNER JOIN clause and with to the query using the AlunoTurma relation
 *
 * @method     ChildPessoaQuery leftJoinTurma($relationAlias = null) Adds a LEFT JOIN clause to the query using the Turma relation
 * @method     ChildPessoaQuery rightJoinTurma($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Turma relation
 * @method     ChildPessoaQuery innerJoinTurma($relationAlias = null) Adds a INNER JOIN clause to the query using the Turma relation
 *
 * @method     ChildPessoaQuery joinWithTurma($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Turma relation
 *
 * @method     ChildPessoaQuery leftJoinWithTurma() Adds a LEFT JOIN clause and with to the query using the Turma relation
 * @method     ChildPessoaQuery rightJoinWithTurma() Adds a RIGHT JOIN clause and with to the query using the Turma relation
 * @method     ChildPessoaQuery innerJoinWithTurma() Adds a INNER JOIN clause and with to the query using the Turma relation
 *
 * @method     \model\model\EnderecoQuery|\model\model\FaixaQuery|\model\model\AlunoTurmaQuery|\model\model\TurmaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPessoa findOne(ConnectionInterface $con = null) Return the first ChildPessoa matching the query
 * @method     ChildPessoa findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPessoa matching the query, or a new ChildPessoa object populated from the query conditions when no match is found
 *
 * @method     ChildPessoa findOneBySqPessoa(int $SQ_PESSOA) Return the first ChildPessoa filtered by the SQ_PESSOA column
 * @method     ChildPessoa findOneByNome(string $NOME) Return the first ChildPessoa filtered by the NOME column
 * @method     ChildPessoa findOneByRg(string $RG) Return the first ChildPessoa filtered by the RG column
 * @method     ChildPessoa findOneByCpf(string $CPF) Return the first ChildPessoa filtered by the CPF column
 * @method     ChildPessoa findOneByDtNascimento(string $DT_NASCIMENTO) Return the first ChildPessoa filtered by the DT_NASCIMENTO column
 * @method     ChildPessoa findOneByTelResidencial(string $TEL_RESIDENCIAL) Return the first ChildPessoa filtered by the TEL_RESIDENCIAL column
 * @method     ChildPessoa findOneByTelCelular(string $TEL_CELULAR) Return the first ChildPessoa filtered by the TEL_CELULAR column
 * @method     ChildPessoa findOneByNomePai(string $NOME_PAI) Return the first ChildPessoa filtered by the NOME_PAI column
 * @method     ChildPessoa findOneByNomeMae(string $NOME_MAE) Return the first ChildPessoa filtered by the NOME_MAE column
 * @method     ChildPessoa findOneByEmail(string $EMAIL) Return the first ChildPessoa filtered by the EMAIL column
 * @method     ChildPessoa findOneByDtEntrada(string $DT_ENTRADA) Return the first ChildPessoa filtered by the DT_ENTRADA column
 * @method     ChildPessoa findOneBySqEndereco(int $SQ_ENDERECO) Return the first ChildPessoa filtered by the SQ_ENDERECO column
 * @method     ChildPessoa findOneByIdFaixa(int $ID_FAIXA) Return the first ChildPessoa filtered by the ID_FAIXA column *

 * @method     ChildPessoa requirePk($key, ConnectionInterface $con = null) Return the ChildPessoa by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOne(ConnectionInterface $con = null) Return the first ChildPessoa matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPessoa requireOneBySqPessoa(int $SQ_PESSOA) Return the first ChildPessoa filtered by the SQ_PESSOA column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByNome(string $NOME) Return the first ChildPessoa filtered by the NOME column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByRg(string $RG) Return the first ChildPessoa filtered by the RG column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByCpf(string $CPF) Return the first ChildPessoa filtered by the CPF column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByDtNascimento(string $DT_NASCIMENTO) Return the first ChildPessoa filtered by the DT_NASCIMENTO column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByTelResidencial(string $TEL_RESIDENCIAL) Return the first ChildPessoa filtered by the TEL_RESIDENCIAL column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByTelCelular(string $TEL_CELULAR) Return the first ChildPessoa filtered by the TEL_CELULAR column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByNomePai(string $NOME_PAI) Return the first ChildPessoa filtered by the NOME_PAI column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByNomeMae(string $NOME_MAE) Return the first ChildPessoa filtered by the NOME_MAE column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByEmail(string $EMAIL) Return the first ChildPessoa filtered by the EMAIL column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByDtEntrada(string $DT_ENTRADA) Return the first ChildPessoa filtered by the DT_ENTRADA column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneBySqEndereco(int $SQ_ENDERECO) Return the first ChildPessoa filtered by the SQ_ENDERECO column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPessoa requireOneByIdFaixa(int $ID_FAIXA) Return the first ChildPessoa filtered by the ID_FAIXA column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPessoa[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPessoa objects based on current ModelCriteria
 * @method     ChildPessoa[]|ObjectCollection findBySqPessoa(int $SQ_PESSOA) Return ChildPessoa objects filtered by the SQ_PESSOA column
 * @method     ChildPessoa[]|ObjectCollection findByNome(string $NOME) Return ChildPessoa objects filtered by the NOME column
 * @method     ChildPessoa[]|ObjectCollection findByRg(string $RG) Return ChildPessoa objects filtered by the RG column
 * @method     ChildPessoa[]|ObjectCollection findByCpf(string $CPF) Return ChildPessoa objects filtered by the CPF column
 * @method     ChildPessoa[]|ObjectCollection findByDtNascimento(string $DT_NASCIMENTO) Return ChildPessoa objects filtered by the DT_NASCIMENTO column
 * @method     ChildPessoa[]|ObjectCollection findByTelResidencial(string $TEL_RESIDENCIAL) Return ChildPessoa objects filtered by the TEL_RESIDENCIAL column
 * @method     ChildPessoa[]|ObjectCollection findByTelCelular(string $TEL_CELULAR) Return ChildPessoa objects filtered by the TEL_CELULAR column
 * @method     ChildPessoa[]|ObjectCollection findByNomePai(string $NOME_PAI) Return ChildPessoa objects filtered by the NOME_PAI column
 * @method     ChildPessoa[]|ObjectCollection findByNomeMae(string $NOME_MAE) Return ChildPessoa objects filtered by the NOME_MAE column
 * @method     ChildPessoa[]|ObjectCollection findByEmail(string $EMAIL) Return ChildPessoa objects filtered by the EMAIL column
 * @method     ChildPessoa[]|ObjectCollection findByDtEntrada(string $DT_ENTRADA) Return ChildPessoa objects filtered by the DT_ENTRADA column
 * @method     ChildPessoa[]|ObjectCollection findBySqEndereco(int $SQ_ENDERECO) Return ChildPessoa objects filtered by the SQ_ENDERECO column
 * @method     ChildPessoa[]|ObjectCollection findByIdFaixa(int $ID_FAIXA) Return ChildPessoa objects filtered by the ID_FAIXA column
 * @method     ChildPessoa[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PessoaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \model\model\Base\PessoaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\model\\model\\Pessoa', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPessoaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPessoaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPessoaQuery) {
            return $criteria;
        }
        $query = new ChildPessoaQuery();
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
     * @return ChildPessoa|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PessoaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PessoaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPessoa A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT SQ_PESSOA, NOME, RG, CPF, DT_NASCIMENTO, TEL_RESIDENCIAL, TEL_CELULAR, NOME_PAI, NOME_MAE, EMAIL, DT_ENTRADA, SQ_ENDERECO, ID_FAIXA FROM pessoa WHERE SQ_PESSOA = :p0';
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
            /** @var ChildPessoa $obj */
            $obj = new ChildPessoa();
            $obj->hydrate($row);
            PessoaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPessoa|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PessoaTableMap::COL_SQ_PESSOA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PessoaTableMap::COL_SQ_PESSOA, $keys, Criteria::IN);
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
     * @param     mixed $sqPessoa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterBySqPessoa($sqPessoa = null, $comparison = null)
    {
        if (is_array($sqPessoa)) {
            $useMinMax = false;
            if (isset($sqPessoa['min'])) {
                $this->addUsingAlias(PessoaTableMap::COL_SQ_PESSOA, $sqPessoa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sqPessoa['max'])) {
                $this->addUsingAlias(PessoaTableMap::COL_SQ_PESSOA, $sqPessoa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_SQ_PESSOA, $sqPessoa, $comparison);
    }

    /**
     * Filter the query on the NOME column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE NOME = 'fooValue'
     * $query->filterByNome('%fooValue%', Criteria::LIKE); // WHERE NOME LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the RG column
     *
     * Example usage:
     * <code>
     * $query->filterByRg('fooValue');   // WHERE RG = 'fooValue'
     * $query->filterByRg('%fooValue%', Criteria::LIKE); // WHERE RG LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByRg($rg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_RG, $rg, $comparison);
    }

    /**
     * Filter the query on the CPF column
     *
     * Example usage:
     * <code>
     * $query->filterByCpf('fooValue');   // WHERE CPF = 'fooValue'
     * $query->filterByCpf('%fooValue%', Criteria::LIKE); // WHERE CPF LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cpf The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByCpf($cpf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cpf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_CPF, $cpf, $comparison);
    }

    /**
     * Filter the query on the DT_NASCIMENTO column
     *
     * Example usage:
     * <code>
     * $query->filterByDtNascimento('2011-03-14'); // WHERE DT_NASCIMENTO = '2011-03-14'
     * $query->filterByDtNascimento('now'); // WHERE DT_NASCIMENTO = '2011-03-14'
     * $query->filterByDtNascimento(array('max' => 'yesterday')); // WHERE DT_NASCIMENTO > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtNascimento The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByDtNascimento($dtNascimento = null, $comparison = null)
    {
        if (is_array($dtNascimento)) {
            $useMinMax = false;
            if (isset($dtNascimento['min'])) {
                $this->addUsingAlias(PessoaTableMap::COL_DT_NASCIMENTO, $dtNascimento['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtNascimento['max'])) {
                $this->addUsingAlias(PessoaTableMap::COL_DT_NASCIMENTO, $dtNascimento['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_DT_NASCIMENTO, $dtNascimento, $comparison);
    }

    /**
     * Filter the query on the TEL_RESIDENCIAL column
     *
     * Example usage:
     * <code>
     * $query->filterByTelResidencial('fooValue');   // WHERE TEL_RESIDENCIAL = 'fooValue'
     * $query->filterByTelResidencial('%fooValue%', Criteria::LIKE); // WHERE TEL_RESIDENCIAL LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telResidencial The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByTelResidencial($telResidencial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telResidencial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_TEL_RESIDENCIAL, $telResidencial, $comparison);
    }

    /**
     * Filter the query on the TEL_CELULAR column
     *
     * Example usage:
     * <code>
     * $query->filterByTelCelular('fooValue');   // WHERE TEL_CELULAR = 'fooValue'
     * $query->filterByTelCelular('%fooValue%', Criteria::LIKE); // WHERE TEL_CELULAR LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telCelular The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByTelCelular($telCelular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telCelular)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_TEL_CELULAR, $telCelular, $comparison);
    }

    /**
     * Filter the query on the NOME_PAI column
     *
     * Example usage:
     * <code>
     * $query->filterByNomePai('fooValue');   // WHERE NOME_PAI = 'fooValue'
     * $query->filterByNomePai('%fooValue%', Criteria::LIKE); // WHERE NOME_PAI LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomePai The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByNomePai($nomePai = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomePai)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_NOME_PAI, $nomePai, $comparison);
    }

    /**
     * Filter the query on the NOME_MAE column
     *
     * Example usage:
     * <code>
     * $query->filterByNomeMae('fooValue');   // WHERE NOME_MAE = 'fooValue'
     * $query->filterByNomeMae('%fooValue%', Criteria::LIKE); // WHERE NOME_MAE LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomeMae The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByNomeMae($nomeMae = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomeMae)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_NOME_MAE, $nomeMae, $comparison);
    }

    /**
     * Filter the query on the EMAIL column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE EMAIL = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE EMAIL LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the DT_ENTRADA column
     *
     * Example usage:
     * <code>
     * $query->filterByDtEntrada('2011-03-14'); // WHERE DT_ENTRADA = '2011-03-14'
     * $query->filterByDtEntrada('now'); // WHERE DT_ENTRADA = '2011-03-14'
     * $query->filterByDtEntrada(array('max' => 'yesterday')); // WHERE DT_ENTRADA > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtEntrada The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByDtEntrada($dtEntrada = null, $comparison = null)
    {
        if (is_array($dtEntrada)) {
            $useMinMax = false;
            if (isset($dtEntrada['min'])) {
                $this->addUsingAlias(PessoaTableMap::COL_DT_ENTRADA, $dtEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtEntrada['max'])) {
                $this->addUsingAlias(PessoaTableMap::COL_DT_ENTRADA, $dtEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_DT_ENTRADA, $dtEntrada, $comparison);
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
     * @see       filterByEndereco()
     *
     * @param     mixed $sqEndereco The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterBySqEndereco($sqEndereco = null, $comparison = null)
    {
        if (is_array($sqEndereco)) {
            $useMinMax = false;
            if (isset($sqEndereco['min'])) {
                $this->addUsingAlias(PessoaTableMap::COL_SQ_ENDERECO, $sqEndereco['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sqEndereco['max'])) {
                $this->addUsingAlias(PessoaTableMap::COL_SQ_ENDERECO, $sqEndereco['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_SQ_ENDERECO, $sqEndereco, $comparison);
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
     * @see       filterByFaixa()
     *
     * @param     mixed $idFaixa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByIdFaixa($idFaixa = null, $comparison = null)
    {
        if (is_array($idFaixa)) {
            $useMinMax = false;
            if (isset($idFaixa['min'])) {
                $this->addUsingAlias(PessoaTableMap::COL_ID_FAIXA, $idFaixa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFaixa['max'])) {
                $this->addUsingAlias(PessoaTableMap::COL_ID_FAIXA, $idFaixa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaTableMap::COL_ID_FAIXA, $idFaixa, $comparison);
    }

    /**
     * Filter the query by a related \model\model\Endereco object
     *
     * @param \model\model\Endereco|ObjectCollection $endereco The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByEndereco($endereco, $comparison = null)
    {
        if ($endereco instanceof \model\model\Endereco) {
            return $this
                ->addUsingAlias(PessoaTableMap::COL_SQ_ENDERECO, $endereco->getSqEndereco(), $comparison);
        } elseif ($endereco instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PessoaTableMap::COL_SQ_ENDERECO, $endereco->toKeyValue('PrimaryKey', 'SqEndereco'), $comparison);
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
     * @return $this|ChildPessoaQuery The current query, for fluid interface
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
     * Filter the query by a related \model\model\Faixa object
     *
     * @param \model\model\Faixa|ObjectCollection $faixa The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByFaixa($faixa, $comparison = null)
    {
        if ($faixa instanceof \model\model\Faixa) {
            return $this
                ->addUsingAlias(PessoaTableMap::COL_ID_FAIXA, $faixa->getIdFaixa(), $comparison);
        } elseif ($faixa instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PessoaTableMap::COL_ID_FAIXA, $faixa->toKeyValue('PrimaryKey', 'IdFaixa'), $comparison);
        } else {
            throw new PropelException('filterByFaixa() only accepts arguments of type \model\model\Faixa or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Faixa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function joinFaixa($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Faixa');

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
            $this->addJoinObject($join, 'Faixa');
        }

        return $this;
    }

    /**
     * Use the Faixa relation Faixa object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \model\model\FaixaQuery A secondary query class using the current class as primary query
     */
    public function useFaixaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFaixa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Faixa', '\model\model\FaixaQuery');
    }

    /**
     * Filter the query by a related \model\model\AlunoTurma object
     *
     * @param \model\model\AlunoTurma|ObjectCollection $alunoTurma the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByAlunoTurma($alunoTurma, $comparison = null)
    {
        if ($alunoTurma instanceof \model\model\AlunoTurma) {
            return $this
                ->addUsingAlias(PessoaTableMap::COL_SQ_PESSOA, $alunoTurma->getSqPessoa(), $comparison);
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
     * @return $this|ChildPessoaQuery The current query, for fluid interface
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
     * Filter the query by a related \model\model\Turma object
     *
     * @param \model\model\Turma|ObjectCollection $turma the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPessoaQuery The current query, for fluid interface
     */
    public function filterByTurma($turma, $comparison = null)
    {
        if ($turma instanceof \model\model\Turma) {
            return $this
                ->addUsingAlias(PessoaTableMap::COL_SQ_PESSOA, $turma->getSqPessoa(), $comparison);
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
     * @return $this|ChildPessoaQuery The current query, for fluid interface
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
     * @param   ChildPessoa $pessoa Object to remove from the list of results
     *
     * @return $this|ChildPessoaQuery The current query, for fluid interface
     */
    public function prune($pessoa = null)
    {
        if ($pessoa) {
            $this->addUsingAlias(PessoaTableMap::COL_SQ_PESSOA, $pessoa->getSqPessoa(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the pessoa table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PessoaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PessoaTableMap::clearInstancePool();
            PessoaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PessoaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PessoaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            PessoaTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            PessoaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PessoaQuery
