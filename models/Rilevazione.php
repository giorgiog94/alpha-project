<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rilevazioni".
 *
 * @property string $stringa
 * @property string $id_sensore
 * @property integer $valore
 * @property string $datetime
 * @property string $messaggio
 *
 * @property Sensori $idSensore
 */
class Rilevazione extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rilevazioni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stringa'], 'required'],
            [['valore'], 'integer'],
            [['datetime'], 'safe'],
            [['stringa', 'messaggio'], 'string', 'max' => 100],
            [['id_sensore'], 'string', 'max' => 10],
            [['id_sensore'], 'exist', 'skipOnError' => true, 'targetClass' => Sensori::className(), 'targetAttribute' => ['id_sensore' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stringa' => 'Stringa',
            'id_sensore' => 'Id Sensore',
            'valore' => 'Valore',
            'datetime' => 'Datetime',
            'messaggio' => 'Messaggio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSensore()
    {
        return $this->hasOne(Sensori::className(), ['id' => 'id_sensore']);
    }
}
