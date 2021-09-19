<?php
/**
 * DocumentExportType
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */



namespace ThunderCore\Invoice\Billingo\Model;
use \ThunderCore\Invoice\Billingo\ObjectSerializer;

/**
 * DocumentExportType Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentExportType
{
    /**
     * Possible values of this enum
     */
    const ARMADA = 'armada';
const AWS_BATCH = 'aws_batch';
const EX_PANDA = 'ex_panda';
const FORINTSOFT = 'forintsoft';
const HESSYN = 'hessyn';
const IMA = 'ima';
const INFOTEKA = 'infoteka';
const KULCS_KONYV = 'kulcs_konyv';
const MAXITAX = 'maxitax';
const NAGY_MACHINATOR = 'nagy_machinator';
const NAV_PTGSZLAH = 'nav_ptgszlah';
const NAV_XML = 'nav_xml';
const NAV_XML_ALIAS = 'nav_xml_alias';
const NOVITAX = 'novitax';
const PROFORMA_OUTSTANDING = 'proforma_outstanding';
const RELAX = 'relax';
const RLB = 'rlb';
const RLB60 = 'rlb60';
const RLB_DOUBLE_ENTRY = 'rlb_double_entry';
const SIMPLE_CSV = 'simple_csv';
const SIMPLE_EXCEL = 'simple_excel';
const SIMPLE_EXCEL_ITEMS = 'simple_excel_items';
const TENSOFT = 'tensoft';
const TENSOFT_29_DOT_65 = 'tensoft_29_dot_65';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ARMADA,
self::AWS_BATCH,
self::EX_PANDA,
self::FORINTSOFT,
self::HESSYN,
self::IMA,
self::INFOTEKA,
self::KULCS_KONYV,
self::MAXITAX,
self::NAGY_MACHINATOR,
self::NAV_PTGSZLAH,
self::NAV_XML,
self::NAV_XML_ALIAS,
self::NOVITAX,
self::PROFORMA_OUTSTANDING,
self::RELAX,
self::RLB,
self::RLB60,
self::RLB_DOUBLE_ENTRY,
self::SIMPLE_CSV,
self::SIMPLE_EXCEL,
self::SIMPLE_EXCEL_ITEMS,
self::TENSOFT,
self::TENSOFT_29_DOT_65,        ];
    }
}
