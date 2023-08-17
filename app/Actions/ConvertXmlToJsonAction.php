<?php

namespace App\Actions;

/*
 * Класс для конвектирования XML в JSON
 */
class ConvertXmlToJsonAction
{
    protected \SimpleXMLElement $xml;
    public string $root;
    public string $child;


    /*
     * Перед началом работы необходимо передать, через этот метод, строку с XML-данными,
     *  также необходимо назначить свойствам выше значения элементов, которые находятся в дереве XML
     */
    public function setSimpleXML(string $xml)
    {
        $this->xml = simplexml_load_string($xml);
    }

    /*
     * Возращает массив всех потомков
     * Если задан массив $params, тогда названия тегов из XML будут заменены названиями из этогот массива
     * пример массива:
     *  [
     *    "id" => 'идентификатор',
     *    "name" => 'имя'
     *  [
     *  по итогу теги, названия которых совпадают со значениеми из массива, будут заменены на ключи этих значений массивов
     */
    public function getAllChildren(array $params = []) : array
    {
        $res = [];
        $root = $this->root;
        $child = $this->child;
        if(!empty($params)) {

            foreach ($this->xml->$root->$child as $elem) {
                $resItem = [];
                foreach ($params as $k => $v) {
                    $resItem[$k] = (string)$elem->$v;
                }
                $res[] = $resItem;
            }

        } else {

            foreach ($this->xml->$root->$child as $elem) {
                $res[] = (array)$elem;
            }

        }
        return $res;
    }

    /*
     * Возращает массив с данными одного элемента XML дерева
     * Если задан массив $params, тогда названия тегов из XML будут заменены названиями из этогот массива
     * пример массива:
     *  [
     *    "id" => 'идентификатор',
     *    "name" => 'имя'
     *  [
     *  по итогу теги, названия которых сопадают со значением массива, будут заменены на ключи с этиъ массивов
     */
    public function getChild(array $params = []) : array
    {
        $res = [];
        $root = $this->root;
        $child = $this->child;
        if(!empty($params)) {
            foreach ($params as $k => $v) {
                foreach ($this->xml->$root->$child as $elem) {
                    $res[$k] = (string)$elem->$v;
                }
            }
        } else {
            return (array)$this->xml->$root->$child;
        }
        return $res;
    }
}
