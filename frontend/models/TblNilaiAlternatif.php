<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_nilai_alternatif".
 *
 * @property string $id_nilai_alternatif
 * @property string $id_alternatif
 * @property string $id_kriteria
 * @property string $id_sub_kriteria
 */
class TblNilaiAlternatif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_nilai_alternatif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nilai_alternatif', 'id_alternatif', 'id_kriteria', 'id_sub_kriteria'], 'required'],
            [['id_nilai_alternatif', 'id_alternatif', 'id_kriteria', 'id_sub_kriteria'], 'safe'],
            [['id_nilai_alternatif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nilai_alternatif' => 'Id Nilai Alternatif',
            'id_alternatif' => 'Id Alternatif',
            'id_kriteria' => 'Id Kriteria',
            'id_sub_kriteria' => 'Id Sub Kriteria',
        ];
    }

    public function reformattedId()
    {
        $id     = $this->find()->max('RIGHT(id_nilai_alternatif,4)');
        $tmp    = ((int) $id) + 1;
        $result = sprintf("%05s", $tmp);
        
        return "NAL-". $result;
    }

}
