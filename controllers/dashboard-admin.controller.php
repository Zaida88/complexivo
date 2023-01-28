<?php
class DashboardAdminController
{
    static public function ctrShowLanguages($item, $value)
    {
        $table = "languages";
        $result = LanguagesModel::mdlShowLanguages($table, $item, $value);
        return $result;

    }
}
?>