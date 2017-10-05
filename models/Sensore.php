<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sensori".
 *
 * @property string $id
 * @property string $tipo
 * @property string $marca
 * @property integer $impianto
 *
 * @property Rilevazione[] $rilevazionis
 * @property Impianto $impianto0
 */
class Sensore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sensori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tipo', 'marca', 'impianto'], 'required'],
            [['impianto'], 'integer'],
            [['id'], 'string', 'max' => 10],
            [['tipo', 'marca'], 'string', 'max' => 35],
            [['impianto'], 'exist', 'skipOnError' => true, 'targetClass' => Impianto::className(), 'targetAttribute' => ['impianto' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'marca' => 'Marca',
            'impianto' => 'Impianto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRilevazionis()
    {
        return $this->hasMany(Rilevazione::className(), ['id_sensore' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImpianto0()
    {
        return $this->hasOne(Impianto::className(), ['id' => 'impianto']);
    }
}
