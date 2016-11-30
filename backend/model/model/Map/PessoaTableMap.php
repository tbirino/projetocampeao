<?php

namespace model\model\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use model\model\Pessoa;
use model\model\PessoaQuery;


/**
 * This class defines the structure of the 'pessoa' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PessoaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'model.model.Map.PessoaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'pessoa';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\model\\model\\Pessoa';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'model.model.Pessoa';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the SQ_PESSOA field
     */
    const COL_SQ_PESSOA = 'pessoa.SQ_PESSOA';

    /**
     * the column name for the NOME field
     */
    const COL_NOME = 'pessoa.NOME';

    /**
     * the column name for the RG field
     */
    const COL_RG = 'pessoa.RG';

    /**
     * the column name for the CPF field
     */
    const COL_CPF = 'pessoa.CPF';

    /**
     * the column name for the DT_NASCIMENTO field
     */
    const COL_DT_NASCIMENTO = 'pessoa.DT_NASCIMENTO';

    /**
     * the column name for the TEL_RESIDENCIAL field
     */
    const COL_TEL_RESIDENCIAL = 'pessoa.TEL_RESIDENCIAL';

    /**
     * the column name for the TEL_CELULAR field
     */
    const COL_TEL_CELULAR = 'pessoa.TEL_CELULAR';

    /**
     * the column name for the NOME_PAI field
     */
    const COL_NOME_PAI = 'pessoa.NOME_PAI';

    /**
     * the column name for the NOME_MAE field
     */
    const COL_NOME_MAE = 'pessoa.NOME_MAE';

    /**
     * the column name for the EMAIL field
     */
    const COL_EMAIL = 'pessoa.EMAIL';

    /**
     * the column name for the DT_ENTRADA field
     */
    const COL_DT_ENTRADA = 'pessoa.DT_ENTRADA';

    /**
     * the column name for the SQ_ENDERECO field
     */
    const COL_SQ_ENDERECO = 'pessoa.SQ_ENDERECO';

    /**
     * the column name for the ID_FAIXA field
     */
    const COL_ID_FAIXA = 'pessoa.ID_FAIXA';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('SqPessoa', 'Nome', 'Rg', 'Cpf', 'DtNascimento', 'TelResidencial', 'TelCelular', 'NomePai', 'NomeMae', 'Email', 'DtEntrada', 'SqEndereco', 'IdFaixa', ),
        self::TYPE_CAMELNAME     => array('sqPessoa', 'nome', 'rg', 'cpf', 'dtNascimento', 'telResidencial', 'telCelular', 'nomePai', 'nomeMae', 'email', 'dtEntrada', 'sqEndereco', 'idFaixa', ),
        self::TYPE_COLNAME       => array(PessoaTableMap::COL_SQ_PESSOA, PessoaTableMap::COL_NOME, PessoaTableMap::COL_RG, PessoaTableMap::COL_CPF, PessoaTableMap::COL_DT_NASCIMENTO, PessoaTableMap::COL_TEL_RESIDENCIAL, PessoaTableMap::COL_TEL_CELULAR, PessoaTableMap::COL_NOME_PAI, PessoaTableMap::COL_NOME_MAE, PessoaTableMap::COL_EMAIL, PessoaTableMap::COL_DT_ENTRADA, PessoaTableMap::COL_SQ_ENDERECO, PessoaTableMap::COL_ID_FAIXA, ),
        self::TYPE_FIELDNAME     => array('SQ_PESSOA', 'NOME', 'RG', 'CPF', 'DT_NASCIMENTO', 'TEL_RESIDENCIAL', 'TEL_CELULAR', 'NOME_PAI', 'NOME_MAE', 'EMAIL', 'DT_ENTRADA', 'SQ_ENDERECO', 'ID_FAIXA', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('SqPessoa' => 0, 'Nome' => 1, 'Rg' => 2, 'Cpf' => 3, 'DtNascimento' => 4, 'TelResidencial' => 5, 'TelCelular' => 6, 'NomePai' => 7, 'NomeMae' => 8, 'Email' => 9, 'DtEntrada' => 10, 'SqEndereco' => 11, 'IdFaixa' => 12, ),
        self::TYPE_CAMELNAME     => array('sqPessoa' => 0, 'nome' => 1, 'rg' => 2, 'cpf' => 3, 'dtNascimento' => 4, 'telResidencial' => 5, 'telCelular' => 6, 'nomePai' => 7, 'nomeMae' => 8, 'email' => 9, 'dtEntrada' => 10, 'sqEndereco' => 11, 'idFaixa' => 12, ),
        self::TYPE_COLNAME       => array(PessoaTableMap::COL_SQ_PESSOA => 0, PessoaTableMap::COL_NOME => 1, PessoaTableMap::COL_RG => 2, PessoaTableMap::COL_CPF => 3, PessoaTableMap::COL_DT_NASCIMENTO => 4, PessoaTableMap::COL_TEL_RESIDENCIAL => 5, PessoaTableMap::COL_TEL_CELULAR => 6, PessoaTableMap::COL_NOME_PAI => 7, PessoaTableMap::COL_NOME_MAE => 8, PessoaTableMap::COL_EMAIL => 9, PessoaTableMap::COL_DT_ENTRADA => 10, PessoaTableMap::COL_SQ_ENDERECO => 11, PessoaTableMap::COL_ID_FAIXA => 12, ),
        self::TYPE_FIELDNAME     => array('SQ_PESSOA' => 0, 'NOME' => 1, 'RG' => 2, 'CPF' => 3, 'DT_NASCIMENTO' => 4, 'TEL_RESIDENCIAL' => 5, 'TEL_CELULAR' => 6, 'NOME_PAI' => 7, 'NOME_MAE' => 8, 'EMAIL' => 9, 'DT_ENTRADA' => 10, 'SQ_ENDERECO' => 11, 'ID_FAIXA' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('pessoa');
        $this->setPhpName('Pessoa');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\model\\model\\Pessoa');
        $this->setPackage('model.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('SQ_PESSOA', 'SqPessoa', 'INTEGER', true, null, null);
        $this->addColumn('NOME', 'Nome', 'VARCHAR', true, 50, null);
        $this->addColumn('RG', 'Rg', 'VARCHAR', true, 9, null);
        $this->addColumn('CPF', 'Cpf', 'VARCHAR', true, 14, null);
        $this->addColumn('DT_NASCIMENTO', 'DtNascimento', 'TIMESTAMP', false, null, null);
        $this->addColumn('TEL_RESIDENCIAL', 'TelResidencial', 'VARCHAR', false, 14, null);
        $this->addColumn('TEL_CELULAR', 'TelCelular', 'VARCHAR', false, 14, null);
        $this->addColumn('NOME_PAI', 'NomePai', 'VARCHAR', false, 50, null);
        $this->addColumn('NOME_MAE', 'NomeMae', 'VARCHAR', false, 50, null);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 100, null);
        $this->addColumn('DT_ENTRADA', 'DtEntrada', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('SQ_ENDERECO', 'SqEndereco', 'INTEGER', 'endereco', 'SQ_ENDERECO', true, null, null);
        $this->addForeignKey('ID_FAIXA', 'IdFaixa', 'INTEGER', 'faixa', 'ID_FAIXA', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Endereco', '\\model\\model\\Endereco', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':SQ_ENDERECO',
    1 => ':SQ_ENDERECO',
  ),
), null, null, null, false);
        $this->addRelation('Faixa', '\\model\\model\\Faixa', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':ID_FAIXA',
    1 => ':ID_FAIXA',
  ),
), null, null, null, false);
        $this->addRelation('AlunoTurma', '\\model\\model\\AlunoTurma', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':SQ_PESSOA',
    1 => ':SQ_PESSOA',
  ),
), null, null, 'AlunoTurmas', false);
        $this->addRelation('Turma', '\\model\\model\\Turma', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':SQ_PESSOA',
    1 => ':SQ_PESSOA',
  ),
), null, null, 'Turmas', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqPessoa', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqPessoa', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqPessoa', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqPessoa', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqPessoa', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqPessoa', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('SqPessoa', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }
    
    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? PessoaTableMap::CLASS_DEFAULT : PessoaTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Pessoa object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PessoaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PessoaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PessoaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PessoaTableMap::OM_CLASS;
            /** @var Pessoa $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PessoaTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = PessoaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PessoaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Pessoa $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PessoaTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PessoaTableMap::COL_SQ_PESSOA);
            $criteria->addSelectColumn(PessoaTableMap::COL_NOME);
            $criteria->addSelectColumn(PessoaTableMap::COL_RG);
            $criteria->addSelectColumn(PessoaTableMap::COL_CPF);
            $criteria->addSelectColumn(PessoaTableMap::COL_DT_NASCIMENTO);
            $criteria->addSelectColumn(PessoaTableMap::COL_TEL_RESIDENCIAL);
            $criteria->addSelectColumn(PessoaTableMap::COL_TEL_CELULAR);
            $criteria->addSelectColumn(PessoaTableMap::COL_NOME_PAI);
            $criteria->addSelectColumn(PessoaTableMap::COL_NOME_MAE);
            $criteria->addSelectColumn(PessoaTableMap::COL_EMAIL);
            $criteria->addSelectColumn(PessoaTableMap::COL_DT_ENTRADA);
            $criteria->addSelectColumn(PessoaTableMap::COL_SQ_ENDERECO);
            $criteria->addSelectColumn(PessoaTableMap::COL_ID_FAIXA);
        } else {
            $criteria->addSelectColumn($alias . '.SQ_PESSOA');
            $criteria->addSelectColumn($alias . '.NOME');
            $criteria->addSelectColumn($alias . '.RG');
            $criteria->addSelectColumn($alias . '.CPF');
            $criteria->addSelectColumn($alias . '.DT_NASCIMENTO');
            $criteria->addSelectColumn($alias . '.TEL_RESIDENCIAL');
            $criteria->addSelectColumn($alias . '.TEL_CELULAR');
            $criteria->addSelectColumn($alias . '.NOME_PAI');
            $criteria->addSelectColumn($alias . '.NOME_MAE');
            $criteria->addSelectColumn($alias . '.EMAIL');
            $criteria->addSelectColumn($alias . '.DT_ENTRADA');
            $criteria->addSelectColumn($alias . '.SQ_ENDERECO');
            $criteria->addSelectColumn($alias . '.ID_FAIXA');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(PessoaTableMap::DATABASE_NAME)->getTable(PessoaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PessoaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PessoaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PessoaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Pessoa or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Pessoa object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PessoaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \model\model\Pessoa) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PessoaTableMap::DATABASE_NAME);
            $criteria->add(PessoaTableMap::COL_SQ_PESSOA, (array) $values, Criteria::IN);
        }

        $query = PessoaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PessoaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PessoaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the pessoa table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PessoaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Pessoa or Criteria object.
     *
     * @param mixed               $criteria Criteria or Pessoa object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PessoaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Pessoa object
        }


        // Set the correct dbName
        $query = PessoaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PessoaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PessoaTableMap::buildTableMap();
