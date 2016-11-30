<?php

namespace model\model\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;
use model\model\AlunoTurma as ChildAlunoTurma;
use model\model\AlunoTurmaQuery as ChildAlunoTurmaQuery;
use model\model\Endereco as ChildEndereco;
use model\model\EnderecoQuery as ChildEnderecoQuery;
use model\model\Faixa as ChildFaixa;
use model\model\FaixaQuery as ChildFaixaQuery;
use model\model\Pessoa as ChildPessoa;
use model\model\PessoaQuery as ChildPessoaQuery;
use model\model\Turma as ChildTurma;
use model\model\TurmaQuery as ChildTurmaQuery;
use model\model\Map\AlunoTurmaTableMap;
use model\model\Map\PessoaTableMap;
use model\model\Map\TurmaTableMap;

/**
 * Base class that represents a row from the 'pessoa' table.
 *
 * 
 *
 * @package    propel.generator.model.model.Base
 */
abstract class Pessoa implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\model\\model\\Map\\PessoaTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the sq_pessoa field.
     * 
     * @var        int
     */
    protected $sq_pessoa;

    /**
     * The value for the nome field.
     * 
     * @var        string
     */
    protected $nome;

    /**
     * The value for the rg field.
     * 
     * @var        string
     */
    protected $rg;

    /**
     * The value for the cpf field.
     * 
     * @var        string
     */
    protected $cpf;

    /**
     * The value for the dt_nascimento field.
     * 
     * @var        DateTime
     */
    protected $dt_nascimento;

    /**
     * The value for the tel_residencial field.
     * 
     * @var        string
     */
    protected $tel_residencial;

    /**
     * The value for the tel_celular field.
     * 
     * @var        string
     */
    protected $tel_celular;

    /**
     * The value for the nome_pai field.
     * 
     * @var        string
     */
    protected $nome_pai;

    /**
     * The value for the nome_mae field.
     * 
     * @var        string
     */
    protected $nome_mae;

    /**
     * The value for the email field.
     * 
     * @var        string
     */
    protected $email;

    /**
     * The value for the dt_entrada field.
     * 
     * @var        DateTime
     */
    protected $dt_entrada;

    /**
     * The value for the sq_endereco field.
     * 
     * @var        int
     */
    protected $sq_endereco;

    /**
     * The value for the id_faixa field.
     * 
     * @var        int
     */
    protected $id_faixa;

    /**
     * @var        ChildEndereco
     */
    protected $aEndereco;

    /**
     * @var        ChildFaixa
     */
    protected $aFaixa;

    /**
     * @var        ObjectCollection|ChildAlunoTurma[] Collection to store aggregation of ChildAlunoTurma objects.
     */
    protected $collAlunoTurmas;
    protected $collAlunoTurmasPartial;

    /**
     * @var        ObjectCollection|ChildTurma[] Collection to store aggregation of ChildTurma objects.
     */
    protected $collTurmas;
    protected $collTurmasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAlunoTurma[]
     */
    protected $alunoTurmasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTurma[]
     */
    protected $turmasScheduledForDeletion = null;

    /**
     * Initializes internal state of model\model\Base\Pessoa object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Pessoa</code> instance.  If
     * <code>obj</code> is an instance of <code>Pessoa</code>, delegates to
     * <code>equals(Pessoa)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Pessoa The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));
        
        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }
        
        return $propertyNames;
    }

    /**
     * Get the [sq_pessoa] column value.
     * 
     * @return int
     */
    public function getSqPessoa()
    {
        return $this->sq_pessoa;
    }

    /**
     * Get the [nome] column value.
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get the [rg] column value.
     * 
     * @return string
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Get the [cpf] column value.
     * 
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Get the [optionally formatted] temporal [dt_nascimento] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDtNascimento($format = NULL)
    {
        if ($format === null) {
            return $this->dt_nascimento;
        } else {
            return $this->dt_nascimento instanceof \DateTimeInterface ? $this->dt_nascimento->format($format) : null;
        }
    }

    /**
     * Get the [tel_residencial] column value.
     * 
     * @return string
     */
    public function getTelResidencial()
    {
        return $this->tel_residencial;
    }

    /**
     * Get the [tel_celular] column value.
     * 
     * @return string
     */
    public function getTelCelular()
    {
        return $this->tel_celular;
    }

    /**
     * Get the [nome_pai] column value.
     * 
     * @return string
     */
    public function getNomePai()
    {
        return $this->nome_pai;
    }

    /**
     * Get the [nome_mae] column value.
     * 
     * @return string
     */
    public function getNomeMae()
    {
        return $this->nome_mae;
    }

    /**
     * Get the [email] column value.
     * 
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [optionally formatted] temporal [dt_entrada] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDtEntrada($format = NULL)
    {
        if ($format === null) {
            return $this->dt_entrada;
        } else {
            return $this->dt_entrada instanceof \DateTimeInterface ? $this->dt_entrada->format($format) : null;
        }
    }

    /**
     * Get the [sq_endereco] column value.
     * 
     * @return int
     */
    public function getSqEndereco()
    {
        return $this->sq_endereco;
    }

    /**
     * Get the [id_faixa] column value.
     * 
     * @return int
     */
    public function getIdFaixa()
    {
        return $this->id_faixa;
    }

    /**
     * Set the value of [sq_pessoa] column.
     * 
     * @param int $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setSqPessoa($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sq_pessoa !== $v) {
            $this->sq_pessoa = $v;
            $this->modifiedColumns[PessoaTableMap::COL_SQ_PESSOA] = true;
        }

        return $this;
    } // setSqPessoa()

    /**
     * Set the value of [nome] column.
     * 
     * @param string $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setNome($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nome !== $v) {
            $this->nome = $v;
            $this->modifiedColumns[PessoaTableMap::COL_NOME] = true;
        }

        return $this;
    } // setNome()

    /**
     * Set the value of [rg] column.
     * 
     * @param string $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setRg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rg !== $v) {
            $this->rg = $v;
            $this->modifiedColumns[PessoaTableMap::COL_RG] = true;
        }

        return $this;
    } // setRg()

    /**
     * Set the value of [cpf] column.
     * 
     * @param string $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setCpf($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cpf !== $v) {
            $this->cpf = $v;
            $this->modifiedColumns[PessoaTableMap::COL_CPF] = true;
        }

        return $this;
    } // setCpf()

    /**
     * Sets the value of [dt_nascimento] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setDtNascimento($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dt_nascimento !== null || $dt !== null) {
            if ($this->dt_nascimento === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->dt_nascimento->format("Y-m-d H:i:s.u")) {
                $this->dt_nascimento = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PessoaTableMap::COL_DT_NASCIMENTO] = true;
            }
        } // if either are not null

        return $this;
    } // setDtNascimento()

    /**
     * Set the value of [tel_residencial] column.
     * 
     * @param string $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setTelResidencial($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tel_residencial !== $v) {
            $this->tel_residencial = $v;
            $this->modifiedColumns[PessoaTableMap::COL_TEL_RESIDENCIAL] = true;
        }

        return $this;
    } // setTelResidencial()

    /**
     * Set the value of [tel_celular] column.
     * 
     * @param string $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setTelCelular($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tel_celular !== $v) {
            $this->tel_celular = $v;
            $this->modifiedColumns[PessoaTableMap::COL_TEL_CELULAR] = true;
        }

        return $this;
    } // setTelCelular()

    /**
     * Set the value of [nome_pai] column.
     * 
     * @param string $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setNomePai($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nome_pai !== $v) {
            $this->nome_pai = $v;
            $this->modifiedColumns[PessoaTableMap::COL_NOME_PAI] = true;
        }

        return $this;
    } // setNomePai()

    /**
     * Set the value of [nome_mae] column.
     * 
     * @param string $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setNomeMae($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nome_mae !== $v) {
            $this->nome_mae = $v;
            $this->modifiedColumns[PessoaTableMap::COL_NOME_MAE] = true;
        }

        return $this;
    } // setNomeMae()

    /**
     * Set the value of [email] column.
     * 
     * @param string $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[PessoaTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Sets the value of [dt_entrada] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setDtEntrada($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dt_entrada !== null || $dt !== null) {
            if ($this->dt_entrada === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->dt_entrada->format("Y-m-d H:i:s.u")) {
                $this->dt_entrada = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PessoaTableMap::COL_DT_ENTRADA] = true;
            }
        } // if either are not null

        return $this;
    } // setDtEntrada()

    /**
     * Set the value of [sq_endereco] column.
     * 
     * @param int $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setSqEndereco($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sq_endereco !== $v) {
            $this->sq_endereco = $v;
            $this->modifiedColumns[PessoaTableMap::COL_SQ_ENDERECO] = true;
        }

        if ($this->aEndereco !== null && $this->aEndereco->getSqEndereco() !== $v) {
            $this->aEndereco = null;
        }

        return $this;
    } // setSqEndereco()

    /**
     * Set the value of [id_faixa] column.
     * 
     * @param int $v new value
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function setIdFaixa($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_faixa !== $v) {
            $this->id_faixa = $v;
            $this->modifiedColumns[PessoaTableMap::COL_ID_FAIXA] = true;
        }

        if ($this->aFaixa !== null && $this->aFaixa->getIdFaixa() !== $v) {
            $this->aFaixa = null;
        }

        return $this;
    } // setIdFaixa()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PessoaTableMap::translateFieldName('SqPessoa', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sq_pessoa = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PessoaTableMap::translateFieldName('Nome', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nome = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PessoaTableMap::translateFieldName('Rg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PessoaTableMap::translateFieldName('Cpf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cpf = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PessoaTableMap::translateFieldName('DtNascimento', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->dt_nascimento = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PessoaTableMap::translateFieldName('TelResidencial', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tel_residencial = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PessoaTableMap::translateFieldName('TelCelular', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tel_celular = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PessoaTableMap::translateFieldName('NomePai', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nome_pai = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PessoaTableMap::translateFieldName('NomeMae', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nome_mae = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PessoaTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : PessoaTableMap::translateFieldName('DtEntrada', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->dt_entrada = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : PessoaTableMap::translateFieldName('SqEndereco', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sq_endereco = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : PessoaTableMap::translateFieldName('IdFaixa', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_faixa = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 13; // 13 = PessoaTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\model\\model\\Pessoa'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aEndereco !== null && $this->sq_endereco !== $this->aEndereco->getSqEndereco()) {
            $this->aEndereco = null;
        }
        if ($this->aFaixa !== null && $this->id_faixa !== $this->aFaixa->getIdFaixa()) {
            $this->aFaixa = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PessoaTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPessoaQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEndereco = null;
            $this->aFaixa = null;
            $this->collAlunoTurmas = null;

            $this->collTurmas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Pessoa::setDeleted()
     * @see Pessoa::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PessoaTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPessoaQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PessoaTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                PessoaTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aEndereco !== null) {
                if ($this->aEndereco->isModified() || $this->aEndereco->isNew()) {
                    $affectedRows += $this->aEndereco->save($con);
                }
                $this->setEndereco($this->aEndereco);
            }

            if ($this->aFaixa !== null) {
                if ($this->aFaixa->isModified() || $this->aFaixa->isNew()) {
                    $affectedRows += $this->aFaixa->save($con);
                }
                $this->setFaixa($this->aFaixa);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->alunoTurmasScheduledForDeletion !== null) {
                if (!$this->alunoTurmasScheduledForDeletion->isEmpty()) {
                    \model\model\AlunoTurmaQuery::create()
                        ->filterByPrimaryKeys($this->alunoTurmasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->alunoTurmasScheduledForDeletion = null;
                }
            }

            if ($this->collAlunoTurmas !== null) {
                foreach ($this->collAlunoTurmas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->turmasScheduledForDeletion !== null) {
                if (!$this->turmasScheduledForDeletion->isEmpty()) {
                    \model\model\TurmaQuery::create()
                        ->filterByPrimaryKeys($this->turmasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->turmasScheduledForDeletion = null;
                }
            }

            if ($this->collTurmas !== null) {
                foreach ($this->collTurmas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PessoaTableMap::COL_SQ_PESSOA)) {
            $modifiedColumns[':p' . $index++]  = 'SQ_PESSOA';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_NOME)) {
            $modifiedColumns[':p' . $index++]  = 'NOME';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_RG)) {
            $modifiedColumns[':p' . $index++]  = 'RG';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_CPF)) {
            $modifiedColumns[':p' . $index++]  = 'CPF';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_DT_NASCIMENTO)) {
            $modifiedColumns[':p' . $index++]  = 'DT_NASCIMENTO';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_TEL_RESIDENCIAL)) {
            $modifiedColumns[':p' . $index++]  = 'TEL_RESIDENCIAL';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_TEL_CELULAR)) {
            $modifiedColumns[':p' . $index++]  = 'TEL_CELULAR';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_NOME_PAI)) {
            $modifiedColumns[':p' . $index++]  = 'NOME_PAI';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_NOME_MAE)) {
            $modifiedColumns[':p' . $index++]  = 'NOME_MAE';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'EMAIL';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_DT_ENTRADA)) {
            $modifiedColumns[':p' . $index++]  = 'DT_ENTRADA';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_SQ_ENDERECO)) {
            $modifiedColumns[':p' . $index++]  = 'SQ_ENDERECO';
        }
        if ($this->isColumnModified(PessoaTableMap::COL_ID_FAIXA)) {
            $modifiedColumns[':p' . $index++]  = 'ID_FAIXA';
        }

        $sql = sprintf(
            'INSERT INTO pessoa (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'SQ_PESSOA':                        
                        $stmt->bindValue($identifier, $this->sq_pessoa, PDO::PARAM_INT);
                        break;
                    case 'NOME':                        
                        $stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
                        break;
                    case 'RG':                        
                        $stmt->bindValue($identifier, $this->rg, PDO::PARAM_STR);
                        break;
                    case 'CPF':                        
                        $stmt->bindValue($identifier, $this->cpf, PDO::PARAM_STR);
                        break;
                    case 'DT_NASCIMENTO':                        
                        $stmt->bindValue($identifier, $this->dt_nascimento ? $this->dt_nascimento->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'TEL_RESIDENCIAL':                        
                        $stmt->bindValue($identifier, $this->tel_residencial, PDO::PARAM_STR);
                        break;
                    case 'TEL_CELULAR':                        
                        $stmt->bindValue($identifier, $this->tel_celular, PDO::PARAM_STR);
                        break;
                    case 'NOME_PAI':                        
                        $stmt->bindValue($identifier, $this->nome_pai, PDO::PARAM_STR);
                        break;
                    case 'NOME_MAE':                        
                        $stmt->bindValue($identifier, $this->nome_mae, PDO::PARAM_STR);
                        break;
                    case 'EMAIL':                        
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'DT_ENTRADA':                        
                        $stmt->bindValue($identifier, $this->dt_entrada ? $this->dt_entrada->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'SQ_ENDERECO':                        
                        $stmt->bindValue($identifier, $this->sq_endereco, PDO::PARAM_INT);
                        break;
                    case 'ID_FAIXA':                        
                        $stmt->bindValue($identifier, $this->id_faixa, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PessoaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getSqPessoa();
                break;
            case 1:
                return $this->getNome();
                break;
            case 2:
                return $this->getRg();
                break;
            case 3:
                return $this->getCpf();
                break;
            case 4:
                return $this->getDtNascimento();
                break;
            case 5:
                return $this->getTelResidencial();
                break;
            case 6:
                return $this->getTelCelular();
                break;
            case 7:
                return $this->getNomePai();
                break;
            case 8:
                return $this->getNomeMae();
                break;
            case 9:
                return $this->getEmail();
                break;
            case 10:
                return $this->getDtEntrada();
                break;
            case 11:
                return $this->getSqEndereco();
                break;
            case 12:
                return $this->getIdFaixa();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Pessoa'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Pessoa'][$this->hashCode()] = true;
        $keys = PessoaTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSqPessoa(),
            $keys[1] => $this->getNome(),
            $keys[2] => $this->getRg(),
            $keys[3] => $this->getCpf(),
            $keys[4] => $this->getDtNascimento(),
            $keys[5] => $this->getTelResidencial(),
            $keys[6] => $this->getTelCelular(),
            $keys[7] => $this->getNomePai(),
            $keys[8] => $this->getNomeMae(),
            $keys[9] => $this->getEmail(),
            $keys[10] => $this->getDtEntrada(),
            $keys[11] => $this->getSqEndereco(),
            $keys[12] => $this->getIdFaixa(),
        );
        if ($result[$keys[4]] instanceof \DateTime) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }
        
        if ($result[$keys[10]] instanceof \DateTime) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }
        
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aEndereco) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'endereco';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'endereco';
                        break;
                    default:
                        $key = 'Endereco';
                }
        
                $result[$key] = $this->aEndereco->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aFaixa) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'faixa';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'faixa';
                        break;
                    default:
                        $key = 'Faixa';
                }
        
                $result[$key] = $this->aFaixa->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAlunoTurmas) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'alunoTurmas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'aluno_turmas';
                        break;
                    default:
                        $key = 'AlunoTurmas';
                }
        
                $result[$key] = $this->collAlunoTurmas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTurmas) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'turmas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'turmas';
                        break;
                    default:
                        $key = 'Turmas';
                }
        
                $result[$key] = $this->collTurmas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\model\model\Pessoa
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PessoaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\model\model\Pessoa
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSqPessoa($value);
                break;
            case 1:
                $this->setNome($value);
                break;
            case 2:
                $this->setRg($value);
                break;
            case 3:
                $this->setCpf($value);
                break;
            case 4:
                $this->setDtNascimento($value);
                break;
            case 5:
                $this->setTelResidencial($value);
                break;
            case 6:
                $this->setTelCelular($value);
                break;
            case 7:
                $this->setNomePai($value);
                break;
            case 8:
                $this->setNomeMae($value);
                break;
            case 9:
                $this->setEmail($value);
                break;
            case 10:
                $this->setDtEntrada($value);
                break;
            case 11:
                $this->setSqEndereco($value);
                break;
            case 12:
                $this->setIdFaixa($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = PessoaTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSqPessoa($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNome($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setRg($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCpf($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDtNascimento($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTelResidencial($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setTelCelular($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setNomePai($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setNomeMae($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setEmail($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDtEntrada($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSqEndereco($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setIdFaixa($arr[$keys[12]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\model\model\Pessoa The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PessoaTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PessoaTableMap::COL_SQ_PESSOA)) {
            $criteria->add(PessoaTableMap::COL_SQ_PESSOA, $this->sq_pessoa);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_NOME)) {
            $criteria->add(PessoaTableMap::COL_NOME, $this->nome);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_RG)) {
            $criteria->add(PessoaTableMap::COL_RG, $this->rg);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_CPF)) {
            $criteria->add(PessoaTableMap::COL_CPF, $this->cpf);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_DT_NASCIMENTO)) {
            $criteria->add(PessoaTableMap::COL_DT_NASCIMENTO, $this->dt_nascimento);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_TEL_RESIDENCIAL)) {
            $criteria->add(PessoaTableMap::COL_TEL_RESIDENCIAL, $this->tel_residencial);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_TEL_CELULAR)) {
            $criteria->add(PessoaTableMap::COL_TEL_CELULAR, $this->tel_celular);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_NOME_PAI)) {
            $criteria->add(PessoaTableMap::COL_NOME_PAI, $this->nome_pai);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_NOME_MAE)) {
            $criteria->add(PessoaTableMap::COL_NOME_MAE, $this->nome_mae);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_EMAIL)) {
            $criteria->add(PessoaTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_DT_ENTRADA)) {
            $criteria->add(PessoaTableMap::COL_DT_ENTRADA, $this->dt_entrada);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_SQ_ENDERECO)) {
            $criteria->add(PessoaTableMap::COL_SQ_ENDERECO, $this->sq_endereco);
        }
        if ($this->isColumnModified(PessoaTableMap::COL_ID_FAIXA)) {
            $criteria->add(PessoaTableMap::COL_ID_FAIXA, $this->id_faixa);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildPessoaQuery::create();
        $criteria->add(PessoaTableMap::COL_SQ_PESSOA, $this->sq_pessoa);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getSqPessoa();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }
        
    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getSqPessoa();
    }

    /**
     * Generic method to set the primary key (sq_pessoa column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setSqPessoa($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getSqPessoa();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \model\model\Pessoa (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSqPessoa($this->getSqPessoa());
        $copyObj->setNome($this->getNome());
        $copyObj->setRg($this->getRg());
        $copyObj->setCpf($this->getCpf());
        $copyObj->setDtNascimento($this->getDtNascimento());
        $copyObj->setTelResidencial($this->getTelResidencial());
        $copyObj->setTelCelular($this->getTelCelular());
        $copyObj->setNomePai($this->getNomePai());
        $copyObj->setNomeMae($this->getNomeMae());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setDtEntrada($this->getDtEntrada());
        $copyObj->setSqEndereco($this->getSqEndereco());
        $copyObj->setIdFaixa($this->getIdFaixa());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getAlunoTurmas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlunoTurma($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTurmas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTurma($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \model\model\Pessoa Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildEndereco object.
     *
     * @param  ChildEndereco $v
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEndereco(ChildEndereco $v = null)
    {
        if ($v === null) {
            $this->setSqEndereco(NULL);
        } else {
            $this->setSqEndereco($v->getSqEndereco());
        }

        $this->aEndereco = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEndereco object, it will not be re-added.
        if ($v !== null) {
            $v->addPessoa($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEndereco object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEndereco The associated ChildEndereco object.
     * @throws PropelException
     */
    public function getEndereco(ConnectionInterface $con = null)
    {
        if ($this->aEndereco === null && ($this->sq_endereco !== null)) {
            $this->aEndereco = ChildEnderecoQuery::create()->findPk($this->sq_endereco, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEndereco->addPessoas($this);
             */
        }

        return $this->aEndereco;
    }

    /**
     * Declares an association between this object and a ChildFaixa object.
     *
     * @param  ChildFaixa $v
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFaixa(ChildFaixa $v = null)
    {
        if ($v === null) {
            $this->setIdFaixa(NULL);
        } else {
            $this->setIdFaixa($v->getIdFaixa());
        }

        $this->aFaixa = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildFaixa object, it will not be re-added.
        if ($v !== null) {
            $v->addPessoa($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildFaixa object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildFaixa The associated ChildFaixa object.
     * @throws PropelException
     */
    public function getFaixa(ConnectionInterface $con = null)
    {
        if ($this->aFaixa === null && ($this->id_faixa !== null)) {
            $this->aFaixa = ChildFaixaQuery::create()->findPk($this->id_faixa, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFaixa->addPessoas($this);
             */
        }

        return $this->aFaixa;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('AlunoTurma' == $relationName) {
            return $this->initAlunoTurmas();
        }
        if ('Turma' == $relationName) {
            return $this->initTurmas();
        }
    }

    /**
     * Clears out the collAlunoTurmas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAlunoTurmas()
     */
    public function clearAlunoTurmas()
    {
        $this->collAlunoTurmas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAlunoTurmas collection loaded partially.
     */
    public function resetPartialAlunoTurmas($v = true)
    {
        $this->collAlunoTurmasPartial = $v;
    }

    /**
     * Initializes the collAlunoTurmas collection.
     *
     * By default this just sets the collAlunoTurmas collection to an empty array (like clearcollAlunoTurmas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlunoTurmas($overrideExisting = true)
    {
        if (null !== $this->collAlunoTurmas && !$overrideExisting) {
            return;
        }

        $collectionClassName = AlunoTurmaTableMap::getTableMap()->getCollectionClassName();

        $this->collAlunoTurmas = new $collectionClassName;
        $this->collAlunoTurmas->setModel('\model\model\AlunoTurma');
    }

    /**
     * Gets an array of ChildAlunoTurma objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPessoa is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAlunoTurma[] List of ChildAlunoTurma objects
     * @throws PropelException
     */
    public function getAlunoTurmas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAlunoTurmasPartial && !$this->isNew();
        if (null === $this->collAlunoTurmas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAlunoTurmas) {
                // return empty collection
                $this->initAlunoTurmas();
            } else {
                $collAlunoTurmas = ChildAlunoTurmaQuery::create(null, $criteria)
                    ->filterByPessoa($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAlunoTurmasPartial && count($collAlunoTurmas)) {
                        $this->initAlunoTurmas(false);

                        foreach ($collAlunoTurmas as $obj) {
                            if (false == $this->collAlunoTurmas->contains($obj)) {
                                $this->collAlunoTurmas->append($obj);
                            }
                        }

                        $this->collAlunoTurmasPartial = true;
                    }

                    return $collAlunoTurmas;
                }

                if ($partial && $this->collAlunoTurmas) {
                    foreach ($this->collAlunoTurmas as $obj) {
                        if ($obj->isNew()) {
                            $collAlunoTurmas[] = $obj;
                        }
                    }
                }

                $this->collAlunoTurmas = $collAlunoTurmas;
                $this->collAlunoTurmasPartial = false;
            }
        }

        return $this->collAlunoTurmas;
    }

    /**
     * Sets a collection of ChildAlunoTurma objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $alunoTurmas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPessoa The current object (for fluent API support)
     */
    public function setAlunoTurmas(Collection $alunoTurmas, ConnectionInterface $con = null)
    {
        /** @var ChildAlunoTurma[] $alunoTurmasToDelete */
        $alunoTurmasToDelete = $this->getAlunoTurmas(new Criteria(), $con)->diff($alunoTurmas);

        
        $this->alunoTurmasScheduledForDeletion = $alunoTurmasToDelete;

        foreach ($alunoTurmasToDelete as $alunoTurmaRemoved) {
            $alunoTurmaRemoved->setPessoa(null);
        }

        $this->collAlunoTurmas = null;
        foreach ($alunoTurmas as $alunoTurma) {
            $this->addAlunoTurma($alunoTurma);
        }

        $this->collAlunoTurmas = $alunoTurmas;
        $this->collAlunoTurmasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AlunoTurma objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related AlunoTurma objects.
     * @throws PropelException
     */
    public function countAlunoTurmas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAlunoTurmasPartial && !$this->isNew();
        if (null === $this->collAlunoTurmas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAlunoTurmas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAlunoTurmas());
            }

            $query = ChildAlunoTurmaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPessoa($this)
                ->count($con);
        }

        return count($this->collAlunoTurmas);
    }

    /**
     * Method called to associate a ChildAlunoTurma object to this object
     * through the ChildAlunoTurma foreign key attribute.
     *
     * @param  ChildAlunoTurma $l ChildAlunoTurma
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function addAlunoTurma(ChildAlunoTurma $l)
    {
        if ($this->collAlunoTurmas === null) {
            $this->initAlunoTurmas();
            $this->collAlunoTurmasPartial = true;
        }

        if (!$this->collAlunoTurmas->contains($l)) {
            $this->doAddAlunoTurma($l);

            if ($this->alunoTurmasScheduledForDeletion and $this->alunoTurmasScheduledForDeletion->contains($l)) {
                $this->alunoTurmasScheduledForDeletion->remove($this->alunoTurmasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAlunoTurma $alunoTurma The ChildAlunoTurma object to add.
     */
    protected function doAddAlunoTurma(ChildAlunoTurma $alunoTurma)
    {
        $this->collAlunoTurmas[]= $alunoTurma;
        $alunoTurma->setPessoa($this);
    }

    /**
     * @param  ChildAlunoTurma $alunoTurma The ChildAlunoTurma object to remove.
     * @return $this|ChildPessoa The current object (for fluent API support)
     */
    public function removeAlunoTurma(ChildAlunoTurma $alunoTurma)
    {
        if ($this->getAlunoTurmas()->contains($alunoTurma)) {
            $pos = $this->collAlunoTurmas->search($alunoTurma);
            $this->collAlunoTurmas->remove($pos);
            if (null === $this->alunoTurmasScheduledForDeletion) {
                $this->alunoTurmasScheduledForDeletion = clone $this->collAlunoTurmas;
                $this->alunoTurmasScheduledForDeletion->clear();
            }
            $this->alunoTurmasScheduledForDeletion[]= clone $alunoTurma;
            $alunoTurma->setPessoa(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pessoa is new, it will return
     * an empty collection; or if this Pessoa has previously
     * been saved, it will retrieve related AlunoTurmas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pessoa.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAlunoTurma[] List of ChildAlunoTurma objects
     */
    public function getAlunoTurmasJoinTurma(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAlunoTurmaQuery::create(null, $criteria);
        $query->joinWith('Turma', $joinBehavior);

        return $this->getAlunoTurmas($query, $con);
    }

    /**
     * Clears out the collTurmas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTurmas()
     */
    public function clearTurmas()
    {
        $this->collTurmas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTurmas collection loaded partially.
     */
    public function resetPartialTurmas($v = true)
    {
        $this->collTurmasPartial = $v;
    }

    /**
     * Initializes the collTurmas collection.
     *
     * By default this just sets the collTurmas collection to an empty array (like clearcollTurmas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTurmas($overrideExisting = true)
    {
        if (null !== $this->collTurmas && !$overrideExisting) {
            return;
        }

        $collectionClassName = TurmaTableMap::getTableMap()->getCollectionClassName();

        $this->collTurmas = new $collectionClassName;
        $this->collTurmas->setModel('\model\model\Turma');
    }

    /**
     * Gets an array of ChildTurma objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPessoa is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTurma[] List of ChildTurma objects
     * @throws PropelException
     */
    public function getTurmas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTurmasPartial && !$this->isNew();
        if (null === $this->collTurmas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTurmas) {
                // return empty collection
                $this->initTurmas();
            } else {
                $collTurmas = ChildTurmaQuery::create(null, $criteria)
                    ->filterByPessoa($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTurmasPartial && count($collTurmas)) {
                        $this->initTurmas(false);

                        foreach ($collTurmas as $obj) {
                            if (false == $this->collTurmas->contains($obj)) {
                                $this->collTurmas->append($obj);
                            }
                        }

                        $this->collTurmasPartial = true;
                    }

                    return $collTurmas;
                }

                if ($partial && $this->collTurmas) {
                    foreach ($this->collTurmas as $obj) {
                        if ($obj->isNew()) {
                            $collTurmas[] = $obj;
                        }
                    }
                }

                $this->collTurmas = $collTurmas;
                $this->collTurmasPartial = false;
            }
        }

        return $this->collTurmas;
    }

    /**
     * Sets a collection of ChildTurma objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $turmas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPessoa The current object (for fluent API support)
     */
    public function setTurmas(Collection $turmas, ConnectionInterface $con = null)
    {
        /** @var ChildTurma[] $turmasToDelete */
        $turmasToDelete = $this->getTurmas(new Criteria(), $con)->diff($turmas);

        
        $this->turmasScheduledForDeletion = $turmasToDelete;

        foreach ($turmasToDelete as $turmaRemoved) {
            $turmaRemoved->setPessoa(null);
        }

        $this->collTurmas = null;
        foreach ($turmas as $turma) {
            $this->addTurma($turma);
        }

        $this->collTurmas = $turmas;
        $this->collTurmasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Turma objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Turma objects.
     * @throws PropelException
     */
    public function countTurmas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTurmasPartial && !$this->isNew();
        if (null === $this->collTurmas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTurmas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTurmas());
            }

            $query = ChildTurmaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPessoa($this)
                ->count($con);
        }

        return count($this->collTurmas);
    }

    /**
     * Method called to associate a ChildTurma object to this object
     * through the ChildTurma foreign key attribute.
     *
     * @param  ChildTurma $l ChildTurma
     * @return $this|\model\model\Pessoa The current object (for fluent API support)
     */
    public function addTurma(ChildTurma $l)
    {
        if ($this->collTurmas === null) {
            $this->initTurmas();
            $this->collTurmasPartial = true;
        }

        if (!$this->collTurmas->contains($l)) {
            $this->doAddTurma($l);

            if ($this->turmasScheduledForDeletion and $this->turmasScheduledForDeletion->contains($l)) {
                $this->turmasScheduledForDeletion->remove($this->turmasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTurma $turma The ChildTurma object to add.
     */
    protected function doAddTurma(ChildTurma $turma)
    {
        $this->collTurmas[]= $turma;
        $turma->setPessoa($this);
    }

    /**
     * @param  ChildTurma $turma The ChildTurma object to remove.
     * @return $this|ChildPessoa The current object (for fluent API support)
     */
    public function removeTurma(ChildTurma $turma)
    {
        if ($this->getTurmas()->contains($turma)) {
            $pos = $this->collTurmas->search($turma);
            $this->collTurmas->remove($pos);
            if (null === $this->turmasScheduledForDeletion) {
                $this->turmasScheduledForDeletion = clone $this->collTurmas;
                $this->turmasScheduledForDeletion->clear();
            }
            $this->turmasScheduledForDeletion[]= clone $turma;
            $turma->setPessoa(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pessoa is new, it will return
     * an empty collection; or if this Pessoa has previously
     * been saved, it will retrieve related Turmas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pessoa.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTurma[] List of ChildTurma objects
     */
    public function getTurmasJoinModalidade(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTurmaQuery::create(null, $criteria);
        $query->joinWith('Modalidade', $joinBehavior);

        return $this->getTurmas($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aEndereco) {
            $this->aEndereco->removePessoa($this);
        }
        if (null !== $this->aFaixa) {
            $this->aFaixa->removePessoa($this);
        }
        $this->sq_pessoa = null;
        $this->nome = null;
        $this->rg = null;
        $this->cpf = null;
        $this->dt_nascimento = null;
        $this->tel_residencial = null;
        $this->tel_celular = null;
        $this->nome_pai = null;
        $this->nome_mae = null;
        $this->email = null;
        $this->dt_entrada = null;
        $this->sq_endereco = null;
        $this->id_faixa = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collAlunoTurmas) {
                foreach ($this->collAlunoTurmas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTurmas) {
                foreach ($this->collTurmas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collAlunoTurmas = null;
        $this->collTurmas = null;
        $this->aEndereco = null;
        $this->aFaixa = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PessoaTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
