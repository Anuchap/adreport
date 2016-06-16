<?php
class Query {
    public static function agency() {
        return 'select id, name, seq from agency';
    }

    public static function disciplineConfig() {
        return 'select name from discipline_config order by seq';
    }

    public static function disciplineData($sheet, $disciplineName) {
        return "select a.seq col, c.seq row, d.value 
            from discipline d
            left join agency a on d.agency_id = a.id
            left join category_config c on d.category_name = c.name
            where d.sheet = ".$sheet." and d.name = '".$disciplineName."'";
    }

    public static function disciplineData2($sheet, $disciplineName) {
        return "
            select a.seq col, c.seq + 60 row, d.value 
            from discipline d
            left join agency a on d.agency_id = a.id
            left join category_config c on d.category_name = c.name
            where d.sheet = ".$sheet." and d.name = '".$disciplineName."'";
    }

    public static function subDisciplineByDisciplineName($sheet, $disciplineName) {
        return "select distinct s.name from sub_discipline s
            left join discipline d on s.discipline_id = d.id
            where d.sheet = ".$sheet." and d.name = '".$disciplineName."'";
    }

    public static function subDisciplineData($sheet, $disciplineName, $subDisciplineName) {
        return "select a.seq col, c.seq row, s.percent from sub_discipline s
            left join discipline d on s.discipline_id = d.id
            left join agency a on d.agency_id = a.id
            left join category_config c on d.category_name = c.name
            where d.sheet = ".$sheet." and d.name = '".$disciplineName."' and s.name = '".$subDisciplineName."'";
    }
}
?>