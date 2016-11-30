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
use model\model\Endereco;
use model\model\EnderecoQuery;


/**
 * This class defines the structure of the 'endereco' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EnderecoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'model.model.Map.EnderecoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'endereco';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\model\\model\\Endereco';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'model.model.Endereco';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the SQ_ENDERECO field
     */
    const COL_SQ_ENDERECO = 'endereco.SQ_ENDERECO';

    /**
     * the column name for the BAIRRO field
     */
    const COL_BAIRRO = 'endereco.BAIRRO';

    /**
     * the column name for the RUA field
     */
    const COL_RUA = 'endereco.RUA';

    /**
     * the column name for the CEP field
     */
    const COL_CEP = 'endereco.CEP';

    /**
     * the column name for the COMPLEMENTO field
     */
    const COL_COMPLEMENTO = 'endereco.COMPLEMENTO';

    /**
     * the column name for the CIDADE field
     */
    const COL_CIDADE = 'endereco.CIDADE';

    /**
     * the column name for the NUMERO field
     */
    const COL_NUMERO = 'endereco.NUMERO';

    /**
     * the column name for the ID_UF field
     */
    const COL_ID_UF = 'endereco.ID_UF';

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
        self::TYPE_PHPNAME       => array('SqEndereco', 'Bairro', 'Rua', 'Cep', 'Complemento', 'Cidade', 'Numero', 'IdUf', ),
        self::TYPE_CAMELNAME     => array('sqEndereco', 'bairro', 'rua', 'cep', 'complemento', 'cidade', 'numero', 'idUf', ),
        self::TYPE_COLNAME       => array(EnderecoTableMap::COL_SQ_ENDERECO, EnderecoTableMap::COL_BAIRRO, EnderecoTableMap::COL_RUA, EnderecoTableMap::COL_CEP, EnderecoTableMap::COL_COMPLEMENTO, EnderecoTableMap::COL_CIDADE, EnderecoTableMap::COL_NUMERO, EnderecoTableMap::COL_ID_UF, ),
        self::TYPE_FIELDNAME     => array('SQ_ENDERECO', 'BAIRRO', 'RUA', 'CEP', 'COMPLEMENTO', 'CIDADE', 'NUMERO', 'ID_UF', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('SqEndereco' => 0, 'Bairro' => 1, 'Rua' => 2, 'Cep' => 3, 'Complemento' => 4, 'Cidade' => 5, 'Numero' => 6, 'IdUf' => 7, ),
        self::TYPE_CAMELNAME     => array('sqEndereco' => 0, 'bairro' => 1, 'rua' => 2, 'cep' => 3, 'complemento' => 4, 'cidade' => 5, 'numero' => 6, 'idUf' => 7, ),
        self::TYPE_COLNAME       => array(EnderecoTableMap::COL_SQ_ENDERECO => 0, EnderecoTableMap::COL_BAIRRO => 1, EnderecoTableMap::COL_RUA => 2, EnderecoTableMap::COL_CEP => 3, EnderecoTableMap::COL_COMPLEMENTO => 4, EnderecoTableMap::COL_CIDADE => 5, EnderecoTableMap::COL_NUMERO => 6, EnderecoTableMap::COL_ID_UF => 7, ),
        self::TYPE_FIELDNAME     => array('SQ_ENDERECO' => 0, 'BAIRRO' => 1, 'RUA' => 2, 'CEP' => 3, 'COMPLEMENTO' => 4, 'CIDADE' => 5, 'NUMERO' => 6, 'ID_UF' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('endereco');
        $this->setPhpName('Endereco');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\model\\model\\Endereco');
        $this->setPackage('model.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('SQ_ENDERECO', 'SqEndereco', 'INTEGER', true, null, null);
        $this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', false, 50, null);
        $this->addColumn('RUA', 'Rua', 'VARCHAR', false, 50, null);
        $this->addColumn('CEP', 'Cep', 'VARCHAR', false, 10, null);
        $this->addColumn('COMPLEMENTO', 'Complemento', 'VARCHAR', false, 50, null);
        $this->addColumn('CIDADE', 'Cidade', 'VARCHAR', false, 50, null);
        $this->addColumn('NUMERO', 'Numero', 'VARCHAR', false, 20, null);
        $this->addForeignKey('ID_UF', 'IdUf', 'INTEGER', 'uf', 'ID_UF', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Uf', '\\model\\model\\Uf', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':ID_UF',
    1 => ':ID_UF',
  ),
), null, null, null, false);
        $this->addRelation('Pessoa', '\\model\\model\\Pessoa', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':SQ_ENDERECO',
    1 => ':SQ_ENDERECO',
  ),
), null, null, 'Pessoas', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqEndereco', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqEndereco', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqEndereco', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqEndereco', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqEndereco', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SqEndereco', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('SqEndereco', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EnderecoTableMap::CLASS_DEFAULT : EnderecoTableMap::OM_CLASS;
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
     * @return array           (Endereco object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EnderecoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EnderecoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EnderecoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EnderecoTableMap::OM_CLASS;
            /** @var Endereco $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EnderecoTableMap::addInstanceToPool($obj, $key);
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
            $key = EnderecoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EnderecoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Endereco $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EnderecoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EnderecoTableMap::COL_SQ_ENDERECO);
            $criteria->addSelectColumn(EnderecoTableMap::COL_BAIRRO);
            $criteria->addSelectColumn(EnderecoTableMap::COL_RUA);
            $criteria->addSelectColumn(EnderecoTableMap::COL_CEP);
            $criteria->addSelectColumn(EnderecoTableMap::COL_COMPLEMENTO);
            $criteria->addSelectColumn(EnderecoTableMap::COL_CIDADE);
            $criteria->addSelectColumn(EnderecoTableMap::COL_NUMERO);
            $criteria->addSelectColumn(EnderecoTableMap::COL_ID_UF);
        } else {
            $criteria->addSelectColumn($alias . '.SQ_ENDERECO');
            $criteria->addSelectColumn($alias . '.BAIRRO');
            $criteria->addSelectColumn($alias . '.RUA');
            $criteria->addSelectColumn($alias . '.CEP');
            $criteria->addSelectColumn($alias . '.COMPLEMENTO');
            $criteria->addSelectColumn($alias . '.CIDADE');
            $criteria->addSelectColumn($alias . '.NUMERO');
            $criteria->addSelectColumn($alias . '.ID_UF');
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
        return Propel::getServiceContainer()->getDatabaseMap(EnderecoTableMap::DATABASE_NAME)->getTable(EnderecoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EnderecoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EnderecoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EnderecoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Endereco or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Endereco object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EnderecoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \model\model\Endereco) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EnderecoTableMap::DATABASE_NAME);
            $criteria->add(EnderecoTableMap::COL_SQ_ENDERECO, (array) $values, Criteria::IN);
        }

        $query = EnderecoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EnderecoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EnderecoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the endereco table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EnderecoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Endereco or Criteria object.
     *
     * @param mixed               $criteria Criteria or Endereco object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EnderecoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Endereco object
        }

        if ($criteria->containsKey(EnderecoTableMap::COL_SQ_ENDERECO) && $criteria->keyContainsValue(EnderecoTableMap::COL_SQ_ENDERECO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EnderecoTableMap::COL_SQ_ENDERECO.')');
        }


        // Set the correct dbName
        $query = EnderecoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EnderecoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EnderecoTableMap::buildTableMap();
