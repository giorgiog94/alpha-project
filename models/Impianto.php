<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "impianti".
 *
 * @property integer $id
 * @property string $nome
 * @property string $citta
 * @property string $indirizzo
 *
 * @property Sensore[] $sensoris
 * @property Utente[] $utentis
 */
class Impianto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'impianti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nome', 'citta', 'indirizzo'], 'required'],
            [['id'], 'integer'],
            [['indirizzo'], 'string'],
            [['nome', 'citta'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'citta' => 'Citta',
            'indirizzo' => 'Indirizzo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSensoris()
    {
        return $this->hasMany(Sensore::className(), ['impianto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtentis()
    {
        return $this->hasMany(Utente::className(), ['impianto_attivo' => 'id']);
    }
}
