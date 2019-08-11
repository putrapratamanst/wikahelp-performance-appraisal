<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_nilai_matrix".
 *
 * @property string $id_nilai_matrix
 * @property string $id_alternatif1
 * @property string $id_alternatif2
 * @property string $nilai_matrix
 */
class TblNilaiMatrix extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_nilai_matrix';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nilai_matrix', 'id_alternatif1', 'id_alternatif2', 'nilai_matrix'], 'required'],
            [['id_nilai_matrix', 'id_alternatif1', 'id_alternatif2', 'nilai_matrix'], 'string', 'max' => 100],
            [['id_nilai_matrix'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nilai_matrix' => 'Id Nilai Matrix',
            'id_alternatif1' => 'Id Alternatif1',
            'id_alternatif2' => 'Id Alternatif2',
            'nilai_matrix' => 'Nilai Matrix',
        ];
    }
}
