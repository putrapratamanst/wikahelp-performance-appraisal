<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kuisioner".
 *
 * @property int $id
 * @property string $pertanyaan
 * @property string $role
 */
class Kuisioner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kuisioner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pertanyaan'], 'string'],
            [['role'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pertanyaan' => 'Pertanyaan',
            'role' => 'Role',
        ];
    }
}
