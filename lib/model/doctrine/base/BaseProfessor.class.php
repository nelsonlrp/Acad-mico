<?php

/**
 * BaseProfessor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $email
 * @property integer $user_id
 * @property sfGuardUser $sfGuardUser
 * 
 * @method string      getName()        Returns the current record's "name" value
 * @method string      getEmail()       Returns the current record's "email" value
 * @method integer     getUserId()      Returns the current record's "user_id" value
 * @method sfGuardUser getSfGuardUser() Returns the current record's "sfGuardUser" value
 * @method Professor   setName()        Sets the current record's "name" value
 * @method Professor   setEmail()       Sets the current record's "email" value
 * @method Professor   setUserId()      Sets the current record's "user_id" value
 * @method Professor   setSfGuardUser() Sets the current record's "sfGuardUser" value
 * 
 * @package    academico
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfessor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('professor');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));
    }
}