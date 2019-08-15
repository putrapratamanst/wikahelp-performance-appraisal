<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_nilai_pengkajian".
 *
 * @property string $id_nilai_pengkajian
 * @property string $id_alternatif1
 * @property string $id_alternatif2
 * @property string $nilai_pengkajian
 */
class TblNilaiPengkajian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_nilai_pengkajian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nilai_pengkajian', 'id_alternatif1', 'id_alternatif2', 'nilai_pengkajian'], 'required'],
            [['id_nilai_pengkajian', 'id_alternatif1', 'id_alternatif2', 'nilai_pengkajian'], 'string', 'max' => 100],
            [['id_nilai_pengkajian'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nilai_pengkajian' => 'Id Nilai Pengkajian',
            'id_alternatif1' => 'Id Alternatif1',
            'id_alternatif2' => 'Id Alternatif2',
            'nilai_pengkajian' => 'Nilai Pengkajian',
        ];
    }
}
