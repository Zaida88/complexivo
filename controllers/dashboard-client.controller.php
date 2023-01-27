<?php
class DashboardClientController
{
    static public function ctrMostrarInformacion($item, $value)
    {
        $table = "languages";
        $result = LanguagesModel::mdlShowLanguages($table, $item, $value);
        return $result;

    }
}
?>