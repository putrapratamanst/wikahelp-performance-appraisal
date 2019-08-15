<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kuisioner_result".
 *
 * @property int $id
 * @property string $id_kuisioner
 * @property string $result
 * @property string $id_tiket
 */
class KuisionerResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $tempKuisioner;

    public static function tableName()
    {
        return 'kuisioner_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['result', 'id_tiket', 'role'], 'string', 'max' => 45],
            [['id_kuisioner'], 'integer', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kuisioner' => 'Id Kuisioner',
            'result' => 'Result',
            'id_tiket' => 'Id Tiket',
        ];
    }

    public function getKuisioner()
    {
        return $this->hasOne(Kuisioner::className(), ['id' => 'id_kuisioner']);
    }

    public function getTiket()
    {
        return $this->hasOne(TblTiket::className(), ['id_tiket' => 'id_tiket']);
    }

}
