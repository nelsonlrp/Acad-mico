<?php

/**
 * Student form.
 *
 * @package    academico
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StudentForm extends BaseStudentForm
{
  public function configure()
  {
      unset($this['user_id']);
      $this->validatorSchema['email'] = new sfValidatorAnd(array(
          $this->validatorSchema['email'],
          new sfValidatorEmail(),
        ));

      $this->widgetSchema['username'] = new sfWidgetFormInputText();
      $this->widgetSchema['username']->setAttribute('value', $this->getObject()->getSfGuardUser()->getUsername());
      $this->validatorSchema['username'] = new sfValidatorString(array('required' => true));
      $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
      $this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 128, 'required' => false));
      $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
      $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
      $this->widgetSchema->moveField('password_again', 'after', 'password');
      $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));
      $this->validatorSchema->setOption('allow_extra_fields', true);
  }

  public function  save($con = null) {
      $sf_guard_user = new sfGuardUser();
      $name = explode(" ", $this->taintedValues['name']);
      $this->getObject()->getSfGuardUser()->setFirstName($name[0]);
      $this->getObject()->getSfGuardUser()->setLastName($name[count($name)-1]);
      $this->getObject()->getSfGuardUser()->setUsername($this->taintedValues['username']);
      $this->getObject()->getSfGuardUser()->setPassword($this->taintedValues['password']);
      $this->getObject()->getSfGuardUser()->setEmailAddress($this->taintedValues['email']);
      $this->getObject()->getSfGuardUser()->setIsActive();
      parent::save($con);
      return $this->getObject();
  }
}
