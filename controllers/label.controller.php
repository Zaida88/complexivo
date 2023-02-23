<?php  

class LabelController
{
    static public function ctrTableLabels($item, $value)
    {
        $table = "labels";
        $result = LabelModel::mdlTableLabels($table, $item, $value);
        return $result;

    }

    static public function ctrListLabels($item, $value, $option)
    {
        $table = "labels";
        $result = LabelModel::mdlListLabels($table, $item, $value, $option);
        return $result;

    }


    static public function ctrSearchLabel($value, $value2)
    {
        $table = "labels";
        $result = LabelModel::mdlSearchLabel($table, $value, $value2);
        return $result;

    }

}
?>