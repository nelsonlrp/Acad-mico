<?php

/**
 * Discipline form base class.
 *
 * @method Discipline getObject() Returns the current form's model object
 *
 * @package    academico
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDisciplineForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'code'        => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'credits'     => new sfWidgetFormInputText(),
      'workload'    => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'        => new sfValidatorString(array('max_length' => 10)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'credits'     => new sfValidatorInteger(),
      'workload'    => new sfValidatorInteger(),
      'description' => new sfValidatorString(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Discipline', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('discipline[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Discipline';
  }

}
