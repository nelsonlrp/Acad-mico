<?php

/**
 * Professor form base class.
 *
 * @method Professor getObject() Returns the current form's model object
 *
 * @package    academico
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfessorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'name'    => new sfWidgetFormInputText(),
      'email'   => new sfWidgetFormInputText(),
      'user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'    => new sfValidatorString(array('max_length' => 255)),
      'email'   => new sfValidatorString(array('max_length' => 100)),
      'user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
    ));

    $this->widgetSchema->setNameFormat('professor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Professor';
  }

}
