<?php

class CodeController
{
    static public function ctrListCodes($item, $value)
    {
        $table = "codes";
        $result = CodeModel::mdlListCodes($table, $item, $value);

        return $result;

    }
    
}
?>