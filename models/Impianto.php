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
 * @property integer $user_id
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
            [['nome', 'citta', 'indirizzo', 'user_id'], 'required'],
            [['indirizzo'], 'string'],
            [['user_id'], 'integer'],
            [['nome', 'citta'], 'string', 'max' => 35],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Utente::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Utente::className(), ['id' => 'user_id']);
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
