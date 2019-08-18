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
            [['id_nilai_pengkajian', 'id_alternatif1', 'id_alternatif2'], 'string', 'max' => 100],
            [['nilai_pengkajian'], 'safe'],
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

    public function reformattedIdPengkajian()
    {
        $id     = $this->find()->max('RIGHT(id_nilai_pengkajian,5)');
        $tmp    = ((int) $id) + 1;
        $result = sprintf("%05s", $tmp);

        return "NP-" . $result;
    }

    function pengkajian_metode($id_alternatif1, $id_alternatif2)
    {
        $data = '0';
        $id = array(
            'id_alternatif1' => $id_alternatif1,
            'id_alternatif2' => $id_alternatif2,
        );
        $data_row = TblNilaiMatrix::find()->where(['id_alternatif1' => $id_alternatif1])->andWhere(['id_alternatif2' => $id_alternatif2])->all();

        foreach ($data_row as $row) {
            $data += $row->nilai_matrix;
        }
        return $data;
    }

}
