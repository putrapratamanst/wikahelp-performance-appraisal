<?php

namespace backend\models;

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
            [['id_nilai_matrix', 'id_alternatif1', 'id_alternatif2'], 'string', 'max' => 100],
            [['nilai_matrix'], 'safe'],
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

    public function reformattedIdMatrix()
    {
        $id     = $this->find()->max('RIGHT(id_nilai_matrix,5)');
        $tmp    = ((int) $id) + 1;
        $result = sprintf("%05s", $tmp);

        return "NM-" . $result;
    }

    public function matrixp($id_alternatif1, $id_alternatif2, $id_kriteria)
    {
        $nilai1 = self::bobot_value_sub_kriteria($id_alternatif1, $id_kriteria);
        $nilai2 = self::bobot_value_sub_kriteria($id_alternatif2, $id_kriteria);
        if ($nilai1 > $nilai2) {
            $data = 1;
        } else {
            $data = 0;
        }
        return $data;
    }

    public function nm_sub_kriteria($id_sub_kriteria)
    {
        $data = '';
        $id = array(
            'id_sub_kriteria' => $id_sub_kriteria,
        );
        $data_row = TblSubKriteria::find()->where(['id_sub_kriteria' => $id])->all();

        foreach ($data_row as $row) {
            $data = $row->nm_sub_kriteria;
        }
        return $data;
    }


    public function value_sub_kriteria($id_alternatif, $id_kriteria)
    {

        $data = '';
        $id_sub_kriteria = '';
        $id = array(
            'id_alternatif' => $id_alternatif,
            'id_kriteria' => $id_kriteria,
        );
        $data_row = TblNilaiAlternatif::find()->where(['id_nilai_alternatif' => $id])->all();

        foreach ($data_row as $row) {
            $data .= ' - ' . nm_sub_kriteria($row->id_sub_kriteria) . '<br>';
        }
        $data .= '[.....]<br>';
        return $data;
    }

    public function bobot_value_sub_kriteria($id_alternatif, $id_kriteria)
    {
        $data = '0';
        $data_row = TblNilaiAlternatif::find()->where(['id_alternatif' => $id_alternatif])->andWhere(['id_kriteria' => $id_kriteria])->andWhere(['status' => 1])->all();

        foreach ($data_row as $row) {
            $data += self::bobot_sub_kriteria($row->id_sub_kriteria);
        }

        return $data;
    }


    public function bobot_sub_kriteria($id_sub_kriteria)
    {
        $data = '';

        $data_row = TblSubKriteria::find()->where(['id_sub_kriteria' => $id_sub_kriteria])->all();

        foreach ($data_row as $row) {
            $data = $row->bobot_sub_kriteria;
        }
        return $data;
    }

}
